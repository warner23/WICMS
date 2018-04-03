/***********
** WISITE NAMESPACE
**************/



$(document).ready(function(event)
{
    
    $("#session_secure_true").click(function(){
                        //alert('clicked');
                        $("#secure_session").attr("value", 'true')
                        $("#session_secure_false").removeClass('btn-danger active')
                        $("#session_secure_true").addClass('btn-success active');
                    })

                    $("#session_secure_false").click(function(){
                        //alert('clicked');
                        $("#secure_session").attr("value", 'false')
                        $("#session_secure_true").removeClass('btn-success active')
                        $("#session_secure_false").addClass('btn-danger active');
                    })

                    $("#http_only_true").click(function(){
                        //alert('clicked');
                        $("#session_http_only").attr("value", 'true')
                        $("#http_only_false").removeClass('btn-danger active')
                        $("#http_only_true").addClass('btn-success active');
                    })

                    $("#http_only_false").click(function(){
                        //alert('clicked');
                        $("#session_http_only").attr("value", 'false')
                        $("#http_only_true").removeClass('btn-success active')
                        $("#http_only_false").addClass('btn-danger active');
                    })


                     $("#session_regenerate_true").click(function(){
                        //alert('clicked');
                        $("#session_regenerate").attr("value", 'true')
                        $("#session_regenerate_false").removeClass('btn-danger active')
                        $("#session_regenerate_true").addClass('btn-success active');
                    })

                    $("#session_regenerate_false").click(function(){
                        //alert('clicked');
                        $("#session_regenerate").attr("value", 'false')
                        $("#session_regenerate_true").removeClass('btn-success active')
                        $("#session_regenerate_false").addClass('btn-danger active');
                    })

                    $("#cookieonly_true").click(function(){
                        //alert('clicked');
                        $("#cookieonly").attr("value", '1')
                        $("#cookieonly_false").removeClass('btn-danger active')
                        $("#cookieonly_true").addClass('btn-success active');
                    })

                    $("#cookieonly_false").click(function(){
                        //alert('clicked');
                        $("#cookieonly").attr("value", '0')
                        $("#cookieonly_true").removeClass('btn-success active')
                        $("#cookieonly_false").addClass('btn-danger active');
                    })

	// button register click below
	$("#session_btn").click(function()
	{

			var secure_session               = $("#secure_session").attr('value'),
			 session_http_only           = $("#session_http_only").attr('value'),
			 session_regenerate               = $("#session_regenerate").attr('value'),
             cookieonly               = $("#cookieonly").attr('value')


			 //create data that will be sent over server

			 var session = {
			 	UserData:{
			 	    secure_session           : secure_session,
                    session_http_only    : session_http_only,
                    session_regenerate        : session_regenerate,
                    cookieonly        : cookieonly

			 	},
			 	FieldId:{
			 		secure_session           : "secure_session",
			 		session_http_only         : "session_http_only",
                    session_regenerate            : "session_regenerate",
                    cookieonly            : "cookieonly"

			 	}
			 };
			 // send data to server
			 WISession.sendData(session);
		
	});
});


var WISession = {}

WISession.sendData = function(session){
	var btn = $("#session_btn");
    event.preventDefault();

	// put button into the loading state
	WICore.loadingButton(btn, $_lang.creating_Account);

	 $.ajax({
    	url: "WICore/WIClass/WIAjax.php",
    	type: "POST",
    	data: {
    		action : "session_settings",
    		settings   : session
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
    			WICore.displaySuccessfulMessage($("#sesresults"), res.msg);
    		}
    	}
    });
}
