<?php
define("INCLUDE_CHECK", true);
include_once 'WICore/init.php';
$web->StartUp();
$web->Meta($page);
$web->Styling($page);
$web->Scripts($page);
$web->webSite_icons();
?>

      
  <script type="text/javascript">
            var $_lang = <?php echo WILang::all(); ?>;
        </script> 

</head>
<body>