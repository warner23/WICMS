<?php

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
$topic        = new WITopic();
$dashboard   = new WIDashboard();
$adminChat   = new WIAdminChat();
$Info       = new WIUserInfo();
$login        = new WILogin();
$register     = new WIRegister();
$mailer       = new WIEmail();
$validator    = new WIValidator();
$maint        = new WIMaintenace();
$web          = new WIWebsite();  


?>
