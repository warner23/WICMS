<?php

/**
* 
*/
class alogin 
{
	

	function __construct()
	{
		$this->WIdb = WIdb::getInstance();
		$this->Web  = new WIWebsite();
		$this->site = new WISite();
		$this->mod  = new WIModules();
		$this->page = new WIPage();
		//$this->page = new WIPage();
	}

		

	public function editPageContent($page_id)
	{
   // echo $page_id;
		 echo '<style type="text/css">
	
		.content {
		    padding: 32px 0;
		    position: relative;
		    margin-top: 58px;
		}

		.text-left{
			text-align: center;
		}

		</style>

		<div class="container-fluid text-center" id="col"> 
    <div class="row content">
  <div class="col-lg-12 col-md-12 col-sm-12">';  

		  $lsc = $this->page->GetColums($page_id, "left_sidebar");
		  $rsc = $this->page->GetColums($page_id, "right_sidebar");

		if ($lsc > 0) {
		        $this->mod->getMod("left_sidebar");  

		    echo '<div class=" col-lg-10 col-md-8 col-sm-8 block" id="block">
		    <div class="col-lg-10 col-md-8 col-sm-8" id="Mid">';
		}

		if ($lsc && $rsc > 0) {
			echo '<div class="col-lg-10 col-md-8 col-sm-8 block" id="block"><div class="col-lg-12 col-md-8 col-sm-8" id="Mid">';
		}else{
		echo '<div class="col-lg-12 col-md-12 col-sm-12 block" id="block"><div class="col-lg-12 col-md-12 col-sm-12" id="Mid">';
		}

			echo '<div class="col-sm-8 text-left"> 
  <style type="text/css">
	
@import url(http://fonts.googleapis.com/css?family=Roboto);

/****** LOGIN MODAL ******/
.loginmodal-container {
  padding: 30px;
  max-width: 350px;
  width: 100% !important;
  background-color: #F7F7F7;
  margin: 0 auto;
  border-radius: 2px;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  overflow: hidden;
  font-family: roboto;
}

.loginmodal-container h1 {
  text-align: center;
  font-size: 1.8em;
  font-family: roboto;
}

.loginmodal-container input[type=submit] {
  width: 100%;
  display: block;
  margin-bottom: 10px;
  position: relative;
}

.loginmodal-container input[type=text], input[type=password] {
  height: 44px;
  font-size: 16px;
  width: 100%;
  margin-bottom: 10px;
  -webkit-appearance: none;
  background: #fff;
  border: 1px solid #d9d9d9;
  border-top: 1px solid #c0c0c0;
  /* border-radius: 2px; */
  padding: 0 8px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}

.loginmodal-container input[type=text]:hover, input[type=password]:hover {
  border: 1px solid #b9b9b9;
  border-top: 1px solid #a0a0a0;
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
}

.loginmodal {
  text-align: center;
  font-size: 14px;
  font-family: `Arial`, sans-serif;
  font-weight: 700;
  height: 36px;
  padding: 0 8px;
/* border-radius: 3px; */
/* -webkit-user-select: none;
  user-select: none; */
}

.loginmodal-submit {
  /* border: 1px solid #3079ed; */
  border: 0px;
  color: #fff;
  text-shadow: 0 1px rgba(0,0,0,0.1); 
  background-color: #4d90fe;
  padding: 17px 0px;
  font-family: roboto;
  font-size: 14px;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); */
}

.loginmodal-submit:hover {
  /* border: 1px solid #2f5bb7; */
  border: 0px;
  text-shadow: 0 1px rgba(0,0,0,0.3);
  background-color: #357ae8;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
}

.loginmodal-container a {
  text-decoration: none;
  color: #666;
  font-weight: 400;
  text-align: center;
  display: inline-block;
  opacity: 0.6;
  transition: opacity ease 0.5s;
} 

.login-help{
  font-size: 12px;
}

.login-panel{
    margin-left: 27%;
    margin-right: 22%;
    text-align: -webkit-center;
    /* margin-top: 45px; */
    background-color: #a5b0e9;
    padding: 10px 10px 10px 10px;
}

.modal-dialog {
    -webkit-transform: translate(0,0);
    -ms-transform: translate(0,0);
    -o-transform: translate(0,0);
    transform: translate(0,0);
    top: 125px;
}
</style>


<div class="col-md-6 login-panel">
<input type="text" name="login" placeholder="Login"></div>
<a href="#" data-toggle="modal" data-target="#login-modal"><button>Next</button></a>

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<input type="text" id="username" name="user" placeholder="Login to Your Account">
					<br>
				  <form class="form-horizontal">
					<input type="text" id="username" name="user" placeholder="Username">
					<input type="password" id="password" name="pass" placeholder="Password">
					<input type="text" id="admin_login" name="login" class="login loginmodal-submit" value="Login">
          <div class="aerror" id="aerror"></div>
				  </form>

					
				
				</div>
			</div>
		  </div>
      <script type="text/javascript" src="WIAdmin/WICore/WIJ/WICore.js"></script>
      <script type="text/javascript" src="WIAdmin/WICore/WIJ/WILogin.js"></script>
      <script type="text/javascript" src="WIAdmin/WICore/WIJ/sha512.js"></script>
<script src="WIAdmin/WICore/WIJ/WIUsers.js" type="text/javascript" charset="utf-8"></script>
</div>

<div class="col-sm-2"></div>

</div>
</div>';
							

		  
		if ($rsc > 0) {

		  $this->mod->getMod("right_sidebar");  

		    echo '</div>';
		}

		echo '</div>
			</div>';
 

	}

	public function mod_name($module, $page)
	{

    echo '<div class="container-fluid text-center">    
  <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 min_height">';

    if(isset($page)){
    $left_sidePower = $this->Web->pageModPower($page, "left_sidebar");
    $leftSideBar = $this->Web->PageMod($page, "left_sidebar");
    //echo $Panel;
    if ($left_sidePower > 0) {
      $this->mod->getMod($leftSideBar);
      echo '<div class="col-lg-8 col-md-8 col-sm-8 alogin">';
    }else{
      echo '<div class="col-lg-8 col-md-8 col-sm-8 center">';
    }

    }


 echo '<div class="col-lg-8 col-md-8 col-sm-8 text-left center"> 

<div class="col-md-6 login-panel"><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></div>

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h1>Login to Your Account</h1><br>
				  <form class="form-horizontal">
					<input type="text" id="username" name="user" placeholder="Username">
					<input type="password" id="password" name="pass" placeholder="Password">
					<input type="submit" id="admin_login" name="login" class="login loginmodal-submit" value="Login">
          <div class="aerror" id="aerror"></div>
				  </form>

					
				
				</div>
			</div>
		  </div>
      <script type="text/javascript" src="WIAdmin/WICore/WIJ/WICore.js"></script>
      <script type="text/javascript" src="WIAdmin/WICore/WIJ/WILogin.js"></script>
      <script type="text/javascript" src="WIAdmin/WICore/WIJ/sha512.js"></script>
<script src="WIAdmin/WICore/WIJ/WIUsers.js" type="text/javascript" charset="utf-8"></script>
</div>
</div>';

		if(isset($page)){			
		$right_sidePower = $this->Web->pageModPower($page, "right_sidebar");
		$rightSideBar = $this->Web->PageMod($page, "right_sidebar");
		//echo $Panel;
		if ($right_sidePower > 0) {

			$this->mod->getMod($rightSideBar);
		}

		}			
					

	echo '</div>
			</div>
      </div>';
	}


}