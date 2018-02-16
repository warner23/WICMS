<?php

/**
* Session Class
* Created by Warner Infinity
* Author Jules Warner
*/

class WISession
{
      /**
     * Start session.
     */
    public static function startSession() 
    {
         ini_set('post_max_size', '64M');
        ini_set('upload_max_filesize', '64M');
 if(SESSION_USE_ONLY_COOKIES === "true"){
        ini_set('session.use_only_cookies', SESSION_USE_ONLY_COOKIES);
        }

        if(SESSION_HTTP_ONLY === "true"){
        ini_set( 'session.cookie_httponly', 1 );
        }
        
        
        if(SESSION_SECURE === "true"){
        $cookieParams = session_get_cookie_params();
        session_set_cookie_params(
            $cookieParams["lifetime"], 
            $cookieParams["path"], 
            $cookieParams["domain"], 
            SESSION_SECURE
         );
        }

        session_start();

        if ( SESSION_REGENERATE_ID === "true"){
            
            session_regenerate_id(SESSION_REGENERATE_ID);   
        }
    }

    public static function destroySession() {

        $_SESSION = array();

        $params = session_get_cookie_params();

        setcookie(  session_name(), 
                    '', 
                    time() - 42000, 
                    $params["path"], 
                    $params["domain"], 
                    $params["secure"], 
                    $params["httponly"]
                );

        session_destroy();
    }
    

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }


    public static function destroy($key) {
        if ( isset($_SESSION[$key]) )
            unset($_SESSION[$key]);
    }
    

    public static function get($key, $default = null) {
        if(isset($_SESSION[$key]))
            return $_SESSION[$key];
        else
            return $default;
    }
    
}

?>