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

		 if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
        $page_number = 1; //if there's no page number, set it to 1
    }

        $item_per_page = 15;

        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_vote`");
        $rows = count($result);

        //break records into pages
        $total_pages = ceil($rows/$item_per_page);

                //get starting position to fetch the records
        $page_position = (($page_number-1) * $item_per_page);

		// check users vote
		$vote = WIListings::search($userId, $vote_id, $column);
		$IdVote = WIListings::Vote_Id(WISession::get('id_vote'));
		

		if($vote === "for"){
			$vote = "against";
			
			$query = $this->WIdb->prepare('SELECT * FROM `wi_vote` WHERE `vote` = :vote AND `vote_id` = :vote_id AND `user_id` !=:user ORDER BY `id` ASC LIMIT :page, :item_per_page');
	$query->bindParam(':vote', $vote, PDO::PARAM_STR);
	$query->bindParam(':vote_id', $IdVote, PDO::PARAM_INT);
	$query->bindParam(':page', $page_position, PDO::PARAM_INT);
	$query->bindParam(':user', $userId, PDO::PARAM_INT);
    $query->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);
	$query->execute();
	 echo '<ul class="contents">';
	while ($result = $query->fetch()) {
		//var_dump($result);
		echo'<li class="listing" id="' . $result['user_id'] . '" onclick="WIDebate.debate(event, '.WISession::get("user_id").', ' . $result['user_id'] . ',' . $result['vote_id'] . ')">
		<button id="debate" class="btn-prim">Debate</button>
		<span class="vote">' . $result['vote'] . '</span>
		</li>';
	}
		}else if($vote === "against"){
			$vote = "for";
			$query = $this->WIdb->prepare('SELECT * FROM `wi_vote` WHERE vote= :vote AND vote_id = :vote_id AND `user_id` !=:user ORDER BY `id` ASC LIMIT :page, :item_per_page');
	$query->bindParam(':vote', $vote, PDO::PARAM_STR);
	$query->bindParam(':vote_id', $IdVote, PDO::PARAM_INT);
	$query->bindParam(':page', $page_position, PDO::PARAM_INT);
	$query->bindParam(':user', $userId, PDO::PARAM_INT);
    $query->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);

	$query->execute();
	echo '<ul class="contents">';
	while ($result = $query->fetch()) {
		//var_dump($result);
		echo'<li class="listing" id="' . $result['user_id'] . '" onclick="WIDebate.debate(event, '.WISession::get("user_id").', ' . $result['user_id'] . ',' . $result['vote_id'] . ')"><button id="debate" class="btn-prim">Debate</button>
		<span class="vote">' . $result['vote'] . '</span>
		</li>';
		    	}
		}else if($vote === "other"){
			$query = $this->WIdb->prepare('SELECT * FROM `wi_vote` WHERE vote= :vote AND vote_id = :vote_id ORDER BY `id` ASC LIMIT :page, :item_per_page');
	$query->bindParam(':vote', $vote, PDO::PARAM_STR);
	$query->bindParam(':vote_id', $IdVote, PDO::PARAM_INT);
	$query->bindParam(':page', $page_position, PDO::PARAM_INT);
    $query->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);
	$query->execute();
	echo '<ul class="contents">';
	while ($result = $query->fetch()) {
		//var_dump($result);
		echo'<li class="listing" id="' . $result['user_id'] . '" onclick="WIDebate.debate(event, '.WISession::get("user_id").', ' . $result['user_id'] . ',' . $result['vote_id'] . ')"><button id="debate" class="btn-prim">Debate</button>
		<span class="vote">' . $result['vote'] . '</span><span class="vote">' . $result['option'] . '</span>
		</li>';	
	}
		}

		 echo '</ul>';
    // echo "per page" . $item_per_page;
    // echo " page no" . $page_number;
    // echo " rows" . $rows;
    // echo " total page" . $total_pages;
    $Pagination = WIListings::Pagination($item_per_page, $page_number, $rows, $total_pages);
    //print_r($Pagination);


         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagination;
    echo '</div>';
		
		


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


	public function Pagination($item_per_page, $current_page, $total_records, $total_pages)
    {
         $pagination = '';
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
        $pagination .= '<ul class="pagination">';
        
        $right_links    = $current_page + 3; 
        $previous       = $current_page - 3; //previous link 
        $next           = $current_page + 1; //next link
        $first_link     = true; //boolean var to decide our first link
        
        if($current_page > 1){
            $previous_link = ($previous==0)? 1: $previous;
            $pagination .= '<li class="first"><a href="#" data-page="1" title="First">&laquo;</a></li>'; //first link
            $pagination .= '<li><a href="#" data-page="'.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                    if($i > 0){
                        $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>';
                    }
                }   
            $first_link = false; //set first link to false
        }
        
        if($first_link){ //if current active page is first link
            $pagination .= '<li class="first active">'.$current_page.'</li>';
        }elseif($current_page == $total_pages){ //if it's the last active link
            $pagination .= '<li class="last active">'.$current_page.'</li>';
        }else{ //regular current link
            $pagination .= '<li class="active">'.$current_page.'</li>';
        }
                
        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
            if($i<=$total_pages){
                $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page '.$i.'">'.$i.'</a></li>';
            }
        }
        if($current_page < $total_pages){ 
                $next_link = ($i > $total_pages) ? $total_pages : $i;
                $pagination .= '<li><a href="#" data-page="'.$next_link.'" title="Next">&gt;</a></li>'; //next link
                $pagination .= '<li class="last"><a href="#" data-page="'.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
        }
        
        $pagination .= '</ul>'; 
    }
    return $pagination; //return pagination links
    }
		

}