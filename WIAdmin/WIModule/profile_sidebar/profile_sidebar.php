<?php

/**
* 
*/
class profile_sidebar 
{
	
	function __construct()
	{
		$this->WIdb = WIdb::getInstance();
		$this->Web  = new WIWebsite();
		$this->Profile  = new WIProfile();
	}

	public function mod_name()
	{
$thisRandNum = rand(9999999999999,999999999999999999);
		$userId = WISession::get("user_id");
	$friendId = WISession::get("friendId");
	//echo "friend" . $friendId;
	if($friendId > 0){

		echo '<div class="bio">
  <div class="titleP">' . WILang::get('bio'). '>:</div>
  <div id="bio">';

    $bio_body = $this->Profile->userDetails($friendId, 'bio_body');
   echo '</div>
  </div>
  <div class="User-Info ' .WILang::get('info') . '">
<div class="titleP">';
 $username  = $this->Profile->getInfo($friendId, 'username');echo'<br/>';
echo WILang::get('info');
echo ': </div>
 <div id="details"></div>';
 echo $userinfo = $this->Profile->Display_name($friendId);

    echo '</div><!-- end of userinfo-->


    <div class="user_location">
       <div class="titleP">' .WILang::get('user_location'). ' :</div>
       <div id="location">';
       $locationInfo = $this->Profile->LocationInfo($friendId); 
      echo ' </div>

    </div>

    <div class="social_profile">
    <div class="titleP">' .WILang::get('social_info') . ':</div>
    <div id="social">';
    echo $Social_profile = $this->Profile->Social_Profile($friendId);

    echo '</div>
    

    </div><!-- end social profile-->
  
  <div class="stats">
  <div class="friends">
  <div class="friends_bar">
  <div class="titleP">' . WILang::get('friend'). ':</div>
  <div class="friend1">';
     echo $friendList = $this->Profile->FriendsPopUp($friendId);
         echo '<div id="view_all_friends">' . WILang::get(`friend`) . '
              <div class="friending">
                       <div class="friends_box">All Friends</div> 
                       <a href="#" onclick="return false" onmousedown="profile.toggleViewAllFriends(`view_all_friends`);">close </a>
              </div>
              <div class="WIFriends">
                   <?php echo $friendPopBoxList; ?>
              </div>
              <div style="padding:6px; background-color:#000; border-top:#666 1px solid; font-size:10px; color: #0F0;">
                       Temporary programming shows 50 maximum. Navigating through the full list is coming soon.
              </div>
              <?php echo $twitterWidget; ?>
              <div class="infoBody" style="border-bottom:#999 1px solid;"></div>  
<?php echo $blabberDisplayList; ?>
</div>
</div>
</div><!-- end stats-->';
	}else{
		echo '<div class="bio">
  <div class="titleP">' . WILang::get('bio') . ':<a href="javascript:void(0);" class="btn" onclick="WIProfile.bio()">Edit</a></div>
  <div id="bio">';
   echo $bio_body = $this->Profile->userDetails($userId, 'bio_body');
   echo '</div>
   <div id="editBio" class="hide">
   <div class="control-group form-group closed" id="updateBio">
               <div class="controls col-lg-12">
              <textarea type="text" id="bio"  maxlength="88" name="bio" placeholder="bio" class="input-xlarge form-control" value="add your bio here"></textarea> <br />
                        </div>
                      
                       <div class="control-group form-group">
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="bio_update" onclick="WIProfile.UpdateBio(' . WISession::get('user_id'). ' )" class="btn btn-success">' . WILang::get('save'). '</button>
                        </div>

                        </div>

                      </div> 
  </div>

  </div>
  <div class="User-Info">
<div class="titleP">';
echo $username  = $this->Profile->getInfo($userId, 'username'); echo '\'s <br/>';
echo WILang::get('info'); 
 echo ': <a href="javascript:void(0);" class="btn" onclick="WIProfile.details(' .  $userId . ')">Edit</a> </div>
 <div id="details" class="hide"></div>';
echo $userinfo = $this->Profile->Display_name($userId);
    echo '</div><!-- end of userinfo-->

    <div class="user_location">
       <div class="titleP">' .  WILang::get('user_location'). ':  <a href="javascript:void(0);" class="btn" onclick="WIProfile.location(' .$userId . ')">Edit</a></div>
       <div id="location" class="hide">';
      echo $locationInfo = $this->Profile->LocationInfo($userId);

         echo '<div class="control-group" id="updateLocation" >
      <div class="control-group form-group">
        <label class="control-label col-lg-4"  for="country">Country:</label>
             <div class="controls col-lg-8">
   <input type="text" id="country"  maxlength="88" name="country" placeholder="Country" class="input-xlarge form-control" value=""> <br />
               </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-4" for="region">Region:</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="region" maxlength="100" name="region" placeholder="Region" class="input-xlarge form-control" value="">
                        </div>
                    </div>

                     <div class="control-group form-group">
                        <label class="control-label col-lg-4" for="city">City:</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="city" maxlength="100" name="city" placeholder="City" class="input-xlarge form-control" value="">
                        </div>
                     </div>
 
                      <div class="control-group form-group">
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="site_settings" onclick="WIProfile.updateLocation(<?php echo $userId ?>)" class="btn btn-success">' .  WILang::get('save'). '</button>

                        </div>
                      </div>
                      </div><div class="results" id="results"></div>
       </div>

    </div>

    <div class="social_profile">
    <div class="titleP">' .   WILang::get('social_info') . ': <a href="javascript:void(0);" class="btn" onclick="WIProfile.social(' .  $userId . ')">Edit</a></div>
    <div id="social" class="hide">'; 
    echo $Social_profile = $this->Profile->Social_Profile($userId) .'
    <div class="control-group" id="updateSocial">
      <div class="control-group form-group">
            <label class="control-label col-lg-4"  for="youtube">Youtube:</label>
             <div class="controls col-lg-8">
   <input type="text" id="youtube"  maxlength="88" name="youtube" placeholder="Youtube" class="input-xlarge form-control" value=""> <br />
               </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-4" for="region">Facebook:</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="facebook" maxlength="100" name="facebook" placeholder="facebook" class="input-xlarge form-control" value="">
                        </div>
                     </div>

                     <div class="control-group form-group">
                        <label class="control-label col-lg-4" for="twitter">Twitter:</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="twitter" maxlength="100" name="twitter" placeholder="twitter" class="input-xlarge form-control" value="">
                        </div>
                     </div>

                     <div class="control-group form-group">
                        <label class="control-label col-lg-4" for="website">Website:</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="website" maxlength="100" name="website" placeholder="website" class="input-xlarge form-control" value="">
                        </div>
                     </div>
 
                      <div class="control-group form-group">
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="site_settings" onclick="WIProfile.updatesocial(<?php echo $userId ?>)" class="btn btn-success">Save</button>
                        </div>
                      </div>
                      </div><div class="results" id="results"></div>
    </div>
    

    </div><!-- end social profile-->
  
  <div class="stats">
  <div class="friends">
  <div class="friends_bar">
  <div class="titleP">' .  WILang::get('friend'). ':</div>
  <div class="friend1">'; 
  echo $friendList = $this->Profile->FriendsPopUp($userId);
   echo '<div id="view_all_friends">' .   WILang::get('friend') . '
              <div class="friending hide">
                       <div class="friends_box">All Friends</div> 
                       <a href="#" onclick="WIProfile.toggleViewAllFriends(`view_all_friends`);">close </a>
              </div>
              <div class="WIFriends close">
              </div>
              <div style="padding:6px; background-color:#000; border-top:#666 1px solid; font-size:10px; color: #0F0;">
                       Temporary programming shows 50 maximum. Navigating through the full list is coming soon.
              </div>
              <div class="infoBody" style="border-bottom:#999 1px solid;"></div>  
</div>
</div>
</div><!-- end stats-->';
	}

}


}