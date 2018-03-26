<?php

/**
* 
*/
class checkout 
{
	

	function __construct()
	{
		$this->WIdb = WIdb::getInstance();
		$this->Web  = new WIWebsite();
		$this->site = new WISite();
		$this->mod  = new WIModules();
		$this->page = new WIPage();
		$this->login = new WILogin();
        $this->Info = new WIUserInfo();
        $this->user   = new WIUser(WISession::get('user_id'));
        $this->check = new WICheckout();
	}

		public function editMod()
	{
		echo '<div id="remove">
      <a href="#">
      <button id="delete" onclick="WIMod.delete(event);">Delete</button>
      </a>
       <div id="dialog-confirm" title="Remove Module?" class="hide">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;">
  </span>Are you sure?</p>
  <p> This will remove the module and any unsaved data.</p>
  <span><button class="btn btn-danger" onclick="WIMod.remove(event);">Remove</button> <button class="btn" onclick="WIMod.close(event);">Close</button></span>
</div>
';

echo '<div class="container-fluid text-center">    
  <div class="row content">

	<div class="col-lg-12 col-md-12 col-sm-12" >
						<div class="col-lg-12 col-md-12 col-sm-12" >

						 <div class="col-lg-12 col-md-12 col-sm-12 text-left"> 
							<div class="intro_box">
<h1>' .WILang::get("welcome_") . '<span>'. $this->site->Website_Info('site_name') . '</span></h1>
							<p>' . WILang::get("main_title") . '</p>
							</div>
						</div>
					</div>
				
					<div class="col-lg-4 col-md-4 col-sm-4" >
						<div class="services">
							<div class="icon">
								<i class="fa fa-laptop"></i>
							</div>
							<div class="serv_detail">
								<h3>' . WILang::get("community") . '</h3>
								<p>' . WILang::get("learn") . '
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
								<h3>' . WILang::get("software") . '</h3>
								<p>' .WILang::get("software") . '
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
								<h3>' . WILang::get("it") . '</h3>
								<p>' . WILang::get("it_title")  . '
</p>
							</div>
						</div>
					</div>
					</div>
					


    
				</div>
			</div>';


		echo '</div>';
	}

	public function editPageContent($page_id)
	{
		// include_once '../../WIInc/WI_StartUp.php';
		 echo '		 <style type="text/css">
	
		.content {
		    padding: 32px 0;
		    position: relative;
		    margin-top: 58px;
		}

		.text-left{
			text-align: center;
		}

		</style>

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

			echo '<div class="col-lg-12 col-md-12 col-sm-12" >

						 <div class="col-lg-12 col-md-12 col-sm-12 text-left"> 
							<div class="intro_box">
<h1>' .WILang::get("welcome_") . '<span>'. $this->site->Website_Info('site_name') . '</span></h1>
							<p>' . WILang::get("main_title") . '</p>
							</div>
						</div>
					</div>
				
					<div class="col-lg-4 col-md-4 col-sm-4" >
						<div class="services">
							<div class="icon">
								<i class="fa fa-laptop"></i>
							</div>
							<div class="serv_detail">
								<h3>' . WILang::get("community") . '</h3>
								<p>' . WILang::get("learn") . '
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
								<h3>' . WILang::get("software") . '</h3>
								<p>' .WILang::get("software") . '
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
								<h3>' . WILang::get("it") . '</h3>
								<p>' . WILang::get("it_title")  . '
</p>
							</div>
						</div>
					</div>
					</div>
					


    
				</div>
			</div>';
							

		  
		if ($rsc > 0) {

			  echo '</div><div class="col-sm-1 col-lg-2 cool-md-2 col-xl-2 col-xs-2 sidenav" id="sidenavR">';
		  $this->mod->getMod("right_sidebar");  

		    echo '</div></div>';
		}

		echo '</div>
			</div>';
 

	}

	public function mod_name()
	{
		if(isset($page)){
		$left_sidePower = $this->Web->pageModPower($page, "left_sidebar");
		$leftSideBar = $this->Web->PageMod($page, "left_sidebar");
		//echo $Panel;
		if ($left_sidePower === 0) {
			
		}else{

			$this->mod->getMod($leftSideBar);
		}
		}


		echo '<div class="container-fluid text-center">    
  <div class="row content">

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                            <h2>Checkout Process</h2>
						 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left"> ';
                         if(!$this->login->isLoggedIn()){
							
						echo '<div class="wizard col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
            <div class="steps">
                <ul>
                    <li>
                        <a :class="active">
                            <div class="stepNumber active" id="stepOne"><i class="fa fa-user"></i></div>
                            <span class="stepDesc text-small">'; echo WILang::get('step1'); 
                            	echo '
                               </span>
                        </a>
                    </li>
                    <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepTwo"><i class="fa fa-list"></i></div>
                            <span class="stepDesc text-small">'; echo WILang::get('step2'); echo '</span>
                        </a>
                    </li>

                     <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepThree"><i class="fa fa-gears"></i></div>
                            <span class="stepDesc text-small">'; echo WILang::get('step3'); echo '</span>
                        </a>
                    </li>
                    <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepFour"><i class="fa fa-database"></i></div>
                            <span class="stepDesc text-small">'; echo WILang::get('step4'); echo '</span>
                        </a>
                    </li>
                    <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepFive"><i class="fa fa-terminal"></i></div>
                            <span class="stepDesc text-small">'; echo WILang::get('step4'); echo '</span>
                        </a>
                    </li>

                     <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepSix"><i class="fa fa-terminal"></i></div>
                            <span class="stepDesc text-small">'; echo WILang::get('step5'); echo '</span>
                        </a>
                    </li>
                     <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepSeven"><i class="fa fa-flag-checkered"></i></div>
                            <span class="stepDesc text-small">'; echo WILang::get('step6'); echo '</span>
                        </a>
                    </li>
                    <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepEight"><i class="fa fa-flag-checkered"></i></div>
                            <span class="stepDesc text-small">'; echo WILang::get('step7'); echo '</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 step-content show" id="step_one">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
               

<div class="span4">
                                    <h4>New Registration</h4>
                                    <form>
                                        <label class="radio">
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                            Register Account
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                            Guest Checkout
                                        </label>
                                        <button class="btn btn-primary">Continue</button>
                                    </form>
                                    <em>By creating an account you will be able to shop faster, be up to date on an order\'s status, and keep track of the orders you have previously made.</em>
                                </div>

                                <div class="span4 offset2">
                                    <h4>Registered User</h4>
                                    <form>
                                        <label>Email</label>
                                        <input type="text" name="email" id="email" />
                                        
                                        <label>Password</label>
                                        <input type="text" name="password" id="password" />
                                        <br />
                                        <a href="#">forgot password?</a>
                                        <br />
                                        <button class="btn btn-primary">Login</button>
                                    </form>
                                </div>



                <a href="javascript:;" onclick="WICheckout.stepOne();" class="btn btn-as pull-right" type="button">
                    '; echo WILang::get('next'); echo '

                    <i class="fa fa-arrow-right"></i>
                </a>
                <div class="clearfix"></div>
            </div>
            </div>


            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 step-content hide" id="step_two">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >                
            <div class="alert alert-danger hide" id="snap" >
                    <strong>'; echo WILang::get('next'); echo '</strong> 
                </div>

                

<form>
                                    <label> First Name:</label>
                                    <input type="text" class="large-field" value="" name="firstname">

                                    <label> Last Name:</label>
                                    <input type="text" class="large-field" value="" name="lastname">

                                    <label>Company:</label>
                                    <input type="text" class="large-field" value="" name="company">

                                    <label> Company ID:</label>
                                    <input type="text" class="large-field" value="" name="company_id">

                                    <label> Address 1:</label>
                                    <input type="text" class="large-field" value="" name="address_1">

                                    <label>Address 2:</label>
                                    <input type="text" class="large-field" value="" name="address_2">

                                    <label> City:</label>
                                    <input type="text" class="large-field" value="" name="city">

                                    <label> Post Code:</label>
                                    <input type="text" class="large-field" value="" name="postcode">

                                    <label> '; echo WILang::get('country'); echo ':</label>
                                    ';
                        $this->site->countries(); echo '

                                    <label>'; echo WILang::get('region'); echo ':</label>
                                    <select class="large-field" name="zone_id">
                                        '; include_once 'WIInc/region_list.php'; echo '
                                    </select>
                                    
                                    <br />
                                    <button class="btn btn-primary">Continue</button>
                                </form>





                  

                    <a href="javascript:;" class="btn btn-as pull-right" onclick="WICheckout.stepTwo()" type="button" id="required">
                        '; echo WILang::get('next') ; echo '
                        <i class="fa fa-arrow-right"></i>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            </div>
             <div class="step-content hide" id="step_three">
                <h3>'; echo WILang::get('benefits'); echo '</h3>
                <hr>
                
                 



<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                                STEP 3: SHIPPING DETAILS
                            </a>
                        </div>
                        <div id="collapseThree" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <form>
                                    <label> First Name:</label>
                                    <input type="text" class="large-field" value="" name="firstname">

                                    <label> Last Name:</label>
                                    <input type="text" class="large-field" value="" name="lastname">

                                    <label>Company:</label>
                                    <input type="text" class="large-field" value="" name="company">

                                    <label> Company ID:</label>
                                    <input type="text" class="large-field" value="" name="company_id">

                                    <label> Address 1:</label>
                                    <input type="text" class="large-field" value="" name="address_1">

                                    <label>Address 2:</label>
                                    <input type="text" class="large-field" value="" name="address_2">

                                    <label> City:</label>
                                    <input type="text" class="large-field" value="" name="city">

                                    <label> Post Code:</label>
                                    <input type="text" class="large-field" value="" name="postcode">

                                    <label> '; echo WILang::get('country'); echo ':</label>
                                    ';
                        $this->site->countries(); echo '

                                    <label>'; echo WILang::get('region'); echo ':</label>
                                    <select class="large-field" name="zone_id">
                                        '; include_once 'WIInc/region_list.php'; echo '
                                    </select>
                                    
                                </form>
                                <br />
                                <button class="btn btn-primary">Continue</button>



               

                <button class="btn btn-as pull-right" onclick="WICheckout.stepThree();" type="button">
                    <span class="show" id="next">
                        '; echo WILang::get('next'); echo '
                        
                        <i class="fa fa-arrow-right" ></i>
                    </span>
                    <span class="hide" id="spin">
                        <i class="fa fa-circle-o-notch fa-spin"></i>
                       '; echo WILang::get('connecting'); echo '
                    </span>
                </button>
                <div class="clearfix"></div>
            </div>


            <div class="step-content hide" id="step_four">
                <h3>'; echo WILang::get('support'); echo '</h3>
                <hr>

               

<form>
                                    <label class="radio">
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                        Free Shipping <b>($0.00)</b>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                        Flat Shipping Rate <b>($10.00)</b>
                                    </label>
                                    <button class="btn btn-primary">Continue</button>
                                </form>





               

                <button class="btn btn-as pull-right" onclick="WICheckout.stepFour();" type="button">
                    <span class="show" id="next">
                        '; echo WILang::get('next'); echo '
                        <i class="fa fa-arrow-right" ></i>
                    </span>
                    <span class="hide" id="spin">
                        <i class="fa fa-circle-o-notch fa-spin"></i>
                        '; echo WILang::get('connecting'); echo '
                    </span>
                   
                </button>
                 <span class="show" id="mess">
                        <i class="fa"></i>
                    </span>
                <div class="clearfix"></div>
            </div>

            <div class="step-content hide" id="step_five">
                <h3>'; echo WILang::get('ref'); echo '</h3>
                <hr>


                    <form>
                                    <label class="radio">
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                        Paypal</b>
                                    </label>
                                    
                                    <button class="btn btn-primary">Continue</button>
                                </form>






                    

                    <button class="btn btn-as pull-right" onclick="WICheckout.stepFive();">
                        '; echo WILang::get('next') ; echo '
                        <i class="fa fa-arrow-right"></i>
                    </button>
                <div class="clearfix"></div>
            </div>


            <div class="step-content hide" id="step_six">
                <h3>'; echo WILang::get('admin'); echo '</h3>
                <hr>

                <br>
               
                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Item Name</th>
                                            <th>Qty</th>
                                            <th>Unit Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>AB29837</td>
                                            <td>1</td>
                                            <td>$333.33</td>
                                            <td>$333.33</td>
                                        </tr>
                                        <tr>
                                            <td>AC34423</td>
                                            <td>2</td>
                                            <td>$333.33</td>
                                            <td>$666.66</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <dl class="dl-horizontal pull-right">
                                    <dt>Sub-total:</dt>
                                    <dd>$999.99</dd>

                                    <dt>Shipping Cost:</dt>
                                    <dd>$0.01</dd>

                                    <dt>Total:</dt>
                                    <dd>$1000.00</dd>
                                </dl>
                                <div class="clearfix"></div>
                                <a href="#" class="btn btn-success pull-right">Confirm Order</a>



                <br>

                 <button class="btn btn-as pull-right" onclick="WICheckout.stepSix();">
                         '; echo WILang::get('next') ; echo '
                        <i class="fa fa-arrow-right"></i>
                    </button>
                <div class="clearfix"></div>
            </div>


            <div class="step-content hide" id="step_seven">
                <h3>'; echo WILang::get('Next'); echo '</h3>
                <hr>
              





                <br>

               <button class="btn btn-as pull-right" onclick="WICheckout.install();">
                        <span class="show" id="install">
                               <i class="fa fa-play"></i>
                            '; echo WILang::get('insta'); echo '
                        </span>
                            <span class="hide" id="installing">
                            <i class="fa fa-circle-o-notch fa-spin"></i>
                            '; echo WILang::get('I'); echo '
                        </span>
                    </button>
                <div class="clearfix"></div>
            </div>

             <div class="step-content hide" id="step_eight">
                <h3>'; echo WILang::get('completed'); echo '</h3>
                <hr>
                <p><strong>'; echo WILang::get('welldone'); echo '</strong></p>
                    
                </p>


                <br>

                <button class="btn btn-as pull-right" onclick="WICheckout.stepreturn();">
                        <span class="show" id="next">
                        '; echo WILang::get('next'); echo '
                        
                        <i class="fa fa-arrow-right" ></i>
                    </span>
                    </button>
                <div class="clearfix"></div>
            </div>



        </div>
    </div>
</div>'; }else{    // user logged in
    echo '<div class="wizard col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="steps">
                <ul>
                    <li>
                        <a :class="active">
                            <div class="stepNumber active" id="stepOne"><i class="fa fa-list"></i></div>
                            <span class="stepDesc text-small">'; echo WILang::get('step2'); echo '</span>
                        </a>
                    </li>

                     <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepTwo"><i class="fa fa-gears"></i></div>
                            <span class="stepDesc text-small">'; echo WILang::get('step3'); echo '</span>
                        </a>
                    </li>
                    <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepThree"><i class="fa fa-database"></i></div>
                            <span class="stepDesc text-small">'; echo WILang::get('step4'); echo '</span>
                        </a>
                    </li>
                    <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepFour"><i class="fa fa-terminal"></i></div>
                            <span class="stepDesc text-small">'; echo WILang::get('step5'); echo '</span>
                        </a>
                    </li>

                     <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepFive"><i class="fa fa-terminal"></i></div>
                            <span class="stepDesc text-small">'; echo WILang::get('step6'); echo '</span>
                        </a>
                    </li>
                     
                </ul>
            </div>
                
           


            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 step-content show" id="step_one">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                
            <div class="alert alert-danger hide" id="snap" >
                    <strong>'; echo WILang::get('next'); echo '</strong> 
                </div>

                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"> 

								<form>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> 
                                    <label>'; echo WILang::get('firstname'); echo ':</label>
                                    <input type="text" class="large-field" value="" name="firstname" id="billing_first_name">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <label>'; echo WILang::get('lastname'); echo ':</label>
                                    <input type="text" class="large-field" value="" name="lastname" id="billing_last_name">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <label>'; echo WILang::get('address_1'); echo ':</label>
                                    <input type="text" class="large-field" value="" name="address_1" id="billing_address_1">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <label>'; echo WILang::get('address_2'); echo ':</label>
                                    <input type="text" class="large-field" value="" name="address_2" id="billing_address_2">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <label>'; echo WILang::get('city'); echo ':</label>
                                    <input type="text" class="large-field" value="" name="city" id="billing_city">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <label>'; echo WILang::get('postcode'); echo ':</label>
                                    <input type="text" class="large-field" value="" name="postcode" id="billing_postcode">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                   <label> '; echo WILang::get('country'); echo ':</label>
                                    ';
                        $this->site->countries(); echo '
                        			</div>
                        			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

                                    <label>'; echo WILang::get('region'); echo ':</label>
                                    <select class="large-field" name="zone_id" id="billing_region">
                                        '; include_once 'WIInc/region_list.php'; echo '
                                    </select>
                                    </div>
                                    <br />
                                    <button class="btn btn-primary">'; echo WILang::get('continue'); echo '</button>
                                </form>

                                </div>



                  

                    <a href="javascript:;" class="btn btn-as pull-right" onclick="WICheckout.stepOne()" type="button" id="required">
                        '; echo WILang::get('next') ; echo '
                        <i class="fa fa-arrow-right"></i>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            </div>
             <div class="step-content hide" id="step_two">
                <h3>'; echo WILang::get('step3'); echo '</h3>
                <hr>
                
                
                                STEP 3: SHIPPING DETAILS
                        
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"> 

								<form>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> 
                                    <label>'; echo WILang::get('firstname'); echo ':</label>
                                    <input type="text" class="large-field" value="" name="firstname" id="ship_first_name">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <label>'; echo WILang::get('lastname'); echo ':</label>
                                    <input type="text" class="large-field" value="" name="lastname" id="ship_last_name">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <label>'; echo WILang::get('address_1'); echo ':</label>
                                    <input type="text" class="large-field" value="" name="address_1" id="ship_address_1">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <label>'; echo WILang::get('address_2'); echo ':</label>
                                    <input type="text" class="large-field" value="" name="address_2" id="ship_address_2">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <label>'; echo WILang::get('city'); echo ':</label>
                                    <input type="text" class="large-field" value="" name="city" id="ship_city">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <label>'; echo WILang::get('postcode'); echo ':</label>
                                    <input type="text" class="large-field" value="" name="postcode" id="ship_postcode">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                   <label> '; echo WILang::get('country'); echo ':</label>
                                    ';
                        $this->site->countries(); echo '
                        			</div>
                        			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

                                    <label>'; echo WILang::get('region'); echo ':</label>
                                    <select class="large-field" name="zone_id" id="ship_region">
                                        ';
                                        echo dirname(__FILE__) . 'WIInc/region_list.php';
                                         include_once 'WIInc/region_list.php'; echo '
                                    </select>
                                    </div>
                                    <br />
                                    
                                </form>

                                </div>



               

                <button class="btn btn-as pull-right" onclick="WICheckout.stepTwo();" type="button">
                    <span class="show" id="next">
                        '; echo WILang::get('next'); echo '
                        
                        <i class="fa fa-arrow-right" ></i>
                    </span>
                    <span class="hide" id="spin">
                        <i class="fa fa-circle-o-notch fa-spin"></i>
                       '; echo WILang::get('connecting'); echo '
                    </span>
                </button>
                <div class="clearfix"></div>
            </div>


            <div class="step-content hide" id="step_three">
                <h3>'; echo WILang::get('step4'); echo '</h3>
                <hr>

               

<form>
                                    <label class="radio">
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="0.00" checked>
                                        Royal Mail Shipping <b>($0.00)</b>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="10.00">
                                        Royal Mail: First Class Rate <b>($10.00)</b>
                                    </label>

                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="15.00">
                                        Royal Mail: Next Day Rate <b>($15.00)</b>
                                    </label>
                                </form>





               

                <button class="btn btn-as pull-right" onclick="WICheckout.stepThree();" type="button">
                    <span class="show" id="next">
                        '; echo WILang::get('next'); echo '
                        <i class="fa fa-arrow-right" ></i>
                    </span>
                    <span class="hide" id="spin">
                        <i class="fa fa-circle-o-notch fa-spin"></i>
                        '; echo WILang::get('connecting'); echo '
                    </span>
                   
                </button>
                 <span class="show" id="mess">
                        <i class="fa"></i>
                    </span>
                <div class="clearfix"></div>
            </div>

            <div class="step-content hide" id="step_four">
                <h3>'; echo WILang::get('step5'); echo '</h3>
                <hr>


                      <!-- CREDIT CARD FORM STARTS HERE -->
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                        <div class="display-td" >                            
                            <img class="img-responsive pull-right" src="../../../WIAdmin/WIMedia/Img/shop/accepted.jpg">
                        </div>
                    </div>                    
                </div>
                <div class="panel-body">
                    <form role="form" id="payment_form">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber">CARD NUMBER</label>
                                    <div class="input-group">
                                        <input 
                                            type="tel"
                                            class="form-control"
                                            name="cardNumber"
                                            placeholder="Valid Card Number"
                                            autocomplete="cc-number"
                                            required autofocus 
                                            id="cardNumber"
                                        />
                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                    <input 
                                        type="tel" 
                                        class="form-control" 
                                        name="cardExpiry"
                                        placeholder="MM / YY"
                                        autocomplete="cc-exp"
                                        required 
                                        id="expiry"
                                    />
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label for="cardCVC">CV CODE</label>
                                    <input 
                                        type="tel" 
                                        class="form-control"
                                        name="cardCVC"
                                        placeholder="CVC"
                                        autocomplete="cc-csc"
                                        required
                                        id="cardCVC"
                                    />
                                </div>
                            </div>
                        </div>
                        
                        </div>
                        <div class="row" style="display:none;">
                            <div class="col-xs-12">
                                <p class="payment-errors"></p>
                            </div>
                        </div>
                    </form>
                </div>         
            <!-- CREDIT CARD FORM ENDS HERE -->
            <div><form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="business" value="seller@designerfotos.com">
  <input type="hidden" name="item_name" value="hat">
  <input type="hidden" name="item_number" value="123">
  <input type="hidden" name="amount" value="15.00">
  <input type="hidden" name="first_name" value="John">
  <input type="hidden" name="last_name" value="Doe">
  <input type="hidden" name="address1" value="9 Elm Street">
  <input type="hidden" name="address2" value="Apt 5">
  <input type="hidden" name="city" value="Berwyn">
  <input type="hidden" name="state" value="PA">
  <input type="hidden" name="zip" value="19312">
  <input type="hidden" name="night_phone_a" value="610">
  <input type="hidden" name="night_phone_b" value="555">
  <input type="hidden" name="night_phone_c" value="1234">
  <input type="hidden" name="email" value="jdoe@zyzzyu.com">
  <input type="image" name="submit"
    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
    alt="PayPal - The safer, easier way to pay online">
</form></div>


                    <button class="btn btn-as pull-right" onclick="WICheckout.stepFour();">
                        '; echo WILang::get('next') ; echo '
                        <i class="fa fa-arrow-right"></i>
                    </button>
                <div class="clearfix"></div>

                            <script>
    $(function() {
        $("#cardNumber").validateCreditCard(function(result) {
            $(".log").html("Card type: "" + (result.card_type == null ? "-" : result.card_type.name)
                     + "<br>Valid: " + result.valid
                     + "<br>Length valid: " + result.length_valid
                     + "<br>Luhn valid: " + result.luhn_valid);
        });
    });
</script>
            </div>


            <div class="step-content hide" id="step_five">
                <h3>'; echo WILang::get('step6'); echo '</h3>
                <hr>

                <br>
               
                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Item Image</th>
                                            <th>Item Name</th>
                                            <th>Qty</th>
                                            <th>Unit Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                $this->check->confirmOrder(); 
                                    echo '</tbody>
                                </table>

                                <dl class="dl-horizontal pull-right">
                                    <dt>Sub-total:</dt>
                                    <dd id="cust_sub">$999.99</dd>

                                    <dt>Shipping Cost:</dt>
                                    <dd id="cust_ship">$0.01</dd>

                                    <dt>Total:</dt>
                                    <dd id="cust_tot">$1000.00</dd>
                                </dl>
                                <div class="clearfix"></div>
                                



                <br>

                 <button class="btn btn-as pull-right" onclick="WICheckout.install();">
                         '; echo WILang::get('confirm_order') ; echo '
                        <i class="fa fa-arrow-right"></i>
                    </button>
                <div class="clearfix"></div>
            </div>


           



        </div>
    </div>
</div>';

}


						echo '<script type="text/javascript" src="WICore/WIJ/WIEncrypt.js"></script>
						<script type="text/javascript" src="WICore/WIJ/WICheckout.js"></script>
						<script type="text/javascript" src="WICore/WIJ/jquery.creditCardValidator.js"></script>
                        </div>
					</div>
					</div>';

		if(isset($page)){			
		$right_sidePower = $this->Web->pageModPower($page, "right_sidebar");
		$rightSideBar = $this->Web->PageMod($page, "right_sidebar");
		//echo $Panel;
		if ($right_sidePower === 0) {
			
		}else{

			$this->mod->getMod($rightSideBar);
		}

		}			
					

	echo '</div>
			</div>';
	}


}