<?php

namespace FCLLA\Flare\Contracts\Repositories\Geography;

interface CountryRepository
{
    /**
     * Get all of the countries in the world.
     *
     * @return array
     */
    public function all();
}
