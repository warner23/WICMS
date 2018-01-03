/***********
** WIJS NAMESPACE
**************/



$(document).ready(function(event)
{
    $("#page_selection_js").val('index').prop("selected", true);
    var page = $("#page_selection_js").val();
 WIJS.viewjs(page);
});


var WIJS = {}

WIJS.viewjs = function (page) {


     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "viewjs",
            page : page
        },
        success: function(result)
        {

         $("#Viewjs").html(result);

        }
       
        
    });

   // WIMeta.addEditData.button.attr('onclick', 'WIMeta.addUser();');
};

WIJS.showJsModal = function (id) {
    event.preventDefault();

        $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "ViewEditJs",
            id   : id
        },
        success: function(result)
        {
    $("#modal-js-edit").removeClass("off");
    $("#modal-js-edit").addClass("on");
            $("#modal-js-edit").html(result);
        }
       
        
    });
 
};

WIJS.edditJsModal = function (id) {
    //jQuery.noConflict();

    var btn = $("#btn-edit-css");
    WICore.loadingButton(btn, $_lang.logging_in);

    var js = $("#js_href").val();
     //id = $(".css_id").attr('id')


     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "editJsDetails",
            id   : id,
            js : js
        },
        success: function(result)
        {
            WICore.removeLoadingButton(btn);
            $("#modal-js-edit").removeClass("on")
            $("#modal-js-edit").addClass("off")
            $("#js_results").html(result);
            var page = $("#page_selection_js").val();
            WIJS.viewjs(page);


        }
       
        
    });

   // WIMeta.addEditData.button.attr('onclick', 'WIMeta.addUser();');
};

WIJS.changePage = function(page_id){

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "changeJsPage",
            page   : page_id
        },
        success: function(result)
        {
            $("#Viewjs").html(result);

        }
       
        
    });
}


WIJS.DeleteJsModal = function (id) {
    event.preventDefault();

    $(".ajax-loading").removeClass('hide'); //remove closed element
        $(".ajax-loading").addClass('show'); //show loading element
        $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "deletejs",
            id   : id
        },
        success: function(result)
        {   
        if (result === "complete") {
        $(".ajax-loading").removeClass('show'); //remove closed element
        $(".ajax-loading").addClass('hide'); //show loading element
        var page = $("#page_selection_js").val();
 WIJS.viewjs(page);
        }           

        }
       
        
    });
 
};


WIJS.Close = function(){
        $("#modal-js-edit").removeClass("on")
    $("#modal-js-edit").addClass("off")
}