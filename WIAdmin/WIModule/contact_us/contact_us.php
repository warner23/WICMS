<?php

/**
* 
*/
class contact_us 
{
	

	function __construct()
	{
		$this->WIdb = WIdb::getInstance();
		$this->Web  = new WIWebsite();
		$this->site = new WISite();
		$this->mod  = new WIModules();
		$this->page = new WIPage();
		//$this->page = new WIPage();
	}

	public function editPageContent($page_id)
	{
		// include_once '../../WIInc/WI_StartUp.php';

				if(isset($page_id)){
			$mod_name = $this->mod->ModName($page_id);
		}else{
			$mod_name = "privacy_policy";
		}

		 echo '<style type="text/css">
	
		.content {
		    padding: 32px 0;
		    position: relative;
		    margin-top: 58px;
		}

		.text-left{
			text-align: center;
		}

		</style>
		<script>
  $( function() {
    $( "#accordion1" ).accordion();
  } );
  </script>
		<div class="container-fluid text-center" id="col"> ';  

		  $lsc = $this->page->GetColums($page_id, "left_sidebar");
		  $rsc = $this->page->GetColums($page_id, "right_sidebar");
		if ($lsc > 0) {

			  echo '<div class="col-sm-1 col-lg-2 col-md-2 col-xl-2 col-xs-2 sidenav" id="sidenavL">';
		 $this->mod->getMod("left_sidebar");  

		    echo '</div>
		    <div class=" col-lg-10 col-md-8 col-sm-8 block" id="block">
		    <div class="col-lg-10 col-md-8 col-sm-8" id="Mid">';
		}

		if ($lsc && $rsc > 0) {
			echo '<div class="col-lg-10 col-md-8 col-sm-8 block" id="block"><div class="col-lg-12 col-md-8 col-sm-8" id="Mid">';
		}else if($rsc > 0){
			echo '<div class="col-lg-10 col-md-8 col-sm-8 block" id="block"><div class="col-lg-12 col-md-8 col-sm-8" id="Mid">';

		 }else{
		echo '<div class="col-lg-12 col-md-12 col-sm-12 block" id="block"><div class="col-lg-12 col-md-12 col-sm-12" id="Mid">';
		}

			echo '<style type="text/css">
     .hide{
      display: none;
     }   

     .contact{
      background-color: white;
     }
      </style>

<div class="col-lg-8 col-md-8 col-sm-8 center">           
  <div class="title_content">             
  <h3><input type="text" name="title" id="title" placeholder="';$this->mod->module($mod_name, 'text'); echo '" onclick="WIMod.multiLang()"></h3>           
  </div>            
  <textarea type="text" name="history" id="history" placeholder="';$this->mod->module($mod_name, 'text1'); echo '" onclick="WIMod.multiLangtext()"></textarea> 
                      
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
    <input type="submit" data-loading-text="Loading..." class="btn btn-primary"  id="contact" value="Send Message">                
    </div>  
                
    </div>            
    </form>
      </div>  
    </div>
    <!-- End Contact Page -->';
							

		  
		if ($rsc > 0) {

			  echo '</div><div class="col-sm-1 col-lg-2 cool-md-2 col-xl-2 col-xs-2 sidenav" id="sidenavR">';
		  $this->mod->getMod("right_sidebar");  

		    echo '</div></div>';
		}

		echo '</div>
			</div>';
      echo ' <div class="modal off" id="modal-edit-title">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WIMod.Closed()" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">' .WILang::get("add_trans") . '</h4>
                </div>

                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="add_trans">

                    
                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="lang_name">' . WILang::get("trans_lang") .'</label>
                        <div class="controls col-lg-9">
                          <input id="lang_name" name="lang_name" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="keyword">' .
                         WILang::get(`lang_keyword`) . '</label>
                        <div class="controls col-lg-9">
                          <input id="keyword" name="keyword" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="translation">' .
                          WILang::get(`lang_trans`) . '</label>
                        <div class="controls col-lg-9">
                          <input id="translation" name="translation" type="text" class="input-xlarge form-control" >
                        </div>                      </div>

                     
                  </form>
                </div>
                <div align="center" class="ajax-loading off"><img src="WIMedia/Img/ajax_loader.gif" />
<div class="center" id="results-lang"></div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WIMod.Closed()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">'.
                         WILang::get("cancel") . '
                    </a>
                    <a href="javascript:void(0);"  id="btn-trans" onclick="WIMod.editPageTrans()" class="btn btn-primary">
                      
                      ' .
                         WILang::get("add") . '
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->';


          echo ' <div class="modal off" id="modal-edit-para">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WIMod.Closed1()" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    ' . WILang::get("add_trans") .'
                  </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="add_trans">

                    
                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="lang_name">
                         '.WILang::get("trans_lang"). '
                        </label>
                        <div class="controls col-lg-9">
                          <input id="lang_namep" name="lang_name" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="keyword">
                          '.WILang::get("lang_keyword"). '
                        </label>
                        <div class="controls col-lg-9">
                          <input id="keywordp" name="keyword" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="translation">
                          '. WILang::get("lang_trans")
                        . '
                        </label>
                        <div class="controls col-lg-9">
                          <textarea id="translationp" name="translation" type="text" class="input-xlarge form-control" ></textarea>
                        </div>                      </div>

                     
                  </form>
                </div>
                <div align="center" class="ajax-loading off"><img src="WIMedia/Img/ajax_loader.gif" />
<div class="center" id="results-lang"></div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WIMod.Closed1()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      '. WILang::get("cancel") . '
                    </a>
                    <a href="javascript:void(0);"  id="btn-trans" onclick="WIMod.editPageTransPara()" class="btn btn-primary">
                      '.WILang::get("add") . '
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->';
 

	}

	public function mod_name($module, $page)
	{

    echo '<div class="container-fluid text-center">    
  <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 about min_height">';

    if(isset($page)){
    $left_sidePower = $this->Web->pageModPower($page, "left_sidebar");
    $leftSideBar = $this->Web->PageMod($page, "left_sidebar");
    //echo $Panel;
    if ($left_sidePower > 0) {
      $this->mod->getMod($leftSideBar);
      echo '<div class="col-lg-8 col-md-8 col-sm-8 contact">';
    }else{
      echo '<div class="col-lg-8 col-md-8 col-sm-8 center">';
    }

    }
		
		echo ' 
   
				<style type="text/css">
     .hide{
      display: none;
     }   

     .contact{
      background-color: white;
     }
      </style>

<div class="col-lg-8 col-md-8 col-sm-8 center">  					
  <div class="title_content">							
 <h3>';$this->mod->module($module, 'text'); echo '</h3> 					
  </div>						
  <p>';$this->mod->module($module, 'text1'); echo '</p>	
											
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
    </div>
    <!-- End Contact Page -->
    <script type="text/javascript" src="WICore/WIJ/WICore.js"></script>
    <script type="text/javascript" src="WICore/WIJ/WIContact.js"></script>';

    if(isset($page)){     
    $right_sidePower = $this->Web->pageModPower($page, "right_sidebar");
    $rightSideBar = $this->Web->PageMod($page, "right_sidebar");
    //echo $Panel;
    if ($right_sidePower > 0) {
      $this->mod->getMod($rightSideBar);
    }

    }     
          

  echo '</div>
      </div>
      </div>';
	}


}