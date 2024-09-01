<?php

namespace SendEmail\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SendEmail\Contact\Models\Contact;
use SendEmail\Contact\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact::contact');
    }
    public function send(Request $req)
    {
        Mail::to($req->email)->send(new ContactMailable($req->msg, $req->email));
        
        Contact::create($req->all());

        return 'user record created successfully!';
        return view('contact::contact');
    }
}
