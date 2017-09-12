<?php

/**
* 
*/
class privacy_policy 
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

				if(isset($page_id)){
			$mod_name = $this->mod->ModName($page_id);
		}else{
			$mod_name = "privacy_policy";
		}

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
		<script>
  $( function() {
    $( "#accordion1" ).accordion();
  } );
  </script>
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

			echo '<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 front">

<div class="title_content">							
<h3>Privacy Policy</h3>						
</div>		
							
<div id="accordion1">
  <h3><input type="text" id="section1" placeholder="';  $this->mod->module($mod_name, 'text'); echo'"></h3>
  <div>
    <p>';$this->mod->module($mod_name, 'text1'); 
    echo '</p><br><p>';$this->mod->module($mod_name, 'text2'); 
    echo '</p>
    <p>The general public will have access to certain pages contained on the Website that contain general information about the Website and the services it provides.  The Website will also contain 1) a topic selection page, where Registered users may choose a topic that they wish to debate about. Guests whom are not registered will not have access to this page, and will be asked to create an account,  2) an About Us page, where Registered Users and Guests may understand the purpose of the Website, 3) an Info page, where Registered Users and Guests may be provided with information about the site, such as how to start a debate. 4) a Contact Us page, where Registered Users, and Guests may message website staff about any complaints, concerns, or reporting malicious activity on the site. Debate Spot may expand the Website to encompass any additional services it deems fit at its own discretion.</p>
  </div>
  <h3>Section 2</h3>
  <div>
    <p>
    Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
    purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
    velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
    suscipit faucibus urna.
    </p>
  </div>
  <h3>Section 3</h3>
  <div>
    <p>
    Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
    Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
    ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
    lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
    </p>
    <ul>
      <li>List item one</li>
      <li>List item two</li>
      <li>List item three</li>
    </ul>
  </div>
  <h3>Section 4</h3>
  <div>
    <p>
    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
    et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
    faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
    mauris vel est.
    </p>
    <p>
    Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
    inceptos himenaeos.
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

		echo '<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
  </script>
  <div class="container-fluid text-center">    
  <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 about">';

		if(isset($page)){
		$left_sidePower = $this->Web->pageModPower($page, "left_sidebar");
		$leftSideBar = $this->Web->PageMod($page, "left_sidebar");
		//echo $Panel;
		if ($left_sidePower > 0) {
			$this->mod->getMod($leftSideBar);
			echo '<div class="col-lg-8 col-md-8 col-sm-8">';
		}else{
			echo '<div class="col-lg-8 col-md-8 col-sm-8 center">';
		}

		}
		
		
		echo ' 
   
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center">

<div class="title_content">							
<h3>';  $this->mod->moduleText($module, 'text'); echo'</h3>						
</div>		
							
<div id="accordion">
  <h3><strong>';  $this->mod->moduleText($module, 'text1'); echo'</strong></h3>
  <div>
    <p>';$this->mod->moduleText($module, 'text2'); 
    echo '</p><br><p>';$this->mod->moduleText($module, 'text3'); 
    echo '</p>

  </div>
  <h3> <strong>';  $this->mod->moduleText($module, 'text'); echo'</strong></h3>
  <div>
    <p>';  $this->mod->moduleText($module, 'text4'); echo'
    </p>
  </div>
  <h3> <strong> ';  $this->mod->moduleText($module, 'text5'); echo'</strong></h3>
  <div>
    <p>
';  $this->mod->moduleText($module, 'text6'); echo'
    </p>
    <ul>
      <li>the Internet domain from which you access the Website;</li>
      <li>The IP address from which you access the Website;</li>
      <li>The type of browser used to access the Website;</li>
      <li>The operating system used to access the Website;</li>
      <li>The date and time you access the Website;</li>
      <li>The URLs of the pages you visit;</li>
      <li>Your username to log into the Website; and</li>
      <li>If you visited the Website from a third party site, the URL of that third party site.</li>
    </ul>

    <p>This information is only used to help Debate Spot make the website more useful to the general public as well as Registered Users.  The Website may also utilize “cookie” technology to collect information about how the Website is used.
With this data, Debate Spot learns about the number of visitors to the Website, the information and materials that users are most interested in, and the types of technology Registered Users use.
</p>
  </div>
  <h3> <strong> When and With Whom Do We Share Personal Information? </strong> </h3>
  <div>
    <p>
While some parts of the Website, including Debate Chats, Contact Us, About Us, Info, Login page, and Privacy Policy will be publicly accessible, Debate Spot does not willfully provide the personal information of Registered Users to third parties unless it discloses its intention to do so prior to asking Registered Users to provide such information. Debate Spot reserves the right to disclose any personal information about you or your use of the Website without your prior consent if Debate Spot has a good faith belief such action is consistent with our mission and is necessary to: 1) conform to legal requirements or comply with legal process; 2) protect and defend the rights or property of Debate Spot or its affiliated organizations 3) enforce the Privacy and Copyright Policy; or 4) to protect the interests of Users.
Use of the Website by Minors
The Children’s Online Privacy Protection Act requires that we not knowingly collect or share personal information from children under the age of 13 without the consent of a parent or guardian.  If you are aware that a child under the age of 13 has provided personal information without such consent, please contact us at inquiry@debatespot.net so that we can delete such information.

    </p>
  </div>
</div>	</div></div>
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
			</div></div></div>';
	}


}