<?php

/**
* 
*/
class sidebar 
{
	
	function __construct()
	{
		$this->WIdb = WIdb::getInstance();
		$this->Web  = new WIWebsite();
	}

	public function mod_name()
	{

		echo '<div class="col-sm-1 sidenav">
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
    </div>';
	}


}