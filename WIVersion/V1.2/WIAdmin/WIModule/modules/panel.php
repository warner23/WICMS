<!-- Panel -->
<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
			<div class="left">
				<h1>Welcome to BBT</h1>
				<h2> register/login </h2>		
				<p class="grey">Please Use the panel to Register/ Login!</p>
                

				<h2>Thank you</h2>
				<p class="grey"></p>
			</div>
            
            
            <?php
			
			if(!$_SESSION['username']):
			
			?>
            
			<div class="left">
				<!-- Register Form -->
				<form name="signupform" id="signupform" onsubmit="return false;">
					<h1>Not a member yet?</h1>
                                        <h3>Sign Up Here</h3>

    <div class="grey">Username: </div>
    <input id="username" class="field" size="23" type="text" onblur="checkusername()" onkeyup="restrict('username')" maxlength="16">
    <span id="unamestatus"></span>

    <div class="grey">Email Address:</div>
    <input id="email" class="field" size="23" type="text" onfocus="emptyElement('status1')" onkeyup="restrict('email')" maxlength="88">

    <div class="grey">Create Password:</div>
    <input id="pass1" class="field" size="23" type="password" onfocus="emptyElement('status1')" maxlength="16">

    <div class="grey">Confirm Password:</div>
    <input id="pass2" class="field" size="23" type="password" onfocus="emptyElement('status1')" maxlength="16">

    <div class="grey">Gender:</div>
    <select id="gender" onfocus="emptyElement('status1')">
      <option value=""></option>
      <option value="m">Male</option>
      <option value="f">Female</option>
    </select>

    <div class="grey">Country:</div>
    <select id="country" onfocus="emptyElement('status1')">
      <?php include_once("inc/template_country_list.php"); ?>
    </select>

    <div>
      <a href="#" onclick="return false" onmousedown="openTerms()">
        View the Terms Of Use
      </a>
    </div>
    <div id="terms" style="display:none;">
      <h3>BBT Terms Of Use</h3>
      <p>1. Play nice here.</p>
      <p>2. Take a bath before you visit.</p>
      <p>3. Brush your teeth before bed.</p>
    </div>
    <br /><br />
     <input id="signupbtn" onclick="signup()" type="submit" name="submit" value="Register" value="<?php echo $l['submit_button']; ?>" class="bt_register" />
    <span class="errors" id="status1"></span>
</b>
               

				</form>	
			</div>
			<div class="left right">			
				<!-- Login Form -->
				<form class="clearfix" action="" method="post">
				<form id="loginform" form class="clearfix" onsubmit="return false;">
					<h1>Member Login</h1>
					<h3>Log In Here</h3>
                    
                    <?php

						if($_SESSION['msg']['login-err'])
						{
							echo '<div class="err">'.$_SESSION['msg']['login-err'].'</div>';
							unset($_SESSION['msg']['login-err']);
						}
					?>
     <div class="grey">Email Address:</div>
    <input type="text" class="field" size="23" id="email" onfocus="emptyElement('status2')" maxlength="88">

    <div>Password:</div>
    <input type="password" class="field" id="password" onfocus="emptyElement('status2')" maxlength="100">
    <br /><br />

    
    <label><input name="rememberMe" id="rememberMe" type="checkbox" checked="checked" value="1" /> &nbsp;Remember me</label>
    
      <div class="clear"></div>
    <p id="status2"></p>
    <input type="submit" id="loginbtn" onclick="login()" name="submit" value="Login" class="bt_login" />

    <a href="#">Forgot Your Password?</a>
  </form>

			</div>
            
            <?php
			
			else:
			
			?>

            <div class="left">

            <h1>Members panel</h1>
            
            <p>You can put member-only data here</p>
            <a href="registered.php">View a special member page</a> <br/>
            <p>- or -</p>
            <a href="logout.php">Log off</a>
            
            </div>
            
            <div class="left right">
            </div>
            
            <?php
			endif;
			?>
		</div>
	</div> <!-- /login -->	

    <!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
	    	<li class="left">&nbsp;</li>
	        <li>Hello <?php echo $_SESSION['username'] ? $_SESSION['username'] : 'Guest';?>!</li>
			<li class="sep">|</li>
			<li id="toggle">
				<a id="open" class="open" href="#"><?php echo $_SESSION['userid']?'Open Panel':'Log In | Register';?></a>
				<a id="close" style="display: none;" class="close" href="#">Close Panel</a>			
			</li>
	    	<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->
	
</div> <!--panel -->