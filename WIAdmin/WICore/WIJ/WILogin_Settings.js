/***********
** WILogin NAMESPACE
**************/



$(document).ready(function(event)
{
    
$("#fingerPrint_true").click(function(){
                        //alert('clicked');
                        $("#login_fingerprint").attr("value", 'yes')
                        $("#fingerPrint_false").removeClass('btn-danger active')
                        $("#fingerPrint_true").addClass('btn-success active');
                    })

                    $("#fingerPrint_false").click(function(){
                        //alert('clicked');
                        $("#login_fingerprint").attr("value", 'no')
                        $("#fingerPrint_true").removeClass('btn-success active')
                        $("#fingerPrint_false").addClass('btn-danger active');
                    })
	// button register click below

	$("#loginSettings_btn").click(function(event)
	{
        event.preventDefault();

			var fingerprint        = $("#login_fingerprint").attr('value'),
             max_logins           = $("#max_login_attempts").val(),
             redirect               = $("#redirect_after_login").val()

			 //create data that will be sent over server

			 var loginSettings = {
			 	UserData:{
			 	    fingerprint           : fingerprint,
                    max_logins    : max_logins,
                    redirect        : redirect


			 	},
			 	FieldId:{
			 		fingerprint           : "fingerprint",
			 		max_logins         : "max_login_attempts",
                    redirect            : "redirect_after_login"
                    

			 	}
			 };
			 // send data to server
			 WILoginSettings.sendData(loginSettings);
		
	});
});


var WILoginSettings = {}

WILoginSettings.sendData = function(loginSettings){
    event.preventDefault();
	var btn = $("#loginSettings_btn");
    

	// put button into the loading state
	WICore.loadingButton(btn, $_lang.creating_Account);


	 $.ajax({
    	url: "WICore/WIClass/WIAjax.php",
    	type: "POST",
    	data: {
    		action : "login_settings",
    		settings   : loginSettings
    	},
    	success: function(result)
    	{
    		// return the button to normasl state
    		WICore.removeLoadingButton(btn);
    		console.log(result);
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
    			WICore.displaySuccessfulMessage($("#lresults"), res.msg);
                //WICore.displaySuccessMessage($(".msg"), res.msg);
    		}
    	}
    });
}
