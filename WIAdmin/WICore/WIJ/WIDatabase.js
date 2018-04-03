/***********
** WISITE NAMESPACE
**************/



$(document).ready(function(event)
{
    
	// button register click below
	$("#database_btn").click(function()
	{

			var host               = $("#host").val(),
			 db_username           = $("#db_username").val(),
			 db_pass               = $("#db_pass").val(),
             db_name               = $("#db").val()


			 //create data that will be sent over server

			 var database = {
			 	UserData:{
			 	    host           : host,
                    db_username    : db_username,
                    db_pass        : db_pass,
                    db_name        : db_name

			 	},
			 	FieldId:{
			 		host           : "host",
			 		db_username         : "db_username",
                    db_pass            : "db_pass",
                    db_name            : "db"

			 	}
			 };
			 // send data to server
			 WIDatabase.sendData(database);
		
	});
});


var WIDatabase = {}

WIDatabase.sendData = function(database){
	var btn = $("#database_btn");
    event.preventDefault();

	// put button into the loading state
	WICore.loadingButton(btn, $_lang.creating_Account);

	 $.ajax({
    	url: "WICore/WIClass/WIAjax.php",
    	type: "POST",
    	data: {
    		action : "database_settings",
    		settings   : database
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
                    WICore.displayadminerrorsMessage($("#"+error.id), error.msg);
                }
    		}
    		else if(res.status === "successful")
    		{
    			// dispaly success message
    			WICore.displaySuccessfulMessage($("#dresults"), res.msg);
    		}
    	}
    });
}
