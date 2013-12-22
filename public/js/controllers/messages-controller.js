/**
 * Controller for messages
 */
Resistance.MessagesController = Ember.ArrayController.extend({

    // calculcates remaining characters in the message
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
            this.set('text', null);
        },

        /**
         * Handles upvotes and downvotes (model updates)
         */
        upvote: function(message) {
            message.incrementProperty('upvotes');
            message.save();
        },
        downvote: function(message) {
            message.incrementProperty('downvotes');
            message.save();
        },

        /**
         * Store this message to Saved Message for this user
         */
        store: function(message) {
            var messageId = message.get('id'),
                userId = Resistance.get('user').get('id');
            $.ajax({
                url: '/savedmessages',
                method: 'POST',
                data: {'userId': userId, 'messageId': messageId},
                dataType: 'json'
            });
        }
    }
});