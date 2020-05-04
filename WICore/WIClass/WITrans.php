<?php

/**
* Trans Class
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

        // get translation for determined language
		$trans = WILang::getTrans($language);
		
		if ( $jsonEncode )
			return json_encode($trans);
		else
			return $trans;
	}

    public static function get($key ) //, $bindings = array()
    {
		// determine language
		$language = self::getLanguage();

		$result = $this->WIdb->select("SELECT * FROM `wi_trans` WHERE `keyword`=:key", 
			array(
				"key" => $key
			));
		if($result[0] > 0)
			return $result[0]['translation'];
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

		if ( ! self::isValidLanguage($language) )
		die('Language file doesn\'t exist!');
		else {

			$result = $this->WIdb->select("SELECT * FROM `wi_trans` WHERE `lang` = :file", 
			array(
				"file" => $language
			));
			foreach ($result as $key => $value) {
				echo '"' .$value['keyword'] .'"=>"' . $value['translation'] . '",';
			}

		}
	}



	 private static  function getFile($language) 
	 {

	  $result = $this->WIdb->select("SELECT * FROM `wi_lang` WHERE `lang` = :file", 
			array(
				"file" => $language
			));

		if ($result[0] > 0)
			return $result[0]['lang'];
		else
			return null;

		
	}

	    private static function isValidLanguage($lang) 
	    {
		$file = self::getFile($lang);

		if($file == "null")
			return false;
		else
			return true;
	}





}