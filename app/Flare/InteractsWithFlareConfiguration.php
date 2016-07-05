<?php

namespace FCLLA\Flare;


use Exception;

trait InteractsWithFlareConfiguration
{
    /**
     * Get the Flare API token from the configuration file.
     * @return string
     */
    protected function readToken()
    {
        if (! $this->configExists()) {
            throw new Exception("Flare configuration file not found. Please register a token.");
        }

        return json_decode(
            file_get_contents($this->configPath()), true
        )['token'];
    }

    /**
     * Write the Flare token to the configuration.
     * @param  string  $token
     * @return void
     */
    protected function storeToken($token)
    {
        file_put_contents($this->configPath(), json_encode([
                'token' => $token
            ], JSON_PRETTY_PRINT).PHP_EOL);
    }

    /**
     * Determine if the Flare configuration file exists.
     * @return bool
     */
    protected function configExists()
    {
        return file_exists($this->configPath());
    }

    /**
     * Get the Flare configuration file path.
     * @return string
     */
    protected function configPath()
    {
        return $_SERVER['HOME'].'/.flare/config.json';
    }
}