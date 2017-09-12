$(document).ready(function(){
  
WIListings.List();

WIListings.checkRequests();



    $("#DebateList").on( "click", ".pagination a", function (e){
        e.preventDefault();
        $(".loading-div").removeClass('closed'); //remove closed element
        $(".loading-div").addClass('open'); //show loading element
        var column = "vote";
        var page = $(this).attr("data-page"); //get page number from link

    $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "Lists",
            lang   : 1,
            page : page,
            col : column
        },
        success: function(result)
        {
            $("#DebateList").html(result);
              $(".loading-div").removeClass('open'); //remove closed element
        $(".loading-div").addClass('closed'); //show loading element
        }
       
        
       });

   });
  
});


var WIListings = {};

WIListings.checkRequests = function(){

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
}


WIListings.List = function(){

var column = "vote";
        $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "List",
            lang   : 1,
            col : column
        },
        success: function(result)
        {
            $("#DebateList").html(result);
              $(".loading-div").removeClass('open'); //remove closed element
        $(".loading-div").addClass('closed'); //show loading element
        }
       
        
    });

}