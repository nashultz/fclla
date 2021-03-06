<?php

namespace FCLLA\Listeners;

use FCLLA\Events\ApplicationWasSubmitted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EmailAdministrationUserApplicationLink
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $filename = $event->application->id . snake_case($event->application->name) . 'application.pdf';
        $filepath = $pdflocation . $filename;
        $user = $event->application;
        $userpdflink = route('admin::viewapp', ['id' => $user->id]);
        $data = array('filepath'=>$filepath,'userpdflink'=>$userpdflink, 'user'=>$event->application);
        Mail::send('emails.usersubmittedapplication', $data, function($m) use ($data) {
            $m->from('noreply@fclla.org', 'Faulkner County Landlord Association');
            $m->to('applications@fclla.org', 'Faulkner County Landlord Association')->subject('FCLLA Membership Application Submission');
            $m->attach($data['filepath']);
        });
    }
}
