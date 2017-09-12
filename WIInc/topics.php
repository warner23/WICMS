<style type="text/css">
	
.content {
    padding: 32px 0;
    position: relative;
    margin-top: 58px;
}

.text-left{
	text-align: center;
}

.show{
  display: block;
}

.hide{
  display: none;
}

</style>



<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-md-2 col sm-2 col-xs-2 col-lg-4 sidenav">

    </div>
	<div class="col-lg-4 col-md-8 col-sm-8">
	
<div class="panel-heading">Topics</div>
<?php 

if(!$login->isLoggedIn()){
?>
  <div class="col-lg-4 col-md-8 col-sm-8">


<button>Click the tab above to register/login</button>

  </div>

<?php
}else{
  $topic->topic(); 
}


?>

</div>

					</div>
					

					    <div class="col-md-2 col sm-2 col-xs-2 col-lg-4 sidenav">

    </div>
    
				</div>
			</div>

      <!-- add info modal -->
  <div class="modal hide" id="votingModal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WITopic.close();" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="add-user-form" enctype="multipart/form-data" method="POST"> 
                     <div class="col-md-12 body-info">
                     <div class="panel-body">


                     </div>
                     </div>
                     
                  </form>
                </div>

                <div class="modal-footer">
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

<script type="text/javascript" src="WICore/WIJ/WICore.js"></script>
<script type="text/javascript" src="WICore/WIJ/WITopic.js"></script>
