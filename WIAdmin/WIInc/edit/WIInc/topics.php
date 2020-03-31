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



<div class="container-fluid text-center" id="col">    
  
  <?php
  $lsc = $page->GetColums("index", "left_sidebar");
  $rsc = $page->GetColums("index", "right_sidebar");
if ($lsc > 0) {

    echo '<div class="col-sm-1 col-lg-2 col-md-2 col-xl-2 col-xs-2 sidenav" id="sidenavL">';
 include_once 'left_sidebar.php';   

    echo '</div>
    <div class=" col-lg-10 col-md-8 col-sm-8 block" id="block">
    <div class="col-lg-10 col-md-8 col-sm-8" id="Mid">';
}

  ?>

<?php  
if ($lsc && $rsc > 0) {
  echo '<div class="col-lg-10 col-md-8 col-sm-8 block" id="block"><div class="col-lg-12 col-md-8 col-sm-8" id="Mid">';
}else if($rsc > 0){
  echo '<div class="col-lg-10 col-md-8 col-sm-8 block" id="block"><div class="col-lg-12 col-md-8 col-sm-8" id="Mid">';

 }else{
echo '<div class="col-lg-12 col-md-12 col-sm-12 block" id="block"><div class="col-lg-12 col-md-12 col-sm-12" id="Mid">';
}
 ?>
  
	<div class="col-lg-4 col-md-8 col-sm-8">
	
<div class="panel-heading">Topics</div>
<?php 

if(!$login->isLoggedIn()){
?>
  <div class="col-lg-4 col-md-8 col-sm-8">


      <li id="toggle">
        <a id="openPanel" class="open" href="#"><?php if($login->isLoggedIn()) {echo 'Open Panel';}  else { echo 'Log In | Register';}?></a>
        <a id="close" style="display: none;" class="close" href="#"><?php echo WILang::get('login_with'); ?> Close Panel</a>     
      </li>

  </div>

<?php
}else{
  $topic->topic(); 
}


?>

</div>

					</div>
					

 <?php
  
if ($rsc > 0) {

    echo '</div><div class="col-sm-1 col-lg-2 cool-md-2 col-xl-2 col-xs-2 sidenav" id="sidenavR">';
 include_once 'right_sidebar.php';   

    echo '</div></div>';
}

  ?>  
    
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
