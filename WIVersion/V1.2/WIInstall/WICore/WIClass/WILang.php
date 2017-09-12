<?php

/**
* Database Class
* Created by Warner Infinity
* Author Jules Warner
*/

class WILang
{

	    function __construct() 
    {
         $this->WIdb = WIdb::getInstance();

    }

    public static function all($jsonEncode = true) {
        // determine lanuage
		$language = self::getLanguage();
		//echo $language;

		$WIdb = WIdb::getInstance();
			//$file = WILang::getFile($language);
			//echo $file;
			//echo $language;
		if ( ! self::isValidLanguage($language) )
		die('Language file doesn\'t exist!');
		else {

			$sql = "SELECT * FROM `wi_trans` WHERE `lang` = :file";
			$query = $WIdb->prepare($sql);
			$query->bindParam(':file', $language, PDO::PARAM_STR);
			$query->execute();
			//$result = array();
			while ($result = $query->fetchAll(PDO::FETCH_ASSOC)) {
				echo "{";
				foreach ($result as $res) {
				echo '"' .$res['keyword'] .'":"' . $res['translation'] . '",';
				 //return array($res['keyword'] => $res['translation'] ,);	
			}

			echo "}";
			}

			}
	}

    public static function get($key ) //, $bindings = array()
    {
		// determine language
		$language = self::getLanguage();

		$WIdb = WIdb::getInstance();

		$sql = "SELECT * FROM `wi_trans` WHERE `keyword`=:key";
		$query = $WIdb->prepare($sql);
		$query->bindParam(':key', $key, PDO::PARAM_STR);
		$query->execute();

		$res = $query->fetch(PDO::FETCH_ASSOC);
		if($res > 0)
			return $res['translation'];
		else
			return '';
	}

     public static function setLanguage($language) 
     {

        // check if language is valid
		if ( self::isValidLanguage($language) ) {
			//set language cookie to 1 year
			setcookie('wi_lang', $language, time() + 60 * 60 * 24 * 365, '/');

            // update session
			WISession::set('wi_lang', $language);

            //refresh the page
			header('Location: ' . $_SERVER['PHP_SELF']);
		}
	}

		 public static function getLanguage() 
		 {
        // check if cookie exist and language value in cookie is valid
        if ( isset ( $_COOKIE['wi_lang'] ) && self::isValidLanguage ( $_COOKIE['wi_lang'] ) )
            return $_COOKIE['wi_lang']; // return lang from cookie
        else
            return WISession::get('wi_lang', DEFAULT_LANGUAGE);
    }


        private static function getTrans($language) 
        {
        	$WIdb = WIdb::getInstance();
			//$file = WILang::getFile($language);
			//echo $file;
			//echo $language;
		if ( ! self::isValidLanguage($language) )
		die('Language file doesn\'t exist!');
		else {
			//$language = include $file;
			//return $language;

			$sql = "SELECT * FROM `wi_trans` WHERE `lang` = :file";
			$query = $WIdb->prepare($sql);
			$query->bindParam(':file', $language, PDO::PARAM_STR);
			$query->execute();
			//$result = array();
			while ($result = $query->fetchAll(PDO::FETCH_ASSOC)) {
				echo "{";
				foreach ($result as $res) {
				echo '"' .$res['keyword'] .'":"' . $res['translation'] . '",';
				 //return array($res['keyword'] => $res['translation'] ,);	
			}

			echo "}";
			}

			}
			
	}



	 private static  function getFile($language) 
	 {
	 	$WIdb = WIdb::getInstance();
		$sql = "SELECT * FROM `wi_lang` WHERE `lang` = :file";
		$query = $WIdb->prepare($sql);
		$query->bindParam(':file', $language, PDO::PARAM_STR);
		$query->execute();

		$res = $query->fetch(PDO::FETCH_ASSOC);
		//echo $res['lang'];
		if ($res > 0)
			return $res['lang'];
		else
			return '';

		
	}

	    private static function isValidLanguage($lang) 
	    {
		$file = self::getFile($lang);
		//echo $file;

		if($file == "")
		//if ( ! file_exists( $file ) )
			return false;
		else
			return true;
	}





}