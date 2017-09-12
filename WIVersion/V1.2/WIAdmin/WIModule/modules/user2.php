<?php
if(checklogin() === true)
{
  ?>
  
  <div class="user">

  <h3><?php echo $u; ?></h3>
  <p>Is the viewer the page owner, logged in and verified? <b><?php echo $isOwner; ?></b></p>
  <p>Gender: <?php echo $sex; ?></p>
  <p>Country: <?php echo $country; ?></p>
  <p>User Level: <?php echo $userlevel; ?></p>
  <p>Join Date: <?php echo $joindate; ?></p>
  <p>Last Session: <?php echo $lastsession; ?></p>
  
  
  
  

	
	
	
	
  
 </div>
  <?php
} else 
{
  //this would be executed if user isn't logged in
  header('Location: protected.php');
  exit();
  //the above would redirect the user
}
?>


<div class="user">

  <h3><?php echo $u; ?></h3>
  <p>Is the viewer the page owner, logged in and verified? <b><?php echo $isOwner; ?></b></p>
  <p>Gender: <?php echo $sex; ?></p>
  <p>Country: <?php echo $country; ?></p>
  <p>User Level: <?php echo $userlevel; ?></p>
  <p>Join Date: <?php echo $joindate; ?></p>
  <p>Last Session: <?php echo $lastsession; ?></p>
 </div> 
