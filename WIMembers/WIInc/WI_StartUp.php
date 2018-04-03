<?php
define("INCLUDE_CHECK", true);
include_once 'WICore/init.php';
$web->StartUp();
$web->Meta($page);
$web->Styling($page);
$web->Scripts($page);
$web->webSite_icons();
?>


 <script type="text/javascript" src="WICore/WIJ/jquery.cookie.js"></script>
<script type="text/javascript" src="WICore/WIJ/profileUpload.js"></script>
 <script type="text/javascript" src="WICore/WIJ/jquery.ajaxfileupload.js"></script>
 <script src="WICore/WIJ/jquery.ajaxfileupload.js" type="text/javascript"></script>
 
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript">

      
  <script type="text/javascript">
            var $_lang = <?php echo WILang::all(); ?>;
        </script> 

</head>
<body>