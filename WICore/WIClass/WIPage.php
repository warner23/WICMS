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
      $sql = "SELECT * FROM `wi_page` WHERE `name` =:name";
      $query = $this->WIdb->prepare($sql);
      $query->bindParam(':name', $page_id, PDO::PARAM_STR);
      $query->execute();
      $res = $query->fetch(PDO::FETCH_ASSOC);
      return $res[$column];
    }




   
}