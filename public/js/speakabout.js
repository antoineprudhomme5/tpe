var interv;

$(document).ready(function() {

    'use strict';

    // DRAG AND DROP VARIABLES

    var dropZone = document.getElementById('drop-zone'); // the drag and drop zone
    var uploadForm = document.getElementById('js-upload-form'); // the form
    var formData = new FormData(uploadForm); // form objetct

    var startUpload = function(file) {
        $('#upload_success').show();
        $('#filename').text(file.name);

        formData.append('audio', file);
    };

    // AJAX REQUEST TO GET THE GAME RESOURCE

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:  'get_speak_about',
        type: "POST",
        cache: false,
        dataType : 'json',
        success: function(data)
        {
            if(data[0].type === 'img')
            {
                speakAboutImage(data[0]);
            }
            else if(data[0].type === 'audio')
            {
                speakAboutAudio(data[0]);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            document.write(JSON.stringify(jqXHR));
            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        },
        complete: function()
        {
            console.log('complete');
            $('#ready').css('visibility', 'visible');
        }
    });

    /**
     * Event: click on the submit button to send the recording
     */
    $('#js-upload-submit').on('click', function(){

        // ajax request to upload the file, on success => send the form
        // add a token to the ajax request
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // ajax request
        $.ajax({
            type: "POST",
            url: "upload_audio",
            data: formData,
            dataType : 'json',
            processData: false,
            contentType: false,
            success: function(response)
            {
                if(response === 'success')
                {
                    console.log('success');
                    //$('#game_form').html(display_success);
                    // window.location.replace("http://localhost/tpe/public/games");
                }
                else
                {
                    $('#upload_error').css('display', true);
                    $('#error_message').text('Error during the upload');
                    document.getElementById("js-upload-submit").disabled = false;
                }
            },
            error: function(request, status, error)
            {
                document.write(request.responseText);
                document.getElementById("js-upload-submit").disabled = false;
            }
        });
    });

    dropZone.ondrop = function(e) {
        e.preventDefault();
        this.className = 'upload-drop-zone';

        var file = e.dataTransfer.files[0];

        if(file['type'] === 'audio/mp3')
        {
            clearInterval(interv);
            formData.append('time', $('#chrono').text());
            startUpload(file);
        }
        else
        {
            $('#upload_error').show();
            $('#error_message').text('your file must be a .mp3');
        }
    };

    dropZone.ondragover = function() {
        this.className = 'upload-drop-zone drop';
        return false;
    };

    dropZone.ondragleave = function() {
        this.className = 'upload-drop-zone';
        return false;
    };

});

/**
 * prepare the game to speak about an image
 */
function speakAboutImage(data)
{
    console.log('img');
    var imageResource = '<h4>This picture</h4>';
        imageResource += '<p>You have 15 secondes before the chronometer starts. During this time, analyse thephoto below. After that, record yourself with Audacity or another software byspeaking 1 or 2 minutes on the picture.</p>';
        imageResource += '<img id="resource_image" src="../../'+ data.link +'" class="img-responsive" alt="Responsive image">';
    $('#game-resource').html(imageResource);

    var analyzeTime = 5;
    displayTime(0,analyzeTime);
    $('#ready').on('click', function() {
        $('#loading').css('visibility', 'hidden');
        $('#ready').css('visibility', 'hidden');
        $('#game').css('visibility', 'visible');
        chrono(analyzeTime); // 5 secondes to analyze the image
    });
}

/**
 * prepare the game to speak about an audio file
 */
function speakAboutAudio (data)
{
    console.log('audio');
    var audioResource = '<h4>This recording</h4>';
        audioResource += ' <p>When your listening will be ended ,the chronometer will starts. During this time, analyse the photo below. After that, record yourself with Audacity or another software by speaking 1 or 2 minutes.</p>';
        audioResource += '<div class="text-center">' +
                            '<audio controls id="audio">' +
                                '<source id="resource_audio" src="../../'+ data.link +'" type="audio/mpeg">' +
                            '</audio>' +
                        '</div>';
    $('#game-resource').html(audioResource);

    var audio = document.getElementById("audio");

    $('#ready').on('click', function() {
        $('#loading').css('visibility', 'hidden');
        $('#ready').css('visibility', 'hidden');
        $('#game').css('visibility', 'visible');
    });

    // only on the first listening
    $('#audio').one('play', function() {

        var analyzeTime = Math.floor(audio.duration) + 1;
        displayTime(0,analyzeTime);
        chrono(analyzeTime); // chrono start after the listening
    });
}

/**
 * Calculate the chronometer time
 * @param analyzeTime the time before start the chronometer (time to analyse the resource before start recording)
 */
function chrono(analyzeTime)
{
    var i = analyzeTime;
    var m = 0; // minutes
    var s = 0; // seconds

    interv = setInterval(function() {
        // if analyze time ended
        if(i == 0)
        {
            $('#chrono').css('color', 'black');
        }
        // analyze time
        if(i > 0)
        {
            i--;
            displayTime(0,i);
        }
        // chronometer
        else if(i <= 0)
        {
            i--;
            s++;
            if(s > 59)
            {
                m++;
                s = 0;
            }
            displayTime(m,s);
        }
    }, 1000); // each second
}

/**
 * Display the chronometer time 'mm:ss'
 * @param m the minutes
 * @param s the seconds
 */
function displayTime(m, s)
{
    var time = '';

    if(m < 10)
    {
        time += '0' + m + ':';
    }
    else
    {
        time += m + ':';
    }

    if(s < 10)
    {
        time += '0' + s;
    }
    else
    {
        time += s;
    }

    $('#chrono').text(time); // set the time on the page
}