/*****
** WITopic name space
*
*/////////////


var WITopic = {};

WITopic.votingSide = function(event, voting_id){

	$("#votingModal").removeClass('hide');
	$("#votingModal").addClass('show');

        var div = ('<a href="#" id="'+voting_id+'" vote="for" class="vote">'+
        	'<div class="col-md-4 topic">For</div></a>'+
        	'<a href="#" id="'+voting_id+'" vote="against" class="vote">'+
        	'<div class="col-md-4 topic">Against</div></a>'+
        	'<a href="#" id="'+voting_id+'" vote="spectate" class="others spectate" >'+
        	'<div class="col-md-4 topic spectate">spectate</div></a><div id="result"></div>');

        $(".panel-body").html(div);
}



    $("body").delegate(".spectate", "click", function(event){
		event.preventDefault();
		var vote = $(".spectate").attr('id');
		WITopic.spectate(vote);
	});


	$("body").delegate(".vote", "click", function(event){
		event.preventDefault();
		
		var vote = $(this).attr('vote');

	     var voting_id = $(this).attr('id');

	    // alert(vote);
	     //alert(voting_id);
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



WITopic.close = function(){

		$("#votingModal").removeClass('show');
	$("#votingModal").addClass('hide');
}

WITopic.spectate = function(vote){

	$.ajax({
			url      : "WICore/WIClass/WIAjax.php",
			method   : "POST",
			data     : {
				action : "spectate",
				vote   : vote
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
    			window.location.href = "debate.php";
    		}
    	  }
		})

}



