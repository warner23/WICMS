 <form  class="form-horizontal" id="salt-form">

                        <fieldset>
                          <div id="legend">
                      <h3>Password Salt</h3>
                   
                    
                   <div class="form-group">
                        <!-- Button -->
                         <span class="help-block">
                            Please Note, change this will cause all current passwords NOT to work.<br />
                            <br />
                            It's <strong>recommended</strong> to  <strong>only</strong> change when first setting up.
                            
                        </span>
                  <input type="text" id="salt"  maxlength="88" name="salt" placeholder="Salt" class="input-xlarge form-control" value="<?php echo $site->Website_Info('password_salt')?>"> <br />                        </div>

                        <div id="results"></div>
                      </div>
                        </fieldset>
                      </form>

                    




