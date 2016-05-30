<?php

namespace FCLLA\Http\Controllers;

use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;

use FCLLA\Http\Requests;
use Illuminate\Support\Facades\Auth;

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
        //$file_path = 'themes/default/assets/files/FCLLAMembershipApplication2015-2016.pdf';
       // $filename = 'FCLLAMembershipApplication2015-2016.pdf';

        $pdf = SnappyPDF::loadView('frontend.application');
        return $pdf->download('application.pdf');
    }
}


