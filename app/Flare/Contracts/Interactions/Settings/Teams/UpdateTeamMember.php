<?php

namespace FCLLA\Flare\Contracts\Interactions\Settings\Teams;

interface UpdateTeamMember
{
    /**
     * Get a validator instance for the given data.
     *
     * @param  \FCLLA\Flare\Team  $team
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $data
     * @return \Illuminate\Validation\Validator
     */
    public function validator($team, $member, array $data);

    /**
     * Update the given team member.
     *
     * @param  \FCLLA\Flare\Team  $team
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $data
     * @return void
     */
    public function handle($team, $member, array $data);
}
