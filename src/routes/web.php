<?php 

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'SendEmail\Contact\Http\Controllers'], function () {
    Route::get('msg', 'ContactController@index')->name('msg');
    Route::post('message', 'ContactController@send')->name('message');

    Route::get('test', function () {
        try {
            Mail::raw('This is a test email!', function ($message) {
                $message->to('asimzareen111@gmail.com')
                        ->subject('Test Email via Real SMTP');
            });
    
            return 'Test email sent!';
        } catch (\Exception $e) {
            return 'Error sending email: ' . $e->getMessage();
        }
    });
}); 