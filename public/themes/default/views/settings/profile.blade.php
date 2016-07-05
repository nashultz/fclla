<flare-profile :user="user" inline-template>
    <div>
        <!-- Update Profile Photo -->
        @include('flare::settings.profile.update-profile-photo')

        <!-- Update Contact Information -->
        @include('flare::settings.profile.update-contact-information')
    </div>
</flare-profile>
