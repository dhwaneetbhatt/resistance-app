/**
 * Route defintion for saved messages
 */
Resistance.SavedmessagesRoute = Ember.Route.extend({

    // get the saved messages, get the messages using id and pass to model
    model: function() {
        var user = Resistance.get('user');
        if (!user) {
            this.transitionTo('/');
        }
        return Ember.$.getJSON('/savedmessages', {'userId': user.get('id') });
    },

    // transform the data returned from the router to Ember Data models
    setupController: function(controller, model) {
        var models = [], self = this;
        model.forEach(function(savedMessage) {
            model = self.store.find('message', savedMessage.id);
            models.pushObject(model);
        });
        controller.set('model', models);
    }
});