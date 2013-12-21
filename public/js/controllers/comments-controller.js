/**
 * Controller for comments
 */
Resistance.CommentsController = Ember.ArrayController.extend({
    needs: ['message'],

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
            var message = this.get('controllers.message').get('model');

            var comment = this.store.createRecord('comment', {
                'userId': user.get('id'),
                'messageId': message.get('id'),
                'user': user.get('name'),
                'rank': user.get('rank'),
                'text': text
            });
            comment.save().then(function() {
                message.get('comments').addObject(comment);
            });

            this.set('isCreating', false);
            this.set('text', null);
        },

        /**
         * Hide the view as-is
         */
        cancel: function() {
            this.set('isCreating', false);
            this.set('text', null);
        }

    }
});