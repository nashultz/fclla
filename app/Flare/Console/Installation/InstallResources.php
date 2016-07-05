<?php

namespace FCLLA\Flare\Console\Installation;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;

class InstallResources
{
    /**
     * The console command instance.
     *
     * @var \Illuminate\Console\Command  $command
     */
    protected $command;

    /**
     * Create a new installer instance.
     *
     * @param  \Illuminate\Console\Command  $command
     * @return void
     */
    public function __construct($command)
    {
        $this->command = $command;

        $this->command->line('Installing JavaScript & Less Assets: <info>✔</info>');
        $this->command->line('Installing Language Files: <info>✔</info>');
        $this->command->line('Installing Views: <info>✔</info>');
    }

    /**
     * Install the components.
     *
     * @return void
     */
    public function install()
    {
        $this->installFrontEndDirectories();

        $files = [
            FLARE_STUB_PATH.'/terms.md' => base_path('terms.md'),
            FLARE_STUB_PATH.'/gulpfile.js' => base_path('gulpfile.js'),
            FLARE_STUB_PATH.'/package.json' => base_path('package.json'),
            FLARE_STUB_PATH.'/resources/assets/less/app.less' => resource_path('assets/less/app.less'),
            FLARE_STUB_PATH.'/resources/lang/en/validation.php' => resource_path('lang/en/validation.php'),
            FLARE_STUB_PATH.'/resources/views/welcome.blade.php' => resource_path('views/welcome.blade.php'),
            FLARE_STUB_PATH.'/resources/views/home.blade.php' => resource_path('views/home.blade.php'),
        ];

        foreach ($files as $from => $to) {
            copy($from, $to);
        }

        (new Filesystem)->copyDirectory(
            FLARE_STUB_PATH.'/resources/assets/js', resource_path('/assets/js')
        );

        Artisan::call('vendor:publish', ['--tag' => ['flare-views']]);
    }

    /**
     * Install the front-end directories.
     *
     * @return void
     */
    protected function installFrontEndDirectories()
    {
        (new Filesystem)->deleteDirectory(resource_path('/assets/sass'));

        if (! is_dir(resource_path('/assets/js/components'))) {
            (new Filesystem)->makeDirectory(
                resource_path('/assets/js/components'), $mode = 0755, $recursive = true
            );
        }

        if (! is_dir(resource_path('/assets/js/flare-components'))) {
            (new Filesystem)->makeDirectory(
                resource_path('/assets/js/flare-components'), $mode = 0755, $recursive = true
            );
        }

        if (! is_dir(resource_path('/assets/less'))) {
            (new Filesystem)->makeDirectory(resource_path('/assets/less'));
        }
    }
}
