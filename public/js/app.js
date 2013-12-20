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

// set current user object in the Resistance (App) object itself on app startup
$.getJSON('/user', function (data) {
    var user = Ember.Object.create({
        id: data.id,
        email: data.email,
        firstName: data.first_name,
        lastName: data.last_name,
        rank: data.rank_id
    });
    Resistance.set('user', user);
});

// date formatter
Ember.Handlebars.helper('format-date', function(date) {
  return moment(date).fromNow();
});