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
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        ];

        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->from($data['email'])->to('adrianarossettisugih@g.harvard.edu')->subject($data['subject']);
        });

        Session::flash('alert', 'Your email was sent!');

        return view('emails.confirmation')->with([
            'alert' => 'Your email was sent!',
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        ]);
    }
}


