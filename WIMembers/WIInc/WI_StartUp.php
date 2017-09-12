<?php
define("INCLUDE_CHECK", true);
include_once 'WICore/init.php';
$web->StartUp();
$web->Meta();
$web->Styling();
?>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link href="../WITheme/Debate/user/css/profile.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="../WITheme/Debate/user/css/switcher.css" media="screen" />

          <link rel="icon" type="image/png" href="http://debatespot.net/favicon.png" />
      <?php
$web->Scripts();
?>
 
<script type="text/javascript" src="WICore/WIJ/jquery.cookie.js"></script>
<script type="text/javascript" src="WICore/WIJ/profileUpload.js"></script>
 <script type="text/javascript" src="WICore/WIJ/jquery.ajaxfileupload.js"></script>
 <script src="WICore/WIJ/WIProfile.js" type="text/javascript"></script>
 <script type="text/javascript">


</script>

 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script type="text/javascript">
            var $_lang = <?php echo WILang::all(); ?>;
        </script> 


          <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body class="debate">