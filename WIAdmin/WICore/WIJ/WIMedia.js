$(document).ready(function(){

  $("img").click(function() {      
    $(this).toggleClass("hover");
    var id = $(".hover").attr("id");
   // alert(id);
    WIMedia.change(id);
  });

  var obj = $("#dragandrophandler");
  var dir = $("#supload").attr("value");
obj.on('dragenter', function (e) 
{
    e.stopPropagation();
    e.preventDefault();
    $(this).css('border', '2px solid #0B85A1');
});
obj.on('dragover', function (e) 
{
     e.stopPropagation();
     e.preventDefault();
});
obj.on('drop', function (e) 
{
 
     $(this).css('border', '2px dotted #0B85A1');
     e.preventDefault();
     var files = e.originalEvent.dataTransfer.files;
 
     //We need to send dropped files to Server
     handleFileUpload(files,obj,dir);
});
$(document).on('dragenter', function (e) 
{
    e.stopPropagation();
    e.preventDefault();
});
$(document).on('dragover', function (e) 
{
  e.stopPropagation();
  e.preventDefault();
  obj.css('border', '2px dotted #0B85A1');
});
$(document).on('drop', function (e) 
{
    e.stopPropagation();
    e.preventDefault();
});

});

var WIMedia = {};

WIMedia.media = function(){
   $("#modal-header-edit-details").removeClass("hide");
    $("#modal-header-edit-details").addClass("show");
     $("#modal-header-media-details").removeClass("hide");
    $("#modal-header-media-details").addClass("show");
}

WIMedia.pagemedia = function(){
   $("#modal-page-edit-details").removeClass("hide");
    $("#modal-page-edit-details").addClass("show");
     $("#modal-page-media-details").removeClass("hide");
    $("#modal-page-media-details").addClass("show");
}

WIMedia.changeiconPic = function(){
   $("#modal-favicon-edit").removeClass("on");
    $("#modal-favicon-edit").addClass("off");
     $("#modal-favicon-media").removeClass("off");
    $("#modal-favicon-media").addClass("on");
}


  WIMedia.changePic = function(ele){

  	     $("#modal-"+ele+"-details").removeClass("hide");
    $("#modal-"+ele+"-details").addClass("show");
  }

    WIMedia.editPic = function(ele){

    var t = $(event.target).parent().parent().children();
    t.closest('.view').attr('id','newpic');
    $("#modal-"+ele+"-details").removeClass("hide");
    $("#modal-"+ele+"-details").addClass("show");
  }

WIMedia.changefaviconPic = function(){

         $("#modal-favicon-edit").removeClass("off");
    $("#modal-favicon-edit").addClass("on");
  }

  WIMedia.closeEdit = function(){

  	 $("#modal-header-edit").removeClass("on");
    $("#modal-header-edit").addClass("off");
  }

  WIMedia.closed = function(ele){

     $("#modal-"+ele+"-details").removeClass("show");
    $("#modal-"+ele+"-details").addClass("hide");
  }

    WIMedia.closeFEdit = function(){

     $("#modal-favicon-edit").removeClass("on");
    $("#modal-favicon-edit").addClass("off");
  }

  WIMedia.closeMedia = function(){
    $("#modal-header-media").removeClass("on");
    $("#modal-header-media").addClass("off");
  }

    WIMedia.closeFMedia = function(){
    $("#modal-favicon-media").removeClass("on");
    $("#modal-favicon-media").addClass("off");
  }

  WIMedia.closeUpload = function(){
    $("#modal-header-upload").removeClass("on");
    $("#modal-header-upload").addClass("off");
  }

    WIMedia.closeFUpload = function(){
    $("#modal-favicon-upload").removeClass("on");
    $("#modal-favicon-upload").addClass("off");
  }

  WIMedia.change = function(img){

  	  	$("#modal-header-media").removeClass("on");
    $("#modal-header-media").addClass("off");
    $(".cp").attr("src", "WIMedia/Img/header/"+img);
    $(".cp").attr("id", img);
  }



  WIMedia.savePic = function(){

  	var img = $(".cp").attr("id");
  	//alert(img);

  	    $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "changePic",
            img    : img
                    },
        success: function(result)
        {
            var res = JSON.parse(result);
            if (res.status === "successful") {
             $("#results").append(res.msg).fadeOut("slow");
            
        }
    }
    });
  }

    WIMedia.savefaviconPic = function(){

    var img = $(".cp").attr("id");
    //alert(img);

        $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "changefaviconPic",
            img    : img
                    },
        success: function(result)
        {
            var res = JSON.parse(result);
            if (res.status === "successful") {
             $("#favresults").append(res.msg).fadeOut(5000);
            
        }
    }
    });
  }


  WIMedia.upload = function(){
  	  	     $("#modal-header-edit-details").removeClass("show");
    $("#modal-header-edit-details").addClass("hide");
  	  	$("#modal-header-upload-details").removeClass("hide");
    $("#modal-header-upload-details").addClass("show");

  }

    WIMedia.pageupload = function(){
             $("#modal-page-edit-details").removeClass("show");
    $("#modal-page-edit-details").addClass("hide");
        $("#modal-page-upload-details").removeClass("hide");
    $("#modal-page-upload-details").addClass("show");

  }

    WIMedia.faviconupload = function(){
             $("#modal-favicon-edit").removeClass("on");
    $("#modal-favicon-edit").addClass("off");
        $("#modal-favicon-upload").removeClass("off");
    $("#modal-favicon-upload").addClass("on");

  }

  WIMedia.ImageMedia = function(){
   // e.preventDefault();
  var files = files;
  var obj = $("#manmed");
 
     //We need to send dropped files to Server
     handleFileUpload(files,obj);


  }

  WIMedia.Folder = function(folder){
    
     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "folder",
            folder : folder
                    },
        success: function(result)
        {
          $("#images").html(result);
            
        }
    });
  }

  WIMedia.goback= function(){

         $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "back",
                    },
        success: function(result)
        {
          $("#images").html(result);
            
        }
    });
  }
