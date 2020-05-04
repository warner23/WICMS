/***********
** WIImage
**************/



$(document).ready(function()
{

  // button register click below
  $("#modUpload").on( "click", function()
  {
    element = $(".file").attr('id');
    mod_name = $(".logo").attr('id');
    WIImage.Image(element, mod_name);
  });


});

var WIImage = {};

WIImage.Image = function(element, mod_name){

$.ajax({
            type: 'POST',
            url: 'WICore/WIClass/WIAjax.php',
            data: {
              action   : "modImg",
              element : element,
              mod_name : mod_name
              
            },
            onChange: function(filename) {
            // Create a span element to notify the user of an upload in progress
            var $span = $("<span />")
              .attr("class", $(this).attr("id"))
              .text("Uploading")
              .insertAfter($(this));

            $(this).remove();

            interval = window.setInterval(function() {
              var text = $span.text();
              if (text.length < 13) {
                $span.text(text + ".");
              } else {
                $span.text("Uploading");
              }
            }, 200);
          },
          onSubmit: function(filename) {

            return true;
          },
          onComplete: function(filename, response) {
            window.clearInterval(interval);
            var $span = $("span." + $(this).attr("id")).text(filename + " "),
              $fileInput = $("<input />")
                .attr({
                  type: "file",
                  name: $(this).attr("name"),
                  id: $(this).attr("id")

                });
            $("#uploadImg").attr("src", "WIMedia/Img/"+mod_name+'/'+filename);
                  $("#Pic").attr("src", "WIMedia/Img/"+mod_name+'/'+filename);
      $(".cp").attr("id", filename);
          $("#modal-header-upload").removeClass("on");
    $("#modal-header-upload").addClass("off");


            if (typeof(response.error) === "string") {
              $span.replaceWith($fileInput);

              applyAjaxFileUpload($fileInput);

              alert(response.error);

              return;
            }

            $("<a />")
              .attr("href", "#")
              .text("x")
              .bind("click", function(e) {
               $span.replaceWith($fileInput);

                applyAjaxFileUpload($fileInput);
              })
          }
});
}