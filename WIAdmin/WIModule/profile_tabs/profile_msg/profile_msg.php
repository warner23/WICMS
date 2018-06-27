<?php

/**
* 
*/
class profile_msg
{
	
	function __construct()
	{
		$this->WIdb = WIdb::getInstance();
		$this->Web  = new WIWebsite();
		$this->Profile  = new WIProfile();
    $this->mod     = new WIModules();

	}

	public function mod_name()
	{

		echo '
  <script>
  $( function() {
    $( "#tabs1" ).tabs();
  } );
  </script>

<div id="tabs1">
  <ul>
    <li><a href="#tabs-1">Inbox</a></li>
    <li><a href="#tabs-2">Sentbox</a></li>
    
  </ul>
  <div id="tabs-1">
      Inbox';
      //include_once 'WIInc/inbox.php';
      $this->mod->getMod("profile_inbox");


  echo '</div>
  <div id="tabs-2">';
    // include_once 'WIInc/tabbed_sentbox.php';
  $this->mod->getMod("profile_outbox");

  echo '</div>

</div>';
	}

}