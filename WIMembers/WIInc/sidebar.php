
<style type="text/css">
  
  .closed{
    display: none;
  }

    .open{
    display: block;
  }
</style>


  <div class="bio">
  <div class="titleP"><?php  echo WILang::get('bio');?>:</div>
  <div id="bio">
    <?php echo $bio_body = $profile->userDetails($friendId, 'bio_body');?>
   </div>


  </div>
  <div class="User-Info <?php  echo WILang::get('info');?>">
<div class="titleP">
<?php echo $username  = $profile->getInfo($friendId, 'username');

 ;?><?php  echo WILang::get('info');?>: </div>
 <div id="details"></div>
<?php  echo $userinfo = $profile->Display_name($friendId); ?>

    </div><!-- end of userinfo-->


    <div class="user_location">
       <div class="titleP"><?php  echo WILang::get('user_location');?> :</div>
       <div id="location">
       <?php echo $locationInfo = $profile->LocationInfo($friendId); ?>
       </div>

    </div>

    <div class="social_profile">
    <div class="titleP"><?php  echo WILang::get('social_info');?>:</div>
    <div id="social">
    <?php  echo $Social_profile = $profile->Social_Profile($friendId); ?>

    </div>
    

    </div><!-- end social profile-->
  
  <div class="stats">
  <div class="friends">
  <div class="friends_bar">
  <div class="titleP"><?php  echo WILang::get('friend');?>:</div>
  <div class="friend1">
    <?php echo $friendList = $profile->FriendsPopUp($friendId); ?>
          <div id="view_all_friends"><?php  echo WILang::get('friend');?>
              <div class="friending">
                       <div class="friends_box">All Friends</div> 
                       <a href="#" onclick="return false" onmousedown="profile.toggleViewAllFriends('view_all_friends');">close </a>
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
</div><!-- end stats-->