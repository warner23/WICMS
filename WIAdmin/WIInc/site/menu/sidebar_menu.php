                 <form  class="form-horizontal settings">
                    <fieldset>
                      <div id="legend">
                        <legend class="">Menu</legend>
                      </div>   

                      <?php   $web->EditAdminSideBar(); ?> 
                     

                      <div class="form-group">
                        <!-- Button -->
                        <div class="col-md-4 col-lg-8 col-xs-4">
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
