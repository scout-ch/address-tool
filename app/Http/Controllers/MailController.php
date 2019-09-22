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
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		return view('mail');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function send(Request $request)
	{
		print_r($request->input('mail'));

		foreach($request->input('mail') as $mail){
			$data = explode(',',$mail);
			if(env('FAKER_MAIL')){
				Mail::to(env('FAKER_MAIL'))->send(new AddressMail($data[1]));
			}else{
				Mail::to($data[0])->send(new AddressMail($data[1]));
			}
		}

		return redirect()->route('upload')->with('message', 'Mails wurden gesendet!');
	}
}