<?php

/**
* 
*/
class button 
{
	
	function __construct()
	{
		
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

		<button><input text="text" placeholder="button" id="button"></button></div>';
	}

	public function mod_name()
	{
		echo '
		<link rel="stylesheet" type="text/css" href="WIModule/appearing_button/appearing_button.css">
		<div id="box1>
			<a href="#">Change profile Photo</a>
			<img src="#" alt="pic">';
	}
}



