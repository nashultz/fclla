<?php

namespace FCLLA\Flare\Events;

class AnnouncementCreated
{
    /**
     * The announcement instance.
     *
     * @var \FCLLA\Flare\Announcement
     */
    public $announcement;

    /**
     * Create a new announcement instance.
     *
     * @param  \FCLLA\Flare\Announcement  $announcement
     * @return void
     */
    public function __construct($announcement)
    {
        $this->announcement = $announcement;
    }
}
