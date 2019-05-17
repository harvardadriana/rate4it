<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;

class HomeController extends Controller
{
    /**
     * Return homepage
     */
    public function __invoke()
    {
        return view('homepage');
    }

    /**
     *  GET  '/about'
     */
    public function about()
    {
        return view('about');
    }

    /**
     *  GET  '/contact'
     */
    public function sendEmail()
    {
        return view('contact');
    }

    /**
     *  POST  '/contact'
     */
    public function postEmail(Request $request)
    {
        # Validate entries from user
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        # Save data in array
        $data = [
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        ];

        # Send email from user
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->from($data['email'])->to('adrianarossettisugih@g.harvard.edu')->subject($data['subject']);
        });

        # Returns message of confirmation of email sent to user
        Session::flash('alert', 'Your email was sent!');

        return view('emails.confirmation')->with([
            'alert' => 'Your email was sent!',
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        ]);
    }

}


