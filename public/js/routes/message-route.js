/**
 * Route defintion for a single Message
 */
Resistance.MessageRoute = Ember.Route.extend({
    model: function(params) {
        return this.store.find('message', params.message_id);
    },

    setupController: function(controller, model) {
        // model is reloaded to fetch all dependancies (comments)
        model.reload()
        controller.set('content', model);
        controller.set('showComments', true);
    }
});