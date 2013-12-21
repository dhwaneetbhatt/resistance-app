/**
 *
 */
Resistance.User = Ember.Object.extend({
    id: null,
    email: null,
    firstName: null,
    lastName: null,
    rank: null,

    name: function() {
        return this.get('firstName') + ' ' + this.get('lastName');
    }.property('firstName', 'lastName')
});