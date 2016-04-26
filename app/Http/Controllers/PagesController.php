<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function index()
    {
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
        $file_path = 'themes/default/assets/files';
        $filename = 'FCLLAMembershipApplication2015-2016.pdf';
        return response()->download($file_path, $filename);
    }
}


