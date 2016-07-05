<?php

namespace FCLLA\Flare\Interactions\Auth;

use FCLLA\Flare\Flare;
use Illuminate\Support\Facades\Validator;
use FCLLA\Flare\Contracts\Repositories\UserRepository;
use FCLLA\Flare\Contracts\Repositories\Geography\StateRepository;
use FCLLA\Flare\Contracts\Interactions\Auth\CreateUser as Contract;

class CreateUser implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function validator($request)
    {
        $validator = $this->baseValidator($request);

        $validator->sometimes('team', 'required|max:255', function ($input) {
            return Flare::usesTeams() && ! isset($input['invitation']);
        });

        return $validator;
    }

    /**
     * Create a base validator instance for creating a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Validation\Validator
     */
    protected function baseValidator($request)
    {
        return Validator::make(
            $request->all(), Flare::call(static::class.'@rules', [$request]),
            [], ['address_line_2' => 'second address line']
        );
    }

    /**
     * Get the basic validation rules for creating a new user.
     *
     * @param  \FCLLA\Flare\Http\Requests\Auth\RegisterRequest  $request
     * @return array
     */
    public function rules($request)
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'vat_id' => 'max:50|vat_id',
            'terms' => 'required|accepted',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function handle($request)
    {
        return Flare::interact(UserRepository::class.'@create', [$request->all()]);
    }
}
