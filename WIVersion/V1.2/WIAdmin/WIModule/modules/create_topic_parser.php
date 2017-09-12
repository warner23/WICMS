<?php
if(isset($_POST['topic_submit']))
{
	if(($_POST['topic_submit']))
	{
		echo 'You did not fill in both fields.Please return to the previous page.';
		exit();
	}else
	{
		include_once 'core/init.php';
		$cid = $_POST['cid'];
		$title = $_POST['topic_title'];
		$content = $_POST['topic_content'];
		$creator = $_SESSION['id'];
		$sql = "INSERT INTO topics (cateogry_id, topic_title, topic_creator, topic_date, topic_reply_date) VALUES ('".$cid."', '".$title."' '".$creator."', now(), now())";
		
		$res = mysqli_query($db_conn, $sql) or die(mysqli_error());
		$new_topic_id = mysqli_insert_id();
		$sql2= "INSERT INTO posts ( category_id, topic_id, post_creator, post_content, post_date) VALUES ('".$cid."', '".$new_topic_id."', '".$creator."', now())";
		$res2 = mysqli($db_conn, $sql2) or  die(mysqli_error());
		$sql3 = "UPDATE categories SET last_post_date=now(), last_user_posted'".$creator."' WHERE id='".$cid."' LIMIT 1";
		if(($res) && ($res2) &&($res3))
		{
			header("Location: view_topic.php?cid=".$cid."&tid=".$new_topic_id);
		}else
		{
			echo "There was a problem creating your topic, please try again.";
		}
		
	}
}


?>