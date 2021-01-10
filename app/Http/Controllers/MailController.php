<?php

namespace App\Http\Controllers;

use App\Mail\AddressMail;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('mail');
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function send(Request $request)
    {
        $contact = $request->input('contact');

        foreach ($request->input('mail') as $mail) {
            $data = explode(',', $mail);
            if (env('FAKER_MAIL')) {
                Mail::to(env('FAKER_MAIL'))->send(new AddressMail($data[1], $contact));
            } else {
                Mail::to($data[0])->send(new AddressMail($data[1], $contact));
            }
        }

        return redirect()->route('upload')->with('message', 'Mails wurden gesendet!');
    }
}
