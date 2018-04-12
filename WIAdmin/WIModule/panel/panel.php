<?php


/**
* 
*/
class panel
{
	
	function __construct()
	{
    $this->WIdb = WIdb::getInstance();

    $this->login = new WILogin();

    $this->Info = new WIUserInfo();

    $this->user   = new WIUser(WISession::get('user_id'));

	}

  public function social($column, $column1)
  {

        $result[$column] = $this->WIdb->select("SELECT * FROM `wi_site` WHERE `$column` = :column1 ", 
      array(
        'column1' => $column1
        )
      );


    return $result[$column];
  }


	public function mod_name()
	{

        if($this->login->isLoggedIn()){

           $username =  $this->Info->getUserInfo('username');
           $remote =  "Open Panel";
        } else {
         $username =  "Guest";
         $remote =  "Log In | Register";
       }

       
        if(panel::social("twitter_enabled", "twitter_enabled") === "enabled"){
        $Twitter =  '<a href="javascript:void(0)">
           <img src="assets/img/twitter.png" class="fade high-opacity" alt="Twitter" title="' . WILang::get("login_with") . ' Twitter"/>
            </a>';
       }else{
        $Twitter = "";
       }

       if(panel::social("facebook_enabled", "facebook_enabled") === "enabled"){
          $Facebook = '<a href="javascript:void(0)">
      <img src="assets/img/fb.png" class="fade high-opacity" alt="Facebook" title="' . WILang::get("login_with") . ' Facebook"/>
                          </a>';
       }else{
        $Facebook = "";
       }

      if(panel::social("google_enabled", "google_enabled") === "enabled"){
          $Google = '<a href="javascript:void(0)">
  <img src="assets/img/gplus.png" class="fade high-opacity" alt="Google+" title="' . WILang::get("login_with") . ' GooglePlus"/>
                          </a>';
       }else{
        $Google = "";
       }

       echo '<div id="toppanel">
  <div id="panel">
    <div class="content clearfix">
      <div class="left">
        <h1>' .WILang::get("Welcome") . '</h1>
        <h2>' . WILang::get("TO"). ' <strong>' . WILang::get("site_name") . '</strong></h2>
        <p class="grey"></p>
        <p class="grey">
      </div>
            
      <div class="left1">
        <!-- Login Form -->
';

       if(!$this->login->isLoggedIn()){
            echo '<div class="modal-body">
            <div class="well">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#login" data-toggle="tab">' .WILang::get("login"). '</a></li>
                <li><a href="#create" data-toggle="tab">' . WILang::get("create_account") . '</a></li>
                <li><a href="#forgot" data-toggle="tab">' . WILang::get("forgot_password") . '</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="login">
                  <form class="form-horizontal">
                    <fieldset>
                      <div id="legend">
                        <legend class="">' . WILang::get("login"). '</legend>
                      </div>    
                      <div class="control-group form-group">
                        <!-- Username -->
                        <label class="control-label col-lg-4"  for="login-username">' . WILang::get("username") . '</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="login-username" name="username" placeholder="" class="input-xlarge form-control"> <br />
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <!-- Password-->
                        <label class="control-label col-lg-4" for="login-password">' . WILang::get("password") . '</label>
                        <div class="controls col-lg-8">
                          <input type="password" id="login-password" name="password" placeholder="" class="input-xlarge form-control">
                        </div>
                      </div>
 
 
                      <div class="control-group form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                          <button id="btn-login" class="btn btn-success">' . WILang::get("login") . '</button>
                        </div>
                      </div>
                    </fieldset>
                  </form>                
                </div>
                <div class="tab-pane fade" id="create">
                  <form class="form-horizontal register-form" id="tab">
                      <fieldset>
                        <div id="legend">
                          <legend class="">' . WILang::get("create_account") . '</legend>
                        </div>

                        <div class="control-group  form-group">
                            <label class="control-label col-lg-4" for="reg-email" >' . WILang::get("email") .' <span class="required">*</span></label>
                            <div class="controls col-lg-8">
                                <input type="text" id="reg-email" class="input-xlarge form-control">
                            </div>
                        </div>

                        <div class="control-group  form-group">
                            <label class="control-label col-lg-4" for="reg-username">' .WILang::get("username") . '<span class="required">*</span></label>
                            <div class="controls col-lg-8">
                                <input type="text" id="reg-username" class="input-xlarge form-control">
                            </div>
                        </div>


                        <div class="control-group  form-group">
                            <label class="control-label col-lg-4" for="reg-password">' . WILang::get("password") . ' <span class="required">*</span></label>
                            <div class="controls col-lg-8">
                                <input type="password" id="reg-password" class="input-xlarge form-control">
                            </div>
                        </div>

                        <div class="control-group  form-group">
                            <label class="control-label col-lg-4" for="reg-repeat-password">' . WILang::get("repeat_password") . ' <span class="required">*</span></label>
                            <div class="controls col-lg-8">
                                <input type="password" id="reg-repeat-password" class="input-xlarge form-control">
                            </div>
                        </div>

                        

                          
                        <div class="control-group  form-group">
                            <label class="control-label col-lg-4" for="reg-bot-sum">
            ' . WISession::get("bot_first_number") . '+ 
                                ' . WISession::get("bot_second_number") . '
                                <span class="required">*</span>
                            </label>
                            <div class="controls col-lg-8">
                                <input type="text" id="reg-bot-sum" class="input-xlarge form-control">
                            </div>
                        </div>

                        <div class="control-group  form-group">
                            <div class="controls col-lg-offset-4 col-lg-8">
                                <button id="btn-register" class="btn btn-success">' . WILang::get("create_account") . '</button>
                            </div>
                        </div>
                       </fieldset>
                  </form>
                </div>
                
                  <div class="tab-pane in" id="forgot">
                        <form class="form-horizontal" id="forgot-pass-form">
                        <fieldset>
                          <div id="legend">
                            <legend class="">' . WILang::get("forgot_password") . '</legend>
                          </div>    
                          <div class="control-group form-group">
                            <!-- Username -->
                            <label class="control-label col-lg-4"  for="forgot-password-email">' . WILang::get("your_email") . '</label>
                            <div class="controls col-lg-8">
                              <input type="email" id="forgot-password-email" class="input-xlarge form-control">
                            </div>
                          </div>

                          <div class="control-group form-group">
                            <!-- Button -->
                            <div class="controls col-lg-offset-4 col-lg-8">
                              <button id="btn-forgot-password" class="btn btn-success">' . WILang::get("reset_password") . '</button>
                            </div>
                          </div>
                        </fieldset>
                      </form>
                        
                  </div>

                <div class="social-login">
                '. $Twitter.'
                '. $Facebook.'
                '. $Google.'
                 </div>';
                 
             }elseif($this->user->isAdmin()){
                echo '<div class="leftt">
                  <h1>' .WILang::get("panel_mini_admin") . '</h1>
                  <a href="WIMembers/profile.php"> ' .WILang::get("view_profile_page") . '</a>
                  <p>- or -</p>
                  <a href="logout.php">' . WILang::get("log_off") . '</a>
                  <p>- or -</p>
                  <a href="alogin.php">' .WILang::get("admin_panel") . ' </a>
                  </div>
                  <div class="left right">
                  </div>';
             }else{
              echo '<div class="leftt">
                  <h1>' . WILang::get("member_panel") . '</h1>
                  <a href="WIMembers/profile.php">' . WILang::get("view_profile_page") . ' </a>
                  <p>- or -</p>
                  <a href="logout.php">' .WILang::get("log_off") . '</a>
                  </div>
                  <div class="left right">
                  </div>';
             }


             echo '</div>
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
                        <li>' .WILang::get('HELLO') .', '. $username . '!</li>
                    <li class="sep">|</li>
                    <li id="toggle">
                      <a id="open" class="open" href="javascript:void(0)">' . $remote .'</a>
                      <a id="close" style="display: none;" class="close" href="javascript:void(0)">' . WILang::get('login_with') . ' Close Panel</a>     
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
              ';

		
		



            
 
        


	}
}