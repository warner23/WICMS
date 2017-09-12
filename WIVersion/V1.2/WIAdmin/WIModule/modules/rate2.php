<?php

require_once 'core/init.php';

$book = $_POST['book'];
$post_rating = $_POST['rating'];

$find_current_rating = mysql_query("SELECT * FROM book_ratings WHERE book='$book'");

while($row = mysql_fetch_assoc($find_data))
{
	$id = $row['id'];
	$current_rating = $row['rating'];
	$current_hits = $row['hits'];
	$comment = $row['comment'];

}

$new_hits = $current_hits + 1;
$update_hits = mysql_query("UPDATE book_ratings SET hits = '$new_hits' WHERE id='$id'");

$pre_rating = $current_rating + $post_rating;
$new_rating = $pre_rating / $new_hits ;

$update_rating = mysql_query("UPDATE book_ratings SET rating ='$new_rating' WHERE id='$id'");
?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>