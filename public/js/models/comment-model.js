/**
 * Model defintion for Comment
 */
Resistance.Comment = DS.Model.extend({
    userId: DS.attr('number'),
    messageId: DS.attr('number'),
    user: DS.attr('string'),
    rank: DS.attr('string'),
    avatar: DS.attr('string'),
    text: DS.attr('string'),
    creationDate: DS.attr('date'),
    miniAvatar: function() {
        return this.get('avatar') + '?s=40';
    }.property('avatar'),
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