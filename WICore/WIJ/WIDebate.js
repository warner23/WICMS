/*****
** WIDebate name space updated
*
*/////////////

$(document).ready(function () {
 WIDebate.time();
});
var WIDebate = {};


WIDebate.debate = function(event, $userId, $userVoteId, $topic_id){
  event.preventDefault();
  
    var $dOut = $('#date').text(),
    $time = $('#time').text();

    var $dateTime = $dOut + ' ' + $time;

  //var userVoteId = $(".listing").attr('id');

  $.ajax({
      url      : "WICore/WIClass/WIAjax.php",
      method   : "POST",
      data     : {
        action : "debate",
        debate : 1,
        userId : $userId,
        userVoteId : $userVoteId,
        topic_id : $topic_id,
        dateTime : $dateTime
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


WIDebate.Profile = function(friendId){
//alert('clicked');
 var friendId;
// alert(friendId);
            $.cookie("friendId", friendId);
            
           // alert($.cookie("friendId"));
//alert($.cookie("product_type"));
           window.location = "WImembers/profile.php";

}


WIDebate.time = function(){

  var $dOut = $('#date'),
    $hOut = $('#hours'),
    $mOut = $('#minutes'),
    $sOut = $('#seconds'),
    $ampmOut = $('#ampm');
    $time = $('#time');
var months = [
  '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'
];

// var months = [
//   'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
// ];

var days = [
  'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'
];


function update(){
  var date = new Date();
  
  var ampm = date.getHours() < 12
             ? 'AM'
             : 'PM';
  
  var hours = date.getHours() == 0
              ? 12
              : date.getHours() > 12
                ? date.getHours() - 12
                : date.getHours();
  
  var minutes = date.getMinutes() < 10 
                ? '0' + date.getMinutes() 
                : date.getMinutes();
  
  var seconds = date.getSeconds() < 10 
                ? '0' + date.getSeconds() 
                : date.getSeconds();
  
  //var dayOfWeek = days[date.getDay()];
  var month = months[date.getMonth()];
  var day = date.getDate();
  //alert(day);
  if (day < 10) {
    //alert("2");
   var day = '0' + date.getDate();
  }
  var year = date.getFullYear();
  
  //var dateString = /*dayOfWeek + ', ' +*/ month + ' ' + day + ', ' + year;
  var dateString =  year + '-' + month + '-' + day;
  var Time = hours +':' + minutes + ':' + seconds;

  $dOut.text(dateString);
  $time.text(Time);
} 

update();
window.setInterval(update, 1000);
}