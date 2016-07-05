<?php

namespace FCLLA\Flare\Console\Updating;

use Exception;
use ZipArchive;
use GuzzleHttp\Client as HttpClient;
use Illuminate\Filesystem\Filesystem;
use FCLLA\Flare\InteractsWithFlareApi;
use GuzzleHttp\Exception\ClientException;
use FCLLA\Flare\InteractsWithFlareConfiguration;

class DownloadRelease
{
    use InteractsWithFlareApi,
        InteractsWithFlareConfiguration;

    /**
     * The command instance.
     *
     * @var \Illuminate\Console\Command
     */
    protected $command;

    /**
     * Create a new downloader instance.
     *
     * @param  \Illuminate\Console\Command  $command
     * @return void
     */
    public function __construct($command)
    {
        $this->command = $command;
    }

    /**
     * Download the latest Flare release.
     *
     * @param  string  $release
     * @return string
     */
    public function download($release)
    {
        file_put_contents(
            $zipPath = base_path('flare-archive.zip'), $this->zipResponse($release)
        );

        $this->extractZip($zipPath);

        return $this->releasePath();
    }

    /**
     * Get the raw Zip response for the given release.
     *
     * @param  string  $release
     * @return string
     */
    protected function zipResponse($release)
    {
        try {
            return (string) (new HttpClient)->get(
                $this->flareUrl.'/api/releases/'.$release.'/download?api_token='.$this->readToken(),
                ['headers' => [
                    'X-Requested-With' => 'XMLHttpRequest',
                ]]
            )->getBody();
        } catch (ClientException $e) {
            if ($e->getResponse()->getStatusCode() === 401) {
                $this->invalidLicense($release);
            }

            throw $e;
        }
    }

    /**
     * Extract the Flare Zip archive.
     *
     * @param  string  $zipPath
     * @return void
     */
    protected function extractZip($zipPath)
    {
        $archive = new ZipArchive;

        $archive->open($zipPath);

        $archive->extractTo(base_path('flare-new'));

        $archive->close();

        @unlink($zipPath);
    }

    /**
     * Get the release directory.
     *
     * @return string
     */
    protected function releasePath()
    {
        return base_path('flare-new/'.basename(
            (new Filesystem)->directories(base_path('flare-new'))[0]
        ));
    }

    /**
     * Inform the user that their Flare license is invalid.
     *
     * @return void
     */
    protected function invalidLicense($release)
    {
        $this->command->line(
            '<fg=red>You do not own any licenses for release ['.$release.'].</>'
        );

        exit(1);
    }
}
