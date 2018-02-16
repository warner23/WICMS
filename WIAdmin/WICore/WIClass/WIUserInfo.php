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
		/*
		$query = $this->WIdb->prepare('SELECT * FROM `wi_members` WHERE `user_id` =:userId');
		$query->bindParam(':userId', $userId, PDO::PARAM_STR);
		$query->execute();

		$res = $query->fetch(PDO::FETCH_ASSOC);
	*/
		$result['$column'] = $this->WIdb->selectColumn('SELECT * FROM `wi_site` WHERE `id` = :user_id', 
			array(
				'user_id' => $user_id
				), 
			$column);


		return $res[$column];

	}


	 public function User_pic($userId)
	 {

	 	//echo "user" . $userId;
	 		 	$query = $this->WIdb->prepare('SELECT * FROM `wi_user_details` WHERE `user_id` =:value');
	 	$query->bindParam(':value', $userId, PDO::PARAM_INT);
	 	$query->execute();
	    while ($result = $query->fetchAll(PDO::FETCH_ASSOC) ) {
	    	//print_r($result);
	    	//echo "ave" . $result[0]['avatar'];
	    	//if($result["avatar"] === " ")
	    	if(!empty($result[0]["avatar"])){
			 echo '<img class="profile online" src="../../../WIAdmin/WIMedia/Img/avator/' . $result[0]["avatar"] . '" width="218px" />';
			
		} else {
		  echo '<img class="profile online" src="../../../WIAdmin/WIMedia/Img/avator/image01.jpg" width="218px" />';
		}

	    	
	   }
	}


		 public function admin_pic($userId)
	 {

	 	//echo "user" . $userId;
	 		 	$query = $this->WIdb->prepare('SELECT * FROM `wi_user_details` WHERE `user_id` =:value');
	 	$query->bindParam(':value', $userId, PDO::PARAM_INT);
	 	$query->execute();
	    while ($result = $query->fetchAll(PDO::FETCH_ASSOC) ) {
	    	//print_r($result);
	    	//echo "ave" . $result[0]['avatar'];
	    	//if($result["avatar"] === " ")


		if(!empty($result[0]["avatar"])){
			 echo '<img class="user-image online" src="../WIAdmin/WIMedia/Img/avator/' . $result[0]["avatar"] . '" width="218px" />';
			
		} else {
		  echo '<img class="user-image " src="../WIAdmin/WIMedia/Img/avator/image01.jpg" width="218px" />';
		}


	    	
	   }
	}

	public function admin_name($user_id)
	{
		$sql = "SELECT * FROM `wi_members` WHERE `user_id` =:user_id";

		$query = $this->WIdb->prepare($sql);
		$query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
		$query->execute();

		$res = $query->fetch(PDO::FETCH_ASSOC) ;

		$name = $res['username'];

		return $name;
	}
}

?>