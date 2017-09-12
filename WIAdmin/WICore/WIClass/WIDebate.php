<?php

/**
* 
*/
class WIDebate 
{
	
		function __construct()
	{
		$this->WIdb = WIdb::getInstance();
	}


		public function getChatId()
	{
		$userId = WISession::get('user_id');
		$result = $this->WIdb->select(

		 "SELECT * FROM `wi_chat`",
            array(
         "user_id" => $userId
            )
            );
		//print_r($result);
		$request_id = $result[0]['request_id'];
        $Debator_id = $result[0]['Debator_id'];

        if ($request_id === $userId) {
        	echo $result[0]['id'];
        }elseif ($Debator_id === $userId){
        	echo $result[0]['id'];
        }

		//echo $result[$column];
		//return $result[$column];

	}


	public function ChatBox($userId, $column)
	{

		$chat_id = WIDebate::getChatId();
		//echo $chat_id;
		$result = $this->WIdb->selectColumn(
			"SELECT * FROM wi_chat WHERE id =:chat_id",
			array(
				"chat_id" => $chat_id 
				), $column
			);
		echo $result[$column];
	}

		


	public function StartChat($userId, $userVoteId, $topic_id, $dateTime)
	{

		//echo "rec";
		$status = WIDebate::CheckChat($userVoteId);
		//echo $status;

		if($status === "in_chat"){
			$msg = "User already in another debate";
			$result = array(
                "status" => "busy",
                "msg"    => $msg
                );
            
            //output result
            echo json_encode ($result);

		}else if($status === "Available"){

			//echo $topic_id;
			$chatInvite = WIDebate::sendRequestInvite($userId, $userVoteId, $topic_id, $dateTime);
			$changedStatus = WIDebate::UpdateUserStatus();
		   //echo $chatInvite;

			if($chatInvite == "requested"){
				$msg = "Reuest Sent.";
			$result = array(
                "status" => "requested",
                "msg"    => $msg
                );

			//output result
            echo json_encode ($result);

			}else{
				$msg = "request Failed";
			$result = array(
                "status" => "Failed",
                "msg"    => $msg
                );
			}           
            
		}else  if($status === "null"){
			$msg = "User not in chat";
			$result = array(
                "status" => "success",
                "msg"    => $msg
                );
            
            //output result
            echo json_encode ($result);
		}
	}


	public function sendRequestInvite($userId, $userVoteId, $topic_id, $dateTime)
	{
		$status = "requested";

		$startTime = $dateTime;

		$newtimestamp = strtotime($startTime . ' + 5 minute');
		$endTime =  date('Y-m-d H:i:s', $newtimestamp);
		$query = $this->WIdb->insert('wi_chat', array(
			'request_id' => $userId,
			'Debator_id' => $userVoteId,
			'topic_id' => $topic_id,
			'status' => $status,
			'startTime' => $startTime,
			'endTime'  => $endTime

			) );

		$chat_id = $this->WIdb->lastInsertId();
		//echo $chat_id;

		WISession::set("chat_id", $chat_id);

		$status = "1";
		$chatbox = $this->WIdb->insert('wi_chatbox', array(
			'chat_id' => $chat_id,
			'user_id' => $userId,
			'status' => $status
			));

		WISession::set("debate", 'debator');

		$result = "requested";

		return $result;

	}


		public function requestIdUsername($userId)
	{

		 $result= $this->WIdb->select(

		 "SELECT `request_id` FROM `wi_chat` WHERE Debator_id = :id",
            array(
         "id" => $userId
            )
            );
		 //var_dump($result);

		$request_id = $result[0]['request_id'];
		//echo $request_id;
		 $result1 = $this->WIdb->select(

		 "SELECT `username` FROM `wi_members` WHERE user_id = :id",
            array(
         "id" => $request_id
            )
            );
		//var_dump($result1);
		//var_dump($result['username']);
		return $result1[0]['username'];

	}

	public function Accept()
	{
		$userId = WISession::get('user_id');
		// firstly change the userstatus
		//echo "userId" . $userId;
		$changeUserStatus = WIDebate::ChangeUserStatus();
		//update the chat system
		//echo " not accepted". $changeUserStatus;
		if ($changeUserStatus == "successful")
		{
			$acceptedChat = WIDebate::AcceptChat();
			//echo "accepted". $acceptedChat;
			if ($acceptedChat == "successful") {

				/*
			$stm = $this->WIdb->prepare('SELECT * FROM `wi_chat` WHERE `Debator_id` =:userId');
			$stm->bindParam(':userId', $userId, PDO::PARAM_INT);
			$stm->execute();

			$res = $stm->fetch();
			*/
			 $result = $this->WIdb->select(

		 "SELECT * FROM `wi_chat` WHERE `Debator_id` =:userId",
            array(
         "userId" => $userId
            )
            );
			 //var_dump($result);
			$chat_id = $result[0]['id'];
			//echo "chat_id".$chat_id;
			$status = "1";
			/*
			$smt = $this->WIdb->prepare('INSERT INTO `wi_chatbox` (`chat_id`,`user_id`,`status`) VALUES(:chat_id,:user_id,:status) ');
			$smt->bindParam(':chat_id', $chat_id, PDO::PARAM_INT);
			$smt->bindParam(':user_id', $userId, PDO::PARAM_INT);
			$smt->bindParam(':status', $status, PDO::PARAM_STR);
			$smt->execute();
			*/

			WISession::set("debate", 'debator');
			$msg = "Request Accepted";

			$result = array(
                "status" => "successful",
                "msg"    => $msg
                );

			//output result
            echo json_encode ($result);

			}

		}

		// then get the chat id
	}

	public function AcceptChat()
	{
		$userId = WISession::get('user_id');
		$status = "accepted";
		//echo "status" . $status;
		$stm = $this->WIdb->prepare('UPDATE `wi_chat` SET `status` =:status WHERE `Debator_id` =:userId');
			$stm->bindParam(':userId', $userId, PDO::PARAM_INT);
			$stm->bindParam(':status', $status, PDO::PARAM_STR);
			$stm->execute();


			/*
			$msg = "status changed";
			$result = array(
                "status" => "successful",
                "msg"    => $msg
                );
	
			//output result
            echo json_encode ($result);
            */
            $result = "successful";
            return $result;

	}


	public function ChangeUserStatus()
	{
		$userId = WISession::get('user_id');
		$status = "in_chat";
		$query = $this->WIdb->prepare('UPDATE `wi_user_details` SET  `status` =:status WHERE `user_id` = :id');
		$query->bindParam(':status', $status, PDO::PARAM_STR);
		$query->bindParam(':id', $userId, PDO::PARAM_INT);
		$query->execute();

		$result = "successful";

		return $result;

	}


			public function UpdateUserStatus()
	{
		$userId = WISession::get('user_id');
		$status = "in_chat";
		$query = $this->WIdb->prepare('UPDATE `wi_user_details` SET  `status` =:status WHERE `user_id` = :id');
		$query->bindParam(':status', $status, PDO::PARAM_STR);
		$query->bindParam(':id', $userId, PDO::PARAM_INT);
		$query->execute();

	}

	public function chatUserName($column, $user_id)
	{
		$sql = "SELECT * FROM `wi_members` WHERE `user_id` = :user_id";
		$stmt = $this->WIdb->prepare($sql);
		$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
		$stmt->execute();
		$query = $stmt->fetch();
		return $query[$column];
	}

	public function checkPending()
	{
		$userId = WISession::get('user_id');
		$query = $this->WIdb->prepare('SELECT * FROM `wi_chatbox` WHERE user_id=:user_id');
		$query->bindParam(':user_id', $userId, PDO::PARAM_INT);
		$query->execute();

		$res = $query->fetch();

		$chat_id = $res['chat_id'];
		//echo $chat_id;
		$stm = $this->WIdb->prepare('SELECT * FROM `wi_chat` WHERE id=:chat_id');
		$stm->bindParam(':chat_id', $chat_id, PDO::PARAM_INT);
		$stm->execute();

		$result = $stm->fetch();

		$status = $result['status'];
		//echo "stat" . $status;

		if($status == "requested"){

			$msg = "Pending Confirm";
			$result = array(
                "status" => "waiting",
                "msg"    => $msg
                );

			//output result
            echo json_encode ($result);
		}

		if($status == "accepted"){

					$msg = "Request Accepted";
			$result = array(
                "status" => "successful",
                "msg"    => $msg
                );

			//output result
            echo json_encode ($result);
		}

	}


	public function CheckChat($userVoteId)
	{

         $result = $this->WIdb->select(
                    "SELECT `status` FROM `wi_user_details` WHERE user_id = :userVoteId",
                     array(
                       "userVoteId" => $userVoteId
                     )
                  );
        //var_dump($result);
         //print_r($result[0]['status']);
         if ( count ( $result[0]['status'] ) > 0 )
            return $result[0]['status'];
        else
            return "null";

		//var_dump($result);
		
		
	}

	public function checkRequest($userId)
	{
		/*
		$query = $this->WIdb->prepare('SELECT `status` FROM `wi_chat` WHERE Debator_id = :id');
		$query->bindParam(':id', $userId, PDO::PARAM_INT);
		$query->execute();

		$result = $query->fetch();
	*/
		 $result = $this->WIdb->select(
                    "SELECT `status` FROM `wi_chat` WHERE Debator_id = :id",
                     array(
                       "id" => $userId
                     )
                  );

		//print_r($result);
		if ($result[0]['status'] === "requested"){

			$username = WIDebate::requestIdUsername($userId);
			$msg = "user " . $username . " has  requested a Debate";
			$result = array(
                "status" => "requested",
                "msg"    => $msg
                );

			 echo json_encode ($result);

		}else if($result[0]['status'] === "not_requested"){
			echo "not requested";
		}else if($result[0]['status'] === "NULL"){
			echo "not requested";
		}


	}

	public function SendMessage($Message, $chat_id, $user_id)
	{
		
		$debate_date = date("Y-m-d H:i:s");
		//echo "date". $debate_date;
		$userId = WISession::get('user_id');
		//echo "user_id". $userId;
		//$userId = WISession::get('user_id');
		//echo "user_id". $userId;
		$sql = "INSERT INTO wi_msg( msg, wtime, chat_id, user_id) VALUES ( :msg, :wtime, :chat_id, :userId)";

		$query = $this->WIdb->prepare($sql);
		$query->bindParam(':msg', $Message, PDO::PARAM_STR);
		$query->bindParam(':wtime', $debate_date, PDO::PARAM_INT);
		$query->bindParam(':chat_id', $chat_id, PDO::PARAM_INT);
		$query->bindParam(':userId', $user_id, PDO::PARAM_INT);
		$query->execute();

		$last_msg_id = $this->WIdb->lastInsertId();

	  	//echo "msg". $last_msg_id;

		$sql = "UPDATE WI_Chat SET last_msg_id = :last_msg_id, 
            last_user_msg_time = :last_user_msg_time
            WHERE id = :chat_id";
$stmt = $this->WIdb->prepare($sql);                                  
$stmt->bindParam(':last_msg_id', $last_msg_id, PDO::PARAM_INT);       
$stmt->bindParam(':last_user_msg_time', $debate_date, PDO::PARAM_STR);       
$stmt->bindParam(':chat_id', $chat_id, PDO::PARAM_INT);   
$stmt->execute(); 
	
	
		$msg = "Message Sent";
			$result = array(
                "status" => "success",
                "msg"    => $msg
                );
            
            //output result
            echo json_encode ($result);
            
}	

	public function chatClass($chat_id, $userId)
	{
		$sql = "SELECT * FROM `wi_chat` WHERE id=:chat_id";

		$stmt = $this->WIdb->prepare($sql);
		$stmt->bindParam( ':chat_id',$chat_id,PDO::PARAM_INT);
        $stmt->execute();

        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        //print_r($res);
       // var_dump($res['request_id']);
        $request_id = $res['request_id'];
        $Debator_id = $res['Debator_id'];

        if ($request_id === $userId) {
        	return $request_id;
        }elseif ($Debator_id === $userId){
        	return $Debator_id;
        }


		
	}

		public function chatTopic($userId)
	{
		$sql = "SELECT * FROM `wi_chat` WHERE id=:chat_id";

		$stmt = $this->WIdb->prepare($sql);
		$stmt->bindParam( ':chat_id',$chat_id,PDO::PARAM_INT);
        $stmt->execute();

        $res = $stmt->fetch(PDO::FETCH_ASSOC);


        //print_r($res);
       // var_dump($res['request_id']);
        $request_id = $res['request_id'];
        $Debator_id = $res['Debator_id'];

        if ($request_id === $userId) {
        	return $request_id;
        }elseif ($Debator_id === $userId){
        	return $Debator_id;
        }


		
	}




	public function TopicName($userId, $chat_id)
	{
		//echo "chat" .$chat_id;
		//echo "user" .$userId;
		$topic_id = WIDebate::topic_id($chat_id, $userId);
		//echo "top" . $topic_id;
		$result = $this->WIdb->select(
                    "SELECT * FROM `wi_topics` WHERE `topic_id`=:topic_id",
                     array(
                       "topic_id" => $topic_id
                     )
                  );
		//print_r($result);
		echo $result[0]['topic_title'];



	}

	public function topic_id($chat_id, $userId)
	{

		 $result = $this->WIdb->select(
                    "SELECT * FROM `wi_chat` WHERE `id`=:chat_id",
                     array(
                       "chat_id" => $chat_id
                     )
                  );

		//print_r($result);
		$request_id = $result[0]['request_id'];
        $Debator_id = $result[0]['Debator_id'];
        $spectator = $result[0]['spectator'];
        $topic_id = $result[0]['topic_id'];
        if ($request_id === $userId) {
        	return  $topic_id;

        }elseif ($Debator_id === $userId){
        	return $topic_id;
        }elseif ($spectator === $userId) {
        	return $topic_id;
        }
	}

	public function getChatMessages($chat_id, $last_chat_time, $userId)
	{
		//echo "chat" . $chat_id;
		//echo "time" . $last_chat_time;
		$test = WIDebate::chatClass($chat_id, $userId);
		//echo "test" . $test;
		$sql = "SELECT wi_msg.* FROM wi_msg INNER JOIN ( SELECT id FROM wi_msg WHERE chat_id = :chat_id ORDER BY id ASC) AS items ON wi_msg.id = items.id";
		$stmt = $this->WIdb->prepare($sql);
		$stmt->bindParam( ':chat_id',$chat_id,PDO::PARAM_INT);
        $stmt->execute();

		 while($chats = $stmt->fetchAll(PDO::FETCH_ASSOC)){
       			foreach ($chats as $chat) {
        	$msgUserId = $chat['user_id'];
       		$username = WIDebate::chatUserName('username', $msgUserId);
       	        if ($test === $msgUserId) {
        	echo '<div class="message-row response-debate" id="' . $chat['id'] . '" data-op-id="0">
<div class="msg-date">' . $chat['wtime'] . '</div>
<span class="usr-tit"><i class="material-icons chat-operators">' . $username . ' </i></span><span>' . $username . ' says:</span>' . $chat['msg'] . '</div>';
        }
        else {
        	echo '<div class="message-row response-request" id="' . $chat['id'] . '" data-op-id="0">
<div class="msg-date">' . $chat['wtime'] . '</div>
<span><i class="material-icons chat-operators">' . $username . ' </i></span><span>' . $username . ' says:</span>' . $chat['msg'] . '</div>';
        }
 
       	
       			}
       			
       		} 
		
	}

	public function chatStatus($chat_id)
	{
		 $result = $this->WIdb->select(
                    "SELECT * FROM `wi_chatbox` WHERE `chat_id`=:chat_id",
                     array(
                       "chat_id" => $chat_id
                     )
                  );
		 //var_dump($result);
		 return $result[0]['status'];

	} 


	public function closeDialog($userId, $chat_id)
	{

		//$Message = "User has left the chat";
		//WIDebate::SendMessage($Message, $chat_id, $userId);
		
		$status = "Available";
		$query = $this->WIdb->prepare('UPDATE `wi_user_details` SET  `status` =:status WHERE `user_id` = :id');
		$query->bindParam(':status', $status, PDO::PARAM_STR);
		$query->bindParam(':id', $userId, PDO::PARAM_INT);
		$query->execute();
	
		$status = WIDebate::chatStatus($chat_id);
		//echo "status". $status;
		
		if ($status > 0) {
			$status = "0";
			$sql = "UPDATE `wi_chatbox` SET `status` =:status WHERE `chat_id`=:chat_id";
			$stm = $this->WIdb->prepare($sql);
			$stm->bindParam(':chat_id', $chat_id, PDO::PARAM_INT);
			$stm->bindParam(':status', $status, PDO::PARAM_STR);
			$stm->execute();

			//$msg = "User has left the chat";
			$result = array(
			"status" => "successful"
			);
		echo json_encode($result);
			
		}else{

		$sql = "DELETE FROM `wi_chatbox` WHERE `chat_id` =:chat_id";
		$delete = $this->WIdb->prepare($sql);
		$delete->bindParam(':chat_id', $chat_id, PDO::PARAM_INT);
		$delete->execute();

				$sql = "DELETE FROM `wi_chat` WHERE `id` =:chat_id";
		$delete = $this->WIdb->prepare($sql);
		$delete->bindParam(':chat_id', $chat_id, PDO::PARAM_INT);
		$delete->execute();
		$result = array(
			"status" => "success"
			);
		echo json_encode($result);
        }
		//echo "user" . $userId;
		
		
	}

	public function status($chat_id){
		$status = WIDebate::chatStatus($chat_id);

		if ($status > 0) {
			
		}else{
			echo "User has left the chat";
		}
	}

	public function friend_userId($userId, $chat_id)
	{
		 $result = $this->WIdb->select(
                    "SELECT * FROM `wi_chat` WHERE `id`=:chat_id",
                     array(
                       "chat_id" => $chat_id
                     )
                  );

		//var_dump($result);
		$request_id = $result[0]['request_id'];
        $Debator_id = $result[0]['Debator_id'];

        if ($request_id === $userId) {
        	return  $Debator_id;

        }elseif ($Debator_id === $userId){
        	return $request_id;
        }
	}

	public function ShowViewProfile($userId, $chat_id)
	{
		$friend_userId = WIDebate::friend_userId($userId, $chat_id);
		$username = WIDebate::chatUserName('username', $friend_userId);
		echo '<div class="friend_profile"><a href="#" onclick="WIDebate.Profile(' .$friend_userId.');">View ' . $username .' Profile</a></div>';
	}

	public function Profile($friend_userId)
	{
		WISession::set("friend_userId", $friend_userId);

		$result = array(
                "status" => "success"
                );
            
            //output result
            echo json_encode ($result);

	}

	public function debator()
	{
		WISession::set("debate", 'debator');

		$result = array(
                "status" => "success"
                );
            
            //output result
            echo json_encode ($result);
	}

	public function spectate($vote)
	{
		WISession::set("debate", 'spectator');
		$user = WISession::get('user_id');
		$sql = "UPDATE `wi_chat` SET `spectator`=:user WHERE topic_id=:vote";

		$query = $this->WIdb->prepare($sql);
		$query->bindParam(':user', $user, PDO::PARAM_INT);
		$query->bindParam(':vote', $vote, PDO::PARAM_INT);
		$query->execute();
		$result = array(
                "status" => "success"
                );
            
            //output result
            echo json_encode ($result);
	}



	public function getTime($chat_id)
	{
		//echo "chat" . $chat_id;
		$sql = "SELECT * FROM `wi_chat` WHERE id=:id";

		$query = $this->WIdb->prepare($sql);
		$query->bindParam(':id', $chat_id, PDO::PARAM_INT);
		$query->execute();

		$result = $query->fetch(PDO::FETCH_ASSOC);
		//print_r($result);
		$endTime = $result['endTime'];
		//print_r($endTime);

		echo $endTime;
	}

	public function spectatorchat_id()
	{
		$user_id = WISession::GET('user_id');
		$sql = "SELECT `id` FROM `wi_chat` WHERE `spectator`= :user";
		$query = $this->WIdb->prepare($sql);
		$query->bindParam(':user', $user_id, PDO::PARAM_INT);
		$query->execute();

		$res = $query->fetch(PDO::FETCH_ASSOC);
		//print_r($res);
		return $res['id'];
	}


		public function winVote($column)
	{
		$spectator = WISession::get('user_id');

		$sql = "SELECT * FROM `wi_chat` WHERE `spectator`=:spec";
		$query = $this->WIdb->prepare($sql);
		$query->bindParam(':spec', $spectator, PDO::PARAM_INT);
		$query->execute();

		$res = $query->fetch(PDO::FETCH_ASSOC);
		//print_r($res);
		$debatename = $res[''. $column .''];
		echo $debatename;

	}

	public function debatorNames($column)
	{
		$spectator = WISession::get('user_id');

		$sql = "SELECT * FROM `wi_chat` WHERE `spectator`=:spec";
		$query = $this->WIdb->prepare($sql);
		$query->bindParam(':spec', $spectator, PDO::PARAM_INT);
		$query->execute();

		$res = $query->fetch(PDO::FETCH_ASSOC);
		//print_r($res);
		$debatename = $res[''. $column .''];
		
		$sql1 = "SELECT * FROM `wi_members` WHERE user_id=:user";
		$query1 = $this->WIdb->prepare($sql1);
		$query1->bindParam(':user', $debatename, PDO::PARAM_INT);
		$query1->execute();

		$result = $query1->fetch(PDO::FETCH_ASSOC);
		$Name = $result['username'];
		echo $Name;

	}

	public function WinnersVote($chat_id, $win)
	{
		//echo "chat" . $chat_id;
		$sql = "UPDATE `wi_chat` SET `winner`=:win WHERE `id`=:chat";
		$query = $this->WIdb->prepare($sql);
		$query->bindParam(':chat', $chat_id, PDO::PARAM_INT);
		$query->bindParam(':win', $win, PDO::PARAM_INT);
		$query->execute();

		$result = array(
			"success" => "complete"
			);
		echo json_encode($result);
	}

	public function winStatus($chat_id)
	{
		$sql = "SELECT * FROM `wi_chat` WHERE id=:chat";

		$query = $this->WIdb->prepare($sql);
		$query->bindParam(':chat' , $chat_id, PDO::PARAM_INT);
		$query->execute();

		$res = $query->fetch(PDO::FETCH_ASSOC);
		//print_r($res);
		$winner = $res['winner'];
		//echo "winner" . $winner;
		if($winner < 1){

			$result = array(
			"success" => "waiting",
			"win"    => $winner

			);
			echo json_encode($result);
		}else{
					$result = array(
			"success" => "completed",
			"win"    => $winner

			);
			echo json_encode($result);

		}

	}

	
}