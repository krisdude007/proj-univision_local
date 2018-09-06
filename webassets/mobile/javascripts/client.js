/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function() {
    flashHandlers();

    $('.sidebar a').each(function(i, e) {
        $(e).removeClass('activePage');
        if (window.location.toString().match($(e).attr('href') + '$')) {
            $(e).addClass('activePage');
        }
    });
});
var flashHandlers = function() {
    $('.okbutton').on('click', function(e) {
        $('.flashMobile').animate({opacity: 0.92}, 50).fadeOut();
    });
};