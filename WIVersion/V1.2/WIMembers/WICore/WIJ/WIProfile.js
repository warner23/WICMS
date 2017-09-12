$(document).ready(function () {

      var friendId = $.cookie("friendId");
  if (friendId > 0) {
  //alert(friendId);
   $.ajax({
    url: "WICore/WIClass/WIAjax.php",
    type: "POST",
    data: {
      action   : "friendProfile",
      friend    : friendId
    },
    success: function (result) {

    }
  });
 }else{

   $.ajax({
    url: "WICore/WIClass/WIAjax.php",
    type: "POST",
    data: {
      action   : "friendProfile0"
          },
    success: function (result) {

    }
  });
 }

$(window).on("unload", function(e) {
    console.log("this will be triggered");
    var friendId = $.cookie("friendId", 0)
});


  $(".no-submit").submit(function () {
      return false;
    });
     $("#change_password").click(function () { 
        if(profile.validatePasswordUpdate())
            profile.updatePassword(); 
    });
    $("#update_details").click(function () {
        profile.updateDetails();
    });

      

    

});



/** PROFILE NAMESPACE
 ======================================== */

var profile = {};


/**
 * Updates user password.
 */
profile.updatePassword = function() {
        //turn on button loading state
        WICore.loadingButton($("#change_password"), $_lang.updating);
    
        //encrypt passwords before sending them through the network
  var newPass = CryptoJS.SHA512($("#new_password").val()).toString();
  var oldPass = CryptoJS.SHA512($("#old_password").val()).toString();
        
        //send data to server
  $.ajax({
    url: "WICore/WIClass/WIAjax.php",
    type: "POST",
    data: {
      action   : "updatePassword",
      oldpass  : oldPass,
      newpass  : newPass
    },
    success: function (result) {
                        //return button to normal state
                        WICore.removeLoadingButton($("#change_password"));
                        
      if(result == "") {
                                //display success message
        WICore.displaySuccessMessage(
                                        $("#form-changepassword"),
                                        $_lang.password_updated_successfully
                                    );
      }
      else {
                                //display error message
        WICore.displayErrorMessage($("#old_password"), result);
      }
    }
  });
};

profile.displayBio = function($userId){


  $.ajax({
    url: "WICore/WIClass/WIAjax.php",
    type: "POST",
    data: {
      action   : "displayBio",
      userId   : $userId
    },
    success: function (result) {
      $("#bio").html(result);
    }
  });

}


/**
 * Validate password update form.
 * @returns {Boolean} TRUE if form is valid, FALSE otherwise.
 */
profile.validatePasswordUpdate = function () {
    
        //remove all error messages if there are some
  WICore.removeErrorMessages();
  
        //get all data from form
  var oldpass  = $("#old_password"),
            newpass  = $("#new_password"),
            confpass = $("#new_password_confirm"),
            valid    = true;
    
        //check if field is empty
  if($.trim(oldpass.val()) == "") {
    valid = false;
    WICore.displayErrorMessage(oldpass, $_lang.field_required);
  }
  
        //check if field is empty
  if($.trim(newpass.val()) == "") {
    valid = false;
    WICore.displayErrorMessage(newpass, $_lang.field_required);
  }
  
        //check if field is empty
  if($.trim(confpass.val()) == "") {
    valid = false;
    WICore.displayErrorMessage(confpass, $_lang.field_required);
  }
  
        //check if password and confirm new password are equal
  if($.trim(confpass.val()) != $.trim(newpass.val()) ) {
    valid = false;
    WICore.displayErrorMessage(newpass);
    WICore.displayErrorMessage(confpass, $_lang.password_dont_match);
  }
  
  return valid;
  
};


/**
 * Updates user details.
 */
profile.updateDetails = function () {
        //remove error messages if there are any
  WICore.removeErrorMessages();
        
        //turn on button loading state
        WICore.loadingButton($("#update_details"), $_lang.updating);
        
        //prepare data that will be sent to server
  var data = {
    action : "updateDetails",
    details: {
      first_name: $("#first_name").val(),
      last_name : $("#last_name").val(),
      address   : $("#address").val(),
      phone   : $("#phone").val()
    }
  };
        
        //send data to server
  $.ajax({
    url: "WICore/WIClass/WIAjax.php",
    type: "POST",
    data: data,
    success: function (result) {
                        //return button to normal state
                        WICore.removeLoadingButton($("#update_details"));
                        
      if(result == "") {
        WICore.displaySuccessMessage($("#form-details"),$_lang.details_updated);
      }
      else {
                //display error messages
        console.log(result);
        WICore.displayErrorMessage($("#form-details input"));
        WICore.displayErrorMessage(
                    $("#phone"), 
                    $_lang.error_updating_db
                );
      }
    }
  });
};

profile.showpic = function(userId){

    $.ajax({
    url: "WICore/WIClass/WIAjax.php",
    type: "POST",
    data: {
      action   : "showPic",
      userId   : userId
    },
    success: function (result) {
      $(".profile_picture").html(result)
    }
  });

}

profile.bio = function()
{
  if( $("#updateBio").hasClass('closed') ){
    $("#updateBio").removeClass('closed');
    $("#updateBio").addClass('open');

  } else{
        $("#updateBio").removeClass('open');
    $("#updateBio").addClass('closed');
  }
  
}


profile.UpdateBio = function(userId)
{
  var bio = $("textarea#bio").val();

    $.ajax({
    url: "WICore/WIClass/WIAjax.php",
    type: "POST",
    data: {
      action   : "updateBio",
      userId  : userId,
      bio  : bio
    },
    success: function (result) {
    var res = JSON.parse(result);
           //var res = $.parseJSON(result);
            console.log(res);
    if(res.status === "successful")
        {
          WICore.displaySuccessMessage($(".control-group"), res.msg);
          $("#updateBio").css("display", "none");
          profile.displayBio(userId);
        }
        else
        {
          
        
                
        }
    }
  });
}

profile.details = function(userId){

  if( $("#updateInfo").hasClass('closed') ){
    alert('closed');
    $("#updateInfo").removeClass('closed');
    $("#updateInfo").addClass('open');

  } else{
    alert('open');
        $("#updateInfo").removeClass('open');
    $("#updateInfo").addClass('closed');
  }

}

profile.updateDetails = function(userId)
{
  var fname = $("#f_name").val();
   lname = $("#l_name").val();

    $.ajax({
    url: "WICore/WIClass/WIAjax.php",
    type: "POST",
    data: {
      action   : "updateProfileDetails",
      userId  : userId,
      fname  : fname,
      lname  : lname
    },
    success: function (result) {
    var res = JSON.parse(result);
           //var res = $.parseJSON(result);
            console.log(res);
    if(res.status === "successful")
        {
          WICore.displaySuccessMessage($(".control-group"), res.msg);
          $("#updateBio").css("display", "none");
        }
        else
        {
          
        
                
        }
    }
  });

}

profile.location = function(userId)
{
    if( $("#updateLocation").hasClass('closed') ){
    $("#updateLocation").removeClass('closed');
    $("#updateLocation").addClass('open');

  } else{
        $("#updateLocation").removeClass('open');
    $("#updateLocation").addClass('closed');
  }
}

profile.displayLocation = function(userId){

  $.ajax({
    url: "WICore/WIClass/WIAjax.php",
    type: "POST",
    data: {
      action   : "displayLocation",
      userId  : userId,
    },
    success: function (result) {
      $("#location").html(result);
    }
  });
}
profile.updateLocation = function(userId)
{
  var country = $("#country").val();
   region = $("#region").val();
   city = $("#city").val();


    $.ajax({
    url: "WICore/WIClass/WIAjax.php",
    type: "POST",
    data: {
      action   : "updateLocation",
      userId  : userId,
      country  : country,
      region  : region,
      city  : city
    },
    success: function (result) {
    var res = JSON.parse(result);
           //var res = $.parseJSON(result);
            console.log(res);
    if(res.status === "successful")
        {
          
          $("#updateLocation").addClass('closed');
          profile.displayLocation(userId);
        }
        else
        {
          
        
                
        }
    }
  });
}

profile.social = function(userId)
{
      if( $("#updateSocial").hasClass('closed') ){
    $("#updateSocial").removeClass('closed');
    $("#updateSocial").addClass('open');

  } else{
        $("#updateSocial").removeClass('open');
    $("#updateSocial").addClass('closed');
  }
}


profile.updatesocial = function(userId)
{
  var youtube = $("#youtube").val();
   facebook = $("#facebook").val();
   twitter = $("#twitter").val();
   website = $("#website").val();

    $.ajax({
    url: "WICore/WIClass/WIAjax.php",
    type: "POST",
    data: {
      action   : "updateLocation",
      userId  : userId,
      youtube  : youtube,
      facebook  : facebook,
      twitter  : twitter,
      website  : website
    },
    success: function (result) {
    var res = JSON.parse(result);
           //var res = $.parseJSON(result);
            console.log(res);
    if(res.status === "successful")
        {
          $("#updateSocial").addClass('closed');
          profile.displaySocial(userId);
          
        }
        else
        {
          
        
                
        }
    }
  });
}


profile.displaySocial = function(userId){

  $.ajax({
    url: "WICore/WIClass/WIAjax.php",
    type: "POST",
    data: {
      action   : "displaySocial",
      userId  : userId,
    },
    success: function (result) {
      $("#location").html(result);
    }
  });
}

profile.photo = function(userId)
{
  $("#modal-change-photo").css("display", "block"); 
}

profile.close = function(){
  $("#modal-change-photo").css("display", "none"); 
}

profile.cancel = function(){
  $("#modal-change-photo").css("display", "none"); 
}

profile.upload = function(userId)
{
event.preventDefault();

$('.ajax-loading').show();


var photo  = $(".photo").text();


$.ajax({
url: "WICore/WIClass/WIAjax.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: {
           action: "uploadUserPhoto",
           photo : photo,
           user  : userId
       },
success: function(result)   // A function to be called if request succeeds
{ 

    if(result == "successful")
        {
          //$("#upload-preview").append(res.msg);
          //$("#modal-change-photo").css("display", "none");
          $('.ajax-loading').hide();
          profile.showpic(userId);
          $("#modal-change-photo").css("display", "none");
        }
        else if(result === "error")
        {
          $("#upload-preview").append(res.msg);
          $("#modal-change-photo").css("display", "none");
        
                
        }
            
}

});
}


profile.toggleInteractContainers = function(x) {
    if ($('#'+x).is(":hidden")) {
      $('#'+x).slideDown(200);
    } else {
      $('#'+x).hide();
    }
    $('.interactContainers').hide();
}

profile.toggleViewAllFriends = function(x) {
    if ($('#'+x).is(":hidden")) {
      $('#'+x).fadeIn(200);
    } else {
      $('#'+x).fadeOut(200);
    }
}

profile.toggleViewMap = function(x) {
    if ($('#'+x).is(":hidden")) {
      $('#'+x).fadeIn(200);
    } else {
      $('#'+x).fadeOut(200);
    }
}

profile.addAsFriend = function(userId, friendId) {
  $("#add_friend_loader").show();

     $.ajax({
        url: "WICore/WIClass/WIAjax.php", // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data: {
                   action: "AddFriend",
                   profile : 1,
                   userId  : userId,
                   friendId : friendId
               },
        success: function(data)   // A function to be called if request succeeds
        { 

         $("#add_friend").html(data).show().fadeOut(12000);
         }

    });
}

profile.acceptFriendRequest = function(req_id) {

   $.ajax({
    url: "WICore/WIClass/WIAjax.php",
    type: "POST",
    data: {
      action   : "acceptrequest",
      req_id  : req_id
    },
    success: function (data) {
    
$("#req"+req_id).html(data).show();
    }
  });

            
  
}

profile.denyFriendRequest = function(req_id) {

     $.ajax({
    url: "WICore/WIClass/WIAjax.php",
    type: "POST",
    data: {
      action   : "denyrequest",
      req_id  : req_id
    },
    success: function (data) {
    
$("#req"+req_id).html(data).show();
      }

    });
}

profile.removeAsFriend = function(a,b) {
  $("#remove_friend_loader").show();
  $.post(friendRequestURL,{ request: "removeFriendship", mem1: a, mem2: b, thisWipit: thisRandNum } ,function(data) {
      $("#remove_friend").html(data).show().fadeOut(12000);
    }); 
}

profile.privateMessage = function(event){
  event.preventDefault();

   var pmSubject = $("#pmSubject").val();
    var pmTextArea = $("#pmTextArea").val();
    var sendername = $("#pm_sender_name").val();
    var senderid = $("#pm_sender_id").val();
    var recName = $("#pm_rec_name").val();
    var recID = $("#pm_rec_id").val();

    alert(pmSubject);
    if (pmSubject == "") {
           $("#interactionResults").html('<img src="../WIAdmin/WIMedia/Img/round_error.png" alt="Error" width="31" height="30" /> &nbsp; Please type a subject.').show().fadeOut(6000);
      } else if (pmTextArea == "") {
       $("#interactionResults").html('<img src="../WIAdmin/WIMedia/Img/round_error.png" alt="Error" width="31" height="30" /> &nbsp; Please type in your message.').show().fadeOut(6000);
      } else {
       $("#pmFormProcessGif").show();

        $.ajax({
        url: "WICore/WIClass/WIAjax.php", // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data: {
                   action: "privateMessage",
                   profile : 1,
                   pmSub  : pmSubject,
                   pmText : pmTextArea,
                   senderid : senderid,
                   sendername : sendername,
                   rec_id   : recID,
                   recName  : recName
               },
        success: function(data)   // A function to be called if request succeeds
        { 

         $('#private_message').slideUp("fast");
         $("#interactionResults").html(data).show().fadeOut(10000);
         document.pmForm.pmTextArea.value='';
         document.pmForm.pmSubject.value='';
         $("#pmFormProcessGif").hide();
         }

    });
    }
}

profile.markAsRead = function(msgID, ownerid) {


   $.ajax({
        url: "WICore/WIClass/WIAjax.php", // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data: {
                   action: "markAsRead",
                   profile : 1,
                   msgID  : msgID,
                   user  : ownerid
               },
        success: function(result)   // A function to be called if request succeeds
        { 
          var res = JSON.parse(result);
          if (res.success === "success") {
            if( $("#subject").hasClass('closed') ){
                $("#subject").removeClass('closed');
                $("#subject").addClass('open');

            }else if( $("#subject").hasClass('open') ){
                $("#subject").removeClass('open');
                $("#subject").addClass('closed');

            }

            ('#subj_line_'+msgID).addClass('msgRead');
          
          }
         
         }

    });

}

profile.toggleReplyBox = function(subject,sendername,senderid,recName,recID,replyWipit) {
  $("#subjectShow").text(subject);
  $("#recipientShow").text(recName);
  document.replyForm.pmSubject.value = subject;
  document.replyForm.pm_sender_name.value = sendername;
  document.replyForm.pmWipit.value = replyWipit;
  document.replyForm.pm_sender_id.value = senderid;
  document.replyForm.pm_rec_name.value = recName;
  document.replyForm.pm_rec_id.value = recID;
    document.replyForm.replyBtn.value = "Send reply to "+recName;
    if ($('#replyBox').is(":hidden")) {
      $('#replyBox').fadeIn(1000);
    } else {
      $('#replyBox').hide();
    }      
}


profile.processReply = function(){

      var pmSubject = $("#pmSubject");
    var pmTextArea = $("#pmTextArea");
    var sendername = $("#pm_sender_name");
    var senderid = $("#pm_sender_id");
    var recName = $("#pm_rec_name");
    var recID = $("#pm_rec_id");

    if (pmTextArea.val() == "") {
       $("#PMStatus").text("Please type in your message.").show().fadeOut(6000);
      } else {
      $("#pmFormProcessGif").show();

       $.ajax({
        url: "WICore/WIClass/WIAjax.php", // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data: {
                   action: "processReply",
                   profile : 1,
                   sub  : pmSubject,
                   text  : pmTextArea,
                   sender : sendername,
                   senderid : senderid,
                   recname : recName,
                   req_id : recID
               },
        success: function(data)   // A function to be called if request succeeds
        { 

        document.replyForm.pmTextArea.value = "";
         $("#pmFormProcessGif").hide();
         $('#replyBox').slideUp("fast");
         $("#PMFinal").html("&nbsp; &nbsp;"+data).show().fadeOut(8000);
         }

    });

   }
}