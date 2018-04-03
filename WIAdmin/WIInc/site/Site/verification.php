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
                        <label>Email Verification</label>
                    <div class="btn-group" id="mail_confirm_required" data-toggle="buttons-radio">
                        <input type="hidden" name="mail_confirm_required" id="mail_confirm_required" class="btn-group-value" value="<?php echo $site->Website_Info('mail_confirm_required')?>"/>
                        <button type="button" id="verification_true" name="mail_confirm_required" value="true"  class="btn">yes</button>
                        <button type="button" id="verification_false" name="mail_confirm_required" value="false" class="btn btn-danger activewhens" >No</button>
                    </div>

                    <span class="help-block">Select <strong>Yes</strong> to send an email verification, in order to get the user to verify there account, before they can log in.</span>
                    
                   
                   <div class="form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="verification_btn" class="btn btn-success">Save</button> 
                        </div>
                      </div>
                      <div class="results" id="verifresults"></div>
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

