   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
  //  $( "input" ).checkboxradio();
  } );
  </script>
 <form  class="form-horizontal" id="email-form">
                        <fieldset>
                          <div id="legend">
                        <label>Version Control</label>
                    <div class="btn-group" id="mail_confirm_required" data-toggle="buttons-radio">
                        Your Current Version is <?php echo $site->Website_Info('wicms_version')?>
                        <input type="hidden" name="mail_confirm_required" id="mail_confirm_required" class="btn-group-value" value="<?php echo $site->Website_Info('wicms_version')?>"/>
                        <button>Check for Updates</button>
                      
                    </div>

                   
                    
                   
                   <div class="control-group form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="verification_btn" class="btn btn-success">Save</button> 
                        </div>
                      </div>
                      <div class="results" id="results"></div>
                        </fieldset>
                      </form>

                       <script type="text/javascript">
                       var verification = $("#mail_confirm_required").attr('value');
                       if (verification === "false"){
                        $("#verification_true").removeClass('btn-success active')
                        $("#verification_false").addClass('btn-danger active');
                       }else if (verification === "true"){
                        $("#verification_false").removeClass('btn-danger active')
                        $("#verification_true").addClass('btn-success active');
                       }

                     
                   
                      </script>

