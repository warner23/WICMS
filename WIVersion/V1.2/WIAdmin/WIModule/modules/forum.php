<?php
include_once 'core/init.php';

$sql = "SELECT * FROM categories ORDER BY category_title ASC";
$res = mysql_query($sql) or die(mysql_error());
$categories = "";

if(mysql_num_rows($res) > 0)
{
	while($row = mysql_fetch_assoc($res))
	{
		$id = $row['id'];
		$title = $row['title'];
		$description = $row['description'];
		$categories .="<a href='#' class='cat_links'>".$title." -<font size='-1'>".$description."</font></a>";
	}
	echo $categories;
   
	
}else
{
	echo "<p> There are no categories available yet.</p>";
}

?>




