$(document).ready(function() {

    'use strict';

    // UPLOAD CLASS DEFINITION
    // ======================

    var dropZone = document.getElementById('drop-zone');
    var uploadForm = document.getElementById('js-upload-form');
    var formData = new FormData(uploadForm);

    var startUpload = function(file) {
        console.log(file);
        $('#upload_success').show();
        $('#filename').text(file.name);
        formData.append('file', file, file.name);
    };

    dropZone.ondrop = function(e) {
        e.preventDefault();
        this.className = 'upload-drop-zone';

        startUpload(e.dataTransfer.files[0]); //uniquement le 1er fichier upload
    };

    dropZone.ondragover = function() {
        this.className = 'upload-drop-zone drop';
        return false;
    };

    dropZone.ondragleave = function() {
        this.className = 'upload-drop-zone';
        return false;
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

});

