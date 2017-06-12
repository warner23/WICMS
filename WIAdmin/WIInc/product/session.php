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
                        <label>Session secure</label>
                    <div class="btn-group" id="session_secure_only" data-toggle="buttons-radio">
                        <input type="hidden" name="session_secure" id="secure_session" class="btn-group-value" value="<?php echo $site->Website_Info('secure_session')?>"/>
                        <button type="button" id="session_secure_true" name="session_secure" value="true"  class="btn">yes</button>
                        <button type="button" id="session_secure_false" name="session_secure" value="false" class="btn btn-danger activewhens" >No</button>
                    </div>

                    <span class="help-block">Select <strong>Yes</strong> if you are using HTTPS.</span>
                    
                    <label>Session HTTP Only</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input type="hidden" id="session_http_only" name="session_http_only" class="btn-group-value" value="<?php echo $site->Website_Info('http_only')?>" />
                        <button id="http_only_true" type="button" name="session_http_only" value="true"  class="btn btn-success active">Yes</button>
                        <button id="http_only_false" type="button" name="session_http_only" value="false" class="btn" >No</button>
                    </div>
                    <span class="help-block">Prevent JavaScript to access your session cookie and protect you from XSS attack. Recommended: <strong>Yes</strong></span>
                    
                     <label>Session Regenerate Id</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input id="session_regenerate" type="hidden" name="session_regenerate_id" class="btn-group-value" value="<?php echo $site->Website_Info('regenerate_id')?>" />
                        <button id="session_regenerate_true" type="button" name="session_regenerate_id" value="true"  class="btn btn-success active">Yes</button>
                        <button id="session_regenerate_false" type="button" name="session_regenerate_id" value="false" class="btn" >No</button>
                    </div>
                    <span class="help-block">Force session to regenerate id every time. Recommended: <strong>Yes</strong></span>
                   
                     <label>Session Use Only Cookies</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input  id="cookieonly" type="hidden" name="session_use_only_cookies" class="btn-group-value" value="<?php echo $site->Website_Info('use_only_cookie')?>" />
                        <button id="cookieonly_true" type="button" name="session_use_only_cookies" value="1"  class="btn btn-success active">Yes</button>
                        <button id="cookieonly_false" type="button" name="session_use_only_cookies" value="0" class="btn" >No</button>
                    </div>
                    <span class="help-block">Enabling this setting prevents attacks involved passing session ids in URLs. Recommended: <strong>Yes</strong></span>
                </div>

                   <div class="control-group form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="session_btn" class="btn btn-success">Save</button> 
                        </div>
                      </div>
                      <div class="results" id="results"></div>
                        </fieldset>
                      </form>

                       <script type="text/javascript">
                       var secure = $("#secure_session").attr('value');
                       if (secure === "no"){
                        $("#session_secure_true").removeClass('btn-success active')
                        $("#session_secure_false").addClass('btn-danger active');
                       }else if (secure === "yes"){
                        $("#session_secure_false").removeClass('btn-danger active')
                        $("#session_secure_true").addClass('btn-success active');
                       }

                       var http_only = $("#session_http_only").attr('value');

                       if (http_only === "no"){
                        $("#http_only_true").removeClass('btn-success active')
                        $("#http_only_false").addClass('btn-danger active');
                       }else if (http_only === "yes"){
                        $("#http_only_false").removeClass('btn-danger active')
                        $("#http_only_true").addClass('btn-success active');
                       }

                       var regenerate = $("#session_regenerate").attr('value');
                       if (regenerate === "no"){
                        $("#session_regenerate_true").removeClass('btn-success active')
                        $("#session_regenerate_false").addClass('btn-danger active');
                       }else if (regenerate === "yes"){
                        $("#session_regenerate_false").removeClass('btn-danger active')
                        $("#session_regenerate_true").addClass('btn-success active');
                       }

                       var cookie = $("#cookieonly").attr('value');
                       if (cookie === "no"){
                        $("#cookieonly_true").removeClass('btn-success active')
                        $("#cookieonly_false").addClass('btn-danger active');
                       }else if (cookie === "yes"){
                        $("#cookieonly_false").removeClass('btn-danger active')
                        $("#cookieonly_true").addClass('btn-success active');
                       }
                   
                      </script>

