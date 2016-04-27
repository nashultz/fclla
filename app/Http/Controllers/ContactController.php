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
        $contName = $request->name;
        $contEmail = $request->email;
        $contIssueType = $request->issuetype;
        $contMember = $request->member;
        $contMessageBody = $request->messagebody;

        $data = array('name'=>$contName, 'email'=>$contEmail, 'issuetype'=>$contIssueType, 'member'=>$contMember, 'messagebody'=>$contMessageBody);
        Mail::send('emails.contact', $data, function ($m) use ($data) {
            $m->from('info@fclla.org', 'Faulkner County Landlord Association');
            $m->to('contact@fclla.org', 'FCLLA President')->subject('FCLLA - ' . $data['issuetype'] . ' from ' . $data['name']);
            $m->replyTo($data['email'], $data['name']);
            $m->bcc('nathon@nathonshultz.com', 'Nathon Shultz');
        });
        flash()->success('Message was sent successfully!');

        return redirect()->route('contact');
    }
}
