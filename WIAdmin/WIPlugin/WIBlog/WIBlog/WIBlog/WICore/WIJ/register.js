$(document).ready(function () {
    //button register click
    $("#btn-register").click(function () {
        if(register.validateRegistration() === true) {
            //validation passed
            var regMail     = $("#reg-email").val(),
                regUser     = $("#reg-username").val(),
                regPass     = $("#reg-password").val(),
                regPassConf = $("#reg-repeat-password").val(),
                regBotSsum  = $("#reg-bot-sum").val();


            //create data that will be sent to server
            var data = { 
                userData: {
                    email           : regMail,
                    username        : regUser,
                    password        : regPass,
                    confirm_password: regPassConf,
                    bot_sum         : regBotSsum
                },
                fieldId: {
                    email           : "reg-email",
                    username        : "reg-username",
                    password        : "reg-password",
                    confirm_password: "reg-repeat-password",
                    bot_sum         : "reg-bot-sum"
                }
            };
            
            //send data to server
            register.registerUser(data);
        }                        
    });
});



/** REGISTER NAMESPACE
 ======================================== */

var register = {};


/**
 * Registers new user.
 * @param {Object} data Register form data.
 */
register.registerUser = function (data) {
    //get register button
    var btn = $("#btn-register");
    
    //put button to loading state
    wiengine.loadingButton(btn, $_lang.creating_account);
    
    //hash passwords before send them through network
    data.userData.password = CryptoJS.SHA512(data.userData.password).toString();
    data.userData.confirm_password = CryptoJS.SHA512(data.userData.confirm_password).toString();
    
    //send data to server
    $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action  : "registerUser",
            user    : data
        },
        success: function (result) {
            //return button to normal state
            wiengine.removeLoadingButton(btn);

            console.log(result);
            
            //parse result to JSON
            var res = JSON.parse(result);
            
            if(res.status === "error") {
                //error
                
                //display all errors
                for(var i=0; i<res.errors.length; i++) {
                    var error = res.errors[i];
                    wiengine.displayErrorMessage($("#"+error.id), error.msg);
                }
            }
            else {
                //display success message
                wiengine.displaySuccessMessage($(".form-horizontal register-form fieldset"), res.msg);
             //  $( "#msg").html(+res.msg+)

            }
        }
    });
};


/**
 * Validate registration form.
 * @returns {Boolean} TRUE if form is valid, FALSE otherwise.
 */
register.validateRegistration = function () {
    var valid = true;
    
    //remove previous error messages
    wiengine.removeErrorMessages();
    
    
    //check if all fields are filled
    $(".register-form").find("input").each(function () {
        var el = $(this);

        if($.trim(el.val()) === "") {
            wiengine.displayErrorMessage(el);
            valid = false;
        }
    });

    //get email, password and confirm password for further validation
    var regMail     = $("#reg-email"),
        regPass     = $("#reg-password"),
        regPassConf = $("#reg-repeat-password");
    
    //check if email is valid
    if(!wiengine.validateEmail(regMail.val()) && regMail.val() != "") {
        valid = false;
        wiengine.displayErrorMessage(regMail,$_lang.email_wrong_format);
    }

    //check if password and confirm password fields are equal
    if(regPass.val() !== regPassConf.val() && regPass.val() != "" && regPassConf.val() != "") {
        valid = false;
        wiengine.displayErrorMessage(regPassConf, $_lang.passwords_dont_match);
    }

    //check password length
    if($.trim(regPass.val()).length <= 5) {
        valid = false;
        wiengine.displayErrorMessage(regPass, $_lang.password_length);
    }

    return valid;
};