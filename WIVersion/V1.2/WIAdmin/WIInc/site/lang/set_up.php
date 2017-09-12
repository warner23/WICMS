<style type="text/css">
   img.hover { border: 2px solid black; }

</style>
 <form  class="form-horizontal database-form" id="meta">
                      <fieldset>
                        <div id="legend">
                          <legend class="">Add Language</legend>
                        </div>

                        <div class="col-lg-12" id="resfresh">
                        
                       
                           <?php $web->viewLang(); ?>
                                                   </div>


                              <div class="control-group form-group">
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
                    <?php echo WILang::get('add_lang'); ?>
                  </h4>
                </div>

                <div class="modal-body" id="details-body">
                   <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="country_name">
                          <?php echo WILang::get('country'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="country_name" name="country_name" type="text" class="input-xlarge form-control" >
                        </div>

                         <label class="control-label col-lg-3" for="country_code">
                          <?php echo WILang::get('country_code'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="country_code" name="country_code" type="text" class="input-xlarge form-control" >
                        </div>


                        <img class="addFlag" src="WIMedia/Img/placeholder.jpg" style="width:120px;height: 120px">
                        <button onclick="WILang.AddFlag()">add Flag image</button>

                      </div>
                </div>
                <div id="addcountry"></div>
                <div align="center" class="ajax-loading off">
                <img src="WIMedia/Img/ajax_loader.gif" />
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WILang.Closer()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      <?php echo WILang::get('cancel'); ?>
                    </a>
                    <a href="javascript:void(0);" onclick="WILang.saveLang()" id="btn-add-user" class="btn btn-primary">
                      <?php echo WILang::get('add'); ?>
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->


            <div class="modal off" id="modal-lang-edit">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WILang.Close()" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    <?php echo WILang::get('change_lang'); ?>
                  </h4>
                </div>

                <div class="modal-body" id="details-body">

                <div id="langInfo"></div>
                     
                      <div class="control-group form-group" id="langInfo">
   
                      
                         


                      </div>

                     
                 
                </div>
                <div align="center" class="ajax-loading off"><img src="<?php echo $WI['theme_dir'] ?><?php echo $WI['img_admin'] ?>ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WILang.Close()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      <?php echo WILang::get('cancel'); ?>
                    </a>
                    <a href="javascript:void(0);" id="btn-add-language" onclick="WILang.AdeditteddLang();"  class="btn btn-primary">
                      <?php echo WILang::get('save'); ?>
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->


           <div class="modal off" id="modal-lang-editPic">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WILang.closeEdit()" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    <?php echo WILang::get('choose'); ?>
                  </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <div class="well">
                      <button onclick="WILang.editLmedia()">Upload from WIMedia Library</button>
                      <button onclick="WILang.Lupload()">upload from computer</button>
                    </div>
                </div>
                <div align="center" class="ajax-loading"><img src="WIMedia/Img/ ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-default" onclick="WIMedia.closeEdit()" data-dismiss="modal" aria-hidden="true">
                      <?php echo WILang::get('cancel'); ?>
                    </a>

                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->


                     <div class="modal off" id="modal-lang-addPic">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WILang.closeEdit()" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    <?php echo WILang::get('choose'); ?>
                  </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <div class="well">
                      <button onclick="WILang.addmedia()">Upload from WIMedia Library</button>
                      <button onclick="WILang.upload()">upload from computer</button>
                    </div>
                </div>
                <div align="center" class="ajax-loading"><img src="WIMedia/Img/ ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-default" onclick="WIMedia.closeEdit()" data-dismiss="modal" aria-hidden="true">
                      <?php echo WILang::get('cancel'); ?>
                    </a>

                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

           <div class="modal off" id="modal-lang-media-edit">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WIMedia.closeMedia()" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    <?php echo WILang::get('Media_Lib'); ?>
                  </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <?php $img->LangPics(); ?>
                    </div>
                </div>
                <div align="center" class="ajax-loading off"><img src="WIMedia/Img/ajax_loader.gif" /></div>
                <div class="modal-footer">

                    <a href="javascript:void(0);" onclick="WIMedia.closeMedia()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      <?php echo WILang::get('cancel'); ?>
                    </a>

                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->


           <div class="modal off" id="modal-lang-media-add">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WILang.closeaddMedia()" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    <?php echo WILang::get('Media_Lib'); ?>
                  </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <?php $img->LangPics(); ?>
                    </div>
                </div>
                <div align="center" class="ajax-loading off"><img src="WIMedia/Img/ajax_loader.gif" /></div>
                <div class="modal-footer">

                    <a href="javascript:void(0);" onclick="WILang.closeaddMedia()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      <?php echo WILang::get('cancel'); ?>
                    </a>

                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

           <div class="modal off" id="modal-lang-upload">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WILang.closeUpload()" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    <?php echo WILang::get('upload_logo'); ?>
                  </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <div class="col-lg-3 col-md-3 col-sm-2">
            <?php $web->langDisplay();  ?>
                        
                                
                   </div>
                </div>
                <div align="center" class="ajax-loading off"><img src="WIMedia/Img/ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WILang.closeUpload()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      <?php echo WILang::get('cancel'); ?>
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->