<form  class="form-horizontal" id="social-form">
                        <fieldset>
                          <div id="legend">
  <h3 class="center">Social Login</h3>

                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <label>Twitter Login</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input type="hidden" name="twitter_login" class="btn-group-value" id="tw-login" value="<?php echo $site->Website_Info('twitter_enabled')?>" />
                        <label class="switch">
                        <input type="checkbox" id="twit" checked>
                        <span class="slider round" id="ter">ON</span>
                        
                      </label>
                    </div>
                    <div class="tw-fields hide" id="twittee">
                      <div class="col-lg-4 col-xs-4 col-sm-s col-md-4">
                        <label for="tw_key">Key</label>
                      </div>
                        <input type="text" class="input-xlarge" id="tw_key" name="tw_key" placeholder="<?php echo $site->Website_Info('twitter_key')?>">

                        <div class="col-lg-4 col-xs-4 col-sm-s col-md-4">
                        <label for="tw_secret">Secret</label>
                      </div>
                        <input type="text" class="input-xlarge" id="tw_secret" name="tw_secret" placeholder="<?php echo $site->Website_Info('twitter_secret')?>">
                    </div>

                  </div>
                  
                   <div class="col-lg-12 col-md-12 col-sm-12">
                    <label>Facebook Login</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input type="hidden" name="facebook_login" class="btn-group-value"  id="fb-login" value="<?php echo $site->Website_Info('facebook_enabled')?>" />
                        <label class="switch">
                        <input type="checkbox" id="fb" checked>
                        <span class="slider round" id="log">ON</span>
                        
                      </label>
                    </div>
                    <div class="fb-fields hide" id="faceb">
                      <div class="col-lg-4 col-xs-4 col-sm-s col-md-4">
                        <label for="fb_id">ID</label>
                      </div>
                        <input type="text" class="input-xlarge" id="fb_id" name="fb_id" placeholder="<?php echo $site->Website_Info('facebook_id')?>">

                        <div class="col-lg-4 col-xs-4 col-sm-s col-md-4">
                        <label for="fb_secret">Secret</label>
                      </div>
                        <input type="text" class="input-xlarge" id="fb_secret" name="fb_secret" placeholder="<?php echo $site->Website_Info('facebook_secret')?>">
                    </div>
                  </div>

                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <label>Google+ Login</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input type="hidden" name="google_login" class="btn-group-value"  id="gp-login" value="<?php echo $site->Website_Info('google_enabled')?>" />
                        <label class="switch">
                        <input type="checkbox" id="googleplus" checked>
                        <span class="slider round" id="glogin">ON</span>
                        
                      </label>
                    </div>
                    <div class="gp-fields hide" id="googlep">
                      <div class="col-lg-4 col-xs-4 col-sm-s col-md-4">
                        <label for="gp_id">ID</label>
                      </div>
                        <input type="text" class="input-xlarge" id="gp_id" name="gp_id" placeholder="<?php echo $site->Website_Info('google_id')?>">

                        <div class="col-lg-4 col-xs-4 col-sm-s col-md-4">
                        <label for="gp_secret">Secret</label>
                      </div>
                        <input type="text" class="input-xlarge" id="gp_secret" name="gp_secret" placeholder="<?php echo $site->Website_Info('google_secret')?>">
                    </div>
                </div>
              </div>
                   <div class="form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-10 col-lg-2">
                           <button id="social_btn" class="btn btn-success" >Save</button> 
                        </div>

                        <div id="socresults"></div>
                      </div>
                        </fieldset>
                      </form>

                      <script type="text/javascript">
                          var twiiter = $("#tw-login").attr('value');
                       if (twiiter === "false"){
                        $("#twit").prop("checked", false);
                        $("#ter").text('OFF');
                        $("#ter").css('padding-left', '50%');
                        $("#twittee").addClass("hide");
                       }else if (twiiter === "true"){
                        $("#twit").prop("checked", true);
                        $("#ter").text('ON');
                        $("#twittee").removeClass("hide");
                       }

                       var facebook = $("#fb-login").attr('value');
                       if (facebook === "false"){
                       $("#fb").prop("checked", false);
                       $("#log").text('OFF');
                        $("#log").css('padding-left', '50%');
                       $("#faceb").addClass("hide");
                       }else if (facebook === "true"){
                        $("#fb").prop("checked", true);
                        $("#log").text('ON');
                        $("#faceb").removeClass("hide");
                       }

                       var google = $("#gp-login").attr('value');
                       console.log(google);
                       if (google === "false"){
                        //console.log("passed");
                        $("#googleplus").prop("checked",false);
                        $("#googleplus").text('OFF');
                        $("#glogin").css('padding-left', '50%');
                        $("#googlep").addClass("hide");
                       }else if (google === "true"){
                        $("#googleplus").prop("checked", true);
                        $("#glogin").text('ON');
                        $("#googlep").removeClass("hide");
                       }
                      </script>