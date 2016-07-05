module.exports = {
    props: ['user', 'team'],

    /**
     * The component's data.
     */
    data() {
        return {
            form: new FlareForm({
                name: ''
            })
        };
    },


    /**
     * Prepare the component.
     */
    ready() {
        this.form.name = this.team.name;
    },


    methods: {
        /**
         * Update the team name.
         */
        update() {
            Flare.put(`/settings/teams/${this.team.id}/name`, this.form)
                .then(() => {
                    this.$dispatch('updateTeam');
                    this.$dispatch('updateTeams');
                });
        }
    }
};
