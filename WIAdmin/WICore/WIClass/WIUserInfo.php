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

		$result['$column'] = $this->WIdb->selectColumn('SELECT * FROM `wi_site` WHERE `id` = :user_id', 
			array(
				'user_id' => $user_id
				), 
			$column);


		return $res[$column];

	}


	 public function User_pic($userId)
	 {

	 	$result = $this->WIdb->select("SELECT * FROM `wi_user_details` WHERE `user_id` =:value",
          array(
            "value" => $userId
          )
        );

	    if(!empty($result[0]["avatar"])){
			 echo '<img class="profile online" src="../WIAdmin/WIMedia/Img/avator/' . $result[0]["avatar"] . '" width="218px" />';
			
		} else {
		  echo '<img class="profile online" src="../WIAdmin/WIMedia/Img/avator/image01.jpg" width="218px" />';
		}

	    	
	}


		 public function admin_pic($userId)
	 {

		$result = $this->WIdb->select("SELECT * FROM `wi_user_details` WHERE `user_id` =:value",
          array(
            "value" => $userId
          )
        );

		if(!empty($result[0]["avatar"])){
			 echo '<img class="user-image online" src="../WIAdmin/WIMedia/Img/avator/' . $result[0]["avatar"] . '" width="218px" />';
			
		} else {
		  echo '<img class="user-image " src="../WIAdmin/WIMedia/Img/avator/image01.jpg" width="218px" />';
		}


	    	
	  // }
	}

	public function admin_name($user_id)
	{

		$result = $this->WIdb->select("SELECT * FROM `wi_members` WHERE `user_id` =:user_id",
          array(
            "user_id" => $user_id
          )
        );
		$name = $result[0]['username'];

		return $name;
	}
}

?>