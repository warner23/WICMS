<?php

/**
* Database Class
* Created by Warner Infinity
* Author Jules Warner
*/

class WILogin
{
	private $WIdb = null;

	    function __construct() {
       $this->WIdb = WIdb::getInstance();
    }


        /**
     * Log in user with provided id.
     */
    public function byId($id) {
        if ( $id != 0 && $id != '' && $id != null ) {
            $this->_updateLoginDate($id);
            WISession::set("user_id", $id);
            if(LOGIN_FINGERPRINT == true)
                WISession::set("login_fingerprint", $this->_generateLoginString ());
        }
    }


        /**
     * Check if user is logged in.
     */
    public function isLoggedIn() {
        //if $_SESSION['user_id'] is not set return false
        if(WISession::get("user_id") == null)
             return false;
        
        //if enabled, check fingerprint
        if(LOGIN_FINGERPRINT == true) {
            $loginString  = $this->_generateLoginString();
            $currentString = WISession::get("login_fingerprint");
            if($currentString != null && $currentString == $loginString)
                
                return true;
            
            else  {
                //destroy session, it is probably stolen by someone
                $this->logout();
                return false;
                
            }
        }
        
        //if you got to this point, user is logged in
        return true;        
    }


    public function userLogin($username, $password) {
        //validation

        $errors = $this->_validateLoginFields($username, $password);

        if(count($errors) != 0) {
            $result = implode("<br />", $errors);
            echo json_encode(array(
                'status' => 'error',
                'message' => $result
            ));
        }
        
        //protect from brute force attack
        if($this->_isBruteForce()) {
            echo json_encode(array(
                'status' => 'error',
                'message' => WILang::get('brute_force')
            ));
            return;
        }
        
        //hash password and get data from WIdb
        $password = $this->_hashPassword($password);
        //var_dump($password);
        //echo "pass" . $password;
        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_members`
                     WHERE `username` = :u AND `password` = :p",
                     array(
                       "u" => $username,
                       "p" => $password
                     )
                  );
       // var_dump($result);
        
        if(count($result) == 1) 
        {
            // check if user is confirmed

            if( MAIL_CONFIRMATION_REQUIRED === "true")
                if($result[0]['confirmed'] == "N") {
                echo json_encode(array(
                    'status' => 'error',
                    'message' => WILang::get('user_not_confirmed')
                ));
                return false;
            }

            // check if user is banned
            if($result[0]['banned'] == "Y") {
                // increase attempts to prevent touching the DB every time
                $this->increaseLoginAttempts();

                // return message that user is banned
                echo json_encode(array(
                    'status' => 'error',
                    'message' => WILang::get('user_banned')
                ));
                return false;
            }

            // check if user is admin or not
            if($result[0]['user_role'] < "4")
            {
                echo json_encode(array(
                    'status' => 'error',
                    'message' => WILang::get('user_not_admin')
                    ));
                return false;
            }

            //user exist, log him in if he is confirmed
            $this->_updateLoginDate($result[0]['user_id']);
            WISession::set("user_id", $result[0]['user_id']);
            session_regenerate_id(true);
            if(LOGIN_FINGERPRINT == true)
                WISession::set("login_fingerprint", $this->_generateLoginString ());
            //echo "tru";
            return true;

            $st1  = $username ;
            $st2  = "Successfully logged in User:  . ' $username . '" ;
            //$maintain = new WIMaintenace();
            WIMaintenace::LogFunction($st1, $st2);
        }
        else {
            //wrong username/password combination

            $this->increaseLoginAttempts();
             echo json_encode(array(
                'status' => 'error',
                'message' => WILang::get('wrong_username_password')
             ));
            return false;
        }
    }


        /**
     * Increase login attempts from specific IP address to preven brute force attack.
     */
    public function increaseLoginAttempts() {
        $date    = date("Y-m-d");
        $user_ip = $_SERVER['REMOTE_ADDR'];
        $table   = 'wi_login_attempts';
       
        //get current number of attempts from this ip address
        $loginAttempts = $this->_getLoginAttempts();
        
        //if they are greater than 0, update the value
        //if not, insert new row
        if($loginAttempts > 0)
            $this->WIdb->update (
                        $table, 
                        array( "attempt_number" => $loginAttempts + 1 ), 
                        "`ip_addr` = :ip_addr AND `date` = :d", 
                        array( "ip_addr" => $user_ip, "d" => $date)
                      );
        else
            $this->WIdb->insert($table, array(
                "ip_addr" => $user_ip,
                "date"    => $date
            ));
    }


    /**
     * Log out user and destroy session.
     */
    public function logout() {
        WISession::destroySession();
    }

      /**
     * Check if someone is trying to break password with brute force attack.
     * @return TRUE if number of attemts are greater than allowed, FALSE otherwise.
     */
    public function _isBruteForce()
    {
        return $this->_getLoginAttempts() > LOGIN_MAX_LOGIN_ATTEMPTS;
    }


        /* PRIVATE AREA
     =================================================*/

         private function _validateLoginFields($username, $password) {
        $id     = $_POST['id'];
        $errors = array();
        
        if($username == "")
            $errors[] = WILang::get('username_required');
        
        if($password == "")
            $errors[] = WILang::get('password_required');
        
        return $errors;
    }
    

        private function _generateLoginString() {
        $userIP = $_SERVER['REMOTE_ADDR'];
        $userBrowser = $_SERVER['HTTP_USER_AGENT'];
        $loginString = hash('sha512',$userIP.$userBrowser);
        return $loginString;
    }

        private function _getLoginAttempts() {
        $date = date("Y-m-d");
        $user_ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;

        if ( ! $user_ip )
            return PHP_INT_MAX;
        
         $query = "SELECT `attempt_number`
                   FROM `wi_login_attempts`
                   WHERE `ip_addr` = :ip AND `date` = :date";

        $result = $this->WIdb->select($query, array(
            "ip"    => $user_ip,
            "date"  => $date
        ));

        if(count($result) == 0)
            return 0;

        return intval($result[0]['attempt_number']);
    }

    private function _hashPassword($password) {
        //echo "hash";
        $register = new WIRegister();
        $NewPAss = $register->hashPassword($password);
        //echo $NewPAss;
        return $NewPAss;
    }
    
    
    /**
     * Update database with login date and time when this user is logged in.
     * @param int $userid Id of user that is logged in.
     */
    private function _updateLoginDate($userid) {
        $this->WIdb->update(
                    "wi_members",
                    array("last_login" => date("Y-m-d H:i:s")),
                    "user_id = :u",
                    array( "u" => $userid)
                );
    }


}
