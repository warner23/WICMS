<style type="text/css">
	.fade{
		opacity: 0.5;
	}
</style>
<?php
include_once '../../WICore/lib.php';
$web->Styling();
$web->Scripts();

$web->top_head();
  
$web->MainMenu();		
?>

<div class="container-fluid text-center">    
  <div class="row content">
  <div class="col-sm-2"></div>
  <div class="col-sm-8 text-left"> 
  <?php include_once 'WIInc/alogin.php'; ?>
</div>

<div class="col-sm-2"></div>

</div>
</div>
 <?php
$web->footer();?>
		

	
</body>
</html>
