<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\InvalidLoginProviderException;
use App\Http\Controllers\Controller;
use App\Models\HitobitoUser;
use App\Models\User;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\AbstractUser as SocialiteUser;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the hitobito authentication page.
     *
     * @return Response
     */
    public function redirectToHitobitoOAuth()
    {
        return Socialite::driver('hitobito')->setScopes(['with_roles'])->redirect();
    }

    /**
     * TODO: Code below: get the actual information that we need.
     */
    /**
     * Obtain the user information from hitobito.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws Exception
     */
    public function handleHitobitoOAuthCallback(Request $request)
    {
        if ($request->error) {
            // User has denied access in Hitobito
            return $this->redirectWithError(__('Zugriff in MiData verweigert.'));
        }
        try {
            $socialiteUser = Socialite::driver('hitobito')->setRequest($request)->setScopes(['with_roles'])->user();
            $user = $this->findOrCreateSocialiteUser($socialiteUser);
        } catch (InvalidStateException $exception) {
            // User has reused an old link or modified the redirect?
            return $this->redirectWithError(__('Etwas hat nicht geklappt. Versuche es noch einmal.'));
        } catch (InvalidLoginProviderException $exception) {
            return $this->redirectWithError(__('Melde dich bitte wie üblich mit Benutzernamen und Passwort an.'));
        } catch (Exception $exception) {
            throw $exception;
            return $this->redirectWithError(__('Leider klappt es momentan gerade nicht. Versuche es später wieder, oder registriere unten einen klassischen Account.'));
        }

        $this->guard()->login($user);
        return $this->sendLoginResponse($request);
    }

    private function redirectWithError($error)
    {
        return Redirect::route('login')->withErrors([
            'hitobito' => [$error],
        ]);
    }

    private function findOrCreateSocialiteUser(SocialiteUser $socialiteUser)
    {
        if ($userFromDB = HitobitoUser::where('hitobito_id', $socialiteUser->getId())->first()) {
            // User is logging in
            return $this->updateEmailIfAppropriate($userFromDB, $socialiteUser);
        } else {
            // User is registering
            return $this->createNewHitobitoUser($socialiteUser);
        }
    }

    private function updateEmailIfAppropriate(HitobitoUser $user, SocialiteUser $socialiteUser)
    {
        $hitobitoEmail = $socialiteUser->getEmail();
        if ($user->email != $hitobitoEmail && User::where('email', $hitobitoEmail)->doesntExist()) {
            // Update email only if it is not occupied by someone else
            $user->email = $hitobitoEmail;
            $user->save();
        }
        return $user;
    }

    private function createNewHitobitoUser(SocialiteUser $socialiteUser)
    {
        if (User::where('email', $socialiteUser->getEmail())->exists()) {
            // Don't register a new user if another account already uses the same email address
            throw new InvalidLoginProviderException;
        }

        $created = HitobitoUser::create(['hitobito_id' => $socialiteUser->getId(), 'email' => $socialiteUser->getEmail(), 'name' => $socialiteUser->getNickname()]);
        return $created;
    }
}
