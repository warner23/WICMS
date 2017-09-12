<?php
define("INCLUDE_CHECK", true);
include_once 'WICore/init.php';
//echo "ses" . WISession::get('user_id');
 if($admin->isAdmin()){
 include_once 'WIInc/WI_start_up.php';
include_once 'WIInc/WI_header.php';
include_once 'WIInc/sidebar.php';
include_once 'WIInc/dashboard.php';
}else{
header("location:../index.php");
	//echo "kicked out";
            }
?>



<!-- footer -->
<!-- end footer -->




</body>
</html>