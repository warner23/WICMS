//var WIMediaCenter = {};

function sendFileToServer(formData,status)
{
      var uploadURL ="WICore/WIClass/ImageUpload.php"; //Upload URL
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
            status.setProgress(100);
 
            $("#status1").append("File upload Done<br>");         
        }
    }); 
 
    status.setAbort(jqXHR);
}
 

function sendFileToShowServer(formData,status, ele_id)
{
      var uploadURL ="WICore/WIClass/ShowImageUpload.php"; //Upload URL
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
            $(".dragandrophandler").remove()
            //alert(ele_id);
            preview = ('<img src="'+info.name+'" class="img-responsive ShowImg" value="'+info.id+'" id="preview-'+ele_id+'">');
            $("#"+ele_id).append(preview);
        }
    }); 
 
    status.setAbort(jqXHR);
}


function sendFileToTheatreServer(formData,status, ele_id)
{
      var uploadURL ="WICore/WIClass/TheatreImageUpload.php"; //Upload URL
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
            $(".dragandrophandler").remove()
            //alert(ele_id);
            preview = ('<img src="'+info.name+'" class="img-responsive TheatreImg" value="'+info.id+'" id="preview-'+ele_id+'">');
            $("#"+ele_id).append(preview);
        }
    }); 
 
    status.setAbort(jqXHR);
}


function sendFileToPersonServer(formData,status, ele_id)
{
      var uploadURL ="WICore/WIClass/PersonImageUpload.php"; //Upload URL
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
            $(".dragandrophandler").remove()
            //alert(ele_id);
            preview = ('<img src="'+info.name+'" class="img-responsive personImg" value="'+info.id+'" id="preview-'+ele_id+'">');
            $("#"+ele_id).append(preview);       
        }
    }); 
 
    status.setAbort(jqXHR);
}


function sendFileToCompanyServer(formData,status, ele_id)
{
      var uploadURL ="WICore/WIClass/CompanyImageUpload.php"; //Upload URL
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
            $(".dragandrophandler").remove()
            //alert(ele_id);
            preview = ('<img src="'+info.name+'" class="img-responsive companyImg" value="'+info.id+'" id="preview-'+ele_id+'">');
            $("#"+ele_id).append(preview);       
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
function handleFileUpload(files,obj)
{
   for (var i = 0; i < files.length; i++) 
   {
        var fd = new FormData();
        fd.append('file', files[i]);
 
        var status = new createStatusbar(obj); //Using this we can set progress.
        status.setFileNameSize(files[i].name,files[i].size);
       
            sendFileToServer(fd,status);
   }
}


function showCreationhandleFileUpload(files,obj, dir, ele_id)
{
   for (var i = 0; i < files.length; i++) 
   {
        var fd = new FormData();
        fd.append('file', files[i]);
 
        var status = new createStatusbar(obj); //Using this we can set progress.
        status.setFileNameSize(files[i].name,files[i].size);
        if (dir === "person") {
            sendFileToPersonServer(fd,status, ele_id);
        }else if(dir === "theatres") {
            sendFileToTheatreServer(fd,status, ele_id);
        }else if(dir === "company") {
             sendFileToCompanyServer(fd,status, ele_id);
        }else if(dir === "show") {
             sendFileToShowServer(fd,status, ele_id);
        }else{
            sendFileToServer(fd,status);
        }
        
 
   }
}
