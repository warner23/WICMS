<style type="text/css">
  .about{
    background-color: white;
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
  

<div class="col-lg-8 col-md-8 col-sm-8 about">						
<div class="title_content">							
<h3>About Us</h3>						
</div>						
<div class="our_history">							
<p>  
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec tempor risus. Mauris velit ante, luctus quis leo sit amet, vestibulum volutpat metus. Quisque sapien ligula, placerat non lacinia vitae, mollis eget tortor. Phasellus dapibus quam odio, at elementum orci sagittis id. Nam elementum turpis risus, venenatis hendrerit quam molestie pretium. Vivamus elementum justo ipsum, sit amet fermentum metus finibus in. Nullam eu nunc eget risus consectetur vulputate. Praesent luctus elit ante, a imperdiet tortor dignissim vitae. Vivamus in gravida massa. Phasellus porttitor euismod tellus sed egestas. Phasellus non lorem lacus. Integer tincidunt sed arcu non euismod. Integer consectetur lobortis suscipit.
</p>	
					
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
  </section>	