<style type="text/css">
  .zapfino {
    font-family: 'LinotypeZapfino One', arial;
    font-size: 65px;
    text-shadow: 4px 4px 4px #aaa;
    background-color: #2438BB;
    border: 2px solid blue;
    width: 100%;
    height: 95px;
    margin-left: 0px;
    text-align: -webkit-center;
    color: white;
}

.slogan {
    font-size: 20px;
    float: right;
    margin-top: 56px;
    margin-left: -126px;
    margin-right: 14px;
}

.proheader {
    width: 99%;
    height: 137px;
    margin-left: 0px;
}

.profile_picture {
    width: 9%;
    height: 79px;
    margin-left: 15px;
    margin-top: -97px;
    border-radius: 78%;
}

.profile {
    width: 100%;
    height: 93px;
    border-radius: 46px;
    margin-top: -21px;
}

.profile_section {
    width: 100%;
    height: auto;
    border-radius: 46px;
    margin-top: -21px;
}

.pic{
      margin-top: -96px;
}

aside {
    width: 25%;
    height: auto !important;
    float: left;
    
}

.loading{
  display: none;
}

.stats {
    width: 98%;
    height: 104px;
    margin-top: 42px;
    margin-left: 4px;
}

.user_location{
      width: 100%;
    height: auto;
    float: left;
    color: rgb(8, 8, 8);
    margin-left: 0px;
    background-color: white;
    margin-top: 4px;
}

.bio{
  color: black;
      width: 100%;
    height: auto;
    float: left;
    color: white;
    margin-left: 0px;
}


.friends {
    width: 102%;
    height: auto;
    float: left;
    margin-left: -4px;
}

.user-profile-header
{
    width: 100%;
    height: 137px;
    margin-top: 74px;
}

.User-Info {
    width: 100%;
    height: auto;
    float: left;
    color: rgb(8, 8, 8);
    margin-left: 0px;
    background-color: white;
    margin-top: 0px;
}

#bio{
  background-color: white;
  color: black;
}
</style>


<script src="WICore/WIJ/WIProfile.js" type="text/javascript"></script>
<div class="container">
<div class="row">
<div class="user-profile-header" id="my_profile">
<img class="proheader" src="../WIAdmin/WIMedia/Img/worldmap.jpg">
<div class="profile_picture">
<div class="profile_section">
<?php 
echo $user_pic  = $profile->User_pic($userId); ?>
</div>
</div><!--user-profile-header-->
</div><!--row-->
</div><!--container-->
</div>

<div class="container">
<div class="row">
<aside>
<?php include_once 'WIInc/mysidebar.php';

 ?>
</aside>

<div class="prof_main">
<div class="boxing">
<?php include_once 'WIInc/myprofile_tabs.php';



 ?>
      </div><!-- end boxing-->

</div><!-- end prof_main0-->
</div><!--row-->
</div><!--container-->


<!-- add contact modal -->
  <div class="modal" id="modal-change-photo" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                  <h4 class="modal-title" id="modal-username">
                    Change Photo
                  </h4>
                </div>
                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="change_photo" enctype="multipart/form-data" method="POST">
                     
                        <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="photo-img">
                        Photo
                        </label>
                        <div class="controls col-lg-9">
                          <input type="file" name="file" id="photo" multiple class="btn" />
                        </div>
                      </div>

                      <hr />
        <!-- Show the images preview here -->
        <div id="upload-preview"></div>

                  </form>
                </div>
                <div align="center" class="ajax-loading loading"><img src="../WIAdmin//WIMedia/Img/ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-default" onclick="profile.cancel()" data-dismiss="modal" aria-hidden="true">
                      cancel
                    </a>
                    <a href="javascript:void(0);" id="btn-change-photo" onclick="profile.upload(<?php echo WISession::get('user_id') ?>)" class="btn btn-primary">
                      add
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

          
          
