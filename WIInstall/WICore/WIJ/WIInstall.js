$(document).ready(function(event)
{

    $("#fingerPrint_true").click(function(){
                        //alert('clicked');
                        $("#login_fingerprint").attr("value", 'true')
                        $("#fingerPrint_false").removeClass('btn-danger active')
                        $("#fingerPrint_true").addClass('btn-success active');
                    })

                    $("#fingerPrint_false").click(function(){
                        //alert('clicked');
                        $("#login_fingerprint").attr("value", 'false')
                        $("#fingerPrint_true").removeClass('btn-success active')
                        $("#fingerPrint_false").addClass('btn-danger active');
                    })

    $("#session_secure_true").click(function(){
                        //alert('clicked');
                        $("#secure_session").attr("value", 'true')
                        $("#session_secure_false").removeClass('btn-danger')
                        $("#session_secure_true").addClass('btn-success active');
                    })

                    $("#session_secure_false").click(function(){
                        //alert('clicked');
                        $("#secure_session").attr("value", 'false')
                        $("#session_secure_true").removeClass('btn-success active')
                        $("#session_secure_false").addClass('btn-danger');
                    })

                    $("#http_only_true").click(function(){
                        //alert('clicked');
                        $("#session_http_only").attr("value", 'true')
                        $("#http_only_false").removeClass('btn-danger')
                        $("#http_only_true").addClass('btn-success active');
                    })

                    $("#http_only_false").click(function(){
                        //alert('clicked');
                        $("#session_http_only").attr("value", 'false')
                        $("#http_only_true").removeClass('btn-success active')
                        $("#http_only_false").addClass('btn-danger');
                    })


                     $("#session_regenerate_true").click(function(){
                        //alert('clicked');
                        $("#session_regenerate").attr("value", 'true')
                        $("#session_regenerate_false").removeClass('btn-danger')
                        $("#session_regenerate_true").addClass('btn-success active');
                    })

                    $("#session_regenerate_false").click(function(){
                        //alert('clicked');
                        $("#session_regenerate").attr("value", 'false')
                        $("#session_regenerate_true").removeClass('btn-success active')
                        $("#session_regenerate_false").addClass('btn-danger');
                    })

                    $("#cookieonly_true").click(function(){
                        //alert('clicked');
                        $("#cookieonly").attr("value", '1')
                        $("#cookieonly_false").removeClass('btn-danger')
                        $("#cookieonly_true").addClass('btn-success active');
                    })

                    $("#cookieonly_false").click(function(){
                        //alert('clicked');
                        $("#cookieonly").attr("value", '0')
                        $("#cookieonly_true").removeClass('btn-success active')
                        $("#cookieonly_false").addClass('btn-danger');
                    })

    $("#encryption-bcrypt").click(function(){

    $("#encryption-bcrypt").attr('checked');
    $("#choice-wrapper-bcrypt").removeClass('alert-error');
     $("#choice-wrapper-sha").addClass('alert-error');
    $("#choice-wrapper-bcrypt").addClass('alert-success');
     $("#choice-wrapper-sha").removeClass('alert-success');
    });

     $("#encryption-sha512").click(function(){
        $("#encryption-sha512").attr('checked');
        $("#choice-wrapper-bcrypt").removeClass('alert-success');
        $("#choice-wrapper-bcrypt").addClass('alert-error');
        $("#choice-wrapper-sha").removeClass('alert-error');
        $("#choice-wrapper-sha").addClass('alert-success');
    });

     $('#bcrypt_cost').on('change', function() {
            // alert( this.value );
    $("#bcrypt_cost").val(this.value).prop("selected", "selected");                      
    })

    $('#costing_sha512').on('change', function() {
    // alert( this.value );

    $("#costing_sha512").val(this.value).prop("selected", "selected");
    })


// // button register click below
//     $("#email-settings-smtp").click(function()
//     {

//             var smtp_host           = $("#smtp_host").val(),
//              smtp_username           = $("#smtp_username-").val(),
//              smtp_pass               = $("#smtp_password").val(),
//              smtp_enc               = $("#smtp_enc").val(),
//              port_name             = $("#smtp_port").val()


//              //create data that will be sent over server

//              var email = {
//                 UserData:{
//                     smtp_host        : smtp_host,
//                     smtp_username    : smtp_username,
//                     smtp_pass        : smtp_pass,
//                     smtp_enc         : db_name,
//                     port_name        : smtp_port

//                 },
//                 FieldId:{
//                     smtp_host           : "smtp_host",
//                     smtp_username       : "smtp_username",
//                     smtp_pass           : "smtp_password",
//                     smtp_enc            : "smtp_enc",
//                     port_name           : "smtp_port"

//                 }
//              };
//              // send data to server
//              WIEmail.sendData(database);
        
//     });

});




var WIInstall = {}

WIInstall.stepOne = function(){
	$("#step_one").removeClass('show');
	$("#step_one").addClass('hide');
	$("#step_two").removeClass('hide');
	$("#step_two").addClass('show');
	WIInstall.Requirements();
	$("#stepOne").removeClass('active');
	$("#stepOne").addClass('passActive');
	$("#stepTwo").removeClass('inactive');
	$("#stepTwo").addClass('active');


}


WIInstall.stepTwo = function(){
	$("#step_two").removeClass('show');
	$("#step_two").addClass('hide');
	$("#step_three").removeClass('hide');
	$("#step_three").addClass('show');
	$("#stepTwo").removeClass('active');
	$("#stepTwo").addClass('passActive');
	$("#stepThree").removeClass('inactive');
	$("#stepThree").addClass('active');


}

WIInstall.stepThree = function(){
	$("#step_three").removeClass('show');
	$("#step_three").addClass('hide');
	$("#step_four").removeClass('hide');
	$("#step_four").addClass('show');
	$("#stepThree").removeClass('active');
	$("#stepThree").addClass('passActive');
	$("#stepFour").removeClass('inactive');
	$("#stepFour").addClass('active');


}

WIInstall.stepFour = function(){
	$("#step_four").removeClass('show');
	$("#step_four").addClass('hide');
	$("#step_five").removeClass('hide');
	$("#step_five").addClass('show');
	$("#stepFour").removeClass('active');
	$("#stepFour").addClass('passActive');
	$("#stepFive").removeClass('inactive');
	$("#stepFive").addClass('active');


}

WIInstall.stepFive = function(){
    $("#step_five").removeClass('show');
    $("#step_five").addClass('hide');
    $("#step_six").removeClass('hide');
    $("#step_six").addClass('show');
    $("#stepFive").removeClass('active');
    $("#stepFive").addClass('passActive');
    $("#stepSix").removeClass('inactive');
    $("#stepSix").addClass('active');


}




WIInstall.DB = function(){

     $("#next").removeClass('show');
     $("#next").addClass('hide');
    $("#spin").removeClass('hide');
    $("#spin").addClass('show');
    
    var DB_NAME  = $("#db_name").val(),
    HOST  = $("#host").val(),
    USER  = $("#username").val(),
    PASS  = $("#password").val();
    //alert(HOST);

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "db_settings",
            host   : HOST,
            user  : USER,
            db   : DB_NAME,
            pass  : PASS
        },
        success: function(results)
        {   

            //console.log(results);
            var res = JSON.parse(results);
            if(res.outcome === true){
                var success = "Successfully connected with DB";
                $("#mess").html(success);
                WIInstall.stepFour();

            }else{
                 $("#next").removeClass('hide');
                 $("#next").addClass('show');
                $("#spin").removeClass('show');
                $("#spin").addClass('hide');
                $("#mess").html(res.message);
            }

        }

    });

}

WIInstall.install = function(){

         $("#install").removeClass('show');
     $("#install").addClass('hide');
    $("#installing").removeClass('hide');
    $("#installing").addClass('show');
    

    var site_name  = $("#website_name").val(),
    Domain  = $("#domain").val(),
    script  = $("#script").val(),
    session_secure = $("#secure_session").attr("value"),
    http = $("#session_http_only").attr("value"),
    session_regenerate = $("#session_regenerate").attr("value"),
    cookieonly = $("#cookieonly").attr("value"),
    login_fingerprint = $("#login_fingerprint").attr("value"),
    max_login_attempts = $("#max_login_attempts").val(),
    redirect_after_login = $("#redirect_after_login").val();
//    encryption_bcrypt = $("#encryption-bcrypt").val(),
    var encryption  = $('input[name=encryption]:checked').val();
    if (encryption === "bcrypt"){
         cost = $( "#bcrypt_cost option:selected" ).val();

     }else if(encryption === "sha512"){
        cost = $( "#costing_sha512 option:selected" ).val();

     }


     var mailer = $("#mailer").val();
     if (mailer === "smtp") {
    var smtp_host = $("#smtp_host").val(),
    smtp_port = $("#smtp_port").val(),
    smtp_username = $("#smtp_username").val(),
    smtp_password = $("#smtp_password").val(),
    smtp_enc = $("#smtp_enc").val();
     }
     var salt = $("#salt").val(),
    bootstrap_version = $("#bootstrap_version").val(),
    db_host = $("#host").val(),
    db_username = $("#username").val(),
    db_password = $("#password").val(),
    db_name = $("#db_name").val(),
    admin_user = $("#admin_username").val(),
    admin_password = $("#admin_password").val(),
    user_email = $("#email_address").val();

    var admin_pass = CryptoJS.SHA512(admin_password).toString();

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "install_settings",
            name   : site_name,
            dom  : Domain,
            script: script,
            session_secure : session_secure,
            http : http,
            session_regenerate: session_regenerate,
            cookieonly : cookieonly,
            login_fingerprint: login_fingerprint,
            max_login_attempts : max_login_attempts,
            redirect_after_login : redirect_after_login,
            encryption : encryption,
            cost : cost,
            mailer : mailer,
            db_host : db_host,
            db_name : db_name,
            db_password : db_password,
            db_username : db_username,
            bootstrap_version : bootstrap_version,
            salt : salt,
            admin_password : admin_pass,
            admin_username : admin_user,
            email_address : user_email
        },
        success: function(results)
        {
            var res = JSON.parse(results);
            if (res.status === "install_completed") {
                $("#install").removeClass('hide');
     $("#install").addClass('close');
    $("#installing").removeClass('show');
    $("#installing").addClass('hide');
                WIInstall.stepFive();
            }else{
                $("#install").removeClass('hide');
     $("#install").addClass('close');
    $("#installing").removeClass('show');
    $("#installing").addClass('hide');
                $("#results_install").html(results)
            }
        }
    });
}

WIInstall.Requirements = function(){

        $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "requirements"
        },
        success: function(requirements)
        {
            //console.log(requirements);
            var res = JSON.parse(requirements),
            PHP_Version = res.PHP_Version,
            PDO  = res.PDO_Extension,
            MYSQL   = res.PDO_MySQL_Extension,
            CURL   = res.PHP_Curl,
            Writeable = res.WICMS_Folder;

             if (PHP_Version === true){
                var Div = '<li class="list-group-item" >PHP Version :'+
                            '<span class="badge badge-success" id="php-true" ><i class="fa fa-check"></i></span>'+
                        '</li>';
                        $("#requirements-php-version").html(Div);
            }else{
                var Div = '<li class="list-group-item" >PHP Version :'+
                            '<span class="badge badge-danger" id="php-false" ><i class="fa fa-times"></i></span>'+
                        '</li>';
                        $("#requirements-php-version").html(Div);
            }

                    

            if (PDO === true){
                var Div = '<li class="list-group-item" >PDO Extension :'+
                            '<span class="badge badge-success" id="php-true" ><i class="fa fa-check"></i></span>'+
                        '</li>';
                        $("#requirements-pdo").html(Div);
            }else{
                var Div = '<li class="list-group-item" >PDO Extension :'+
                            '<span class="badge badge-danger" id="php-false" ><i class="fa fa-times"></i></span>'+
                        '</li>';
                        $("#requirements-pdo").html(Div);
            }

            
            
            if (MYSQL === true){
                var Div = '<li class="list-group-item" >MYSQL Extension  :'+
                            '<span class="badge badge-success" id="php-true" ><i class="fa fa-check"></i></span>'+
                        '</li>';
                        $("#requirements-mysql").html(Div);
            }else{
                var Div = '<li class="list-group-item" >MYSQL Extension  :'+
                            '<span class="badge badge-danger" id="php-false" ><i class="fa fa-times"></i></span>'+
                        '</li>';
                        $("#requirements-mysql").html(Div);
            }

            
            

            if (CURL === true){
                var Div = '<li class="list-group-item" >CURL Extension :'+
                            '<span class="badge badge-success" id="php-true" ><i class="fa fa-check"></i></span>'+
                        '</li>';
                        $("#requirements-curl").html(Div);
            }else{
                var Div = '<li class="list-group-item" >CURL Extension :'+
                            '<span class="badge badge-danger" id="php-false" ><i class="fa fa-times"></i></span>'+
                        '</li>';
                        $("#requirements-curl").html(Div);
            }

            
            if (Writeable === true){
                var Div = '<li class="list-group-item" >PHP Version :'+
                            '<span class="badge badge-success" id="php-true" ><i class="fa fa-check"></i></span>'+
                        '</li>';
                        $("#requirements-write").html(Div);
            }else{
                var Div = '<li class="list-group-item" >Writeable  :'+
                            '<span class="badge badge-danger" id="php-false" ><i class="fa fa-times"></i></span>'+
                        '</li>';
                        $("#requirements-write").html(Div);
            }

            if (PHP_Version && CURL && PDO && MYSQL && Writeable === true){
                    $("#snap").removeClass('show');
                    $("#snap").addClass('hide');
            }else{
                var btn = $("#required");
                 $("#snap").removeClass('hide');
                    $("#snap").addClass('show');
                WICore.loadingButton(btn, "Requirements not met");

            }

               
            //$("#requirements").html(res.PHP_Version);
        }

    });

}
