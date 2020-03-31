                 <form  class="form-horizontal website">
                    <fieldset>
                      <div id="legend">
                        <legend class="center">Website Settings</legend>
                      </div>  

                      <div class="form-group">
                        <!-- website name -->
                        <div class="col-lg-4 col-xs-4 col-sm-s col-md-4">
                        <label class="control-label"  for="website_name">Website Name:</label>
                      </div>
                        <div class="controls col-lg-8">
                          <input type="text" id="website_name"  maxlength="88" name="website_name" placeholder="Website Name" class="input-xlarge form-control" value="<?php echo $site->Website_Info('site_name')?>"> <br />
                        </div>
                      </div>

                      <div class="alert alert-danger" id="dont_change">
                      <div class="form-group">
                        <!-- website domain-->
                        <div class="col-lg-4 col-xs-4 col-sm-s col-md-4">
                        <label class="control-label" for="website_domain">Website Domain:</label>
                      </div>
                        <div class="controls col-lg-8">
                          <input type="text" id="website_domain" maxlength="100" name="website_domain" placeholder="Website Domain" class="input-xlarge form-control" value="<?php echo $site->Website_Info('site_domain')?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <!-- website url-->
                        <div class="col-lg-4 col-xs-4 col-sm-s col-md-4">
                        <label class="control-label" for="website_url">Website Url:</label>
                      </div>
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
                        <div class="controls col-lg-offset-10 col-lg-2">
                           <button id="site_settings" class="btn btn-success">Save</button> 
                        </div>
                      </div>

                      <div class="results" id="wresults"></div>
                    </fieldset>
                  </form> 
                  