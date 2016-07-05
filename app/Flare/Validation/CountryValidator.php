<?php

namespace FCLLA\Flare\Validation;

use FCLLA\Flare\Contracts\Repositories\Geography\CountryRepository;

class CountryValidator
{
    /**
     * The country repository implementation.
     *
     * @var CountryRepository
     */
    protected $countries;

    /**
     * Create a new country validator instance.
     *
     * @param  CountryRepository  $countries
     * @return void
     */
    public function __construct(CountryRepository $countries)
    {
        $this->countries = $countries;
    }

    /**
     * Validate the given data.
     *
     * @return bool
     */
    public function validate($attribute, $value, $parameters)
    {
        return in_array($value, array_keys($this->countries->all()));
    }
}
