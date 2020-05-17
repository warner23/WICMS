<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<style>
.col-forum-main
{
	width:100%;
}

.col-cat-box
{
	width:95%;
}

.col-labels
{
	width:90%;
	height:25px;
}

.col-1
{
	width:40%;
	float:left;
}

.col-2
{
		width:30%;
	float:left;
}

.col-3
{
		width:15%;
	float:left;
}

.col-info
{
}

.col-cats
{
	width:90%;	
}

.col-category
{
	width:40%;
	
	
}

.col-posted
{
		width:30%;
	float:left;
}

.col-views
{
		width:15%;
	float:left;
}

.col-replies
{
		width:15%;
	float:left;
}

.avatpic
{
	width:25%;
	height:30px;
	

}

.ava
{
		width:100%;
	height:30px;

}

</style>
<body>
<div class="col-forum-main">
<div class="col-info"></div><!-- end of col-info-->
<div class="col-cat-box">
<div class="col-labels">
<div class="col-1">Categories</div><!-- end col1-->
<div class="col-2">Posted on</div><!-- end col1-->
<div class="col-3">Views</div><!-- end col1-->
<div class="col-3">Replies</div><!-- end col1-->
</div><!-- end of col-labels-->

<!-- start of cats-->

<div class="col-cats">

<div class="col-category">
<div class="avatpic"><a href="section.php?id=' . $result['id'] . '"><img class="ava" src="#">
</div><!-- end avatpic-->
</div><!-- end of col-category-->
<div class="col-posted"></div><!-- end of col-posted-->

<div class="col-views"></div><!-- end of col-posted-->
<div class="col-replies"></div><!-- end of col-posted-->
</div><!-- end of col-cats-->
</div><!-- end col-cat-box-->
</div><!-- end  col-forum-main-->
</body>
</html>