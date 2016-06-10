<?php

namespace FCLLA\Listeners;

use Barryvdh\DomPDF\PDF;
use FCLLA\Events\ApplicationWasSubmitted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

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
        $filename = $pdflocation . $event->application->id . '/' . $event->application->id . 'application.pdf';

        $app = $event;

        $pdf = $this->pdf->loadView('frontend.application.print.view', compact('app'));
        $pdf->save($filename);
        $userpdflink = link_to($filename);
        dd($userpdflink);
    }
}
