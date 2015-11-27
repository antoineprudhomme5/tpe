var startValue = 10000; // in ms
var time = new Date(startValue);
var interv;

$(document).ready(function () {

    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();

    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);

        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function () {
        moveNext();
    });

    chrono();
});

function nextTab(elem) {

    $(elem).next().find('a[data-toggle="tab"]').click();
}

function chrono() {

    displayTime();

    interv = setInterval(function(){
        time = new Date(time - 1000);
        if(time<=0){
            moveNext();
        }
        displayTime(time);
    }, 1000);
}

function displayTime() {

    $('#time').text(time.getSeconds());
    $('#timebar').css('width', (time.getSeconds()*10) + "%");
}

function moveNext() {

    // move to the next word
    var $active = $('.wizard .nav-tabs li.active');
    $active.next().removeClass('disabled');
    nextTab($active);

    // reset chrono
    clearInterval(interv);
    time = new Date(startValue);
    chrono();
}