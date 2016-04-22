<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }

    public function send(Request $request)
    {
        return 'sent';
    }
}
