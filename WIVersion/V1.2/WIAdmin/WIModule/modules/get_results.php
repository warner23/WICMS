<?php
include_once '../core/init.php';
if(isset($_GET['id']))
{
	$id = preg_replace('#[^0-9]#1', '', $_GET['id']);
}

$sql = mysql_query("SELECT ratings FROM books WHERE id='$id'");
while($row = mysql_fetch_array($sql))
{
	$mynums = $row['ratings'];
	$expl = explode(",", $mynums);
	$count = count($expl);
	$sum = array_sum($expl);
	$avg = $sum / $count;
	$roundup = floor($avg);
	
	if($roundup == 0)
	{
		echo "0";
	}else if($roundup == 1)
	{
		echo "1";
	}else if($roundup == 2)
	{
		echo "2";
	}else if($roundup == 3)
	{
		echo "3";
	}else if($roundup ==4)
	{
		echo "4";
	}else if($roundup ==5)
	{
		echo "5";
	}
}

?>