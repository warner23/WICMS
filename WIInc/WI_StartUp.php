<?php
define("INCLUDE_CHECK", true);
include_once 'WICore/init.php';
$web->StartUp();
$web->Meta();
$web->Styling();
$favicon = $web->showFavicon();
//echo $favicon;
?>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link rel="icon" type="image/png" href="WIAdmin/WIMedia/Img/favicon/<?php echo $favicon;?>" />
      <?php
$web->Scripts();

?>


  <script type="text/javascript">
            var $_lang = <?php echo WILang::all(); ?>;
        </script> 

</head>
<body class="debate">