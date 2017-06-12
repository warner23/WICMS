/***********
** email NAMESPACE
**************/
$(document).ready(function(event)
{
                
    var page_id = $.cookie("page_id");
   WIEditpage.getInfo(page_id);

  WIEditpage.NextMod();
 //executes code below when user click on pagination links
    $("#module").on( "click", ".pagination a", function (e){
        e.preventDefault();
        $(".loading-div").removeClass('closed'); //remove closed element
        $(".loading-div").addClass('open'); //show loading element
        var page = $(this).attr("data-page"); //get page number from link

             $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "NextMod",
            lang   : 1,
            page : page
        },
        success: function(result)
        {
            $("#module").html(result);
              $(".loading-div").removeClass('open'); //remove closed element
        $(".loading-div").addClass('closed'); //show loading element
        }
       
        
    });

         });
    WIEditpage.togglelsc(page_id);
   // WIEditpage.rsc(page_id);
    WIEditpage.loadPage(page_id);
    WIEditpage.loadOptions(page_id);



});


var WIEditpage = {}

WIEditpage.getInfo = function(page_id){
 $("#page-title").attr("placeholder", page_id)
 $("#page-title").attr("value", page_id)

}


WIEditpage.NextMod = function(){
         $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "NextModPage",
            lang   : 1
        },
        success: function(result)
        {
            $("#module").html(result);
              $(".loading-div").removeClass('open'); //remove closed element
        $(".loading-div").addClass('closed'); //show loading element
        }
       
        
    });
}


WIEditpage.loadPage = function(page_id){

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "loadPage",
            page   : page_id
        },
        success: function(result)
        {
            $("#pages").html(result);

        }
       
        
    });
}

WIEditpage.loadOptions = function(page_id){

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "loadOptions",
            page   : page_id
        },
        success: function(result)
        {
            if (result.status === "completed") {
                if (result.lsc == 0) {
                    $("#lsc").attr("unchecked");
                }else{
                    $("#lsc").attr("checked");
                }

                 if (result.rsc == 0) {
                    $("#rsc").attr("unchecked");
                }else{
                    $("#rsc").attr("checked");
                }
                
            }

        }
       
        
    });
}

WIEditpage.changePage = function(page_id){

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "changePage",
            page   : page_id
        },
        success: function(result)
        {
            $("#pages").html(result);

        }
       
        
    });
}

WIEditpage.togglelsc = function(page_id){

         $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "togglelsc_change",
            page   : page_id,
            col    : "left_sidebar"
        },
        success: function(result)
        {
            console.log(result);
            var res = JSON.parse(result);
            console.log(res.lsc);
            if (res.status === "complete") {
                if (res.lsc == 0){
                    $("#lsc").attr("unchecked");
                }else{
                    $("#lsc").attr("checked");
                }
        }
       
        
    }
} );
}

WIEditpage.lsc = function(page_id){

         $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "lsc_change",
            page   : page_id,
            col    : "left"
        },
        success: function(result)
        {
            console.log(result);
            if (result.status === "completed") {
                if (result.lsc == 0) {
                    $("#lsc").attr("unchecked");
                }else{
                    $("#lsc").attr("checked");
                }
        }
       
        
    }
} );
}

WIEditpage.rsc = function(page_id){

         $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "rsc_change",
            page   : page_id,
            col    : "right"
        },
        success: function(result)
        {
                 if (result.rsc == 0) {
                    $("#rsc").attr("unchecked");
                }else{
                    $("#rsc").attr("checked");
                }
        }
       
        
    });
}




WIEditpage.changeLHC = function(){

var page_id = $("#page-title").val();
         $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "lsc_changed",
            page   : page_id,
            col    : "left"
        },
        success: function(result)
        {
            console.log(result);
            if (result.status == "complete") {
                alert("hiy");
                if (result.lsc == 0) {
                    alert("hey");
                    $("#lsc").attr("unchecked");
                    $("#sidenavL").remove();
                    $("#Mid").removeClass("col-lg-10 col-md-8 col-sm-8");
                    $("#Mid").addClass("col-lg-12 col-md-12 col-sm-12");

                }else{
                    alert("hoy");
                    $("#lsc").attr("checked");

                    var element = $("#col");
                    $("#Mid").removeClass("col-lg-12 col-md-12 col-sm-12");
                    $("#Mid").addClass("col-lg-10 col-md-8 col-sm-8");
                    var Div = '<div class="col-sm-1 sidenav" id="sidenavL"><?php include_once "left_sidebar.php"; ?>'+ 
                    '</div><div class="col-lg-10 col-md-8 col-sm-8" id="Mid">';
                    element.append(Div);



                }
        }
       
        
    }
} );
}