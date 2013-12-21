/**
 *
 */
Resistance.User = Ember.Object.extend({
    id: null,
    email: null,
    firstName: null,
    lastName: null,
    rank: null,
    avatar: null,
    name: function() {
        return this.get('firstName') + ' ' + this.get('lastName');
    }.property('firstName', 'lastName'),
    isLeader: function() {
        var result, rank = this.get('rank');
        if (rank === 'Resistance Leader') {
            result = true;
        } else {
            result = false;
        }
        return result;
    }.property('rank')
});