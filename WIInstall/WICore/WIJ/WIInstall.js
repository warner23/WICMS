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



         $('#max_login_attempts').on('change', function() {
            // alert( this.value );
    $("#max_login_attempts").val(this.value).prop("selected", "selected");                      
    })

    $('#bootstrap_version').on('change', function() {
    // alert( this.value );

    $("#bootstrap_version").val(this.value).prop("selected", "selected");
    })



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

    admin_password = $("#admin_password").val(),
    admin_conf_password = $("#admin_confirm_password").val();

    if(admin_password != admin_conf_password)
    {
        $("#pass_match").html('passwords do not match');
    }else{
    
    $("#step_three").removeClass('show');
    $("#step_three").addClass('hide');
    $("#step_four").removeClass('hide');
    $("#step_four").addClass('show');
    $("#stepThree").removeClass('active');
    $("#stepThree").addClass('passActive');
    $("#stepFour").removeClass('inactive');
    $("#stepFour").addClass('active');
 
    }
	

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

WIInstall.stepSix = function(){
    $("#step_six").removeClass('show');
    $("#step_six").addClass('hide');
    $("#step_seven").removeClass('hide');
    $("#step_seven").addClass('show');
    $("#stepSix").removeClass('active');
    $("#stepSix").addClass('passActive');
    $("#stepSeven").removeClass('inactive');
    $("#stepSeven").addClass('active');

}




WIInstall.DB = function(){

     $("#next").removeClass('show');
     $("#next").addClass('hide');
    $("#spin").removeClass('hide');
    $("#spin").addClass('show');
    
    var DB_NAME  = $("#db_name").val(),
    HOST         = $("#host").val(),
    USER         = $("#username").val(),
    PASS         = $("#password").val();
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
                WIInstall.stepFive();
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
    

    var site_name           = $("#website_name").val();
    Domain                  = $("#domain").val();
    script                  = $("#script").val();
    session_secure          = $("#secure_session").attr("value");
    http                    = $("#session_http_only").attr("value");
    session_regenerate      = $("#session_regenerate").attr("value");
    cookieonly              = $("#cookieonly").attr("value");
    login_fingerprint       = $("#login_fingerprint").attr("value");
    max_login_attempts      = $("#max_login_attempts option:selected").attr("value");
    redirect_after_login    = $("#redirect_after_login").val();
    encryption              = $('input[name=encryption]:checked').val();

    if (encryption === "bcrypt"){
         cost = $( "#bcrypt_cost option:selected" ).val();
     }else if(encryption === "sha512"){
         cost = $( "#costing_sha512 option:selected" ).val();
     }


    var mailer = $("#mailer").val();

    smtp_host   = $("#smtp_host").attr('value');
    smtp_port       = $("#smtp_port").attr('value');
    smtp_username   = $("#smtp_username").attr('value');
    smtp_password   = $("#smtp_password").attr('value');
    smtp_enc        = $("#smtp_enc").attr('value');
    


    var salt                 = $("#salt").val();
    bootstrap_version        = $("#bootstrap_version option:selected").attr("value");

    tw_log               = $("#tw-login").attr('value');
    fb_log               = $("#fb-login").attr('value');
    gp_log               = $("#gp-login").attr('value');

    tw_id       = $("#tw_key").val();
    tw_secret   = $("#tw_secret").val();

    fb_id       = $("#fb_id").val();
    fb_secret   = $("#fb_secret").val();

    gp_id          = $("#gp_id").val();
    gp_secret      = $("#gp_secret").val();

    gp_map_api     = $("#map_api").val();
    gp_chart_api   = $("#charts_api_key").val()

    default_lang        = $("#default_lang option:selected").attr("value");
    mlang               = $("#multilang").attr('value');
    email_req           = $("#email_required").attr('value');

    db_host              = $("#host").val();
    db_username          = $("#username").val();
    db_password          = $("#password").val();
    db_name              = $("#db_name").val();
    admin_user           = $("#admin_username").val();
    admin_password       = $("#admin_password").val();
    admin_conf_password  = $("#admin_confirm_password").val();
    user_email           = $("#email_address").val();

    var admin_pass = CryptoJS.SHA512(admin_password).toString();

    var install = {
            InstallData:{

                    site_name             : site_name,
                    Domain                : Domain,
                    script                : script,
                    session_secure        : session_secure,
                    http                  : http,
                    session_regenerate    : session_regenerate,
                    cookieonly            : cookieonly,
                    login_fingerprint     : login_fingerprint,
                    max_login_attempts    : max_login_attempts,
                    redirect_after_login  : redirect_after_login,
                    encryption            : encryption,
                    cost                  : cost,
                    mailer                : mailer,
                    smtp_host             : smtp_host,
                    smtp_port             : smtp_port,
                    smtp_username         : smtp_username,
                    smtp_password         : smtp_password,
                    smtp_enc              : smtp_enc,
                    default_lang          : default_lang,
                    mlang                 : mlang,
                    email_req             : email_req,
                    tw_id                 : tw_id,
                    tw_secret             : tw_secret,
                    fb_id                 : fb_id,
                    fb_secret             : fb_secret,
                    gp_id                 : gp_id,
                    gp_secret             : gp_secret,
                    gp_map_api            : gp_map_api,
                    gp_chart_api          : gp_chart_api,
                    tw_log                : tw_log,
                    fb_log                : fb_log,
                    gp_log                : gp_log,
                    bootstrap_version     : bootstrap_version,
                    salt                  : salt,
                    admin_pass            : admin_pass,
                    admin_user            : admin_user,
                    user_email            : user_email,
                    db_host               : db_host,
                    db_username           : db_username,
                    db_password           : db_password,
                    db_name               : db_name

                },
                FieldId:{

                    site_name                  : "website_name",
                    Domain                     : "domain",
                    script                     : "script",
                    session_secure             : "secure_session",
                    http                       : "session_http_only",
                    session_regenerate         : "session_regenerate",
                    cookieonly                 : "cookieonly",
                    login_fingerprint          : "login_fingerprint",
                    max_login_attempts         : "max_login_attempts",
                    redirect_after_login       : "redirect_after_login",
                    encryption                 : "encryption",
                    cost                       : "cost",
                    mailer                     : "mailer",
                    smtp_host                  : "smtp_host",
                    smtp_port                  : "smtp_port",
                    smtp_username              : "smtp_username",
                    smtp_password              : "smtp_password",
                    smtp_enc                   : "smtp_enc",
                    default_lang               : "default_lang",
                    mlang                      : "multilang",
                    email_req                  : "email_required",
                    salt                       : "salt",
                    bootstrap_version          : "bootstrap_version",
                    tw_log                     : "tw_log",
                    fb_log                     : "fb_log",
                    gp_log                     : "gp_log",
                    tw_id                      : "tw_key",
                    tw_secret                  : "tw_secret",
                    fb_id                      : "fb_id",
                    fb_secret                  : "fb_secret",
                    gp_id                      : "gp_id",
                    gp_secret                  : "gp_secret",
                    gp_map_api                 : "map_api",
                    gp_chart_api               : "charts_api_key",
                    admin_user                 : "admin_username",
                    admin_password             : "admin_password",
                    admin_conf_password        : "admin_confirm_password",
                    user_email                 : "email_address",
                    db_host                    : "host",
                    db_username                : "db_username",
                    db_password                : "db_pass",
                    db_name                    : "db"

                }
             };
             // send data to server
             WIInstall.sendData(install);

};

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


WIInstall.sendData = function(install){
    event.preventDefault();

$(".ajax-loading").removeClass('hide').addClass('show');
     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "install_settings",
            install   : install
        },
        success: function(result)
        {
            
            console.log(result);
            var res = JSON.parse(result);
            if (res.status === "install_completed") {
                $(".ajax-loading").removeClass('show').addClass('hide');
                $("#install").removeClass('hide');
                $("#install").addClass('close');
                $("#installing").removeClass('show');
                $("#installing").addClass('hide');
                WIInstall.stepSix();
            }else{
                $(".ajax-loading").removeClass('show').addClass('hide');
                $("#install").removeClass('hide');
                $("#install").addClass('close');
                $("#installing").removeClass('show');
                $("#installing").addClass('hide');
                $("#results_install").html(results)
            }
        }
    });
}
