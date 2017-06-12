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
	}

	public function mod_name()
	{

		echo '<div class="col-sm-1 sidenav">
		<div class="well"></div>
    </div>';
	}


}