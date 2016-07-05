<?php

namespace FCLLA\Flare\Console\Commands;

use Exception;
use FCLLA\Flare\Flare;
use Illuminate\Console\Command;
use FCLLA\Flare\Console\Updating;

class UpdateViewsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'flare:update-views';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the Flare views';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $updaters = collect([
            Updating\UpdateViews::class,
        ]);

        $updaters->each(function ($updater) {
            (new $updater($this, FLARE_PATH))->update();
        });
    }
}
