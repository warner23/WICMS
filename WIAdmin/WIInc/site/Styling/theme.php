 <form  class="form-horizontal theme-form" id="theme">
                      <fieldset>
                        <div id="legend">
                          <legend class="">Theme Settings</legend>
                        </div>

                        

                       <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                          <div class="form-group">
                        <!-- Button -->
                        <div class="col-lg-3 col-sm-3 col-md-3">
                           <button id="add_theme_btn" onclick="WITheme.newTheme();" class="btn btn-success">Create New Theme</button> 
                        </div>
                      </div>

                       
                       <div id="ViewTheme"></div>
                          </div>    
                      <div class="results" id="thresults"></div>
                    </fieldset>
                        <br /><br />
                  </form>


<?php 
$modal->moduleModal('theme-add', 'Edit Theme', 'WITheme', 'addtheme','Save'); 

 $modal->moduleModal('theme-delete', 'Delete Theme', 'WITheme', 'Deletetheme','Delete');

?>