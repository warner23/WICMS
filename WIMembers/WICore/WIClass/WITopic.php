<?php

class WITopic
{
	
	function __construct()
	{
		$this->WIdb = WIdb::getInstance();
	}

	public function topic()
	{
		$topic = $this->WIdb->prepare('SELECT * FROM wi_topics');
		$topic->execute();
		$order = $topic->fetch();

		$query = $this->WIdb->prepare('SELECT * FROM wi_topics ORDER BY ' . $order['order'] . ' ');
		$query->execute();

		while ($result = $query->fetch(PDO::FETCH_ASSOC) ){
			echo '<a href="#" onclick="WITopic.votingSide('. $result['topic_id'] . ');"><div class="col-md-4 topic" id="'. $result['topic_id'] . '">	
	'. $result['topic_title'] . '
</div></a>';
		}
		
	}
   

	public function selected_Voting($vote, $options, $vote_id)
	{
		$userId = WISession::get('user_id');
		$result = $this->WIdb->insert('wi_vote', array( 
			'user_id' => $userId, 
			'vote' => $vote,
			'option' => $options,
			'vote_id'  => $vote_id
			));

		$IdVote = $this->WIdb->lastInsertId();

		WISession::set("id_vote", $IdVote);

		$msg = "saved";
		 $result = array(
                "status" => "success",
                "msg"    => $msg
            );
            
            echo json_encode($result);
		
	}

	public function checkVote($voting_id)
	{
		$userId = WISession::get('user_id');

		 $result = $this->WIdb->select(
                    "SELECT * FROM wi_vote WHERE user_id=:id AND vote_id=:vote_id",
                     array(
                       "id" => $userId,
                       "vote_id" => $voting_id
                     )
           );

		if ($result === null){
			return false;
		}else return true;

	}

		public function selected_Vote($vote, $voting_id)
	{

		$userId = WISession::get('user_id');
		

			$result = $this->WIdb->insert('wi_vote', array( 
			'user_id' => $userId, 
			'vote' => $vote,
			'vote_id' => $voting_id
			));

			$IdVote = $this->WIdb->lastInsertId();

			WISession::set("id_vote", $IdVote);

			$msg = "Succesfully Voted";
		 $result = array(
                "status" => "success",
                "msg"    => $msg
            );

		  echo json_encode($result);
	}


}
?>