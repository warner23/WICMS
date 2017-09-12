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

    WIEditpage.loadPage(page_id);
    WIEditpage.loadOptions(page_id);



});


var WIEditpage = {}

WIEditpage.getInfo = function(page_id){
 $("#page-title").attr("placeholder", page_id)
 $("#page-title").attr("value", page_id)
$("#page_selection").val(page_id).prop("selected", "selected");

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
            var res = JSON.parse(result);

            if (res.status === "completed") {
               // alert(res.lsc);
                if (res.lsc > 0) {
                    $("#lsc").prop("checked", true);
                }else{
                    $("#lsc").attr("unchecked")
                }

            //alert(res.rsc);
                 if (res.rsc > 0) {
                     $("#rsc").prop("checked", true);                   
                }else{
                    $("#rsc").prop("unchecked");
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

            var res = JSON.parse(result);

            if (res.status == "complete") {
                //alert("hiy");
                if (res.lsc == 0) {
                   // alert("hey");
                    $("#lsc").attr("unchecked");
                    $("#sidenavL").remove();
                    //$("#Mid").removeClass("col-lg-12 col-md-8 col-sm-8");
                    //$("#Mid").addClass("col-lg-12 col-md-12 col-sm-12");
                     $("#block").removeClass("col-lg-10 col-md-8 col-sm-8");
                    $("#block").addClass("col-lg-12 col-md-12 col-sm-12");
                }else{
                    //alert("hoy");
                    $("#lsc").attr("checked");

                    var element = $("#col");
                    var Mid = $("#Mid");
                    $("#block").removeClass("col-lg-12 col-md-12 col-sm-12");
                    $("#block").addClass("col-lg-10 col-md-8 col-sm-8");
                    var Div = '<div class="col-sm-1 col-lg-2 cool-md-2 col-xl-2 col-xs-2 sidenav" id="sidenavL">'+ 
                    '</div>';
                    $("#block").before(Div);
                    $("#sidenavL").load("WIInc/edit/WIInc/left_sidebar.php");




                }
        }
       
        
    }
} );
}


WIEditpage.changeRHC = function(){

var page_id = $("#page-title").val();
         $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "rsc_changed",
            page   : page_id,
            col    : "right"
        },
        success: function(result)
        {
            console.log(result);

            var res = JSON.parse(result);

            if (res.status == "complete") {
                //alert("hiy");
                if (res.rsc == 0) {
                   // alert("hey");
                    $("#rsc").attr("unchecked");
                    $("#sidenavR").remove();
                    $("#block").removeClass("col-lg-10 col-md-8 col-sm-8");
                    $("#block").addClass("col-lg-12 col-md-12 col-sm-12");
                }else{
                    //alert("hoy");
                    $("#rsc").attr("checked");

                    var element = $("#col");
                    var Mid = $("#Mid");
                    $("#block").removeClass("col-lg-12 col-md-12 col-sm-12");
                    $("#block").addClass("col-lg-10 col-md-8 col-sm-8");
                    var Div = '<div class="col-sm-1 col-lg-2 cool-md-2 col-xl-2 col-xs-2 sidenavR" id="sidenavR">'+ 
                    '</div>';
                    $("#col").append(Div);
                    $("#sidenavR").load("WIInc/edit/WIInc/right_sidebar.php");




                }
        }
       
        
    }
} );
}

WIEditpage.edit = function(){
    
}