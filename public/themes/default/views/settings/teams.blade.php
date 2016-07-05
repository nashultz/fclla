<flare-teams :user="user" :teams="teams" inline-template>
    <div>
        <!-- Create Team -->
        @include('flare::settings.teams.create-team')

        <!-- Pending Invitations -->
        @include('flare::settings.teams.pending-invitations')

        <!-- Current Teams -->
        <div v-if="user && teams.length > 0">
            @include('flare::settings.teams.current-teams')
        </div>
    </div>
</flare-teams>
