<flare-team-membership :user="user" :team="team" inline-template>
    <div>
        @if (Auth::user()->ownsTeam($team))
            <!-- Send Invitation -->
            <div v-if="user && team">
                @include('flare::settings.teams.send-invitation')
            </div>

            <!-- Pending Invitations -->
            <div v-if="invitations && invitations.length > 0">
                @include('flare::settings.teams.mailed-invitations')
            </div>
        @endif

        <!-- Team Members -->
        <div v-if="user && team">
            @include('flare::settings.teams.team-members')
        </div>
    </div>
</flare-team-membership>
