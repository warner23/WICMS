/***********
** WISITE NAMESPACE
**************/



$(document).ready(function(event)
{
    
	// button register click below
	$("#site_settings").click(function()
	{

			var name            = $("#website_name").val(),
			 domain               = $("#website_domain").val(),
			 url               = $("#website_url").val()


			 //create data that will be sent over server

			 var site = {
			 	UserData:{
			 	    name           : name,
                    domain         : domain,
                    url            : url

			 	},
			 	FieldId:{
			 		name           : "website_name",
			 		domain         : "website_domain",
                    url            : "website_url"

			 	}
			 };
			 // send data to server
			 WISite.sendData(site);
		
	});
});


var WISite = {}

WISite.sendData = function(site){

    event.preventDefault();
    //alert('clicked');
	var btn = $("#site_settings");
    

	// put button into the loading state
	WICore.loadingButton(btn, $_lang.creating_Account);

	 $.ajax({
    	url: "WICore/WIClass/WIAjax.php",
    	type: "POST",
    	data: {
    		action : "site_settings",
    		settings   : site
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
                    WICore.displayadminerrorsMessage($("#"+error.id), error.msg);
                }
    		}
    		else if(res.status === "successful")
    		{
    			// dispaly success message
    			 WICore.displaySuccessfulMessage($("#wresults"), res.msg);
                
    		}
    	}
    });
}


WISite.Version = function(currentVersion){

         $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "version_control",
            version   : currentVersion
        },
        success: function(result)
        {
            $("#version_results").html(result);
        }

    });

}


