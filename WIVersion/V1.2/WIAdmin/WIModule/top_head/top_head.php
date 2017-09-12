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
echo '<div class="top_head">
			<div class="container">
				<div class="row">';

				$this->Web->viewLang();

				echo 	'<!--  search area-->
					<div class="col-lg-4 col-md-4 col-sm-6">
						<div id="sb-search" class="sb-search">
							<form>
								<input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search"></span>
							</form>
						</div>

						<ul class="social_media"> 
	                        <li><a href="#" data-placement="bottom" data-toggle="tooltip" class="fa fa-facebook" title="Facebook">Facebook</a></li>
	                        <li><a href="#" data-placement="bottom" data-toggle="tooltip" class="fa fa-google-plus" title="Google+">Google+</a></li>
	                        <li><a href="#" data-placement="bottom" data-toggle="tooltip" class="fa fa-twitter" title="Twitter">Twitter</a></li>
	                        <li><a href="#" data-placement="bottom" data-toggle="tooltip" class="fa fa-pinterest" title="Pinterest">Pinterest</a></li>
	                        <li><a href="#" data-placement="bottom" data-toggle="tooltip" class="fa fa-linkedin" title="Linkedin">Linkedin</a></li>
	                        <li><a href="#" data-placement="bottom" data-toggle="tooltip" class="fa fa-rss" title="Feedburner">RSS</a></li>
	                    </ul><!-- End Social --> 
					</div>
				</div>
			</div>
		</div>';

		echo '</div>';
	}


	public function mod_name()
	{

		echo '<div class="top_head">
			<div class="container">
				<div class="row">';

				$this->Web->viewLang();

				echo 	'<!--  search area-->
					<div class="col-lg-4 col-md-4 col-sm-6">
						<div id="sb-search" class="sb-search">
							<form>
								<input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search"></span>
							</form>
						</div>

						<ul class="social_media"> 
	                        <li><a href="#" data-placement="bottom" data-toggle="tooltip" class="fa fa-facebook" title="Facebook">Facebook</a></li>
	                        <li><a href="#" data-placement="bottom" data-toggle="tooltip" class="fa fa-google-plus" title="Google+">Google+</a></li>
	                        <li><a href="#" data-placement="bottom" data-toggle="tooltip" class="fa fa-twitter" title="Twitter">Twitter</a></li>
	                        <li><a href="#" data-placement="bottom" data-toggle="tooltip" class="fa fa-pinterest" title="Pinterest">Pinterest</a></li>
	                        <li><a href="#" data-placement="bottom" data-toggle="tooltip" class="fa fa-linkedin" title="Linkedin">Linkedin</a></li>
	                        <li><a href="#" data-placement="bottom" data-toggle="tooltip" class="fa fa-rss" title="Feedburner">RSS</a></li>
	                    </ul><!-- End Social --> 
					</div>
				</div>
			</div>
		</div>';
	}



}