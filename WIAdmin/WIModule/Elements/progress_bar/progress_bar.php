<?php

/**
* 
*/
class progress_bar 
{
	
  function __construct()
  {
    $this->WIdb = WIdb::getInstance();
  }

  public function Install($element_name)
  {
    $author = "Jules Warner";
    $type = "HTML Elements";
    $font = "wi_" . $element_name;
    $power = "power_on";
    $this->WIdb->insert('wi_elements', array(
            "element_name" => $element_name,
            "element_author" => $author,
            "element_type" => $type,
            "element_font" => $font,
            "element_powered" => $power
        )); 
  }

			public function editMod()
	{
		echo '<link rel="stylesheet" type="text/css" href="WIModule/progress_bar/main.css">
		<div id="remove">
      <a href="#">
      <button id="delete" onclick="WIMod.delete(event);">Delete</button>
      </a>
       <div id="dialog-confirm" title="Remove Module?" class="hide">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;">
  </span>Are you sure?</p>
  <p> This will remove the module and any unsaved data.</p>
  <span><button class="btn btn-danger" onclick="WIMod.remove(event);">Remove</button> <button class="btn" onclick="WIMod.close(event);">Close</button></span>
</div>

		<div class="container">
<div class="bar">
<span class="bar_fill"></span>
</div>';
	}

	public function mod_name()
	{
		echo '
		<link rel="stylesheet" type="text/css" href="WIModule/progress_bar/main.css">
		<div class="container">
<div class="bar">
<span class="bar_fill"></span>';
	}
}



