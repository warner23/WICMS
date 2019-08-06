<?php
$page = "About Us";

include_once "WIInc/WI_StartUp.php";

$ref = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "";

$agent = $_SERVER["HTTP_USER_AGENT"];
$ip = $_SERVER["REMOTE_ADDR"];


$tracking_page = $_SERVER["SCRIPT_NAME"];

$country = $maint->ip_info($ip, "country");
if($country === null){
  $country = "localhost";
}

$maint->visitors_log($page, $ip, $country, $ref, $agent, $tracking_page);

$panelPower = $web->pageModPower($page, "panel");
$Panel = $web->PageMod($page, "panel");
if ($panelPower > 0) {
  $mod->getMod($Panel);
}

$topPower = $web->pageModPower($page, "top_head");
$top_head = $web->PageMod($page, "top_head");
if ($topPower > 0) {
  $mod->getMod($top_head);
}
$headerPower = $web->pageModPower($page, "header");
if ($headerPower > 0) {
  $web->MainHeader();
}

$web->MainMenu(); 

$contents = $web->pageModPower($page, "contents");
$mod->getModMain($contents, $page, $contents);

$web->footer();
?>
</body>
</html>
