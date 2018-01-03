 <form  class="form-horizontal database-form" id="js">
                      <fieldset>
                        <div id="legend">
                          <legend class="">Script Settings</legend>
                        </div>

                        <div class="col-lg-12">
                        
                         <div id="page_selector">
                          <select id="page_selection_js">
                          <?php $page->selectPage();   ?>
                          </select>
                           
                          </div>

                        <xmp>
                             <script src=""></script>
                        </xmp>
       
                        
                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                         <label class="col-sm-10 col-md-10 col-lg-10 col-xs-10" for="Href">Href:<span class="required">*</span></label>


                       </div>
                       <div id="Viewjs"></div>
                       
                              <div class="control-group form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="add_script_btn" class="btn btn-success" >Add</button> 
                        </div>
                      </div>
                      <div class="results" id="js_results"></div>
                    </fieldset>
                        <br /><br />
                  </form>

             <div class="modal off" id="modal-js-edit">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WIJS.Close()" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    <?php echo WILang::get('editJs'); ?>
                  </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="edit-js-form">
                      <input type="hidden" id="editJs" />
                      
                
                      <hr>
                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="editjs-src">
                          <?php echo WILang::get('src'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="editjs-src" name="editjs-src" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>
                      
                  </form>
                </div>
                <div align="center" class="ajax-loading hide"><img src="WIMedia/Img/ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WIJS.Close()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      <?php echo WILang::get('cancel'); ?>
                    </a>
                    <a href="javascript:void(0);" id="btn-add-user" class="btn btn-primary">
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

                            WIJS.changePage(this.value);

                          })
                       });
                     </script>