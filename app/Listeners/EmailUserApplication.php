<?php

namespace FCLLA\Listeners;

use Barryvdh\DomPDF\PDF;
use FCLLA\Events\ApplicationWasSubmitted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EmailUserApplication
{
    public $event;
    public $pdf;

    /**
     * Create the event listener.
     *
     * @param PDF $pdf
     */
    public function __construct(PDF $pdf)
    {
        $this->pdf = $pdf;
    }

    /**
     * Handle the event.
     *
     * @param  ApplicationWasSubmitted  $event
     * @return void
     */
    public function handle(ApplicationWasSubmitted $event)
    {
        $pdflocation = public_path() . '/files/';
        $filename = $event->application->id . '/' . $event->application->id . camel_case($event->application->name) . 'application.pdf';
        $filepath = $pdflocation . $filename;
        $app = $event->application;

        $pdf = $this->pdf->loadView('frontend.application.print.view', compact('app'));
        $pdf->save($filename);
        $userpdflink = url($filename);
        $data = array('userpdflink'=>$userpdflink, 'useremail'=>$event->application->email, 'username'=>$event->application->name);
        Mail::send('emails.submituserapplication', $data, function($m) use ($data) {
            $m->from('info@fclla.org', 'Faulkner County Landlord Association');
            $m->to($data['useremail'], $data['username'])->subject('FCLLA Membership Application');
            $m->bcc('nashultz07@gmail.com', 'Nathon Shultz');
        });
    }
}
