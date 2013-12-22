/**
 * Controller for messages
 */
Resistance.SavedmessagesController = Ember.ArrayController.extend({
    needs: ['messages'],

    actions: {

        /**
         * Handles upvotes and downvotes (model updates)
         */
        upvote: function(message) {
            this.get('controllers.messages').send('upvote', message);

        },
        downvote: function(message) {
            this.get('controllers.messages').send('downvote', message);
        }
    }
});