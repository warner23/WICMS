<?php

/**
* 
*/
class appearing_button 
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
		<link rel="stylesheet" type="text/css" href="WIModule/appearing_button/appearing_button.css">
		<div id="box1">
			<a href="#">
			<button><input text="text" placeholder="Appearing button" id="appear"></button></a>
			</div></div>';
	}

	public function mod_name()
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
		<link rel="stylesheet" type="text/css" href="WIModule/appearing_button/appearing_button.css">
		<div id="box1">
			<a href="#">
			<button>Appearing Button</button></a>
			</div></div>';
	}
}



