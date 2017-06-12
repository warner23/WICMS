<?php


class WIUserInfo
{
	private $userId;

	public function __construct()
	{
		$this->WIdb = WIdb::getInstance();
	}
	
    public function getUserInfo($column)
	{

		$userId = WISession::get("user_id");

		 $result = $this->WIdb->selectColumn(
                    "SELECT * FROM `wi_members` WHERE `user_id` =:userId",
                     array(
                       "userId" => $userId
                     ), $column
                  );

		return $result;

	}

}

?>