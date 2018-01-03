 <style type="text/css">
   .off{
    display: none;
   }

   .on{
    display: block;
   }
 </style>


  <script>
  $( function() {
    $( "#tabs3" ).tabs();
  } );
  </script>
 <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Styling
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Styling</li>
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
    <li><a href="#tabs-1">Theme</a></li>
    <li><a href="#tabs-2">CSS</a></li>
    <li><a href="#tabs-3">JS</a></li>
  </ul>
  <div id="tabs-1">
 <?php include_once 'WIInc/site/Styling/theme.php'; ?> 
  </div>
  <div id="tabs-2">
<?php include_once 'WIInc/site/Styling/css.php'; ?> 
  </div>
  <div id="tabs-3">
<?php include_once 'WIInc/site/Styling/js.php'; ?> 
  </div>
</div>

                     </div>
                     </div>
                     </div>
                     </div>

                     </section>
<script type="text/javascript" src="WICore/WIJ/WICore.js"></script>
    <script type="text/javascript" src="WICore/WIJ/WICSS.js"></script>
    <script type="text/javascript" src="WICore/WIJ/WIJS.js"></script>
    <script type="text/javascript" src="WICore/WIJ/WITheme.js"></script>

   