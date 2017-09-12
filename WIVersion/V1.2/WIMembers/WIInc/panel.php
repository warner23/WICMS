<style type="text/css">
  .tab {
    background: url(../images/tab_b.png) repeat-x 0 0;
    height: 1px;
    position: relative;
    top: 0;
    z-index: 999;
}
</style>


<div id="toppanel">
  <div id="panel">
    <div class="content clearfix">
      <div class="left">
        <h1> <?php echo WILang::get('Welcome');?></h1>
        <h2><?php echo WILang::get('TO');?> <strong><?php echo WILang::get('site_name');?> </strong></h2>
        <p class="grey"></p>
        <h2><?php echo WILang::get('Thank_you');?></h2>
        <p class="grey"><?php echo WILang::get('warner');?><a href="http://warner-infinity.com/" title="Web Master"><?php echo WILang::get('web_master');?></a><?php echo WILang::get('Amazing_website');?>.</p>
      </div>
            
      <div class="left1">
        <!-- Login Form -->
       <?php if(!$login->isLoggedIn())
        {
          ?>
          <div class="modal-body">
            <div class="well">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#login" data-toggle="tab"><?php echo WILang::get('login'); ?></a></li>
                <li><a href="#create" data-toggle="tab"><?php echo WILang::get('create_account'); ?></a></li>
                <li><a href="#forgot" data-toggle="tab"><?php echo WILang::get('forgot_password'); ?></a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="login">
                  <form class="form-horizontal">
                    <fieldset>
                      <div id="legend">
                        <legend class=""><?php echo WILang::get('login'); ?></legend>
                      </div>    
                      <div class="control-group form-group">
                        <!-- Username -->
                        <label class="control-label col-lg-4"  for="login-username"><?php echo WILang::get('username'); ?></label>
                        <div class="controls col-lg-8">
                          <input type="text" id="login-username" name="username" placeholder="" class="input-xlarge form-control"> <br />
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <!-- Password-->
                        <label class="control-label col-lg-4" for="login-password"><?php echo WILang::get('password'); ?></label>
                        <div class="controls col-lg-8">
                          <input type="password" id="login-password" name="password" placeholder="" class="input-xlarge form-control">
                        </div>
                      </div>
 
 
                      <div class="control-group form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                          <button id="btn-login" class="btn btn-success"><?php echo WILang::get('login'); ?></button>
                        </div>
                      </div>
                    </fieldset>
                  </form>                
                </div>
                <div class="tab-pane fade" id="create">
                  <form class="form-horizontal register-form" id="tab">
                      <fieldset>
                        <div id="legend">
                          <legend class=""><?php echo WILang::get('create_account'); ?></legend>
                        </div>

                        <div class="control-group  form-group">
                            <label class="control-label col-lg-4" for='reg-email' ><?php echo WILang::get('email'); ?> <span class="required">*</span></label>
                            <div class="controls col-lg-8">
                                <input type="text" id="reg-email" class="input-xlarge form-control">
                            </div>
                        </div>

                        <div class="control-group  form-group">
                            <label class="control-label col-lg-4" for="reg-username"><?php echo WILang::get('username'); ?> <span class="required">*</span></label>
                            <div class="controls col-lg-8">
                                <input type="text" id="reg-username" class="input-xlarge form-control">
                            </div>
                        </div>


                        <div class="control-group  form-group">
                            <label class="control-label col-lg-4" for="reg-password"><?php echo WILang::get('password'); ?> <span class="required">*</span></label>
                            <div class="controls col-lg-8">
                                <input type="password" id="reg-password" class="input-xlarge form-control">
                            </div>
                        </div>

                        <div class="control-group  form-group">
                            <label class="control-label col-lg-4" for="reg-repeat-password"><?php echo WILang::get('repeat_password'); ?> <span class="required">*</span></label>
                            <div class="controls col-lg-8">
                                <input type="password" id="reg-repeat-password" class="input-xlarge form-control">
                            </div>
                        </div>

                        

                          
                        <div class="control-group  form-group">
                            <label class="control-label col-lg-4" for="reg-bot-sum">
                                <?php echo WISession::get("bot_first_number"); ?> + 
                                <?php echo WISession::get("bot_second_number"); ?>
                                <span class="required">*</span>
                            </label>
                            <div class="controls col-lg-8">
                                <input type="text" id="reg-bot-sum" class="input-xlarge form-control">
                            </div>
                        </div>

                        <div class="control-group  form-group">
                            <div class="controls col-lg-offset-4 col-lg-8">
                                <button id="btn-register" class="btn btn-success"><?php echo WILang::get('create_account'); ?></button>
                            </div>
                        </div>
                       </fieldset>
                  </form>
                </div>
                
                  <div class="tab-pane in" id="forgot">
                        <form class="form-horizontal" id="forgot-pass-form">
                        <fieldset>
                          <div id="legend">
                            <legend class=""><?php echo WILang::get('forgot_password'); ?></legend>
                          </div>    
                          <div class="control-group form-group">
                            <!-- Username -->
                            <label class="control-label col-lg-4"  for="forgot-password-email"><?php echo WILang::get('your_email'); ?></label>
                            <div class="controls col-lg-8">
                              <input type="email" id="forgot-password-email" class="input-xlarge form-control">
                            </div>
                          </div>

                          <div class="control-group form-group">
                            <!-- Button -->
                            <div class="controls col-lg-offset-4 col-lg-8">
                              <button id="btn-forgot-password" class="btn btn-success"><?php echo WILang::get('reset_password'); ?></button>
                            </div>
                          </div>
                        </fieldset>
                      </form>
                        
                  </div>

                  <div class="social-login">
                      <?php if ( TWITTER_ENABLED ): ?>
                          <a href="socialauth.php?p=twitter&token=<?php echo $token; ?>">
                              <img src="assets/img/twitter.png" class="fade high-opacity" alt="Twitter" title="<?php echo WILang::get('login_with'); ?> Twitter"/>
                          </a>
                      <?php endif; ?>
                      <?php if ( FACEBOOK_ENABLED ): ?>
                          <a href="socialauth.php?p=facebook&token=<?php echo $token; ?>">
                              <img src="assets/img/fb.png" class="fade high-opacity" alt="Facebook" title="<?php echo WILang::get('login_with'); ?> Facebook"/>
                          </a>
                      <?php endif; ?>
                      <?php if ( GOOGLE_ENABLED ): ?>
                          <a href="socialauth.php?p=google&token=<?php echo $token; ?>">
                              <img src="assets/img/gplus.png" class="fade high-opacity" alt="Google+" title="<?php echo WILang::get('login_with'); ?> GooglePlus"/>
                          </a>
                      <?php endif; ?>
                  </div>

            
            <?php
      
     } elseif($user->isAdmin())

                 {
              ?>
               <div class="left">
            
            <h1><?php echo WILang::get('panel_mini_admin'); ?></h1>
            <?php echo $Info->getUserInfo('username'); ?>
           
            <a href="<?php $WI['site_url'];?>logout.php"><?php echo WILang::get('log_off'); ?></a>
            <p>- or -</p>
            <a href="<?php $WI['site_url'];?>alogin.php"><?php echo WILang::get('admin_panel'); ?>  </a>
            
            
            </div>
            
            <div class="left right">
            </div><?php 
                   } else{
            ?>
            <div class="left">
            
            <h1><?php echo WILang::get('member_panel'); ?> </h1>
              <a href="<?php $WI['site_url'];?>logout.php"><?php echo WILang::get('log_off'); ?></a>
            
            
            </div>
            
            <div class="left right">
            </div>
            <?php
              }
       
      ?>
    </div>
  </div> <!-- /login -->  

                 
            </div>
          </div>
        </div>
                 </div>
             </div>
        </div>
            
            
            
               
    </div>
  </div> <!-- /login -->  

    <!-- The tab on top --> 
  <div class="tab">
    <ul class="login">
        <li class="left">&nbsp;</li>
          <li><?php echo WILang::get('HELLO'); ?> <?php if($login->isLoggedIn()){echo $Info->getUserInfo('username');} else { echo 'Guest';}?> !</li>
      <li class="sep">|</li>
      <li id="toggle">
        <a id="open" class="open" href="#"><?php if($login->isLoggedIn()) {echo 'Open Panel';}  else { echo 'Log In | Register';}?></a>
        <a id="close" style="display: none;" class="close" href="#"><?php echo WILang::get('login_with'); ?> Close Panel</a>     
      </li>
        <li class="right">&nbsp;</li>
    </ul> 
  </div> <!-- / top -->
  
</div> <!--panel -->


<script type="text/javascript" src="WICore/WIJ/sha512.js"></script>
<script type="text/javascript" src="WICore/WIJ/WICore.js"></script>
<script type="text/javascript" src="WICore/WIJ/WIRegister.js"></script>
<script type="text/javascript" src="WICore/WIJ/WILogin.js"></script>
<script type="text/javascript" src="WICore/WIJ/WIPasswordReset.js"></script>
<script src="WICore/WIJ/WIUsers.js" type="text/javascript" charset="utf-8"></script>
