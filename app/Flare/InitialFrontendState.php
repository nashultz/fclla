<?php

namespace FCLLA\Flare;


use FCLLA\Flare\Repositories\UserRepository;

class InitialFrontendState implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function forUser($user)
    {
        return [
            'user' => $this->currentUser(),
            'teams' => $user ? $this->teams($user) : [],
            'currentTeam' => $user ? $this->currentTeam($user) : null,
        ];
    }

    /**
     * Get the currently authenticated user.
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    protected function currentUser()
    {
        return Flare::interact(UserRepository::class.'@current');
    }

    /**
     * Get all of the teams for the user.
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return \Illuminate\Database\Eloquent\Collection|null
     */
    protected function teams($user)
    {
        return Flare::usesTeams() ? Flare::interact(
            TeamRepository::class.'@forUser', [$user]
        ) : [];
    }

    /**
     * Get the current team for the user.
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return \FCLLA\Flare\Team|null
     */
    protected function currentTeam($user)
    {
        if (Flare::usesTeams() && $user->currentTeam()) {
            return Flare::interact(
                TeamRepository::class.'@find', [$user->currentTeam()->id]
            );
        }
    }
}