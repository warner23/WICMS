<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');

$book = null;

if(isset($_GET['id']))
{
	$id = (int)$_GET['id'];
	
	$book = $db_conn->query("SELECT * FROM books WHERE id = {$id}")->fetch_object(); 	
}
?>

<div class="books">
<?php  if($book); ?>
<div class="book">
<div class="book_rating">Rating: x/5</div>
<div class="book_img">
<a href="pandora.php?id=<?php echo $book->id ;?>"><img style="border:#666 1px solid;" src="img/books/<?php echo $book->id ;?>.jpg" alt="<?php echo $book->title ;?>" width="150" height="300" border="1" /></a></div>

<div class="title"><?php echo $book->title ;?></div>
<div class="desc"><?php echo $book->descrption ;?></div>
<div class="price"><?php echo $book->price ;?></div>
</div>

<div class="rate_book">
Rate this book:
<?php  foreach (range(1, 5) as $rating)
{ echo '<a href="rate.php?book=echo $book->id;&rating=echo $rating">echo $rating</a>'}; 

?>

</div>
</div>




