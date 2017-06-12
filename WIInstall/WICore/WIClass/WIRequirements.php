<?php

/**
* Database Class
* Created by Warner Infinity
* Author Jules Warner
*/

class WIRequirements
{

	    function __construct() 
    {

    }

   public function Required()
   {
		$requirements = array(

		    "PHP_Version" => version_compare(phpversion(), '5.3.0', '>='),   // (>= 5.3.0)
		    "PDO_Extension" => extension_loaded('PDO') && class_exists('PDO'),
		    "PDO_MySQL_Extension" => extension_loaded('pdo_mysql'),
		    "PHP_Curl" => function_exists('curl_version'),
		    "WICMS_Folder" => true       // is_writable(dirname(__FILE__) . 'WICore/WIClass/')   ///writeable
		);
		echo json_encode($requirements);
   }




}