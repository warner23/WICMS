
<div class="container">
<div class="row">
<div class="col-md-12 main_box">
<div class="col-md-6">
<a href="Topics.php"><button class="btn btn-main"><h3><?php echo WILang::get('current_topics');?></h3></button></a>
</div>
</div>
</div>
</div>




<div class="container">
<div class="row">
<div class="col-md-12 col-md-footer">
<div class="col-md-3 col-md-ol"><a href="Alogin.php"><button class="btn"><?php echo WILang::get('admin');?></button></a></div>

<div class="col-md-3 col-md-or"><button class="btn" onclick="WIInfo.ShowInfo();"><?php echo WILang::get('info');?></button></div>
</div>
</div>
</div>


<!-- add info modal -->
  <div class="modal" id="ShowInfoModal" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="add-user-form" enctype="multipart/form-data" method="POST"> 
                     <div class="col-md-12 body-info">
                     <p>This is the info page, this is a page filler, content will be changed later on. </p>
                     </div>
                     
                  </form>
                </div>

                <div class="modal-footer">
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->


<script type="text/javascript" src="WICore/WIJ/WIInfo.js"></script>




