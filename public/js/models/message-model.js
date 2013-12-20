/**
 * Model defintion for Message
 */
Resistance.Message = DS.Model.extend({
    user: DS.attr('string'),
    rank: DS.attr('string'),
    text: DS.attr('string'),
    creationDate: DS.attr('date')
});