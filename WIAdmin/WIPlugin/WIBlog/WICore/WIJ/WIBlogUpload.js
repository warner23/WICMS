$(document).ready(function (e) {
  
   $('body').on('change', '#wiupload', function(e) {
    e.preventDefault();


  
    $(".upload-msg").text('Loading...');  
    $.ajax({
      url: "WICore/WIClass/upload.php",        // Url to which the request is send
      type: "POST",             // Type of request to be send, called as method
      data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
      contentType: false,       // The content type used when sending data to the server.
      cache: false,             // To unable request pages to be cached
      processData:false,        // To send DOMDocument or non processed data file it is set to false
      success: function(data)   // A function to be called if request succeeds
      {
        $(".upload-msg").html(data);
      }
    });
  
  });

// Function to preview image after validation
  $('body').on('change', '#post_image', function(e) {
 
  $(".upload-msg").empty(); 
  var file = this.files[0];
  var imagefile = file.type;
  var imageTypes= ["image/jpeg","image/png","image/jpg"];
    if(imageTypes.indexOf(imagefile) == -1)
    {
      $(".upload-msg").html("<span class='msg-error'>Please Select A valid Image File</span><br /><span>Only jpeg, jpg and png Images type allowed</span>");
      return false;
    }
    else
    {
      var reader = new FileReader();
      reader.onload = function(e){
        $(".img-preview").html('<img src="' + e.target.result + '" />');        
      };
      reader.readAsDataURL(this.files[0]);
    }
  }); 
});