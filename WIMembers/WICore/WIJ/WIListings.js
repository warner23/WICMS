$(document).ready(function(){
  
    var ajax_call = function() {
    var userId = $(".modal-header").attr('id');   

    $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        dataType: "json",
        data: {
            action  : "checkrequest",
            userId  : userId
        },
        success: function (result) {
           // var res = JSON.parse(result);
            //console.log(res);
           if( result.status == 'requested' ){
                $("#modal-debate-request").css("display", "block");
                $("#details-body").html(result.msg);
           }else if( result.status == 'not_requested' ) {
               $("#modal-debate-request").css("display", "none");
           }

        }
    });
};

var X = 0.5;
var interval = 1000 * 60 * X; // where X is your every X minutes

setInterval(ajax_call, interval);
  
});


var WIListings = {};