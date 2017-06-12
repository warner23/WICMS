<?php
define("INCLUDE_CHECK", true);
include_once 'WICore/init.php';

 if($admin->isAdmin()){
 include_once 'WIInc/WI_start_up.php';
include_once 'WIInc/WI_header.php';
include_once 'WIInc/sidebar.php';
include_once 'WIInc/pages.php';
}else{
header("location:../index.php");
            }
?>



<!-- footer -->
<!-- end footer -->

	<script type="text/javascript" src="<?php echo $WI['theme_dir'] ?><?php echo $WI['js_site'] ?>jquery.cookie.js"></script> <!-- jQuery cookie --> 


</body>
</html>