<?php

/**
* 
*/
class blog
{
	

	function __construct()
	{
		$this->WIdb = WIdb::getInstance();
		$this->Web  = new WIWebsite();
		$this->site = new WISite();
		$this->mod  = new WIModules();
		$this->page = new WIPage();
		$this->login = new WILogin();
        $this->user   = new WIUser(WISession::get('user_id'));
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

echo '<div class="container-fluid text-center">    
  <div class="row content">

	<div class="col-lg-12 col-md-12 col-sm-12" >
						<div class="col-lg-12 col-md-12 col-sm-12" >

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


		echo '</div>';
	}

	public function editPageContent($page_id)
	{
		// include_once '../../WIInc/WI_StartUp.php';
		 echo '		 <style type="text/css">
	
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

	public function mod_name($module, $page)
	{

    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
	.blog_type{
    float: left;
    width: 12%;
    margin-left: 15px;
        list-style: none;
	}

	.blogSelect{
    width: 9%;
    margin: 0px 0px 0px 450px;
        cursor: pointer;
	}

	.admin_post{
        width: 18%;
    height: 44px;
    margin-left: 401px;
	}

	.block{
		display: block;
	}

	.hidden{
		display: none;
	}

	#wivid{
		    width: 49%;
    height: 137px;
	}
</style>
<div class="container-fluid text-center">    
  <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 min_height">';

    if(isset($page)){
    $left_sidePower = $this->Web->pageModPower($page, "left_sidebar");
    $leftSideBar = $this->Web->PageMod($page, "left_sidebar");
    //echo $Panel;
    if ($left_sidePower > 0) {
      $this->mod->getMod($leftSideBar);
      echo '<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 index">';
    }else{
      echo '<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 index">';
    }

    }

if($this->user->isAdmin()){

		echo '<div class="type">
<div class="blogSelect" id="blog_post" title="Choose Post" onclick="WIBlog.type()">
<i class="fa fa-th"></i>
</div>	

<div class="admin_post hidden">
<ul>
	<li class="blog_type" title="Blog post no media"><a href="javascript:void(0)"  onclick="WIBlog.noMedia(`';echo $this->user->getRole(); echo'`)"><i class="fa fa-file-text" aria-hidden="true"></i></a></li>
	<li class="blog_type" title="Blog post slider"><a href="javascript:void(0)" onclick="WIBlog.slider(`'; echo $this->user->getRole(); echo'`)"><i class="fa fa-sliders" aria-hidden="true"></i></a></li>
	<li class="blog_type" title="Blog post video"><a href="javascript:void(0)" onclick="WIBlog.video(`'; echo $this->user->getRole(); echo'`)"><i class="fa fa-list-alt" aria-hidden="true"></i></a></li>
	<li class="blog_type" title="Blog post audio"><a href="javascript:void(0)"  onclick="WIBlog.audio(`'; echo $this->user->getRole(); echo '`)"><i class="fa fa-file-audio-o" aria-hidden="true"></i></a></li>
	<li class="blog_type" title="Blog post image"><a href="javascript:void(0)" onclick="WIBlog.image(`'; echo $this->user->getRole(); echo '`)"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>
	<li class="blog_type" title="Blog post youtube"><a href="javascript:void(0)" onclick="WIBlog.youtube(`';echo $this->user->getRole(); echo '`)"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
</ul>
</div>
	</div>';
	} else {
        echo '<div class="type">
</div>';	
       }


echo '<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">	
	
	<div class="blog_style" id="blog_style">
		
	</div>	

  <div class="blog_style" id="posts">							
						
	</div>			
	
				
            </div>	
            </div>
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

     <script type="text/javascript" src="WICore/WIJ/WICore.js"></script>

     <script type="text/javascript" src="WICore/WIJ/WIBlog.js"></script>

<script type="text/javascript" src="WICore/WIJ/WIMediaCenter.js"></script>
<script type="text/javascript" src="WICore/WIJ/WIMedia.js"></script>
<script type="text/javascript" src="WICore/WIJ/WISlideMedia.js"></script>
';

		if(isset($page)){			
		$right_sidePower = $this->Web->pageModPower($page, "right_sidebar");
		$rightSideBar = $this->Web->PageMod($page, "right_sidebar");
		//echo $Panel;
		if ($right_sidePower > 0) {

			$this->mod->getMod($rightSideBar);
		}	
		}		
					

	echo '</div>
			</div></div>';
	}


}