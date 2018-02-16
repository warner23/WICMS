<?php
define("INCLUDE_CHECK", true);
include_once 'WICore/init.php';
$web->StartUp();
?>

<link rel="stylesheet" type="text/css" href="../WITheme/WICMS/blog/css/style.css" media="screen" data-name="skins">
  <link rel="stylesheet" type="text/css" href="../WITheme/WICMS/blog/css/layout/wide.css" media="screen" data-name="layout"> 
  <link rel="stylesheet" type="text/css" href="../WITheme/WICMS/blog/css/switcher.css" media="screen" />
<?php
$web->Meta($page);
$web->Styling($page);
$web->Scripts($page);
$web->webSite_icons();
?>

      
  <script type="text/javascript">
            var $_lang = <?php echo WILang::all(); ?>;
        </script> 


          <?php if(BOOTSTRAP_VERSION == 2): ?>
        <link rel='stylesheet' href='../WITheme/WICMS/blog/css/bootstrap.min2.css' type='text/css' media='all' />
        <script type="text/javascript" src="../WITheme/WICMS/blog/js/bootstrap.min2.js"></script>
        <script type="text/javascript" src="../WITheme/WICMS/blog/js/dataTables.bootstrap2.js"></script>
        <link rel='stylesheet' href='style2.css' type='text/css' media='all' />
        <?php else: ?>
        <link rel='stylesheet' href='../WITheme/WICMS/blog/css/bootstrap.min3.css' type='text/css' media='all' />
        <script type="text/javascript" src="../WITheme/WICMS/blog/js/bootstrap.min3.js"></script>


        <?php endif; ?>
</head>
<body>