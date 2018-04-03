                 <form  class="form-horizontal settings">
                    <fieldset>
                      <div id="legend">
                        <legend class="">Menu</legend>
                      </div>   

                      <?php   $web->EditAdminSideBar(); ?> 
                     

                      <div class="form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="site_settings" class="btn btn-success">Save</button> 
                        </div>
                      </div>

                      <div class="results" id="sbmresults"></div>
                    </fieldset>
                  </form> 

                   <script>
  $( function() {
    
    $( "#editaccordion" ).accordion({
      collapsible: true
    });
  } );
  </script>
