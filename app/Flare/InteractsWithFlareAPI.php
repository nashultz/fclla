<?php

namespace FCLLA\Flare;

use GuzzleHttp\Client as HttpClient;

trait InteractsWithFlareApi
{
    /**
     * The Flare base URL.
     * changed something
     * @var string
     */
    protected $flareUrl = 'https://flare.nathonscott.com';

    /**
     * Get the latest Flare release version.
     * @return string
     */
    protected function latestFlareRelease()
    {
        return json_decode((string) (new HttpClient)->get(
            $this->flareUrl.'/api/releases/version'
        )->getBody())->version;
    }
}