<?php 

require_once 'WIClass/WILib.php';
require_once 'WIClass/WISettings.php';
//DATABASE CONFIGURATION

define('HOST', "mysql1003.mochahost.com"); 

define('TYPE', "mysql"); 

define('USER', "warner_Master"); 

define('PASS', "taylor22"); 

define('NAME', "warner_WI"); 


$WIC = WILib::getInstance();
$config =  new WISettings();

$dbhost          = $config->Website_Info('db_host');
$dbusername      = $config->Website_Info('db_username');
$dbpass          = $config->Website_Info('db_pass');
$dbname          = $config->Website_Info('db_name');
$dbport          = $config->Website_Info('db_port');
$dbtype          = $config->Website_Info('db_type');

$webName          = $config->Website_Info('site_name');
$domain          = $config->Website_Info('site_domain');
$script          = $config->Website_Info('site_url');

$session          = $config->Website_Info('secure_session');
$http          = $config->Website_Info('http_only');
$regenerate          = $config->Website_Info('regenerate_id');
$cookie          = $config->Website_Info('use_only_cookie');

$loginAttemp          = $config->Website_Info('max_login_attempts');
$loginFinger          = $config->Website_Info('login_fingerprint');
$redirect          = $config->Website_Info('redirect_after_login');
$encryption          = $config->Website_Info('password_encryption');

$bcrypt          = $config->Website_Info('encryption_cost');
$sha512          = $config->Website_Info('sha512_iterations');
$salt          = $config->Website_Info('password_salt');
$keylife          = $config->Website_Info('reset_key_life');
$mailConfirm          = $config->Website_Info('mail_confirm_required');
$regConfirm          = $config->Website_Info('register_confirm');
$passReset          = $config->Website_Info('reg_pass_reset');
$mail          = $config->Website_Info('mailer');
$smpt_host          = $config->Website_Info('smpt_host');
$smpt_port          = $config->Website_Info('smpt_port');
$smpt_username          = $config->Website_Info('smpt_username');
$smpt_password          = $config->Website_Info('smpt_password');

$smpt_encryption          = $config->Website_Info('smpt_encryption');
$social          = $config->Website_Info('social_callback_url');
$google          = $config->Website_Info('google_enabled');
$google_id          = $config->Website_Info('google_id');
$google_secret          = $config->Website_Info('google_secret');
$fb          = $config->Website_Info('facebook_enabled');

$fb_id          = $config->Website_Info('facebook_id');
$fb_secret          = $config->Website_Info('facebook_secret');
$tw_enabled          = $config->Website_Info('twitter_enabled');
$tw_key          = $config->Website_Info('twitter_key');
$tw_secret          = $config->Website_Info('twitter_secret');
$default_lang          = $config->Website_Info('default_lang');
$multi_lang          = $config->Website_Info('multi_lang');
$version               = $config->Website_Info('wicms_version');
$bootstrap_version     = $config->Website_Info('bootstrap_version');
$favicon               = $config->Website_Info('favicon');




/* SITE INFO   */
/* site info  */
// $WI['site_url'] 		  = 'http://wicms.co.uk/';
// $WI['email_system_from']  = 'admin@xymore.u-adv.co.uk';
// $WI['email_method']       = 'smtp';
// $WI['theme_dir']           = $WI['site_url'] . 'WITheme/WICMS/';
// $WI['site_name']          = 'WI CMS';
// $WI['admin_email']        = 'jw4241@googlemail.com';


// /* menu */
// $WI['forum']              = 'WIForum/';
// $WI['game']               = 'WIGame/';
// $WI['shop']               = 'WIShop/';
// $WI['admin']              = 'WIAdmin/';
// $WI['user']               = 'WIUser/';
// $WI['members']            = 'WIMembers/';

// /* FOOTER */
// $WI['address']           = '1300 Ashton Old Road Openshaw Manchester M11 1JG';
// $WI['phone']             = '0161 371 5522';
// $WI['email']             = 'info@therivermanchester.org';

// /* directories */
// $WI['plugin']             = 'WIPlugin/';
// $WI['install']            = 'WIInstallation/';
// $WI['lang']               = 'WILang/';
// $WI['media']              = 'WIMedia/';
// /* css*/
// $WI['css_site']           = 'site/css/';
// $WI['css_forum']          = 'forum/css/';
// $WI['css_user']           = 'user/css/';
// $WI['css_game']           = 'game/css/';
// $WI['css_admin']          = 'admin/css/';
// $WI['css_shop']           = 'shop/css/';  

// /*js*/
// $WI['js_site']           = 'site/js/';
// $WI['js_forum']          = 'forum/js/';
// $WI['js_user']           = 'user/js/';
// $WI['js_game']           = 'game/js/';
// $WI['js_admin']          = 'admin/js/';
// $WI['js_shop']           = 'shop/js/'; 
// /* fonts */
// $WI['fonts_site']           = 'site/fonts/';
// $WI['fonts_forum']          = 'forum/fonts/';
// $WI['fonts_user']           = 'user/fonts/';
// $WI['fonts_game']           = 'game/fonts/';
// $WI['fonts_admin']          = 'admin/fonts/';
// $WI['fonts_shop']           = 'shop/fonts/'; 
// /* less */
// $WI['less_site']           = 'site/less/';
// $WI['less_forum']          = 'forum/less/';
// $WI['less_user']           = 'user/less/';
// $WI['less_game']           = 'game/less/';
// $WI['less_admin']          = 'admin/less/';
// $WI['less_shop']           = 'shop/less/'; 
// /* img  */
// $WI['img_site']           = 'site/img/';
// $WI['img_forum']          = 'forum/img/';
// $WI['img_user']           = 'user/img/';
// $WI['img_game']           = 'game/img/';
// $WI['img_admin']          = 'admin/img/';
// $WI['img_shop']           = 'shop/img/';  
?>