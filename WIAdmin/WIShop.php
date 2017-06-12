<?php
define("INCLUDE_CHECK", true);
include_once 'WICore/init.php';

 if($admin->isAdmin()){
 include_once 'WIInc/WI_start_up.php';
include_once 'WIInc/WI_header.php';
include_once 'WIInc/sidebar.php';
include_once 'WIInc/shop.php'; ?>


<script type="text/javascript" src="WICore/WIJ/WICore.js"></script>
<script type="text/javascript" src="WICore/WIJ/WIShop.js"></script>
</body>
</html>
<?php 
}else{
header("location:../index.php");

 }
?>



<!-- footer -->
<!-- end footer -->



