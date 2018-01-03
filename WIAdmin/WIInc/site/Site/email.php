  <form class="form-horizontal" id="email">
  
                        <fieldset>
                          <div id="legend">
                          <h3>Email Configuration</h3>

                    <label for="mailer">Mailer</label>
                    <select name="mailer" id="mailer">
                        <option value="mailer">PHP mail()</option>
                        <option value="smtp">SMTP</option>
                    </select>

            
                   <div id="smtp-wrapper" style="display:none;">
                        <label for="smtp_host">SMTP Host</label>
                        <input type="text" class="input-xlarge" id="smtp_host" name="smtp_host">

                        <label for="smtp_port">SMTP Port</label>
                        <input type="text" class="input-xlarge" id="smtp_port" name="smtp_port">

                        <label for="smtp_username">SMTP Username</label>
                        <input type="text" class="input-xlarge" id="smtp_username" name="smtp_username">

                        <label for="smtp_password">SMTP Password</label>
                        <input type="text" class="input-xlarge" id="smtp_password" name="smtp_password">

                        <label for="smtp_enc">SMTP Encryption</label>
                        <input type="text" class="input-xlarge" id="smtp_enc" name="smtp_enc">
                        <span class="help-block">
                            Some servers require encryption (tls or ssl) set. Set it if your host requires that.
                        </span>
                    </div>


                         <div class="form-group">
                           
                            <div class="controls col-lg-offset-4 col-lg-8">
                              <button id="email-settings" class="btn btn-success" onclick="WIEmail.EmailMethod()">Save Settings</button>
                            </div>
                          </div>

                          <div class="results" id="results"></div>
                        </fieldset>
                      </form>

                      <script type="text/javascript">

                      $('#mailer').on('change', function() {
                          //alert( this.value );

                          var mailer  = $("#mailer").val();
                          //alert(mailer);

                        if( mailer === "smtp"){
                          $("#smtp-wrapper").css("display", "block");
                          $("#email-settings").attr("id","email-settings-smtp");
                        }else{
                           $("#smtp-wrapper").css("display", "none");
                           $("#email-settings-smtp").removeAttr("id","email-settings-smtp");
                           $(".btn").attr("id","email-settings");
                        }
                        })

                        
                      </script>

                    

                        