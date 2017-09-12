<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');

// all books
$query = $db_conn->query('SELECT * FROM books');

$books = [];

while($row = $query->fetch_object())
{
	$books[] = $row;
}
?>

<div class="books">
<?php foreach($books as $book);?>
<div class="book">
<div class="book_img">
<a href="pandora.php?id=<?php echo $book->id ;?>"><img style="border:#666 1px solid;" src="img/books/<?php echo $book->id ;?>.jpg" alt="<?php echo $book->title ;?>" width="150" height="300" border="1" /></a>

<div class="title"><?php echo $book->title ;?></div>
<div class="desc"><?php echo $book->descrption ;?></div>
<div class="price"><?php echo $book->price ;?></div>
</div>
<div class="book_rating">Rating: x/5</div>

</div>

