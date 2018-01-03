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

