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
       $this->img = new WIImage();
       $this->site = new WISite();
       $this->people = new WIPeople();
    }

    public function NewMedia($ele_id,$preview_class, $preview_id)
    {
      if ($ele_id === "actors") {
         echo '<div class="modal hide" id="modal-'.$ele_id.'-details">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="WIActor.close(`' . $ele_id . '`);">&times;</button>
                  <h4 class="modal-title" id="modal-'.$ele_id.'">
                    Add Person
                  </h4>
                </div>
                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="add-'.$ele_id.'-form">


                       <div class="form-group">
                        <label class="control-label col-lg-3" for="addActor-image">
                           User Photo
                        </label>
                        <div class="'.$preview_class.'" id="'.$preview_id.'"></div>
                        <div class="well on" id="uploadOptions">
                      <a href="javascript:void(0);" class="btn media_manager" onclick="WIMedia.MediaManager(`'.$ele_id.'`, `'.$preview_id.'`, `personImgM`, `' . $preview_id . '`, `person`)">Upload from WIMedia Library</a>
                      <a href="javascript:void(0);" class="btn media_manager" onclick="WIMedia.dropAndDragUpload(`'.$ele_id.'`,`wi_theatre_person`, `person`,`person`,`new`)">upload from computer</a>
                    </div>
                        
                      </div>

                      <div class="form-group">
                        <label class="control-label col-lg-3" for="addPerson-name">
                          Name
                        </label>
                        <div class="control col-lg-9">
                          <input id="addPerson-name" name="addPerson-name" type="name" class="input-xlarge form-control" placeholder="Person\'s Name">
                        </div>
                      </div>

                      <div class="form-group">
                        
                          <label class="control-label col-lg-3" for="addPerson-name">
                          Date Of Birth
                        </label>
                        <div class="control col-lg-9">
                  <input id="datepicker" name="addPerson-dob" type="text" class="input-xlarge form-control" placeholder="Date Of Birth"></div>
                </div>
                  

                      <div class="form-group">
                        <label class="control-label col-lg-3" for="addPerson-bio">
                          Biography
                        </label>
                        <div class="control col-lg-9">
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
                    <a href="javascript:void(0);" class="btn btn-default" data-dismiss="modal" onclick="WIActor.close(`' . $ele_id . '`)" aria-hidden="true">
                      '; echo WILang::get('cancel'); echo '
                    </a>
                    <a href="javascript:void(0);" id="btn-add-user" onclick="WIActor.addPerson();" class="btn btn-primary">
                      ' .  WILang::get('add'). '
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /. actor details modal -->
          <script type="text/javascript">
            $(document).ready(function(){

              $( function() {

                jQuery.datepicker.setDefaults({dateFormat:"yy-mm-dd"});
              $( "#datepicker" ).datepicker({changeMonth: true, changeYear: true});
            } );

            $("#datepicker").change(function() {
              var date = $(this).datepicker("getDate");
              $("#datepicker").attr(`value`, date);
          });

        });</script>';
      }else if ($ele_id === "company") {
        echo '<div class="modal hide" id="modal-' . $ele_id . '-details">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="WICompany.close(`' . $ele_id . '`);">&times;</button>
                  <h4 class="modal-title" id="modal-actor">
                    Add Company
                  </h4>
                </div>
                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="add-' . $ele_id . '-form">

                      <div class="form-group">
                      <label class="control-label col-lg-3" for="addCompany-image">
                          Company Photo
                        </label>
                        <div class="'.$preview_class.'" id="'.$preview_id.'"></div>
                        <div class="well on" id="uploadOptions">
                      <a href="javascript:void(0);" class="btn media_manager" onclick="WIMedia.MediaManager(`'.$ele_id.'`, `'.$preview_id.'`, `companyImg`, `' . $preview_id . '`, `company`)">Upload from WIMedia Library</a>
                      <a href="javascript:void(0);" class="btn media_manager" onclick="WIMedia.dropAndDragUpload(`'.$ele_id.'`,`wi_theatre_company`, `company`,`company`,`new`)">upload from computer</a>
                    </div>
                        
                      </div>
                    </div>

                      <div class="form-group">
                        <label class="control-label col-lg-3" for="addCompany-name">
                          Name
                        </label>
                        <div class="controls col-lg-9">
                          <input id="addCompany-name" name="addCompany-name" type="name" class="input-xlarge form-control" placeholder="Companies Name">
                        </div>
                      </div>

                        <div class="form-group">
                          <label class="control-label col-lg-3" for="addCompany-address">
                          Address
                        </label>
                        <div class="controls col-lg-9">
                  <input id="addCompany-address" name="addCompany-address" type="text" class="input-xlarge form-control" placeholder="Companies Address">
                </div>
                </div>

                 <div class="form-group">
                          <label class="control-label col-lg-3" for="addCompany-country">
                          country
                        </label>
                        <div class="controls col-lg-9">
                        ';$this->site->countries(); echo '
                    </div>
                </div>
                  
                   
                      <div class="form-group">
                        <label class="control-label col-lg-3" for="addCompany-bio">
                          Biography
                        </label>
                        <div class="controls col-lg-9">
                          <textarea id="addCompany-bio" name="addCompany-bio" type="text" class="input-xlarge form-control" placeholder="Biographt"></textarea>
                        </div>
                      </div>

                      <hr>
                      <div id="AddCompanyResults"></div>
                     
                  </form>
                </div>
                <div align="center" class="ajax-loading"><img class="hide" src="WIMedia/Img/ajax_loader.gif" />
                </div>

                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-default" data-dismiss="modal" onclick="WICompany.close(`' . $ele_id . '`)" aria-hidden="true">
                      ' .  WILang::get(`cancel`) . '
                    </a>
                    <a href="javascript:void(0);" id="btn-add-company" onclick="WICompany.addCompanyInfo();" class="btn btn-primary">
                      ' .  WILang::get(`add`) . '
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->';
      }else if ($ele_id === "theatres") {
        echo '<div class="modal hide" id="modal-' . $ele_id .'-details">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="WITheatres.close(`' . $ele_id . '`);">&times;</button>
                  <h4 class="modal-title" id="modal-' . $ele_id .'">
                    Add Theatre
                  </h4>
                </div>
                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="add-' . $ele_id .'-form">

                      <div class="form-group">
                      <label class="control-label col-lg-3" for="addTheatre-image">
                          Theatre Photo
                        </label>
                       <div class="'.$preview_class.'" id="'.$preview_id.'"></div>
                        <div class="well on" id="uploadOptions">
                      <a href="javascript:void(0);" class="btn media_manager" onclick="WIMedia.MediaManager(`'.$ele_id.'`, `'.$preview_id.'`, `theatreImg`, `' . $preview_id . '`, `theatres`)">Upload from WIMedia Library</a>
                      <a href="javascript:void(0);" class="btn media_manager" onclick="WIMedia.dropAndDragUpload(`'.$ele_id.'`,`wi_theatres`, `theatres`,`theatres`,`new`)">upload from computer</a>
                    </div>
                        
                      </div>

                      <div class="form-group">
                        <label class="control-label col-lg-3" for="addTheatre-name">
                          Name
                        </label>
                        <div class="controls col-lg-9">
                          <input id="addTheatre-name" name="addTheatre-name" type="name" class="input-xlarge form-control" placeholder="Theatre\'s Name">
                        </div>
                      </div>

                         <!-- Form Name -->
          <legend>Address Details</legend>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Line 1</label>
            <div class="col-sm-10">
              <input type="text" id="line_one" placeholder="Address Line 1" class="form-control">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Line 2</label>
            <div class="col-sm-10">
              <input type="text" id="line_two" placeholder="Address Line 2" class="form-control">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">City</label>
            <div class="col-sm-10">
              <input type="text" id="city" placeholder="City" class="form-control">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">State</label>
            <div class="col-sm-4">
              <input type="text" id="region" placeholder="State" class="form-control">
            </div>

            <label class="col-sm-2 control-label" for="textinput">Postcode</label>
            <div class="col-sm-4">
              <input type="text" id="postcode" placeholder="Post Code" class="form-control">
            </div>
          </div>
                 <div class="form-group">
                          <label class="control-label col-lg-3" for="addTheatre-country">
                          country
                        </label>
                        <div class="controls col-lg-9">
                       '; $this->site->countries(); echo '

                    </div>
                </div>
                  
                   
                      <div class="form-group">
                        <label class="control-label col-lg-3" for="addTheatre-bio">
                          Biography
                        </label>
                        <div class="controls col-lg-9">
                          <textarea id="addTheatre-bio" name="addTheatre-bio" type="text" class="input-xlarge form-control" placeholder="Biographt"></textarea>
                        </div>
                      </div>

                      <hr>
                      <div id="AddTheatreResults"></div>
                     
                  </form>
                </div>
                <div align="center" class="ajax-loading"><img class="hide" src="WIMedia/Img/ajax_loader.gif" />
                </div>

                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-default" data-dismiss="modal" onclick="WITheatres.close(`' . $ele_id . '`)" aria-hidden="true">
                      '; echo WILang::get('cancel'); echo '
                    </a>
                    <a href="javascript:void(0);" id="btn-add-Theatre" onclick="WITheatres.addTheatreInfo();" class="btn btn-primary">
                      '; echo WILang::get('add'); echo '
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->';
      }else if ($ele_id === "shows") {
        echo '<div class="modal hide" id="modal-'.$ele_id.'-details">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="WIShows.close(`' . $ele_id . '`);">&times;</button>
                  <h4 class="modal-title" id="modal-'.$ele_id.'">
                    Add Shows
                  </h4>
                </div>
                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="add-'.$ele_id.'-form">

                      <label class="control-label col-lg-3" for="addCompany-image">
                          Show Photo
                        </label>
                        <div class="'.$preview_class.'" id="'.$preview_id.'"></div>
                        <div class="well on" id="uploadOptions">
                      <a href="javascript:void(0);" class="btn media_manager" onclick="WIMedia.MediaManager(`'.$ele_id.'`, `'.$preview_id.'`, `showImg`, `' . $preview_id . '`, `shows`)">Upload from WIMedia Library</a>
                      <a href="javascript:void(0);" class="btn media_manager" onclick="WIMedia.dropAndDragUpload(`'.$ele_id.'`,`wi_shows`, `shows`,`shows`,`new`)">upload from computer</a>
                    </div>

                      <div class="form-group">
                        <label class="control-label col-lg-3" for="addShows-name">
                          Name
                        </label>
                        <div class="controls col-lg-9"><span class="required">*</span>
                          <input id="addShows-name" name="addShows-name" type="text" class="input-xlarge form-control" placeholder="Shows\'s Name">
                        </div>
                      </div>

                        <label class="control-label col-lg-3" for="addShows-name">
                          Theatre & Location
                        </label>
                        <div class="controls col-lg-9"><span class="required">*</span>
                          <a href="javascript:void(0);" class="btn btn-primary show" id="findTheatres" onclick="WIShows.findTheatres()">Find Theatres</a>
                          <div id="theatres" class="hide"></div>                         
                        </div>

                        <label class="control-label col-lg-3" for="addShows-name">
                          Company
                        </label>
                        <div class="controls col-lg-9"><span class="required">*</span>
                          <a href="javascript:void(0);" class="btn btn-primary show" id="findCompanies" onclick="WIShows.findCompany()">Find Company</a>
                          <div id="company" class="hide"></div>                         
                        </div>
                  
                   
                      <div class="form-group">
                        <label class="control-label col-lg-3" for="addShows-bio">
                          Description
                        </label>
                        <div class="controls col-lg-9"><span class="required">*</span>
                          <textarea id="addShows-bio" name="addShows-bio" type="text" class="input-xlarge form-control" placeholder="Biographt"></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-lg-3" for="addShows-sdate">
                          Start Date
                        </label>
                        <div class="controls col-lg-9"><span class="required">*</span>
                          <input id="datepickersdate" name="addShows-sdate" type="text" class="input-xlarge form-control" placeholder="Shows\'s Name">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-lg-3" for="addShows-fdate">
                          End Date
                        </label>
                        <div class="controls col-lg-9"><span class="required">*</span>
                          <input id="datepickerfdate" name="addShows-fdate" type="text" class="input-xlarge form-control" placeholder="Shows\'s Name">
                        </div>
                      </div>

                      <hr>
                      <div id="AddShowsResults"></div>
                     
                  </form>
                </div>
                <div align="center" class="ajax-loading"><img class="hide" src="WIMedia/Img/ajax_loader.gif" />
                </div>

                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-default" data-dismiss="modal" onclick="WIShows.close(`' . $ele_id . '`)" aria-hidden="true">
                      <?php echo WILang::get(`cancel`); ?>
                    </a>
                    <a href="javascript:void(0);" id="btn-add-Shows" onclick="WIShows.addShowsInfo();" class="btn btn-primary">
                      <?php echo WILang::get(`add`); ?>
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
            <script type="text/javascript">
  $(document).ready(function(){



 $( function() {
    jQuery.datepicker.setDefaults({dateFormat:"yy-mm-dd"});
    $( "#datepickersdate" ).datepicker({changeMonth: true, changeYear: true});
  } );

  $("#datepickersdate").change(function() {
    var date = $(this).datepicker("getDate");
    $("#datepickersdate").attr(`value`, date);
});

   $( function() {
    jQuery.datepicker.setDefaults({dateFormat:"yy-mm-dd"});
    $( "#datepickerfdate" ).datepicker({changeMonth: true, changeYear: true});
  } );

  $("#datepickerfdate").change(function() {
    var date = $(this).datepicker("getDate");
    $("#datepickerfdate").attr(`value`, date);
});

});
</script>';
      }
      else if ($ele_id === "casting") {
        echo '<div class="modal hide" id="modal-'.$ele_id.'-details">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="WICast.close(`' . $ele_id . '`);">&times;</button>
                  <h4 class="modal-title" id="modal-'.$ele_id.'">
                    Create Cast
                  </h4>
                </div>
                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="add-'.$ele_id.'-form">

   
                        <label class="control-label-cast" for="addShows-name">
                          Find Show
                        </label>
                        <div class="cast_control"><span class="required">*</span>
                          <a href="javascript:void(0);" class="btn btn-primary findingShow" id="findShow" onclick="WICast.findShow()">Find Show</a>
                          <div id="foundShow" class="hide"></div>                         
                        </div>

                        <label class="control-label-cast" for="addShows-name">
                          Find Person
                        </label>
                        <div class="cast_control"><span class="required">*</span>
                          <a href="javascript:void(0);" class="btn btn-primary actor" id="findPeople" onclick="WICast.findActor()">Find Person</a>
                          <div id="Actor" class="hide"></div>                         
                        </div>
                  

                        
                      <hr>
                      <div id="AddCastingResults">
                     
                      <div id="confirm"></div>
                      </div>
                     
                  </form>
                </div>
                <a href="javascript:void(0);" id="btn-add-Shows" onclick="WICast.addCastMemeber();" class="btn btn-primary">
                      Add Cast Member
                    </a>

                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-default" data-dismiss="modal" onclick="WICast.close(`' . $ele_id . '`)" aria-hidden="true">
                      ' . WILang::get(`cancel`) . '
                    </a>
                    <a href="javascript:void(0);" id="btn-add-Shows" onclick="WICast.close(`' . $ele_id . '`)" class="btn btn-primary">
                      Done
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->';
      }else if ($ele_id === "crew") {
        echo '<div class="modal hide" id="modal-'.$ele_id.'-details">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="WICrew.close(`' . $ele_id . '`);">&times;</button>
                  <h4 class="modal-title" id="modal-'.$ele_id.'">
                    Create Crew
                  </h4>
                </div>
                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="add-'.$ele_id.'-form">

   
                        <label class="control-label-cast" for="addShows-name">
                          Find Show
                        </label>
                        <div class="cast_control"><span class="required">*</span>
                          <a href="javascript:void(0);" class="btn btn-primary findingShow" id="findShow" onclick="WICrew.findShow()">Find Show</a>
                          <div id="foundShow" class="hide"></div>                         
                        </div>

                        <label class="control-label-cast" for="addShows-name">
                          Find Person
                        </label>
                        <div class="cast_control"><span class="required">*</span>
                          <a href="javascript:void(0);" class="btn btn-primary actor" id="findPeople" onclick="WICrew.findCrew()">Find Person</a>
                          <div id="Crew" class="hide"></div>                         
                        </div>
                  

                        
                      <hr>
                      <div id="AddCrewResults">
                     
                      <div id="confirm"></div>
                      </div>
                     
                  </form>
                </div>
                <a href="javascript:void(0);" id="btn-add-Shows" onclick="WICrew.addCrewMemeber();" class="btn btn-primary">
                      Add Crew Member
                    </a>

                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-default" data-dismiss="modal" onclick="WICrew.close(`' . $ele_id . '`)" aria-hidden="true">
                      ' . WILang::get(`cancel`) . '
                    </a>
                    <a href="javascript:void(0);" id="btn-add-Shows" onclick="WICrew.close(`' . $ele_id . '`)" class="btn btn-primary">
                      Done
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->';
      }
     
    }

    public function MediaCenter($class_selector, $folder, $img_selector, $photo_class, $img_id_selector)
    {
      echo ' <div class="modal off" id="modal-'.$class_selector.'-media">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header new_person">
                  <button type="button" class="close" onclick="WIMedia.closeMedia(`'.$class_selector.'`)" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">' . WILang::get('Media_Lib') . '
                  </h4>
                </div>

                <div class="modal-body" id="person-body">'; echo $this->img->UploadedPics($folder, $class_selector); echo '
                </div>
                <div align="center" class="ajax-loading off"><img src="WIMedia/Img/ajax_loader.gif" /></div>
                <div class="modal-footer">

                    <a href="javascript:void(0);" onclick="WIMedia.closeMedia(`'.$class_selector.'`)" class="btn btn-default" data-dismiss="modal" aria-hidden="true">'.  WILang::get('cancel'). '
                    </a>

                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
          <script type="text/javascript">
            $(document).ready(function(){

            
  $("img").on(`click`, function() {      
    //$(this).toggleClass("hover");
    var id = $(this).attr("id");
    var selector = $(this).attr("name");
    var folder = $(this).attr("value");
    var ele_id = "' . $img_id_selector . '";
    var img_selector = "' . $img_selector . '";
    var photo_class = "'. $photo_class. '";
    WIMedia.changePhoto(id, selector, folder, ele_id, img_selector, photo_class);
  });
  });</script>';
    }

    public function UploadMedia($ele_id, $table, $folder , $id_selector, $img_selector)
    {
      echo '<div class="modal off" id="modal-' . $ele_id . '-upload">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WIMedia.closeUpload(`' . $ele_id . '`)" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                              Photo
                    </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <div class="upload">';
             $this->site->ImageUploadDisplay($table, $id_selector , $folder, $ele_id, $img_selector); echo '         
                   </div>
                </div>
                <div align="center" class="ajax-loading off"><img src="WIMedia/Img/ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WIMedia.closeUpload(`actor`)" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      ' .  WILang::get('cancel'). '
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->';
    }

    public function BulkImageUpload( $ele_id, $folder , $id_selector, $img_selector)
    {
      echo '<div class="modal off" id="modal-' . $ele_id . '-upload">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WIMedia.closeUpload(`' . $ele_id . '`)" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                              Bulk Image Uploader
                    </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <div class="upload">';
             $this->site->BulkImageUploader( $ele_id , $folder, $id_selector, $img_selector); echo '         
                   </div>
                </div>
                <div align="center" class="ajax-loading off"><img src="WIMedia/Img/ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WIMedia.closeUpload(`actor`)" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      ' .  WILang::get('cancel'). '
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->';
    }


        public function UploadCSV($table, $ele_id, $folder , $id_selector, $img_selector)
    {
      echo '<div class="modal off" id="modal-' . $ele_id . '-upload">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WIMedia.closeUpload(`' . $ele_id . '`)" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                              CSV
                    </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <div class="upload">';
             $this->site->CSVUploadDisplay($table, $ele_id , $folder, $id_selector, $img_selector); echo '         
                   </div>
                </div>
                <div align="center" class="ajax-loading off"><img src="WIMedia/Img/ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WIMedia.closeUpload(`actor`)" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      ' .  WILang::get('cancel'). '
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->';
    }



     public function findActor($ele_id)
    {
      echo '<div class="modal off" id="modal-' . $ele_id . '-selector">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WIMedia.clos(`' . $ele_id . '`)" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                              Photo
                    </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <div class="people">';
             $this->people->findCasting(); echo '
                        
                                
                   
                </div>
                <div align="center" class="ajax-loading off"><img src="WIMedia/Img/ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WIMedia.closeUpload(`actor`)" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      ' .  WILang::get('cancel'). '
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->';
    }

         public function findCastingActor($ele_id, $id, $show_id)
    {
      echo '<div class="modal off" id="modal-' . $ele_id . '-selector">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WIMedia.clos(`' . $ele_id . '`)" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                              Photo
                    </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <div class="people">';
             $this->people->findEditCasting($id, $show_id); echo '
                        
                                
                   
                </div>
                <div align="center" class="ajax-loading off"><img src="WIMedia/Img/ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WIMedia.closeUpload(`actor`)" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      ' .  WILang::get('cancel'). '
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->';
    }


    public function UploadTrailerMedia($ele_id, $table, $folder , $id_selector, $img_selector, $show_id, $theatre_id)
    {
      echo '<div class="modal off" id="modal-' . $ele_id . '-upload">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WIMedia.closeUpload(`' . $ele_id . '`)" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                              Trailer Upload
                    </h4>
                </div>

                <div class="modal-body" id="details-trailer-body">
                    <div class="upload">';
             $this->site->TrailerUploadDisplay($table, $id_selector , $folder, $ele_id, $img_selector); echo '</div>
                       <span class="or"> OR</span> <div class="youtube"> <div class="form-group">
                        <label class="control-label-trailer col-lg-12" for="addshow-trailer">
                          Paste Embed code from youtube
                        </label>
                        <div class="controls col-lg-12">
                          <textarea id="addshow-trailer" name="addshow-trailer" type="text" class="input-xlarge form-control" placeholder="<iframe width=`560` height=`315` src=`https://www.youtube.com/embed/pDZu6H_pxA` frameborder=`0` allow=`autoplay; encrypted-media` allowfullscreen></iframe>"></textarea>
                        </div>
                      </div>
                      </div>
                   
                </div>
                <div align="center" class="ajax-loading off"><img src="WIMedia/Img/ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WIMedia.closeUpload(`actor`)" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      ' .  WILang::get('cancel'). '
                    </a>
                    <a href="javascript:void(0);" id="btn-add-user" onclick="WIShows.addTrailer(' . $show_id . ', ' . $theatre_id . ');" class="btn btn-primary">
                      ' .  WILang::get('add'). '
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->';
    }

   
}