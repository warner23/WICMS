<?php
if(!$login->isLoggedIn()) // guest
{
?>
<nav role="navigation" class="navbar navbar-default">
<ul class="navbar-nav nav">
<li><a href="<?php  echo $WI['categories']; ?>">Categories</a></li>
<li><a href="#"></a></li>
<li><a href="#"></a></li>
<li><a href="#">Post</a></li>
<li><a href="#"></a></li>
 </nav>

 <?php
} elseif($user->isAdmin())  // admin
{
?>
<nav role="navigation" class="navbar navbar-default">
<ul class="navbar-nav nav">
<li><a href="<?php  echo $WI['categories']; ?>">Categories</a></li>
<li><a href="#">Topics</a></li>
<li><a href="#">Create New Category</a></li>
<li><a href="#">Create New Topic</a></li>
<li><a href="#">Post</a></li>
<li><a href="#">Edit Post</a></li>
 </nav>
<?php
}else{ // user
?>
<nav role="navigation" class="navbar navbar-default">
<ul class="navbar-nav nav">
<li><a href="<?php  echo $WI['categories']; ?>">Categories</a></li>
<li><a href="#">Topics</a></li>
<li><a href="#"></a></li>
<li><a href="#">Create New Topic</a></li>
<li><a href="#">Post</a></li>
<li><a href="#"></a></li>
 </nav>
<?php
}

?>