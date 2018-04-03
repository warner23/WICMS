   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
  //  $( "input" ).checkboxradio();
  } );
  </script>
 <form  class="form-horizontal" id="version-form">
                        <fieldset>
                          <div id="legend">
                        <label>Version Control</label>
                    <div class="btn-group" id="version" data-toggle="buttons-radio">
                        Your Current Version is <?php echo $site->Website_Info('wicms_version')?>
                        <input type="hidden" name="version_control" id="version_control" class="btn-group-value" value="<?php echo $site->Website_Info('wicms_version')?>"/>
                        <button onclick="WISite.Version(<?php echo $site->Website_Info('wicms_version')?>);">Check for Updates</button>
                      
                    </div>

                   
                    
                   
                   <div class="form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="version_btn" class="btn btn-success">Save</button> 
                        </div>
                        <div id="versresults"></div>
                      </div>
                      <div class="results" id="version_results"></div>
                        </fieldset>
                      </form>


