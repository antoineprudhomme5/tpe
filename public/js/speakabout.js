$(document).ready(function() {

    'use strict';

    // CHRONO VARIABLES

    var interv;

    // DRAG AND DROP VARIABLES

    var dropZone = document.getElementById('drop-zone'); // the drag and drop zone
    var uploadForm = document.getElementById('js-upload-form'); // the form
    var formData = new FormData(uploadForm); // form objetct

    var startUpload = function(file) {
        $('#upload_success').show();
        $('#filename').text(file.name);

        formData.append('audio', file);
    };

    //var display_success = "success !!";
    var display_success = "<div class='alert alert-success' role='alert'>";
        display_success += "<strong>Success</strong>";
        display_success += "<span id='display_success'> File uploaded</span>";
        display_success += '<button class="btn btn-success pull-right"><a href="' + "{{ url('/games') }}" + '">return</a></button>';
        display_success += "</div>";

    // -----

    /**
     * Check the type of resource loaded and start the chronometer with analyze time
     */
    if( $('#resource_image').length )
    {
        var analyzeTime = 5;
        displayTime(0,analyzeTime);
        chrono(analyzeTime); // 5 secondes to analyze the image
    }
    else if( $('#resource_audio').length )
    {
        var audio = document.getElementById("audio");

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
                    $('#game_form').html(display_success);
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