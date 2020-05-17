                 <form  class="form-horizontal settings">
                    <fieldset>
                      <div id="legend">
                        <legend class="center">Menu</legend>
                      </div>  

                      <?php   $web->MainMenu(); ?> 
                     
                      <div class="form-group">
                        <!-- Button -->
                        <div class="col-md-4 col-lg-8 col-xs-4">
                           <button id="site_settings" class="btn btn-success">Save</button> 
                        </div>
                      </div>

                      <div class="results" id="mresults"></div>
                    </fieldset>
                  </form> 
                  <?php

                   $modal->moduleModal('menu-edit', 'Edit Menu', 'WIMenu', 'menuEdit','Save'); 
                   $modal->moduleModal('menu-new', 'Add Menu item', 'WIMenu', 'menunew','add Menu'); 
                   $modal->moduleModal('menu-delete', 'Delete Menu item', 'WIMenu', 'deleteMEnu','Delete'); 
                   ?>