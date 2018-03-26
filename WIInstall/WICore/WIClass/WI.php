<?php

include_once 'WISession.php';
include_once 'WIValidator.php';
include_once 'WILang.php';
include_once 'WIRequirements.php';
include_once 'WIdb.php';
include_once 'WIDBSeetings.php';
include_once 'Install.php';

//$installer = session_name('install');
WISession::startSession();
WISession::set("name", 'WIInstall');

$installer = WISession::get('name');
define('DEFAULT_LANGUAGE', 'en'); 

if ( isset ( $_GET['lang'] ) )
	WILang::setLanguage($_GET['lang']);
?>