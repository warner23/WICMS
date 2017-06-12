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

<div class="container-fluid text-center">    
  <div class="row content" id="col">
  <?php
  $lsc = $page->GetColums("index", "left_sidebar");
  $rsc = $page->GetColums("index", "right_sidebar");
if ($lsc > 0) {

	  echo '<div class="col-sm-1 sidenav" id="sidenavL">';
 include_once 'left_sidebar.php';   

    echo '</div>
    <div class="col-lg-10 col-md-8 col-sm-8" id="Mid">';
}

  ?>

<?php  
if ($lsc && $rsc > 0) {
	echo '<div class="col-lg-10 col-md-8 col-sm-8" id="Mid">';
}else {
echo '<div class="col-lg-12 col-md-12 col-sm-12" id="Mid">';
}
 ?>
	
			

						 <div class="col-lg-12 col-md-12 col-sm-12 text-left"> 
							<h1><?php echo WILang::get("welcome_") ;  ?><span><?php echo WILang::get('site_name');  ?></span></h1>
							<p><?php echo WILang::get("main_title") ;  ?></p>
						</div>
					</div>
				
					<div class="col-lg-4 col-md-4 col-sm-4" >
						<div class="services">
							<div class="icon">
								<i class="fa fa-laptop"></i>
							</div>
							<div class="serv_detail">
								<h3><?php echo WILang::get("community") ;  ?></h3>
								<p><?php echo WILang::get("learn") ;  ?>
</p>
							</div>
						</div>
					</div>
					
					<div class="col-lg-4 col-md-4 col-sm-4">
						<div class="services">
							<div class="icon">
								<i class="fa fa-trophy"></i>
							</div>
							<div class="serv_detail">
								<h3><?php echo WILang::get("software") ;  ?></h3>
								<p><?php echo WILang::get("software") ;  ?>
</p>
							</div>
						</div>
					</div>
					
					<div class="col-lg-4 col-md-4 col-sm-4" >
						<div class="services">
							<div class="icon">
								<i class="fa fa-cogs"></i>
							</div>
							<div class="serv_detail">
								<h3><?php echo WILang::get("it") ;  ?></h3>
								<p><?php echo WILang::get("it_title") ;  ?>
</p>
							</div>
						</div>
					</div>
					</div>
					
  <?php
  
if ($rsc > 0) {

	  echo '<div class="col-sm-1 sidenav" id="sidenavR">';
 include_once 'right_sidebar.php';   

    echo '</div>';
}

  ?>
					  
    
				</div>
			</div>
