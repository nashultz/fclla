<?php

namespace FCLLA\Flare\Interactions\Auth;

use FCLLA\Flare\Flare;
use FCLLA\Flare\Invitation;
use Illuminate\Support\Facades\DB;
use FCLLA\Flare\Contracts\Interactions\Subscribe;
use FCLLA\Flare\Contracts\Http\Requests\Auth\RegisterRequest;
use FCLLA\Flare\Contracts\Interactions\Settings\Teams\CreateTeam;
use FCLLA\Flare\Contracts\Interactions\Auth\Register as Contract;
use FCLLA\Flare\Contracts\Interactions\Settings\Teams\AddTeamMember;
use FCLLA\Flare\Contracts\Interactions\Auth\CreateUser as CreateUserContract;

class Register implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function handle(RegisterRequest $request)
    {
        return DB::transaction(function () use ($request) {
            return $this->subscribe($request, $this->createUser($request));
        });
    }

    /**
     * Create the user for the new registration.
     *
     * @param  RegisterRequest  $request
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    protected function createUser(RegisterRequest $request)
    {
        $user = Flare::interact(CreateUserContract::class, [$request]);

        if (Flare::usesTeams()) {
            $this->configureTeamForNewUser($request, $user);
        }

        return $user;
    }

    /**
     * Attach the user to a team if an invitation exists, or create a new team.
     *
     * @param  RegisterRequest  $request
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return void
     */
    protected function configureTeamForNewUser(RegisterRequest $request, $user)
    {
        if ($invitation = $request->invitation()) {
            Flare::interact(AddTeamMember::class, [$invitation->team, $user]);

            $invitation->delete();
        } else {
            Flare::interact(CreateTeam::class, [$user, ['name' => $request->team]]);
        }

        $user->currentTeam();
    }

    /**
     * Subscribe the given user to a subscription plan.
     *
     * @param  RegisterRequest  $request
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    protected function subscribe($request, $user)
    {
        if (! $request->hasPaidPlan()) {
            return $user;
        }

        Flare::interact(Subscribe::class, [
            $user, $request->plan(), true, $request->all()
        ]);

        return $user;
    }
}
