/*****
** WITopic name space
*
*/////////////


var WITopic = {};

WITopic.votingSide = function(voting_id){
		/*
	    $("#votingModal").modal({
        keyboard: false,
        backdrop: "static",
        show: true


    });
	*/
	$("#votingModal").removeClass('hide');
	$("#votingModal").addClass('show');

        var div = ('<a href="#" id="'+voting_id+'" vote="for" class="vote"><div class="col-md-4 topic">For</div></a><a href="#" id="'+voting_id+'" vote="against" class="vote"><div class="col-md-4 topic">Against</div></a><a href="#" id="'+voting_id+'" vote="other" class="others" ><div class="col-md-4 topic other">Other</div></a><div id="result"></div>');
        $(".panel-body").html(div);
}



    $("body").delegate(".other", "click", function(event){
		event.preventDefault();
		//WICore.other();

		parentElement = $(".other");
    var div = ("<div class='topicVote' id='topicVote'><textarea id='textarea' vote='other' class='voting' rows='4' cols='25'></textarea><button id='othervote'>Save</button></div>");
    parentElement.append(div);
    parentElement.removeClass('other');

	});


	$("body").delegate(".vote", "click", function(event){
		event.preventDefault();
		
		var vote = $(this).attr('vote');

	     var voting_id = $(this).attr('id');

		$.ajax({
			url      : "WICore/WIClass/WIAjax.php",
			method   : "POST",
			data     : {
				action : "selected_vote",
				selected_vote : 1,
				vote : vote,
				voting_id : voting_id
			},
			success  : function(result){
			var res = JSON.parse(result);
            //var res = $.parseJSON(result);
           // console.log(res);
    		if(res.status === "error")
    		{
                 $("#result").html(res.msg);
    		}
    		else if((res.status === "success"))
    		{
    			$("#result").html(res.msg);
    			window.location.href = "listings.php";
    		}
    	  }
		})
	})

		$("body").delegate("#othervote", "click", function(event){
		event.preventDefault();
		var vote = $(".others").attr('vote');
		var text = $('#textarea').val();
		 var voting_id = $(".others").attr('id');
		alert(vote);
		alert(text);
		alert(voting_id);
		$.ajax({
			url      : "WICore/WIClass/WIAjax.php",
			method   : "POST",
			data     : {
				action : "selected_voting",
				selected_vote : 1,
				vote : vote,
				option : text,
				voting_id : voting_id

			},
			success  : function(result){
				$("#result").html(result);
				window.location.href = "listings.php";
			}
		})
	})

WITopic.close = function(){

		$("#votingModal").removeClass('show');
	$("#votingModal").addClass('hide');
}



