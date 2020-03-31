/*****
** WITopic name space
*
*/////////////


var WITopics = {};

WITopics.votingSide = function(voting_id){
	    $("#votingModal").modal({
        keyboard: false,
        backdrop: "static",
        show: true


    });

        var div = ('<a href="#" id="'+voting_id+'" vote="for" class="vote"><div class="col-md-4 topic">For</div></a><a href="#" id="'+voting_id+'" vote="against" class="vote"><div class="col-md-4 topic">Against</div></a><a href="#" id="'+voting_id+'" vote="other" ><div class="col-md-4 topic other">Other</div><div class="voteother" id="'+voting_id+'" vote="other" ><div class="topicVote closed" id="topicVote"><textarea id="textarea" vote="other" class="voting" rows="4" cols="25"></textarea><button id="othervote">Save</button></div></div></a><div id="result"></div>');
        $(".panel-body").html(div);
}


    $("body").delegate(".other", "click", function(event){
		event.preventDefault();
		//alert('clicked');
		var parent = $("#topicVote");
		if (parent.hasClass('closed') ){
			parent.removeClass('closed');
			parent.addClass('open');
		}else if (parent.hasClass('open') ){
			parent.removeClass('open');
			parent.addClass('closed');

	}
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
		var vote = $(".voteother").attr('vote');
		var text = $('#textarea').val();
		 var voting_id = $(".voteother").attr('id');
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
	



