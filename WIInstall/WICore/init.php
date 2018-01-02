<?php

define('DEBUG', true);

if (DEBUG) {
    ini_set("display_errors", "1");
    error_reporting(E_ALL);
} else {
    ini_set("display_errors", "0");
    error_reporting(0);
}


require 'WIClass/WI.php';

spl_autoload_register(function($class)
{
	require_once 'WIClass/' . $class . '.php';
});

$require  = new WIRequirements();







?>
