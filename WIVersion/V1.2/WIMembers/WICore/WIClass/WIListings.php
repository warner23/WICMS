<?php

/**
* 
*/
class WIListings 
{
	
	function __construct()
	{
		$this->WIdb = WIdb::getInstance();
	}



	public function listings($userId, $vote_id, $column)
	{
		// check users vote
		$vote = WIListings::search($userId, $vote_id, $column);
		$IdVote = WIListings::Vote_Id(WISession::get('id_vote'));
		

		if($vote === "for"){
			$vote = "against";
			
			$query = $this->WIdb->prepare('SELECT * FROM `wi_vote` WHERE `vote` = :vote AND `vote_id` = :vote_id');
	$query->bindParam(':vote', $vote, PDO::PARAM_STR);
	$query->bindParam(':vote_id', $IdVote, PDO::PARAM_INT);
	$query->execute();
	while ($result = $query->fetch()) {
		//var_dump($result);
		echo'<li class="listing" id="' . $result['user_id'] . '" onclick="WIDebate.debate(event, '.WISession::get("user_id").', ' . $result['user_id'] . ',' . $result['vote_id'] . ')">
		<button id="debate" class="btn-prim">Debate</button>
		<span class="vote">' . $result['vote'] . '</span>
		</li>';
	}
		}
		if($vote === "against"){
			$vote = "for";
			$query = $this->WIdb->prepare('SELECT * FROM `wi_vote` WHERE vote= :vote AND vote_id = :vote_id');
	$query->bindParam(':vote', $vote, PDO::PARAM_STR);
	$query->bindParam(':vote_id', $IdVote, PDO::PARAM_INT);
	$query->execute();
	while ($result = $query->fetch()) {
		//var_dump($result);
		echo'<li class="listing" id="' . $result['user_id'] . '" onclick="WIDebate.debate(event, '.WISession::get("user_id").', ' . $result['user_id'] . ',' . $result['vote_id'] . ')"><button id="debate" class="btn-prim">Debate</button>
		<span class="vote">' . $result['vote'] . '</span>
		</li>';
		    	}
		}

		if($vote === "other"){
			$query = $this->WIdb->prepare('SELECT * FROM `wi_vote` WHERE vote= :vote AND vote_id = :vote_id');
	$query->bindParam(':vote', $vote, PDO::PARAM_STR);
	$query->bindParam(':vote_id', $IdVote, PDO::PARAM_INT);
	$query->execute();
	while ($result = $query->fetch()) {
		//var_dump($result);
		echo'<li class="listing" id="' . $result['user_id'] . '" onclick="WIDebate.debate(event, '.WISession::get("user_id").', ' . $result['user_id'] . ',' . $result['vote_id'] . ')"><button id="debate" class="btn-prim">Debate</button>
		<span class="vote">' . $result['vote'] . '</span><span class="vote">' . $result['option'] . '</span>
		</li>';	
	}
		}
		
		


	}

	public function Vote_Id($IdVote)
	{
		$query = $this->WIdb->prepare('SELECT `vote_id` FROM wi_vote WHERE id =:IdVote');
		$query->bindParam(':IdVote', $IdVote, PDO::PARAM_INT);
		$query->execute();

		$result = $query->fetch();
		//var_dump($result);
		//print_r($result[0]);
		return $result[0];


	}

	public function search($userId, $vote_id, $column)
	{
		$IdVote = WIListings::Vote_Id(WISession::get('id_vote'));
	$query = $this->WIdb->prepare("SELECT `wi_vote`.`vote` as vote FROM `wi_vote` WHERE `wi_vote`.`user_id`= :userId AND vote_id = :vote_id AND id = :IdVote");

	$query->bindParam(':userId', $userId, PDO::PARAM_INT);
	$query->bindParam(':vote_id', $IdVote, PDO::PARAM_INT);
	$query->bindParam(':IdVote', $vote_id, PDO::PARAM_INT);
	$query->execute();

	$res = $query->fetch(PDO::FETCH_ASSOC);
	//var_dump($res["vote"]);
	return $res["vote"];

	


	

	}
		

}