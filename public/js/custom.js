$('body').delegate('#u_p_project','click',function(){
    var usr = $(this).data('id');
    window.location.href = "/profile/"+usr;
});
$('body').delegate('#v_c_project','click',function(){
    var c = $(this).data('id');
    window.location.href = "/home/category/"+c;
});
$('body').delegate('#like-p','click',function(){
    var c = $(this).data('id');
    var url = "/home/project/like/" + c;
    $.get(url, null, function (data) {
         if (data != -1) {
            //$(this).html($('Liked'));
            //document.getElementById("like-nr-"+c).innerHTML = data[0].val();
             window.location.href = "/home";

         }
    });

});

$('body').delegate('#inf_up','click',function(){
    $('#e_sett').modal({
        backdrop: "static",
        show: "false",
    }).on('show.bs.modal', function(){
        var url = "/profile/editus";
        $.get(url, null, function(data){
            $('#editProject').find('#edit-content').html($(data));
        });
    }).modal('show');
});

$('body').delegate('#pass_up','click',function(){
    $('#e_pass').modal({
        backdrop: "static",
        show: "false",
    }).on('show.bs.modal', function(){
        var url = "/profile/editp";
        $.get(url, null, function(data){
            alert(data);
            //$('#editProject').find('#edit-content').html($(data));
        });
    }).modal('show');
});
