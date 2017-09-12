
<?php 
$thisRandNum = rand(9999999999999,999999999999999999);
$userId = WISession::get("user_id");
$friendId = WISession::get("friendId");
//echo $friendId;
if($friendId > 0){
  include_once 'WIInc/friend_profile.php';
}else{
include_once 'WIInc/my_profile.php';
}



