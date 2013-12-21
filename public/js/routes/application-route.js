/**
 * Route defintion for Application
 */
Resistance.ApplicationRoute = Ember.Route.extend({

    // set current user object in the Resistance (App) object itself on app startup
    beforeModel: function() {
        $.getJSON('/user', function (data) {
            var user = Resistance.User.create({
                id: data.id,
                email: data.email,
                firstName: data.firstName,
                lastName: data.lastName,
                rank: data.rank
            });
            Resistance.set('user', user);
        });     
    }
});