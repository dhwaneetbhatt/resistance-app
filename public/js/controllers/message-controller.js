/**
 * Controller for message
 */
Resistance.MessageController = Ember.ObjectController.extend({
    needs: ['messages'],

    actions: {
        upvote: function(message) {
            this.get('controllers.messages').send('upvote', message);
        },
        downvote: function(message) {
            this.get('controllers.messages').send('downvote', message);
        },
        store: function(message) {
            this.get('controllers.messages').send('store', message);
        }
    }
});