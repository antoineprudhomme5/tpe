$(function(){

    $('div.product-chooser').find('div.product-chooser-item').mouseenter( function() {
        $(this).addClass('selected');
    });
    $('div.product-chooser').find('div.product-chooser-item').mouseleave( function() {
        $(this).removeClass('selected');
    });
});