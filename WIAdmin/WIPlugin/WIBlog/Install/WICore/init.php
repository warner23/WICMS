<?php

ini_set('display_errors',1);
error_reporting(E_ALL);


require 'WIClass/WI.php';


spl_autoload_register(function($class)
{
	require_once 'WIClass/' . $class . '.php';
});

//$blog         = new WIBlog();
$install      = new WIInstall()
?>
