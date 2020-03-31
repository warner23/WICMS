
 <form  class="form-horizontal database-form" id="setup">
                      <fieldset>
                        <div id="legend">
                          <legend class="">Add Language</legend>
                        </div>

                        <div class="col-lg-12">
                        
       
                        
                        </div>
                       
                           <?php $web->viewLang(); ?>

                              <div class="form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="add_lang_btn" onclick="WILang.AddLangModal()" class="btn btn-success" >Add</button> 
                        </div>
                      </div>
                      <div class="results" id="results"></div>
                    </fieldset>
                        <br /><br />
                  </form>

             <div class="modal off" id="modal-lang-add">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WILang.Closer()" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    <?php echo WILang::get("add_lang"); ?>
                  </h4>
                </div>

                <div class="modal-body" id="details-body">
                    
                </div>
                <div align="center" class="ajax-loading"><img src="WIMedia/Img/ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WILang.Closer()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      <?php echo WILang::get("cancel"); ?>
                    </a>
                    <a href="javascript:void(0);" id="btn-add-user" class="btn btn-primary">
                      <?php echo WILang::get("add"); ?>
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

            <div class="modal off" id="modal-lang-add">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WILang.Close()" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    <?php echo WILang::get("add_lang"); ?>
                  </h4>
                </div>

                <div class="modal-body" id="details-body">
                     <form class="form-horizontal" id="add_lang">

                    
                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="lang">
                          <?php echo WILang::get("add_lang"); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="lang" name="lang" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                     
                  </form>
                </div>
                <div align="center" class="ajax-loading"><img src="WIMedia/Img/ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WILang.Close()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      <?php echo WILang::get("cancel"); ?>
                    </a>
                    <a href="javascript:void(0);" id="btn-add-language" onclick="WILang.AddLang();"  class="btn btn-primary">
                      <?php echo WILang::get("add"); ?>
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
      