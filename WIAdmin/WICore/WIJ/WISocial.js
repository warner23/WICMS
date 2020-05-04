/***********
** WISocial NAMESPACE
**************/

$(document).ready(function(event)
{

 $("#ter").click(function(){// twit
                    //alert('clicked');
    //console.log("passd");
    var twit = $("#tw-login").attr("value");
    
    if (twit === "false"){
    $("#twit").prop("checked", true);
    $("#ter").text('ON');
    $("#tw-login").attr("value", 'true');
   }else if (twit === "true"){
    $("#twit").removeAttr('checked');
    $("#tw-login").attr("value", 'false');
    $("#ter").text('OFF');
    $("#ter").css('padding-left', '50%');
   }
    })

    $("#log").click(function(){
    //alert('clicked');
    var fb = $("#fb-login").attr("value")
    
    if (fb === "false"){
    $("#fb").prop("checked", true);
    $("#log").text('ON');
    $("#fb-login").attr("value", 'true')
   }else if (fb === "true"){
    $("#fb").removeAttr('checked');
    $("#fb-login").attr("value", 'false')
    $("#log").text('OFF');
    $("#log").css('padding-left', '50%');
   }
})

    $("#glogin").click(function(){
    //alert('clicked');
    var google = $("#gp-login").attr("value")
    
    if (google === "false"){
    $("#googleplus").prop("checked", true);
    $("#glogin").text('ON');
    $("#gp-login").attr("value", 'true');
   }else if (google === "true"){
    $("#googleplus").removeAttr('checked');
    $("#gp-login").attr("value", 'false');
    $("#glogin").text('OFF');
    $("#glogin").css('padding-left', '50%');
   }
})
    
	// button register click below
	$("#social_btn").click(function()
	{
			var tw_login             = $("#tw-login").attr('value'),
            fb_login                 = $("#fb-login").attr('value'),
            gp_login                 = $("#gp-login").attr('value'),
			 tw_key                  = $("#tw_key").val(),
			 tw_secret               = $("#tw_secret").val(),
             fb_key                  = $("#tw_key").val(),
             fb_secret               = $("#tw_secret").val(),
             gp_key                  = $("#tw_key").val(),
             gp_secret               = $("#tw_secret").val()
			 //create data that will be sent over server
			 var social = {
			 	UserData:{
			 	    tw_login           : tw_login,
                    fb_login           : fb_login,
                    gp_login           : gp_login,
                    tw_key             : tw_key,
                    tw_secret          : tw_secret,
                    fb_key             : fb_key,
                    fb_secret          : fb_secret,
                    gp_key             : gp_key,
                    gp_secret          : gp_secret
			 	},
			 	FieldId:{
			 		tw_login           : "tw-login",
                    fb_login           : "fb-login",
                    gp_login           : "gp-login",
                    tw_key           : "tw_key",
                    tw_login           : "tw_secret",
                   fb_key           : "fb_key",
                    fb_secret           : "fb_secret",
                   gp_key           : "gp_key",
                    gp_secret           : "gp_secret"
			 	}
			 };
			 // send data to server
	      WISocial.sendData(social);
	});
});


var WISocial = {}

WISocial.sendData = function(social){
	var btn = $("#social_btn");
    event.preventDefault();

	// put button into the loading state
	WICore.loadingButton(btn, $_lang.creating_Account);

	 $.ajax({
    	url: "WICore/WIClass/WIAjax.php",
    	type: "POST",
    	data: {
    		action : "social_settings",
    		settings   : social
    	},
    	success: function(result)
    	{
    		// return the button to normasl state
    		WICore.removeLoadingButton(btn);
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
    			WICore.displaySuccessfulMessage($("#socresults"), res.msg);
                //WICore.displaySuccessMessage($(".msg"), res.msg);
    		}
    	}
    });
}
