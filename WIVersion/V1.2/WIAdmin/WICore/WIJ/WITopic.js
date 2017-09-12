/*****
** WITopic name space
*
*/////////////


var WITopic = {};

WITopic.newTopic = function(event){

event.preventDefault();

		    $('input type="text" id="Topic"').each(function () {
        var text = $(this).val('');
        alert(text);
        		$.ajax({
			url      : "WICore/WIClass/WIAjax.php",
			method   : "POST",
			data     : {
				action : "newTopic",
				newTopic : 1,
				newTopic : text
			},
			success  : function(result){
				$("#result").html(result);
			}
		})
    });

};



		$("body").delegate("#empty", "click", function(event){
		event.preventDefault();

		$.ajax({
			url      : "WICore/WIClass/WIAjax.php",
			method   : "POST",
			data     : {
				action : "addNew",
				adnew : 1

			},
			success  : function(result){
				$("#addNew").html(result);
			}
		})
	})

		$("body").delegate("#empty", "click", function(event){
		event.preventDefault();

		
		$.ajax({
			url      : "WICore/WIClass/WIAjax.php",
			method   : "POST",
			data     : {
				action : "addNew",
				adnew : 1

			},
			success  : function(result){
				$("#addNew").html(result);
			}
		})
	})




