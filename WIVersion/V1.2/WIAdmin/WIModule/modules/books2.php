<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
// Run a select query to get my letest 6 items
// Connect to the MySQL database  
 
$dynamicList = "";
$sql = mysqli_query($db_conn, "SELECT * FROM books ORDER BY date_added DESC LIMIT 6");
$productCount = mysqli_num_rows($sql); // count the output amount
if ($productCount > 0) {
	while($row = mysqli_fetch_array($sql)){ 
		$id = $row['id'];
        $title = $row['title'];
		$comment = $row['comment'];
		$descr = $row['descrption'];
		$type = $row['type'];
		$rating = $row['rating'];
		$price = $row['price'];
			 
			 
			 $dynamicList .= '<div class="books">
        <tr>
          <div class="top"><a href="pandora.php?id=' . $id . '"><img style="border:#666 1px solid;" src="img/books/' . $id . '.jpg" alt="' . $title . '" width="150" height="300" border="1" /></a></div>
          <div class="bottom">' . $title . '<br />
            $' . $price . '<br />
            <a href="pandora.php?id=' . $id . '">View Product Details</a>
			</div>
        
      </div>';
    }
} else {
	$dynamicList = "We have no products listed in our store yet";
}
mysqli_close($db_conn);
?>

<div class="book"><?php echo $dynamicList; ?></div>
