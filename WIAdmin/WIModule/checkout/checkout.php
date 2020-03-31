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

						 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left"> ';
                         if($this->login->isLoggedIn()){
							
						echo '<div class="wizard col-md-6 col-md-offset-3">
            <div class="steps">
                <ul>
                    <li>
                        <a :class="active">
                            <div class="stepNumber active" id="stepOne"><i class="fa fa-user"></i></div>
                            <span class="stepDesc text-small">'; echo WILang::get('welcoem'); 
                            	echo '
                               </span>
                        </a>
                    </li>
                    <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepTwo"><i class="fa fa-list"></i></div>
                            <span class="stepDesc text-small">'; echo WILang::get('client'); echo '</span>
                        </a>
                    </li>

                     <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepThree"><i class="fa fa-gears"></i></div>
                            <span class="stepDesc text-small">'; echo WILang::get('benefits'); echo '</span>
                        </a>
                    </li>
                    <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepFour"><i class="fa fa-database"></i></div>
                            <span class="stepDesc text-small">'; echo WILang::get('support'); echo '</span>
                        </a>
                    </li>
                    <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepFive"><i class="fa fa-terminal"></i></div>
                            <span class="stepDesc text-small">'; echo WILang::get('refer'); echo '</span>
                        </a>
                    </li>

                     <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepSix"><i class="fa fa-terminal"></i></div>
                            <span class="stepDesc text-small">'; echo WILang::get('admin'); echo '</span>
                        </a>
                    </li>
                     <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepSeven"><i class="fa fa-flag-checkered"></i></div>
                            <span class="stepDesc text-small">'; echo WILang::get('action_taken'); echo '</span>
                        </a>
                    </li>
                    <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepEight"><i class="fa fa-flag-checkered"></i></div>
                            <span class="stepDesc text-small">'; echo WILang::get('complete'); echo '</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 step-content show" id="step_one">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                <h3>'; WILang::get('welcome'); echo '</h3>
                <hr>
                <p>'; echo WILang::get('steps'); echo '</p>
                <p>'; echo WILang::get('guide') ; echo '</p>
                <br>

                <a href="javascript:;" onclick="WIClient.stepOne();" class="btn btn-as pull-right" type="button">
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

                
                    <h3>'; echo WILang::get('personal'); echo '</h3>
                <hr>
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="col-sm-3 col-md-3 col-lg-3 col-xs-3">
                    <div class="form-group">
                        <label for="fname">'; echo WILang::get('fname'); echo '</label>
                        <input type="text" class="form-control" id="fname" value="John">
                        <small>'; echo WILang::get('webdom'); echo '
                            <strong>'; echo WILang::get('donot'); echo '</strong> 
                            '; echo WILang::get('write_path_info'); echo '
                        </small>
                    </div>
                    </div>

                <div class="col-sm-3 col-md-3 col-lg-3 col-xs-3">
                   <div class="form-group">
                        <label for="fam_name">'; echo WILang::get('fam_name'); echo '</label>
                        <input type="text" class="form-control" id="fam_name"
                               v-model="website.fam_name" value="Doe">
                    </div>
                    </div>

                    

                    <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
                     <div class="form-group">
                     <label for="dependants">'; echo WILang::get('dependants'); echo '</label><br>
                        <select id="dependants">
                        	<option id="0" value="0">0</option>
                        	<option id="1" value="1">1</option>
                        	<option id="2" value="2">2</option>
                        	<option id="3" value="3">3</option>
                        	<option id="4" value="4">4</option>
                        	<option id="5" value="5">5</option>
                        	<option id="6" value="6">6</option>
                        	<option id="7" value="7">7</option>
                        </select>
                        <small>'; echo WILang::get('webdom'); echo '
                            <strong>'; echo WILang::get('donot'); echo '</strong> 
                            '; echo WILang::get('write_path_info'); echo '
                        </small>
                    </div>
                    </div>

                    <div class="col-sm-3 col-md-3 col-lg-3 col-xs-3">
                     <div class="form-group">
                        <label for="marital">'; echo WILang::get('marital'); echo '</label>
                        <select id="marital_status">
                        	<option id="Single" value="Single">Single</option>
                        	<option id="Married" value="Married">Married</option>
                        	<option id="Seperated" value="Seperated">Seperated</option>
                        	<option id="Widowed" value="Widowed">Widowed</option>
                        	<option id="dv" value="dv">In Abusive relationship</option>

                        </select>
                        <small>'; echo WILang::get('webdom'); echo '
                            <strong>'; echo WILang::get('donot'); echo '</strong> 
                            '; echo WILang::get('write_path_info'); echo '
                        </small>
                    </div>
                    </div>
                    <br>
                    </div>

                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-sm-3 col-md-3 col-lg-3 col-xs-3">
                    <div class="form-group">
                        <label for="contact_no">'; echo WILang::get('contact_no'); echo '</label>
                        <input type="text" class="form-control" id="contact_no" value="07944556677"
                                value="">
                        <small>'; echo WILang::get('webdom'); echo '
                            <strong>'; echo WILang::get('donot'); echo '</strong> 
                            '; echo WILang::get('write_path_info'); echo '
                        </small>
                    </div>
                    </div>
                    <br>
                    <div class="col-sm-8 col-md-8 col-lg-8 col-xs-8">
                    <label for="dob">'; echo WILang::get('DOB'); echo '</label>
                     <div class="form-group">
                        

                        <select id="Month" class="col-sm-4 col-md-4 col-lg-4 col-xs-4">
                            <option id="January" value="January">January</option>
                            <option id="Febuary" value="Febuary">Febuary</option>
                            <option id="March" value="March">March</option>
                            <option id="April" value="April">April</option>
                            <option id="May" value="May">May</option>
                            <option id="June" value="June">June</option>
                            <option id="July" value="July">July</option>
                            <option id="August" value="August">August</option>
                            <option id="September" value="September">September</option>
                            <option id="October" value="October">October</option>
                            <option id="November" value="November">November</option>
                            <option id="December" value="December">December</option>
                        </select>

                        

                        <input type="text" class="col-sm-4 col-md-4 col-lg-4 col-xs-4" id="date" value="15" placeholder="Date">

                        <input type="text" class="col-sm-4 col-md-4 col-lg-4 col-xs-4" id="year" value="1980" placeholder="Year">
                    </div>
                    </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
					<div class="form-group">
					 <div id="legend">

                        <label>'; echo WILang::get('sex'); echo '</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input type="hidden" name="gender" id="gender" class="btn-group-value" value="male"/>
                        <button type="button" id="sex_true" name="male" value="male"  class="btn">'; echo WILang::get('male'); echo '</button>
                        <button type="button" id="sex_false" name="female" value="female" class="btn activewhens" >'; echo WILang::get('female'); echo '</button>
                    </div>

                    <span class="help-block">'; echo WILang::get('select'); echo WILang::get('http_info'); echo ' </span>


                        <label>'; echo WILang::get('asylum'); echo '</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input type="hidden" name="asylum" id="asylum_seeker" class="btn-group-value" value="no"/>
                        <button type="button" id="asylum_true" name="asylum" value="yes"  class="btn">'; echo WILang::get('yes'); echo '</button>
                        <button type="button" id="asylum_false" name="asylum" value="no" class="btn activewhens" >'; echo WILang::get('no'); echo '</button>
                        
                    </div>
                    <span class="help-block">'; echo WILang::get('select'); echo WILang::get('http_info'); echo ' </span>
                    
                    
                    <label>'; echo WILang::get('reguse'); echo '</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input type="hidden" id="refugee" name="refugee" class="btn-group-value" value="no" />
                        <button id="refugee_true" type="button" name="refugee" value="yes"  class="btn">'; echo WILang::get('yes'); echo '</button>
                        <button id="refugee_false" type="button" name="refugee" value="no" class="btn btn-no" >'; echo WILang::get('no'); echo '</button>
                    </div>
                    <span class="help-block">'; echo WILang::get('prevent'); echo ' <strong'; echo WILang::get('yes'); echo '</strong></span>
                    
                     <label>'; echo WILang::get('localauth'); echo '</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input id="localauth" type="hidden" name="localauth" class="btn-group-value" value="no" />
                        <button id="localauth_true" type="button" name="localauth" value="yes"  class="btn">'; echo WILang::get('yes'); echo '</button>
                        <button id="localauth_false" type="button" name="localauth" value="no" class="btn btn-no" >'; echo WILang::get('no'); echo '</button>
                    </div>
                    <span class="help-block">'; echo WILang::get('localAuth'); echo '<strong>'; echo WILang::get('cookies'); echo '</strong></span>
                   
                     <label>'; echo WILang::get('fundsav'); echo '</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input  id="fundsav" type="hidden" name="fundsav" class="btn-group-value" value="no" />
                        <button id="fundsav_true" type="button" name="fundsav" value="yes"  class="btn">'; echo WILang::get('yes') ; echo '</button>
                        <button id="fundsav_false" type="button" name="fundsav" value="no" class="btn btn-no">'; echo WILang::get('no') ; echo '</button>
                    </div>
                    <span class="help-block">'; echo WILang::get('funds'); echo '</strong></span>
                </div>
            </div>
            </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    

                    <div class="col-sm-7 col-md-7 col-lg-7 col-xs-7">
                    <label for="address">';echo WILang::get('address'); echo '</label>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                        <label for="first_line">'; echo WILang::get('first_line');  echo '</label>
                        <input id="first_line" type="text" value="10 globe lane" placeholder="first line" />
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                        <label for="second_line">'; echo WILang::get('second_line');  echo '</label>
                        <input id="second_line" type="text" value="dukinfield" placeholder="second line" />
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                        <label for="town">'; echo WILang::get('town');  echo '</label>
                        <input id="town" type="text" value="stalybridge" placeholder="town" />
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                        <label for="county">'; echo WILang::get('county'); echo '</label>
                        <input id="county" type="text" value="cheshire" placeholder="county" />
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                        <label for="postcode">'; echo WILang::get('post');  echo '</label>
                        <input id="postcode" type="text" value="sk153hb" placeholder="postcode" />

                        <small>
                            ';echo WILang::get('script_info'); echo '
                            
                        </small>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                    <div class="form-group">
                        <label for="country">'; echo WILang::get('countryO'); echo '</label>';
                        $this->site->countries(); echo '
                        <small>'; echo WILang::get('webdom'); echo '
                            <strong>'; echo WILang::get('donot'); echo '</strong> 
                            '; echo WILang::get('write_path_info'); echo '
                        </small>
                    </div>
                    </div>
                    </div>
                    </div>


                                      <script type="text/javascript">

                       var sex = $("#gender").attr("value");
                       if (sex === "male"){
                        $("#sex_true").removeClass("btn-yes active")
                        $("#sex_false").addClass("btn-no");
                       }else if (sex === "female"){
                        $("#sex_false").removeClass("btn-no active")
                        $("#sex_true").addClass("btn-yes");
                       }


                       var asylum = $("#asylum_seeker").attr("value");
                       if (asylum === "yes"){
                        $("#asylum_true").removeClass("btn-yes active")
                        $("#asylum_false").addClass("btn-no");
                       }else if (asylum === "no"){
                        $("#asylum_false").removeClass("btn-no active")
                        $("#asylum_true").addClass("btn-yes");
                       }

                       var refugee = $("#refugee").attr("value");

                       if (refugee === "no"){
                        $("#refugee_true").removeClass("btn-yes active")
                        $("#refugee_false").addClass("btn-no");
                       }else if (refugee === "yes"){
                        $("#refugee_false").removeClass("btn-no active")
                        $("#refugee_true").addClass("btn-yes");
                       }

                       var localauth = $("#localauth").attr("value");
                       if (localauth === "no"){
                        $("#localauth_true").removeClass("btn-yes active")
                        $("#localauth_false").addClass("btn-no");
                       }else 
                       if (localauth === "yes"){
                        $("#localauth_false").removeClass("btn-no active")
                        $("#localauth_true").addClass("btn-yes");
                       }

                       var fundsav = $("#fundsav").attr("value");
                       if (fundsav === "no"){
                        $("#fundsav_true").removeClass("btn-yes active")
                        $("#fundsav_false").addClass("btn-no");
                       }else if (fundsav === "yes"){
                        $("#fundsav_false").removeClass("btn-no active")
                        $("#fundsav_true").addClass("btn-yes");
                       }
                   
                      </script>
                  

                    <a href="javascript:;" class="btn btn-as pull-right" onclick="WIClient.stepTwo()" type="button" id="required">
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
                
                  <div class="form-group">
                     <label>'; echo WILang::get('jsa'); echo '</label>
                    <div class="btn-group"  data-toggle="buttons-radio">
                        <input type="hidden" name="jsa" id="jsa" class="btn-group-value" value="no"/>
                        <button type="button" id="jsa_true" name="jsa" value="yes"  class="btn">'; echo WILang::get('yes'); echo '</button>
                        <button type="button" id="jsa_false" name="jsa" value="no" class="btn btn-no activewhens" >'; echo WILang::get('no'); echo '</button>
                    </div>

                    <span class="help-block">'; echo WILang::get('select'); echo WILang::get('http_info'); echo ' </span>
                    </div>

					<div class="form-group">
					 <div id="legend">

                        <label>'; echo WILang::get('income_sup'); echo '</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input type="hidden" name="income_sup" id="income_sup" class="btn-group-value" value="no"/>
                        <button type="button" id="income_sup_true" name="income_sup" value="yes"  class="btn">'; echo WILang::get('yes'); echo '</button>
                        <button type="button" id="income_sup_false" name="income_sup" value="no" class="btn btn-no activewhens" >'; echo WILang::get('no'); echo '</button>
                    </div>

                    <span class="help-block">'; echo WILang::get('select'); echo WILang::get('http_info'); echo ' </span>
                    
                    <label>'; echo WILang::get('pension'); echo '</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input type="hidden" id="pension" name="pension" class="btn-group-value" value="no" />
                        <button id="pension_true" type="button" name="pension" value="yes"  class="btn">'; echo WILang::get('yes'); echo '</button>
                        <button id="pension_false" type="button" name="pension" value="no" class="btn btn-no" >'; echo WILang::get('no'); echo '</button>
                    </div>
                    <span class="help-block">'; echo WILang::get('prevent'); echo ' <strong'; echo WILang::get('yes'); echo '</strong></span>
                    
                     <label>'; echo WILang::get('dla'); echo '</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input id="dla" type="hidden" name="dla" class="btn-group-value" value="no" />
                        <button id="dla_true" type="button" name="dla" value="yes"  class="btn">'; echo WILang::get('yes'); echo '</button>
                        <button id="dla_false" type="button" name="dla" value="no" class="btn btn-no" >'; echo WILang::get('no'); echo '</button>
                    </div>
                    <span class="help-block"></span>
                   
                     <label>'; echo WILang::get('nass'); echo '</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input  id="nass" type="hidden" name="nass" class="btn-group-value" value="no" />
                        <button id="nass_true" type="button" name="nass" value="yes"  class="btn">'; echo WILang::get('yes') ; echo '</button>
                        <button id="nass_false" type="button" name="nass" value="no" class="btn btn-no">'; echo WILang::get('no') ; echo '</button>
                    </div>
                    <span class="help-block">'; echo WILang::get('funds'); echo '</strong></span>

                    <label>'; echo WILang::get('incap'); echo '</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input  id="incap" type="hidden" name="incap" class="btn-group-value" value="no" />
                        <button id="incap_true" type="button" name="incap" value="yes"  class="btn">'; echo WILang::get('yes') ; echo '</button>
                        <button id="incap_false" type="button" name="incap" value="no" class="btn btn-no">'; echo WILang::get('no') ; echo '</button>
                    </div>
                    <span class="help-block">'; echo WILang::get('funds'); echo '</strong></span>

                    <label>'; echo WILang::get('none'); echo '</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input  id="none" type="hidden" name="none" class="btn-group-value" value="no" />
                        <button id="none_true" type="button" name="none" value="yes"  class="btn">'; echo WILang::get('yes') ; echo '</button>
                        <button id="none_false" type="button" name="none" value="no" class="btn btn-no">'; echo WILang::get('no') ; echo '</button>
                    </div>
                    <span class="help-block">'; echo WILang::get('funds'); echo '</strong></span>
                </div>
            </div>

                    <script type="text/javascript">
                       var jsa = $("#jsa").attr("value");
                       if (jsa === "no"){
                        $("#jsa_true").removeClass("btn-yes active")
                        $("#jsa_false").addClass("btn-no");
                       }else if (jsa === "yes"){
                        $("#jsa_false").removeClass("btn-no")
                        $("#jsa_true").addClass("btn-yes active");
                       }

                       var income_sup = $("#income_sup").attr("value");

                       if (income_sup === "no"){
                        $("#income_sup_true").removeClass("btn-yes active")
                        $("#income_sup_false").addClass("btn-no");
                       }else if (income_sup === "yes"){
                        $("#income_sup_false").removeClass("btn-no")
                        $("#income_sup_true").addClass("btn-yes active");
                       }

                       var pension = $("#pension").attr("value");
                       if (pension === "false"){
                        $("#pension_true").removeClass("btn-yes active")
                        $("#pension_false").addClass("btn-no");
                       }else 
                       if (pension === "true"){
                        $("#pension_false").removeClass("btn-no")
                        $("#pension_true").addClass("btn-yes active");
                       }

                       var dla = $("#dla").attr("value");
                       if (dla === "yes"){
                        $("#dla_true").removeClass("btn-yes active")
                        $("#dla_false").addClass("btn-no");
                       }else if (dla === "no"){
                        $("#dla_false").removeClass("btn-no")
                        $("#dla_true").addClass("btn-yes active");
                       }

                       var nass = $("#nass").attr("value");
                       if (nass === "no"){
                        $("#nass_true").removeClass("btn-yes active")
                        $("#nass_false").addClass("btn-no");
                       }else 
                       if (nass === "yes"){
                        $("#nass_false").removeClass("btn-no")
                        $("#nass_true").addClass("btn-yes active");
                       }

                       var none = $("#none").attr("value");
                       if (none === "no"){
                        $("#none_true").removeClass("btn-yes active")
                        $("#none_false").addClass("btn-no");
                       }else if (none === "yes"){
                        $("#none_false").removeClass("btn-no")
                        $("#none_true").addClass("btn-yes active");
                       }
                   
                      </script>

               

                <button class="btn btn-as pull-right" onclick="WIClient.stepThree();" type="button">
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

               <div class="form-group">
                     <label>'; echo WILang::get('furn'); echo '</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input type="hidden" name="furn" id="furn" class="btn-group-value" value="no"/>
                        <button type="button" id="furn_true" name="furn" value="yes"  class="btn">'; echo WILang::get('yes'); echo '</button>
                        <button type="button" id="furn_false" name="furn" value="no" class="btn btn-no activewhens" >'; echo WILang::get('no'); echo '</button>
                    </div>

                    <span class="help-block">'; echo WILang::get('select'); echo WILang::get('http_info'); echo ' </span>
                    </div>

					<div class="form-group">
					 <div id="legend">

                        <label>'; echo WILang::get('bedding'); echo '</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input type="hidden" name="bedding" id="bedding" class="btn-group-value" value="no"/>
                        <button type="button" id="bedding_true" name="bedding" value="yes"  class="btn">'; echo WILang::get('yes'); echo '</button>
                        <button type="button" id="bedding_false" name="bedding" value="no" class="btn btn-no activewhens" >'; echo WILang::get('no'); echo '</button>
                    </div>

                    <span class="help-block">'; echo WILang::get('select'); echo WILang::get('http_info'); echo ' </span>
                    
                    <label>'; echo WILang::get('cloths'); echo '</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input type="hidden" id="cloths" name="cloths" class="btn-group-value" value=" no" />
                        <button id="cloths_true" type="button" name="cloths" value="yes"  class="btn">'; echo WILang::get('yes'); echo '</button>
                        <button id="cloths_false" type="button" name="cloths" value="no" class="btn btn-no" >'; echo WILang::get('no'); echo '</button>
                    </div>
                    <span class="help-block">'; echo WILang::get('prevent'); echo ' <strong'; echo WILang::get('yes'); echo '</strong></span>
                    
                     <label>'; echo WILang::get('training'); echo '</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input id="training" type="hidden" name="training" class="btn-group-value" value="no" />
                        <button id="training_true" type="button" name="training" value="yes"  class="btn">'; echo WILang::get('yes'); echo '</button>
                        <button id="training_false" type="button" name="training" value="no" class="btn btn-no" >'; echo WILang::get('no'); echo '</button>
                    </div>
                    <span class="help-block">'; echo WILang::get('localAuth'); echo '<strong>'; echo WILang::get('cookies'); echo '</strong></span>
                   
                     <label>'; echo WILang::get('food'); echo '</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input  id="food" type="hidden" name="food" class="btn-group-value" value="no" />
                        <button id="food_true" type="button" name="food" value="yes"  class="btn">'; echo WILang::get('yes') ; echo '</button>
                        <button id="food_false" type="button" name="food" value="no" class="btn btn-no">'; echo WILang::get('no') ; echo '</button>
                    </div>
                    <span class="help-block">'; echo WILang::get('funds'); echo '</strong></span>

                    <label>'; echo WILang::get('room'); echo '</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input  id="room" type="hidden" name="room" class="btn-group-value" value="no" />
                        <button id="room_true" type="button" name="room" value="yes"  class="btn">'; echo WILang::get('yes') ; echo '</button>
                        <button id="room_false" type="button" name="room" value="no" class="btn btn-no">'; echo WILang::get('no') ; echo '</button>
                    </div>
                    <span class="help-block">'; echo WILang::get('funds'); echo '</strong></span>

                    <label>'; echo WILang::get('house'); echo '</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input  id="house" type="hidden" name="house" class="btn-group-value" value="no" />
                        <button id="house_true" type="button" name="house" value="yes"  class="btn">'; echo WILang::get('yes') ; echo '</button>
                        <button id="house_false" type="button" name="house" value="no" class="btn btn-no">'; echo WILang::get('no') ; echo '</button>
                    </div>
                    <span class="help-block">'; echo WILang::get('funds'); echo '</strong></span>
                </div>
            </div>


                                      <script type="text/javascript">
                       var furn = $("#furn").attr("value");
                       if (furn === "no"){
                        $("#furn_true").removeClass("btn-yes active")
                        $("#furn_false").addClass("btn-no");
                       }else if (furn === "yes"){
                        $("#furn_false").removeClass("btn-no")
                        $("#furn_true").addClass("btn-yes active");
                       }

                       var bedding = $("#bedding").attr("value");

                       if (bedding === "no"){
                        $("#bedding_true").removeClass("btn-yes active")
                        $("#bedding_false").addClass("btn-no");
                       }else if (bedding === "yes"){
                        $("#bedding_false").removeClass("btn-no")
                        $("#bedding_true").addClass("btn-yes active");
                       }

                       var cloths = $("#cloths").attr("value");
                       if (cloths === "no"){
                        $("#cloths_true").removeClass("btn-yes active")
                        $("#cloths_false").addClass("btn-no");
                       }else 
                       if (cloths === "yes"){
                        $("#cloths_false").removeClass("btn-no")
                        $("#cloths_true").addClass("btn-yes active");
                       }

                       var food = $("#food").attr("value");
                       if (food === "yes"){
                        $("#food_true").removeClass("btn-yes active")
                        $("#food_false").addClass("btn-no");
                       }else if (food === "no"){
                        $("#food_false").removeClass("btn-no")
                        $("#food_true").addClass("btn-yes active");
                       }

                       var room = $("#room").attr("value");
                       if (room === "yes"){
                        $("#room_true").removeClass("btn-yes active")
                        $("#room_false").addClass("btn-no");
                       }else if (room === "no"){
                        $("#room_false").removeClass("btn-no")
                        $("#room_true").addClass("btn-yes active");
                       }

                       var house = $("#house").attr("value");
                       if (house === "yes"){
                        $("#house_true").removeClass("btn-yes active")
                        $("#house_false").addClass("btn-no");
                       }else if (house === "no"){
                        $("#house_false").removeClass("btn-no")
                        $("#house_true").addClass("btn-yes active");
                       }
                   
                      </script>
               

                <button class="btn btn-as pull-right" onclick="WIClient.stepFour();" type="button">
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


                     <div class="form-group">
                        <label for="name">'; echo WILang::get('name'); echo '</label>
                        <input type="text" class="form-control" id="name"
                               v-model="website.name" value="Doe">
                    </div>

                     <div class="form-group">
                        <label for="agency">'; echo WILang::get('agency'); echo '</label>
                        <input type="text" class="form-control" id="agency"
                               v-model="agency.name" value="Doe">
                    </div>

                     <div class="form-group">
                        <label for="contact_num">'; echo WILang::get('contact_num'); echo '</label>
                        <input type="text" class="form-control" id="contact_num"
                               v-model="website.contact_num" value="079566854">
                    </div>
                    

                    <button class="btn btn-as pull-right" onclick="WIClient.stepFive();">
                        '; echo WILang::get('next') ; echo '
                        <i class="fa fa-arrow-right"></i>
                    </button>
                <div class="clearfix"></div>
            </div>


            <div class="step-content hide" id="step_six">
                <h3>'; echo WILang::get('admin'); echo '</h3>
                <hr>

                <br>
                <div class="form-group">
                        <label for="adname">'; echo WILang::get('adname'); echo '</label>
                        <input type="text" class="form-control" id="adname"
                               v-model="website.adname" value="Doe">
                    </div>

                     <div class="form-group">
                        <label for="idprov">'; echo WILang::get('idprov'); echo '</label>
                        <input type="text" class="form-control" id="idprov"
                               v-model="website.idprov" value="Doe">
                    </div>

                     <div class="form-group">
                        <label for="clibud">'; echo WILang::get('clibud'); echo '</label>
                        <input type="text" class="form-control" id="clibud"
                               v-model="website.clibud" value="">
                    </div>

                     <div class="form-group">
                     <label>'; echo WILang::get('furnPak'); echo '</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input type="hidden" name="furnPak" id="furnPak" class="btn-group-value" value="no"/>
                        <button type="button" id="furnPak_true" name="furnPak" value="yes"  class="btn">'; echo WILang::get('yes'); echo '</button>
                        <button type="button" id="furnPak_false" name="furnPak" value="no" class="btn btn-no activewhens" >'; echo WILang::get('no'); echo '</button>
                    </div>

                    <span class="help-block">'; echo WILang::get('select'); echo WILang::get('http_info'); echo ' </span>
                    </div>

                    <div class="form-group">
                     <label>'; echo WILang::get('gifting'); echo '</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input type="hidden" name="gifting" id="gifting" class="btn-group-value" value="no"/>
                        <button type="button" id="gifting_true" name="gifting" value="yes"  class="btn">'; echo WILang::get('yes'); echo '</button>
                        <button type="button" id="gifting_false" name="gifting" value="no" class="btn btn-no activewhens" >'; echo WILang::get('no'); echo '</button>
                    </div>

                    <span class="help-block">'; echo WILang::get('select'); echo WILang::get('http_info'); echo ' </span>
                    </div>

                    <div class="form-group">
                        <label for="databy">'; echo WILang::get('databy'); echo '</label>
                        <input type="text" class="form-control" id="databy"
                               v-model="website.databy" value="Doe">
                    </div>
                                                          <script type="text/javascript">


                       var furnPak = $("#furnPak").attr("value");
                       if (furnPak === "yes"){
                        $("#furnPak_true").removeClass("btn-yes active")
                        $("#furnPak_false").addClass("btn-no");
                       }else if (furnPak === "no"){
                        $("#furnPak_false").removeClass("btn-no")
                        $("#furnPak_true").addClass("btn-yes active");
                       }

                       var gifting = $("#gifting").attr("value");
                       if (gifting === "yes"){
                        $("#gifting_true").removeClass("btn-yes active")
                        $("#gifting_false").addClass("btn-no");
                       }else if (gifting === "no"){
                        $("#gifting_false").removeClass("btn-no")
                        $("#gifting_true").addClass("btn-yes active");
                       }
                   
                      </script>


                <br>

                 <button class="btn btn-as pull-right" onclick="WIClient.stepSix();">
                         '; echo WILang::get('next') ; echo '
                        <i class="fa fa-arrow-right"></i>
                    </button>
                <div class="clearfix"></div>
            </div>


            <div class="step-content hide" id="step_seven">
                <h3>'; echo WILang::get('Next'); echo '</h3>
                <hr>
                <p id="date" class="hide"></p>
<div id="clock" class="hide">
  <p class="unit" id="time"></p>

</div>
                
                <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                   <div class="form-group">
                        <label for="action_taken">'; echo WILang::get('action_taken'); echo '</label>
                        <textarea type="text" class="form-control" id="action_taken"
                               v-model="website.action_taken" value="Doe">
                    </textarea>
                    </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                   <div class="form-group">
                        <label for="outcome">'; echo WILang::get('outcome'); echo '</label>
                        <textarea type="text" class="form-control" id="outcome"
                               v-model="website.outcome" value="Doe"></textarea>
                    </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                   <div class="form-group">
                        <label for="full_name">'; echo WILang::get('full_name'); echo '</label>
                        <input type="text" class="form-control" id="full_name"
                               v-model="website.full_name" value="Doe">
                    </div>
                    </div>

                <br>

               <button class="btn btn-as pull-right" onclick="WIClient.install();">
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

                <button class="btn btn-as pull-right" onclick="WIClient.stepreturn();">
                        <span class="show" id="next">
                        '; echo WILang::get('next'); echo '
                        
                        <i class="fa fa-arrow-right" ></i>
                    </span>
                    </button>
                <div class="clearfix"></div>
            </div>



        </div>
    </div>
</div>'; }else{
    echo "please log in or register";
}


						echo '</div>
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