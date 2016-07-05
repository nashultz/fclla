<flare-team-profile :user="user" :team="team" inline-template>
    <div>
        <div v-if="user && team">
            <!-- Update Team Photo -->
            @include('flare::settings.teams.update-team-photo')

            <!-- Update Team Name -->
            @include('flare::settings.teams.update-team-name')
        </div>
    </div>
</flare-team-profile>
