<?php  
include_once '../core/init.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');
if(isset($_GET['book'], $_GET['rating']))
{
	$book = (int)$_GET['book'];
	$rating = (int)$_GET['rating'];
	
	if(in_array($rating, [1, 2, 3, 4, 5]))
	{
		   $exists = $db_conn("SELECT id FROM books WHERE id = {$book}")->num_rows ? true :false;
		   if($exists)
		   {
			   $db_conn->query("INSERT INTO book_ratings(book, rating) VALUE ({$book}, {$rating})");
		   }
	}
	
	header('Location: inc/pandora.php?id='.$book);
	
}


?>