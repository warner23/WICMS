<?php
/***
*
*   WARNER-INFINTY CMS SOCIAL
*   DEVELOPED BY WARNER-INFINITY FOR USE ONLY WITH WARNER-INFINITY PRODUCTS AND SERVICES
*   @author : Jules Warner
*             
*             
*/

	class WIForum
{
	public function __construct()
	{
		$this->WIdb = WIdb::getInstance();
		$this->login = new WILogin();
        $this->Info = new WIUserInfo();
        $this->user   = new WIUser(WISession::get('user_id'));
	}

    public function WICategories()
    {
    	$query = $this->WIdb->prepare('SELECT * FROM `wi_forum_sections` ORDER BY ordered ASC LIMIT 10');
    	$query->execute();
		while($result = $query->fetch(PDO::FETCH_ASSOC))
		{
		echo  '<div class="col-cats">
<div class="col-category">
<div class="avatpic">
<a href="section.php?id=' . $result['id'] . '">
<img class="ava" src="' . $result['image'] . '">
<p class="text">' . $result['title'] . '</p></a>
</div><!-- end avatpic-->
</div><!-- end of col-category-->
</div><!-- end of col-cats-->';
		}
    	
}

	public function WISection($id)
	{

    	$query = $this->WIdb->prepare('SELECT * FROM `wi_forum_posts` WHERE `section_id` = :id ORDER BY `date_time` ASC LIMIT 10');
    	$query->bindParam(':id', $id, PDO::PARAM_INT);
    	$query->execute();
		while($result = $query->fetch(PDO::FETCH_ASSOC))
		{
		echo  '<div class="col-topics">
<a href="post.php?id='. $result['id'] .'"><div class="col-topic-section">'. $result['section_title'] .'</div><!-- end of topic section-->
<div class="col-topic-author">'. $result['post_author'] .'<div class="avatpic1"><img class="ava1" src="http://wliterature.com/Missing/WIMembers/avatars/missing_img.jpg">
</div><!-- end avatpic--></div><!-- end of topic section-->
<div class="col-topic-views">'. $result['view_count'] .'</div><!-- end of topic section-->
<div class="col-topic-replies">'. $result['replies'] .'</div><!-- end of topic section--></a>
</div><!--e nd of topics-->';
		}
	}


	public function WIPosts($id)
	{
		$query = $this->WIdb->prepare('SELECT * FROM `wi_post_forum` WHERE `post_id` =:id ORDER BY `date_time` ASC');
		$query->bindParam(':id', $id, PDO::PARAM_INT);
		$query->execute();

		while($result = $query->fetch(PDO::FETCH_ASSOC))
		{
			echo '<div class="col-100">
<div class="col-labels1">'. $result['post_title'] .'</div></div>
			<div class="inner_col">
<div class="section_box">
<div class="avatpic_post"><a href="#"><img class="ava" src="#"></a>
</div><!-- end avatpic-->
<div class="post_name">' . $result['thread_title'] . '</div><!-- end section-->
<div class="post_comment">' . $result['post_body'] . '</div><!-- end section-->
<div class="post_author">' . $result['post_author'] . '</div><!-- end section-->
<div class="last_time">' . $result['date_time'] . '</div><!-- end section-->
</div><!-- end section box-->
</div><!-- end inner col-->';
		}

	}

	public function forumMenu()
	{
		
			if(!$this->login->isLoggedIn()) // guest
			{

			echo ' <nav role="navigation" class="navbar navbar-default">
			<ul class="navbar-nav nav">
			<li><a href="">Categories</a></li>
			<li><a href="#"></a></li>
			<li><a href="#"></a></li>
			<li><a href="#">Post</a></li>
			<li><a href="#"></a></li>
			 </nav>';

			 
			} elseif($this->user->isAdmin())  // admin
			{
			
			echo '<nav role="navigation" class="navbar navbar-default">
			<ul class="navbar-nav nav">
			<li><a href="#">Categories</a></li>
			<li><a href="#">Topics</a></li>
			<li><a href="#">Create New Category</a></li>
			<li><a href="#">Create New Topic</a></li>
			<li><a href="#">Post</a></li>
			<li><a href="#">Edit Post</a></li>
			 </nav>';
			
			}else{ // user
			
			echo '<nav role="navigation" class="navbar navbar-default">
			<ul class="navbar-nav nav">
			<li><a href="#">Categories</a></li>
			<li><a href="#">Topics</a></li>
			<li><a href="#"></a></li>
			<li><a href="#">Create New Topic</a></li>
			<li><a href="#">Post</a></li>
			<li><a href="#"></a></li>
			 </nav>';

		};
	}



}
