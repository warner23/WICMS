
<?php 
define("INCLUDE_CHECK", true);
include_once'../../WICore/init.php'; 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link type="text/css" rel="stylesheet" href="style.css"/>
<script src="jquery.min.js"></script>
</head>
<body>

<div id="calendar_div">
	<?php echo WICalender::getCalender(); ?>
</div>

</body>
</html>
