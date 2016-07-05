var announcementsCreateForm = function () {
    return {
        body: '',
        action_text: '',
        action_url: ''
    };
};

module.exports = {
    /**
     * The component's data.
     */
    data() {
        return {
            announcements: [],
            updatingAnnouncement: null,
            deletingAnnouncement: null,

            createForm: new FlareForm(announcementsCreateForm()),
            updateForm: new FlareForm(announcementsCreateForm()),

            deleteForm: new FlareForm({})
        };
    },


    events: {
        /**
         * Handle this component becoming the active tab.
         */
        flareHashChanged: function (hash) {
            if (hash == 'announcements' && this.announcements.length === 0) {
                this.getAnnouncements();
            }
        }
    },


    methods: {
        /**
         * Get all of the announcements.
         */
        getAnnouncements() {
            this.$http.get('/flare/kiosk/announcements')
                .then(response => {
                    this.announcements = response.data;
                });
        },


        /**
         * Create a new announcement.
         */
        create() {
            Flare.post('/flare/kiosk/announcements', this.createForm)
                .then(() => {
                    this.createForm = new FlareForm(announcementsCreateForm());

                    this.getAnnouncements();
                });
        },


        /**
         * Edit the given announcement.
         */
        editAnnouncement(announcement) {
            this.updatingAnnouncement = announcement;

            this.updateForm.icon = announcement.icon;
            this.updateForm.body = announcement.body;
            this.updateForm.action_text = announcement.action_text;

            $('#modal-update-announcement').modal('show');
        },


        /**
         * Update the specified announcement.
         */
        update() {
            Flare.put('/flare/kiosk/announcements/' + this.updatingAnnouncement.id, this.updateForm)
                .then(() => {
                    this.getAnnouncements();

                    $('#modal-update-announcement').modal('hide');
                });
        },


        /**
         * Show the approval dialog for deleting an announcement.
         */
        approveAnnouncementDelete(announcement) {
            this.deletingAnnouncement = announcement;

            $('#modal-delete-announcement').modal('show');
        },


        /**
         * Delete the specified announcement.
         */
        delete() {
            Flare.delete('/flare/kiosk/announcements/' + this.deletingAnnouncement.id, this.deleteForm)
                .then(() => {
                    this.getAnnouncements();

                    $('#modal-delete-announcement').modal('hide');
                });
        }
    }
};
