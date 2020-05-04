/***********
** WITheme NAMESPACE
**************/
$(document).ready(function(event)
{
    WITheme.viewThemes(); 
});

var WITheme = {}

WITheme.viewThemes = function () {
 //var page = $("#page_selection").attr("value");
     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "viewThemes"        },
        success: function(result)
        {

         $("#ViewTheme").html(result);

        }
    });
};

WITheme.activate = function (id) {

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "themeActivate",
            id : id
                    },
        success: function(result)
        {

         WITheme.viewThemes();

        }
    });
};

WITheme.newTheme = function (){
    event.preventDefault();
    $("#modal-theme-add-details").removeClass("hide").addClass("show");
}



WITheme.DeleteThemeModal = function (id){
    $("#modal-theme-delete-details").removeClass("hide").addClass("show");
    $(".delete_id").attr("id", id);
}

WITheme.closed = function (ele){
    $("#modal-"+ele+"-details").removeClass("show").addClass("hide");
}



WITheme.addtheme = function(){
    var name = $("#addtheme").val();
    $(".ajax-loading").removeClass("hide").addClass("show");
         $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "theme",
            name : name
                    },
        success: function(result)
        {
            $(".ajax-loading").removeClass("show").addClass("hide");
         $("#modal-theme-add-details").removeClass("show").addClass("hide");
        $("#addtheme").val('');
         WITheme.viewThemes();

        }
    });
}

WITheme.setTheme = function(id){

    var val  = $("#WITheme-"+id).val()
    $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "setTheme",
            id : id,
            val  : val
                    },
        success: function(result)
        {

        WITheme.viewThemes();

        }
    });
}

WITheme.Deletetheme = function(){
    var id = $(".delete_id").attr('id');
    $(".ajax-loading").removeClass("hide").addClass("show");
         $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "deletetheme",
            id : id
                    },
        success: function(result)
        {
            $(".ajax-loading").removeClass("show").addClass("hide");
         $("#modal-theme-delete-details").removeClass("show").addClass("hide");
         WITheme.viewThemes();

        }
    });
}
