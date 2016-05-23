var startValue = 10000; // in ms
var time = new Date(startValue);
var interv;
var values = [];

$(document).ready(function () {

    // ajax request to get the game data
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

    // start the game
    $('.btn-ready').on('click', function () {
        $('#ready').css('visibility', 'hidden');
        $('#loading').css('visibility', 'hidden');
        $('#game').css('visibility', 'visible');
        chrono();
    });

    // on form submit, call the submit function to send it with ajax request
    $('#form_synonyms').on('submit', function(e) {
        e.preventDefault();
        submit();
    });

});

/**
 * Submit the synonyms game form with a json request
 */
function submit()
{
    $('#game').css('display', 'none');
    $('#loading').css('visibility', 'visible');

    var formData = new FormData(document.getElementById('form_synonyms'));
    formData.append('values', JSON.stringify(values));

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:  'post_synonyms',
        type: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType : 'json',
        success: function(data)
        {
            var data_parsed = JSON.parse(data);

            $('#response').html(data_parsed['response']);
            $('#loading').css('display', 'none');

            if(data_parsed['achievement'])
            {
                $('#response').append('<div class="text-center"><h2>New achievement</h2> <h3>'+ data_parsed['achievement'].title +'</h3></div>');
                $('#response').append('<div><img class="img-responsive achievement" src="../'+ data_parsed['achievement'].link +'"/></div>');

            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            document.write(JSON.stringify(jqXHR));
            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
}

/**
 * Prepare the game after the first json request response
 */
function prepare()
{
    for(var i = 0; i < values.length; i++)
    {
        var n = i+1;

        var element = $('#step' + n);

        element.find('h3').text(values[i].word);

            var content = '<input type="radio" name="radio'+ n +'" id="d'+ n +'" style="display:none" value="/" checked="checked"/>';
            content +=      '<div class="funkyradio">';
            content +=          '<div class="funkyradio-primary">';
            content +=              '<div class="funkyradio-primary">';
            content +=                  '<input type="radio" name="radio'+ n +'" id="radio'+ (1+3*i) +'" value="'+ values[i].p1 +'"/>';
            content +=                  '<label for="radio' + (1+3*i) + '">'+ values[i].p1 +'</label>';
            content +=              '</div>';
            content +=              '<div class="funkyradio-primary">';
            content +=                  '<input type="radio" name="radio'+ n +'" id="radio'+ (2+3*i) +'" value="'+ values[i].p2 +'"/>';
            content +=                  '<label for="radio' + (2+3*i) + '">'+ values[i].p2 +'</label>';
            content +=              '</div>';
            content +=              '<div class="funkyradio-primary">';
            content +=                  '<input type="radio" name="radio'+ n +'" id="radio'+ (3+3*i) +'" value="'+ values[i].p3 +'"/>';
            content +=                  '<label for="radio' + (3+3*i) + '">'+ values[i].p3 +'</label>';
            content +=              '</div>';
            content +=      '</div>';

            element.find('div').html(content).text();
    }

    ready();
}

/**
 * Display the button ready to start the game
 */
function ready()
{
    $('#ready').css('visibility', 'visible');
}

/* JEU ET CHRONO*/

function nextTab(elem) {

    $(elem).next().find('a[data-toggle="tab"]').click();
}

/**
 * Chronometer
 */
function chrono() {

    displayTime();

    interv = setInterval(function(){
        time = new Date(time - 1000);
        if(time<=0){
            if($('li#end').hasClass('active'))
            {
                submit();
            }
            else
            {
                moveNext();
            }
        }
        displayTime(time);
    }, 1000);
}

/**
 * Display the time
 */
function displayTime() {

    $('#time').text(time.getSeconds());
    $('#timebar').css('width', (time.getSeconds()*10) + "%");
}

/**
 * Move to the next question
 */
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