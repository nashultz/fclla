module.exports = {
    props: ['user'],


    /**
     * Load mixins for the component.
     */
    mixins: [require('./../mixins/tab-state')],


    /**
     * Prepare the component.
     */
    ready() {
        this.usePushStateForTabs('.flare-settings-tabs');
    },


    events: {
        /**
         * Handle the Flare tab changed event.
         */
        flareHashChanged(hash) {
            if (hash == 'users') {
                setTimeout(() => {
                    $('#kiosk-users-search').focus();
                }, 150);
            }

            return true;
        }
    }
};
