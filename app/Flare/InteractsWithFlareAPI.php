<?php

namespace FCLLA\Flare;


trait InteractsWithFlareAPI
{
    /**
     * The Flare base URL.
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