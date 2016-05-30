<?php

namespace FCLLA\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
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
        $pdf = PDF::loadView('frontend.application.print');
        return $pdf->download('application.pdf');
    }
}


