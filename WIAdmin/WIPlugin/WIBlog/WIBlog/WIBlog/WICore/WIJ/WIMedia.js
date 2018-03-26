

var WIMedia = {};

WIMedia.media = function(){
   $("#modal-header-edit").removeClass("on");
    $("#modal-header-edit").addClass("off");
     $("#modal-header-media").removeClass("off");
    $("#modal-header-media").addClass("on");
}

WIMedia.changeiconPic = function(){
   $("#modal-favicon-edit").removeClass("on");
    $("#modal-favicon-edit").addClass("off");
     $("#modal-favicon-media").removeClass("off");
    $("#modal-favicon-media").addClass("on");
}


  WIMedia.changePic = function(){

  	     $("#modal-header-edit").removeClass("off");
    $("#modal-header-edit").addClass("on");
  }

WIMedia.changefaviconPic = function(){

         $("#modal-favicon-edit").removeClass("off");
    $("#modal-favicon-edit").addClass("on");
  }

  WIMedia.closeEdit = function(){

  	 $("#modal-header-edit").removeClass("on");
    $("#modal-header-edit").addClass("off");
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
             $("#results").append(res.msg).fadeOut("slow");
            
        }
    }
    });
  }


  WIMedia.upload = function(){
  	  	     $("#modal-header-edit").removeClass("on");
    $("#modal-header-edit").addClass("off");
  	  	$("#modal-header-upload").removeClass("off");
    $("#modal-header-upload").addClass("on");

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
// WIMedia.sendFileToServer = function(formData,status){

//       var uploadURL ="WICore/WIClass/ImageUpload.php"; //Upload URL
//     var extraData ={}; //Extra Data.
//     var jqXHR=$.ajax({
//             xhr: function() {
//             var xhrobj = $.ajaxSettings.xhr();
//             if (xhrobj.upload) {
//                     xhrobj.upload.addEventListener('progress', function(event) {
//                         var percent = 0;
//                         var position = event.loaded || event.position;
//                         var total = event.total;
//                         if (event.lengthComputable) {
//                             percent = Math.ceil(position / total * 100);
//                         }
//                         //Set progress
//                         WIMedia.handleFileUpload.status.setProgress(percent);
//                     }, false);
//                 }
//             return xhrobj;
//         },
//     url: uploadURL,
//     type: "POST",
//     contentType:false,
//     processData: false,
//         cache: false,
//         data: formData,
//         success: function(data){
//             status.setProgress(100);
 
//             $("#status1").append("File upload Done<br>");         
//         }
//     }); 
 
//     status.setAbort(jqXHR);
// }



// var rowCount=0;
// WIMedia.createStatusbar = function(obj){
//      rowCount++;
//      var row="odd";
//      if(rowCount %2 ==0) row ="even";
//      this.statusbar = $("<div class='statusbar "+row+"'></div>");
//      this.filename = $("<div class='filename'></div>").appendTo(this.statusbar);
//      this.size = $("<div class='filesize'></div>").appendTo(this.statusbar);
//      this.progressBar = $("<div class='progressBar'><div></div></div>").appendTo(this.statusbar);
//      this.abort = $("<div class='abort'>Abort</div>").appendTo(this.statusbar);
     
//      obj.after(this.statusbar);

 
// this.setFileNameSize = function(name,size){
//         var sizeStr="";
//         var sizeKB = size/1024;
//         if(parseInt(sizeKB) > 1024)
//         {
//             var sizeMB = sizeKB/1024;
//             sizeStr = sizeMB.toFixed(2)+" MB";
//         }
//         else
//         {
//             sizeStr = sizeKB.toFixed(2)+" KB";
//         }
 
//         this.filename.html(name);
//         this.size.html(sizeStr);
// }

// this.setProgress = function(progress){       
//         var progressBarWidth =progress*this.progressBar.width()/ 100;  
//         this.progressBar.find('div').animate({ width: progressBarWidth }, 10).html(progress + "% ");
//         if(parseInt(progress) >= 100)
//         {
//             this.abort.hide();
//             this.statusbar.hide();
//         }
// }
  
// this.setAbort = function(jqxhr){
//         var sb = WIMedia.statusbar;
//         WIMedia.abort.click(function()
//         {
//             jqxhr.abort();
//             sb.hide();
//         });
//     }
//   }



// WIMedia.handleFileUpload = function(files,obj){
//    for (var i = 0; i < files.length; i++) 
//    {
//         var fd = new FormData();
//         fd.append('file', files[i]);
 
//         var status = WIMedia.createStatusbar(obj); //Using this we can set progress.
//         WIMedia.setFileNameSize(files[i].name,files[i].size);
//        // $("#uploads").append(status);
//         WIMedia.sendFileToServer(fd,status);
 
//    }
// }

// WIMedia.ManualhandleFileUpload = function(files,obj){
//    for (var i = 0; i < files.length; i++) 
//    {
//         var fd = new FormData();
//         fd.append('file', files[i]);
 
//         var status =  WIMedia.createStatusbar(obj); //Using this we can set progress.
//         status.setFileNameSize(files[i].name,files[i].size);
//        // $("#uploads").append(status);
//         WIMedia.sendFileToServer(fd,status);
 
//    }
// }