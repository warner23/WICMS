 <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
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
                <li class="active"><a href="#login" data-toggle="tab">Website</a></li>
                <li><a href="#create" data-toggle="tab">Database</a></li>
                <li><a href="#forgot" data-toggle="tab">Email</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="login">
                  <form action="" class="form-horizontal" id="loginform" method="post">
                    <fieldset>
                      <div id="legend">
                        <legend class="">Website Settings</legend>
                      </div>    
                      <div class="control-group form-group">
                        <!-- Username -->
                        <label class="control-label col-lg-4"  for="website_name">Website Name:</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="website_name"  maxlength="88" name="website_name" placeholder="Website Name" class="input-xlarge form-control" value="<?php echo $WISite->Website_Info('site_name')?>"> <br />
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <!-- Password-->
                        <label class="control-label col-lg-4" for="website_url">Website Url:</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="website_url" maxlength="100" name="website_url" placeholder="Website Url" class="input-xlarge form-control" value="<?php echo $WISite->Website_Info('site_url')?>">
                        </div>
                      </div>
                      
 
 
                      <div class="control-group form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="loginbtn" type="submit" class="btn btn-success" name="submit_WIS">Save</button> 
                        </div>
                      </div>
                    </fieldset>
                  </form>                
                </div>
                <div class="tab-pane fade" id="create">
                  <form action="" class="form-horizontal register-form" name="signupform" id="signupform" method="post">
                      <fieldset>
                        <div id="legend">
                          <legend class="">Database Settings</legend>
                        </div>

                        <div class="control-group  form-group">
                            <label class="control-label col-lg-4" for='host'>Host:<span class="required">*</span></label>
                            <div class="controls col-lg-8">
                                <input type="text" id="host" class="input-xlarge form-control"  maxlength="88" placeholder="127.0.0.1" name="host" value="<?php echo $WISite->Website_Info('db_host')?>">
                            </div>
                        </div>

                        <div class="control-group  form-group">
                            <label class="control-label col-lg-4" for="db_username">Db Username:<span class="required">*</span></label>
                            <div class="controls col-lg-8">
                                <input type="text" id="db_username" class="input-xlarge form-control" maxlength="16" placeholder="Username" name="db_username" value="<?php echo $WISite->Website_Info('db_username')?>">
                                <span id="unamestatus"></span>
                            </div>
                        </div>

                        <div class="control-group  form-group">
                            <label class="control-label col-lg-4" for="db_pass">Db Password: <span class="required">*</span></label>
                            <div class="controls col-lg-8">
                                <input type="password" id="db_pass" class="input-xlarge form-control" maxlength="16" placeholder="Password" name="db_pass" value="<?php echo $WISite->Website_Info('db_pass')?>">
                            </div>
                        </div>

                        <div class="control-group  form-group">
                            <label class="control-label col-lg-4" for="db">Database <span class="required">*</span></label>
                            <div class="controls col-lg-8">
                                <input type="text" id="db" class="input-xlarge form-control" maxlength="16" placeholder="Database" name="db" value="<?php echo $WISite->Website_Info('db_name')?>">
                            </div>
                        </div>
                              <div class="control-group form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="loginbtn" type="submit" class="btn btn-success" name="submit_WID">Save</button> 
                        </div>
                      </div>
                    </fieldset>
                        <br /><br />
                  </form>
                </div>
                
                  <div class="tab-pane in" id="forgot">
                        <form action="" class="form-horizontal" id="forgot-pass-form">
                        <fieldset>
                          <div id="legend">
                            <legend class="">Email Settings</legend>
                          </div>    
                          <div class="control-group form-group">
                            <!-- Username -->
                            <label class="control-label col-lg-4" for="admin_email">Admin Email:</label>
                            <div class="controls col-lg-8">
                              <input type="email" id="admin_email" class="input-xlarge form-control" name="admin_email" placeholder="Admin@site.com" value="<?php echo $WISite->Website_Info('admin_email')?>">
                            </div>
                          </div>

                           <div class="control-group form-group">
                        <!-- Password-->
                        <label class="control-label col-lg-4" for="email_method">Email Method:</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="email_method" maxlength="100" name="email_method" placeholder="smtp" class="input-xlarge form-control" value="<?php echo $WISite->Website_Info('email_method')?>">
                        </div>
                      </div>

                          <div class="control-group form-group">
                            <!-- Button -->
                            <div class="controls col-lg-offset-4 col-lg-8">
                              <button id="btn-forgot-password" class="btn btn-success"></button>
                            </div>
                          </div>
                        </fieldset>
                      </form>
                        
                  </div>
                           
                        </div><!-- ./col -->
                     </div>
                     </section>