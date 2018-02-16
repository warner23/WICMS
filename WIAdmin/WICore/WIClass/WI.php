<?php
// redirect user to installation page if script is not installed
if ( ! file_exists( dirname(__FILE__) . '/WIConfig.php' ) && ! isset($installation) )
    header("Location: install/install.php");

include_once 'WIConfig.php';
include_once 'WISession.php';
include_once 'WIValidator.php';
include_once 'WILang.php';
include_once 'WIRole.php';
include_once 'WIdb.php';
include_once 'WIEmail.php';
include_once 'WILogin.php';
include_once 'WIRegister.php';
include_once 'WIFunction.php';
include_once 'WIMaintenace.php';
include_once 'WIWebsite.php';
include_once 'WIPagination.php';
include_once 'WISystem.php';

//include_once 'WIUserInfo.php';
//include_once 'WITopic.php';





$WIdb = WIdb::getInstance();

WISession::startSession();

$login        = new WILogin();
$register     = new WIRegister();
$mailer       = new WIEmail();
$validator    = new WIValidator();
$maint        = new WIMaintenace();
$web          = new WIWebsite();  
$system       = new WISystem();


//$mod          = new WIModules();
     


if ( isset ( $_GET['lang'] ) )
	WILang::setLanguage($_GET['lang']);

?>
