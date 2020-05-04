/***********
** WIPageoptions NAMESPACE
**************/
$(document).ready(function(event)
{
                

});


var WIPageoptions = {}

WIPageoptions.getInfo = function(page){

          $("#page-title").attr("placeholder", page)
 $("#page-title").attr("value", page)
$("#page_selection").val(page).prop("selected", "selected");

}

WIPageoptions.loadPageOptions = function(page){

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "loadPageOptions",
            page   : page
        },
        success: function(result)
        {
            console.log(result);
            var res = JSON.parse(result);


            if (res.status === "completed") {
                // get page info and set as title
                 WIPageoptions.getInfo(page);
                 $('#optionshide').css({ display: "block" });

               // alert(res.lsc);
                if(res.panel > 0){
                    $("#panelswitch").prop("checked", true);
                }else{
                    $("#panelswitch").attr("unchecked")
                } 
                 $("#panel").attr("value", res.panel);

                
                if (res.lsc > 0) {
                    $("#lsc").prop("checked", true);
                }else{
                    $("#lsc").attr("unchecked")
                }

                if(res.top_head > 0){
                    $("#top_headswitch").prop("checked", true);
                }else{
                    $("#top_headswitch").attr("unchecked")
                } 
                 $("#top_head").attr("value", res.top_head);

                 if(res.menu > 0){
                    $("#menuswitch").prop("checked", true);
                }else{
                    $("#menuswitch").attr("unchecked")
                } 
                 $("#menu").attr("value", res.menu);
               
                if(res.header > 0){
                    $("#headerswitch").prop("checked", true);
                }else{
                    $("#headerswitch").attr("unchecked")
                } 
                 $("#header").attr("value", res.menu);

            //alert(res.rsc);
                 if (res.rsc > 0) {
                     $("#rsc").prop("checked", true);                   
                }else{
                    $("#rsc").prop("unchecked");
                }

                 if(res.footer > 0){
                    $("#footerswitch").prop("checked", true);
                }else{
                    $("#footerswitch").attr("unchecked")
                } 
                 $("#footer").attr("value", res.footer);
                
            }

        }
       
        
    });
}

WIPageoptions.changePage = function(page){

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

WIPageoptions.togglelsc = function(page){

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

WIPageoptions.lsc = function(page){

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

WIPageoptions.rsc = function(page){

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


WIPageoptions.changePage = function(element){

var page = $("#page-title").val();
         $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "changePageElement",
            page   : page,
            element:element
        },
        success: function(result)
        {
            console.log(result);

            var res = JSON.parse(result);

            if (res.status == "complete") {
                //alert("hiy");
                if (res.panel == 0) {
                   // alert("hey");
                    $("#"+element).attr("unchecked");
                    
                }else{
                    //alert("hoy");
                    $("#"+element).attr("checked");

                }
        }
    }
} );
}



WIPageoptions.changeLHC = function(){

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


WIPageoptions.changeRHC = function(){

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
