/**
 * Initialize the Flare form extension points.
 */
Flare.forms = {
    register: {},
    updateContactInformation: {},
    updateTeamMember: {}
};

/**
 * Load the FlareForm helper class.
 */
require('./form');

/**
 * Define the FlareFormError collection class.
 */
require('./errors');

/**
 * Add additional HTTP / form helpers to the Flare object.
 */
$.extend(Flare, require('./http'));
