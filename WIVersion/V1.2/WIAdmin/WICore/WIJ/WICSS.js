/***********
** WISITE NAMESPACE
**************/



$(document).ready(function(event)
{
    
});


var WICSS = {}


WICSS.showCssModal = function (id) {
    event.preventDefault();
     $("#modal-css-add").removeClass("off");
    $("#modal-css-add").addClass("on");



    // var div = ('<form class="form-horizontal" id="edit_css_form"><input type="hidden" id="adduser-userId" /><div class="control-group form-group"><label class="control-label col-lg-3" for="edit-css-href">Edit Css</label><div class="controls col-lg-9"><input id="edit-css-href" name="edit-css-href" type="text" value"'+id+'" class="input-xlarge form-control" ></div></div></form>');
    //   $(".modal-body").html(div);
    //WICSS.addEditData.button.attr('onclick', 'WICSS.addUser();');
};

WICSS.Close = function(){
        $("#modal-css-edit").removeClass("on")
    $("#modal-css-edit").addClass("off")
}

WICSS.addCSS = function(){

 var  CSS  = $("#css").val()

    var btn = $("#btn-add-language");
    event.preventDefault();

    // put button into the loading state
    WICore.loadingButton(btn, $_lang.creating_Account);
    //alert("sending ...")

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "AddCSS",
            CSS   : CSS
        },
        success: function(result)
        {
            console.log(result);
            // return the button to normasl state
            WICore.removeLoadingButton(btn);
           
            //var res = JSON.stringify(result);
            var res = JSON.parse(result);
            //var res = $.parseJSON(result);
            //console.log(res);
            if(res.status === "error")
            {
                /// display all errors
                 for(var i=0; i<res.errors.length; i++) 
                 {
                    var error = res.errors[i];
                    WICore.displayErrorMessage($("#"+error.id), error.msg);
                }
            }
            else if(res.status === "successful")
            {
                // dispaly success message
                WICore.displaySuccessfulMessage($("#results"), res.msg);
                $("#css").val('');
                WICSS.Close();
                //WICore.displaySuccessMessage($(".msg"), res.msg);
            }
        }
    });
}
