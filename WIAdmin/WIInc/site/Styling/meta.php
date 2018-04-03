 <form  class="form-horizontal database-form" id="meta">
                      <fieldset>
                        <div id="legend">
                          <legend class="">Meta Settings</legend>
                        </div>

                        <div class="col-lg-12">
                        
                        <xmp class="col-lg-12">
                        <meta name="" content="" author="" >
                        </xmp>
       
                        
                        </div>
                       
                           <?php $web->ViewMeta(); ?>

                              <div class="form-group">
                        <!-- Button -->
                        <div class="col-lg-3 col-sm-3 col-md-3">
                           <button id="add_meta_btn" onclick="WIMeta.AddMetaModal()" class="btn btn-success" >Add</button> 
                        </div>
                      </div>
                      <div class="results" id="metaresults"></div>
                    </fieldset>
                        <br /><br />
                  </form>

             <div class="modal off" id="modal-meta-edit">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WIMeta.Close()" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    <?php echo WILang::get('edit_meta'); ?>
                  </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="add-user-form">


                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="meta_name">
                          <?php echo WILang::get('meta_name'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="meta_name" name="meta_name" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="meta_content">
                          <?php echo WILang::get('meta_content'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="meta_content" name="meta_content" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="adduser-password">
                          <?php echo WILang::get('meta_author'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="adduser-password" name="adduser-password" type="password" class="input-xlarge form-control" >
                        </div>
                      </div>

                     
                  </form>
                </div>
                <div align="center" class="ajax-loading"><img src="<?php echo $WI['theme_dir'] ?><?php echo $WI['img_admin'] ?>ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WIMeta.Close()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      <?php echo WILang::get('cancel'); ?>
                    </a>
                    <a href="javascript:void(0);"  id="btn-add-user" class="btn btn-primary">
                      <?php echo WILang::get('add'); ?>
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

                       <div class="modal off" id="modal-meta-add">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WIMeta.Close()" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    <?php echo WILang::get('add_meta'); ?>
                  </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="add-user-form">

                    
                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="meta_name">
                          <?php echo WILang::get('meta_name'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="meta_name" name="meta_name" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="meta_content">
                          <?php echo WILang::get('meta_content'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="meta_content" name="meta_content" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="adduser-password">
                          <?php echo WILang::get('meta_author'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="adduser-password" name="adduser-password" type="password" class="input-xlarge form-control" >
                        </div>
                      </div>

                     
                  </form>
                </div>
                <div align="center" class="ajax-loading"><img src="<?php echo $WI['theme_dir'] ?><?php echo $WI['img_admin'] ?>ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WIMeta.Close()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      <?php echo WILang::get('cancel'); ?>
                    </a>
                    <a href="javascript:void(0);"  id="btn-add-user" class="btn btn-primary">
                      <?php echo WILang::get('add'); ?>
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->