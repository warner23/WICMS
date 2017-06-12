/*****
** WIDebate name space
*
*/////////////

var WIDebate = {};


WIDebate.debate = function(event, $userId, $userVoteId, $topic_id){
  event.preventDefault();
  

  //var userVoteId = $(".listing").attr('id');

  $.ajax({
      url      : "WICore/WIClass/WIAjax.php",
      method   : "POST",
      data     : {
        action : "debate",
        debate : 1,
        userId : $userId,
        userVoteId : $userVoteId,
        topic_id : $topic_id
      },
      success  : function(result){
      console.log(result);
      var res = JSON.parse(result);
            //var res = $.parseJSON(result);
            //console.log(res);
        if(res.status === "busy"){
                 $("#debate_txt").html(res.msg);
        }
        else if(res.status === "success"){
          $("#debate_txt").html(res.msg);
          //window.location.href = "debate.php";
        }else if (res.status == "requested"){
          $("#debate_txt").html(res.msg);
          window.location.href = "debate.php";
        }
        }
    })

}

WIDebate.DeleteRequest = function(){
  
}

WIDebate.Accept = function(){


  $.ajax({
      url      : "WICore/WIClass/WIAjax.php",
      method   : "POST",
      data     : {
        action : "changeStatus",
        debate : 1

      },
      success  : function(result){
      //alert(result);
      var res = JSON.parse(result);
            //var res = $.parseJSON(result);
            //console.log(res);
        if (res.status === "successful"){
          window.location.href = "debate.php";
        }
        }

    })

  //window.location.href = "debate.php";
}

WIDebate.Cancel = function(){
   $("#modal-debate-request").css("display", "none");
}


WIDebate.Message = function(userId){
  var Message = $("#chatter").val();
  var topicId = $(".chat").attr('id');

  $.ajax({
      url      : "WICore/WIClass/WIAjax.php",
      method   : "POST",
      data     : {
        action : "sendmessage",
        debate : 1,
        Message : Message,
        userId : userId,
        topic_id : topicId

      },
      success  : function(result){
      //alert(result);
      var res = JSON.parse(result);
            //var res = $.parseJSON(result);
            //console.log(res);
        if(res.status === "success"){
                 //$("#debate_txt").html(res.msg);
                 $("#chatter").val('');
        }
        else {
          $("#chatter").val('');
        }
        }

    })

}

