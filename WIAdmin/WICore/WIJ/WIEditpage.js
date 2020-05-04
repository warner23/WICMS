/***********
** email NAMESPACE
**************/
$(document).ready(function(event)
{
                
    var page = $.cookie("page");
    var page_id = $.cookie("page_id");
   WIEditpage.getInfo(page);

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

    WIEditpage.loadPage(page);
    WIEditpage.loadOptions(page);

});


var WIEditpage = {}

WIEditpage.getInfo = function(page){

          $("#page-title").attr("placeholder", page)
 $("#page-title").attr("value", page)
$("#page_selection").val(page).prop("selected", "selected");

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

WIEditpage.assignMod = function(){
            $("#modal-assign-details").removeClass('hide fade');
            $("#modal-assign-details").addClass('show');
}


WIEditpage.assign = function(mod){

        var page = $("#page-title").val();
         $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "assign",
            mod   : mod,
            page  : page
        },
        success: function(result)
        {
            console.log(result);
            $("#mod-assigned").val(mod);
            $("#modal-assign-details").removeClass('show');
            $("#modal-assign-details").addClass('hide fade');
            WIEditpage.loadPage(page);
        }

        });
    
}

WIEditpage.closed = function(id){
    $("#modal-"+id+"-details").removeClass("show")
    $("#modal-"+id+"-details").addClass("hide fade")
 }

WIEditpage.loadPage = function(page){

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "loadPage",
            page   : page
        },
        success: function(result)
        {
            console.log(result);
            $("#pages").html(result);

        }
       
        
    });
}


WIEditpage.loadOptions = function(page){

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "loadOptions",
            page   : page
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

                if(res.content.length > 0){
                    $("#mod-assigned").val(res.content);
                }else{
                    $("#mod-assigned").val("No Module Assigned");
                }
                
            }

        }
       
        
    });
}

WIEditpage.changePage = function(page){

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "changePage",
            page   : page
        },
        success: function(result)
        {
            $("#pages").html(result);

        }
       
        
    });
}

WIEditpage.togglelsc = function(page){

         $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "togglelsc_change",
            page   : page,
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

WIEditpage.lsc = function(page){

         $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "lsc_change",
            page   : page,
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

WIEditpage.rsc = function(page){

         $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "rsc_change",
            page   : page,
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

var page = $("#page-title").val();
         $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "lsc_changed",
            page   : page,
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

var page = $("#page-title").val();
         $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "rsc_changed",
            page   : page,
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
