<link rel="stylesheet" href="WIInc/css/font-awesome.css">
<style type="text/css">
  .navbar {
    position: relative;
    min-height: 46px;
    margin-bottom: 0px ! important;
    border: 1px solid transparent;
}

.operation{
      float: left;
    font-size: 14px;
}

  .visit{
    float: left;
  }

  li{
    list-style: none;

  }

  li#notif{
  }

  ul#nots{

  }

  .navbar>.container .navbar-visit, .navbar>.container-fluid .navbar-visit {
        margin-left: -9px ! important;
  }

  .navbar-visit {
    float: left;
    height: 50px;
    padding: 15px 15px;
    font-size: 18px;
    line-height: 20px;
}

.user-image {
    float: left;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    margin-right: 10px;
    margin-top: -2px;
}

  @media (min-width: 768px){
.navbar>.container .navbar-brand, .navbar>.container-fluid .navbar-brand {
margin-left: -27% ! important;
}

  .navbar>.container .navbar-visit, .navbar>.container-fluid .navbar-visit {
margin-left: -2% ! important; 
}

}


@media (min-width: 1200px){

.navbar>.container .navbar-visit, .navbar>.container-fluid .navbar-visit {
    margin-left: -1% ! important;
  }

  .navbar>.container .navbar-brand, .navbar>.container-fluid .navbar-brand {
    margin-left: -1% ! important;
}

@media (min-width: 1900px){

  .navbar>.container .navbar-visit, .navbar>.container-fluid .navbar-visit {
    margin-left: -41% ! important;
  }

  .navbar>.container .navbar-brand, .navbar>.container-fluid .navbar-brand {
       margin-left: -107% ! important;
  }


  }

}
</style>
<div class="navbar navbar-inverse navbar-fixed-top">
<div class="container">
<div class="row">
<div class="navbar navbar-header">
<a href="dashboard.php" class="navbar-brand"><?php echo WEBSITE_NAME; ?> Admin Panel</a>
<a href="../index.php" class="navbar-visit"><span class="glyphicon glyphicon-home" title="Visit Site"></span></a>
</div>


<?php $web->AdminMenu();?>

<ul class="nav navbar-nav navbar-right">
<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="WIDashboard.Notifications();"><span class="fa fa-bell-o" title="Notifications"></span>
<span class="badge" id="not_badge"></span></a>
<div class="dropdown-menu">
  <div class="panel panel-success">
    <div class="panel-heading">
You have <?php echo $site->notifications_badge()?>  notifications

    </div>
    <div class="panel-body" id="Notifications"></div>
    <div class="panel-footer"><a href="#">View all</a></div>
  </div>
</div>

</li>
<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="WIDashboard.messages();"><span class="fa fa-envelope-o" title="Messages"></span>
<span class="badge" id="mess_badge"></span></a>
<ul class="dropdown-menu">
  <div style="width: 300px;">
    <div class="panel panel-primary">
    <div class="panel-heading">Messages</div>
    <div class="panel-body" id="cmessages">

  

    </div>
    <div class="panel-footer" id="e_msg"><a href="#">See All Messages</a></div>
    </div>
  </div>
</ul>
</li>

 <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>


           <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php echo $user_pic = $Info->admin_pic(WISession::get('user_id'))?>
             <!--  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <span class="hidden-xs"><?php echo $Info->admin_name(WISession::get('user_id'))?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              <?php echo $user_pic = $Info->admin_pic(WISession::get('user_id'))?>
                

                <p>
                  
                  <small></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
   <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="../WIMembers/profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>

           <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>



</ul>
</div>
</div>
</div>

<p><br/></p>
<p><br/></p>
<p><br/></p>

<script type="text/javascript" src="WICore/WIJ/WIDashboard.js"></script>