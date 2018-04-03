 <form  class="form-horizontal database-form" id="database">
                      <fieldset>
                        <div id="legend">
                          <legend class="">Database Settings</legend>
                        </div>

                        <div class="alert alert-danger" id="dont_change">
                        <div class="form-group">
                            <label class="control-label col-lg-4" for='host'>Host:<span class="required">*</span></label>
                            <div class="controls col-lg-8">
                                <input type="text" id="host" class="input-xlarge form-control"  maxlength="88" placeholder="127.0.0.1" name="host" value="<?php echo $site->Website_Info('db_host');?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-4" for="db_username">Db Username:<span class="required">*</span></label>
                            <div class="controls col-lg-8">
                                <input type="text" id="db_username" class="input-xlarge form-control" maxlength="16" placeholder="Username" name="db_username" value="<?php echo $site->Website_Info('db_username')?>">
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-4" for="db_pass">Db Password: <span class="required">*</span></label>
                            <div class="controls col-lg-8">
                                <input type="password" id="db_pass" class="input-xlarge form-control" maxlength="16" placeholder="Password" name="db_pass" value="<?php echo $site->Website_Info('db_pass')?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-4" for="db">Database <span class="required">*</span></label>
                            <div class="controls col-lg-8">
                                <input type="text" id="db" class="input-xlarge form-control" maxlength="16" placeholder="Database" name="db" value="<?php echo $site->Website_Info('db_name')?>">
                            </div>
                        </div>

                         <span class="help-block">
                            Any changes to the database settings can cause your website not to work, problems with functionality and may even result in you having to <strong>re-install WICMS</strong>.<br>
                            It's <strong>recommended</strong> any changes should be done by a hosting administrator 
                        </span>

                    </div>
                              <div class="form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="database_btn" class="btn btn-success" >Save</button> 
                        </div>
                      </div>
                      <div class="results" id="dresults"></div>
                    </fieldset>
                        <br /><br />
                  </form>
                  