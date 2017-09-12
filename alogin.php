<?php

include_once 'WIInc/WI_StartUp.php';

$ref = $_SERVER['HTTP_REFERER'];
$agent = $_SERVER['HTTP_USER_AGENT'];
$ip = $_SERVER['REMOTE_ADDR'];
$tracking_page = $_SERVER['SCRIPT_NAME'];
$page = "alogin";
//$ip = getenv('REMOTE_ADDR');
//$ip2 = $maint->get_ip();
//echo "ip". $ip;
//echo "ip2". $ip2;
$country = $maint->ip_info($ip, "country");
//echo "country"  .$country;


$maint->visitors_log($page, $ip, $country, $ref, $agent, $tracking_page);
$Panel = $web->PageMod($page, "panel");
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
  

$headerPower = $web->pageModPower($page, "header");
if ($headerPower > 0) {
	$web->MainHeader();
}

//include_once 'WIInc/top_head.php';
$web->MainMenu();		

$contents = $web->pageModPower($page, "contents");
//echo $contents;
$mod->getModMain($contents, $page, $contents);
 
$web->footer();?>
		
</body>
</html>
