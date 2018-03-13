<?php


/**
* 
*/
class WIUsers
{

 	private $user_Id;

 	private $WIWIdb = null;
  
  	function __construct($user_Id) 
  	{
        //update local user id with given user id
        $this->user_Id = $user_Id;

        //connect to database
        $this->WIWIdb = WIDatabase::getInstance();
    }


    public function getAll() 
    {
        $query = "SELECT `WI_Members`.`email`, `WI_Members`.`username`,`WI_Members`.`last_login`, `WI_user_details`.*
                    FROM `WI_Members`, WI_user_details`
                    WHERE `WI_Members`.`user_id` = :id
                    AND `WI_Members`.`user_id` = `WI_user_details`.`user_id`";

        $result = $this->WIWIdb->select($query, array( 'id' => $this->user_Id ));

        if ( count ( $result ) > 0 )
            return $result[0];
        else
            return null;
    }

	
    public static function getAdmin() 
    {
        $role = new WIRole();
        $WIWIdb = WIDatabase::getInstance();
        $adminRoleId = $role->getId('admin');
        $result = $WIdb->select('SELECT * FROM `WI_Members` WHERE `user_role` = :role_id', array('role_id' => $adminRoleId) );

        if ( count ( $result ) > 0 )
            return $result[0];
        else
            return null;
    }


     public function add( $postData ) {

        // prepare required objects and arrays
        $result = array();
        $reg = new WIRegister();
        $errors = $reg->validateUser($postData, false);

        // if count ( $errors ) > 0 means that validation didn't passed and that there are errors
        if ( count ($errors) > 0 )
            $result = array(
                "status" => "error",
                "errors" => $errors
            );
        else {
            //validation passed
            $data = $postData['userData'];

            // insert user login info
            $this->WIWIdb->insert('WI_users',  array (
                'email'         => $data['email'],
                'username'      => $data['username'],
                'password'      => $reg->hashPassword($data['password']),
                'confirmed'     => 'Y',
                'confirmation_key' => '',
                'register_date'    => date('Y-m-d H:i:s')
            ));

            // get user id
            $id = $this->WIWIdb->lastInsertId();

            // insert users details
            $this->WIWIdb->insert('WI_user_details', array (
                'user_id'    => $id,
                'first_name' => $data['first_name'],
                'last_name'  => $data['last_name'],
                'phone'      => $data['phone'],
                'address'    => $data['address']
            ) );

            // generate response
            $result = array (
                "status" => "success",
                "msg"    => WILang::get("user_added_successfully")
            );
        }

        return $result;
    }


    public function updateUser($data) 
    {

        // validate data
        $errors = $this->_validateUserUpdate($data);

        if ( count ( $errors ) > 0 )
            echo json_encode(array(
                "status" => "error",
                "errors" => $errors
            ));
        else
        {
            // validation passed, update user

            $userData = $data['userData'];
            $currInfo = $this->getInfo();

            $userInfo = array();

            // update user's email and username only if they are changed, skip them otherwise
            if ( $currInfo['email'] != $userData['email'] )
                $userInfo['email'] = $userData['email'];

            if ( $currInfo['username'] != $userData['username'] )
                $userInfo['username'] = $userData['username'];

            // update password only if "password" field is filled
            // and password is different than current password
            if ( $userData['password'] != hash('sha512','') ) {
                $password = $this->_hashPassword($userData['password']);
                if ( $currInfo['password'] != $password )
                    $userInfo['password'] = $password;
            }

            if ( count($userInfo) > 0 )
                $this->updateInfo($userInfo);

            $this->updateDetails(array(
                'first_name' => $userData['first_name'],
                'last_name'  => $userData['last_name'],
                'phone'      => $userData['phone'],
                'address'    => $userData['address']
            ));

            echo json_encode(array(
                "status" => "success",
                "msg" => WILang::get("user_updated_successfully")
            ));
        }
    }

    public function id($newId = null) 
    {
        if($newId != null)
            $this->user_Id = $newId;
        return $this->user_Id;
    }


	public function isAdmin() 
	{
	        if ( $this->userId == null )
	            return false;

	        $role = $this->getRole();
	        if($role == "admin")
	            return true;
	        return false;
	    }




public function updatePassword($oldPass,$newPass) 
{
        //hash both passwords
        $oldPass = $this->_hashPassword($oldPass);
        $newPass = $this->_hashPassword($newPass);
        
        //get user info (email, password etc)
        $info = $this->getInfo();
        
        //update if entered old password is correct
        if($oldPass == $info['password'])
            $this->updateInfo(array( "password" => $newPass ));
        else
            echo WILang::get('wrong_old_password');
    }



    public function changeRole() 
    {
        $role = $_POST['role'];

        $result = $this->WIWIdb->select("SELECT * FROM `WI_user_roles` WHERE `role_id` = :r", array( "r" => $role ));

        if(count($result) == 0)
            return;

        $this->updateInfo(array( "user_role" => $role ));

        return $result[0]['role'];
    }


    public function getRole() {
        $result = $this->WIWIdb->select(
                      "SELECT `WI_user_roles`.`role` as role 
                       FROM `WI_user_roles`,`WI_Members`
                       WHERE `WI_Members`.`user_role` = `WI_user_roles`.`role_id`
                       AND `WI_Members`.`user_id` = :id",
                       array( "id" => $this->user_Id)
                    );

        return $result[0]['role'];
    }



    public function getInfo() 
    {
        $result = $this->WIWIdb->select(
                    "SELECT * FROM `WI_Members` WHERE `user_id` = :id",
                    array ("id" => $this->user_Id)
                  );
        if ( count($result) > 0 )
            return $result[0];
        else
            return null;
    }

    public function updateInfo($updateData) 
    {
        $this->WIWIdb->update(
                    "WI_Members", 
                    $updateData, 
                    "`user_id` = :id",
                    array( "id" => $this->user_Id )
               );
    }

	public function getDetails() 
	{
	        $result = $this->WIWIdb->select(
	                    "SELECT * FROM `WI_user_details` WHERE `user_id` = :id",
	                    array ("id" => $this->user_Id)
	                  );

	        if(count($result) == 0)
	            return array(
	                "first_name" => "",
	                "last_name"  => "",
	                "address"    => "",
	                "phone"      => "",
	                "empty"      => true
	            );

	        return $result[0];
	    }



	    public function updateDetails($details) 
	    {
        $currDetails = $this->getDetails();
        if(isset($currDetails['empty'])) {
            $details["user_id"] = $this->user_Id;
            $this->WIWIdb->insert("WI_user_details", $details);
        }
        else
            $this->WIWIdb->update (
                "WI_user_details",
                $details,
                "`user_id` = :id",
                array( "id" => $this->user_Id )
            );
    }


     public function deleteUser() {
        $this->WIWIdb->delete("WI_Members", "user_id = :id", array( "id" => $this->user_Id ));
        $this->WIWIdb->delete("wI_user_details","user_id = :id", array( "id" => $this->user_Id ));
        $this->WIWIdb->delete("WI_comments","posted_by = :id", array( "id" => $this->user_Id ));
        $this->WIWIdb->delete("WI_social_logins","user_id = :id", array( "id" => $this->user_Id ));
    }


    ////private functions

     private function _validateUserUpdate($data) {
        $id     = $data['fieldId'];
        $user   = $data['userData'];
        $errors = array();
        $validator = new WIValidator();

        $userInfo = $this->getInfo();
        if ( $userInfo == null ) {
            $errors[] = array(
                "id"    => $id['email'],
                "msg"   => WILang::get('user_dont_exist')
            );
            return $errors;
        }

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

        //check if password and confirm password are the same
        if( ! $user['password'] == hash('sha512','') && ($user['password'] != $user['confirm_password'] ))
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
        if($user['email'] != $userInfo['email'] && $validator->emailExist($user['email']))
            $errors[] = array(
                "id"    => $id['email'],
                "msg"   => WILang::get('email_taken')
            );

        //check if username is available
        if($user['username'] != $userInfo['username'] && $validator->usernameExist($user['username']) )
            $errors[] = array(
                "id"    => $id['username'],
                "msg"   => WILang::get('username_taken')
            );

        return $errors;
    }


     private function _hashPassword($password) 
     {
        $register = new WIRegister();
        return $register->hashPassword($password);
    }


  
}
?>