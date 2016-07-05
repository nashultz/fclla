<?php

namespace FCLLA\Flare\Console\Updating;

use Exception;
use Illuminate\Filesystem\Filesystem;

class UpdateInstallation
{
    /**
     * The path to the downloaded Flare upgrade.
     *
     * @var string
     */
    protected $downloadPath;

    /**
     * Create a new command instance.
     *
     * @param  \Illuminate\Console\Command  $command
     * @param  string  $downloadPath
     * @return void
     */
    public function __construct($command, $downloadPath)
    {
        $this->downloadPath = $downloadPath;

        $command->line('Updating Flare Directory: <info>✔</info>');
    }

    /**
     * Update the components.
     *
     * @return void
     */
    public function update()
    {
        (new Filesystem)->deleteDirectory(FLARE_PATH);

        rename($this->downloadPath, FLARE_PATH);
    }
}
