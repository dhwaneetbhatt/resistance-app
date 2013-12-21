/**
 * Model defintion for Message
 */
Resistance.Message = DS.Model.extend({
    userId: DS.attr('number'),
    user: DS.attr('string'),
    rank: DS.attr('string'),
    avatar: DS.attr('string'),
    text: DS.attr('string'),
    upvotes: DS.attr('number'),
    downvotes: DS.attr('number'),
    comments: DS.hasMany('comment', {async: 'true'}),
    creationDate: DS.attr('date'),
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