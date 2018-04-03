 <form  class="form-horizontal trans-form" id="del">
                      <fieldset>
                        <div id="legend">
                          <legend class="">Script Settings</legend>
                        </div>

                        <div class="col-lg-12">
                        
                        <xmp>
                             <script src=""></script>
                        </xmp>
       
                        
                        </div>
                       
                           <?php $web->ViewJS(); ?>

                              <div class="control-group form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="database_btn" class="btn btn-success" >Add</button> 
                        </div>
                      </div>
                      <div class="results" id="delresults"></div>
                    </fieldset>
                        <br /><br />
                  </form>

             <div class="modal off" id="modal-js-edit">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    <?php echo WILang::get('add_user'); ?>
                  </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="add-user-form">
                      <input type="hidden" id="adduser-userId" />
                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="adduser-email">
                          <?php echo WILang::get('email'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="adduser-email" name="adduser-email" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="adduser-username">
                          <?php echo WILang::get('username'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="adduser-username" name="adduser-username" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="adduser-password">
                          <?php echo WILang::get('password'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="adduser-password" name="adduser-password" type="password" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="adduser-confirm_password">
                          <?php echo WILang::get('repeat_password'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="adduser-confirm_password" name="adduser-confirm_password" type="password" class="input-xlarge form-control" >
                        </div>
                      </div>
                      <hr>
                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="adduser-first_name">
                          <?php echo WILang::get('first_name'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="adduser-first_name" name="adduser-first_name" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>
                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="adduser-last_name">
                          <?php echo WILang::get('last_name'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="adduser-last_name" name="adduser-last_name" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>
                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="adduser-address">
                          <?php echo WILang::get('address'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="adduser-address" name="adduser-address" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>
                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="adduser-phone">
                          <?php echo WILang::get('phone'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="adduser-phone" name="adduser-phone" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>
                  </form>
                </div>
                <div align="center" class="ajax-loading"><img src="<?php echo $WI['theme_dir'] ?><?php echo $WI['img_admin'] ?>ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      <?php echo WILang::get('cancel'); ?>
                    </a>
                    <a href="javascript:void(0);" id="btn-add-user" class="btn btn-primary">
                      <?php echo WILang::get('add'); ?>
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->