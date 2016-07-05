<?php

namespace FCLLA\Flare\Interactions\Settings\Teams;

use FCLLA\Flare\Flare;
use Illuminate\Support\Facades\Validator;
use FCLLA\Flare\Events\Teams\TeamCreated;
use FCLLA\Flare\Contracts\Repositories\TeamRepository;
use FCLLA\Flare\Contracts\Interactions\Settings\Teams\CreateTeam as Contract;
use FCLLA\Flare\Contracts\Interactions\Settings\Teams\AddTeamMember as AddTeamMemberContract;

class CreateTeam implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function validator($user, array $data)
    {
        $validator = Validator::make($data, [
            'name' => 'required',
        ]);

        $validator->after(function ($validator) use ($user) {
            $this->validateMaximumTeamsNotExceeded($validator, $user);
        });

        return $validator;
    }

    /**
     * Validate that the maximum number of teams hasn't been exceeded.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return void
     */
    protected function validateMaximumTeamsNotExceeded($validator, $user)
    {
        if (! $plan = $user->flarePlan()) {
            return;
        }

        if (is_null($plan->teams)) {
            return;
        }

        if ($plan->teams <= $user->ownedTeams()->count()) {
            $validator->errors()->add('name', 'Please upgrade your subscription to create more teams.');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function handle($user, array $data)
    {
        event(new TeamCreated($team = Flare::interact(
            TeamRepository::class.'@create', [$user, $data]
        )));

        Flare::interact(AddTeamMemberContract::class, [
            $team, $user, 'owner'
        ]);

        return $team;
    }
}
