<?php

define("INCLUDE_CHECK", true);
include_once 'WICore/init.php';
include_once 'WIInc/start_up.php';
?>



<?php 
 include_once 'WIInc/panel.php';
 include_once 'WIInc/top_head.php'; 
// $web->top_head();

		
 //include_once 'WIInc/header.php'; 
//$web->MainHeader();	
$web->MainMenu();		

 include_once 'WIInc/blog.php';   
$web->footer();
 ?>
		
	<!--End Wrapper-->


	<script type="text/javascript" src="<?php echo $WI['theme_dir'] ?><?php echo $WI['js_site'] ?>vendor/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="<?php echo $WI['theme_dir'] ?><?php echo $WI['js_site'] ?>jquery.cookie.js"></script> <!-- jQuery cookie --> 
	<script type="text/javascript" src="<?php echo $WI['theme_dir'] ?><?php echo $WI['js_site'] ?>styleswitch.js"></script> <!-- Style Colors Switcher -->
	 
	<script type="text/javascript" src="<?php echo $WI['theme_dir'] ?><?php echo $WI['js_site'] ?>plugin/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript" src="<?php echo $WI['theme_dir'] ?><?php echo $WI['js_site'] ?>plugin/jquery.plugin.js"></script>



	<!-- Start Style Switcher -->
	<div class="switcher"></div>
	<!-- End Style Switcher -->
	
</body>
</html>
