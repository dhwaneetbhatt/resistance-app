/**
 * Route defintion for Message
 */
Resistance.MessagesRoute = Ember.Route.extend({
    model: function() {
        return this.store.find('message');
    }
});