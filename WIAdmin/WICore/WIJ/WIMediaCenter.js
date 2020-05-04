//var WIMediaCenter = {};

function sendFileToHeaderServer(formData,status)
{
      var uploadURL ="WICore/WIClass/HeaderImageUpload.php"; //Upload URL
    var extraData ={}; //Extra Data.
    $(".ajax-loading").removeClass("hide").addClass("show");
    var jqXHR=$.ajax({
            xhr: function() {
            var xhrobj = $.ajaxSettings.xhr();
            if (xhrobj.upload) {
                    xhrobj.upload.addEventListener('progress', function(event) {
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                        }
                        //Set progress
                        status.setProgress(percent);
                    }, false);
                }
            return xhrobj;
        },
    url: uploadURL,
    type: "POST",
    contentType:false,
    processData: false,
        cache: false,
        data: formData,
        success: function(data){
            info = JSON.parse(data);
            //alert(info.name);
            status.setProgress(100);
            $(".ajax-loading").removeClass("show").addClass("hide");
            $("#status").append("File upload Done<br>").fadeOut(7000);
            $("#dragandrophandler").remove()
            $("#headerPic").remove()
            $("#modal-header-upload-details").removeClass("show").addClass("hide"); 
            preview = ('<img src="'+info.name+'" class="img-responsive cp" id="headerPic" value="'+info.id+'">');
            $("#HeaderImg").append(preview);        
        }
    }); 
 
    status.setAbort(jqXHR);
}

function sendFileToPageServer(formData,status)
{
      var uploadURL ="WICore/WIClass/PageImageUpload.php"; //Upload URL
    var extraData ={}; //Extra Data.
    var jqXHR=$.ajax({
            xhr: function() {
            var xhrobj = $.ajaxSettings.xhr();
            if (xhrobj.upload) {
                    xhrobj.upload.addEventListener('progress', function(event) {
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                        }
                        //Set progress
                        status.setProgress(percent);
                    }, false);
                }
            return xhrobj;
        },
    url: uploadURL,
    type: "POST",
    contentType:false,
    processData: false,
        cache: false,
        data: formData,
        success: function(data){
            info = JSON.parse(data);
            console.log(info.name);
            status.setProgress(100);
            $("#dragandrophandler").remove();
            $("img.cp").remove();
            $("#modal-page-upload-details").removeClass("show").addClass("hide");
            var preview = '<img src="'+info.name+'" class="img-responsive cp" style="width:140px;" id="pagePic" value="'+info.id+'">';
            $("#newpic .mediaPic").before(preview);
            $("#newpic").removeAttr("id");

        }
    }); 
 
    status.setAbort(jqXHR);
}


function sendFileToMediaServer(formData,status)
{
      var uploadURL ="WICore/WIClass/MediaImageUpload.php"; //Upload URL
    var extraData ={}; //Extra Data.
    var jqXHR=$.ajax({
            xhr: function() {
            var xhrobj = $.ajaxSettings.xhr();
            if (xhrobj.upload) {
                    xhrobj.upload.addEventListener('progress', function(event) {
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                        }
                        //Set progress
                        status.setProgress(percent);
                    }, false);
                }
            return xhrobj;
        },
    url: uploadURL,
    type: "POST",
    contentType:false,
    processData: false,
        cache: false,
        data: formData,
        success: function(data){
            info = JSON.parse(data);
            console.log(info.name);
            status.setProgress(100);
            $("#mediadragandrophandler").remove();
            //$("img.cp").remove();
            $("#modal-media-upload-details").removeClass("show").addClass("hide"); 
            var preview = '<img src="'+info.name+'" class="img-responsive cp" style="width:140px;" id="pagePic" value="'+info.id+'">';
            $("#mediaPic").append(preview);
            $("#mediaPic").removeAttr("id");

        }
    }); 
 
    status.setAbort(jqXHR);
}

function sendFileToLangServer(formData,status)
{
      var uploadURL ="WICore/WIClass/LangImageUpload.php"; //Upload URL
    var extraData ={}; //Extra Data.
    var jqXHR=$.ajax({
            xhr: function() {
            var xhrobj = $.ajaxSettings.xhr();
            if (xhrobj.upload) {
                    xhrobj.upload.addEventListener('progress', function(event) {
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                        }
                        //Set progress
                        status.setProgress(percent);
                    }, false);
                }
            return xhrobj;
        },
    url: uploadURL,
    type: "POST",
    contentType:false,
    processData: false,
        cache: false,
        data: formData,
        success: function(data){
            info = JSON.parse(data);
            console.log(info.name);
            status.setProgress(100);
            $("#dragandrophandler").remove();
            //$("img.cp").remove();
            $("#modal-lang-add-upload-details").removeClass("show").addClass("hide"); 
            var preview = '<img src="'+info.name+'" class="img-responsive cp" style="width:140px;" id="pagePic" value="'+info.id+'">';
            $("#addimg").append(preview);

        }
    }); 
 
    status.setAbort(jqXHR);
}


function sendFileToEditLangServer(formData,status)
{
      var uploadURL ="WICore/WIClass/LangImageUpload.php"; //Upload URL
    var extraData ={}; //Extra Data.
    var jqXHR=$.ajax({
            xhr: function() {
            var xhrobj = $.ajaxSettings.xhr();
            if (xhrobj.upload) {
                    xhrobj.upload.addEventListener('progress', function(event) {
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                        }
                        //Set progress
                        status.setProgress(percent);
                    }, false);
                }
            return xhrobj;
        },
    url: uploadURL,
    type: "POST",
    contentType:false,
    processData: false,
        cache: false,
        data: formData,
        success: function(data){
            info = JSON.parse(data);
            console.log(info.name);
            status.setProgress(100);
            $("#editdragandrophandler").remove();
            //$("img.cp").remove();
            $("#modal-lang-upload-details").removeClass("show").addClass("hide"); 
            $("#imglang").remove();
            var preview = '<img src="'+info.name+'" class="img-responsive cp" style="width:140px;" id="editLangPic" value="'+info.id+'">';
            $("#editimglang").append(preview);

        }
    }); 
 
    status.setAbort(jqXHR);
}
function sendFileToFaviconServer(formData,status)
{
      var uploadURL ="WICore/WIClass/FaviconImageUpload.php"; //Upload URL
    var extraData ={}; //Extra Data.
    var jqXHR=$.ajax({
            xhr: function() {
            var xhrobj = $.ajaxSettings.xhr();
            if (xhrobj.upload) {
                    xhrobj.upload.addEventListener('progress', function(event) {
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                        }
                        //Set progress
                        status.setProgress(percent);
                    }, false);
                }
            return xhrobj;
        },
    url: uploadURL,
    type: "POST",
    contentType:false,
    processData: false,
        cache: false,
        data: formData,
        success: function(data){
            info = JSON.parse(data);
            //alert(info.name);
            status.setProgress(100);
            $("#status").append("File upload Done<br>").fadeOut(7000);
            $("#dragandrophandler").remove()
            $("#headerPic").remove()
            $("#modal-header-upload").removeClass("on");
            $("#modal-header-upload").addClass("off"); 
            preview = ('<img src="'+info.name+'" class="img-responsive cp" id="headerPic" value="'+info.id+'">');
            $("#HeaderImg").append(preview);          
        }
    }); 
 
    status.setAbort(jqXHR);
}
 
var rowCount=0;
function createStatusbar(obj)
{
     rowCount++;
     var row="odd";
     if(rowCount %2 ==0) row ="even";
     this.statusbar = $("<div class='statusbar "+row+"'></div>");
     this.filename = $("<div class='filename'></div>").appendTo(this.statusbar);
     this.size = $("<div class='filesize'></div>").appendTo(this.statusbar);
     this.progressBar = $("<div class='progressBar'><div></div></div>").appendTo(this.statusbar);
     this.abort = $("<div class='abort'>Abort</div>").appendTo(this.statusbar);
     obj.after(this.statusbar);
 
    this.setFileNameSize = function(name,size)
    {
        var sizeStr="";
        var sizeKB = size/1024;
        if(parseInt(sizeKB) > 1024)
        {
            var sizeMB = sizeKB/1024;
            sizeStr = sizeMB.toFixed(2)+" MB";
        }
        else
        {
            sizeStr = sizeKB.toFixed(2)+" KB";
        }
 
        this.filename.html(name);
        this.size.html(sizeStr);
    }
    this.setProgress = function(progress)
    {       
        var progressBarWidth =progress*this.progressBar.width()/ 100;  
        this.progressBar.find('div').animate({ width: progressBarWidth }, 10).html(progress + "% ");
        if(parseInt(progress) >= 100)
        {
             var stat = $("#status1");
            this.abort.hide();
            this.statusbar.hide();
            stat.hide();

        }
    }
    this.setAbort = function(jqxhr)
    {
        var sb = this.statusbar;
        this.abort.click(function()
        {
            jqxhr.abort();
            sb.hide();
        });
    }
}
function handleFileUpload(files,obj,dir)
{
   for (var i = 0; i < files.length; i++) 
   {
        var fd = new FormData();
        fd.append('file', files[i]);
 
        var status = new createStatusbar(obj); //Using this we can set progress.
        status.setFileNameSize(files[i].name,files[i].size);
        if (dir === "header") {
            sendFileToHeaderServer(fd,status);
        }else if(dir === "favicon") {
             sendFileToFaviconServer(fd,status);
        }else if(dir === "shop") {
             sendFileToShopServer(fd,status);
        }else if(dir === "blog") {
             sendFileToBlogServer(fd,status);
        }else if(dir === "forum"){
            sendFileToForumServer(fd,status);
        }else if(dir === "page"){
            sendFileToPageServer(fd,status);
        }else if(dir === "media"){
            sendFileToMediaServer(fd,status);
        }else if(dir === "lang"){
            sendFileToLangServer(fd,status);
        }else if(dir === "editlang"){
            sendFileToEditLangServer(fd,status);
        }
 
   }
}
