/*****
** WITopic name space
*
*/////////////
$(document).ready(function(){

	WITopic.topics();

	$(document.body).on('change',".order",function (e) {
   //doStuff
   var optVal= $(".order").attr('id');
   alert(optVal);


   
    //set focus on username field when page is loaded
    $("#topic_title").focus();
		});


});

var WITopic = {};

WITopic.newTopic = function(data){

event.preventDefault();

    var btn = $("#add_Topic");
    WICore.loadingButton(btn, $_lang.logging_in);

        		$.ajax({
			url      : "WICore/WIClass/WIAjax.php",
			method   : "POST",
			data     : {
				action : "newTopic",
				newTopic : data.topic
			},
			success  : function(result){
				WICore.removeLoadingButton(btn);
				var res = JSON.parse(result);
				if(res.status === "complete"){
					$("#result").html(res.msg);
				}
				
			}
		})
    //});

};

WITopic.topics = function(){

event.preventDefault();

        		$.ajax({
			url      : "WICore/WIClass/WIAjax.php",
			method   : "POST",
			data     : {
				action : "Topics",
			},
			success  : function(result){
				$("#top").html(result);
				
				
			}
		})
    //});

};

		$("body").delegate("#Empty", "click", function(event){
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


$("body").delegate("#Add_Topic", "click", function(event){
		event.preventDefault();
var  topic    = $("#topic_title").val();
		
		$.ajax({
			url      : "WICore/WIClass/WIAjax.php",
			method   : "POST",
			data     : {
				action : "newTopic",
				adnew : 1,
				topic : topic

			},
			success  : function(result){
				$("#addNew").html(result);
			}
		});
	});

$("body").delegate("#change_Topic", "click", function(event){
		event.preventDefault();
		
		var $inputs = $("#editTopic :input[type='text']");
		//alert($inputs);
     var values = {};
     $inputs.each(function() {
        values[this.name] = $(this).val();
        values[this.id] = $(this).attr('id');

        		$.ajax({
			url      : "WICore/WIClass/WIAjax.php",
			method   : "POST",
			data     : {
				action : "editTopics",
				topic : values[this.name],
				id : values[this.id]
			},
			success  : function(result){
				$("#results").html(result);
				WITopic.topics();
			}
		})
        });

	})


