<script type="text/javascript">
$(document).ready(function () {
    var friendId = $.cookie("friendId");
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

});

$(window).on("unload", function(e) {
    console.log("this will be triggered");
    var friendId = $.cookie("friendId", "null")
});

</script>
<?php 
$thisRandNum = rand(9999999999999,999999999999999999);
$userId = WISession::get("user_id");
$friendId = WISession::get("friendId");
//echo $friendId;
if($friendId !== "null"){
  include_once 'WIInc/friend_profile.php';
}else{
include_once 'WIInc/my_profile.php';
}



