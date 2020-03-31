/***********
** WIJS NAMESPACE
**************/



$(document).ready(function(event)
{
    $("#page_selection_js").val('index').prop("selected", true);
    var page = $("#page_selection_js").val();
 WIJS.viewjs(page);
WIJS.href();

            $("#js_btn").click(function()
    {

            var js               = $("#codejs").html(),



             //create data that will be sent over server

              script = {
                UserData:{
                    js           : js

                },
                FieldId:{
                    js           : "codejs"

                }
             };
             // send data to server
             WIJS.sendData(script);
        
    });


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

WIJS.editCode = function(href){

      var date = new Date();
                     var minutes = 30;
               date.setTime(date.getTime() + (minutes * 60 * 1000));
            $.cookie("src", href, {expires: date});
            window.location = "WIJs.php";
};




WIJS.href = function(){
    var href = $.cookie("src"); 
    console.log(href);


         $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "href",
            href   : href
        },
        success: function(result)
        {

         $("#codejs").html(result);

        }
       
        
    });


}


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



WIJS.sendData = function(script){

var btn = $("#js_btn");
    event.preventDefault();

     href = $.cookie("src"); 
    // put button into the loading state
    WICore.loadingButton(btn, $_lang.creating_Account);

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "new_js",
            script   : script,
            href     : href
        },
        success: function(result)
        {
            
            console.log(result);
            // return the button to normasl state
            WICore.removeLoadingButton(btn);
            
            //window.alert(result);
            //parse the data to json
            //var res = JSON.stringify(result);
            var res = JSON.parse(result);
            //var res = $.parseJSON(result);
            console.log(res);
            if(res.status === "error")
            {
                /// display all errors
                 for(var i=0; i<res.errors.length; i++) 
                 {
                    var error = res.errors[i];
                    WICore.displayadminerrorsMessage($("#"+error.id), error.msg);
                }
            }
            else if(res.status === "success")
            {
                // dispaly success message
                WICore.displaySuccessfulMessage($("#dresults"), res.msg);
                WICore.Refresh();
            }
        }
    });
}
