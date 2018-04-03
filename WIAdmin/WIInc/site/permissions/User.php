 <form  class="form-horizontal UPermission-form" id="UPermission">
                      <fieldset>
                        <div id="legend">
                          <legend class="">User Permissions</legend>
                        </div>


                        <div class="form-group">
                           
                           <label>Edit Site</label>
                    <div class="btn-group" id="session_secure_only" data-toggle="buttons-radio">
                        <input type="hidden" name="edit_site" id="edit_site" class="btn-group-value" value="<?php echo $site->Website_Info('edit_site')?>"/>
                        <button type="button" id="edit_site_true" name="edit_site" value="true"  class="btn">yes</button>
                        <button type="button" id="edit_site_false" name="edit_site" value="false" class="btn btn-danger activewhens" >No</button>
                    </div>
                </div>

                    <span class="help-block">Select <strong>Yes</strong> if you are using HTTPS.</span>

                       
                              <div class="form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="database_btn" class="btn btn-success" >Save</button> 
                        </div>
                      </div>
                      <div class="results" id="results"></div>
                    </fieldset>
                        <br /><br />
                  </form>


                   <script type="text/javascript">
                       var edit = $("#edit_site").attr('value');
                       if (edit === "false"){
                        $("#edit_site_true").removeClass('btn-success active')
                        $("#edit_site_false").addClass('btn-danger active');
                       }else if (edit === "true"){
                        $("#edit_site_false").removeClass('btn-danger active')
                        $("#edit_site_true").addClass('btn-success active');
                       }

                   </script>
                  