/**
 * Controller for messages
 */
Resistance.MessagesController = Ember.ArrayController.extend({

    actions: {

        /**
         * Creating a new message
         */
        new: function() {
            this.set('isCreating', true);
        },

        /**
         * Generate a model from the template data and create in the store
         */
        save: function() {
            var text = this.get('text');

            var message = this.store.createRecord('message', {
                'userId': 1,
                'text': text
            });
            message.save();
            this.set('isCreating', false);
        },

        /**
         * Hide the view as-is
         */
        cancel: function() {
            this.set('isCreating', false);
        }
    }
});