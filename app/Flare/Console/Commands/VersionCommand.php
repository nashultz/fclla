<?php

namespace FCLLA\Flare\Console\Commands;

use Exception;
use FCLLA\Flare\Flare;
use Illuminate\Console\Command;

class VersionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'flare:version';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'View the current Flare version';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line('<info>Laravel Flare</info> version <comment>'.Flare::$version.'</comment>');
    }
}
