$(document).ready(function(){

  WIChat.init();

});

var WIChat = {};

WIChat.init = function(){

  var interval = 2000;  // 1000 = 1 second, 3000 = 3 seconds
function doAjax() {
  var last_chat_time = $(".msg-date").last().text();
  var userId = $(".modal-body").attr('id');

    $.ajax({
            type: 'GET',
            url: 'WICore/WIClass/WIAjax.php',
            data: {
              action   : "CheckChat",
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


WIChat.addmsguser = function(){

      var textArea = $("#CSChatMessage");
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
                user_id : userId


            },
        });
}


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
   var Message = textArea.val();
            textArea.val('');
        

            $.ajax({
            url      : "WICore/WIClass/WIAjax.php",
            method   : "POST",
            data     : {
                action : "sendmessage",
                debate : 1,
                Message : Message,
            },
        });
}



WIChat.msg = function(msg, Element, msg_User_id, msg_id, msgTime, username){

      var div = ("<div class='message-row response' id="+msg_id+" data-op-id='0'>"+
"<div class='msg-date'>"+msgTime+" </div>"+
"<span class='usr-tit vis-tit' title='Edit nick'  role='button'>"+
"<i class='material-icons chat-operators mi-fs15 mr-0'> </i> "+username+"</span><span>"+username+" says:</span>"+msg+"</div>");

    Element.append(div);

};




$('#CSChatMessage').bind("enterKey",function(e){
   
   var textArea = $("#CSChatMessage");
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





