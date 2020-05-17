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