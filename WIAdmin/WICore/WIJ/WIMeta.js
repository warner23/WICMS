/***********
** WIMeta NAMESPACE
**************/

$(document).ready(function(event)
{
    $("#page_selection").val('index').prop("selected", true);
    var page = $("#page_selection").val();
    //alert(page);
    WIMeta.viewMeta(page);
});

var WIMeta = {}



WIMeta.viewMeta = function (page) {

 //var page = $("#page_selection").attr("value");
     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "viewMeta",
            page : page
        },
        success: function(result)
        {

         $("#ViewMeta").html(result);

        }
       
        
    });

   // WIMeta.addEditData.button.attr('onclick', 'WIMeta.addUser();');
};


WIMeta.showMetaModal = function (id) {
    //jQuery.noConflict();
    

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "editMeta",
            id   : id
        },
        success: function(result)
        {
$("#modal-meta-edit").removeClass("off")
    $("#modal-meta-edit").addClass("on")
            $("#modal-meta-edit").html(result);

        }
       
        
    });

   // WIMeta.addEditData.button.attr('onclick', 'WIMeta.addUser();');
};

WIMeta.edditMetaModal = function () {
    //jQuery.noConflict();

    var btn = $("#btn-edit-meta");
    WICore.loadingButton(btn, $_lang.logging_in);

    var name = $("#meta_name").val(),
     content = $("#meta_content").val(),
     id = $(".meta_id").attr('id'),
     auth = $("#auth").val();


     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "editMetaDetails",
            id   : id,
            name : name,
            content : content,
            auth  : auth
        },
        success: function(result)
        {
            WICore.removeLoadingButton(btn);
            $("#modal-meta-edit").removeClass("on")
            $("#modal-meta-edit").addClass("off")
            $("#meta-results").html(result);
            var page = $("#page_selection").val();
            WIMeta.viewMeta(page);


        }
       
        
    });

   // WIMeta.addEditData.button.attr('onclick', 'WIMeta.addUser();');
};

WIMeta.changePage = function(page_id){

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "changeMetaPage",
            page   : page_id
        },
        success: function(result)
        {
            $("#ViewMeta").html(result);

        }
       
        
    });
}

WIMeta.deleteMetaModal = function (id) {
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
        WIMeta.viewMeta(page);
            }
            

        }
       
        
    });

   // WIMeta.addEditData.button.attr('onclick', 'WIMeta.addUser();');
};

WIMeta.AddMetaModal = function(){
        $("modal-meta-add").removeClass("off")
    $("#modal-meta-add").addClass("on")
}

WIMeta.Close = function(){
    $("#modal-meta-edit").removeClass("on")
    $("#modal-meta-edit").addClass("off")
}


$("body").delegate("#btn-edit-meta", "click", function(event){
        event.preventDefault();

        WIMeta.edditMetaModal();
        

    });

