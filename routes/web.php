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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

<<<<<<< HEAD
Route::get('/mail', 'MailController@index')->name('mail');
Route::any('/mail/send', 'MailController@send')->name('mail-send');
=======
Route::get('/upload', 'UploadController@index')->name('upload');

Route::post('/upload_receiver', 'UploadController@receive')->name('receive');
>>>>>>> 7e1512a15d18b0eba7236ffd03402fc7802b79a6
