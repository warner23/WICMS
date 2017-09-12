<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once 'rater/rater.php'; 


?>

<?php 



// Check to see the URL variable is set and that it exists in the database
if (isset($_GET['id'])) {
	// Connect to the MySQL database  

	$id = preg_replace('#[^0-9]#i', '', $_GET['id']); 
	// Use this var to check to see if this ID exists, if yes then get the product 
	// details, if no then exit this script and give message why
	$books = "";
	$sql = mysqli_query($db_conn, "SELECT * FROM books WHERE id='$id' LIMIT 1")or die(mysqli_error($db_conn));
	//$result = mysqli_query($db_conn,$sql);
	$bookCount = mysqli_num_rows($sql); // count the output amount
	
    if ($bookCount > 0) {
		// get all the product details
		while($row = mysqli_fetch_array($sql)){ 
			 $title = $row['title'];
		$comment = $row['comment'];
		$descr = $row['descrption'];
		$type = $row['type'];
		$rating = $row['rating'];
		$price = $row['price'];
         }
		 
	} else {
		echo "That item does not exist.";
	    exit();
	}
		
} else {
	echo "Data to render this page is missing.";
	exit();
}

?>

<section class="content portfolio_2">			<div class="s_container">				<div class="row">					<div class="col-lg-12 col-md-12 col-sm-12" id="col-pd">

<div class="cover">
<div class="rating">
<?php    
echo '<div class="hreview">';
echo '<form method="post" action="'.$_SERVER["PHP_SELF"].'">';
echo '<h3 class="item">Rate <span class="fn">'.$rater_item_name.'</span></h3>';
echo '<div>';
echo '<span  class="rating"><img src="'.$rater_stars.'?x='.uniqid((double)microtime()*1000000,1).'" alt="'.$rater_stars_txt.' stars" /> Ave. rating: '.$rater_stars_txt.'</span> from <span class="reviewcount"> '.$rater_votes.' votes</span>.';
echo '</div>';
?>
</div><!-- end rating-->
<div class="coverimg"><img src="../img/revslider/pandora.jpg"></div><!-- end coverimg-->
<div class="coverinfo">
<div class="covertitle"><?php echo $title?></div><!--- end cover title-->
<div class="cover_options"><?php include_once 'book_type_select.php';?></div><!--end cover options-->
<div class="cover_desc"><?php echo $descr ?></div><!-- end cover price-->
<div class="cover_price"><?php echo "$".$price; ?></div><!-- end cover price-->
</div><!-- en dcover-->
</div><!-- end coverinfo-->
<div class="review">
<div class="comm"><?php echo $comment?>
</div><!-- end comms-->


<div class="rating">
<strong>Rate this Book</strong>
<?php
echo '<div>';
echo '<label for="rate5_'.$rater_id.'"><input type="radio" value="5" name="rating_'.$rater_id.'[]" id="rate5_'.$rater_id.'" />Excellent</label>';
echo '<label for="rate4_'.$rater_id.'"><input type="radio" value="4" name="rating_'.$rater_id.'[]" id="rate4_'.$rater_id.'" />Very Good</label>';
echo '<label for="rate3_'.$rater_id.'"><input type="radio" value="3" name="rating_'.$rater_id.'[]" id="rate3_'.$rater_id.'" />Good</label>';
echo '<label for="rate2_'.$rater_id.'"><input type="radio" value="2" name="rating_'.$rater_id.'[]" id="rate2_'.$rater_id.'" />Fair</label>';
echo '<label for="rate1_'.$rater_id.'"><input type="radio" value="1" name="rating_'.$rater_id.'[]" id="rate1_'.$rater_id.'" />Poor</label>';
echo '<input type="hidden" name="rs_id" value="'.$rater_id.'" />';
echo '<input type="submit" name="rate'.$rater_id.'" value="Rate" />';
echo '</div>';
if($rater_msg!="") echo "<div>".$rater_msg."</div>";
echo '</form>';
echo '</div>';

?>

   <div class"img"><img src="img/books/<?php echo $id; ?>.jpg" width="142" height="188" alt="<?php echo $title; ?>" /><br/>
      <a href="img/books/<?php echo $id; ?>.jpg">View Full Size Image</a></div>
    <div class"top"><h3><?php echo $title; ?></h3></div>
      <div><?php echo $descr; ?></div><br />
        <br />
        <div><?php include_once 'book_type_select.php';?> </div><br />
<br />
        <div><?php echo "$".$price; ?></div>
<br />
        </p>
        <div>
      <form id="form1" name="form1" method="post" action="cart.php">
        <input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
        <input type="submit" name="button" id="button" value="Add to Shopping Cart" />
      </form>
      </div>
      
<div id="status3"></div>
</div>
<br />
</div>

</div><!-- end rating-->
</div><!-- end review-->

</div><!-- end col-lg-12 col-md-12 col-sm-12-->
</div><!-- end row-->
</div><!-- end t_container-->
</section>
<?php
mysqli_close($db_conn);

?>