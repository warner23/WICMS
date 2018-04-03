 <form  class="form-horizontal database-form" id="meta">
                      <fieldset>
                        <div id="legend">
                          <legend class="">Meta Settings</legend>
                        </div>

                        <div class="col-lg-12">
                         <div id="page_selector">
                          <select id="page_selection">
                          <?php $page->selectPage();   ?>
                          </select>
                           
                          </div>
                        <xmp  class="col-lg-12">
                        <meta name="" content="" author="" >
                        </xmp>
                        
                        
                        </div>

                       <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                         <label class="col-sm-4 col-md-4 col-lg-4 col-xs-4" for="Name">Name:<span class="required">*</span></label>

                         <label class="col-sm-4 col-md-4 col-lg-4 col-xs-4" for="Content">Content:<span class="required">*</span></label>

                         <label class="col-sm-4 col-md-4 col-lg-4 col-xs-4" for="Author">Author: <span class="required">*</span></label>

                       </div>
                       <div id="ViewMeta"></div>
                           

                              <div class="form-group">
                       
                        
                      </div>
                      <div class="results" id="meta_results"></div>
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
                    <form class="form-horizontal" id="edit-meta-form">


                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="meta_name">
                          <?php echo WILang::get('meta_name'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="meta_name" name="meta_name" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-lg-3" for="meta_content">
                          <?php echo WILang::get('meta_content'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="meta_content" name="meta_content" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>
                  </form>
                </div>
                <div align="center" class="ajax-loading hide"><img src="WIMedia/Img/ajax_loader.gif" /></div>
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
                    <form class="form-horizontal" id="add-meta-form">

                    
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
                <div align="center" class="ajax-loading"><img src="WIMedia/Img/ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WIMeta.Close()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      <?php echo WILang::get('cancel'); ?>
                    </a>
                    <a href="javascript:void(0);"  id="btn-add-meta" class="btn btn-primary">
                      <?php echo WILang::get('add'); ?>
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

           <script type="text/javascript">
                       $(document).ready(function(){

                        $('select').on('change', function() {
                           // alert( this.value );

                            WIMeta.changePage(this.value);

                          })
                       });
                     </script>