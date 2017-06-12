$(document).ready(function()
{
	// button register click below
	$("#btn-register").click(function()
	{
		if(register.validateRegistration() == true)
		{
			// validation has been passed
			var RegMail            = $("#reg-email").val(),
			 RegUser               = $("#reg-username").val(),
			 RegPass               = $("#reg-password").val(),
			 RegPassCon            = $("#reg-repeat-password").val(),
			 RegBotSom             = $("#reg-bot-sum").val();

			 //create data that will be sent over server

			 var data =
			 {
			 	UserData:
			 	{
			 	    email           : RegMail,
                    username        : RegUser,
                    password        : RegPass,
                    confirm_password: RegPassCon,
                    bot_sum         : RegBotSom	
			 	},
			 	FieldId:
			 	{
			 		email           : "reg-email",
			 		username        : "reg-username",
                    password        : "reg-password",
                    confirm_password: "reg-repeat-password",
                    bot_sum         : "reg-bot-sum"
			 	}
			 };
			 // send data to server
			 register.registerUser(data);
		}
	});
});





var register ={};

// register a new user
register.registerUser = function(data)
{
	// get register btn
	var btn = $("#btn-register");

	// put button into the loading state
	WICore.loadingButton(btn, $_lang.creating_Account);

	//hash the passowrds before sending them over the network
    data.UserData.password = CryptoJS.SHA512(data.UserData.password).toString();
    data.UserData.confirm_password = CryptoJS.SHA512(data.UserData.confirm_password).toString();

    // send the data to the server
    $.ajax({
    	url: "WICore/WIClass/WIAjax.php",
    	type: "POST",
    	data: {
    		action : "registerUser",
    		User   : data
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
    		else
    		{
    			// dispaly success message
    			WICore.displaySuccessMessage($(".register-form fieldset"), res.msg);
                //WICore.displaySuccessMessage($(".msg"), res.msg);
    		}
    	}
    });

};

// validate registration form
register.validateRegistration = function()
{
	var valid = true;

	// remove all previous error messages
	WICore.removeErrorMessages();

	// check if all fields are filled
	$(".register-form").find("input").each(function()
	{
		var el = $(this);
		 if($.trim(el.val()) === "") 
		 {
            WICore.displayErrorMessage(el);
            valid = false;
        }
	});

	// get email, pass, and confirm pass for further validation
	var RegMail           = $("#reg-email"),
	    RegPass           = $("#reg-password"),
	    RegPassCon        = $("#reg-repeat-password");

    //check if email is valid
    if(!WICore.validateEmail(RegMail.val()) && RegMail.val() != "") {
        valid = false;
        WICore.displayErrorMessage(RegMail,$_lang.email_wrong_format);
    }

    //check if password and confirm password fields are equal
    if(RegPass.val() !== RegPassCon.val() && RegPass.val() != "" && RegPassCon.val() != "") {
        valid = false;
        WICore.displayErrorMessage(RegPassCon, $_lang.passwords_dont_match);
    }

    //check password length
    if($.trim(RegPass.val()).length <= 5) {
        valid = false;
        WICore.displayErrorMessage(RegPass, $_lang.password_length);
    }

    return valid;       

}