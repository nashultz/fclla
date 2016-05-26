<?php

namespace FCLLA\Http\Controllers;

use Illuminate\Http\Request;

use FCLLA\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index()
    {
        dd(Auth::user()->name);
        return view('frontend.index');
    }

    public function join()
    {
        return view('frontend.join');
    }

    public function legal()
    {
        return view('frontend.legal');
    }

    public function downloadapp()
    {
        $file_path = 'themes/default/assets/files/FCLLAMembershipApplication2015-2016.pdf';
        $filename = 'FCLLAMembershipApplication2015-2016.pdf';
        return response()->download($file_path, $filename);
    }
}


