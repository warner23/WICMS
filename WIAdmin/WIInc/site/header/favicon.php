<style type="text/css">
  #header_content{
        width: 30%;
    margin-top: 20px;
  }

  #header_slogan{
        margin-top: -54px;
  }

  #wiupload{
    margin-left: 44px;
  }

  .on{
    display: block;
  }

  .off{
    display: none;
  }

  .logo {
    width: 322%;
    /* height: 70px; */
    float: left;
    margin-left: -19px;
    margin-top: 4px;
}
  img.hover { border: 2px solid black; }
</style>     
                   
                      <div id="legend">
                        <legend class="">Favicon Settings</legend>
                      </div>    

                        <?php $web->Favicon();  ?>



                    <div class="modal off" id="modal-favicon-edit">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WIMedia.closeFEdit()" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    <?php echo WILang::get('choose'); ?>
                  </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <div class="well">
                      <button onclick="WIMedia.changeiconPic()">Upload from WIMedia Library</button>
                      <button onclick="WIMedia.faviconupload()">upload from computer</button>
                    </div>
                </div>
                <div align="center" class="ajax-loading"><img src="WIMedia/Img/ ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-default" onclick="WIMedia.closeFEdit()" data-dismiss="modal" aria-hidden="true">
                      <?php echo WILang::get('cancel'); ?>
                    </a>

                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

           <div class="modal off" id="modal-favicon-media">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WIMedia.closeFMedia()" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    <?php echo WILang::get('Media_Lib'); ?>
                  </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <!-- <?php $img->faviconPics(); ?> -->
                    </div>
                </div>
                <div align="center" class="ajax-loading off"><img src="WIMedia/Img/ajax_loader.gif" /></div>
                <div class="modal-footer">

                    <a href="javascript:void(0);" onclick="WIMedia.closeFMedia()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      <?php echo WILang::get('cancel'); ?>
                    </a>

                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

           <div class="modal off" id="modal-favicon-upload">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WIMedia.closeFUpload()" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    <?php echo WILang::get('upload_logo'); ?>
                  </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <div class="col-lg-3 col-md-3 col-sm-2">
            <?php $site->faviconDisplay();  ?>
                        
                                
                   </div>
                </div>
                <div align="center" class="ajax-loading off"><img src="WIMedia/Img/ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WIMedia.closeFUpload()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      <?php echo WILang::get('cancel'); ?>
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

