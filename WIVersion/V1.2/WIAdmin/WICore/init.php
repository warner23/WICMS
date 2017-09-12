<?php

ini_set('display_errors',1);
error_reporting(E_ALL);
define("INCLUDE_CHECK", true);

require 'WIClass/WI.php';


$token = $register->socialToken();
WISession::set('WI_social_token', $token);
$register->botProtection();


spl_autoload_register(function($class)
{
	require_once 'WIClass/' . $class . '.php';
});
$admin         = new WIAdmin(WISession::get("user_id"));
$adminInfo     = $admin->getInfo();
$adminDetails  = $admin->getDetails();
$mod          = new WIModules();
$page         = new WIPage();
$plug          = new WIPlugin();
$site         = new WISite();
$img          = new WIImage();
$vid          = new WIVideos();
$topic        = new WITopic();
$dashboard   = new WIDashboard();
$adminChat   = new WIAdminChat();
$Info       = new WIUserInfo();




?>
