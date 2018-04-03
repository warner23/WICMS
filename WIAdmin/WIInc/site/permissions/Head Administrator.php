 <form  class="form-horizontal" id="security-form">

                        <fieldset>
                          <div id="legend">
                      <h3>Password Encryption</h3>
                    <div class="alert alert-success" id="choice-wrapper-bcrypt">
                    <input type="hidden" name="encryption" id="encryption-method" value="<?php echo $site->Website_Info('password_encryption') ?>">
                           
                 <input type="hidden" name="encryption" id="encryption-cost" value="<?php echo $site->Website_Info('encryption_cost') ?>">

                     <input type="hidden" name="encryption" id="encryption-iteration" value="<?php echo $site->Website_Info('sha512_iterations') ?>">   
                        <div class="radio">
                              <input type="radio" name="encryption" id="encryption-bcrypt" value="bcrypt" checked>
                              Bcrypt
                        </div>
                        <br />
                        <span class="help-block">
                            Bcrypt is a key derivation function for passwords designed by Niels Provos and David Mazières, 
                            based on the Blowfish cipher, and presented at USENIX in 1999. <br />
                            <strong>Note:</strong> This method can be really slow if you choose cost greater than 15. <br />
                            It's <strong>recommended</strong> to choose cost between <strong>10</strong> and <strong>15</strong> 
                            to make balance between speed and security.<br />
                            Higher cost - slower but more secure.
                        </span>
                        <p>Cost</p>
                        <select class="form-control" name="bcrypt_cost" id="cost">
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                    
                    <div class="alert alert-error" id="choice-wrapper-sha">
                        <div class="radio">
                              <input type="radio" name="encryption" id="encryption-sha512" value="sha512">
                              SHA512
                        </div>  
                        <br />
                        <span class="help-block">
                            SHA-512 is one of cryptographic hash functions that belong to SHA2 family, designed by the U.S. National Security Agency (NSA) 
                            and published in 2001 by the NIST as a U.S. Federal Information Processing Standard. No security flaws identified. <br />
                             <strong>Note:</strong> This is very fast hash function, so if your priority is speed, this one you should choose. <br />
                             Its <strong>recommended</strong> to select number of iterations between <strong>30000</strong> and <strong>60000</strong>. <br />
                             More iterations - slower but more secure.
                        </span>
                        <p>Iterations</p>
                        <select class="form-control" name="sha512_iterations" id="costing">
                            <option value="10000">10000</option>
                            <option value="15000">15000</option>
                            <option value="20000">20000</option>
                            <option value="25000">25000</option>
                            <option value="30000">30000</option>
                            <option value="35000">35000</option>
                            <option value="40000">40000</option>
                            <option value="45000">45000</option>
                            <option value="50000">50000</option>
                            <option value="55000">55000</option>
                            <option value="60000">60000</option>
                            <option value="65000">65000</option>
                            <option value="70000">70000</option>
                            <option value="75000">75000</option>
                            <option value="80000">80000</option>
                            <option value="85000">85000</option>
                            <option value="90000">90000</option>
                            <option value="95000">95000</option>
                            <option value="10000">10000</option>
                        </select>
                    </div>
                </div>
                   <div class="control-group form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="security_btn" class="btn btn-success" onclick="WISecurity.encryption()" >Save</button> 
                        </div>
                      </div>
                        </fieldset>
                      </form>

  <script type="text/javascript">
               var encryption = $("#encryption-method").attr('value');

                          if (encryption === "bcrypt"){
                            $("#encryption-bcrypt").attr('checked', 'checked');
                            $("#choice-wrapper-bcrypt").addClass('alert-success');
                            $("#choice-wrapper-sha").addClass('alert-error');



                          }else if(encryption === "sha512"){
                            $("#encryption-sha512").attr('checked', 'checked');
                            $("#choice-wrapper-sha").addClass('alert-success');
                            $("#choice-wrapper-bcrypt").addClass('alert-error');

                          }

                          var cost = $("#encryption-cost").attr('value');
                         // alert(cost);
                          $("#cost").val(cost).prop("selected", "selected");


                          var iteration = $("#encryption-iteration").attr('value')
                          $("#costing").val(iteration).prop("selected", "selected");

                        
                      </script>
