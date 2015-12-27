$(document).ready(function(){
    tinymce.init({
        mode : "textareas",
        height : 200,
        plugins: [
            'advlist autolink lists link image charmap anchor',
            'searchreplace visualblocks',
            'insertdatetime media table contextmenu paste'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    });
});