<form  class="form-horizontal" id="social-form">
                        <fieldset>
                          <div id="legend">
  <h3>Social Login</h3>

                    <label>Twitter Login</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input type="hidden" name="twitter_login" class="btn-group-value" id="tw-login" value="<?php echo $site->Website_Info('twitter_enabled')?>" />
                        <button type="button" name="twitter_login" value="true" id="tw-enabled"  class="btn btn-success active">Enabled</button>
                        <button type="button" name="twitter_login" value="false" id="tw-disabled" class="btn" >Disabled</button>
                    </div>
                    <div class="tw-fields">
                        <label for="tw_key">Key</label>
                        <input type="text" class="input-xlarge" id="tw_key" name="tw_key" placeholder="<?php echo $site->Website_Info('twitter_key')?>">

                        <label for="tw_secret">Secret</label>
                        <input type="text" class="input-xlarge" id="tw_secret" name="tw_secret" placeholder="<?php echo $site->Website_Info('twitter_secret')?>">
                    </div>

                    <label>Facebook Login</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input type="hidden" name="facebook_login" class="btn-group-value"  id="fb-login" value="<?php echo $site->Website_Info('facebook_enabled')?>" />
                        <button type="button" name="facebook_login" value="true" id="fb-enabled"  class="btn btn-success active">Enabled</button>
                        <button type="button" name="facebook_login" value="false" id="fb-disabled" class="btn" >Disabled</button>
                    </div>
                    <div class="fb-fields">
                        <label for="fb_id">ID</label>
                        <input type="text" class="input-xlarge" id="fb_id" name="fb_id" placeholder="<?php echo $site->Website_Info('facebook_id')?>">

                        <label for="fb_secret">Secret</label>
                        <input type="text" class="input-xlarge" id="fb_secret" name="fb_secret" placeholder="<?php echo $site->Website_Info('facebook_secret')?>">
                    </div>

                    <label>Google+ Login</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input type="hidden" name="google_login" class="btn-group-value"  id="gp-login" value="<?php echo $site->Website_Info('google_enabled')?>" />
                        <button type="button" name="google_login" value="true" id="gp-enabled"  class="btn btn-success active">Enabled</button>
                        <button type="button" name="google_login" value="false" id="gp-disabled" class="btn" >Disabled</button>
                    </div>
                    <div class="gp-fields">
                        <label for="gp_id">ID</label>
                        <input type="text" class="input-xlarge" id="gp_id" name="gp_id" placeholder="<?php echo $site->Website_Info('google_id')?>">

                        <label for="gp_secret">Secret</label>
                        <input type="text" class="input-xlarge" id="gp_secret" name="gp_secret" placeholder="<?php echo $site->Website_Info('google_secret')?>">
                    </div>
                </div>
                   <div class="form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="social_btn" class="btn btn-success" >Save</button> 
                        </div>

                        <div id="socresults"></div>
                      </div>
                        </fieldset>
                      </form>

                      <script type="text/javascript">
                          var twiiter = $("#tw-login").attr('value');
                       if (twiiter === "false"){
                        $("#tw-enabled").removeClass('btn-success active')
                        $("#tw-disabled").addClass('btn-danger active');
                       }else if (twiiter === "true"){
                        $("#tw-disabled").removeClass('btn-danger active')
                        $("#tw-enabled").addClass('btn-success active');
                       }

                       var facebook = $("#fb-login").attr('value');
                       if (facebook === "false"){
                        $("#fb-enabled").removeClass('btn-success active')
                        $("#fb-disabled").addClass('btn-danger active');
                       }else if (facebook === "true"){
                        $("#fb-disabled").removeClass('btn-danger active')
                        $("#fb-enabled").addClass('btn-success active');
                       }

                       var google = $("#gp-login").attr('value');
                       if (google === "false"){
                        $("#gp-enabled").removeClass('btn-success active')
                        $("#gp-disabled").addClass('btn-danger active');
                       }else if (google === "true"){
                        $("#gp-disabled").removeClass('btn-danger active')
                        $("#gp-enabled").addClass('btn-success active');
                       }
                      </script>