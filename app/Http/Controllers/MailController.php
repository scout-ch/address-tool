<?php

namespace App\Http\Controllers;

use App\Mail\AddressMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// $this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		print_r(Auth::user()->name);

		return view('mail');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function send(Request $request)
	{
		foreach($request->input('mail') as $mail){
			if(env('FAKER_MAIL')){
				Mail::to(env('FAKER_MAIL'))->send(new AddressMail());
			}else{
				Mail::to($mail)->send(new AddressMail(Auth::user()->email));
			}
		}

		return redirect()->route('upload')->with('message', 'Mails wurden gesendet!');
	}
}