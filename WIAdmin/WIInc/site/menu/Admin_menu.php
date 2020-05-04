          <style type="text/css">
           .ui-accordion-content{
            height: auto !important;
           }
          </style>
                 <form  class="form-horizontal settings">
                    <fieldset>
                      <div id="legend">
                        <legend class="">Menu</legend>
                      </div>   

                      <?php   $web->AdminMenu(); ?> 
                     
                      <div class="form-group">
                        <!-- Button -->
                        <div class="col-md-4 col-lg-8 col-xs-4">
                           <button id="site_settings" class="btn btn-success">Save</button> 
                        </div>
                      </div>

                      <div class="results" id="admresults"></div>
                    </fieldset>
                  </form> 