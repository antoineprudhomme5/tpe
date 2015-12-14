$(document).ready(function(){
    var pathname = window.location.pathname;

    $('#ajax_delete').on('click', function() {
        var id = $(this).data("id");
        var tr = $(this).data("tr");
        $.ajax({
            type: "post",
            url: pathname+'/delete/'+id,
            data: 'id=' + id,
            dataType: 'json',
            success:function(json){
                if(json.reponse === 'success'){
                    bootstrap_alert.success(json.message);
                    location.reload();
                }else{
                    bootstrap_alert.danger(json.message);
                }
            },
            error: function() {
                alert('La requête n\'a pas abouti, veuillez prévenir l\'administrateur');
            }
        });
    });
});