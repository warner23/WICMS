
  <script>
  $( function() {
    $( "#tabs" ).tabs();
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


                     <div id="tabs">
  <ul>
    <li><a href="#tabs-1">Website</a></li>
    <li><a href="#tabs-2">Database</a></li>
    <li><a href="#tabs-3">Email</a></li>
    <li><a href="#tabs-4">Sessions</a></li>
    <li><a href="#tabs-5">Login</a></li>
    <li><a href="#tabs-6">Password Security</a></li>
    <li><a href="#tabs-7">Social Set Up</a></li>
    <li><a href="#tabs-8">Multilangual Settings</a></li>
         <li><a href="#tabs-9">Password Salt</a></li>
    <li><a href="#tabs-10">Email Verification</a></li>
        <li><a href="#tabs-11">Version Control</a></li>

  </ul>
  <div id="tabs-1">
<?php include_once 'WIInc/site/Site/website.php'; ?>  
  </div>
  <div id="tabs-2">
<?php include_once 'WIInc/site/Site/database.php'; ?> 
  </div>
  <div id="tabs-3">
 <?php include_once 'WIInc/site/Site/email.php'; ?> 
  </div>

    <div id="tabs-4">
 <?php include_once 'WIInc/site/Site/session.php'; ?> 
  </div>

    <div id="tabs-5">
 <?php include_once 'WIInc/site/Site/login.php'; ?> 
  </div>

    <div id="tabs-6">
<?php include_once 'WIInc/site/Site/security.php'; ?> 
  </div>

    <div id="tabs-7">
<?php include_once 'WIInc/site/Site/social.php'; ?> 
  </div>

    <div id="tabs-8">
<?php include_once 'WIInc/site/Site/lang.php'; ?> 
  </div>

        <div id="tabs-9">
 <?php include_once 'WIInc/site/Site/salt.php'; ?> 
  </div>

  <div id="tabs-10">
 <?php include_once 'WIInc/site/Site/verification.php'; ?> 
  </div>

    <div id="tabs-11">
 <?php include_once 'WIInc/site/Site/version.php'; ?> 
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
   