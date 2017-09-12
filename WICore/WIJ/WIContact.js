/**  **********
*
* namespace
*/

var WIContact = {};

WIContact.sendMEssage = function (event) {
   event.preventDefault();
   var name = $("#name").val();
   var email = $("#email").val();
   var subject = $("#subject").val();
   var mess   = $("#message").val();

   $.ajax({
			url      : "WICore/WIClass/WIAjax.php",
			method   : "POST",
			data     : {
				action : "contact",
				name   : name,
				email  : email,
				subject : subject,
				message : mess
			},
			success  : function(result){
			var res = JSON.parse(result);
			if(res.status === "success"){
				// dispaly success message
				$("#contactForm").addClass('hide');
				$("#contactSuccess").removeClass('hidden');
				$("#contactSuccess").addClass('show');
			}else{
				$("#contactError").removeClass('hidden');
				$("#contactError").addClass('show');
			}

    	  }
		})

};
