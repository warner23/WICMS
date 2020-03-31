$(document).ready(function () {
	$(".no-submit").submit(function () {
    	return false;
    });
     $("#change_password").click(function () { 
        if(profile.validatePasswordUpdate())
            profile.updatePassword(); 
    });
    $("#update_details").click(function () {
        profile.updateDetails();
    });
});



/** PROFILE NAMESPACE
 ======================================== */

var profile = {};


/**
 * Updates user password.
 */
profile.updatePassword = function() {
        //turn on button loading state
        wiengine.loadingButton($("#change_password"), $_lang.updating);
    
        //encrypt passwords before sending them through the network
	var newPass = CryptoJS.SHA512($("#new_password").val()).toString();
	var oldPass = CryptoJS.SHA512($("#old_password").val()).toString();
        
        //send data to server
	$.ajax({
		url: "WICore/WIClass/WIAjax.php",
		type: "POST",
		data: {
			action	 : "updatePassword",
			oldpass  : oldPass,
			newpass  : newPass
		},
		success: function (result) {
                        //return button to normal state
                        wiengine.removeLoadingButton($("#change_password"));
                        
			if(result == "") {
                                //display success message
				wiengine.displaySuccessMessage(
                                        $("#form-changepassword"),
                                       	$_lang.password_updated_successfully
                                    );
			}
			else {
                                //display error message
				wiengine.displayErrorMessage($("#old_password"), result);
			}
		}
	});
};


/**
 * Validate password update form.
 * @returns {Boolean} TRUE if form is valid, FALSE otherwise.
 */
profile.validatePasswordUpdate = function () {
    
        //remove all error messages if there are some
	wiengine.removeErrorMessages();
	
        //get all data from form
	var oldpass  = $("#old_password"),
            newpass  = $("#new_password"),
            confpass = $("#new_password_confirm"),
            valid    = true;
		
        //check if field is empty
	if($.trim(oldpass.val()) == "") {
		valid = false;
		wiengine.displayErrorMessage(oldpass, $_lang.field_required);
	}
	
        //check if field is empty
	if($.trim(newpass.val()) == "") {
		valid = false;
		wiengine.displayErrorMessage(newpass, $_lang.field_required);
	}
	
        //check if field is empty
	if($.trim(confpass.val()) == "") {
		valid = false;
		wiengine.displayErrorMessage(confpass, $_lang.field_required);
	}
	
        //check if password and confirm new password are equal
	if($.trim(confpass.val()) != $.trim(newpass.val()) ) {
		valid = false;
		wiengine.displayErrorMessage(newpass);
		wiengine.displayErrorMessage(confpass, $_lang.password_dont_match);
	}
	
	return valid;
	
};


/**
 * Updates user details.
 */
profile.updateDetails = function () {
        //remove error messages if there are any
	wiengine.removeErrorMessages();
        
        //turn on button loading state
        wiengine.loadingButton($("#update_details"), $_lang.updating);
        
        //prepare data that will be sent to server
	var data = {
		action : "updateDetails",
		details: {
			first_name: $("#first_name").val(),
			last_name : $("#last_name").val(),
			address	  : $("#address").val(),
			phone	  : $("#phone").val()
		}
	};
        
        //send data to server
	$.ajax({
		url: "WICore/WIClass/WIAjax.php",
		type: "POST",
		data: data,
		success: function (result) {
                        //return button to normal state
                        wiengine.removeLoadingButton($("#update_details"));
                        
			if(result == "") {
				wiengine.displaySuccessMessage($("#form-details"),$_lang.details_updated);
			}
			else {
                //display error messages
				console.log(result);
				wiengine.displayErrorMessage($("#form-details input"));
				wiengine.displayErrorMessage(
                    $("#phone"), 
                    $_lang.error_updating_db
                );
			}
		}
	});
};
