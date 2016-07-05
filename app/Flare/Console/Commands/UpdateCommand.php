<?php

namespace FCLLA\Flare\Console\Commands;

use Exception;
use FCLLA\Flare\Flare;
use FCLLA\Flare\InteractsWithFlareApi;
use Illuminate\Console\Command;
use FCLLA\Flare\Console\Updating;

class UpdateCommand extends Command
{
    use InteractsWithFlareApi;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'flare:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the Flare installation';

    /**
     * Execute the console command.
     * change something
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->onLatestRelease()) {
            return $this->info('You are already running the latest release of Flare.');
        }

        $downloadPath = (new Updating\DownloadRelease($this))->download(
            $release = $this->latestFlareRelease()
        );

        $updaters = collect([
            Updating\UpdateViews::class,
            Updating\UpdateInstallation::class,
            Updating\RemoveDownloadPath::class,
        ]);

        $updaters->each(function ($updater) use ($downloadPath) {
            (new $updater($this, $downloadPath))->update();
        });

        $this->info('You are now running on Flare v'.$release.'. Enjoy!');
    }

    /**
     * Determine if the application is already on the latest version.
     *
     * @return bool
     */
    protected function onLatestRelease()
    {
        return version_compare(Flare::$version, $this->latestFlareRelease(), '>=');
    }
}
