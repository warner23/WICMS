<?php

/**
* 
*/
class policy 
{
	

	function __construct()
	{
		$this->WIdb = WIdb::getInstance();
		$this->Web  = new WIWebsite();
		$this->site = new WISite();
		$this->mod  = new WIModules();
		$this->page = new WIPage();
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
    <div class="col-sm-2 col-lg-2 col-md-2 col-xs-2 sidenav">

    </div>
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 front">

<a href="topics.php"><button class="btn btn-main"><h3>' . WILang::get('current_topics') . '</h3></button></a>
					</div>
					

					    <div class="col-sm-2 col-lg-2 col-md-2 col-xs-2 sidenav">

    </div>
    
				</div>
			</div>';


		echo '</div>';
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

						<div class="title_content">							
<h3>About Us</h3>						
</div>						
<div class="our_history">							
<p>  
This is the internet privacy policy for debatespot.net
This website is the property of debatespot. We take the privacy of all visitors to this Website very seriously and therefore set out in this privacy and cookies policy our position regarding certain privacy matters and the use of cookies on this Website.
This policy covers all data that is shared by a visitor with us whether directly via [add website url] or via email. This policy been created by the internet marketing experts at Surge Digital on our behalf, and is occasionally updated by us so we suggest you re-review from time to time.
This policy provides an explanation as to what happens to any personal data that you share with us, or that we collect from you either directly via this Website or via email.
Certain businesses are required under the data protection act to have a data controller. For the purpose of the Data Protection Act 1998 our data controller is [add individual’s name] and can be contacted via email at [add email address].

</p>	
					
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

		echo '<div class="container-fluid text-center">    
  <div class="row content">
   

    </div>
<div class="col-lg-8 col-md-8 col-sm-8 about">						
<div class="title_content">							
<h3>About Us</h3>						
</div>						
<div class="our_history">							
<p>  
This is the internet privacy policy for debatespot.net
This website is the property of debatespot. We take the privacy of all visitors to this Website very seriously and therefore set out in this privacy and cookies policy our position regarding certain privacy matters and the use of cookies on this Website.
This policy covers all data that is shared by a visitor with us whether directly via [add website url] or via email. This policy been created by the internet marketing experts at Surge Digital on our behalf, and is occasionally updated by us so we suggest you re-review from time to time.
This policy provides an explanation as to what happens to any personal data that you share with us, or that we collect from you either directly via this Website or via email.
Certain businesses are required under the data protection act to have a data controller. For the purpose of the Data Protection Act 1998 our data controller is [add individual’s name] and can be contacted via email at [add email address].

</p>	
					
  </div>						
  </div>
    
				</div>
			</div>';

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