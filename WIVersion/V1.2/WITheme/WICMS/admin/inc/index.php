<?php
if($users->authenticated()) {

?>
<div class="contents">
<div class="coming">

<div class="col-1">
<a href="logout.php">log out</a> <a href="settings.php">settings</a>
<p class="c"></p>
</div><!-- end col-1-->

<div class="col-1">
<p class="c"> COMING SOON</p>
</div><!-- end col-1-->

<div class="col-1">
<p class="c"></p>
</div><!-- end col-1-->
</div><!-- end coming-->
</div><!-- end contents-->
<?php
}
else
{
	?>
	<div class="contents">
<div class="coming">

<div class="col-1">
<a href="login.php">log in</a>
<p class="c"></p>
</div><!-- end col-1-->

<div class="col-1">
<p class="c"> COMING SOON</p>
</div><!-- end col-1-->

<div class="col-1">
<p class="c"></p>
</div><!-- end col-1-->
</div><!-- end coming-->
</div><!-- end contents-->
<?php
}


?>