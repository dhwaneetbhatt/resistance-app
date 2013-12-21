/**
 * Bootstrap Ember app and define all routes
 */
var Resistance = Ember.Application.create();

Resistance.Store = DS.Store.extend({
    adapter: "DS.RESTAdapter"
});

Resistance.Router.map(function() {
    this.resource('user');
    this.resource('messages');
});

// date formatter
Ember.Handlebars.helper('format-date', function(date) {
  return moment(date).fromNow();
});