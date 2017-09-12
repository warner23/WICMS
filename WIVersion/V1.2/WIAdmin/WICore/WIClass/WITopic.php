<?php

class WITopic
{
	
	function __construct()
	{
		$this->WIdb = WIdb::getInstance();
	}

	public function topic()
	{
		$query = $this->WIdb->prepare('SELECT * FROM wi_topics');
		$query->execute();

		while ($result = $query->fetch(PDO::FETCH_ASSOC) ){
			echo '<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>'. $result['topic_title'] . '<span class="order" id="'. $result['order'] . '">'. $result['order'] . '</span></li>';
		}
	}


	public function topic_Info() 
	{


		$user_id = 1;
		
	

		$query = $this->WIdb->prepare('SELECT * FROM `wi_topics`');
		$query->execute();

		while($res = $query->fetch(PDO::FETCH_ASSOC))
		{
			 echo '<div class="control-group form-group">
                        <!-- Username -->
                        <label class="control-label col-lg-4"  for="Topic">Topic</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="Topic"  maxlength="88" name="Topic" placeholder="Topic" class="input-xlarge form-control" value="' . $res['topic_title'] . '"> <br />
                        </div>
                      </div>';
		}

	}

	public function Empty_Topic()
	{

		echo '<div class="control-group form-group">
                        <!-- Username -->
                        <label class="control-label col-lg-4"  for="Topic">Topic</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="Topic" onclick="WITopic.newTopic()"  maxlength="88" name="Topic" placeholder="Topic" class="input-xlarge form-control" value="New Topic"> <br />
                        </div>
                      </div>';

	}

	public function ChangeTopic($topic_id, $topic)
	{

	}

	public function newTopic($topic)
	{

	}


}
?>