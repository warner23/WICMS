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

    $("#modal-theme-details").removeClass("hide");
     $("#modal-theme-details").addClass("show");
}

WITheme.theme = function(){
    var name = $("#lang_namep").val();
         $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "theme",
            name : name
                    },
        success: function(result)
        {
            $("#modal-theme-details").removeClass("show");
     $("#modal-theme-details").addClass("hide");
     $("#lang_namep").val('');
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

// WITheme.deactive = function (id) {

//      $.ajax({
//         url: "WICore/WIClass/WIAjax.php",
//         type: "POST",
//         data: {
//             action : "themeDeactivate"        },
//         success: function(result)
//         {

//          WITheme.ViewTheme();

//         }
       
        
//     });
// };

