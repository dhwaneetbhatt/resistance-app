/**
 * Route defintion for messages
 */
Resistance.MessagesRoute = Ember.Route.extend({
    model: function() {
        return this.store.find('message');
    }
});