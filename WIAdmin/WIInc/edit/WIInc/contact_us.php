			<style type="text/css">
     .hide{
      display: none;
     }   

     .contact{
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
  
<div class="col-lg-8 col-md-8 col-sm-8 contact">  					
  <div class="title_content">							
  <h3>Let's keep in touch</h3>						
  </div>						
  <p>Ut enim ad minim veniam,						
  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo						
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse						
  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non						
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	
											
  <div class="alert alert-success hidden alert-dismissable" id="contactSuccess">						  
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>						 
   <strong>Success!</strong> Your message has been sent to us.						
   </div>												
   <div class="alert alert-danger hidden" id="contactError">						  
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>						 
    <strong>Error!</strong> <span class="errorMessage">There was an error sending your message.</span>						
    </div>												
    <form id="contactForm" novalidate="novalidate" class="Contact">							
    <div class="row">								
    <div class="form-group">									
    <div class="col-lg-6 col-md-6 col-sm-6">										
    <input type="text" id="name" name="name" class="form-control" maxlength="100" data-msg-required="Please enter your name." value="" placeholder="Your Name" required >									
    </div>									
    <div class="col-lg-6 col-md-6 col-sm-6">										
    <input type="email" id="email" name="email" class="form-control" maxlength="100" data-msg-email="Please enter a valid email address." data-msg-required="Please enter your email address." value="" placeholder="Your E-mail" required>									
    </div>								
    </div>							
    </div>							
    <div class="row">								
    <div class="form-group">									
    <div class="col-md-12 col-lg-12 col-sm-12">										
    <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value="" placeholder="Subject" required>									
    </div>								
    </div>							
    </div>							
    <div class="row mrgb_20">								
    <div class="form-group">									
    <div class="col-md-12 col-lg-12 col-sm-12">										
    <textarea id="message" name="message" rows="8" cols="50" data-msg-required="Please enter your message." maxlength="5000" placeholder="Type your message here." required></textarea>																			
    </div>								
    </div>							
    </div>							
    <div class="row">								
    <div class="col-md-12 col-lg-12 col-sm-12">									
    <input type="submit" data-loading-text="Loading..." class="btn btn-primary" onclick="WIContact.sendMEssage(event);" id="contact" value="Send Message">								
    </div>	
    		  			
    </div>						
    </form>
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


    <!-- End Contact Page -->
    <script type="text/javascript" src="WICore/WIJ/WICore.js"></script>
    <script type="text/javascript" src="WICore/WIJ/WIContact.js"></script>