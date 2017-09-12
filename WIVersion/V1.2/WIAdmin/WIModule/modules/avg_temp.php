<?php

include_once 'core/init.php';
if (isset($_GET['id'])) {
	// Connect to the MySQL database  

	$id = preg_replace('#[^0-9]#i', '', $_GET['id']); 
}
	
$sql = mysql_query("SELECT ratings FROM books WHERE id='$id'");
while($row = mysql_fetch_array($sql))
{
	$mybooknum = $row["ratings"];
	$bookrating = explode(",", $mybooknum);
	$count = count($bookrating);
	$sum = array_sum($bookrating);
	$avg = $sum / $count;
	$roundup = floor($avg);
	
	if($roundup == 0)
	{
		$rating = "This book has not been rated. You can be the first to rate this book.";
	}else if ($count == 1)
	{
		$rating = "Average rating for the book is currently $roundup<b />This book has been rated by $count person.";
	}else
	{
		$rating = "Sorry, there is an error in the system... Please try refreshing.";
	}
}

?>