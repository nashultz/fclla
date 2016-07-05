<?php

namespace FCLLA\Flare\Interactions\Settings\Teams;

use Ramsey\Uuid\Uuid;
use FCLLA\Flare\Flare;
use FCLLA\Flare\Invitation;
use Illuminate\Support\Facades\Mail;
use FCLLA\Flare\Events\Teams\UserInvitedToTeam;
use FCLLA\Flare\Contracts\Interactions\Settings\Teams\SendInvitation as Contract;

class SendInvitation implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function handle($team, $email)
    {
        $invitedUser = Flare::user()->where('email', $email)->first();

        $this->emailInvitation(
            $invitation = $this->createInvitation($team, $email, $invitedUser)
        );

        if ($invitedUser) {
            event(new UserInvitedToTeam($team, $invitedUser));
        }

        return $invitation;
    }

    /**
     * E-mail the given invitation instance.
     *
     * @param  Invitation  $invitation
     * @return void
     */
    protected function emailInvitation($invitation)
    {
        Mail::send($this->view($invitation), compact('invitation'), function ($m) use ($invitation) {
            $m->to($invitation->email)->subject('New Invitation!');
        });
    }

    /**
     * Create a new invitation instance.
     *
     * @param  \FCLLA\Flare\Team  $team
     * @param  string  $email
     * @param  \Illuminate\Contracts\Auth\Authenticatable|null  $invitedUser
     */
    protected function createInvitation($team, $email, $invitedUser)
    {
        return $team->invitations()->create([
            'id' => Uuid::uuid4(),
            'user_id' => $invitedUser ? $invitedUser->id : null,
            'email' => $email,
            'token' => str_random(40),
        ]);
    }

    /**
     * Get the proper e-mail view for the given invitation.
     *
     * @param  \FCLLA\Flare\Invitation  $invitation
     * @return string
     */
    protected function view(Invitation $invitation)
    {
        return $invitation->user_id
                        ? 'flare::settings.teams.emails.invitation-to-existing-user'
                        : 'flare::settings.teams.emails.invitation-to-new-user';
    }
}
