/**
 * Bootstrap Ember app and define all routes
 */
var Resistance = Ember.Application.create();

Resistance.Store = DS.Store.extend({
    adapter: "DS.RESTAdapter"
});

// Defining the routes
Resistance.Router.map(function() {
    this.resource('user');
    this.resource('messages');
    this.resource('message', {path: 'messages/:message_id'}, function() {
        this.resource('comments');
    });
    this.route('savedmessages');
});

// date formatter
Ember.Handlebars.helper('format-date', function(date) {
  return moment(date).fromNow();
});