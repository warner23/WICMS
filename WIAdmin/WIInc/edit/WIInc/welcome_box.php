<style type="text/css">
	
.content {
    padding: 32px 0;
    position: relative;
    margin-top: 58px;
}

.text-left{
	text-align: center;
}
</style>

<div class="container-fluid text-center" id="col">    
  
  <?php
  $lsc = $page->GetColums("index", "left_sidebar");
  $rsc = $page->GetColums("index", "right_sidebar");
if ($lsc > 0) {

	  echo '<div class="col-sm-1 col-lg-2 col-md-2 col-xl-2 col-xs-2 sidenav" id="sidenavL">';
 $mod->getMod("left_sidebar");  

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
	<div class="col-lg-8 col-md-8 col-sm-8">

<button class="btn btn-main"><input type="text" name="topic" placeholder="<?php echo WILang::get('current_topics');?>"></button>
					</div>
					

 <?php
  
if ($rsc > 0) {

	  echo '</div><div class="col-sm-1 col-lg-2 cool-md-2 col-xl-2 col-xs-2 sidenav" id="sidenavR">';
  $mod->getMod("right_sidebar");  

    echo '</div></div>';
}

  ?>  
    
				</div>
			</div>
