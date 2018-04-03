/***********
** WISITE NAMESPACE
**************/

$(document).ready(function(event)
{
    $("#encryption-bcrypt").click(function(){
    $("#encryption-bcrypt").attr('checked');
    $("#choice-wrapper-bcrypt").removeClass('alert-error');
     $("#choice-wrapper-sha").addClass('alert-error');
    $("#choice-wrapper-bcrypt").addClass('alert-success');
     $("#choice-wrapper-sha").removeClass('alert-success');
    })

        $("#encryption-sha512").click(function(){
        $("#encryption-sha512").attr('checked');
        $("#choice-wrapper-bcrypt").removeClass('alert-success');
        $("#choice-wrapper-bcrypt").addClass('alert-error');
        $("#choice-wrapper-sha").removeClass('alert-error');
        $("#choice-wrapper-sha").addClass('alert-success');
    })

                        $('#cost').on('change', function() {
                           // alert( this.value );
                           $("#cost").val(this.value).prop("selected", "selected");
                            
                          })

                           $('#costing').on('change', function() {
                           // alert( this.value );

                            $("#costing").val(this.value).prop("selected", "selected");

                          })

});


var WISecurity = {}

WISecurity.encryption = function(e){
event.preventDefault();
    var encryption  = $('input[name=encryption]:checked').val();
    if (encryption === "bcrypt"){
         cost = $( "#cost option:selected" ).val();

     }else if(encryption === "sha512"){
        cost = $( "#costing option:selected" ).val();

     }
    // alert(cost);

   //preventDefault()
    var btn = $("#security_btn");
    WICore.loadingButton(btn, $_lang.updating);

    $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action  : "encryption",
            encryption: encryption,
            cost: cost
        },
        success: function (result) 
        {
           WICore.removeLoadingButton(btn);
            var res = JSON.parse(result);
            //var res = $.parseJSON(result);
            console.log(res);
        if(res.status === "error")
        {
          /// display all errors
           for(var i=0; i<res.errors.length; i++) 
           {
                    var error = res.errors[i];
                    WICore.displayaerrorMessage($("#"+error.id), error.msg);
                }
        }
        else if(res.status === "successful")
        {
          // dispaly success message
           WICore.displaySuccessfulMessage($("#secresults"), res.msg);
                
        }
          
        }
    });


}