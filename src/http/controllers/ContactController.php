<?php

namespace SendEmail\Contact\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use SendEmail\Contact\Models\Contact;
use Illuminate\Support\Facades\Session;
use SendEmail\Contact\Mail\ContactMailable;

class ContactController extends Controller
{
    public function index()
    {
        // return view('contact::contact');
        return view('contact');
    }
    public function send(Request $req)
    {
        try {
            Mail::to($req->email)->send(new ContactMailable($req->msg, $req->email));
            Contact::create($req->all());
            $successMessage = 'Email sent successfully to user!';
            Log::info('User record created: ', ['message' => $successMessage]);
            session::put('success','User record created successfully!');
            return view('contact', compact('successMessage'));     
         } catch (\Exception $e) {
            $errorMessage = 'Failed to send email. Please try again later.';
            Log::info('Error occurred: ', ['error' => $errorMessage]);
            return redirect()->back()->withInput()->with('message', $errorMessage);
    }
    }
}
