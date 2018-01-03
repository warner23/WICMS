<?php

/**
* 
*/
class profile_tabs
{
	
	function __construct()
	{
		$this->WIdb = WIdb::getInstance();
		$this->Web  = new WIWebsite();
		$this->Profile  = new WIProfile();
    $this->mod     = new WIModules();
	}

	public function mod_name()
	{
$thisRandNum = rand(9999999999999,999999999999999999);
		$userId = WISession::get("user_id");
	$friendId = WISession::get("friendId");
	//echo "friend" . $friendId;
	if($friendId > 0){

		echo '

  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">' . WILang::get('profile_wall') . '</a></li>
    <li><a href="#tabs-2">' . WILang::get('mess'). ' </a></li>
    
  </ul>
  <div id="tabs-1">
      Profile Wall

         <div width="67%" valign="top">
          <span style="font-size:10px; font-weight:800;">';
          echo $mainNameLine = $this->Profile->Display_name($friendId);
          echo '</span>';
               echo $interactionBox = $this->Profile->interactionBox($userId, $friendId);
               echo '</div>

          <div class="interactive" id="friends_requests">
 
          <div class="interactContainers" id="add_friend">
                <div  class="cancel" align="right"><a href="#" onclick="WIProfile.toggleInteractContainers(`add_friend`);">cancel</a> </div>
                Add';
                $this->Profile->getInfo($friendId, "username" );
                echo ' as a friend? &nbsp;
                <a href="#" onclick="WIProfile.addAsFriend(' . $userId . ', ' . $friendId . ')" >Yes</a>
                <span id="add_friend_loader"><img class="friend" src="../WIAdmin/WIMedia/Img/loading.gif" width="28" height="10" alt="Loading" /></span>
          </div>
          
          <div class="interactContainers" id="remove_friend">
                <div align="right"><a href="#" onclick="return false" onmousedown="profile.toggleInteractContainers(`remove_friend`);">cancel</a> </div>
                Remove ';
                $this->Profile->getInfo($friendId, "username");
                echo 'from your friend list? &nbsp;
                <a href="#" onclick="return false" onmousedown="javascript:removeAsFriend(' . $friendId . ',' . $friendId . ',' . $thisRandNum. ');">Yes</a>
                <span id="remove_friend_loader"><img class="loading_image" src="../WIAdmin/WIMedia/Img/loading.gif" alt="Loading" /></span>
          </div>
          <!-- START DIV that serves as an interaction status and results container that only appears when we instruct it to -->
          <div class="interactiveResults"></div>
           <!-- START DIV that contains the Private Message form -->
          <div class="interactContainers" id="private_message" style="background-color: #EAF4FF;">
<form id="pmForm">
<font size="+1">Sending Private Message to <strong><em>';
$this->Profile->getInfo($friendId, "username");#
echo '</em></strong></font><br /><br />
Subject:
<input name="pmSubject" id="pmSubject" type="text" maxlength="64" style="width:98%;" />
Message:
<textarea name="pmTextArea" id="pmTextArea" rows="4" style="width:98%;"></textarea>
  <input name="pm_sender_id" id="pm_sender_id" type="hidden" value="' . $friendId . '" />
  <input name="pm_sender_name" id="pm_sender_name" type="hidden" value="';$this->Profile->getInfo($friendId, "username"); echo '" />
  <input name="pm_rec_id" id="pm_rec_id" type="hidden" value="' . $userId . '" />
  <input name="pm_rec_name" id="pm_rec_name" type="hidden" value="' . $this->Profile->getInfo($userId, "username") . '" />
  <input name="pmWipit" id="pmWipit" type="hidden" value="' .$thisRandNum . '" />
  <span id="PMStatus" style="color:#F00;"></span>
  <br /><input name="pmSubmit" type="submit" value="Submit" onclick="WIProfile.privateMessage(event);" /> or <a href="#" onclick="WIProfile.toggleInteractContainers(`private_message`);">Close</a>
<span id="pmFormProcessGif" style="display:none;"><img class="priv_mes" src="../WIAdmin/WIMedia/Img/loading.gif" width="28" height="10" alt="Loading" /></span></form>
          </div>
          <!-- END DIV that contains the Private Message form -->
          <div class="interactContainers" id="friend_requests" style="background-color:#FFF; height:240px; overflow:auto;">
            <div align="right"><a href="#" onclick="return false" onmousedown="WIProfile.toggleInteractContainers(`friend_requests`);">close window</a> &nbsp; &nbsp; </div>
            <h3>The following people are requesting you as a friend</h3>
            </div>

           
    

          </div>


  </div>
  <div id="tabs-2">
    
    Messages
     <!-- start of messages tab -->';

          if($userId === $friendId)
            {
//include_once 'WIInc/messages_tabbed.php';
       $this->mod->getMod("profile_msg");
}else
 {
}

  echo '</div>

</div>';
	}else{
		echo '

  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">' . WILang::get('profile_wall'). '</a></li>
    <li><a href="#tabs-2">' .WILang::get('mess'). ' </a></li>
    
  </ul>
  <div id="tabs-1">
     ' . WILang::get('profile_wall'). '

         <div width="67%" valign="top">
          <span style="font-size:10px; font-weight:800;">';
          echo $mainNameLine = $this->Profile->Display_name($userId);
          echo '</span>';
          echo $interactionBox = $this->Profile->interactionBoxuser($userId); echo '</div>


          <div class="interactive" id="friends_requests">
          <div class="interactContainers" style="display:none;" id="remove_friend">
                <div align="right"><a href="#" onclick="return false" onmousedown="WIProfile.toggleInteractContainers(`remove_friend`);">cancel</a> </div>
                Remove';
                $this->Profile->getInfo($userId, "username" ); 
                echo ' from your friend list? &nbsp;
                <a href="#" onclick="return false" onmousedown="javascript:removeAsFriend(' . $userId . ',' . $userId . ',' . $thisRandNum . ');">Yes</a>
                <span id="remove_friend_loader"><img class="loading_image" src="WIInc/img/loading.gif" alt="Loading" /></span>
          </div>
          <!-- START DIV that serves as an interaction status and results container that only appears when we instruct it to -->
          <div class="interactiveResults"style="display:none;" ></div>
           <!-- START DIV that contains the Private Message form -->
          <div class="interactContainers" style="display:none;"  id="private_message" style="background-color: #EAF4FF;">
<form action="javascript:sendPM();" name="pmForm" id="pmForm" method="post">
<font size="+1">Sending Private Message to <strong><em>' . WISession::get('username') . '</em></strong></font><br /><br />
Subject:
<input name="pmSubject" id="pmSubject" type="text" maxlength="64" style="width:98%;" />
Message:
<textarea name="pmTextArea" id="pmTextArea" rows="4" style="width:98%;"></textarea>
  <input name="pm_sender_id" id="pm_sender_id" type="hidden" value="' . $userId . '" />
  <input name="pm_sender_name" id="pm_sender_name" type="hidden" value="' . WISession::get('username') . '>" />
  <input name="pm_rec_id" id="pm_rec_id" type="hidden" value="" />
  <input name="pm_rec_name" id="pm_rec_name" type="hidden" value="' . WISession::get('username') . '" />
  <input name="pmWipit" id="pmWipit" type="hidden" value="' . $thisRandNum . '" />
  <span id="PMStatus" style="color:#F00;"></span>
  <br /><input name="pmSubmit" type="submit" value="Submit" /> or <a href="#" onclick="return false" onmousedown="javascript:toggleInteractContainers(`private_message`);">Close</a>
<span id="pmFormProcessGif" style="display:none;"><img class="priv_mes" src="../../WIInc/WIInc/img/loading.gif" width="28" height="10" alt="Loading" /></span></form>
          </div>
          <!-- END DIV that contains the Private Message form -->
          <div class="interactContainers" style="display:none;"  id="friend_requests" style="background-color:#FFF; height:240px; overflow:auto;">
            <div align="right"><a href="#" onclick="WIProfile.toggleInteractContainers(`friend_requests`);">close window</a> &nbsp; &nbsp; </div>
            <h3>The following people are requesting you as a friend</h3>';
            $this->Profile->friendRequests($userId);
            echo '</div>

           
    

          </div>


  </div>
  <div id="tabs-2">
    
    Messages';

// include_once 'WIInc/messages_tabbed.php'; 
      $this->mod->getMod("profile_msg");

  echo '</div>

</div>';
	}

}


}