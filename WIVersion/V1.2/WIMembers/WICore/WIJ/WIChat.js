$(document).ready(function(){

  WIChat.init();
  WIChat.pending();
   WIChat.topic();
   WIChat.status();
});

var WIChat = {};

WIChat.init = function(){

  var interval = 2000;  // 1000 = 1 second, 3000 = 3 seconds
function doAjax() {
  var last_chat_time = $(".msg-date").last().text();
  var chat_id = $(".modal-header").attr('id');
  var userId = $(".modal-body").attr('id');

    $.ajax({
            type: 'GET',
            url: 'WICore/WIClass/WIAjax.php',
            data: {
              action   : "CheckChat",
              chat_id : chat_id,
              last_chat_time : last_chat_time,
              userId : userId
              
            },
            //dataType: 'json',
            success: function (response) {
            $("#messagesBlock").html(response);
            $("#messagesBlock").animate({ scrollTop: $(document).height() }, "slow");
            },
            complete: function (data) {
                    // Schedule the next
                    setTimeout(doAjax, interval);
            }
    });
}
setTimeout(doAjax, interval);

}


WIChat.pending = function(){

var interval = 1000;  // 1000 = 1 second, 3000 = 3 seconds
function doAjax2() {

    $.ajax({
            type: 'GET',
            url: 'WICore/WIClass/WIAjax.php',
            data: {
              action   : "Pending"
              
            },
           // dataType: 'json',
            success: function (result) {
                if(result.status == "waiting"){
                 $("#status-chat").html(result.msg);
                  setTimeout(doAjax2, interval);
                }

                if(result.status == "successful"){
                 $("#status-chat").html(result.msg);     
                }

            },
            complete: function (result) {
                  
                if(result.status == "successful"){
                 $("#status-chat").html(result.msg);     
                }
            }
          });
    }
  setTimeout(doAjax2, interval);
}



WIChat.debate = function($userId, $userVoteId, $topic_id){
   // event.preventDefault();
    defaultPrevented();
    //alert('click');

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
            //var res = JSON.stringify(result);
            var res = JSON.parse(result);
            
            console.log(res);
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



WIChat.addmsguser = function(){

      var textArea = $("#CSChatMessage");
        var chat_id = $(".modal-header").attr('id');
        var userId = $(".modal-body").attr('id');
        var Mdata = textArea.val();

        textArea.val('');

            $.ajax({
            url      : "WICore/WIClass/WIAjax.php",
            method   : "POST",
            data     : {
                action : "sendmessage",
                debate : 1,
                Message : Mdata,
                chat_id : chat_id,
                user_id : userId


            },
        });
}

WIChat.editPreviousUser = function() { 
        var textArea = $('#CSChatMessage');
        /*
        if (textArea.val() == '') 
        {   
                 
            $.getJSON(this.wwwDir + 'chat/editprevioususer/'+this.chat_id + '/' + this.hash, function(data){
                if (data.error == 'f'){
                    textArea.val(data.msg);
                    textArea.attr('data-msgid',data.id);
                    textArea.addClass('edit-mode');
                    $('#msg-'+data.id).addClass('edit-mode');
                    if (LHCCallbacks.editPreviousUser) {
                        LHCCallbacks.editPreviousUser(data);
                    }

                }

            });         
        }
        */
    };

WIChat.initTypingMonitoringUser = function(chat_id) {

//EXECUTES WHEN KEY IS PRESSED IN SPECIFIED ELEMENT
$("#textarea").keypress(function(){
numMiliseconds = 500;

//THIS IF STATEMENT EXECUTES IF USER CTRL-A DELETES THE TEXT BOX
    if ($("textarea") == ""){
        $("#typing_on").text("User has cleared the text box");
    }

    $("#typing_on").text("User is typing").delay(numMiliseconds).queue(function(){
        $("#typing_on").text("User has stopped typing");
        });
});
};

WIChat.afterUserChatInit = function () {
    /*
        if (LHCCallbacks.afterUserChatInit) {
            LHCCallbacks.afterUserChatInit();
        }
        */
    };

WIChat.setChatID = function (chat_id){

    };

WIChat.setChatHash = function (hash)
    {

    };

WIChat.setLastUserMessageID = function(message_id) {
        
    };

WIChat.chatsyncuserpending = function ()
    {   
        /*
        var modeWindow = this.isWidgetMode == true ? '/(mode)/widget' : ''; 
        var themeWindow = this.theme !== null ? '/(theme)/'+this.theme : '';    
        
        var inst = this;
        $.getJSON(this.wwwDir + this.checkchatstatus + this.chat_id + '/' + this.hash + modeWindow + themeWindow,{}, function(data){
            // If no error
            if (data.error == 'false')
            {
                if (data.activated == 'false')
                {
                   if (data.result != 'false')
                   {
                       $('#status-chat').html(data.result);
                   }

                   if (data.ru != '') {                    
                       document.location = data.ru;
                   }
                   
                   setTimeout(chatsyncuserpending,confLH.chat_message_sinterval);

                } else {
                    $('#status-chat').html(data.result);
                    
                     if (data.closed && data.closed == true) {                    
                        if (inst.isWidgetMode && typeof(parent) !== 'undefined' && window.location !== window.parent.location) {                     
                             parent.postMessage('lhc_chat_closed', '*');
                        } else {                        
                            inst.chatClosed();
                        }
                     }
                }
            }
        }).fail(function(){
            setTimeout(chatsyncuserpending,confLH.chat_message_sinterval);
        });
        */
    };

WIChat.scheduleSync = function() {

       // this.syncroRequestSend = false;
       // this.userTimeout = setTimeout(chatsyncuser,confLH.chat_message_sinterval);
    };



WIChat.sendMessage = function(){
    
       var textArea = $("#CSChatMessage");
   var chat_id = $(".modal-header").attr('id');
   var Message = textArea.val();
            textArea.val('');
        

            $.ajax({
            url      : "WICore/WIClass/WIAjax.php",
            method   : "POST",
            data     : {
                action : "sendmessage",
                debate : 1,
                Message : Message,
                chat_id : chat_id
            },
        });
}



WIChat.Accept = function(){



    $.ajax({
            url      : "WICore/WIClass/WIAjax.php",
            method   : "POST",
            data     : {
                action : "changeStatus"

            },
            success  : function(result){
                console.log(result);
             var res = JSON.parse(result);

            if (res.status === "successful"){
                window.location.href = "debate.php";
            }else if(res.status === "failed"){

            }
          }

        })
};

WIChat.msg = function(msg, Element, msg_User_id, msg_id, msgTime, username){

      var div = ("<div class='message-row response' id="+msg_id+" data-op-id='0'>"+
"<div class='msg-date'>"+msgTime+" </div>"+
"<span class='usr-tit vis-tit' title='Edit nick'  role='button'>"+
"<i class='material-icons chat-operators mi-fs15 mr-0'> </i> "+username+"</span><span>"+username+" says:</span>"+msg+"</div>");

    Element.append(div);

};


WIChat.close = function(){
  var userId = $(".modal-body").attr('id');
  var chat_id = $(".modal-header").attr('id');
  //alert(userId);

   $.ajax({
            url      : "WICore/WIClass/WIAjax.php",
            method   : "POST",
            data     : {
                action : "closeDialog",
                debate : 1,
                user_id : userId,
                chat_id : chat_id
            },
            success  : function(result){

              var res = JSON.parse(result);
              if (res.status == "success") {
                window.location.href = "index.php";
              }else  if (res.status == "successful") {
                window.location.href = "index.php";
              }
            }
        });


}


$('#CSChatMessage').bind("enterKey",function(e){
   
   var textArea = $("#CSChatMessage");
   var chat_id = $(".modal-header").attr('id');
   var userId = $(".modal-body").attr('id');
   var Message = textArea.val();
            textArea.val('');
        

            $.ajax({
            url      : "WICore/WIClass/WIAjax.php",
            method   : "POST",
            data     : {
                action : "sendmessage",
                debate : 1,
                Message : Message,
                chat_id : chat_id,
                user_id : userId
            }
        });
});
$('textarea').keyup(function(e){
    if(e.keyCode == 13)
    {
        $(this).trigger("enterKey");
    }
});



WIChat.topic = function(){
    var userId = $(".modal-body").attr('id');
  var chat_id = $(".modal-header").attr('id');

     $.ajax({
            url      : "WICore/WIClass/WIAjax.php",
            method   : "POST",
            data     : {
                action : "topic",
                user_id : userId,
                chat_id : chat_id
            },
            success  : function(result){
              $("#topic").html(result);
            }
        });

}

WIChat.status = function(){

  var interval = 2000;  // 1000 = 1 second, 3000 = 3 seconds

function stat() {

   var chat_id = $(".modal-header").attr('id');

     $.ajax({
            url      : "WICore/WIClass/WIAjax.php",
            method   : "GET",
            data     : {
                action : "status",
                chat_id : chat_id
            },
            success  : function(result){
              $("#left-chat").html(result);
            },
            complete: function (data) {
                    // Schedule the next
                    setTimeout(stat, interval);
            }
        });
}
setTimeout(stat, interval);
}




