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
<h3>Privacy Policy</h3>						
</div>						
<div class="our_history">							
<p>  
This is the internet privacy policy for debatespot.net
This website is the property of debatespot. We take the privacy of all visitors to this Website very seriously and therefore set out in this privacy and cookies policy our position regarding certain privacy matters and the use of cookies on this Website.
This policy covers all data that is shared by a visitor with us whether directly via [add website url] or via email. This policy been created by the internet marketing experts at Surge Digital on our behalf, and is occasionally updated by us so we suggest you re-review from time to time.
This policy provides an explanation as to what happens to any personal data that you share with us, or that we collect from you either directly via this Website or via email.
Certain businesses are required under the data protection act to have a data controller. For the purpose of the Data Protection Act 1998 our data controller is [add individual’s name] and can be contacted via email at [add email address].

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