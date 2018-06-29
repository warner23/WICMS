/***********
** email NAMESPACE
**************/



$(document).ready(function(event)
{
                
    // button register click below
    $("#sendEmail").click(function()
    {

            var emailto               = $("#emailto").val(),
             subject           = $("#subject").val(),
             Message               = $("#Message").val()


             //create data that will be sent over server

             var email = {
                UserData:{
                    emailto        : emailto,
                    subject    : subject,
                    Message        : Message

                },
                FieldId:{
                    emailto           : "emailto",
                    subject       : "subject",
                    Message           : "Message"

                }
             };
             // send data to server
             WISendMail.sendData(email);
        
    });

});


var WISendMail = {}

WISendMail.sendData = function(email){
	var btn = $("#sendEmail");
    event.preventDefault();

	// put button into the loading state
	WICore.loadingButton(btn, $_lang.creating_Account);

	 $.ajax({
    	url: "WICore/WIClass/WIAjax.php",
    	type: "POST",
    	data: {
    		action : "email_send",
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
    		else if(res.status === "completed")
    		{
    			// dispaly success message
    			WICore.displaySuccessfulMessage($("#sendResults"), res.msg);
                $("#emailto").val(''),
             $("#subject").val(''),
              $("#Message").val('')
                //WICore.displaySuccessMessage($(".msg"), res.msg);
    		}
    	}
    });

}

