$(document).ready(function() {

    'use strict';

    // UPLOAD CLASS DEFINITION
    // ======================

    var dropZone = document.getElementById('drop-zone');
    var uploadForm = document.getElementById('js-upload-form');
    var formData = new FormData(uploadForm);

    var startUpload = function(file) {
        $('#upload_success').show();
        $('#filename').text(file.name);

        formData.append('audio', file);
    };

    $('#js-upload-submit').on('click', function(e){

        document.getElementById("js-upload-submit").disabled = true;
        // ajax request to upload the file, on success => send the form
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "upload_audio",
            data: formData,
            dataType : 'json',
            processData: false,
            contentType: false,
            success: function(response)
            {
                console.log(response);
                document.getElementById("js-upload-submit").disabled = false;
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

