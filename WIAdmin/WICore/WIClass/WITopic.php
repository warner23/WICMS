<?php

class WITopic
{
	
	function __construct()
	{
		$this->WIdb = WIdb::getInstance();
	}

	public function topic()
	{
		$sql = "SELECT * FROM wi_topics";
		$query = $this->WIdb->prepare($sql);
		$query->execute();

		$n = 1; 
    //echo '<p>'.($n + 1).'</p>';

		echo '<ul id="sortable">
		';
  
		while ($result = $query->fetch(PDO::FETCH_ASSOC) ){
			
			echo '<li >
			<span class="ui-icon ui-icon-arrowthick-2-n-s" id="order">'.($n ++).'</span>
			<div class="ui-state-default">
			<span ></span>'. $result['topic_title'] . '<span class="order" id="'. $result['topic_id'] . '">'. $result['order'] . '</span></div></li>';
		}

		echo '</ul>';
	}


	public function topic_Info() 
	{


		$user_id = 1;
		
	
		$sql = "SELECT * FROM `wi_topics`";
		$query = $this->WIdb->prepare($sql);
		$query->execute();

		while($res = $query->fetch(PDO::FETCH_ASSOC))
		{
			 echo '<div class="form-group">
                        
                        <label class="control-label col-lg-4"  for="Topic">Topic</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="'. $res['topic_id'] . '"  maxlength="88" name="Topic" placeholder="Topic" class="input-xlarge form-control topic" value="' . $res['topic_title'] . '"> <br />
                        </div>
                      </div>';
		}

	}

	public function Empty_Topic()
	{

		echo '<div class="form-group">
                        
                        <label class="control-label col-lg-4"  for="Topic">Topic</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="Topic" onclick="WITopic.newTopic()"  maxlength="88" name="Topic" placeholder="Topic" class="input-xlarge form-control" value="New Topic"> <br />
                        </div>
                      </div>';

	}

	public function editTopics($topic_id, $topic)
	{

		$sql = "UPDATE `wi_topics` SET `topic_title`=:topic WHERE `topic_id`=:id";

		$query = $this->WIdb->prepare($sql);
		$query->bindParam(':topic', $topic, PDO::PARAM_STR);
		$query->bindParam(':id', $topic_id, PDO::PARAM_INT);
		$query->execute();

		echo "Successfully edited topics";




	}

	public function addNew()
	{
		echo '<form class="form-horizontal" id="add-user-form">


                      <div class="form-group">
                        <label class="control-label col-lg-3" for="topic_title">
                          ' . WILang::get('topic_title') .'
                        </label>
                        <div class="controls col-lg-9">
                          <input id="topic_title" name="topic_title" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>
                  </form>';
	}

	public function newTopic($topic)
	{
		$this->WIdb->insert('wi_topics', array(
            "topic_title"     => $topic
        )); 

        echo "Successfully added a new topic";

             
	}


}
?>