/***********
** WILogin NAMESPACE
**************/



$(document).ready(function(event)
{
    
    $("#print").click(function(){
                        //alert('clicked');
        var login = $("#login_fingerprint").attr('value');
        console.log(login);
        if (login === "false"){
        $("#finger").prop("checked", true);
        $("#print").text('ON');
        $("#login_fingerprint").attr('value','true');
        
       }else if (login === "true"){
        $("#finger").removeAttr('checked');
        $("#print").text('OFF');
        $("#print").css('padding-left', '50%');
        $("#login_fingerprint").attr('value','false');
       }
    });

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
