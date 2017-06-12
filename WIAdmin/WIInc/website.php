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
              <ul class="nav nav-tabs">
                <li class="active"><a href="#siteSettings" data-toggle="tab">Website</a></li>
                <li><a href="#database" data-toggle="tab">Database</a></li>
                 <li><a href="#email" data-toggle="tab">Email</a></li>
                 <li><a href="#session" data-toggle="tab">Session</a></li>
                 <li><a href="#login_confirm" data-toggle="tab">Login</a></li>
                 <li><a href="#password_security" data-toggle="tab">Password Security</a></li>
                 <li><a href="#social_setup" data-toggle="tab">Social Set up</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="siteSettings">
 					<?php include_once 'WIInc/site/website.php'; ?>               
                </div>

                <div class="tab-pane in" id="database">
                 <?php include_once 'WIInc/site/database.php'; ?> 
                </div>
                
                 <div class="tab-pane fade" id="email">
                       <?php include_once 'WIInc/site/email.php'; ?> 
                  </div>


                      <div class="tab-pane in" id="session">
                       <?php include_once 'WIInc/site/session.php'; ?> 
                        
                  </div>

                     <div class="tab-pane in" id="login_confirm">
                        <?php include_once 'WIInc/site/login.php'; ?> 
                        
                  </div>




                   <div class="tab-pane in" id="password_security">
                       <?php include_once 'WIInc/site/security.php'; ?> 
                        
                  </div>



                     <div class="tab-pane in" id="social_setup">
                        
                         <?php include_once 'WIInc/site/social.php'; ?> 
                  </div>



                           
                        </div><!-- ./col -->
                     </div>
                     </section>
<script type="text/javascript" src="WICore/WIJ/WICore.js"></script>
    <script type="text/javascript" src="WICore/WIJ/WISite.js"></script>
    <script type="text/javascript" src="WICore/WIJ/WIDatabase.js"></script>