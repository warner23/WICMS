<?php

/**
* Pages Class
* Created by Warner Infinity
* Author Jules Warner
*/

class WIPage
{

	function __construct() 
  {
       $this->WIdb = WIdb::getInstance();
  }


    public function GetColums($page_id, $column)
    {

      $result = $this->WIdb->selectColumn('SELECT * FROM `wi_page` WHERE `name` =:name', array('name' => $page_id), $column);
      return $result;
    }




   
}