
 <form  class="form-horizontal database-form" id="meta">
                      <fieldset>
                        <div id="legend">
                          <legend class="">CSS Settings</legend>
                        </div>

                        <div class="col-lg-12">
                        
                        <xmp>
                        <link rel="" type="text/css" href="">
                        </xmp>
       
                        
                        </div>
                       
                           <?php $web->ViewCSS(); ?>

                              <div class="control-group form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="show_css_btn" onclick="WICSS.showCssModal()" class="btn btn-success" >Add</button> 
                        </div>
                      </div>
                      <div class="results" id="results"></div>
                    </fieldset>
                        <br /><br />
                  </form>

             <div class="modal off" id="modal-css-add">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    <?php echo WILang::get('edit_css'); ?>
                  </h4>
                </div>

                <div class="modal-body" id="details-body">
                     <form class="form-horizontal" id="add-user-form">


                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="css">
                          <?php echo WILang::get('css_name'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="css" name="css" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>
                  </form>
                </div>
                <div align="center" class="ajax-loading"><img src="<?php echo $WI['theme_dir'] ?><?php echo $WI['img_admin'] ?>ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WICSS.Close()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      <?php echo WILang::get('cancel'); ?>
                    </a>
                    <a href="javascript:void(0);" id="btn-add-css" onclick="WICSS.addCSS()" class="btn btn-primary">
                      <?php echo WILang::get('add'); ?>
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->