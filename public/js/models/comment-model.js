/**
 * Model defintion for Comment
 */
Resistance.Comment = DS.Model.extend({
    userId: DS.attr('number'),
    messageId: DS.attr('number'),
    user: DS.attr('string'),
    rank: DS.attr('string'),
    text: DS.attr('string'),
    creationDate: DS.attr('date'),
    message: DS.belongsTo('message')
});