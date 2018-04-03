 <form  class="form-horizontal" id="salt-form">

                        <fieldset>
                          <div id="legend">
                      <h3>Password Salt</h3>
                   
                    
                   <div class="form-group">
                        <!-- Button -->
                        <div class="alert alert-danger" id="dont_change">
                         
                  <input type="text" id="salt"  maxlength="88" name="salt" placeholder="Salt" class="input-xlarge form-control" value="<?php echo $site->Website_Info('password_salt')?>"> <br /> 

                  <span class="help-block">
                            Please Note, change this will cause all current passwords NOT to work.<br />
                            <br />
                            It's <strong>recommended</strong> to  <strong>only</strong> change when first setting up.
                            
                        </span>  
                  </div> 

                  <div class="form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="salt_settings" class="btn btn-success">Save</button> 
                        </div>
                      </div>                    
                </div>


                        <div id="sresults"></div>
                      </div>
                        </fieldset>
                      </form>

                    




