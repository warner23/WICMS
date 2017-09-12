<div id="toppanel">
  <div id="panel">
    <div class="content clearfix">
      <div class="left">
        <h1>Welcome</h1>
        <h2>To <strong>XYMORE</strong></h2>
        <p class="grey"></p>
        <h2>A Big Thanks</h2>
        <p class="grey">To warner-infinity <a href="http://warner-infinity.com/wit2/" title="Web Master">Web Master</a> amazing website.</p>
      </div>
            
      <div class="left">
        <!-- Login Form -->
       <?php if(!isset($_SESSION['username']))
        {
          ?>
           <div class="modal-body">
            <div class="well">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#login" data-toggle="tab">login</a></li>
                <li><a href="#create" data-toggle="tab">create account</a></li>
                <li><a href="#forgot" data-toggle="tab">forget pass</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="login">
                  <form class="form-horizontal" id="loginform" method="post">
                    <fieldset>
                      <div id="legend">
                        <legend class="">login</legend>
                      </div>    
                      <div class="control-group form-group">
                        <!-- Username -->
                        <label class="control-label col-lg-4"  for="username">Username:</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="username"  maxlength="88" name="username" placeholder="Username" class="input-xlarge form-control"> <br />
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <!-- Password-->
                        <label class="control-label col-lg-4" for="password">password</label>
                        <div class="controls col-lg-8">
                          <input type="password" id="password" maxlength="100" name="password" placeholder="Password" class="input-xlarge form-control">
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <!-- remember me-->
                        <div class="controls col-lg-8">
                         <div class="remember">Remember me</div>
                            <input type="checkbox" name="checkbox"><br />
                        </div>
                      </div>
 
 
                      <div class="control-group form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="loginbtn" type="submit" class="btn btn-success" name="submit_a">Login</button> 
                        </div>
                      </div>
                    </fieldset>
                  </form>                
                </div>
                <div class="tab-pane fade" id="create">
                  <form class="form-horizontal register-form" name="signupform" id="signupform" onsubmit="return false;" method="post">
                      <fieldset>
                        <div id="legend">
                          <legend class="">create account</legend>
                        </div>

                        <div class="control-group  form-group">
                            <label class="control-label col-lg-4" for='email'>email: <span class="required">*</span></label>
                            <div class="controls col-lg-8">
                                <input type="text" id="email" class="input-xlarge form-control" onfocus="emptyElement('status')" onkeyup="restrict('email')" maxlength="88" placeholder="Email Address" name="email">
                            </div>
                        </div>

                        <div class="control-group  form-group">
                            <label class="control-label col-lg-4" for="username">username: <span class="required">*</span></label>
                            <div class="controls col-lg-8">
                                <input type="text" id="username" class="input-xlarge form-control"  onkeyup="restrict('username')" maxlength="16" placeholder="Username" name="username">
                                <span id="unamestatus"></span>
                            </div>
                        </div>

                        <div class="control-group  form-group">
                            <label class="control-label col-lg-4" for="pass1">password: <span class="required">*</span></label>
                            <div class="controls col-lg-8">
                                <input type="password" id="pass1" class="input-xlarge form-control" onfocus="emptyElement('status')" maxlength="16" placeholder="Password" name="password">
                            </div>
                        </div>
s
                        <div class="control-group  form-group">
                            <label class="control-label col-lg-4" for="pass2">Repeat Password: <span class="required">*</span></label>
                            <div class="controls col-lg-8">
                                <input type="password" id="pass2" class="input-xlarge form-control" onfocus="emptyElement('status')" maxlength="16" placeholder="Repeat Password" name="password_r">
                            </div>
                        </div>

                          <div class="control-group  form-group">
                            <label class="control-label col-lg-4" for="gender">Gender<span class="required" name="gender">*</span></label>
                            <div class="controls col-lg-8">
                                <select id="gender" onfocus="emptyElement('status')">
      											<option value=""></option>
      										<option value="m">Male</option>
      										<option value="f">Female</option>
   														</select>
                           		 </div>
                        		</div>

                          <div class="control-group  form-group">
                            <label class="control-label col-lg-4" for="country">Country<span class="required">*</span></label>
                            <div class="controls col-lg-8">
                               <select id="country" onfocus="emptyElement('status')">
     					 <?php include_once("template_country_list.php"); ?>
   												 </select>
                            </div>
                        </div>

                         <div>
      <a href="#" onclick="return false" onmousedown="openTerms()">
        View the Terms Of Use
      </a>
    </div>
    <div id="terms" style="display:none;">
      <h3>XyMore Terms Of Use</h3>
      <p>1. Play nice here.</p>
      <p>2. Take a bath before you visit.</p>
      <p>3. Brush your teeth before bed.</p>
    </div>
    <br /><br />
  

 <input type="checkbox" name="checkbox"><br />
                            
                        <div class="control-group  form-group">
                            <div class="controls col-lg-offset-4 col-lg-8">
                             <button id="signupbtn"  class="btn btn-success" name="submit" type="submit">Create Account</button>
   									 <span id="status"></span>
   									
                            </div>
                        </div>
                       </fieldset>
                  </form>
                </div>
                
                  <div class="tab-pane in" id="forgot">
                        <form class="form-horizontal" id="forgot-pass-form">
                        <fieldset>
                          <div id="legend">
                            <legend class="">password</legend>
                          </div>    
                          <div class="control-group form-group">
                            <!-- Username -->
                            <label class="control-label col-lg-4"  for="forgot-password-email">email</label>
                            <div class="controls col-lg-8">
                              <input type="email" id="forgot-password-email" class="input-xlarge form-control">
                            </div>
                          </div>

                          <div class="control-group form-group">
                            <!-- Button -->
                            <div class="controls col-lg-offset-4 col-lg-8">
                              <button id="btn-forgot-password" class="btn btn-success"></button>
                            </div>
                          </div>
                        </fieldset>
                      </form>
                        
                  </div>

            
            <?php
      
     } else
     {
      
      ?>
            
            <div class="left">
            
            <h1>Members panel</h1>
            
            <p>You can put member-only data here</p>
            <a href="user/home.php">View profile page</a>
            <p>- or -</p>
            <a href="logout.php">Log off</a>
            
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
          <li>Hello <?php echo $_SESSION['username'] ? $_SESSION['username'] : 'Guest';?> !</li>
      <li class="sep">|</li>
      <li id="toggle">
        <a id="open" class="open" href="#"><?php echo $_SESSION['userid']?'Open Panel':'Log In | Register';?></a>
        <a id="close" style="display: none;" class="close" href="#">Close Panel</a>     
      </li>
        <li class="right">&nbsp;</li>
    </ul> 
  </div> <!-- / top -->
  
</div> <!--panel -->