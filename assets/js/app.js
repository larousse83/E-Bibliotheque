/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../scss/app.scss';

// start the Stimulus application
import 'bootstrap';

// Favorite Button - Heart
$('.favme').click(function() {
    $(this).toggleClass('active');
});

/* when a user clicks, toggle the 'is-animating' class */
$(".favme").on('click touchstart', function(){
    $(this).toggleClass('is_animating');
});

/*when the animation is over, remove the class*/
$(".favme").on('animationend', function(){
    $(this).toggleClass('is_animating');
});