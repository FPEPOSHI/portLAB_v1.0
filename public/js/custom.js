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
            $("#l-p-i"+c).text(data);
            if($("#like-p-"+c).text() === "Like" || $("#like-p-"+c).text() == "Like")
                $("#like-p-"+c).text("Liked");
            else
                $("#like-p-"+c).text("Like");


        }
    });
});

//function likePro(c)
//{
//    var url = "/home/project/like/" + c;
//    $.get(url, null, function (data) {
//        if (data != -1) {
//            $("#l-p-i"+c).text(data);
//            if($("#like-p-"+c).text() === "Like" || $("#like-p-"+c).text() == "Like")
//                $("#like-p-"+c).text("Liked");
//            else
//                $("#like-p-"+c).text("Like");
//
//
//        }
//    });
//}
$('body').delegate('#d-ppppp','click',function(){
    var c = $(this).data('id');
    //alert(c);
    var url = "/home/download?id="+c;
    $.ajax({
        async : true,
        method : "GET",
        url : url,
        success: function (data) {
            //alert(data)
        }
    });


});

function validateFile() {
        var fileExtension = ['png', 'doc', 'docx'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            alert("Only formats are allowed : "+fileExtension.join(', '));
            return false;
        }
    return true;
    }

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
    }).modal('show');
});

function vPC()
{
    if($("#p1-c").val() != $("#p2-c").val())
    {
        var d = document.getElementById("w-p1");
        d.className = d.className + " has-warning";
        var dd = document.getElementById("w-p2");
        dd.className = dd.className + " has-warning";
        return false;
    }
    var r = false;
    $.ajax({
        async : false,
        url: "/profile/ch/P?f="+$('#p0-c').val()+"&f1="+$("#p1-c").val(),
        method: "GET",
        success: function(data){
            if(data != 0)
            {
                $('#e_pass').modal('toggle');
                r = false;
            }else{
                var dd = document.getElementById("w-p0");
                dd.className = dd.className + " has-warning";
            }
        }

    });
    return r;
}

function aaa(a,b,c)
{
    return false;
}

function checkU()
{
    var r = false;
    $.ajax({
        async : false,
        url: "/profile/ch/U?f="+$("#u-e-s-mod-a").val(),
        method: "GET",
        success: function(data){
            if(data == 1)
            {
                    r = true;
            }else{
                var dd = document.getElementById('e-usr-mod-a');
                dd.className = dd.className + " has-warning";
            }
        }

    });
    return r;
}
function downPro(a)
{
    $.ajax({
        async : false,
        url: "/home/download?p="+a,
        method: "GET",
        success: function(data){
            if(data == 1) {
                $('#request').modal({
                    backdrop: "static",
                    show: "false",
                }).on('show.bs.modal', function () {
                    var url = "/home/request?p=" + a;
                    $.get(url, null, function (dataa) {
                        $('#request').find('#request-u-t-d-p').html(dataa);
                    });
                }).modal('show');
            }else if (data == 2) {
                $('#info_pro').modal({
                    backdrop: "static",
                    show: "false",
                }).on('show.bs.modal', function () {
                }).modal('show');
            }else{
                    window.location.href = data;
            }
        }

    });
}
function checkUL()
{
    var r = false;
    $.ajax({
        async : false,
        url: "/profile/ch/U?f="+$("#r-usr-n-m-i").val(),
        method: "GET",
        success: function(data){
            if(data == 1)
            {
                r = true;
            }else{
                var dd = document.getElementById("r-usr-n-m");
                dd.className = dd.className + " has-warning";
            }
        }

    });
    return r;
}

function d_p_u(a)
{
    $('#d-project').modal({
        backdrop: "static",
        show: "false",
    }).on('show.bs.modal', function(){

    }).modal('show');
}

function getID()
{
    return $("#p-id-d-c").val();
}
function e_p(a)
{
    $('#e_prj').modal({
        backdrop: "static",
        show: "false",
    }).on('show.bs.modal', function(){
        var url = "/profile/pro/update?i="+a;
        $.get(url, null, function(data){
            $('#e_prj').find('#edt-pro-content').html($(data));
            $("#p-id-d-c").val(a);
        });
    }).modal('show');
}

function viewMore()
{
    alert("view more");
}

function getExtension(filename) {
    var parts = filename.split('.');
    return parts[parts.length - 1];
}
function isFile() {
    var ext = getExtension($('#id-projectfile').val());
    switch (ext.toLowerCase()) {
        case 'pdf':
        case 'doc':
        case 'docx':
        case 'ppt':
        case 'pptx':
            //etc
            return true;
    }
    var dd = document.getElementById("error-file-n-p");
    dd.className = dd.className + " has-warning";
    return false;
}

function sendReq(a)
{
    $.ajax({
        async : true,
        url :"/home/request/send?p="+a,
        method : "GET",
        success : function(data){
            $("#after-request-p").text('Request sent successful.');
            $("#after-request-p-btn").hide();
        }
    });
}

function search(){

    $.ajax({
        async : true,
        url :" /home/search?s="+$("#navbar-search-input").val() ,
        method : "GET",
        success : function(data){
        $("#a-p-s-d").html(data);
        }
    });
}

