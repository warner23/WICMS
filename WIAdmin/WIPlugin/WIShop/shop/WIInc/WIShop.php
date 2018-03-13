<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
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
                <li class="active"><a href="#products" data-toggle="tab">Products</a></li>
                <li><a href="#change_product" data-toggle="tab">CHange Products</a></li>
                <li><a href="#email_settings" data-toggle="tab">Email</a></li>
                 <li><a href="#session" data-toggle="tab">Session</a></li>
                 <li><a href="#login_confirm" data-toggle="tab">Login</a></li>
                 <li><a href="#password_security" data-toggle="tab">Password Security</a></li>
                 <li><a href="#social_setup" data-toggle="tab">Social Set up</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="products">
                    <?php include_once 'WIInc/product/product.php'; ?>  
                </div>

                 <div class="tab-pane in" id="change_product">
                 <?php include_once 'WIInc/product/change_product.php'; ?> 
                </div>
                
                 <div class="tab-pane in" id="email_settings">
                       <?php include_once 'WIInc/product/email.php'; ?> 
                  </div>


                      <div class="tab-pane in" id="session">
                       <?php include_once 'WIInc/product/session.php'; ?> 
                        
                  </div>

                     <div class="tab-pane in" id="login_confirm">
                        <?php include_once 'WIInc/product/login.php'; ?> 
                        
                  </div>




                   <div class="tab-pane in" id="password_security">
                       <?php include_once 'WIInc/product/security.php'; ?> 
                        
                  </div>



                     <div class="tab-pane in" id="social_setup">
                        
                         <?php include_once 'WIInc/product/social.php'; ?> 
                  </div>



                     </div>

                     </div>
                     </div>
                     </div>
                     </div>

                     </section>

    
   