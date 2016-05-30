<?php

namespace FCLLA\Http\Controllers;

use FCLLA\Http\Requests\CreateApplicationRequest;
use Illuminate\Http\Request;

use FCLLA\Http\Requests;

class ApplicationController extends Controller
{
    //Download application
    public function downloadapp()
    {
        $pdf = PDF::loadView('frontend.application.print');
        return $pdf->download('application.pdf');
    }
    
    //Online Application Form
    public function index()
    {
        $date = date('Y');
        $lydate = date('Y', mktime(0,0,0,0,0,$date-0));
        dd($lydate);
        $appdate = $lydate . '-' . $date;
        return view('frontend.application.index', compact('appdate'));
    }

    public function save(CreateApplicationRequest $request)
    {
        $data = $request->all();
        
        return 'Saved Application';
    }
}
