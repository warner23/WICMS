<?php

/**
* 
*/
class right_sidebar 
{
	
	function __construct()
	{
				$this->WIdb = WIdb::getInstance();
		$this->Web  = new WIWebsite();
		$this->site = new WISite();
		$this->mod  = new WIModules();
		$this->page = new WIPage();
	}

		public function editPageContent($page_id)
	{
		$mod_name = $this->mod->ModName($page_id);

		echo '<div class="col-sm-1 col-lg-2 col-md-2 col-xl-2 col-xs-2 sidenav" id="sidenavL">
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
    </div>';
	}

	public function mod_name()
	{

	echo '<aside id="Lsidebar" class="col-sm-3 col-lg-3 col-md-3 col-xl-3 col-xs-3 sidenav">';
	$this->Web->RsideBar();
echo '</aside>';
	}


}