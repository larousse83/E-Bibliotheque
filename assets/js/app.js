/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../scss/app.scss';

// start the Stimulus application
import $ from 'jquery';
import 'bootstrap';

// Favorite Button - Heart
var $favoris = $('.heart');
$favoris.on('click', function(e) {
    var id = $(this).data( "id");

    if ($(this).hasClass('favoris'))
    {
        $(this).removeClass('favoris')
        $.ajax({
            type: 'DELETE',
            url: '/favoris/remove/'+$(this).data( "id"),
            data: { id: $(this).data( "id") },
            success: function (data) {

            }
        });

    }else {
        $(this).addClass('favoris')
        $.ajax({
            type: 'POST',
            url: '/favoris/add/'+$(this).data( "id"),
            data: { id: $(this).data( "id") },
            success: function (data) {

            }
        });
    }
});

var $abonnement = $('#abonnement');
$abonnement.on('click', function(e) {
    var id = $(this).data( "id");

    $.ajax({
        type: 'POST',
        url: '/abonnement/'+$(this).data( "id"),
        data: { id: $(this).data( "id") },
        success: function (data) {

        }
    });
});
