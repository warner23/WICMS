<?php 
if(!defined('INCLUDE_CHECK')) die('You are not allowed to execute this file directly !, your IP has been logged for attempting to hack our game');

/***
*
*   WARNER-INFINTY CMS SOCIAL
*   DEVELOPED BY WARNER-INFINITY FOR USE ONLY WITH WARNER-INFINITY PRODUCTS AND SERVICES
*   @author : Jules Warner           
*/

/* database config  */

$WI['db_host']          = $site->Website_Info('db_host');
$WI['db_username']      = $site->Website_Info('db_username');
$WI['db_pass']          = $site->Website_Info('db_pass');
$WI['db_name']          = $site->Website_Info('db_name');
$WI['db_port']          = $site->Website_Info('db_port');
$WI['db_type']          = $site->Website_Info('db_type');

$DB_HOST    = $site->Website_Info('db_host');
$DB_USER    = $site->Website_Info('db_username');
$DB_PASS    = $site->Website_Info('db_pass');
$DB_NAME    = $site->Website_Info('db_name');
$DB_PORT    = $site->Website_Info('db_port');
$DB_TYPE    = $site->Website_Info('db_type');

define('HOST', '$WI["db_host"]'); 
define('DBNAME' , '$WI["db_name"]'); 
define('PORT' , '$WI["db_port"]'); 

define('USERNAME', '$WI["db_username"]'); 
define('PASSWORD', '$WI["db_pass"]'); 

/* SITE INFO   */
/* site info  */
$WI['site_url'] 		  = $site->Website_Info('site_url');
$WI['email_system_from']  = 'admin@xymore.u-adv.co.uk';
$WI['email_method']       = 'smtp';
$WI['theme_dir']           = $WI['site_url'] . 'WITheme/WICMS/';
$WI['site_name']          = $site->Website_Info('site_name');
$WI['admin_email']        = 'jw4241@googlemail.com';
$WI['site_domain']        = $site->Website_Info('site_domain');

/*  Footer info  */
$WI['address']            = '';
$WI['phone']              = '0161 267 2334';
$WI['email']              = 'Trinity@hotmail.com';

/*  session info  */
$WI['secure_sessions']    = $site->website_Info('secure_session');
$WI['http_only']    = $site->website_Info('http_only');
$WI['regenerate_id']    = $site->website_Info('regenerate_id');
$WI['use_only_cookie']    = $site->website_Info('use_only_cookie');


/* menu */
$WI['forum']              = 'WIForum/';
$WI['game']               = 'WIGame/';
$WI['Shop']               = 'WIShop/';
$WI['admin']              = 'WIAdmin/';
$WI['user']               = 'WIUser/';
$WI['members']            = 'WIMembers/';


/* directories */
$WI['plugin']             = 'WIPlugin/';
$WI['install']            = 'WIInstallation/';
$WI['lang']               = 'WILang/';
$WI['media']              = 'WIMedia/';
/* css*/
$WI['css_site']           = 'site/css/';
$WI['css_forum']          = 'forum/css/';
$WI['css_user']           = 'user/css/';
$WI['css_game']           = 'game/css/';
$WI['css_admin']          = 'admin/css/';
$WI['css_shop']           = 'shop/css/';  

/*js*/
$WI['js_site']           = 'site/js/';
$WI['js_forum']          = 'forum/js/';
$WI['js_user']           = 'user/js/';
$WI['js_game']           = 'game/js/';
$WI['js_admin']          = 'admin/js/';
$WI['js_shop']           = 'shop/js/'; 
/* fonts */
$WI['fonts_site']           = 'site/fonts/';
$WI['fonts_forum']          = 'forum/fonts/';
$WI['fonts_user']           = 'user/fonts/';
$WI['fonts_game']           = 'game/fonts/';
$WI['fonts_admin']          = 'admin/fonts/';
$WI['fonts_shop']           = 'shop/fonts/'; 
/* less */
$WI['less_site']           = 'site/less/';
$WI['less_forum']          = 'forum/less/';
$WI['less_user']           = 'user/less/';
$WI['less_game']           = 'game/less/';
$WI['less_admin']          = 'admin/less/';
$WI['less_shop']           = 'shop/less/'; 
/* img  */
$WI['img_site']           = 'site/img/';
$WI['img_forum']          = 'forum/img/';
$WI['img_user']           = 'user/img/';
$WI['img_game']           = 'game/img/';
$WI['img_admin']          = 'admin/img/';
$WI['img_shop']           = 'shop/img/';  
?>