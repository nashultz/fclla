<?php

namespace FCLLA\Flare\Contracts\Repositories;

use FCLLA\Flare\Announcement;

interface AnnouncementRepository
{
    /**
     * Get the most recent announcement notifications for the application.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function recent();

    /**
     * Create an application announcement with the given data.
     *
     * @param  \Illuminate\Contracts\Authenticatable
     * @param  array  $data
     * @return \FCLLA\Flare\Announcement
     */
    public function create($user, array $data);

    /**
     * Update the given announcement with the given data.
     *
     * @param  \FCLLA\Flare\Announcement  $announcement
     * @param  array  $data
     */
    public function update(Announcement $announcement, array $data);
}
