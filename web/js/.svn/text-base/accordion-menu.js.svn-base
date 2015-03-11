$(document).ready(function() {
    setTimeout(function() {

        // Accordion
        $('.nav> li > a.expanded + ul').slideToggle('medium');
        $('.nav > li > a').click(function() {
            $('.nav > li > a.expanded').not(this).toggleClass('expanded').toggleClass('collapsed').parent().find('> ul').slideToggle('medium');
            $(this).toggleClass('expanded').toggleClass('collapsed').parent().find('> ul').slideToggle('medium');
        });
    }, 250);
});