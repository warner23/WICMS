<?php

/**
* 
*/
class google_map 
{
  
  function __construct()
  {
    $this->WIdb = WIdb::getInstance();
  }

  public function Install($element_name)
  {
    $author = "Jules Warner";
    $type = "Common Fields";
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

			<div id="map"></div>
			</div>
			<script>
			function myMap() {
    var mapOptions = {
        center: new google.maps.LatLng(51.5, -0.12),
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.HYBRID
    }
var map = new google.maps.Map(document.getElementById("map"), mapOptions);
}
</script>';
	}

		public function mod_name()
	{
		echo '                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                         <!-- Form Name -->
                       <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">  
          <legend>Address Details</legend>

          <!-- Text input-->
          <div class="form-group">
            <div class="col-sm-12">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <div class="col-sm-12">

              </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <div class="col-sm-12">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">

            <div class="col-sm-12">
            
            </div>
            </div>

            <div class="form-group">
            <div class="col-sm-12">

            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-12">

            </div>
          </div>
          </div>

            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <iframe class="google_mapping" src="//www.google.com/maps/embed/v1/place?q=&zoom=17
      &key=' .  GOOGLE_MAP_API . '">
  </iframe>
            </div>



                      
                      </div>';
	}
}



