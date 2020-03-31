/***********
** WISITE NAMESPACE
**************/



$(document).ready(function(event)
{
    
    $("#verification_true").click(function(){
                        //alert('clicked');
                        $("#mail_confirm_required").attr("value", 'true')
                        $("#verification_false").removeClass('btn-danger active')
                        $("#verification_true").addClass('btn-success active');
                    })

                    $("#verification_false").click(function(){
                        //alert('clicked');
                        $("#mail_confirm_required").attr("value", 'false')
                        $("#verification_true").removeClass('btn-success active')
                        $("#verification_false").addClass('btn-danger active');
                    })

                   

	// button register click below
	$("#verification_btn").click(function()
	{

			var mail_confirm_required               = $("#mail_confirm_required").attr('value')


			 //create data that will be sent over server

			 var verification = {
			 	UserData:{
			 	    mail_confirm_required           : mail_confirm_required


			 	},
			 	FieldId:{
			 		mail_confirm_required           : "mail_confirm_required"

			 	}
			 };
			 // send data to server
			 WIVerification.sendData(verification);
		
	});
});


var WIVerification = {}

WIVerification.sendData = function(session){
	var btn = $("#verification_btn");
    event.preventDefault();

	// put button into the loading state
	WICore.loadingButton(btn, $_lang.creating_Account);

	 $.ajax({
    	url: "WICore/WIClass/WIAjax.php",
    	type: "POST",
    	data: {
    		action : "verification_settings",
    		settings   : verification
    	},
    	success: function(result)
    	{
    		
    		console.log(result);
            // return the button to normasl state
            WICore.removeLoadingButton(btn);
            //window.alert(result);
    		//parse the data to json
            //var res = JSON.stringify(result);
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
    			WICore.displaySuccessfulMessage($("#verifresults"), res.msg);
    		}
    	}
    });
}
