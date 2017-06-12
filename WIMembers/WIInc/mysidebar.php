
<style type="text/css">
  
  .closed{
    display: none;
  }

    .open{
    display: block;
  }
</style>


  <div class="bio">
  <div class="titleP"><?php  echo WILang::get('bio');?>:<a href="javascript:void(0);" class="btn" onclick="profile.bio()">Edit</a></div>
  <div id="bio">
    <?php echo $bio_body = $profile->userDetails($userId, 'bio_body');?>
   </div>
   <div id="editBio">
   <div class="control-group form-group closed" id="updateBio">
               <div class="controls col-lg-12">
              <textarea type="text" id="bio"  maxlength="88" name="bio" placeholder="bio" class="input-xlarge form-control" value="add your bio here"></textarea> <br />
                        </div>
                      
                       <div class="control-group form-group">
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="bio_update" onclick="profile.UpdateBio(<?php echo WISession::get('user_id') ?> )" class="btn btn-success"><?php  echo WILang::get('save');?></button>
                        </div>

                        </div>

                      </div> 
  </div>

  </div>
  <div class="User-Info">
<div class="titleP">
<?php echo $username  = $profile->getInfo($userId, 'username');

 ;?> <?php  echo WILang::get('info');?>: <a href="javascript:void(0);" class="btn" onclick="profile.details(<?php echo $userId?>)">Edit</a> </div>
 <div id="details"></div>
<?php  echo $userinfo = $profile->Display_name($userId); ?>
    </div><!-- end of userinfo-->

    <div class="user_location">
       <div class="titleP">  <?php  echo WILang::get('user_location');?>:  <a href="javascript:void(0);" class="btn" onclick="profile.location(<?php echo $userId?>)">Edit</a></div>
       <div id="location">
       <?php echo $locationInfo = $profile->LocationInfo($userId); ?>
         <div class="control-group closed" id="updateLocation" >
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
                           <button id="site_settings" onclick="profile.updateLocation(<?php echo $userId ?>)" class="btn btn-success"><?php  echo WILang::get('save');?></button>
                        </div>
                      </div>
                      </div><div class="results" id="results"></div>
       </div>
         
          
          
         
          <div class="google_map" id="google_map">
          <div  class="google_inner_map"><a href="#" onclick="return false" onmousedown="javascript:toggleViewMap('google_map');">close map</a></div>
<iframe class="where_i_live" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo "$city,+$state,+$country";?>&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo "$city,+$state,+$country";?>&amp;z=12&amp;output=embed"></iframe>
<div align="left" style="padding:4px; background-color:#D2F0D3;"><a href="#" onclick="return false" onmousedown="javascript:toggleViewMap('google_map');">close map</a></div>
          </div>

    </div>

    <div class="social_profile">
    <div class="titleP"><?php  echo WILang::get('social_info');?>: <a href="javascript:void(0);" class="btn" onclick="profile.social(<?php echo $userId?>)">Edit</a></div>
    <div id="social">
    <?php  echo $Social_profile = $profile->Social_Profile($userId); ?>
    <div class="control-group closed" id="updateSocial">
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
                           <button id="site_settings" onclick="profile.updatesocial(<?php echo $userId ?>)" class="btn btn-success">Save</button>
                        </div>
                      </div>
                      </div><div class="results" id="results"></div>
    </div>
    

    </div><!-- end social profile-->
  
  <div class="stats">
  <div class="friends">
  <div class="friends_bar">
  <div class="titleP"> <?php  echo WILang::get('friend');?>:</div>
  <div class="friend1">
    <?php echo $friendList = $profile->FriendsPopUp($userId); ?>
    <div id="view_all_friends"><?php  echo WILang::get('friend');?>
              <div class="friending">
                       <div class="friends_box">All Friends</div> 
                       <a href="#" onclick="profile.toggleViewAllFriends('view_all_friends');">close </a>
              </div>
              <div class="WIFriends">
              </div>
              <div style="padding:6px; background-color:#000; border-top:#666 1px solid; font-size:10px; color: #0F0;">
                       Temporary programming shows 50 maximum. Navigating through the full list is coming soon.
              </div>
              <div class="infoBody" style="border-bottom:#999 1px solid;"></div>  
</div>
</div>
</div><!-- end stats-->