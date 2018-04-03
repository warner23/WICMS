/***********
** WIHeader NAMESPACE
**************/



$(document).ready(function(event)
{
	// button register click below
	$("#header_settings").click(function()
	{
			var header_content            = $("#header_content").val(),
			 header_slogan               = $("#header_slogan").val(),
			 upload_pic               = $(".wiupload").text();
             
             



			 //create data that will be sent over server

			 var header = {
			 	UserData:{
			 	    header_content           : header_content,
                    header_slogan         : header_slogan,
                    upload_pic            : upload_pic

			 	},
			 	FieldId:{
			 		header_content           : "header_content",
			 		header_slogan         : "header_slogan",
                    upload_pic            : "wiupload"

			 	}
			 };
			 // send data to server
			 WIHeader.sendData(header);
		
	});
});


var WIHeader = {}

WIHeader.sendData = function(header){

    event.preventDefault();
	var btn = $("#header_settings");
    

	// put button into the loading state
	WICore.loadingButton(btn, $_lang.creating_Account);

	 $.ajax({
    	url: "WICore/WIClass/WIAjax.php",
    	type: "POST",
    	data: {
    		action : "header_settings",
    		settings   : header
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
    			 WICore.displaySuccessfulMessage($("#hresults"), res.msg);
                
    		}
    	}
    });
}
