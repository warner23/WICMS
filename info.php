<?php

include_once 'WIInc/WI_StartUp.php';

$ref = $_SERVER['HTTP_REFERER'];
$agent = $_SERVER['HTTP_USER_AGENT'];
$ip = $_SERVER['REMOTE_ADDR'];
$tracking_page = $_SERVER['SCRIPT_NAME'];
$page = "info";
//$ip = getenv('REMOTE_ADDR');
//$ip2 = $maint->get_ip();
//echo "ip". $ip;
//echo "ip2". $ip2;
$country = $maint->ip_info($ip, "country");
//echo "country"  .$country;


$maint->visitors_log($page, $ip, $country, $ref, $agent, $tracking_page);

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
if ($headerPower > 0) {
	$web->MainHeader();
}


$web->MainMenu();	


$contents = $web->pageModPower($page, "contents");
//echo $contents;
$mod->getModMain($contents, $page, $contents);

  	
//include_once 'WIInc/welcome_box.php';

$web->footer();
?>



</body>
</html>
