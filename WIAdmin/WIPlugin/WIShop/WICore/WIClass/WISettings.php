<?php

/**
* Database Class
* Created by Warner Infinity
* Author Jules Warner
*/

class WISettings
{
	private $WIC = null;

    public function __construct()
    {
        $this->WIC = WILib::getInstance();

    }   

    public function Website_Info($column) 
    {


        $user_id = 1;

        $result = $this->WIC->selectColumn('SELECT * FROM `wi_site` WHERE `id` = :user_id', array('user_id' => $user_id), $column);
        //echo $result;
        return  $result;
    }

    

   

}

?>