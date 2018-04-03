/***********
** email NAMESPACE
**************/



$(document).ready(function(event)
{
                
    // button register click below
    $("#email-settings-smtp").click(function()
    {

            var smtp_host               = $("#smtp_host").val(),
             smtp_username           = $("#smtp_username-").val(),
             smtp_pass               = $("#smtp_password").val(),
             smtp_enc               = $("#smtp_enc").val(),
             port_name             = $("#smtp_port").val()


             //create data that will be sent over server

             var email = {
                UserData:{
                    smtp_host        : smtp_host,
                    smtp_username    : smtp_username,
                    smtp_pass        : smtp_pass,
                    smtp_enc         : db_name,
                    port_name        : smtp_port

                },
                FieldId:{
                    smtp_host           : "smtp_host",
                    smtp_username       : "smtp_username",
                    smtp_pass           : "smtp_password",
                    smtp_enc            : "smtp_enc",
                    port_name           : "smtp_port"

                }
             };
             // send data to server
             WIEmail.sendData(database);
        
    });

});


var WIEmail = {}

WIEmail.sendData = function(database){
	var btn = $("#email-settings-smtp");
    event.preventDefault();

	// put button into the loading state
	WICore.loadingButton(btn, $_lang.creating_Account);

	 $.ajax({
    	url: "WICore/WIClass/WIAjax.php",
    	type: "POST",
    	data: {
    		action : "email_settings",
    		settings   : email
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
    			WICore.displaySuccessfulMessage($("#eresults"), res.msg);
                //WICore.displaySuccessMessage($(".msg"), res.msg);
    		}
    	}
    });

}

WIEmail.EmailMethod = function(){

    var mailer  = $("#mailer").val();

    var btn = $("#email-settings");
    event.preventDefault();

    // put button into the loading state
    WICore.loadingButton(btn, $_lang.creating_Account);

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "mailer_settings",
            settings   : mailer
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
                    WICore.displayErrorMessage($("#"+error.id), error.msg);
                }
            }
            else if(res.status === "successful")
            {
                // dispaly success message
                WICore.displaySuccessfulMessage($("#results"), res.msg);
                //WICore.displaySuccessMessage($(".msg"), res.msg);
            }
        }
    });

}
