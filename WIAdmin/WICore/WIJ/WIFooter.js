/***********
** WIFooter NAMESPACE
**************/



$(document).ready(function(event)
{
	// button register click below
	$("#footer_btn").click(function()
	{
			var website_name            = $("#website_name").val()



			 //create data that will be sent over server

			 var footer = {
			 	UserData:{
			 	    website_name           : website_name

			 	},
			 	FieldId:{
			 		website_name           : "website_name"

			 	}
			 };
			 // send data to server
			 WIFooter.sendData(footer);
		
	});
});


var WIFooter = {}

WIFooter.sendData = function(footer){

    event.preventDefault();
	var btn = $("#footer_btn");
    

	// put button into the loading state
	WICore.loadingButton(btn, $_lang.creating_Account);

	 $.ajax({
    	url: "WICore/WIClass/WIAjax.php",
    	type: "POST",
    	data: {
    		action : "footer_settings",
    		settings   : footer
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
    		else if(res.status === "completed")
    		{
    			// dispaly success message
    			 WICore.displaySuccessfulMessage($("#results"), res.msg);
                
    		}
    	}
    });
}
