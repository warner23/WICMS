<?php

require_once 'core/init.php';

$find_data = mysql_query("SELECT * FROM book_ratings");

while($row = mysql_fetch_assoc($find_data))
{
	$id = $row['id'];
	$book = $row['book'];
	$type = $row['type'];
	$comment = $row['comment'];
	$rating = $row['rating'];
	$hits = $row['hits'];
	
	echo "
	
	<form action='rate.php' method='POST'>
	$book: <select name='rating'>
	<option>1</option>
	<option>2</option>
	<option>3</option>
	<option>4</option>
	<option>5</option>
	<option>6</option>
	<option>7</option>
	<option>8</option>
	<option>9</option>
	<option>10</option>
	<input type='hidden' value='$book' name='book'>
	<input type='submit' value='Rate!'>Current Rating:"; echo round ($current_rating, 2); echo "
	</select>
	</form>
	";
}

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