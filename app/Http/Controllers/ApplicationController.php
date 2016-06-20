<?php

namespace FCLLA\Http\Controllers;

use Barryvdh\DomPDF\PDF as PDF;
use FCLLA\Application;
use FCLLA\Events\ApplicationWasSubmitted;
use FCLLA\Events\UserApplicationWasApproved;
use FCLLA\Events\UserApplicationWasDenied;
use FCLLA\Http\Requests\CreateApplicationRequest;
use Illuminate\Http\Request;

use FCLLA\Http\Requests;

class ApplicationController extends Controller
{

    public $application;
    protected $pdf;

    public function __construct(Application $application, PDF $pdf)
    {
        $this->application = $application;
        $this->pdf = $pdf;
    }

    //Download application
    public function downloadapp()
    {
        $pdf = $this->pdf->loadView('frontend.application.print.index');
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
        $app = $this->application->create($data);

        flash()->success('Application was successfully sent!');
        event(new ApplicationWasSubmitted($app));
        return redirect()->back();
    }

    public function viewAll()
    {
        $apps = $this->application->get();

        return view('frontend.application.view', compact('apps'));
    }

    public function printfilledapp($id)
    {
        $app = $this->application->findOrFail($id);
        $pdf = $this->pdf->loadView('frontend.application.print.view', compact('app'));
        return $pdf->stream('filledapplication.pdf');
    }

    public function view($id)
    {
        $app = $this->application->findOrFail($id);
        return view('frontend.application.show', compact('app'));
    }

    public function approve($id)
    {
        $app = $this->application->findOrFail($id);
        flash()->success('Application was approved.');
        event(new UserApplicationWasApproved($app));
        return redirect()->back();
    }

    public function deny($id)
    {
        $app = $this->application->findOrFail($id);
        flash()->warning('Application was denied.');
        event(new UserApplicationWasDenied($app));
        return redirect()->back();
    }
}
