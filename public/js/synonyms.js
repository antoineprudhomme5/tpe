var startValue = 10000; // in ms
var time = new Date(startValue);
var interv;
var values = [];

$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:  'get_synonyms',
        type: "POST",
        cache: false,
        dataType : 'json',
        success: function(data)
        {
            values = values.concat(data);
            console.log(values);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            document.write(JSON.stringify(jqXHR));
            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        },
        complete: function()
        {
            if (values.length > 0)
            {
                prepare();
            }
            else
            {
                alert("erreur lors du chargement des données de jeu.");
            }
        }
    });

    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();

    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);

        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").on('click', function () {
        moveNext();
    });

    $('.btn-ready').on('click', function () {
        $('#ready').css('visibility', 'hidden');
        $('#loading').css('visibility', 'hidden');
        $('#game').css('visibility', 'visible');
        chrono();
    });

});

function prepare()
{
    for(var i = 0; i < values.length; i++)
    {
        var n = i+1;

        var element = $('#step' + n);

        element.find('h3').text(values[i].word);

            var content = '<input type="radio" name="radio'+ n +'" id="d'+ n +'" style="display:none" checked="checked"/>';
            content +=      '<div class="funkyradio">';
            content +=          '<div class="funkyradio-primary">';
            content +=              '<div class="funkyradio-primary">';
            content +=                  '<input type="radio" name="radio'+ n +'" id="radio'+ (1+3*i) +'" value="'+ values[i].p1 + '-' + values[i].id +'"/>';
            content +=                  '<label for="radio' + (1+3*i) + '">'+ values[i].p1 +'</label>';
            content +=              '</div>';
            content +=              '<div class="funkyradio-primary">';
            content +=                  '<input type="radio" name="radio'+ n +'" id="radio'+ (2+3*i) +'" value="'+ values[i].p2 + '-' + values[i].id +'"/>';
            content +=                  '<label for="radio' + (2+3*i) + '">'+ values[i].p2 +'</label>';
            content +=              '</div>';
            content +=              '<div class="funkyradio-primary">';
            content +=                  '<input type="radio" name="radio'+ n +'" id="radio'+ (3+3*i) +'" value="'+ values[i].p3 + '-' + values[i].id +'"/>';
            content +=                  '<label for="radio' + (3+3*i) + '">'+ values[i].p3 +'</label>';
            content +=              '</div>';
            content +=      '</div>';

            element.find('div').html(content).text();
            //element.append(content);
    }


    ready();
}

function ready()
{
    $('#ready').css('visibility', 'visible');
}

/* JEU ET CHRONO*/

function nextTab(elem) {

    $(elem).next().find('a[data-toggle="tab"]').click();
}

function chrono() {

    displayTime();

    interv = setInterval(function(){
        time = new Date(time - 1000);
        if(time<=0){
            if($('li#end').hasClass('active'))
            {
                $('#form_synonyms').submit();
            }
            else
            {
                moveNext();
            }
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
    $active.removeClass('active');
    $active.addClass('disabled');
    $active.next().removeClass('disabled');
    nextTab($active);
    clearInterval(interv);

    if(!$active.is('li#end'))
    {
        // reset chrono
        time = new Date(startValue);
        chrono();
    }
    else
    {
        $('#time').css('display', 'none');
        $('#timebar').css('display', 'none');
    }
}