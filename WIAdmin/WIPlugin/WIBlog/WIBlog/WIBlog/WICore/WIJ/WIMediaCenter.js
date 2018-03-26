//var WIMediaCenter = {};

function sendFileToServer(formData,status)
{
      var uploadURL ="WICore/WIClass/imageupload.php"; //Upload URL
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
        success: function(res){
            
            var res = JSON.parse(res);
            if (res.status === "completed") {
                status.setProgress(100);
                if (res.type === "img") {
                    $("#dragandrophandler").remove();
                $("#Post_Image").append("<img id='media' value='"+res.name+"' src='../../../WIAdmin/WIMedia/Img/blog/"+res.name+"'/>");
                 $("#upload-msg").append("image File upload Done<br>"); 
                }else if (res.type === "audio") {
                    $("#dragandrophandler").remove();
                    $("#Post_audio").append("<audio controls id='media' value='"+res.name+"'>  <source src='../../../WIAdmin/WIMedia/Audio/blog/"+res.name+"' type='audio/mpeg'></audio>");
                 $("#upload-msg").append("audio File upload Done<br>"); 
                }

                else if (res.type === "video") {
                    $("#dragandrophandler").remove();
                 $("#Post_Vid").append("<video width='400' controls id='media' value='"+res.name+"'><source src='../../../WIAdmin/WIMedia/Vid/blog/"+res.name+"' type='video/mp4'></video>");
                 $("#upload-msg").append("Video File upload Done<br>"); 
                }
                
            }
                    
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
function handleFileUpload(files,obj )
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
