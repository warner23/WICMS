$(document).ready(function () {
	//catch form submit
 	$(".form-horizontal").submit(function () {
    	return false;
    });
 	
 	//Forgot password button click
    $("#btn-forgot-password").click(function () {
        var email = $("#forgot-password-email"),
            valid = true;

         //remove prevuious error messages
        wiengine.removeErrorMessages();

        //check if email is entered
        if($.trim(email.val()) === "") {
            valid = false;
            wiengine.displayErrorMessage(email);
        }

        //validate email format
        if(!wiengine.validateEmail(email.val())) {
            valid = false;
            wiengine.displayErrorMessage(email, $_lang.email_wrong_format);
        }

        //if email is valid, send reset password request to the server
        if(valid)
            passres.forgotPassword(email.val());

    });
    
    
    $("#btn-reset-pass").click(function () {
        var np    = $("#password-reset-new-password"),
        valid = true;
        
        if($.trim(np.val()) === "") {
            valid = false;
            wiengine.displayErrorMessage(np);
        }

        if($.trim(np.val()).length <= 5) {
            valid = false;
            wiengine.displayErrorMessage(np, $_lang.password_length);
        }

        if(valid)
            passres.resetPassword(np.val());
        });
                    
});


/** PASSWORD RESET NAMESPACE
 ======================================== */

var passres = {};

/**
 * Resets user's password.
 * @param {string} newPass New password.
 */
passres.resetPassword = function (newPass) {
    //get reset password button
    var btn = $("#btn-reset-pass");
    
    //change button state to indicate working process
    wiengine.loadingButton(btn, $_lang.resetting);
    
    //hash password
    var pass = CryptoJS.SHA512(newPass).toString();
    
    //get confirmation key from url
    var key  = wiengine.urlParam("k");
    
    //send data to server
    $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action  : "resetPassword",
            newPass : pass,
            key     : key
        },
        success: function (result) {

            if ( result == '' )
            {
                //Successful. Display success mesage.
                wiengine.displaySuccessMessage(
                    $("#password-reset-form fieldset"), 
                    $_lang.password_updated_successfully_login
                );
            }
            else
            {   
                //Error. Display error mesage.
                wiengine.displayErrorMessage(
                    $("#password-reset-new-password"), 
                    result
                );
            }

            //return button to normal state
            wiengine.removeLoadingButton(btn);
        }
    });
};


/**
 * Forgot password.
 * @param {string} userEmail User email needed for reseting password.
 */
passres.forgotPassword = function (userEmail) {
    //get forgot password button
    var btn = $("#btn-forgot-password");
    
    //put button to working state
    wiengine.loadingButton(btn, $_lang.working);
    
    //send data to server
    $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action  : "forgotPassword",
            email : userEmail
        },
        success: function (result) {
            //display success message
            try {
                
                if(result == '')
                    wiengine.displaySuccessMessage(
                            $("#forgot-pass-form fieldset"),
                            $_lang.password_reset_email_sent
                        );
                else {
                    wiengine.displayErrorMessage(
                        $("#forgot-password-email"),
                        result
                    );
                }
            }
            catch (err) {
                  wiengine.displayErrorMessage(
                        $("#forgot-password-email"),
                        $_lang.message_couldnt_be_sent
                    );
            }

            //return button to normal state
            wiengine.removeLoadingButton(btn);
           
        }
    });
};



