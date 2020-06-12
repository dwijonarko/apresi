<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function saveContact(Request $request) { 
        Mail::send('emails.contact_email',
        array(
                 'name' => $request->get('name'),
                 'email' => $request->get('email'),
                 'body' => $request->get('user_message'),
        ), function($message) use ($request)
        {
            $message->subject('APRESI Contact');
            $message->from($request->email);
            $message->to('d.wijonarko@gmail.com');
        });
          return back()->with('status', 'Thank you for contact us!');
    }
}
