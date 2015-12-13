$(function(){

    $('div.product-chooser').find('div.product-chooser-item').mouseenter( function() {
        $(this).addClass('selected');
        $('.play').css('visibility', 'yes');
    });
    $('div.product-chooser').find('div.product-chooser-item').mouseleave( function() {
        $(this).removeClass('selected');
        $('.play').css('visibility', 'hidden');
    });
});