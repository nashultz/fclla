<?php

namespace FCLLA\Flare\Console\Commands;

use Illuminate\Console\Command;
use FCLLA\Flare\Console\Installation;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'flare:install
                    {--braintree : Install Braintree versions of the file stubs}
                    {--team-billing : Configure Flare for team based billing}
                    {--force : Force Flare to install even it has been already installed}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Flare scaffolding into the application';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (! defined('FLARE_STUB_PATH')) {
            define('FLARE_STUB_PATH', FLARE_PATH.'/install-stubs');
        }

        if ($this->flareAlreadyInstalled() && ! $this->option('force')) {
            return $this->line('Flare is already installed for this project.');
        }

        $installers = collect([
            Installation\InstallConfiguration::class,
            Installation\InstallEnvironment::class,
            Installation\InstallHttp::class,
            Installation\InstallImages::class,
            Installation\InstallMigrations::class,
            Installation\InstallModels::class,
            Installation\InstallProviders::class,
            Installation\InstallResources::class,
        ]);

        $installers->each(function ($installer) { (new $installer($this))->install(); });

        $this->comment('Laravel Flare installed. Create something amazing!');
    }

    /**
     * Determine if Flare is already installed.
     *
     * @return bool
     */
    protected function flareAlreadyInstalled()
    {
        $composer = json_decode(file_get_contents(base_path('composer.json')), true);

        return isset($composer['require']['laravel/flare']);
    }
}
