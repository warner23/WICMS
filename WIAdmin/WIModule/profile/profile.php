<?php

/**
* 
*/
class profile 
{
	

	function __construct()
	{
		$this->WIdb = WIdb::getInstance();
		$this->Web  = new WIWebsite();
		$this->site = new WISite();
		$this->mod  = new WIModules();
		$this->page = new WIPage();
		$this->login = new WILogin();
		$this->Profile = new WIProfile();
		//$this->page = new WIPage();
	}

		public function editMod()
	{
		echo '<div id="remove">
      <a href="#">
      <button id="delete" onclick="WIMod.delete(event);">Delete</button>
      </a>
       <div id="dialog-confirm" title="Remove Module?" class="hide">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;">
  </span>Are you sure?</p>
  <p> This will remove the module and any unsaved data.</p>
  <span><button class="btn btn-danger" onclick="WIMod.remove(event);">Remove</button> <button class="btn" onclick="WIMod.close(event);">Close</button></span>
</div>
';

echo '<style type="text/css">
	
.content {
    padding: 32px 0;
    position: relative;
    margin-top: 58px;
}

.text-left{
	text-align: center;
}

.show{
  display: block;
}

.hide{
  display: none;
}

</style>



<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-md-2 col sm-2 col-xs-2 col-lg-4 sidenav">

    </div>
	<div class="col-lg-4 col-md-8 col-sm-8">
	
<div class="panel-heading">Topics</div>
<?php 

if(!$login->isLoggedIn()){
?>
  <div class="col-lg-4 col-md-8 col-sm-8">


<button>Click the tab above to register/login</button>

  </div>

<?php
}else{
  $topic->topic(); 
}


?>

</div>

					</div>
					

					    <div class="col-md-2 col sm-2 col-xs-2 col-lg-4 sidenav">

    </div>
    
				</div>
			</div>

      <!-- add info modal -->
  <div class="modal hide" id="votingModal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WITopic.close();" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="add-user-form" enctype="multipart/form-data" method="POST"> 
                     <div class="col-md-12 body-info">
                     <div class="panel-body">


                     </div>
                     </div>
                     
                  </form>
                </div>

                <div class="modal-footer">
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

<script type="text/javascript" src="WICore/WIJ/WICore.js"></script>
<script type="text/javascript" src="WICore/WIJ/WITopic.js"></script>
';
	}

	public function editPageContent($page_id)
	{
		// include_once '../../WIInc/WI_StartUp.php';
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

		<div class="container-fluid text-center" id="col"> ';  

		  $lsc = $this->page->GetColums($page_id, "left_sidebar");
		  $rsc = $this->page->GetColums($page_id, "right_sidebar");
		if ($lsc > 0) {

			  echo '<div class="col-sm-1 col-lg-2 col-md-2 col-xl-2 col-xs-2 sidenav" id="sidenavL">';
		 $this->mod->getMod("left_sidebar");  

		    echo '</div>
		    <div class=" col-lg-10 col-md-8 col-sm-8 block" id="block">
		    <div class="col-lg-10 col-md-8 col-sm-8" id="Mid">';
		}

		if ($lsc && $rsc > 0) {
			echo '<div class="col-lg-10 col-md-8 col-sm-8 block" id="block"><div class="col-lg-12 col-md-8 col-sm-8" id="Mid">';
		}else if($rsc > 0){
			echo '<div class="col-lg-10 col-md-8 col-sm-8 block" id="block"><div class="col-lg-12 col-md-8 col-sm-8" id="Mid">';

		 }else{
		echo '<div class="col-lg-12 col-md-12 col-sm-12 block" id="block"><div class="col-lg-12 col-md-12 col-sm-12" id="Mid">';
		}

			echo '<div class="col-lg-12 col-md-12 col-sm-12" >

						 <div class="col-lg-12 col-md-12 col-sm-12 text-left"> 
							<div class="intro_box">
<h1>' .WILang::get("welcome_") . '<span>'. $this->site->Website_Info('site_name') . '</span></h1>
							<p>' . WILang::get("main_title") . '</p>
							</div>
						</div>
					</div>
				
					<div class="col-lg-4 col-md-4 col-sm-4" >
						<div class="services">
							<div class="icon">
								<i class="fa fa-laptop"></i>
							</div>
							<div class="serv_detail">
								<h3>' . WILang::get("community") . '</h3>
								<p>' . WILang::get("learn") . '
</p>
							</div>
						</div>
					</div>
					
					<div class="col-lg-4 col-md-4 col-sm-4">
						<div class="services">
							<div class="icon">
								<i class="fa fa-trophy"></i>
							</div>
							<div class="serv_detail">
								<h3>' . WILang::get("software") . '</h3>
								<p>' .WILang::get("software") . '
</p>
							</div>
						</div>
					</div>
					
					<div class="col-lg-4 col-md-4 col-sm-4" >
						<div class="services">
							<div class="icon">
								<i class="fa fa-cogs"></i>
							</div>
							<div class="serv_detail">
								<h3>' . WILang::get("it") . '</h3>
								<p>' . WILang::get("it_title")  . '
</p>
							</div>
						</div>
					</div>
					</div>
					


    
				</div>
			</div>';
							

		  
		if ($rsc > 0) {

			  echo '</div><div class="col-sm-1 col-lg-2 cool-md-2 col-xl-2 col-xs-2 sidenav" id="sidenavR">';
		  $this->mod->getMod("right_sidebar");  

		    echo '</div></div>';
		}

		echo '</div>
			</div>';
 

	}

	public function mod_name()
	{
		if(isset($page)){
		$left_sidePower = $this->Web->pageModPower($page, "left_sidebar");
		$leftSideBar = $this->Web->PageMod($page, "left_sidebar");
		//echo $Panel;
		if ($left_sidePower === 0) {
			
		}else{

			$this->mod->getMod($leftSideBar);
		}
		}

			$thisRandNum = rand(9999999999999,999999999999999999);
	$userId = WISession::get("user_id");
	$friendId = WISession::get("friendId");
	//echo "friend" . $friendId;
	if($friendId > 0){
	  //include_once 'WIInc/friend_profile.php';
		echo ' 

<script type="text/javascript">

// Friend adding and accepting stuff
var thisRandNum = "' . $thisRandNum. '";
</script>
<div class="container-fluid text-center">    
  <div class="row">
  <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 profile_p page">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_page">
<div class="user-profile-header" id="friend_profile">
<img class="proheader" src="../WIAdmin/WIMedia/Img/worldmap.jpg">
<div class="profile_picture">
<div class="profile_section">';

 $user_pic  = $this->profile->Friend_User_pic($friendId);

echo '</div>
</div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main_s">
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 sidenav">';
//include_once 'WIInc/sidebar.php';
 $this->mod->getMod("profile_sidebar");
echo '</div>
</div>
</div>
<div div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
<div class="boxing">';
$this->mod->getMod("profile_tabs");

//<?php include_once 'WIInc/profile_tabs.php';

      echo '</div><!-- end boxing-->

</div><!-- end prof_main0-->
</div>
</div>
</div><!--row-->
</div><!--container-->


<!-- add contact modal -->
  <div class="modal" id="modal-change-photo" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                  <h4 class="modal-title" id="modal-username">
                    Change Photo
                  </h4>
                </div>
                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="change_photo" enctype="multipart/form-data" method="POST">
                     
                        <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="photo-img">
                        Photo
                        </label>
                        <div class="controls col-lg-9">
                          <input type="file" name="file" id="photo" multiple class="btn" />
                        </div>
                      </div>

                      <hr />
        <!-- Show the images preview here -->
        <div id="upload-preview"></div>

                  </form>
                </div>
                <div align="center" class="ajax-loading loading"><img src="../WIAdmin//WIMedia/Img/ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-default" onclick="profile.cancel()" data-dismiss="modal" aria-hidden="true">
                      cancel
                    </a>
                    <a href="javascript:void(0);" id="btn-change-photo" onclick="profile.upload(' .  WISession::get('user_id') . ')" class="btn btn-primary">
                      add
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->


          ';
	}else{
	//include_once 'WIInc/my_profile.php';

		echo '<script src="WICore/WIJ/WIProfile.js" type="text/javascript"></script>
<div class="container-fluid text-center">    
  <div class="row">
  <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 min_height profile_p">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_page">
<div class="user-profile-header" id="my_profile">
<img class="proheader" src="../WIAdmin/WIMedia/Img/worldmap.jpg">
<div class="profile_picture">
<div class="profile_section">';
//echo $userId;
 $user_pic  = $this->Profile->User_pic($userId);
echo $user_pic;
echo '</div>
</div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main_s">
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 sidenav">';

//<?php include_once 'WIInc/mysidebar.php';
$this->mod->getMod("profile_sidebar");

echo '</div>
</div>
</div>
<div div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
<div class="boxing">';
$this->mod->getMod("profile_tabs");
//<?php include_once 'WIInc/myprofile_tabs.php';

echo '</div><!-- end boxing-->

</div><!-- end prof_main0-->
</div>
</div>
</div><!--row-->
</div><!--container-->


<!-- add contact modal -->
  <div class="modal" id="modal-change-photo" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                  <h4 class="modal-title" id="modal-username">
                    Change Photo
                  </h4>
                </div>
                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="change_photo" enctype="multipart/form-data" method="POST">
                     
                        <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="photo-img">
                        Photo
                        </label>
                        <div class="controls col-lg-9">
                          <input type="file" name="file" id="photo" multiple class="btn" />
                        </div>
                      </div>

                      <hr />
        <!-- Show the images preview here -->
        <div id="upload-preview"></div>

                  </form>
                </div>
                <div align="center" class="ajax-loading loading"><img src="../WIAdmin//WIMedia/Img/ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-default" onclick="WIProfile.cancel()" data-dismiss="modal" aria-hidden="true">
                      cancel
                    </a>
                    <a href="javascript:void(0);" id="btn-change-photo" onclick="WIProfile.upload(' .WISession::get('user_id') .')" class="btn btn-primary">
                      add
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

          
          
';
	}



		
		if(isset($page)){			
		$right_sidePower = $this->Web->pageModPower($page, "right_sidebar");
		$rightSideBar = $this->Web->PageMod($page, "right_sidebar");
		//echo $Panel;
		if ($right_sidePower === 0) {
			
		}else{

			$this->mod->getMod($rightSideBar);
		}

		}			
					

	echo '</div>
			</div>';
	}


}