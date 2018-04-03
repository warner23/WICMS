 $(document).ready(function () {
 	//catch form submit
 	$(".form-horizontal").submit(function () {
    	return false;
    });
 	

    //button login click
    $("#admin_login").click(function () {
      
        var  un    = $("#username"),
             pa    = $("#password");

       //validate login form
       if(login.validateLogin(un, pa) === true) { 
           //validation passed, prepare data that will be sent to server
            var data = {
                username: un.val(),
                password: pa.val(),
                id: {
                    username: "username",
                    password: "password"
                }
            };
            
            //send login data to server
            login.loginUser(data);
       }

    });


    //set focus on username field when page is loaded
    $("#username").focus();
});


/** LOGIN NAMESPACE
 ======================================== */
var login = {};

login.loginUser = function (data) {
   //preventDefault()
    var btn = $("#admin_login");
    WICore.loadingButton(btn, $_lang.logging_in);

    //encrypt password before sending it through the network
    data.password = CryptoJS.SHA512(data.password).toString();

    $.ajax({
        url: "WIAdmin/WICore/WIClass/WIAjax.php",
        type: "POST",
        dataType: "json",
        data: {
            action  : "checkLogin",
            username: data.username,
            password: data.password,
            id      : data.id
        },
        success: function (result) {
           WICore.removeLoadingButton(btn);
           if( result.status === 'success' ){
              // alert(result.page);
               window.location = result.page;
                
           }else {
               WICore.displayErrorMessage($("#username"));
               WICore.displayaerrorsMessage($("#aerror"), result.message);
           }

        }
    });
};

login.validateLogin = function (un, pass) {
    var valid = true;

    //remove previous error messages
    WICore.removeErrorMessages();

    if($.trim(un.val()) == "") {
        WICore.displayErrorMessage(un);
        valid = false;
    }
    if($.trim(pass.val()) == "") {
        WICore.displayErrorMessage(pass);
        valid = false;
    }

    return valid;
};