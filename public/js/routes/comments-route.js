/**
 * Route defintion for comments
 */
Resistance.CommentsRoute = Ember.Route.extend({
    model: function() {
        this.controllerFor('message').set('showComments', false);
        return this.modelFor('message').get('comments');
    },

    deactivate: function() {
        this.controllerFor('message').set('showComments', true);
    }
});