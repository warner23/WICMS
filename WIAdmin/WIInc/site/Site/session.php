   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
  //  $( "input" ).checkboxradio();
  } );
  </script>
 <form  class="form-horizontal" id="session-form">
                        <fieldset>
                          <div id="legend">

                            <div class="col-lg-4 col-xs-4 col-sm-s col-md-4">
                        <label class="center">Session secure</label></div>
                    <div class="btn-group" id="session_secure_only" data-toggle="buttons-radio">
                        <input type="hidden" name="session_secure" id="secure_session" class="btn-group-value" value="<?php echo $site->Website_Info('secure_session')?>"/>
                        <label class="switch">
                        <input type="checkbox" id="session" checked>
                        <span class="slider round" id="ss">ON</span>
                        
                      </label>
                    </div>

                    <span class="help-block">Select <strong>Yes</strong> if you are using HTTPS.</span>
                    
                    <div class="col-lg-4 col-xs-4 col-sm-s col-md-4">
                      <label>Session HTTP Only</label>
                    </div>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input type="hidden" id="session_http_only" name="session_http_only" class="btn-group-value" value="<?php echo $site->Website_Info('http_only')?>" />
                       <label class="switch">
                        <input type="checkbox" id="ht" checked>
                        <span class="slider round" id="http">ON</span>
                        
                      </label>
                    </div>
                    <span class="help-block">Prevent JavaScript to access your session cookie and protect you from XSS attack. Recommended: <strong>Yes</strong></span>
                    
                    <div class="col-lg-4 col-xs-4 col-sm-s col-md-4">
                     <label>Session Regenerate Id</label>
                   </div>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input id="session_regenerate" type="hidden" name="session_regenerate_id" class="btn-group-value" value="<?php echo $site->Website_Info('regenerate_id')?>" />
                       <label class="switch">
                        <input type="checkbox" id="reg_id" checked>
                        <span class="slider round" id="reg">ON</span>
                        
                      </label>
                    </div>
                    <span class="help-block">Force session to regenerate id every time. Recommended: <strong>Yes</strong></span>
                   
                   <div class="col-lg-4 col-xs-4 col-sm-s col-md-4">
                     <label>Session Use Only Cookies</label>
                   </div>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input  id="cookieonly" type="hidden" name="session_use_only_cookies" class="btn-group-value" value="<?php echo $site->Website_Info('use_only_cookie')?>" />
                        <label class="switch">
                        <input type="checkbox" id="cookie" checked>
                        <span class="slider round" id="ck">ON</span>
                        
                      </label>
                    </div>
                    <span class="help-block">Enabling this setting prevents attacks involved passing session ids in URLs. Recommended: <strong>Yes</strong></span>
                </div>

                   <div class="form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-10 col-lg-2">
                           <button id="session_btn" class="btn btn-success">Save</button> 
                        </div>
                      </div>
                      <div class="results" id="sesresults"></div>
                        </fieldset>
                      </form>

                       <script type="text/javascript">
                       var secure = $("#secure_session").attr('value');
                       
                       if (secure === "false"){
                        $("#session").prop("checked", false);
                        $("#ss").text('OFF');
                        $("#ss").css('padding-left', '50%');
                        
                       }else if (secure === "true"){
                        $("#session").prop("checked", true);
                       }



                       var http_only = $("#session_http_only").attr('value');

                       if (http_only === "false"){
                       $("#ht").prop("checked", false);
                        $("#http").text('OFF');
                        $("#http").css('padding-left', '50%');
                       }else if (http_only === "true"){
                        $("#ht").prop("checked", true);
                       
                       }

                       var regenerate = $("#session_regenerate").attr('value');
                       if (regenerate === "false"){
                        $("#reg_id").prop("checked", false);
                        $("#reg").text('OFF');
                        $("#reg").css('padding-left', '50%');
                       }else if (regenerate === "true"){
                        $("#reg_id").prop("checked", true);
                        
                       }

                       var cookie = $("#cookieonly").attr('value');
                       if (cookie === "1"){
                         $("#cookie").prop("checked", true);
                       }else if (cookie === "0"){
                        $("#cookie").prop("checked", false);
                        $("#ck").text('OFF');
                        $("#ck").css('padding-left', '50%');
                       }
                   
                      </script>

