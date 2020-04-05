<?php


/**
* Database Class
* Created by Warner Infinity
* Author Jules Warner
*/

class WIRegister  
{

    private $mailer;

    //private $WIdb = null;


    /**
     * Class constructor
     */
    function __construct() 
    {
         $this->WIdb = WIdb::getInstance();
        //create new object of WIEmail class
        $this->mailer = new WIEmail();

        $this->maint = new WIMaintenace();
    }
    

    public function register($data) 
    {
        $user = $data['UserData'];
        
        //validate provided data
        $errors = $this->validateUser($data);
        
        if(count($errors) == 0) {
            //no validation errors
            
            //generate email confirmation key
            $key = $this->_generateKey();

          
            MAIL_CONFIRMATION_REQUIRED === true ? $confirmed = 'N' : $confirmed = 'Y';

           $this->WIdb->insert('wi_members', array(
            "email"     => $user['email'],
            "username"  => strip_tags($user['username']),
            "password"  => $this->hashPassword($user['password']),
            "confirmed" => $confirmed,
            "confirmation_key" => $key,
            "register_date" => date("Y-m-d"),
            "ip_addr" => getenv('REMOTE_ADDR')
        )); 

            $userId = $this->WIdb->lastInsertId();

            $st1  = $user['username'] ;
            $st2  = "Added new user";
            //$maintain = new WIMaintenace();
            $this->maint->LogFunction($st1, $st2);


            $this->WIdb->insert('wi_user_details', array( 'user_id' => $userId ));
            
            //send confirmation email if needed
            if ( MAIL_CONFIRMATION_REQUIRED ) {
                $this->mailer->confirmationEmail($user['email'], $key);
                $msg = WILang::get('success_registration_with_confirm');

               // echo  WILang::get('success_registration_with_confirm');
            }
            else
                $msg = WILang::get('success_registration_no_confirm');
            
            //prepare and output success message
            $result = array(
                "status" => "success",
                "msg"    => $msg
            );
            
            echo json_encode($result);


        }
        else {
            //there are validation errors
            
            //prepare result
            $result = array(
                "status" => "error",
                "errors" => $errors
            );
            
            //output result
            echo json_encode ($result);
        }
    }

    /**
     * Get user by email.
     * @param $email User's email
     * @return mixed User info if user with provided email exist, empty array otherwise.
     */
    public function getByEmail($email) {
        $result = $this->WIdb->select("SELECT * FROM `wi_members` WHERE `email` = :e", array( 'e' => $email ));
        if ( count ( $result ) > 0 )
            return $result[0];
        return $result;
    }


    /**
     * Check if user has already logged in via specific provider and return user's data if he does.
     * @param $provider oAuth provider (facebook, twitter or gmail)
     * @param $id Identifier provided by provider
     * @return array|mixed User info if user has already logged in via specific provider, empty array otherwise.
     */
    public function getBySocial($provider, $id) {
        $result = $this->WIdb->select('SELECT * FROM `wi_social_logins` WHERE `provider` = :p AND `provider_id` = :id ', array(
            'p'  => $provider,
            'id' => $id
        ));

        if ( count ( $result ) > 0 ) {
            $res = $result[0];
            $user = new WIUser($res['user_id']);
            return $user->getInfo();
        }

        else
            return $result;
    }

    /**
     * Check if user is already registred via some social network.
     * @param $provider Name of the provider ( twitter, facebook or google )
     * @param $id Provider identifier
     * @return bool TRUE if user exist in database (already registred), FALSE otherwise
     */
    public function registeredViaSocial($provider, $id) {
        $result = $this->getBySocial($provider, $id);

        if ( count ( $result ) === 0 )
            return false;
        else
            return true;
    }

    /**
     * Connect user's social account with his account at this system.
     * @param $userId User Id on this system
     * @param $provider oAuth provider (facebook, twitter or gmail)
     * @param $providerId Identifier provided by provider.
     */
    public function addSocialAccount($userId, $provider, $providerId) {
        $this->WIdb->insert('wi_social_logins', array(
            'user_id' => $userId,
            'provider' => $provider,
            'provider_id' => $providerId,
            'created_at' => date('Y-m-d H:i:s')
        ));
    }

    /**
     * Send forgot password email.
     * @param string $userEmail Provided email.
     * @return bool|mixed|string
     */
    public function forgotPassword($userEmail) {

        $validator = new WIValidator();
        $errors = array();
        //we only have one field to validate here
        //so we don't need id's from other fields
        if($userEmail == "")
            return WILang::get('email_required');

        if( ! $validator->emailValid($userEmail) )
            return WILang::get('email_wrong_format');
        
        if( ! $validator->emailExist($userEmail) )
            return WILang::get('email_not_exist');

        $login = new WILogin();

        if( $login->_isBruteForce() )
            return WILang::get('brute_force');
        
        //ok, no validation errors, we can proceed

        //generate password reset key
        $key = $this->_generateKey();

        //write key to WIdb
        $this->WIdb->update(
                    'wi_members',
                     array(
                         "password_reset_key" => $key,
                         "password_reset_confirmed" => 'N',
                         "password_reset_timestamp" => date('Y-m-d H:i:s')
                     ),
                     "`email` = :email",
                     array("email" => $userEmail)
                );

        $login->increaseLoginAttempts();

        //send email
        $this->mailer->passwordResetEmail($userEmail, $key);

        return TRUE;
    }
    
    
    /**
     * Reset user's password if password reset request has been made.
     * @param string $newPass New password.
     * @param string $passwordResetKey Password reset key sent to user
     * in password reset email.
     */
    public function resetPassword($newPass, $passwordResetKey) {
        $validator = new WIValidator();
        if ( ! $validator->prKeyValid($passwordResetKey) ) {
            echo 'Invalid password reset key!';
            return;
        }

        $pass = $this->hashPassword($newPass);
        $this->WIdb->update(
                    'wi_members', 
                    array("password" => $pass, 'password_reset_confirmed' => 'Y', 'password_reset_key' => ''),
                    "`password_reset_key` = :prk ",
                    array("prk" => $passwordResetKey)
                );
    }
    
     
    /**
     * Hash given password.
     * @param string $password Unhashed password.
     * @return string Hashed password.
     */
     public function hashPassword($password)
     {
        //this salt will be used in both algorithms
        //for bcrypt it is required to look like this,
        //for sha512 it is not required but it can be used 
        $salt = "$2a$" . PASSWORD_BCRYPT_COST . "$" . PASSWORD_SALT;
        
        if(PASSWORD_ENCRYPTION == "bcrypt") {
            $newPassword = crypt($password, $salt);
        }
        else {
            $newPassword = $password;
            for($i=0; $i<PASSWORD_SHA512_ITERATIONS; $i++)
                $newPassword = hash('sha512',$salt.$newPassword.$salt);
        }
        
        return $newPassword;
     }
    
    
    /**
     * Generate two random numbers and store them into $_SESSION variable.
     * Numbers are used during the registration to prevent bots to register.
     */
     public function botProtection()
     {
        WISession::set("bot_first_number", rand(1,9));
        WISession::set("bot_second_number", rand(1,9));
    }

    /**
     * Validate user provided fields.
     * @param $data User provided fieds and id's of those fields that will be used for displaying error messages on client side.
     * @param bool $botProtection Should bot protection be validated or not
     * @return array Array with errors if there are some, empty array otherwise.
     */
    public function validateUser($data, $botProtection = true)
    {
        $id     = $data['FieldId'];
        $user   = $data['UserData'];
        $errors = array();
        $validator = new WIValidator();
        
        //check if email is not empty
        if( $validator->isEmpty($user['email']) )
            $errors[] = array( 
                "id"    => $id['email'],
                "msg"   => WILang::get('email_required') 
            );
        
        //check if username is not empty
        if( $validator->isEmpty($user['username']) )
            $errors[] = array( 
                "id"    => $id['username'],
                "msg"   => WILang::get('username_required')
            );

        
        //check if password is not empty
        if( $validator->isEmpty($user['password']) )
            $errors[] = array( 
                "id"    => $id['password'],
                "msg"   => WILang::get('password_required')
            );
        
        //check if password and confirm password are the same
        if($user['password'] != $user['confirm_password'])
            $errors[] = array( 
                "id"    => $id['confirm_password'],
                "msg"   => WILang::get('passwords_dont_match')
            );
        
        //check if email format is correct
        if( ! $validator->emailValid($user['email']) )
            $errors[] = array( 
                "id"    => $id['email'],
                "msg"   => WILang::get('email_wrong_format')
            );
        
        //check if email is available
        if( $validator->emailExist($user['email']) )
            $errors[] = array( 
                "id"    => $id['email'],
                "msg"   => WILang::get('email_taken')
            );
        
        //check if username is available
        if( $validator->usernameExist($user['username']) )
            $errors[] = array( 
                "id"    => $id['username'],
                "msg"   => WILang::get('username_taken')
            );


        if ( $botProtection )
        {
            //bot protection
            $sum = WISession::get("bot_first_number") + WISession::get("bot_second_number");
            if($sum != intval($user['bot_sum']))
                $errors[] = array( 
                    "id"    => $id['bot_sum'],
                    "msg"   => WILang::get('wrong_sum')
                );
        }        
        
        return $errors;
    }

    /**
     * Generates random password
     * @param int $length Length of generated password
     * @return string Generated password
     */
    public function randomPassword($length = 7)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    /**
     * Generate random token that will be used for social authentication
     * @return string Generated token.
     */
    public function socialToken()
    {
        return $this->randomPassword(40);
    }


     /* PRIVATE AREA
     =================================================*/

    /**
     * Generate key used for confirmation and password reset.
     * @return string Generated key.
     */
    private function _generateKey()
    {
        return md5(time() . PASSWORD_SALT . time());
    }
    
}
