
 <form  class="form-horizontal database-form" id="css">
                      <fieldset>
                        <div id="legend">
                          <legend class="">CSS Settings</legend>
                        </div>

                        <div class="col-lg-12">
                        
                        <div id="page_selector">
                          <select id="page_selection_css">
                          <?php $page->selectPage();   ?>
                          </select>
                           
                          </div>

                        <xmp>
                        <link rel="" type="text/css" href="">
                        </xmp>
                          
                        </div>

                         <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                         <label class="col-sm-7 col-md-7 col-lg-7 col-xs-7" for="Href">Href:<span class="required">*</span></label>

                         <label class="col-sm-4 col-md-4 col-lg-4 col-xs-4" for="rel">Rel:<span class="required">*</span></label>


                       </div>
                       <div id="Viewcss"></div>
                       

                              <div class="control-group form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="show_css_btn" onclick="WICSS.showCssModal()" class="btn btn-success" >Add</button> 
                        </div>
                      </div>
                      <div class="css_results" id="css_results"></div>
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
                     <form class="form-horizontal" id="edit-css-modal">


                      <div class="form-group">
                        <label class="control-label col-lg-3" for="css">
                          <?php echo WILang::get('css_name'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="css" name="css" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>
                  </form>
                </div>
                <div align="center" class="ajax-loading hide"><img src="WIAdmin/WIMedia/Img/ajax_loader.gif" /></div>
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

           <script type="text/javascript">
                       $(document).ready(function(){

                        $('select').on('change', function() {
                           // alert( this.value );

                            WICSS.changePage(this.value);

                          })
                       });
                     </script>