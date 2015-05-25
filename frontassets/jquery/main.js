$(document).ready(function(){
    $(".section").css("min-height",$(window).height());
    $( window ).resize(function() {
        $(".section").css("min-height",$(window).height());
    });
});