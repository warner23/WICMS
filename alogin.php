<?php

include_once 'WIInc/WI_StartUp.php';
$page = "alogin";
$Panel = $web->PageMod($page, "panel");
$maint->visitors_log($page, $ip, $country);
//echo $Panel;
if ($Panel === null) {
	
}else{

	$mod->getMod($Panel);
//include_once 'WIInc/panel.php';
}

$top_head = $web->PageMod($page, "top_head");
//echo $Panel;
if ($top_head === null) {
	
}else{

	$mod->getMod($top_head);
}
  

//include_once 'WIInc/top_head.php';
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
