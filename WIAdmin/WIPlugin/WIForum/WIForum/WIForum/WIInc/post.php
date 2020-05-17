<?php 

if(isset($_GET['id']))
{
  $id = preg_replace('#[^0-9]#i','',$_GET['id']);
  


?>
<div class="col-forum-main">

<div class="col-menu"> 
<?php include_once 'WIInc/forum_menu.php'  ?>
</div><!-- end of col-info-->
<div class="col-cat-box">


 <?php echo $forum->WIPosts($id);
  }?>



</div><!-- end of col-cats-->
</div><!-- end col-cat-box-->

