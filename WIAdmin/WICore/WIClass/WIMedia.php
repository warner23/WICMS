<?php

/**
* Media Class
* Created by Warner Infinity
* Author Jules Warner
*/

class WIMedia
{
	function __construct() {
       $this->WIdb = WIdb::getInstance();
    }

    public function NewMedia()
    {
      echo '<div class="modal hide" id="modal-actors-details">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="WIActor.close();">&times;</button>
                  <h4 class="modal-title" id="modal-actor">
                    Add Person
                  </h4>
                </div>
                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="add-actor-form">


                       <div class="form-group">
                        <label class="control-label col-lg-3" for="addActor-image">
                           User Photo
                        </label>
                        <div class="img-responsive" id="preview"></div>
                        <div class="well on" id="uploadOptions">
                      <a href="javascript:void(0);" class="btn" onclick="WIMedia.MediaManager(`acto`)">Upload from WIMedia Library</a>
                      <a href="javascript:void(0);" class="btn" onclick="WIMedia.dropAndDragUpload(`actor`)">upload from computer</a>
                    </div>
                        
                      </div>

                      <div class="form-group">
                        <label class="control-label col-lg-3" for="addPerson-name">
                          Name
                        </label>
                        <div class="controls col-lg-9">
                          <input id="addPerson-name" name="addPerson-name" type="name" class="input-xlarge form-control" placeholder="Person\'s Name">
                        </div>
                      </div>

                      <div class="form-group">
                        
                          <label class="control-label col-lg-3" for="addPerson-name">
                          Date Of Birth
                        </label>
                        <div class="controls col-lg-9">
                  <input id="datepicker" name="addPerson-dob" type="text" class="input-xlarge form-control" placeholder="Date Of Birth"></div>
                </div>
                  

                      <div class="form-group">
                        <label class="control-label col-lg-3" for="addPerson-bio">
                          Biography
                        </label>
                        <div class="controls col-lg-9">
                          <textarea id="addPerson-bio" name="addPerson-bio" type="text" class="input-xlarge form-control" placeholder="Biography"></textarea>
                        </div>
                      </div>

                      <hr>
                      <div id="AddPersonResults"></div>
                     
                  </form>
                </div>
                <div align="center" class="ajax-loading"><img class="hide" src="WIMedia/Img/ajax_loader.gif" />
                </div>

                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-default" data-dismiss="modal" onclick="WIActor.close()" aria-hidden="true">
                      <?php echo WILang::get(`cancel`); ?>
                    </a>
                    <a href="javascript:void(0);" id="btn-add-user" onclick="WIActor.addPerson();" class="btn btn-primary">
                      <?php echo WILang::get(`add`); ?>
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /. actor details modal -->';
    }

    public function MediaCenter()
    {
      echo ' <div class="modal off" id="modal-actor-media">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WIMedia.closeMedia(`actor`)" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    <?php echo WILang::get(`Media_Lib`); ?>
                  </h4>
                </div>

                <div class="modal-body" id="person-body">
                     <!--  <?php $img->UploadedPics(`person`);?> -->
                </div>
                <div align="center" class="ajax-loading off"><img src="WIMedia/Img/ajax_loader.gif" /></div>
                <div class="modal-footer">

                    <a href="javascript:void(0);" onclick="WIMedia.closeMedia(`actor`)" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      <?php echo WILang::get(`cancel`); ?>
                    </a>

                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->';
    }

    public function UploadMedia()
    {
      echo '<div class="modal off" id="modal-actor-upload">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WIMedia.closeUpload(`actor`)" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                              Photo
                    </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <div class="col-lg-3 col-md-3 col-sm-2">
            <?php $site->ImageUploadDisplay(`wi_theatre_person`, `person`, `person`);  ?>
                        
                                
                   </div>
                </div>
                <div align="center" class="ajax-loading off"><img src="WIMedia/Img/ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WIMedia.closeUpload(`actor`)" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      <?php echo WILang::get(`cancel`); ?>
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->';
    }

   
}