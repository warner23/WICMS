<?php
include_once 'WICore/init.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Installation | WI CMS</title>

    <link rel='stylesheet' href='../WITheme/WICMS/site/css/frameworks/bootstrap.css' type='text/css' />
    <link rel='stylesheet' href='../WITheme/WICMS/site/css/font-awesome.css' type='text/css' />
    <link rel='stylesheet' href='WIInc/css/install.css' type='text/css' />
</head>
<body>

<style type="text/css">
	.hide{
		display: none;
	}

	.show{
		display: block;
	}
    .active{
        background-color: #38e238 !important;
    }

    .inactive{
        background-color: #ff6565 !important;
    }

    .passActive{
 background-color: #38e238 !important;
    }

</style>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 logo-wrapper">
                <img src="" alt="WICMS" Security" class="logo">
            </div>
        </div>
        <div class="wizard col-md-6 col-md-offset-3">
            <div class="steps">
                <ul>
                    <li>
                        <a :class="active">
                            <div class="stepNumber active" id="stepOne"><i class="fa fa-home"></i></div>
                            <span class="stepDesc text-small">Welcome</span>
                        </a>
                    </li>
                    <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepTwo"><i class="fa fa-list"></i></div>
                            <span class="stepDesc text-small">System Requirements</span>
                        </a>
                    </li>
                    <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepThree"><i class="fa fa-database"></i></div>
                            <span class="stepDesc text-small">Database Info</span>
                        </a>
                    </li>
                    <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepFour"><i class="fa fa-terminal"></i></div>
                            <span class="stepDesc text-small">Installation</span>
                        </a>
                    </li>
                    <li>
                        <a :class="active">
                            <div class="stepNumber inactive" id="stepFive"><i class="fa fa-flag-checkered"></i></div>
                            <span class="stepDesc text-small">Complete</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="step-content show" id="step_one">
                <h3>Welcome</h3>
                <hr>
                <?php echo $installer; ?>
                <p>This steps will guide you through few step installation process.</p>
                <p>When this installation process is finished, you will be able
                    to login and manage your users immediately! </p>
                <br>

                <a href="javascript:;" onclick="WIInstall.stepOne();" class="btn btn-as pull-right" type="button">
                    Next
                    <i class="fa fa-arrow-right"></i>
                </a>
                <div class="clearfix"></div>
            </div>


            <div class="step-content hide" id="step_two">
            <div>
                <div class="alert alert-danger hide" id="snap" >
                    <strong>Oh snap!</strong> Your system does not meet the requirements. You have to fix them in order to continue.
                </div>

                
                    <h3>System Requirements</h3>
                    <hr>
                    <div >
                    <ul class="list-group">
                        <li class="list-group-item" id="requirements-php-version"></li>
                        <li class="list-group-item" id="requirements-pdo"></li>
                        <li class="list-group-item" id="requirements-mysql"></li>
                        <li class="list-group-item" id="requirements-curl"></li>
                        <li class="list-group-item" id="requirements-write"></li>
                    </ul>
                    </div>

                    <a href="javascript:;" class="btn btn-as pull-right" onclick="WIInstall.stepTwo()" type="button" id="required">
                        Next
                        <i class="fa fa-arrow-right"></i>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="step-content hide" id="step_three">
                <h3>Database Info</h3>
                <hr>

<!--                 <validator name="validation">
                    <div class="alert alert-danger">
                        <ul>
                            <li >errorMessage</li>
                            <li >Database Host is required.</li>
                            <li >Database Username is required.</li>
                            <li >Database Password is required.</li>
                            <li >Database Name is required.</li>
                        </ul>
                         </validator>
                    </div> -->
                    <div class="form-group">
                        <label for="host">Host</label><span class="required">*</span>
                        <input type="text" class="form-control" id="host">
                        <small>Database host. Usually you should enter localhost or mysql.</small>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label><span class="required">*</span>
                        <input type="text" class="form-control" id="username">
                        <small>Your database username.</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label><span class="required">*</span>
                        <input type="password" class="form-control" id="password">
                        <small>Database password for provided username.</small>
                    </div>
                    <div class="form-group">
                        <label for="database">Database Name</label><span class="required">*</span>
                        <input type="text" class="form-control" id="db_name">
                        <small>Name of database where tables should be created.</small>
                    </div>
               

                <button class="btn btn-as pull-right" onclick="WIInstall.DB();" type="button">
                    <span class="show" id="next">
                        Next
                        <i class="fa fa-arrow-right" ></i>
                    </span>
                    <span class="hide" id="spin">
                        <i class="fa fa-circle-o-notch fa-spin"></i>
                        Connecting...
                    </span>
                </button>
                <div class="clearfix"></div>
            </div>

            <div class="step-content hide" id="step_four">
                <h3>Installation</h3>
                <hr>
                <!--
                <validator name="validation1">
                    <div class="alert alert-danger" v-if="appFormInvalid">
                        <ul>
                            <li>Website name is required.</li>
                            <li>Website domain is required.</li>
                        </ul>
                    </div>
                </validator>

                    -->
                    <p>WICMS is ready to be installed!</p>
                    <p>
                        Provide your website name and domain below and start the installation by clicking the
                        "Install" button. <br>It should not take more than few seconds.
                    </p>
                    <div class="form-group">
                        <label for="website_name">Website Name</label>
                        <input type="text" class="form-control" id="website_name"
                               v-model="website.name" value="WICMS">
                    </div>
                    <div class="form-group">
                        <label for="domain">Website Domain</label>
                        <input type="text" class="form-control"
                                value="<?php echo $_SERVER['HTTP_HOST']; ?>">
                        <small>
                            Your website domain (if script doesn't guess it correctly). If you are installing this script
                            in a subfolder, <strong>DO NOT</strong> write path to that subfolder here!
                            So, just your website domain like google.com or codecanyon.com.
                        </small>
                    </div>
                    <button class="btn btn-as pull-right" onclick="WIInstall.install();">
                        <span class="show" id="install">
                               <i class="fa fa-play"></i>
                            Install
                        </span>
                            <span class="hide" id="installing">
                            <i class="fa fa-circle-o-notch fa-spin"></i>
                            Installing...
                        </span>
                    </button>
                <div class="clearfix"></div>
            </div>

            <div class="step-content hide" id="step_five">
                <h3>Complete!</h3>
                <hr>
                <p><strong>Well Done!</strong></p>
                <p>
                    You application is now successfully installed!
                    You can login by clicking on "Log In" button below.
                </p>

                <p>
                    <strong>Important!</strong> Since your ASEngine directory is still writable,
                    you can change the permissions to 755 to make it writable only by root user.
                </p>

                <br>

                <a class="btn btn-as pull-right" href="../login.php">
                    <i class="fa fa-sign-in"></i>
                    Log In
                </a>
                <div class="clearfix"></div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript" src="../WITheme/WICMS/site/js/frameworks/JQuery.js"></script>
<script type="text/javascript" src="../WITheme/WICMS/site/js/frameworks/bootstrap.js"></script>
<script type="text/javascript" src="WICore/WIJ/WICore.js"></script>
<script type="text/javascript" src="WICore/WIJ/WIInstall.js"></script>

</body>
</html>
