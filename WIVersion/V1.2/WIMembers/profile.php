<?php
include_once 'WIInc/WI_StartUp.php';
	//echo WISESSION::get("user_id");

if($login->isLoggedIn()){
	//echo "hey";
include_once 'WIInc/panel.php';
include_once 'WIInc/top_head.php';
$web->MainMenu();

include_once 'WIInc/profile.php';
$web->footer();
?>
  <!--End Wrapper-->
  <!-- Start Style Switcher -->
  <div class="switcher"></div>
  <!-- End Style Switcher -->
  <script type="text/javascript" src="WICore/WIJ/styleswitch.js"></script>  
  <script type="text/javascript" src="WICore/WIJ/jquery.cookie.js"></script>  

  

</body>
</html>
<?php
}else{
header("location:../index.php");
	//echo "been logged out";
            }
?>