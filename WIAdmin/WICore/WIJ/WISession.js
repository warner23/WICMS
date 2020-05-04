/***********
** WISITE NAMESPACE
**************/



$(document).ready(function(event)
{
    


    $("#ss").click(function(){
        //alert('clicked');
        var secure = $("#secure_session").attr('value');
        console.log(secure);
        if (secure === "false"){
        $("#session").prop("checked", true);
        $("#ss").text('ON');
        $("#secure_session").attr('value','true');
       }else if (secure === "true"){
        $("#session").removeAttr('checked');
        $("#secure_session").attr('value','false');
        $("#ss").text('OFF');
        $("#ss").css('padding-left', '50%');
       }
    });


    $("#http").click(function(){
        //alert('clicked');
        var http = $("#session_http_only").attr('value');
        console.log(http);
        if (http === "true"){
        $("#ht").prop("checked", true);
        $("#ht").attr('checked');
        $("#http").text('ON');
        $("#session_http_only").attr('value','false');
        
       }else if (http === "false"){
        $("#ht").removeAttr('checked');
        $("#http").text('OFF');
        $("#http").css('padding-left', '50%');
        $("#session_http_only").attr('value','true');
       }
    });

    $("#reg").click(function(){
        //alert('clicked');
        var reg = $("#session_regenerate").attr('value');
        console.log(reg);
        if (reg === "true"){
        $("#reg_id").prop("checked", true);
        $("#reg").text('ON');
        $("#session_regenerate").attr('value','false');
        
       }else if (reg === "false"){
        $("#reg_id").removeAttr('checked');
        $("#reg").text('OFF');
        $("#reg").css('padding-left', '50%');
        $("#session_regenerate").attr('value','true');
       }
    });

    $("#ck").click(function(){
        //alert('clicked');
        var cookie = $("#cookieonly").attr('value');
        console.log(cookie);
        if (cookie === "0"){
        $("#cookie").prop("checked", true);
        $("#ck").text('ON');
        $("#cookieonly").attr('value','1');
        
       }else if (cookie === "1"){
        $("#cookie").removeAttr('checked');
        $("#ck").text('OFF');
        $("#ck").css('padding-left', '50%');
        $("#cookieonly").attr('value','0');
       }
    });

	// button register click below
	$("#session_btn").click(function()
	{

			var secure_session               = $("#secure_session").attr('value'),
			 http_only           = $("#session_http_only").attr('value'),
			 regenerate_id               = $("#session_regenerate").attr('value'),
             use_only_cookie               = $("#cookieonly").attr('value')


			 //create data that will be sent over server

			 var session = {
			 	UserData:{
			 	    secure_session           : secure_session,
                    http_only                : http_only,
                    regenerate_id            : regenerate_id,
                    use_only_cookie          : use_only_cookie

			 	},
			 	FieldId:{
			 		secure_session            : "secure_session",
                    http_only                 : "session_http_only",
                    regenerate_id             : "session_regenerate",
                    use_only_cookie           : "use_only_cookie"

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
                WICore.Refresh();
    		}
    	}
    });
}