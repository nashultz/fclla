<?php

namespace FCLLA\Flare\Interactions\Settings\Teams;

use FCLLA\Flare\Flare;
use Illuminate\Support\Facades\Validator;
use FCLLA\Flare\Contracts\Interactions\Settings\Teams\UpdateTeamMember as Contract;

class UpdateTeamMember implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function validator($team, $member, array $data)
    {
        return Validator::make($data, [
            'role' => 'required|in:'.implode(',', array_keys(Flare::roles())),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function handle($team, $member, array $data)
    {
        $team->users()->updateExistingPivot($member->id, [
            'role' => $data['role']
        ]);
    }
}
