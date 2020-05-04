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

            var js = $("#codejs").html(),
            href = $.cookie("src"); 
             //create data that will be sent over server

              script = {
                ScriptData:{
                    js           : js,
                    href         : href

                },
                FieldId:{
                    js           : "codejs",
                    href         : "href"

                }
             };
             // send data to server
             WIJS.sendData(script);
    });


      $('#add_page_selection_js').on('change', function() {
      console.log( this.value );
      $('#addnewpage').attr("value",this.value).attr("type", "text");
      $('#add_page_selection_js').css("display","none");
      var preview = '<a href="javascript:void(0);" id="sp" onclick="WIJS.switchPage(`'+this.value+'`);">Change Page</a>';
      $('#addyjschangePage').html(preview);
  });

});


var WIJS = {}

WIJS.switchPage = function(value){
      $('#add_page_selection_js').css("display","block");
      $('#addpage').attr("value",value).attr("type", "hidden");
      var preview = '<a href="javascript:void(0);" id="sp" onclick="WIJS.switchPage();">Change Page</a>';
      $('#addychangePage').remove('#sp');
}

WIJS.editswitchPage = function(value){
      $('#edit_page_selection_js').css("display","block");
      $('#editpage').attr("value",value).attr("type", "hidden");
      var preview = '<a href="javascript:void(0);" id="sp" onclick="WIJS.editswitchPage();">Change Page</a>';
      $('#editaddyjschangePage').remove('#sp');
}


WIJS.addScriptModal = function($id){
    event.preventDefault();
    $("#modal-js-add-details").removeClass("hide").addClass("show");
}


WIJS.showEditCodeModal = function(id){
    event.preventDefault();
    $("#modal-js-edit-details").removeClass("hide").addClass("show");
    $("#editjsid").attr("value", id);

         $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "ViewEditJs",
            id : id
        },
        success: function(result)
        {
            var res = JSON.parse(result);
        $("#editjs").attr("value", res.src);
        $("#editnewpage").attr("value", res.page).attr("type","text");
        $("#edit_page_selection_js").val(res.page).prop("selected", "selected").css("display", "none");
        var preview = '<a href="javascript:void(0);" id="sp" onclick="WIJS.editswitchPage(`'+this.value+'`);">Change Page</a>';
      $('#editaddyjschangePage').html(preview);

      $(".ajax-loading").removeClass('show').addClass('hide');
        }
    });

}

WIJS.showJsDelete = function(id){
    event.preventDefault();
    $("#modal-js-delete-details").removeClass("hide").addClass("show");
    $(".delete_id").attr("id",id);
}



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

WIJS.addjs = function () {
    //jQuery.noConflict();

    var js = $("#addjs").val();
        page = $("#addnewpage").val();

             //create data that will be sent over server

              script = {
                JsData:{
                    js           : js,
                    page         : page

                },
                FieldId:{
                    js           : "src",
                    page         : "page"

                }
             };
    $(".ajax-loading").removeClass("hide").addClass("show");

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "new_js",
            script   : script
        },
        success: function(result)
        {
            $(".ajax-loading").removeClass("show").addClass("hide");
            $("#modal-js-edit").removeClass("on")
            $("#modal-js-edit").addClass("off")
            $("#js_results").html(result);
            var page = $("#page_selection_js").val();
            WIJS.viewjs(page);
            WIJS.editCode(js);


        }
    });

};

WIJS.editjs = function () {
    //jQuery.noConflict();

    var js = $("#editjs").val();
        page = $("#editnewpage").val();
        id = $("#editjsid").val();

             //create data that will be sent over server

              script = {
                JsData:{
                    js           : js,
                    page         : page,
                    id           : id

                },
                FieldId:{
                    js           : "src",
                    page         : "page",
                    id           : "id"

                }
             };
    $(".ajax-loading").removeClass("hide").addClass("show");

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "editJsDetails",
            script   : script
        },
        success: function(result)
        {
            $(".ajax-loading").removeClass("show").addClass("hide");
            $("#modal-js-edit-details").removeClass("show").addClass("hide");
            $("#js_results").html(result);
            var page = $("#page_selection_js").val();
            WIJS.viewjs(page);


        }
    });

};

WIJS.editCode = function(href){
    console.log(href);
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
            console.log(result);
         $("#codejs").html(result);

        }
        
    });
}


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


WIJS.Deletejs = function () {
    event.preventDefault();
    var id = $(".delete_id").attr('id');

   $(".ajax-loading").removeClass("hide").addClass("show");
        $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "deletejs",
            id   : id
        },
        success: function(result)
        {   

         $(".ajax-loading").removeClass("show").addClass("hide");
         WIJS.closed('js-delete');
        var page = $("#page_selection_js").val();
        WIJS.viewjs(page);
        }
       
        });
 
};


WIJS.closed = function(ele){
   $("#modal-"+ele+"-details").removeClass("show").addClass("hide");
}



WIJS.sendData = function(script){

var btn = $("#js_btn");
    event.preventDefault();

    // put button into the loading state
    WICore.loadingButton(btn, $_lang.creating_Account);

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "editScript",
            script   : script
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
                window.location = "WIStyling.php";
            }
        }
    });
}

WIJS.go_back = function(){
    window.location = "WIStyling.php";
}