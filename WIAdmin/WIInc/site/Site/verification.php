   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
  //  $( "input" ).checkboxradio();
  } );
  </script>
 <form  class="form-horizontal" id="verification-form">
                        <fieldset>
                          <div id="legend">
                        <label class="center">Email Verification</label>
                    <div class="btn-group" id="mail_confirm_required" data-toggle="buttons-radio">
                        <input type="hidden" name="mail_confirm_required" id="mail_confirm_required" class="btn-group-value" value="<?php echo $site->Website_Info('mail_confirm_required')?>"/>
                        <label class="switch">
                        <input type="checkbox" id="verify" checked>
                        <span class="slider round" id="login">ON</span>
                        
                      </label>
                    </div>

                    <span class="help-block">Select <strong>Yes</strong> to send an email verification, in order to get the user to verify there account, before they can log in.</span>
                    
                   
                   <div class="form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-10 col-lg-2">
                           <button id="verification_btn" class="btn btn-success">Save</button> 
                        </div>
                      </div>
                      <div class="results" id="verifresults"></div>
                        </fieldset>
                      </form>

                       <script type="text/javascript">
                       var verification = $("#mail_confirm_required").attr('value');
                       if (verification === "false"){
                        $("#verify").prop("checked", false);
                       }else if (verification === "true"){
                        $("#verify").prop("checked", true);
                       }

                     
                   
                      </script>

