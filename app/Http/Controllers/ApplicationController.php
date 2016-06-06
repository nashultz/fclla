<?php

namespace FCLLA\Http\Controllers;

use Barryvdh\DomPDF\PDF as PDF;
use FCLLA\Application;
use FCLLA\Http\Requests\CreateApplicationRequest;
use Illuminate\Http\Request;

use FCLLA\Http\Requests;

class ApplicationController extends Controller
{

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    //Download application
    public function downloadapp()
    {
        $pdf = PDF->loadView('frontend.application.print.index');
        return $pdf->download('application.pdf');
    }
    
    //Online Application Form
    public function index()
    {
        $date = date('Y');
        $lydate = date('Y', mktime(0,0,0,0,0,$date-0));
        $appdate = $lydate . '-' . $date;
        return view('frontend.application.index', compact('appdate'));
    }

    public function save(CreateApplicationRequest $request)
    {
        $data = $request->all();
        $this->application->create($data);

        flash()->success('Application was successfully sent!');
        return redirect()->back();
    }

    public function printfilledapp($id)
    {
        $app = $this->application->findOrFail($id);
        $pdf = PDF->loadView('frontend.application.print.view', $app);
        return $pdf->stream('filledapplication.pdf');
    }
}
