                 <form  class="form-horizontal website">
                    <fieldset>
                      <div id="legend">
                        <legend class="">Website Settings</legend>
                      </div>  

                      <div class="form-group">
                        <!-- Username -->
                        <label class="control-label col-lg-4"  for="website_name">Website Name:</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="website_name"  maxlength="88" name="website_name" placeholder="Website Name" class="input-xlarge form-control" value="<?php echo $site->Website_Info('site_name')?>"> <br />
                        </div>
                      </div>

                      <div class="alert alert-danger" id="dont_change">
                      <div class="form-group">
                        <!-- Password-->
                        <label class="control-label col-lg-4" for="website_domain">Website Domain:</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="website_domain" maxlength="100" name="website_domain" placeholder="Website Domain" class="input-xlarge form-control" value="<?php echo $site->Website_Info('site_domain')?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <!-- Password-->
                        <label class="control-label col-lg-4" for="website_url">Website Url:</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="website_url" maxlength="100" name="website_url" placeholder="Website Url" class="input-xlarge form-control" value="<?php echo $site->Website_Info('site_url')?>">
                        </div>
                      </div>

                      <br />
                        <span class="help-block">
                            Any changes to the domain settings can cause your website not to work, problems with functionality and may even result in you having to <strong>re-install WICMS</strong>.<br>
                            It's <strong>recommended</strong> any changes should be done by a hosting administrator 
                        </span>
                      </div>
                      
 
                      <div class="form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="site_settings" class="btn btn-success">Save</button> 
                        </div>
                      </div>

                      <div class="results" id="wresults"></div>
                    </fieldset>
                  </form> 
                  