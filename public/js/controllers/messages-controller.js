/**
 * Controller for messages
 */
Resistance.MessagesController = Ember.ArrayController.extend({

    remainingText: function() {
        var text = this.get('text'), length = 0, remaining;
        if (text) {
            length = text.length;
        }
        remaining = 200 - length;
        if (remaining < 0) {
            this.set('error', true);
        } else {
            this.set('error', false);
        }
        return remaining;
    }.property('text'),

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
            var user = Resistance.get('user');

            var message = this.store.createRecord('message', {
                'userId': user.get('id'),
                'user': user.get('name'),
                'rank': user.get('rank'),
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
        },

        upvote: function(message) {
            message.incrementProperty('upvotes');
            message.save();
        },

        downvote: function(message) {
            message.incrementProperty('downvotes');
            message.save();
        },
    }
});