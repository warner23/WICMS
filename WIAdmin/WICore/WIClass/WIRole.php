<?php

/**
* role Class
* Created by Warner Infinity
* Author Jules Warner
*/

class WIRole {


    private $WIdb = null;


    private $validator;

    /**
     * Class constructor
     */
    public function __construct() {
        $this->WIdb = WIdb::getInstance();
        $this->validator = new WIValidator();
    }

    /**
     * Get role id of role that have provided role name.
     */
    public function getId($name) {
        $result = $this->WIdb->select("SELECT `role_id` FROM `wi_user_roles` WHERE `role` = :r", array( 'r' => $name ));
        if ( count ( $result ) > 0 )
            return $result[0]['role_id'];
        else
            return null;
    }

    /**
     * Get role name of role with provided id.
     */
    public function name($id) {
        $result = $this->WIdb->select("SELECT `role` FROM `wi_user_roles` WHERE `role_id` = :id", array( 'id' => $id ));
        if ( count ( $result ) > 0 )
            return $result[0]['role_id'];
        else
            return null;
    }


    /**
     * Add new role into WIdb.
     */
    public function add($name) {
        $result = array();

        if ( ! $this->validator->roleExist($name) )
        {
            // role doesn't exist, create it
            $this->WIdb->insert("wi_user_roles", array("role" => strtolower(strip_tags($_POST['role']))));
            $result = array(
                "status"   => "success",
                "roleName" => strip_tags($_POST['role']),
                "roleId"   => $this->WIdb1->lastInsertId()
            );
        }
        else
        {
            // role exist, return error message
            $result = array(
                "status" => "error",
                "message" => WILang::get('role_taken')
            );
        }

        return $result;
    }

    /**
     * Delete role with provided id.
     */
    public function delete($id) {
        //default user roles can't be deleted
        if(in_array($_POST['roleId'], array(1,2,3)) )
            exit();

        $this->WIdb->delete("wi_user_roles", "role_id = :id", array( "id" => $id ));

        $this->WIdb->update("wi_users", array( 'user_role' => "1" ), "user_role = :r", array( "r" => $id ) );
    }

} 