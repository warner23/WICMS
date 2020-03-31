/***********
** WICSS NAMESPACE
**************/



$(document).ready(function(event)
{
    $("#page_selection_css").val('index').prop("selected", true);
    var page = $("#page_selection_css").val();
    WICSS.viewCss(page);

    WICSS.href();


        $("#css_btn").click(function()
    {

            var css               = $("#codecss").html(),



             //create data that will be sent over server

              styling = {
                UserData:{
                    css           : css

                },
                FieldId:{
                    css           : "codecss"

                }
             };
             // send data to server
             WICSS.sendData(styling);
        
    });

});

var WICSS = {}


WICSS.viewCss = function (page) {


     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "viewCss",
            page   : page
        },
        success: function(result)
        {

         $("#Viewcss").html(result);

        }
       
        
    });

   // WIMeta.addEditData.button.attr('onclick', 'WIMeta.addUser();');
};


WICSS.showCssModal = function (id) {
    event.preventDefault();

        $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "editCss",
            id   : id
        },
        success: function(result)
        {
            //alert(result);
    $("#modal-css-add").removeClass("off");
    $("#modal-css-add").addClass("on");
            $("#modal-css-add").html(result);
              $(".ajax-loading").removeClass('open'); //remove closed element
        $(".ajax-loading").addClass('closed'); //show loading element
        }
       
        
    });
 
};

WICSS.editCode = function(href){

      var date = new Date();
                     var minutes = 30;
               date.setTime(date.getTime() + (minutes * 60 * 1000));
            $.cookie("href", href, {expires: date});
            window.location = "WICss.php";
}

WICSS.edditCssModal = function (id) {
    //jQuery.noConflict();

    var btn = $("#btn-edit-css");
    WICore.loadingButton(btn, $_lang.logging_in);

    var css = $("#css_href").val();
     //id = $(".css_id").attr('id')


     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "editCssDetails",
            id   : id,
            css : css
        },
        success: function(result)
        {
            WICore.removeLoadingButton(btn);
            $("#modal-css-add").removeClass("on")
            $("#modal-css-add").addClass("off")
            $("#css_results").html(result);
            var page = $("#page_selection_css").val();
            WICSS.viewCss(page);


        }
       
        
    });

   // WIMeta.addEditData.button.attr('onclick', 'WIMeta.addUser();');
};

WICSS.changePage = function(page_id){

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "changeCssPage",
            page   : page_id
        },
        success: function(result)
        {
            $("#ViewMeta").html(result);

        }
       
        
    });
}

WICSS.deleteCssModal = function (id) {
    //jQuery.noConflict();
    $("#edit-css-modal").removeClass("off")
    $("#edit-css-modal").addClass("on")

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "DeleteMeta",
            id   : id
        },
        success: function(result)
        {
            if(result === "complete"){
                $("#modal-meta-edit").html(result);
              $(".ajax-loading").removeClass('open'); //remove closed element
        $(".ajax-loading").addClass('closed'); //show loading element
        var page = $("#page_selection_css").val();
        WICSS.viewCss(page);
            }
            

        }
       
        
    });

   // WIMeta.addEditData.button.attr('onclick', 'WIMeta.addUser();');
};


WICSS.Close = function(){
        $("#modal-css-add").removeClass("on")
    $("#modal-css-add").addClass("off")
}

WICSS.addCSS = function(){

 var  CSS  = $("#css").val()

    var btn = $("#btn-add-language");
    event.preventDefault();

    // put button into the loading state
    WICore.loadingButton(btn, $_lang.creating_Account);
    //alert("sending ...")

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "AddCSS",
            CSS   : CSS
        },
        success: function(result)
        {
            console.log(result);
            // return the button to normasl state
            WICore.removeLoadingButton(btn);
           
            //var res = JSON.stringify(result);
            var res = JSON.parse(result);
            //var res = $.parseJSON(result);
            //console.log(res);
            if(res.status === "error")
            {
                /// display all errors
                 for(var i=0; i<res.errors.length; i++) 
                 {
                    var error = res.errors[i];
                    WICore.displayErrorMessage($("#"+error.id), error.msg);
                }
            }
            else if(res.status === "successful")
            {
                // dispaly success message
                WICore.displaySuccessfulMessage($("#results"), res.msg);
                $("#css").val('');
                WICSS.Close();
                //WICore.displaySuccessMessage($(".msg"), res.msg);
            }
        }
    });
}


WICSS.href = function(){
    var href = $.cookie("href"); 
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

         $("#codecss").html(result);

        }
       
        
    });


}

WICSS.sendData = function(styling){

var btn = $("#css_btn");
    event.preventDefault();

     href = $.cookie("href"); 
    // put button into the loading state
    WICore.loadingButton(btn, $_lang.creating_Account);

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "new_css",
            styling   : styling,
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
