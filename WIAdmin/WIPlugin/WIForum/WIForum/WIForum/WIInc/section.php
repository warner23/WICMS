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
<div class="col-100">
<div class="col-labels1">Topics</div></div>
<div class="col-info">
<div class="col-20">Topics</div><!-- end col1-->
<div class="col-200">Author</div><!-- end col1-->
<div class="col-300">Views</div><!-- end col1-->
<div class="col-300">Replies</div><!-- end col1-->
</div>


 <?php echo $forum->WISection($id);
  }?>



</div><!-- end of col-cats-->
</div><!-- end col-cat-box-->

