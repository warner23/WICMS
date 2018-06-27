<?php

/**
* 
*/
class top_head 
{
	
	function __construct()
	{
		$this->WIdb = WIdb::getInstance();
		$this->Web  = new WIWebsite();
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
echo '<div class="top_head">';
		$this->Web->viewLang();

				
				echo '<div class="col-lg-4 col-md-6 col-sm-4">
				<div class="logo">
				<a href="#"><img alt="WICMS"  class="img-responsive" src="WIAdmin/WIMedia/Img/header/' . $this->Web->webSite_essentials('logo'). '"></a>
				</div>
				</div>

				</div>';

				
	}


	public function mod_name()
	{
		//$basename = dirname(dirname(dirname(__FILE__)));
		echo '<div class="top_head">';
		$this->Web->google_lang();

				
				echo '</div>';
	}



}