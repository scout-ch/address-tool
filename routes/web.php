<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);
Route::get('login/hitobito', 'Auth\LoginController@redirectToHitobitoOAuth')->name('login.hitobito');
Route::get('login/hitobito/callback', 'Auth\LoginController@handleHitobitoOAuthCallback')->name('login.hitobito.callback');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/mail', 'MailController@index')->name('mail');
Route::any('/mail/send', 'MailController@send')->name('mail-send');

Route::get('/upload', 'UploadController@index')->name('upload');

Route::post('/upload_receiver', 'UploadController@receive')->name('receive');
