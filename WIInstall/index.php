<?php
include_once 'WICore/init.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title><?php echo WILang::get('install') ?>| <?php echo WILang::get('wicms') ?></title>

    <link rel='stylesheet' href='../WITheme/WICMS/site/css/frameworks/bootstrap.css' type='text/css' />
    <link rel='stylesheet' href='../WITheme/WICMS/site/css/font-awesome.css' type='text/css' />
    <link rel='stylesheet' href='WIInc/css/install.css' type='text/css' />
    <script type="text/javascript" src="../WITheme/WICMS/site/js/frameworks/JQuery.js"></script>
<script type="text/javascript" src="../WITheme/WICMS/site/js/frameworks/bootstrap.js"></script>
</head>
<body>

<style type="text/css">
	.hide{
		display: none;
	}

	.show{
		display: block;
	}
    .active{
        background-color: #38e238 !important;
    }

    .inactive{
        background-color: #ff6565 !important;
    }

    .passActive{
 background-color: #38e238 !important;
    }

    .fade{
        opacity: 0.5!important;
    }

</style>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 logo-wrapper">
                <img src="../WIAdmin/WIMedia/Img/header/wi_cms_logo.jpg" alt="WICMS" Security" class="logo" style="width: 50%; height: 50px;">
            </div>
        </div>
        <div class="top_head">
            <div class="container">
            <div class="col-lg-4 col-md-6 col-sm-6 lang">
                         <div class="flags-wrapper">
             <div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: `en`, layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, `google_translate_element`);
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                         </div>
         </div>
                    </div><!-- end col-lg-6 col-md-6 col-sm-6-->
                    <!--  search area-->
                   
                </div>
            </div>
        </div>


        <div class="wizard col-md-6 col-md-offset-3">
            <div class="steps">
                <ul>
                    <li>
                        <a :class="active">
                            <div class="stepNumber active" id="stepOne"><i class="fa fa-home"></i></div>
                            <span class="stepDesc text-small"> <?php echo WILang::get('welcome') ?>   </span>
                        </a>
                    </li>
                    <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepTwo"><i class="fa fa-list"></i></div>
                            <span class="stepDesc text-small"><?php echo WILang::get('requirements') ?></span>
                        </a>
                    </li>

                     <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepThree"><i class="fa fa-gears"></i></div>
                            <span class="stepDesc text-small"><?php echo WILang::get('options') ?></span>
                        </a>
                    </li>
                    <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepFour"><i class="fa fa-gears"></i></div>
                            <span class="stepDesc text-small"><?php echo WILang::get('social') ?></span>
                        </a>
                    </li>
                    <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepFive"><i class="fa fa-database"></i></div>
                            <span class="stepDesc text-small"><?php echo WILang::get('database') ?></span>
                        </a>
                    </li>
                    <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepSix"><i class="fa fa-terminal"></i></div>
                            <span class="stepDesc text-small"><?php echo WILang::get('install') ?></span>
                        </a>
                    </li>
                    <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepSeven"><i class="fa fa-flag-checkered"></i></div>
                            <span class="stepDesc text-small"><?php echo WILang::get('complete') ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <!--  Step One -->
            <div class="step-content show" id="step_one">
                <h3><?php echo WILang::get('welcome') ?></h3>
                <hr>
                <?php echo $installer; ?>
                <p><?php echo WILang::get('steps') ?></p>
                <p><?php echo WILang::get('guide') ?> </p>
                <br>

                <a href="javascript:;" onclick="WIInstall.stepOne();" class="btn btn-as pull-right" type="button">
                    <?php echo WILang::get('next') ?>
                    <i class="fa fa-arrow-right"></i>
                </a>
                <div class="clearfix"></div>
            </div>

            <!-- Step Two -->
            <div class="step-content hide" id="step_two">
            <div>
                <div class="alert alert-danger hide" id="snap" >
                    <strong><?php echo WILang::get('next') ?></strong> 
                    <?php echo WILang::get('requirements_error') ?>
                </div>

                
                    <h3>System Requirements</h3>
                    <hr>
                    <div >
                    <ul class="list-group">
                        <li class="list-group-item" id="requirements-php-version"></li>
                        <li class="list-group-item" id="requirements-pdo"></li>
                        <li class="list-group-item" id="requirements-mysql"></li>
                        <li class="list-group-item" id="requirements-curl"></li>
                        <li class="list-group-item" id="requirements-write"></li>
                    </ul>
                    </div>

                    <a href="javascript:;" class="btn btn-as pull-right" onclick="WIInstall.stepTwo()" type="button" id="required">
                        <?php echo WILang::get('next') ?>
                        <i class="fa fa-arrow-right"></i>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>

            <!-- Step Three-->
             <div class="step-content hide" id="step_three">
                <h3><?php echo WILang::get('options') ?></h3>
                <hr>

                   <div class="form-group">
                        <label for="website_name"><?php echo WILang::get('webname') ?></label>
                        <input type="text" class="form-control" id="website_name"
                               v-model="website.name" value="WICMS">
                    </div>

                    <div class="form-group">
                        <label for="domain"><?php echo WILang::get('webdom') ?></label>
                        <input type="text" class="form-control" id="domain"
                                value="<?php echo $_SERVER['HTTP_HOST']; ?>">
                        <small><?php echo WILang::get('webdom') ?>
                            <strong><?php echo WILang::get('donot') ?></strong> 
                            <?php echo WILang::get('write_path_info') ?>
                        </small>
                    </div>

                    <div class="form-group">
                        <label for="script"><?php echo WILang::get('script') ?></label>
                        <input type="text" class="form-control" id="script"
                                value="<?php echo $_SERVER['HTTP_HOST']; ?>">
                        <small>
                            <?php echo WILang::get('script_info') ?>
                            
                        </small>
                    </div>
<div class="form-group">
 <div id="legend">

                        <label><?php echo WILang::get('session') ?></label>
                    <div class="btn-group" id="session_secure_only" data-toggle="buttons-radio">
                        <input type="hidden" name="session_secure" id="secure_session" class="btn-group-value" value="false"/>
                        <button type="button" id="session_secure_true" name="session_secure" value="true"  class="btn"><?php echo WILang::get('yes') ?></button>
                        <button type="button" id="session_secure_false" name="session_secure" value="false" class="btn btn-danger activewhens" ><?php echo WILang::get('no') ?></button>
                    </div>

                    <span class="help-block"> <?php echo WILang::get('select') ?><strong><?php echo WILang::get('yes') ?></strong><?php echo WILang::get('http_info') ?> </span>
                    
                    <label><?php echo WILang::get('http') ?></label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input type="hidden" id="session_http_only" name="session_http_only" class="btn-group-value" value="false" />
                        <button id="http_only_true" type="button" name="session_http_only" value="true"  class="btn btn-success active"><?php echo WILang::get('yes') ?></button>
                        <button id="http_only_false" type="button" name="session_http_only" value="false" class="btn" ><?php echo WILang::get('no') ?></button>
                    </div>
                    <span class="help-block"><?php echo WILang::get('prevent') ?> <strong><?php echo WILang::get('yes') ?></strong></span>
                    
                     <label><?php echo WILang::get('sesreg') ?></label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input id="session_regenerate" type="hidden" name="session_regenerate_id" class="btn-group-value" value="false" />
                        <button id="session_regenerate_true" type="button" name="session_regenerate_id" value="true"  class="btn btn-success active"><?php echo WILang::get('yes') ?></button>
                        <button id="session_regenerate_false" type="button" name="session_regenerate_id" value="false" class="btn" ><?php echo WILang::get('no') ?></button>
                    </div>
                    <span class="help-block"> <?php echo WILang::get('force') ?><strong><?php echo WILang::get('cookies') ?></strong></span>
                   
                     <label><?php echo WILang::get('cookies') ?></label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input  id="cookieonly" type="hidden" name="session_use_only_cookies" class="btn-group-value" value="0" />
                        <button id="cookieonly_true" type="button" name="session_use_only_cookies" value="1"  class="btn btn-success active"><?php echo WILang::get('yes') ?></button>
                        <button id="cookieonly_false" type="button" name="session_use_only_cookies" value="0" class="btn"><?php echo WILang::get('no') ?></button>
                    </div>
                    <span class="help-block"><?php echo WILang::get('enable') ?> <strong><?php echo WILang::get('yes') ?></strong></span>
                </div>
            </div>
<div class="form-group">
                <label for="login_fingerprint"><?php echo WILang::get('finger') ?></label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input id="login_fingerprint" type="hidden" name="login_fingerprint" class="btn-group-value" value="true"/>
                        <button id="fingerPrint_true" type="button" name="login_fingerprint" value="true"  class="btn btn-success active"><?php echo WILang::get('yes') ?></button>
                        <button id="fingerPrint_false" type="button" name="login_fingerprint" value="false" class="btn" ><?php echo WILang::get('no') ?></button>
                    </div>
                    <span class="help-block">
                       <?php echo WILang::get('if_select') ?> <strong><?php echo WILang::get('yes') ?></strong>,<?php echo WILang::get('userLoginInfo') ?><br />
                        <strong><?php echo WILang::get('note') ?> </strong><?php echo WILang::get('cuaseProblem') ?> <br /><?php echo WILang::get('recommended') ?>
                         <strong><?php echo WILang::get('yes') ?></strong>
                    </span>
                </div>

                                      <script type="text/javascript">
                       var secure = $("#secure_session").attr('value');
                       if (secure === "false"){
                        $("#session_secure_true").removeClass('btn-success active')
                        $("#session_secure_false").addClass('btn-danger');
                       }else if (secure === "true"){
                        $("#session_secure_false").removeClass('btn-danger')
                        $("#session_secure_true").addClass('btn-success active');
                       }

                       var http_only = $("#session_http_only").attr('value');

                       if (http_only === "false"){
                        $("#http_only_true").removeClass('btn-success active')
                        $("#http_only_false").addClass('btn-danger');
                       }else if (http_only === "true"){
                        $("#http_only_false").removeClass('btn-danger')
                        $("#http_only_true").addClass('btn-success active');
                       }

                       var regenerate = $("#session_regenerate").attr('value');
                       if (regenerate === "false"){
                        $("#session_regenerate_true").removeClass('btn-success active')
                        $("#session_regenerate_false").addClass('btn-danger');
                       }else 
                       if (regenerate === "true"){
                        $("#session_regenerate_false").removeClass('btn-danger')
                        $("#session_regenerate_true").addClass('btn-success active');
                       }

                       var cookie = $("#cookieonly").attr('value');
                       if (cookie === "0"){
                        $("#cookieonly_true").removeClass('btn-success active')
                        $("#cookieonly_false").addClass('btn-danger');
                       }else if (cookie === "1"){
                        $("#cookieonly_false").removeClass('btn-danger')
                        $("#cookieonly_true").addClass('btn-success active');
                       }
                   
                      </script>
                    <div class="form-group">
                    <label for="max_login_attempts"><?php echo WILang::get('max_login') ?></label>
                    <div class="input-prepend">
                      <span class="add-on"></span>
                      <select name="max_login_attempts" id="max_login_attempts">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                      </select>
                    </div>
                    <span class="help-block"><?php echo WILang::get('max_login') ?>
                        <br />
                        <?php echo WILang::get('prevent') ?> <strong><?php echo WILang::get('brute_force') ?></strong> <?php echo WILang::get('attacks') ?>  
                    </span>
                </div>
<div class="form-group">
                    <label for="redirect_after_login"><?php echo WILang::get('redirect_after') ?></label>
                    <div class="input-prepend">
                        <input type="text" class="input-xlarge" name="redirect_after_login" id="redirect_after_login" value="WIMembers/profile.php" />
                    </div>
                    <span class="help-block"><?php echo WILang::get('redirect_info') ?>
                        
                    </span>
                </div>



                <div class="form-group">
                    <label for="salt"><?php echo WILang::get('salt') ?></label>
                    <div class="input-prepend">
                        <input type="text" class="input-xlarge" name="salt" id="salt" value="<?php echo uniqid(mt_rand(), true);  ?>" />
                    </div>
                    <span class="help-block"><?php echo WILang::get('salt_info') ?>
                        
                    </span>
                </div>
               
<div class="form-group">
                 <div class="alert alert-success" id="choice-wrapper-bcrypt">
                    <input type="hidden" name="encryption" id="encryption-method" value="bcrypt">
                              
                        <div class="radio">
                              <input type="radio" name="encryption" id="encryption-bcrypt" value="bcrypt" checked><?php echo WILang::get('bcrypt') ?>
                              
                        </div>
                        <br />
                        <span class="help-block"><?php echo WILang::get('bcrypt_info') ?>
                             <br />
                            <strong><?php echo WILang::get('note') ?></strong> <?php echo WILang::get('bcrypt_info1') ?> <br />
                            It's <strong><?php echo WILang::get('recommended') ?></strong><?php echo WILang::get('bcrypt_info2') ?> <strong>10</strong> <?php echo WILang::get('and') ?> <strong>15</strong> <?php echo WILang::get('bcrypt_info3') ?>
                            <br /><?php echo WILang::get('bcrypt_info4') ?>
                            
                        </span>
                        <p><?php echo WILang::get('cost') ?></p>
                        <select class="form-control" name="bcrypt_cost" id="bcrypt_cost">
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                    
                    <div class="alert alert-error" id="choice-wrapper-sha">
                        <div class="radio">
                              <input type="radio" name="encryption" id="encryption-sha512" value="sha512">
                              <?php echo WILang::get('sha512') ?>
                        </div>  
                        <br />
                        <span class="help-block"><?php echo WILang::get('sha_info') ?>
                             <br />
                             <strong><?php echo WILang::get('note') ?></strong><?php echo WILang::get('sha') ?>  <br />
                             Its <strong><?php echo WILang::get('recommended') ?></strong> <?php echo WILang::get('iter') ?>to select number of iterations between <strong>30000</strong> <?php echo WILang::get('and') ?> <strong>60000</strong>. <br /><?php echo WILang::get('moreiter') ?>
                             
                        </span>
                        <p><?php echo WILang::get('iterations') ?></p>
                        <select class="form-control" name="sha512_iterations" id="costing_sha512">
                            <option value="10000">10000</option>
                            <option value="15000">15000</option>
                            <option value="20000">20000</option>
                            <option value="25000">25000</option>
                            <option value="30000">30000</option>
                            <option value="35000">35000</option>
                            <option value="40000">40000</option>
                            <option value="45000">45000</option>
                            <option value="50000">50000</option>
                            <option value="55000">55000</option>
                            <option value="60000">60000</option>
                            <option value="65000">65000</option>
                            <option value="70000">70000</option>
                            <option value="75000">75000</option>
                            <option value="80000">80000</option>
                            <option value="85000">85000</option>
                            <option value="90000">90000</option>
                            <option value="95000">95000</option>
                            <option value="10000">10000</option>
                        </select>
                    </div>
                </div>

                  <script type="text/javascript">
               var encryption = $("#encryption-method").attr('value');

                          if (encryption === "bcrypt"){
                            $("#encryption-bcrypt").attr('checked', 'checked');
                            $("#choice-wrapper-bcrypt").addClass('alert-success');
                            $("#choice-wrapper-sha").addClass('alert-error');



                          }else if(encryption === "sha512"){
                            $("#encryption-sha512").attr('checked', 'checked');
                            $("#choice-wrapper-sha").addClass('alert-success');
                            $("#choice-wrapper-bcrypt").addClass('alert-error');

                          }

                          var cost = $("#encryption-cost").attr('value');
                         // alert(cost);
                          $("#bcrypt_cost").val(cost).prop("selected", "selected");


                          var iteration = $("#encryption-iteration").attr('value')
                          $("#costing_sha512").val(iteration).prop("selected", "selected");

                        
                      </script>

                    <div class="form-group">

                    <label>Default lang</label>

                    <select placeholder="Choose a Language..." id="default_lang">
                  <option value="AF">Afrikaans</option>
                  <option value="SQ">Albanian</option>
                  <option value="AR">Arabic</option>
                  <option value="HY">Armenian</option>
                  <option value="EU">Basque</option>
                  <option value="BN">Bengali</option>
                  <option value="BG">Bulgarian</option>
                  <option value="CA">Catalan</option>
                  <option value="KM">Cambodian</option>
                  <option value="ZH">Chinese (Mandarin)</option>
                  <option value="HR">Croatian</option>
                  <option value="CS">Czech</option>
                  <option value="DA">Danish</option>
                  <option value="NL">Dutch</option>
                  <option value="EN">English</option>
                  <option value="ET">Estonian</option>
                  <option value="FJ">Fiji</option>
                  <option value="FI">Finnish</option>
                  <option value="FR">French</option>
                  <option value="KA">Georgian</option>
                  <option value="DE">German</option>
                  <option value="EL">Greek</option>
                  <option value="GU">Gujarati</option>
                  <option value="HE">Hebrew</option>
                  <option value="HI">Hindi</option>
                  <option value="HU">Hungarian</option>
                  <option value="IS">Icelandic</option>
                  <option value="ID">Indonesian</option>
                  <option value="GA">Irish</option>
                  <option value="IT">Italian</option>
                  <option value="JA">Japanese</option>
                  <option value="JW">Javanese</option>
                  <option value="KO">Korean</option>
                  <option value="LA">Latin</option>
                  <option value="LV">Latvian</option>
                  <option value="LT">Lithuanian</option>
                  <option value="MK">Macedonian</option>
                  <option value="MS">Malay</option>
                  <option value="ML">Malayalam</option>
                  <option value="MT">Maltese</option>
                  <option value="MI">Maori</option>
                  <option value="MR">Marathi</option>
                  <option value="MN">Mongolian</option>
                  <option value="NE">Nepali</option>
                  <option value="NO">Norwegian</option>
                  <option value="FA">Persian</option>
                  <option value="PL">Polish</option>
                  <option value="PT">Portuguese</option>
                  <option value="PA">Punjabi</option>
                  <option value="QU">Quechua</option>
                  <option value="RO">Romanian</option>
                  <option value="RU">Russian</option>
                  <option value="SM">Samoan</option>
                  <option value="SR">Serbian</option>
                  <option value="SK">Slovak</option>
                  <option value="SL">Slovenian</option>
                  <option value="ES">Spanish</option>
                  <option value="SW">Swahili</option>
                  <option value="SV">Swedish </option>
                  <option value="TA">Tamil</option>
                  <option value="TT">Tatar</option>
                  <option value="TE">Telugu</option>
                  <option value="TH">Thai</option>
                  <option value="BO">Tibetan</option>
                  <option value="TO">Tonga</option>
                  <option value="TR">Turkish</option>
                  <option value="UK">Ukrainian</option>
                  <option value="UR">Urdu</option>
                  <option value="UZ">Uzbek</option>
                  <option value="VI">Vietnamese</option>
                  <option value="CY">Welsh</option>
                  <option value="XH">Xhosa</option>
                </select>

                <hr>
                    <label>multilang</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input type="hidden" name="multilang" class="btn-group-value" id="multilang" value="false" />
                        <label class="switch">
                        <input type="checkbox" id="mlang">
                        <span class="slider round" id="langy" style="padding-left: 48%; padding-top: 11%;">OFF</span>
                      </label>
                    </div>

                    <hr>

                    <label>email required sign in</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input type="hidden" name="email_required" class="btn-group-value" id="email_required" value="false" />
                        <label class="switch">
                        <input type="checkbox" id="email_log">
                        <span class="slider round" id="email" style="padding-left: 48%; padding-top: 11%;">OFF</span>
                      </label>
                    </div>
                         <span class="help-block"><?php echo WILang::get('email_required') ?>
                             <br />
                        </span>

                </div>


                <script type="text/javascript">
                    var default_lang = $("#default_lang").attr('value');
                         // alert(cost);
                          $("#default_lang").val(default_lang).prop("selected", "selected");


                              $("#langy").click(function(){
                            //alert('clicked');
                            var multilang = $("#multilang").attr("value")
                            
                            if (multilang === "false"){
                            $("#mlang").prop("checked", true);
                            $("#langy").text('ON');
                            $("#langy").css('padding-left', '8%');
                            $("#langy").css('padding-top', '7%');
                            $("#multilang").attr("value", 'true');
                           }else if (multilang === "true"){
                            $("#mlang").prop("checked", false);
                            $("#multilang").attr("value", 'false');
                            $("#langy").text('OFF');
                            $("#langy").css('padding-left', '48%');
                            $("#langy").css('padding-top', '11%');
                           }
                        })

                                $("#email").click(function(){
                            //alert('clicked');
                            var email_required = $("#email_required").attr("value")
                            
                            if (email_required === "false"){
                            $("#email_log").prop("checked", true);
                            $("#email").text('ON');
                            $("#email").css('padding-left', '8%');
                            $("#email").css('padding-top', '7%');
                            $("#multilang").attr("value", 'true');
                           }else if (email_required === "true"){
                            $("#email_log").prop("checked", false);
                            $("#email_required").attr("value", 'false');
                            $("#email").text('OFF');
                            $("#email").css('padding-left', '48%');
                            $("#email").css('padding-top', '11%');
                           }
                        })
                </script>

                    
                     <label for="mailer"><?php echo WILang::get('mailer') ?></label>
                    <select name="mailer" id="mailer">
                        <option value="mailer">PHP mail</option>
                        <option value="smtp"><?php echo WILang::get('smtp') ?></option>
                    </select>

            
                   <div id="smtp-wrapper" style="display:none;">
                        <label for="smtp_host"><?php echo WILang::get('smtp_host') ?></label>
                        <input type="text" class="input-xlarge" id="smtp_host" name="smtp_host">

                        <label for="smtp_port"><?php echo WILang::get('smtp_port') ?></label>
                        <input type="text" class="input-xlarge" id="smtp_port" name="smtp_port">

                        <label for="smtp_username"><?php echo WILang::get('smtp_username') ?></label>
                        <input type="text" class="input-xlarge" id="smtp_username" name="smtp_username">

                        <label for="smtp_password"><?php echo WILang::get('smtp_password') ?></label>
                        <input type="text" class="input-xlarge" id="smtp_password" name="smtp_password">

                        <label for="smtp_enc"><?php echo WILang::get('smtp_enc') ?></label>
                        <input type="text" class="input-xlarge" id="smtp_enc" name="smtp_enc">
                        <span class="help-block"><?php echo WILang::get('smtp_info') ?>
                           
                        </span>
                    </div>


                        

                      <script type="text/javascript">

                      $('#mailer').on('change', function() {
                          //alert( this.value );

                          var mailer  = $("#mailer").val();
                          //alert(mailer);

                        if( mailer === "smtp"){
                          $("#smtp-wrapper").css("display", "block");
                          $("#email-settings").attr("id","email-settings-smtp");
                          $("#email-settings-smtp").attr("value","smtp");
                        }else{
                           $("#smtp-wrapper").css("display", "none");
                           $("#email-settings-smtp").removeAttr("id","email-settings-smtp");
                           $(".btn").attr("id","email-settings");
                           $("#email-settings").attr("value","mailer");
                        }
                        })

                        
                      </script>

                    <div class="form-group">
                        <label for="bootstrap_version"><?php echo WILang::get('bv') ?> </label>
                        <select name="bootstrap_version" id="bootstrap_version">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                     <div class="form-group">
                    <label for="admin_username">Admin Username</label>
                    <div class="input-prepend">
                        <input type="text" class="input-xlarge" name="admin_username" id="admin_username" value="admin username" />
                    </div>
                    <span>
                        
                    </span>
                    <label for="admin_password">Password</label>
                    <div class="input-prepend">
                        <input type="password" class="input-xlarge" name="admin_password" id="admin_password" value="password" />
                    </div>

                    <label for="admin_password">Confirm Password</label>
                    <div class="input-prepend">
                        <input type="password" class="input-xlarge" name="admin_password" id="admin_confirm_password" value="password" />
                    </div>
                    <div id="pass_match"></div>

                     <label for="email_address">Email Address</label>
                    <div class="input-prepend">
                        <input type="email" class="input-xlarge" name="email_address" id="email_address" value="example@hotmail.com" />
                    </div>
                </div>

                <button class="btn btn-as pull-right" onclick="WIInstall.stepThree();" type="button">
                    <span class="show" id="next">
                        <?php echo WILang::get('next') ?> 
                        
                        <i class="fa fa-arrow-right" ></i>
                    </span>
                    <span class="hide" id="spin">
                        <i class="fa fa-circle-o-notch fa-spin"></i>
                       <?php echo WILang::get('connecting') ?> 
                    </span>
                </button>
                <div class="clearfix"></div>
            </div>
            <!-- Step Four -->
             <div class="step-content hide" id="step_four">
                <h3><?php echo WILang::get('social') ?></h3>
                <hr>

  <div class="col-lg-12 col-md-12 col-sm-12">
                    <label>Twitter Login</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input type="hidden" name="twitter_login" class="btn-group-value" id="tw-login" value="false" />
                        <label class="switch">
                        <input type="checkbox" id="twit">
                        <span class="slider round" id="ter" style="padding-left: 48%; padding-top: 11%;">OFF</span>
                      </label>
                    </div>
                    <div class="tw-fields hide" id="twittee">
                      <div class="col-lg-4 col-xs-4 col-sm-s col-md-4">
                        <label for="tw_key">Key</label>
                      </div>
                        <input type="text" class="input-xlarge" id="tw_key" name="tw_key" placeholder="key">

                        <div class="col-lg-4 col-xs-4 col-sm-s col-md-4">
                        <label for="tw_secret">Secret</label>
                      </div>
                        <input type="text" class="input-xlarge" id="tw_secret" name="tw_secret" placeholder="secret">
                    </div>

                  </div>
                  
                   <div class="col-lg-12 col-md-12 col-sm-12">
                    <label>Facebook Login</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input type="hidden" name="facebook_login" class="btn-group-value"  id="fb-login" value="false" />
                        <label class="switch">
                        <input type="checkbox" id="fb">
                        <span class="slider round" id="log" style="padding-left: 48%; padding-top: 11%;">OFF</span>
                        
                      </label>
                    </div>
                    <div class="fb-fields hide" id="faceb">
                      <div class="col-lg-4 col-xs-4 col-sm-s col-md-4">
                        <label for="fb_id">ID</label>
                      </div>
                        <input type="text" class="input-xlarge" id="fb_id" name="fb_id" placeholder="ID">

                        <div class="col-lg-4 col-xs-4 col-sm-s col-md-4">
                        <label for="fb_secret">Secret</label>
                      </div>
                        <input type="text" class="input-xlarge" id="fb_secret" name="fb_secret" placeholder="secret">
                    </div>
                  </div>

                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <label>Google+ Login</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input type="hidden" name="google_login" class="btn-group-value"  id="gp-login" value="false" />
                        <label class="switch">
                        <input type="checkbox" id="googleplus">
                        <span class="slider round" id="glogin" style="padding-left: 48%; padding-top: 11%;">OFF</span>
                        
                      </label>
                    </div>
                    <div class="gp-fields hide" id="googlep">
                      <div class="col-lg-4 col-xs-4 col-sm-s col-md-4">
                        <label for="gp_id">ID</label>
                      </div>
                        <input type="text" class="input-xlarge" id="gp_id" name="gp_id" placeholder="ID">

                        <div class="col-lg-4 col-xs-4 col-sm-s col-md-4">
                        <label for="gp_secret">Secret</label>
                      </div>
                        <input type="text" class="input-xlarge" id="gp_secret" name="gp_secret" placeholder="secret">
                       <hr>
                    </div>
                </div>


                                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <label>Google+ Services</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <input type="hidden" name="google_service" class="btn-group-value"  id="google_service" value="false" />
                        <label class="switch">
                        <input type="checkbox" id="googleplusservice">
                        <span class="slider round" id="gloginservice" style="padding-left: 48%; padding-top: 11%;">OFF</span>
                        
                      </label>
                    </div>
                    <div class="gp-fields hide" id="googlepservice">

                         <div class="col-lg-4 col-xs-4 col-sm-s col-md-4">
                        <label for="map_api">map api</label>
                      </div>
                        <input type="text" class="input-xlarge" id="map_api" name="map_api" placeholder="map api">

                         <div class="col-lg-4 col-xs-4 col-sm-s col-md-4">
                        <label for="charts_api_key">charts api key</label>
                      </div>
                        <input type="text" class="input-xlarge" id="charts_api_key" name="charts_api_key" placeholder="charts api key">
                    </div>
                </div>
             
               

               <script type="text/javascript">
                   
                 $(document).ready(function(event){



                    $("#ter").click(function(){// twit
                                    //alert('clicked');
                    //console.log("passd");
                    var twit = $("#tw-login").attr("value");
                    
                    if (twit === "false"){
                    $("#twit").prop("checked", true);
                    $("#ter").text('ON');
                    $("#ter").css('padding-left', '8%');
                    $("#ter").css('padding-top', '7%');
                    $("#tw-login").attr("value", 'true');
                    $("#twittee").removeClass("hide").addClass("show");
                   }else if (twit === "true"){
                    $("#twit").prop("checked", false);
                    $("#tw-login").attr("value", 'false');
                    $("#ter").text('OFF');
                    $("#ter").css('padding-left', '48%');
                    $("#ter").css('padding-top', '11%');
                    $("#twittee").removeClass("show").addClass("hide");
                   }
                    })

                    $("#log").click(function(){
                    //alert('clicked');
                    var fb = $("#fb-login").attr("value")
                    
                    if (fb === "false"){
                    $("#fb").prop("checked", true);
                    $("#log").text('ON');
                     $("#log").css('padding-left', '8%');
                    $("#log").css('padding-top', '7%');
                    $("#fb-login").attr("value", 'true');
                    $("#faceb").removeClass("hide").addClass("show");
                   }else if (fb === "true"){
                    $("#fb").prop("checked", false);
                    $("#fb-login").attr("value", 'false')
                    $("#log").text('OFF');
                    $("#log").css('padding-left', '48%');
                    $("#log").css('padding-top', '11%');
                    $("#faceb").removeClass("show").addClass("hide");
                   }
                })

                    $("#glogin").click(function(){
                    //alert('clicked');
                    var google = $("#gp-login").attr("value")
                    
                    if (google === "false"){
                    $("#googleplus").prop("checked", true);
                    $("#glogin").text('ON');
                    $("#glogin").css('padding-left', '8%');
                    $("#glogin").css('padding-top', '7%');
                    $("#gp-login").attr("value", 'true');
                    $("#googlep").removeClass("hide").addClass("show");
                   }else if (google === "true"){
                    $("#googleplus").prop("checked", false);
                    $("#gp-login").attr("value", 'false');
                    $("#glogin").text('OFF');
                    $("#glogin").css('padding-left', '48%');
                    $("#glogin").css('padding-top', '11%');
                    $("#googlep").removeClass("show").addClass("hide");
                   }
                })


                    $("#gloginservice").click(function(){
                    //alert('clicked');
                    var google_service = $("#google_service").attr("value")
                    
                    if (google_service === "false"){
                    $("#googleplusservice").prop("checked", true);
                    $("#gloginservice").text('ON');
                    $("#gloginservice").css('padding-left', '8%');
                    $("#gloginservice").css('padding-top', '7%');
                    $("#google_service").attr("value", 'true');
                    $("#googlepservice").removeClass("hide").addClass("show");
                   }else if (google_service === "true"){
                    $("#googleplusservice").prop("checked", false);
                    $("#google_service").attr("value", 'false');
                    $("#gloginservice").text('OFF');
                    $("#gloginservice").css('padding-left', '48%');
                    $("#gloginservice").css('padding-top', '11%');
                    $("#googlepservice").removeClass("show").addClass("hide");
                   }
                })

                });
               </script>

         <button class="btn btn-as pull-right" onclick="WIInstall.stepFour();" type="button">

                    <span class="show" id="next">
                        <?php echo WILang::get('next') ?>
                        <i class="fa fa-arrow-right" ></i>
                    </span>
                </button>
                 <span class="show" id="mess">
                        <i class="fa"></i>
                    </span>
                <div class="clearfix"></div>
            </div>

            <!-- Step four -->
            <div class="step-content hide" id="step_five">
                <h3><?php echo WILang::get('database') ?></h3>
                <hr>

                     <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                        <label for="host"><?php echo WILang::get('host') ?></label><span class="required">*</span>
                        <input type="text" class="form-control" id="host">
                        <small><?php echo WILang::get('db_info') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="username"><?php echo WILang::get('username') ?></label><span class="required">*</span>
                        <input type="text" class="form-control" id="username">
                        <small><?php echo WILang::get('db_user') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="password"><?php echo WILang::get('pw') ?></label><span class="required">*</span>
                        <input type="password" class="form-control" id="password">
                        <small><?php echo WILang::get('pw_info') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="database"><?php echo WILang::get('db_name') ?></label><span class="required">*</span>
                        <input type="text" class="form-control" id="db_name">
                        <small><?php echo WILang::get('db_info_tab') ?></small>
                    </div>

                </div>

                <button class="btn btn-as pull-right" onclick="WIInstall.DB();" type="button">
                    <span class="show" id="next">
                        <?php echo WILang::get('next') ?>
                        <i class="fa fa-arrow-right" ></i>
                    </span>
                    <span class="hide" id="spin">
                        <i class="fa fa-circle-o-notch fa-spin"></i>
                        <?php echo WILang::get('connecting') ?>
                    </span>
                   
                </button>
                 <span class="show" id="mess">
                        <i class="fa"></i>
                    </span>
                <div class="clearfix"></div>
            </div>
            <!-- Step Six -->
            <div class="step-content hide" id="step_six">
                <div>
                <h3><?php echo WILang::get('install') ?></h3>
                <hr>

                    <p><?php echo WILang::get('install_ready') ?></p>
                    <p>
                       <?php echo WILang::get('privde_info') ?> <br>
                       <?php echo WILang::get('few_sec') ?>
                    </p>
                    </div>
                    <div align="center" class="ajax-loading hide"><img src="../WIAdmin/WIMedia/Img/ajax_loader.gif" /></div>
                    <div id="results_install"></div>

                    <button class="btn btn-as pull-right" onclick="WIInstall.install();">
                        <span class="show" id="install">
                               <i class="fa fa-play"></i>
                            <?php echo WILang::get('insta') ?>
                        </span>
                            <span class="hide" id="installing">
                            <i class="fa fa-circle-o-notch fa-spin"></i>
                            <?php echo WILang::get('I') ?>
                        </span>
                    </button>
                <div class="clearfix"></div>
            </div>

             </div>
             <!-- Step Seven -->
            <div class="step-content hide" id="step_seven">
                <div>
                <h3><?php echo WILang::get('completed') ?></h3>
                <hr>
                <p><strong><?php echo WILang::get('welldone') ?></strong></p>
                <p><?php echo WILang::get('login_in_butt') ?>
                    
                </p>
            </div>
                    <strong><?php echo WILang::get('imp') ?></strong> <?php echo WILang::get('imp_info') ?>
                </p>

                <br>

                <a class="btn btn-as pull-right" href="../alogin.php">
                    <i class="fa fa-sign-in"></i>
                    <?php echo WILang::get('log') ?>
                </a>
                <div class="clearfix"></div>
            </div>

        </div>
    </div>
</div>


<script type="text/javascript" src="WICore/WIJ/WICore.js"></script>
<script type="text/javascript" src="WICore/WIJ/WIInstall.js"></script>
<script type="text/javascript" src="WICore/WIJ/sha512.js"></script>

  <script type="text/javascript">
                       var secure = $("#secure_session").attr('value');
                       if (secure === "false"){
                        $("#session_secure_true").removeClass('btn-success active')
                        $("#session_secure_false").addClass('btn-danger');
                       }else if (secure === "true"){
                        $("#session_secure_false").removeClass('btn-danger')
                        $("#session_secure_true").addClass('btn-success active');
                       }

                       var http_only = $("#session_http_only").attr('value');

                       if (http_only === "false"){
                        $("#http_only_true").removeClass('btn-success active')
                        $("#http_only_false").addClass('btn-danger');
                       }else if (http_only === "true"){
                        $("#http_only_false").removeClass('btn-danger')
                        $("#http_only_true").addClass('btn-success active');
                       }

                       var regenerate = $("#session_regenerate").attr('value');
                       if (regenerate === "false"){
                        $("#session_regenerate_true").removeClass('btn-success active')
                        $("#session_regenerate_false").addClass('btn-danger');
                       }else if (regenerate === "true"){
                        $("#session_regenerate_false").removeClass('btn-danger')
                        $("#session_regenerate_true").addClass('btn-success active');
                       }

                       var cookie = $("#cookieonly").attr('value');
                       if (cookie === "0"){
                        $("#cookieonly_true").removeClass('btn-success active')
                        $("#cookieonly_false").addClass('btn-danger');
                       }else if (cookie === "1"){
                        $("#cookieonly_false").removeClass('btn-danger')
                        $("#cookieonly_true").addClass('btn-success active');
                       }
                   
                      </script>

                       <script type="text/javascript">
                          var fingerprint = $("#login_fingerprint").attr('value');
                       if (fingerprint === "false"){
                        $("#fingerPrint_true").removeClass('btn-success active')
                        $("#fingerPrint_false").addClass('btn-danger');
                       }else if (fingerprint === "true"){
                       $("#fingerPrint_false").removeClass('btn-danger')
                        $("#fingerPrint_true").addClass('btn-success active');
                       }
                      </script>
</body>
</html>
