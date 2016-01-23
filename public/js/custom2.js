/**
 * Created by admin on 20/01/16.
 */

function viewUser(a)
{
    var i = $("#user-row-a-"+a).attr("data-id");

    $.ajax({
    async:true,
    method: "GET",
    url: '/home/a?i='+i,
    success:function(data){
        $("#usr-content-o-u").html(data);
    }
});






}
function d_p(a)
{
    $('#admin_del').modal({
        backdrop: "static",
        show: "false",
    }).on('show.bs.modal', function(){

    }).modal('show');

    $.ajax({
    async:true,
    method: "GET",
    url: '/home/b?i='+i,
    success:function(data){
        $("#delete").html(data);
    }
});
}
