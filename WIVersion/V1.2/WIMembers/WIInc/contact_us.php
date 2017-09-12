	<!--Start TITLE PAGE-->	
  <section class="title_page bg_3">			
  <div class="container">				
  <div class="row">					
  <div class="col-lg-12 col-md-12 col-sm-12">						
  <h2>Contact 2</h2>						
  <nav id="breadcrumbs">							
  <ul>								
  <li><a href="index.html">Home</a></li>								
  <li><a href="index.html">Pages</a></li>								
  <li>Contact 2</li>							
  </ul>						
  </nav>					
  </div>				
  </div>			
  </div>		
  </section>		
  <!--End TITLE PAGE-->				
  <!-- Start Contact Page -->		
  <section class="content contact_3">			
  <div class="container">				
  <div class="row">					
  <div class="col-lg-6 col-md-6 col-sm-6">						
  <div class="maps">							
  <div id="jogjamap"></div>						
  </div>						
  <div class="title_content">							
  <h3>Contact Info</h3>						
  </div>						
  <div class="widget_content info">							
  <p>Duis aute irure dolor in reprehenderit in voluptate velit esse							
  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non							
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>							
  <ul class="widget_info_contact">								
  <li><i class="fa fa-map-marker"></i> <p><strong>Address</strong>:<?php echo $WI['address']; ?></p></li>								
  <li><i class="fa fa-user"></i> <p><strong>Phone</strong>:<?php echo $WI['phone']; ?></p></li>								
  <li><i class="fa fa-envelope"></i> <p><strong>Email</strong>:<a href="#"><?php echo $WI['email']; ?></a></p></li>														
  </ul>						
  </div>											
  </div>					
  <div class="col-lg-6 col-md-6 col-sm-6">						
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
    <form id="contactForm" action="" novalidate="novalidate" class="jogjaContact">							
    <div class="row">								
    <div class="form-group">									
    <div class="col-lg-6 col-md-6 col-sm-6">										
    <input type="text" id="name" name="name" class="form-control" maxlength="100" data-msg-required="Please enter your name." value="" placeholder="Your Name" >									
    </div>									
    <div class="col-lg-6 col-md-6 col-sm-6">										
    <input type="email" id="email" name="email" class="form-control" maxlength="100" data-msg-email="Please enter a valid email address." data-msg-required="Please enter your email address." value="" placeholder="Your E-mail" >									
    </div>								
    </div>							
    </div>							
    <div class="row">								
    <div class="form-group">									
    <div class="col-md-12 col-lg-12 col-sm-12">										
    <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value="" placeholder="Subject">									
    </div>								
    </div>							
    </div>							
    <div class="row mrgb_20">								
    <div class="form-group">									
    <div class="col-md-12 col-lg-12 col-sm-12">										
    <textarea id="message" name="message" rows="8" cols="50" data-msg-required="Please enter your message." maxlength="5000" placeholder="Message"></textarea>																			
    </div>								
    </div>							
    </div>							
    <div class="row">								
    <div class="col-md-12 col-lg-12 col-sm-12">									
    <input type="submit" data-loading-text="Loading..." class="btn btn-primary" value="Send Message">								
    </div>							
    </div>						
    </form>					
    </div>				
    </div> 
    <!--END ROW-->			
    </div>		
    </section>		

    <!-- End Contact Page -->