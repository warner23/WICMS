<div class="contents">
<div class="coming">

<div class="col-1">
<a href="logout.php">log out</a> <a href="settings.php">settings</a>
<p class="c"></p>
</div><!-- end col-1-->

<div class="col-1">
<p class="c"> 


		<form action="" method="post">
		    <input type="text" name="email" placeholder="Email address" autocomplete="off" value="<?php echo $users->information('email');?>"><br />
		    <button type="submit" name="submit_u">Save changes</button>
		</form>
		<br />
		<form action="" method="post">
		    <input type="password" name="current_password" placeholder="Current password"><br />
		    <input type="password" name="new_password" placeholder="New password"><br />
		       <input type="password" name="r_password" placeholder="Repeat new password"><br />
		    <button type="submit" name="submit_p">Change password</button>
		</form>
</p>
</div><!-- end col-1-->

<div class="col-1">
<p class="c"></p>
</div><!-- end col-1-->
</div><!-- end coming-->
</div><!-- end contents-->