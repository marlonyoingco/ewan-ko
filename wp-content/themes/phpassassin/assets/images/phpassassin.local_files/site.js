jQuery(document).ready(function($) {
    $("#menu-icon").click(function() {
         $("#floating-menu").toggle();
    });

    $('a').click(function() {
        if($(this).attr('href').match('#')) {
            var offset = $('[data-section="$section"]'.replace('$section', window.location.hash.substr(1))).offset();
alert(offset.top)
            $('html, body').animate({
                scrollTop: offset.top+'px'
            }, 500);
        }
    });
});