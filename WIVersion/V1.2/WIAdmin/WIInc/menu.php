<link rel="stylesheet" type="text/css" href="http://wicms.co.uk/WITheme/River/site/css/menu.css">

  <script>
  $( function() {
    $( "#tabs3" ).tabs();
  } );
  </script>
 <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Menu
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Menu</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6 col-xl-12">
                            <!-- input box's box -->
                            <div class="modal-body">

            <div class="well">

                     <div id="tabs3">
  <ul>
    <li><a href="#tabs-1">Menu</a></li>
    <li><a href="#tabs-2">Admin</a></li>
    <li><a href="#tabs-3">Sidebar</a></li>
  </ul>
  <div id="tabs-1">
 <?php include_once 'WIInc/site/menu/menu.php'; ?>  
  </div>
  <div id="tabs-2">
<?php include_once 'WIInc/site/menu/admin_menu.php'; ?> 
  </div>
  <div id="tabs-3">
<?php include_once 'WIInc/site/menu/sidebar_menu.php'; ?>
  </div>
</div>



                     </div>
                     </div>
                     </div>
                     </div>

                     </section>
<script type="text/javascript" src="WICore/WIJ/WICore.js"></script>
    <script type="text/javascript" src="WICore/WIJ/WISite.js"></script>
    <script type="text/javascript" src="WICore/WIJ/WIDatabase.js"></script>
    <script type="text/javascript" src="WICore/WIJ/WIEmail.js"></script>

   