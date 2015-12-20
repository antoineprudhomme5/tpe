var formData = new FormData();

$(document).ready(function(){

    var dropZone = document.getElementById('drop-zone'); // the drag and drop zones

    dropZone.ondrop = function(e) {
        e.preventDefault();
        this.className = 'upload-drop-zone';

        var file = e.dataTransfer.files[0];

        if(file['type'] === 'audio/mp3')
        {
            formData.append('type', 'audio');
        }
        else
        {
            formData.append('type', 'img');
        }

        startUpload(file);
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

function startUpload(file)
{
    formData.append('file', file);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // ajax request
    $.ajax({
        type: "POST",
        url: "../speak_about/store",
        data: formData,
        dataType : 'json',
        processData: false,
        contentType: false,
        success: function(data)
        {
            console.log(data);
        },
        error: function(request, status, error)
        {
            document.write(request.responseText);
            document.getElementById("js-upload-submit").disabled = false;
        }
    });
}