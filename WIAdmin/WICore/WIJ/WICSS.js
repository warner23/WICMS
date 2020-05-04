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
             href = $.cookie("href")

             //create data that will be sent over server

              styling = {
                UserData:{
                    css           : css,
                    href          : href

                },
                FieldId:{
                    css           : "codecss",
                    href          : "href"

                }
             };
             // send data to server
             WICSS.sendData(styling);
        
    });

      $('#page_selection_css').on('change', function() {
     // alert( this.value );
      WICSS.changePage(this.value);

    })


    $('#add_page_selection_css').on('change', function() {
      console.log( this.value );
      $('#addpage').attr("value",this.value).attr("type", "text");
      $('#add_page_selection_css').css("display","none");
      var preview = '<a href="javascript:void(0);" id="sp" onclick="WICSS.switchPage(`'+this.value+'`);">Change Page</a>';
      $('#addychangePage').html(preview);


      //$("select#add_page_selection_css option["this.value"]").attr("selected","selected");

    })

});

var WICSS = {}

WICSS.switchPage = function(value){
      $('#add_page_selection_css').css("display","block");
      $('#addpage').attr("value",value).attr("type", "hidden");
      var preview = '<a href="javascript:void(0);" id="sp" onclick="WICSS.switchPage();">Change Page</a>';
      $('#addychangePage').remove('#sp');
}

WICSS.editswitchPage = function(value){
      $('#edit_page_selection_css').css("display","block");
      $('#editpage').attr("value",value).attr("type", "hidden");
      var preview = '<a href="javascript:void(0);" id="sp" onclick="WICSS.switchPage();">Change Page</a>';
      $('#editaddychangePage').remove('#sp');
}

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
    $("#modal-add-css-details").removeClass("hide").addClass("show");
};

WICSS.editcssCode = function (id) {
    event.preventDefault();
    $("#modal-edit-css-details").removeClass("hide").addClass("show");
    $(".ajax-loading").removeClass('hide').addClass('show');

        $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "editCss",
            id   : id
        },
        success: function(result)
        {
         var res = JSON.parse(result);
        $("#editcss").attr("value", res.href);
        $("#editpage").attr("value", res.page).attr("type","text");
        $("#edit_page_selection_css").val(res.page).prop("selected", "selected").css("display", "none");
        var preview = '<a href="javascript:void(0);" id="sp" onclick="WICSS.editswitchPage(`'+this.value+'`);">Change Page</a>';
      $('#editaddychangePage').html(preview);
        $("#css_id").attr('value', id);

      $(".ajax-loading").removeClass('show').addClass('hide');
        }  
    });
 
};


WICSS.editCss = function(){

        event.preventDefault();
     var  CSS  = $("#editcss").val(),
      page = $("#editpage").val(),
      id = $("#css_id").val();
 $(".ajax-loading").removeClass('hide').addClass('show');
    //var btn = $("#btn-add-language");

         var CSS = {
                CssData:{
                       CSS        : CSS,
                    page           : page,
                    id             : id

                },
                FieldId:{
                    CSS           : "href",
                    page         : "page",
                    id            : "id"

                }
             };
        $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "editCssDetails",
            CSS   : CSS
        },
        success: function(result)
        {
        $("#modal-edit-css-details").removeClass("show").addClass("hide");
        $(".ajax-loading").removeClass('show').addClass('hide');
        WICSS.viewCss(page);
        }  
    });
}

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

     $(".ajax-loading").removeClass("hide").addClass("show");
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
            $(".ajax-loading").removeClass("show").addClass("hide");
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
            $("#Viewcss").html(result);

        } 
    });
}

WICSS.CssDelete = function (id) {
    //jQuery.noConflict();
    $("#modal-delete-css-details").removeClass("hide").addClass("show");
    $(".delete_id").attr("id", id);

};

WICSS.deleteCss = function () {

    var id = $(".delete_id").attr("id");
    $(".ajax-loading").removeClass("hide").addClass("show");
     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "DeleteCss",
            id   : id
        },
        success: function(result)
        {

        $(".ajax-loading").removeClass("show").addClass("hide");
        $("#modal-delete-css-details").removeClass("show").addClass("hide");
        WICore.Refresh();
            
        } 
    });

   // WIMeta.addEditData.button.attr('onclick', 'WIMeta.addUser();');
};


WICSS.Closed = function(){
   $("#modal-add-css-details").removeClass("show").addClass("hide");
}

WICSS.addCss = function(){

 var  CSS  = $("#addcss").val();
      page = $("#addpage").val();


    //var btn = $("#btn-add-language");

         var style = {
                CssData:{
                       CSS        : CSS,
                    page           : page

                },
                FieldId:{
                    CSS           : "href",
                    page         : "page"

                }
             };

    event.preventDefault();

    // put button into the loading state
   // WICore.loadingButton(btn, $_lang.creating_Account);
    //alert("sending ...")
$(".ajax-loading").removeClass("hide").addClass("show");
     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "AddCSS",
            style   : style
        },
        success: function(result)
        {
            console.log(result);
            // return the button to normasl state
            //WICore.removeLoadingButton(btn);
           
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
                $(".ajax-loading").removeClass("show").addClass("hide");
                WICore.displaySuccessfulMessage($("#results"), res.msg);
                $("#addcss").val('');
                 $("#modal-add-css-details").removeClass("show").addClass("hide");
                //WICore.Refresh();
                WICSS.viewCss(page);
                WICSS.editCode(CSS);
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

    
    // put button into the loading state
    WICore.loadingButton(btn, $_lang.creating_Account);

$(".ajax-loading").removeClass("hide").addClass("show");
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
              $(".ajax-loading").removeClass("show").addClass("hide");
                // dispaly success message
                WICore.displaySuccessfulMessage($("#dresults"), res.msg);
               window.location = "WIStyling.php";
            }
        }
    });
}

WICSS.go_back = function(){
    window.location = "WIStyling.php";
}
