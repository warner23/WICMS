<?php

class WIProfile
{

	private $userId;

	private $WIdb;

	function __construct()
	{
		$this->WIdb = WIdb::getInstance();
	}

	public function userDetails($userId, $column)
	{

		$result[$column] = $this->WIdb->selectColumn(
			"SELECT * FROM `wi_user_details` WHERE `user_id` =:userId",
			array(
				"userId" => $userId 
				), $column
			);
		//var_dump($result);
		echo $result[$column];
	}

	 public function getInfo($userId, $column)
	 {

		$result[$column] = $this->WIdb->selectColumn(
			"SELECT * FROM `wi_members` WHERE `user_id` =:userId",
			array(
				"userId" => $userId 
				), $column
			);
		echo $result[$column];
      }

      	 public function getProfileInfo($userId, $column)
	 {

		$result[$column] = $this->WIdb->selectColumn(
			"SELECT * FROM `wi_members` WHERE `user_id` =:userId",
			array(
				"userId" => $userId 
				), $column
			);
		return $result[$column];
      }

      	 public function User_pic($userId)
	 {

	 	//echo "user" . $userId;
	 		 	$query = $this->WIdb->prepare('SELECT * FROM `wi_user_details` WHERE `user_id` =:value');
	 	$query->bindParam(':value', $userId, PDO::PARAM_INT);
	 	$query->execute();
	    while ($result = $query->fetchAll(PDO::FETCH_ASSOC) ) {
	    	//print_r($result);
	    	//echo "ave" . $result[0]['avatar'];
	    	//if($result["avatar"] === " ")
	    	if(!empty($result[0]["avatar"])){
			 echo '<img class="profile" src="../WIAdmin/WIMedia/Img/avator/' . $result[0]["avatar"] . '" width="218px" /><a href="#" onclick="WIProfile.photo()" class="btn pic">' . WILang::get("change_pic") . '</a>';
			
		} else {
		  echo '<img class="profile" src="../WIAdmin/WIMedia/Img/avator/image01.jpg" width="218px" /><a href="#"" onclick="WIProfile.photo()" class="btn pic">' . WILang::get("change_pic") . '</a>';
		}

	    	
	   }
	}

	    public function Friend_User_pic($userId)
	 {

	 	//echo "user" . $userId;
	 		 	$query = $this->WIdb->prepare('SELECT * FROM `wi_user_details` WHERE `user_id` =:value');
	 	$query->bindParam(':value', $userId, PDO::PARAM_INT);
	 	$query->execute();
	    while ($result = $query->fetchAll(PDO::FETCH_ASSOC) ) {
	    	//print_r($result);
	    	//echo "ave" . $result[0]['avatar'];
	    	//if($result["avatar"] === " ")
	    	if(!empty($result[0]["avatar"])){
			 echo '<img class="profile" src="../WIAdmin/WIMedia/Img/avator/' . $result[0]["avatar"] . '" width="218px" />';
			
		} else {
		  echo '<img class="profile" src="../WIAdmin/WIMedia/Img/avator/image01.jpg" width="218px" />';
		}

	    	
	   }

	 }

	 	    public function FriendsList_User_pic($userId)
	 {

	 	//echo "user" . $userId;
	 		 	$query = $this->WIdb->prepare('SELECT * FROM `wi_user_details` WHERE `user_id` =:value');
	 	$query->bindParam(':value', $userId, PDO::PARAM_INT);
	 	$query->execute();
	    while ($result = $query->fetchAll(PDO::FETCH_ASSOC) ) {
	    	//print_r($result);
	    	//echo "ave" . $result[0]['avatar'];
	    	//if($result["avatar"] === " ")
	    	if(!empty($result[0]["avatar"])){
			 return '<img class="friend_pic" src="../WIAdmin/WIMedia/Img/avator/' . $result[0]["avatar"] . '" width="50px" border="1" />';
			
		} else {
		  return '<img class="friend_pic" src="../WIAdmin/WIMedia/Img/avator/image01.jpg" width="50px" border="1"/>';
		}

	    	
	   }

	 }

	 public function UploadProfilePic($img, $userId)
	 {
	 	//echo "user". $userId;
	 	//echo "img" . $img;

	 	$sql = "UPDATE `wi_user_details` SET `avatar` = :img WHERE `user_id` = :userId";
	 	$query = $this->WIdb->prepare($sql);
	 	$query->bindParam(':img', $img, PDO::PARAM_STR);
	 	$query->bindParam(':userId', $userId, PDO::PARAM_INT);
	 	$query->execute();

	 	/*
	 	 $this->WIdb->update(
                    'WI_user_details',
                     array(
                         "avatar" => $img
                     ),
                     "`user_id` = :userId",
                     array("user_id" => $userId)
                );
               */
	 	 $result = "successful";

	 	 echo $result;
	 }


	 public function Display_name($userId)
	 {

	 	$query = $this->WIdb->prepare('SELECT * FROM `wi_user_details` WHERE `user_id` =:value LIMIT 1');
	 	$query->bindParam(':value', $userId, PDO::PARAM_INT);
	 	$query->execute();

	   $res = $query->fetch(PDO::FETCH_ASSOC);

	   $first_name = $res['first_name'];
				$last_name = $res['last_name'];

		if ($first_name != "" && $last_name != "")
			{

 $mainNameLine = "$first_name $last_name";
		$username = $first_name;
} else 
{
	$username = $this->getInfo('user_id', 'username');
		$mainNameLine = $username;
}
		if($mainNameLine == $first_name)

		{
			echo '<div class="name">Name: ' . $mainNameLine .'</div>
    <div class="username">Username: '. $username . '</div>';
		} 

		else 
		{
		   echo  '<div class="name">Name: ' . $mainNameLine . '</div>';
		}

	 }


	 	 public function LocationInfo($userId)
	 {

	 	$query = $this->WIdb->prepare('SELECT * FROM `wi_user_details` WHERE `user_id` =:value LIMIT 1');
	 	$query->bindParam(':value', $userId, PDO::PARAM_INT);
	 	$query->execute();

	   $res = $query->fetch(PDO::FETCH_ASSOC);
	   //var_dump($res);
	   $country = $res['country'];
	   $state   = $res['region'];
	   $city    = $res['city'];
	   if ($country === "" && $state === "" && $city === "") 
	   {
    echo  "";
  } else {
  echo "$city &middot; $state<br />$country ".'<a href="#" onclick="return false" onmousedown="profile.toggleViewMap(`google_map`);">view map</a>'; 
  }
	 }


	 public function Social_Profile($userId)
	 {

	 	$query = $this->WIdb->prepare('SELECT * FROM `wi_user_details` WHERE `user_id` =:value LIMIT 1');
	 	$query->bindParam(':value', $userId, PDO::PARAM_INT);
	 	$query->execute();

	   $res = $query->fetch(PDO::FETCH_ASSOC);
	   $youtube = $res['youtube'];
	   $facebook = $res['facebook'];
	   $website = $res['website'];
	   $twitter = $res['twitter'];

	   if($youtube == "")
		{
			  $youtube = "";
			} else 
			{
			  $youtube = '<br /><br /><img src="WIInc/img/social_info/youtubeIcon.jpg" width="18" height="12" alt="Youtube Channel for ' . $username . '" /> <strong>YouTube Channel:</strong><br /><a href="http://www.youtube.com/user/' . $youtube . '" target="_blank">youtube.com/' . $youtube . '</a>';
			}

			///////  Mechanism to Display Facebook Profile link or not  //////////////////////////
			  if ($facebook == "") {
			    $facebook = "";
			  } else {
			  $facebook = '<br /><br /><img src="WIInc/img/social_info/facebookIcon.jpg" width="18" height="12" alt="Facebook Profile for ' . $username . '" /> <strong>Facebook Profile:</strong><br /><a href="http://www.facebook.com/' . $facebook . '" target="_blank">profile.php?id=' . $facebook . '</a>';
			  }
			  ///////  Mechanism to Display Twitter Tweet Widget or not  //////////////////////////
			  if ($twitter == "") {
			    $twitterWidget = "";
			  } else {
			  $twitterWidget = "<script src=\"http://widgets.twimg.com/j/2/widget.js\"></script>
			<script>
			new TWTR.Widget({
			  version: 2,
			  type: 'profile',
			  rpp: 5,
			  interval: 6000,
			  width: 218,
			  height: 160,
			  theme: {
			    shell: {
			      background: '#BDF',
			      color: '#000000'
			    },
			    tweets: {
			      background: '#ffffff',
			      color: '#000000',
			      links: '#0066FF',
			    }
			  },
			  features: {
			    scrollbar: true,
			    loop: false,
			    live: false,
			    hashtags: true,
			    timestamp: true,
			    avatars: false,
			    behavior: 'all'
			  }
			}).render().setUser('$twitter').start();
			</script>";
			  }
			    ///////  Mechanism to Display Website URL or not  //////////////////////////
			  if ($website == "") {
			    $website = "";
			  } else {
			  $website = '<br /><br /><img src="WIInc/img/social_info/websiteIcon.jpg" width="18" height="12" alt="Website URL for ' . $username . '" /> <strong>Website:</strong><br /><a href="http://' . $website . '" target="_blank">' . $website . '</a>'; 
			  }

			//mechanism to show all 4
			  if ($youtube != "" && $facebook != "" && $twitter != "" && $website != "")
			{
			  echo '<div class="web">' . $website . '</div>
			              <div class="yout">' . $youtube . '</div>
			              <div class="fb">' . $facebook . '</div>
			              <div class="twit">' . $twitterWidget . '</div>';
			              
			}else
			{
			  echo $website, $facebook, $twitter, $youtube;
			  
			}

	 }


	 public function Detect_user_device()
	 {
	 	// ------- DETECT USER DEVICE ----------
$user_device = "";
$agent = $_SERVER['HTTP_USER_AGENT'];
if (preg_match("/iPhone/", $agent)) {
   $user_device = "iPhone Mobile";
} else if (preg_match("/Android/", $agent)) {
    $user_device = "Android Mobile";
} else if (preg_match("/IEMobile/", $agent)) {
    $user_device = "Windows Mobile";
} else if (preg_match("/Chrome/", $agent)) {
    $user_device = "Google Chrome";
} else if (preg_match("/MSIE/", $agent)) {
    $user_device = "Internet Explorer";
} else if (preg_match("/Firefox/", $agent)) {
    $user_device = "Firefox";
} else if (preg_match("/Safari/", $agent)) {
    $user_device = "Safari";
} else if (preg_match("/Opera/", $agent)) {
    $user_device = "Opera";
}
$OSList = array
(
        // Match user agent string with operating systems
        'Windows 3.11' => 'Win16',
        'Windows 95' => '(Windows 95)|(Win95)|(Windows_95)',
        'Windows 98' => '(Windows 98)|(Win98)',
        'Windows 2000' => '(Windows NT 5.0)|(Windows 2000)',
        'Windows XP' => '(Windows NT 5.1)|(Windows XP)',
        'Windows Server 2003' => '(Windows NT 5.2)',
        'Windows Vista' => '(Windows NT 6.0)',
        'Windows 7' => '(Windows NT 6.1)|(Windows NT 7.0)',
        'Windows NT 4.0' => '(Windows NT 4.0)|(WinNT4.0)|(WinNT)|(Windows NT)',
        'Windows ME' => 'Windows ME',
        'Open BSD' => 'OpenBSD',
        'Sun OS' => 'SunOS',
        'Linux' => '(Linux)|(X11)',
        'Mac OS' => '(Mac_PowerPC)|(Macintosh)',
        'QNX' => 'QNX',
        'BeOS' => 'BeOS',
        'OS/2' => 'OS/2',
		'Mac OS' => 'Mac OS',
        'Search Bot'=>'(nuhk)|(Googlebot)|(Yammybot)|(Openbot)|(Slurp)|(MSNBot)|(Ask Jeeves/Teoma)|(ia_archiver)'
);
 
// Loop through the array of user agents and matching operating systems
foreach($OSList as $CurrOS=>$Match) {
        // Find a match
        if (preg_match('/[regex]/i' ,$Match, $agent)) {
                break;
        } else {
			$CurrOS = "Unknown OS";
		}
}
$device = "$user_device : $CurrOS";
// ------- END DETECT USER DEVICE ----------

	 }


	 public function UpdateBio($userId, $bio)
	 {
	 	 $query = $this->WIdb->prepare('UPDATE `wi_user_details` SET  `bio_body` =:bio WHERE `user_id` =:userId');
				$query->bindParam(':bio', $bio, PDO::PARAM_STR);
				$query->bindParam(':userId', $userId, PDO::PARAM_INT);
				$query->execute();

				$msg = WILang::get('successfully_updated_bio');

         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            
            //output result
            echo json_encode ($result); 
	 }

	 public function updateProfileDetails($userId, $fname, $lname)
	 {
	 	$query = $this->WIdb->prepare('UPDATE `wi_user_details` SET  `first_name` =:fname, `last_name` =:lname WHERE `user_id` =:userId');
				$query->bindParam(':fname', $fname, PDO::PARAM_STR);
				$query->bindParam(':lname', $lname, PDO::PARAM_STR);
				$query->bindParam(':userId', $userId, PDO::PARAM_INT);
				$query->execute();

				$msg = WILang::get('successfully_updated_bio');

         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            
            //output result
            echo json_encode ($result); 
	 }


	  public function updateLocation($userId, $country, $region, $city)
	 {
	 	$query = $this->WIdb->prepare('UPDATE `wi_user_details` SET  `country` =:country, `region` =:region, `city` =:city WHERE `user_id` =:userId');
				$query->bindParam(':country', $country, PDO::PARAM_STR);
				$query->bindParam(':region', $region, PDO::PARAM_STR);
				$query->bindParam(':city', $city, PDO::PARAM_STR);
				$query->bindParam(':userId', $userId, PDO::PARAM_INT);
				$query->execute();

				$msg = WILang::get('successfully_updated_bio');

         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            
            //output result
            echo json_encode ($result); 
	 }

	 	  public function updateSocial($userId, $youtube, $facebook, $twitter, $website)
	 {
	 	/*
	 	$query = $this->WIdb->prepare('UPDATE `WI_user_details` SET  `youtube` =:youtube, `facebook` =:facebook, `twitter` =:twitter, `website` =:website WHERE `user_id` =:userId');
				$query->bindParam(':youtube', $youtube, PDO::PARAM_STR);
				$query->bindParam(':facebook', $facebook, PDO::PARAM_STR);
				$query->bindParam(':twitter', $twitter, PDO::PARAM_STR);
				$query->bindParam(':website', $website, PDO::PARAM_STR);
				$query->bindParam(':userId', $userId, PDO::PARAM_INT);
				$query->execute();
	*/
				$query =  $this->WIdb->update (
                        "wi_user_details", 
                        array( 
                        	"youtube" => $youtube,
                        	"facebook" => $facebook,
                        	"twitter" => $twitter,
                        	"website" => $website

                        	), 
                        "`user_id` = :userId", 
                        array( "userId" => $userId)
                      );

				$msg = WILang::get('successfully_updated_social_profile');

         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            
            //output result
            echo json_encode ($result); 
	 }


	 public function FriendsPopUp($userId)
	 {

	 	$query = $this->WIdb->prepare('SELECT * FROM `wi_user_details` WHERE `user_id` = :userId');
	 	$query->bindParam(':userId', $userId, PDO::PARAM_INT);
	 	$query->execute();

	 	$result = $query->fetch(PDO::FETCH_ASSOC);
	 	$friend_array = $result['friend_array'];

		if ($friend_array  != ""){
		// ASSEMBLE FRIEND LIST AND LINKS TO VIEW UP TO 6 ON PROFILE
	$friendArray = explode(",", $friend_array);
	$friendCount = count($friendArray);
    $friendArray6 = array_slice($friendArray, 0, 6);
    //echo "friend arrray". $friendArray;
    //echo "friend count". $friendCount;
    // echo "friend 6". $friendArray6;
    $username = WIProfile::getProfileInfo($userId, 'username');
   	
		
	echo  '<div class="infoHeader"> ' . $username . 's Friends <a href="#" onclick="profile.toggleViewAllFriends(`view_all_friends`);">(' . $friendCount . ')</a></div>';
    $i = 0; // create a varible that will tell us how many items we looped over 
	 foreach ($friendArray6 as $key => $value) {
	 $i++; // increment $i by one each loop pass 
	 //echo "value". $value;
		//$check_pic = 'members/' . $value . '/image01.jpg';
				echo  '<a href="#" onclick="profile.profile();">' . WIProfile::FriendsList_User_pic($value) . '</a>';


			$sql = "SELECT * FROM `wi_members` WHERE `user_id` =:value";
			$query1 = $this->WIdb->prepare($sql);
			$query1->bindParam(':value', $value, PDO::PARAM_INT);
			$query1->execute();

		    while ($res = $query->fetchAll(PDO::FETCH_ASSOC)) { 
		    	var_dump($res);

			if ($i % 6 == 4){
				echo '<tr><td><div style="width:56px; height:68px; overflow:hidden;" title="">
				<a href="profile.php"></a><br />' . $frnd_pic . '
				</div></td>';  
			} else {
				echo '<td><div style="width:56px; height:68px; overflow:hidden;" title="">
				<a href="profile.php"></a><br />' . $frnd_pic . '
				</div></td>'; 
			}
			
	 }

		}
	}
}

	 public function interactionBox($userId, $friendId)
	 {

	 	$userId = WISession::get('user_id');
       if(isset($userId) && $userId != $friendId)
       {

  $thisRandNum = rand(9999999999999,999999999999999999);
//	 	$friend_array =  userDetails($userId, 'friend_array');

	 	//$value = $userId;
	 	$query = $this->WIdb->prepare('SELECT * FROM `wi_user_details` WHERE `user_id` =:value LIMIT 1');
	 	$query->bindParam(':value', $friendId, PDO::PARAM_INT);
	 	$query->execute();

	   $res = $query->fetch(PDO::FETCH_ASSOC);
	   //print_r($res);
		$friends = $res['friend_array'];
         $iFriend_array = explode(",", $friends);
		if (in_array($friendId, $iFriend_array)) 
		{ 

		$friendLink = '<a href="#" onclick="profile.toggleInteractContainers(`remove_friend`);">Remove Friend</a>';
	} else {
	    	$friendLink = '<a href="#" onclick="profile.toggleInteractContainers(`add_friend`);">Add as Friend</a>';
	}

	 	echo $interactionBox = '<div class="interactionLinksDiv">
       ' . $friendLink . ' 
           <a href="#" onclick="profile.toggleInteractContainers(`private_message`);">Private Message</a>
          </div>';
      $the_blab_form = '<div style="background-color:#BDF; border:#999 1px solid; padding:8px;">
      <form action="" method="post" enctype="multi+part/form-data" name="blab_from">
          <textarea name="blab_field" rows="3" style="width:99%;"></textarea>
          <input name="blabWipit" type="hidden" value="' . $thisRandNum . '" />
          <strong>Write on  Profile Wall</strong><input name="submit" type="submit" value="Blab" />
          </form></div>';
  }if (isset($userId) && $userId == $friendId)
  { // If SESSION id is set, AND it does equal the profile owner's ID
  $thisRandNum = rand(9999999999999,999999999999999999);
  $interactionBox = '<div class="interactionLinksDiv">
           <a href="#" onclick="return false" onmousedown="profile.toggleInteractContainers(`friend_requests`);">Friend Requests</a>
          </div>';
      $the_blab_form = '
          <div style="background-color:#BDF; border:#999 1px solid; padding:8px;">
          <form action="" method="post" enctype="multi+part/form-data" name="blab_from">
          <textarea name="blab_field" rows="3" style="width:99%;"></textarea>
      <input name="blabWipit" type="hidden" value="' . $thisRandNum . '" />
          <strong>Talk away </strong> (220 char max) <input name="submit" type="submit" value="Blab" />
          </form></div>';
} else { // If no SESSION id is set, which means we have a person who is not logged in
  $interactionBox = '<div style="border:#CCC 1px solid; padding:5px; background-color:#E4E4E4; color:#999; font-size:11px;">
           <a href="#">Sign Up</a> or <a href="#">Log In</a> to interact with
          </div>';
      $the_blab_form = '<div style="background-color:#BDF; border:#999 1px solid; padding:8px;">
          <textarea name="blab_field" rows="3" style="width:99%;"></textarea>
          <a href="#">Sign Up</a> or <a href="#">Log In</a> to write on  Board
          </div>';


}
	 }

	  public function interactionBoxuser($userId)
	 {

		  $thisRandNum = rand(9999999999999,999999999999999999);
//	 	$friend_array =  userDetails($userId, 'friend_array');

	 	//$value = $userId;
	 	$query = $this->WIdb->prepare('SELECT * FROM `wi_user_details` WHERE `user_id` =:value LIMIT 1');
	 	$query->bindParam(':value', $userId, PDO::PARAM_INT);
	 	$query->execute();

	   while($res = $query->fetch(PDO::FETCH_ASSOC)){

		echo $interactionBox = '<div class="interactionLinksDiv">
           <a href="#" onclick="profile.toggleInteractContainers(`friend_requests`);">Friend Requests</a>
          </div>';
      $the_blab_form = '
          <div style="background-color:#BDF; border:#999 1px solid; padding:8px;">
          <form action="" method="post" enctype="multi+part/form-data" name="blab_from">
          <textarea name="blab_field" rows="3" style="width:99%;"></textarea>
      <input name="blabWipit" type="hidden" value="' . $thisRandNum . '" />
          <strong>Talk away </strong> (220 char max) <input name="submit" type="submit" value="Blab" />
          </form></div>';

	   }
	}

	public function friendRequests($userId)
	{

		$result = $this->WIdb->select(
			"SELECT * FROM `wi_friends_requests` WHERE `user_id` =:userId LIMIT 50",
			array(
				"userId" => $userId 
				)
			);
		//print_r($result);
		if( count($result) < 1){
			echo 'You have no Friend Requests at this time.';
		}else{
			$requests = $result[0]['sender_id'];
			$requester_username = WIProfile::getInfo($requests, "username" );
		
		//echo "req".$requests;
			$sql="SELECT * FROM `wi_user_details` WHERE `user_id`=:requests";
			$query = $this->WIdb->prepare($sql);
			$query->bindParam(':requests', $requests, PDO::PARAM_INT);
			$query->execute();

			while ($res = $query->fetch(PDO::FETCH_ASSOC)) {
			if(!empty($res[0]["avatar"])){
			 echo '<img class="request" src="../WIAdmin/WIMedia/Img/avator/' . $result[0]["avatar"] . '" width="50px" />';
			
		} else {
		  echo '<img class="request" src="../WIAdmin/WIMedia/Img/avator/image01.jpg" width="50px" />';
		}
		    echo	'<td width="83%"><a href="#">' . $requester_username . '</a> wants to be your Friend!<br /><br />
					    <span id="req' . $res['user_id'] . '">
					    <a href="#" onclick="profile.acceptFriendRequest(' . $res['user_id'] . ');" >Accept</a>
					    &nbsp; &nbsp; OR &nbsp; &nbsp;
					    <a href="#" onclick="profile.denyFriendRequest(' . $res['user_id'] . ');" >Deny</a>
					    </span></td>
                        </tr>
                       </table>';
        	}	
        } 

	}

	public function acceptRequest($req_id)
	{

		$result = $this->WIdb->select(
			"SELECT * FROM `wi_friends_requests` WHERE `sender_id`=:req_id",
			array(
				"req_id" => $req_id 
				)
			);
		$sender_id = $result[0]['sender_id'];
		$userId = $result[0]['user_id'];

		$result1 = $this->WIdb->select(
			"SELECT `friend_array` FROM `wi_user_details` WHERE `user_id`=:userId",
			array(
				"userId" => $userId 
				)
			);
			if($result1[0]['friend_array'] !== "null"){
			$friend_array = $result1[0]['friend_array'];
			$frndArry = explode(",", $friend_array);
			if (in_array($sender_id, $frndArry)) {
			 echo  'This member is already your Friend';
			  exit(); 
				}
			}


			$sql = "UPDATE `wi_user_details` SET `friend_array` = :sender_id WHERE `id_user_details` =:userId";
			$query = $this->WIdb->prepare($sql);
			$query->bindParam(':sender_id', $sender_id, PDO::PARAM_INT);
			$query->bindParam(':userId', $userId, PDO::PARAM_INT);
			$query->execute();

			$sql1 = "DELETE FROM `wi_friends_requests` WHERE `sender_id`=:sender_id";
			$query1 = $this->WIdb->prepare($sql1);
			$query1->bindParam(':sender_id', $sender_id, PDO::PARAM_INT);
			$query1->execute();

			echo "You are now friends with this member!";


	}

	public function denyRequest($req_id)
	{
		$sql = "DELETE FROM `wi_friends_requests` WHERE `sender_id`=:sender_id";
			$query = $this->WIdb->prepare($sql1);
			$query->bindParam(':sender_id', $sender_id, PDO::PARAM_INT);
			$query->execute();

			echo "Request Denied";

	}


	 public function PMList($id, $column)
	 {
	 	
	 	$query = $this->WIdb->prepare('SELECT * FROM `wi_private_messages` WHERE `rec_id`=:userId  ORDER BY id DESC LIMIT 10');
	 	$query->bindParam(':userId', $id, PDO::PARAM_INT);
	 	$query->execute();
	    $res = $query->fetch(PDO::FETCH_ASSOC);

	    $result[$column] = $this->WIdb->select(
			"SELECT * FROM `wi_private_messages` WHERE `rec_id`=:userId  ORDER BY id DESC LIMIT 10",
			array(
				"userId" => $id				)
			);
		return $res[$column];
	 }

	 public function PMListUsernames($fr_id, $column)
	 {

	 	$query = $this->WIdb->prepare('SELECT `user_id`, `username` FROM `wi_members` WHERE `user_id` =:fr_id LIMIT 10');
	 	$query->bindParam(':fr_id', $fr_id, PDO::PARAM_INT);
	 	$query->execute();

	    $res = $query->fetch(PDO::FETCH_ASSOC);

		return $res[$column];
	 }


	 public function PMSentList($from_id, $column)
	 {

	 	$del = 0;

	 	$query = $this->WIdb->prepare('SELECT * FROM `wi_private_messages` WHERE `sender_id` =:userId AND `senderDelete` =:del ORDER BY id DESC LIMIT 100');
	 	$query->bindParam(':userId', $from_id, PDO::PARAM_INT);
	 	$query->bindParam(':del', $del, PDO::PARAM_INT);
	 	$query->execute();

	 	$res = $query->fetch(PDO::FETCH_ASSOC);

		return $res[$column];

	 }


		 public function PMSentUsernames($to_id, $column)
	 {

	 	$query = $this->WIdb->prepare('SELECT `user_id`, `username` FROM `wi_members` WHERE `user_id` =:to_id LIMIT 10');
	 	$query->bindParam(':to_id', $to_id, PDO::PARAM_INT);
	 	$query->execute();

	    $res = $query->fetch(PDO::FETCH_ASSOC);

		return $res[$column];
	 }	


	 public function privateMessage($pmSub, $pmText, $senderid, $sendername, $rec_id, $recName)
	 {
	 	$this->WIdb->insert('wi_private_messages', array(
            "sender_id"     => $senderid,
            "sender_name"  => $sendername,
            "rec_id"  => $rec_id,
            "rec_name" => $recName,
            "subject" => $pmSub,
            "message" => $pmText
        )); 

        echo '<img src="../WIAdmin/WIMedia/Img/round_success.png" alt="Success" width="31" height="30" /> &nbsp;&nbsp;&nbsp;<strong>Message sent successfully</strong>';

	 }

	 public function MarkAsRead($msgId, $userId)
	 {
	 	//echo "msg" . $msgId;
	 	//echo "user" . $userId;
	 	$open = "1";
	 	$sql = "UPDATE `wi_private_messages` SET `opened`=:open WHERE `id`=:msgId limit 1";
	 	$query = $this->WIdb->prepare($sql);
	 	$query->bindParam(':open',$open, PDO::PARAM_STR);
	 	$query->bindParam(':msgId',$msgId, PDO::PARAM_INT);
	 	$query->execute();

	 	$result = array(
	 		"success" => "success"
	 		);

	 	echo json_encode($result);

	 }

	 public function reply($pmSub, $pmText, $sendername, $senderid,$recName, $recID)
	 {
	 	$this->WIdb->insert('wi_private_messages', array(
            "sender_id"     => $senderid,
            "sender_name"  => $sendername,
            "rec_id"  => $recID,
            "rec_name" => $recName,
            "subject" => $pmSub,
            "message" => $pmText,
            "time_sent" => date("Y-m-d-h:i:s")
        )); 

	 }

	 public function friendProfile($friend)
	 {
	 	WISession::set("friendId", $friend);
	 }

	 public function friendProfile0()
	 {
	 	WISession::set("friendId", 0);
	 }

	 public function addFriend($userId, $friendId)
	 {
	 	//echo "user" . $userId;
	 	//echo "friend". $friendId;
	 	if ($userId == "" || $friendId == "" ) {
		echo  'Error: Missing data';
		}
	 	$result = $this->WIdb->select(
			"SELECT `friend_array` FROM `wi_user_details` WHERE `user_id` =:userId LIMIT 1",
			array(
				"userId" => $userId 
				)
			);
	 	 if( $result[0]['friend_array'] !== "null"){
	 		$friendArray = $result[0]['friend_array'];
	 		$friends = explode(",", $friendArray);

	 		if(in_array($friendId, $friends)) {
	 		 echo  'This member is already your Friend';
	 		}
	 	}

	 	$result1 = $this->WIdb->select(
			"SELECT * FROM `wi_friends_requests` WHERE `user_id` =:userId AND `sender_id` = :friendId LIMIT 1",
			array(
				"userId" => $userId,
				"friendId" => $friendId 
				)
			);
	 	//var_dump($result1);
	 	if ( count($result1) > 0) {
		echo '<img src="../WIAdmin/WIMedia/Img/round_error.png" width="20" height="20" alt="Error" /> This user has requested you as a Friend already! Check your Requests on your profile.';
		}

		$result2 = $this->WIdb->select(
			"SELECT * FROM `wi_friends_requests` WHERE `user_id` =:friendId AND `sender_id`= :userId LIMIT 1",
			array(
				"userId" => $userId,
				"friendId" => $friendId
				)
			);
	 	if (count ($result2) > 0) {
		echo '<img src="../WIAdmin/WIMedia/Img/round_error.png" width="20" height="20" alt="Error" /> You have a Friend request pending for this member. Please be patient.';
		}

	$this->WIdb->insert('wi_friends_requests', array(
            "sender_id"  => $friendId,
            "user_id" => $userId,
           "timedate" => date("Y-m-d-h:i:s")

        )); 

	echo '<img src="../WIAdmin/WIMedia/Img/round_success.png" width="20" height="20" alt="Success" /> Friend request sent successfully. This member must approve the request.';

	 }
	
	 

}

?>