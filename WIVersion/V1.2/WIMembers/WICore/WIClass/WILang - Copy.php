<?php

/**
* Database Class
* Created by Warner Infinity
* Author Jules Warner
*/

class WILang
{

	  public static function all($jsonEncode = true) {
        // determine lanuage
		$language = self::getLanguage();

        // get translation for determined language
		$trans = self::getTrans($language);
		
		if ( $jsonEncode )
			return json_encode($trans);
		else
			return $trans;
	}


	 public static function get($key, $bindings = array() ) {
		// determine language
		$language = self::getLanguage();

		// get translation array
		$trans = self::getTrans($language);

        // if term (key) doesn't exist, return empty string
		if ( ! isset ( $trans[$key] ) )
			return '';

        // term exist, get the value
		$value = $trans[$key];

        // replace variables with provided bindings
		if ( ! empty($bindings) ) {
			foreach ( $bindings as $key => $val )
				$value = str_replace('{'.$key.'}', $val, $value);
		}

		return $value;
	}


	  public static function setLanguage($language) {

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



	 public static function getLanguage() {
        // check if cookie exist and language value in cookie is valid
        if ( isset ( $_COOKIE['wi_lang'] ) && self::isValidLanguage ( $_COOKIE['wi_lang'] ) )
            return $_COOKIE['wi_lang']; // return lang from cookie
        else
            return WISession::get('wi_lang', DEFAULT_LANGUAGE);
    }

    /**
     *       PRIVATE AREA
     */
    private static function getTrans($language) {
		$file = self::getFile($language);

		if ( ! self::isValidLanguage($language) )
			die('Language file doesn\'t exist!');
		else {
			$language = include $file;
			return $language;
		}
	}



	 private static function getFile($language) {
		return dirname(dirname(__FILE__) ) . '/WILang/' . $language . '.php';
		
	}




    private static function isValidLanguage($lang) {
		$file = self::getFile($lang);

		if ( ! file_exists( $file ) )
			return false;
		else
			return true;
	}



}