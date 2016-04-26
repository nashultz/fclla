<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }

    public function send(ContactRequest $request)
    {
        $contact = $request->all();
        Mail::send('emails.contact', ['contact' => $contact], function ($m) use ($contact) {
            $m->from('info@fclla.info', 'Faulkner County Landlord Association');
            $m->to('contact@fclla.info', 'FCLLA President')->subject('FCLLA - ' . $contact->issuetype . ' from ' . $contact->name);
            $m->replyTo($contact->email, $contact->name);
            $m->bcc('nathon@nathonshultz.com', 'Nathon Shultz');
        });
    }
}
