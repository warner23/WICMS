<?php

include_once 'WIInc/WI_StartUp.php';

$ip = getenv('REMOTE_ADDR');
$country = $maint->ip_info($ip, "country");

$page = "index";
$maint->visitors_log($page, $ip, $country);

$panelPower = $web->pageModPower($page, "panel");

$Panel = $web->PageMod($page, "panel");
//echo $Panel;
if ($panelPower === 0) {
	
}else{

	$mod->getMod($Panel);
//include_once 'WIInc/panel.php';
}

$topPower = $web->pageModPower($page, "top_head");
$top_head = $web->PageMod($page, "top_head");
//echo $Panel;
if ($topPower === 0) {
	
}else{

	$mod->getMod($top_head);
}

$headerPower = $web->pageModPower($page, "header");
//echo $headPower;
//echo $Panel;
if ($headerPower === 0) {
	
}else{

	$web->MainHeader();
}


$web->MainMenu();	


$contents = $web->pageModPower($page, "contents");
//echo $contents;
$mod->getModMain($contents, $page);

  	
//include_once 'WIInc/welcome_box.php';

$web->footer();
?>



</body>
</html>
