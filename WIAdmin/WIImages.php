<?php
define("INCLUDE_CHECK", true);
include_once 'WICore/init.php';

 if($admin->isAdmin()){
 include_once 'WIInc/WI_start_up.php';
include_once 'WIInc/WI_header.php';
include_once 'WIInc/sidebar.php';
include_once 'WIInc/images.php';
}else{
header("location:../index.php");
            }
?>



<!-- footer -->
<!-- end footer -->

	<script type="text/javascript" src="../WITheme/WICMS/admin/js/vendor/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="../WITheme/WICMS/admin/js/jquery.cookie.js"></script> <!-- jQuery cookie --> 
	<script type="text/javascript" src="../WITheme/WICMS/admin/js/styleswitch.js"></script> <!-- Style Colors Switcher -->
	 
	<script type="text/javascript" src="../WITheme/WICMS/admin/js/plugin/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript" src="../WITheme/WICMS/admin/js/plugin/jquery.plugin.js"></script>

	<!-- Start Style Switcher -->
	<div class="switcher"></div>
	<!-- End Style Switcher -->


</body>
</html>