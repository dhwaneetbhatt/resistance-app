/**
 * Index route: reditect to messages route
 */
Resistance.IndexRoute = Ember.Route.extend({
    redirect: function() {
        this.transitionTo('messages');
    }
});