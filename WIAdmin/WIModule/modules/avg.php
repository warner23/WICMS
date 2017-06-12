<?php

include_once 'core/init.php';

$totals ="";
$rating= "";
$stars = "star";

if (isset($_GET['id'])) {
	// Connect to the MySQLi database  

	$id = preg_replace('#[^0-9]#i', '', $_GET['id']); 
}
$sql = mysqli_query($db_conn, "SELECT rating FROM books WHERE id='$id'");

while($row = mysqli_fetch_array($sql))
{
	$mynum = $row["rating"];
	$expl = explode(",", $mynum);
	$result = array_count_values($expl);
	foreach($result as $key => $value)
	{
		if($value =="1")
		{
			$howmany = "person";
		}else
		{
			$howmany ="people";
		}
		if ($key =="")
		{
			$pic = "img/ratings/starnorm.PNG";
		}
		
		else if($key =="1")
		{
			$stars = "star";
			$pic = "../img/ratings/1star.PNG";
		}else if($key =="2")
		{
			$stars = "star";
			$pic = "../img/ratings/2star.PNG";
		}else if($key =="3")
		{
			$stars = "star";
			$pic = "../img/ratings/3star.PNG";
		}else if($key =="4")
		{
			$stars = "star";
			$pic = "../img/ratings/4star.PNG";
		}else if($key =="5")
		{
			$stars = "star";
			$pic = "../img/ratings/5star.PNG";
		}
		
		$totals .= '<p class="small">' . $key . ' ' . $stars . ' : <img src"' . $pic . '" alt="stars" />
		 ' . $value . ' ' . $howmany . '</p>';
	}
	
	$count = count($expl);
	$sum = array_sum($expl);
	$avg = $sum / $count;
	$roundup = floor($avg);
	
	if($roundup == 0)
	{
		$rating = "This book has not been rated. You can be the first to rate this book.";
	}else if ($count == 1)
	{
		$rating = "Average rating for the book is currently ' .$roundup . '/<b />This book has been rated by $count person.";
	}else
	{
		$rating = "Sorry, there is an error in the system... Please try refreshing.";
	}
	
	
	
}

mysqli_close($db_conn);