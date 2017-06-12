  <script>
  $( function() {
    $( "#tabs2" ).tabs();
  } );
  </script>

<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Site
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Site</li>
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

                    <div id="tabs2">
  <ul>
    <li><a href="#tabs-1">Website</a></li>
    <li><a href="#tabs-2">Database</a></li>
    <li><a href="#tabs-3">Email</a></li>
    <li><a href="#tabs-4">Session</a></li>
    <li><a href="#tabs-5">Login</a></li>
    <li><a href="#tabs-6">Password Security</a></li>
    <li><a href="#tabs-7">Social Set Up</a></li>
    <li><a href="#tabs-8">Mulitlangual Settings</a></li>
  </ul>
  <div id="tabs-1">
<?php include_once 'WIInc/site/site/website.php'; ?>  
  </div>
  <div id="tabs-2">
 <?php include_once 'WIInc/site/site/database.php'; ?> 
  </div>
  <div id="tabs-3">
<?php include_once 'WIInc/site/site/email.php'; ?> 
  </div>

    <div id="tabs-4">
<?php include_once 'WIInc/site/site/session.php'; ?> 
  </div>

    <div id="tabs-5">
<?php include_once 'WIInc/site/site/login.php'; ?> 
  </div>

    <div id="tabs-6">
<?php include_once 'WIInc/site/site/security.php'; ?> 
  </div>

    <div id="tabs-7">
 <?php include_once 'WIInc/site/site/social.php'; ?> 
  </div>

    <div id="tabs-8">
 <?php include_once 'WIInc/site/site/lang.php'; ?> 
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
    <script type="text/javascript" src="WICore/WIJ/WILogin_Settings.js"></script>  
    <script type="text/javascript" src="WICore/WIJ/WISecurity.js"></script>
    <script type="text/javascript" src="WICore/WIJ/WISession.js"></script>
    <script type="text/javascript" src="WICore/WIJ/WISocial.js"></script>
    <script type="text/javascript" src="WICore/WIJ/WILang.js"></script>
   