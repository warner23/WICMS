/***********
** WIMeta NAMESPACE
**************/

$(document).ready(function(event)
{
    $("#page_selection").val('index').prop("selected", true);
    var page = $("#page_selection").val();
    //alert(page);
    WIMeta.viewMeta(page);


      $('#edit_page_selection_meta').on('change', function() {
      console.log( this.value );
      $('#editpageMeta').attr("value",this.value).attr("type", "text");
      $('#edit_page_selection_meta').css("display","none");
      var preview = '<a href="javascript:void(0);" id="sp" onclick="WIMeta.editswitchPage(`'+this.value+'`);">Change Page</a>';
      $('#editaddychangePageMeta').html(preview);
  });

});

var WIMeta = {}


WIMeta.editswitchPage = function(value){
      $('#edit_page_selection_meta').css("display","block");
      $('#editpageMeta').attr("value",value).attr("type", "hidden");
      var preview = '<a href="javascript:void(0);" id="sp" onclick="WICSS.switchPage();">Change Page</a>';
      $('#editaddychangePage').remove('#sp');
}

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

};


WIMeta.showMetaModal = function (id) {
    $("#modal-meta-edit-details").removeClass("hide").addClass("show");
    $(".ajax-loading").removeClass('hide').addClass('show');
     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "editMeta",
            id   : id
        },
        success: function(result)
        {
            var res = JSON.parse(result);
            $("#meta_id").attr('value',res.id);
            $("#meta_name").attr('value',res.name);
            $("#meta_content").attr('value',res.content);

            $("#editpageMeta").attr("value", res.page).attr("type","text");
        $("#edit_page_selection_meta").val(res.page).prop("selected", "selected").css("display", "none");
        var preview = '<a href="javascript:void(0);" id="sp" onclick="WIMeta.editswitchPage(`'+this.value+'`);">Change Page</a>';
      $('#editaddychangePage').html(preview);

            $(".ajax-loading").removeClass('show').addClass('hide');
//            $("#modal-meta-edit-details").removeClass("show").addClass("hide");

        }
       
        
    });

};



WIMeta.editMeta = function () {
    //jQuery.noConflict();


    var name = $("#meta_name").val(),
     content = $("#meta_content").val(),
     meta_id = $("#meta_id").attr('value'),
     page = $("#editpageMeta").val();

    meta = {
                MetaData:{
                    name           : name,
                    content           : content,
                    page           : page,
                    meta_id           : meta_id

                },
                FieldId:{
                    name           : "name",
                    content           : "content",
                    page           : "page",
                    meta_id           : "meta_id"

                }
             };

$(".ajax-loading").removeClass('hide').addClass('show');
     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "editMetaDetails",
            meta   : meta
        },
        success: function(result)
        {
            $(".ajax-loading").removeClass('show').addClass('hide');
            $("#modal-meta-edit-details").removeClass("show").addClass("hide");
            WIMeta.viewMeta(page);


        }
       
        
    });

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

};

WIMeta.AddMetaModal = function(){
        $("modal-meta-add").removeClass("off")
    $("#modal-meta-add").addClass("on")
}

WIMeta.Close = function(){
    $("#modal-meta-edit").removeClass("on")
    $("#modal-meta-edit").addClass("off")
}


