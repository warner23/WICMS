<?php
define("INCLUDE_CHECK", true);
include 'WICore/init.php';

?>
<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
<title><?php echo  $WI['site_name']?></title>
<?php 
include_once 'WIInc/start_up.php';
?>

</head>
<body>
<!-- Panel -->
<?php include_once 'WIInc/panel.php';
 include_once 'WIInc/top_head.php'; 
$web->MainMenu();	



include_once 'WIInc/cart_content.php';

$web->footer();
?>
</body>
</html>
