<?php

include_once 'WISite.php';
include_once 'WIAdmin.php';
include_once 'WIModules.php';
include_once 'WIDashboard.php';
include_once 'WIAdminChat.php';
include_once 'WIPage.php';
include_once 'WIContact.php';
/*
spl_autoload_register(function($class)
{
	include_once $class . '.php';
});
 
$site         = new WISite();
  
  */   

$mod          = new WIModules();
$dashboard   = new WIDashboard();
$chat        = new WIAdminChat();
$page        = new WIPage();
$site        = new WISite();
$contact        = new WIContact();
?>
