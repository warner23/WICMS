$(document).ready(function(event)
{

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
	$("#step_four").removeClass('hide');
	$("#step_four").addClass('show');
	$("#stepOne").removeClass('active');
	$("#stepOne").addClass('passActive');
	$("#stepTwo").removeClass('inactive');
	$("#stepTwo").addClass('active');


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
        	var res = JSON.parse(requirements);
        	PHP_Version = res.PHP_Version;
			PDO  = res.PDO_Extension;
			MYSQL   = res.PDO_MySQL_Extension;
			CURL   = res.PHP_Curl;
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

WIInstall.DB = function(){



   //// btn = 
    //WICore.loadingButton(btn, "");
    //alert('clicked');
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
                var success = "Successfully connected with DB"
                $("#spin").html(success);
                WIInstall.stepThree();

            }else{
                 $("#next").removeClass('hide');
                 $("#next").addClass('show');
                $("#spin").removeClass('show');
                $("#spin").addClass('hide');
            }

        }

    });

}

WIInstall.install = function(){

         $("#install").removeClass('show');
     $("#install").addClass('hide');
    $("#installing").removeClass('hide');
    $("#installing").addClass('show');
    
    var site_name  = $("#site").val(),
    Domain  = $("#domain").val()

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "install_settings",
            name   : site_name,
            dom  : Domain
        },
        success: function(results)
        {

        }
    });
}
