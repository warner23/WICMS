/***********
** WIMeta NAMESPACE
**************/

$(document).ready(function(event)
{
    
});

var WIMenu = {}


WIMenu.newItem = function () {
    event.preventDefault();
    $("#modal-menu-new-details").removeClass("hide").addClass("show");
};


WIMenu.editMenu = function (id) {

$(".ajax-loading").removeClass('hide').addClass('show');
     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "editMenu",
            id   : id
        },
        success: function(result)
        {
         var res = JSON.parse(result);
         $(".ajax-loading").removeClass('show').addClass('hide');
        $("#modal-menu-edit-details").removeClass("hide").addClass("show");
        $("#edit_menu_id").attr("value",res.id);
        $("#edit_menu_name").attr("value",res.name);
        $("#edit_menu_link").attr("value",res.link);

        }
       
        
    });

};

WIMenu.menuEdit = function () {
    //jQuery.noConflict();

    var btn = $("#btn-edit-meta");
    WICore.loadingButton(btn, "Saving");

    var name = $("#edit_menu_name").val(),
     link = $("#edit_menu_link").val(),
     id = $("#edit_menu_id").val()
$(".ajax-loading").removeClass('hide').addClass('show');
     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "menuEdit",
            id   : id,
            name : name,
            link : link
        },
        success: function(result)
        {
            WICore.removeLoadingButton(btn);
            $(".ajax-loading").removeClass('show').addClass('hide');
            $("#modal-menu-edit-details").removeClass("show").addClass("hide")
            WICore.Refresh();
        }
       
        
    });

};

WIMenu.menunew = function(){

    var name = $("#new_menu_name").val();
        link = $("#new_menu_link").val();

         menu = {
                MenuData:{
                    name           : name,
                    link          : link

                },
                FieldId:{
                    name           : "name",
                    link          : "link"

                }
             };
        $(".ajax-loading").removeClass('hide').addClass('show');
     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "newmenuitem",
            menu   : menu
        },
        success: function(result)
        {
            $(".ajax-loading").removeClass('show').addClass('hide');
          $("#modal-menu-new-details").removeClass("show").addClass("hide");
          WICore.Refresh();

        }
       
        
    });
}

WIMenu.deletemenuModal = function (id) {
    //jQuery.noConflict();
    $("#modal-meta-edit").removeClass("off")
    $("#modal-meta-edit").addClass("on")

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
        var page = $("#page_selection").val();
            }
            

        }
       
        
    });

};

WIMenu.deletemenu = function (id) {
    //jQuery.noConflict();
    $("#modal-meta-edit").removeClass("off")
    $("#modal-meta-edit").addClass("on")

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
        var page = $("#page_selection").val();
            }
            
        }
          
    });

};


WIMenu.Closed = function(ele){
    $("#modal-"+ele+"-details").removeClass("show").addClass("hide")
}

