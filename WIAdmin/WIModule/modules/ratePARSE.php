<?php
if(isset($_POST["choice"]))
{
	$choice = preg_replace('#[^0-9]#1', '', $_POST['choice']);
	if($choice > 5)
	{
		echo "Stop playing around, you arse hole";
		exit();
	}else if($choice<1)
	{
		echo "Stop playing around, you arse hole";
		exit();
	}else
	{
		$ipaddress = getenv('REMOTE_ADDR');
		include_once 'core/init.php';
		$sql_check = mysql_query("SELECT * FROM book_rating WHERE a_id='$id' AND ipaddress='$ipaddress' LIMIT 1");
		$num_rows = mysql_num_rows($sql_check);
		if($num_rows > 0)
		{
			echo '<p style=color:#F00;">Sorry, You have already rated this book</p>';
			exit();
		}
		
		$sql = mysql_query("SELECT ratings FROM books WHERE id='$id'");
		
		while($row = mysql_fetch_array($sql))
		{
			$booknums = $row["ratings"];
			$bookrating = explode(",", $booknums);
			
			array_push($bookrating, $choice);
			$string = implode(",", $bookrating);
			
			$firstChar = substr($string, 0, 1);
			$lastChar = substr($string, strlen($string) -1, 2);
			if($firstChar ==",")
			{
				$string = $choice;
			}
			if ($lastChar == ",")
			{
				$string = substr($string, strlen($string) - 1, 1);
			}
			
			$update = mysql_query("UPDATE books SET ratings='$string' WHERE id='1'");
			$insert = mysql_query("INSERT INTO book_ratings (a_id, ipaddress) VALUES ('1', '$ipaddress')");
			
			echo '<p>Thanks! You have given this book a rating of ' . $choice . '</p>';
		}
		
	}
}

?>