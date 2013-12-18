/**
 * Model defintion for Message
 */

Resistance.Message = DS.Model.extend({
    userId: DS.attr('number'),
    text: DS.attr('string')
});