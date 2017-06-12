<?php
include  dirname(__FILE__) . '/../WIClass/WI.php';

if( ! $login->isLoggedIn() )
    redirect("login.php");

$user = new WIUser(WISession::get("user_id"));
$userInfo = $user->getInfo();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo WILang::get('home'); ?> | Advanced Security</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Advanced Security - PHP MySQL Register/Login System">
    <meta name="author" content="Milos Stojanovic">
    
    <script type="text/javascript" src="WIInc/js/jquery.min.js"></script>
    <?php if(BOOTSTRAP_VERSION == 2): ?>
        <link rel='stylesheet' href='WIInc/css/bootstrap.min2.css' type='text/css' media='all' />
        <script type="text/javascript" src="WIInc/js/bootstrap.min2.js"></script>
        <link rel='stylesheet' href='WIInc/css/style2.css' type='text/css' media='all' />
    <?php else: ?>
        <link rel='stylesheet' href='WIInc/css/bootstrap.min3.css' type='text/css' media='all' />
        <script type="text/javascript" src="WIInc/js/bootstrap.min3.js"></script>
        <link rel='stylesheet' href='WIInc/css/style3.css' type='text/css' media='all' />
    <?php endif; ?>
    <link href="WIInc/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="WIInc/css/bootstrap3-glyphicons/bootstrap-glyphicons.css" rel="stylesheet">
	<script type="text/javascript" src="WIInc/js/respond.min.js"></script>
    <script type="text/javascript" charset="utf-8">
        var $_lang = <?php echo WILang::all(); ?>;
    </script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

  </head>

  <body>
    <div id="wrap">
            <!-- Navbar
            ================================================== -->
            <div class="navbar navbar-fixed-top">
              <div class="navbar-inner">
                <div class="container">
                    <ul class="nav navbar-nav"> 
                        <a class="brand navbar-brand" href="./index.php"><?php echo WEBSITE_NAME;  ?></a>
                    </ul>
                    <div class="pull-right">
                        <div class="header-flags-wrapper">
                            <a href="?lang=en">
                                <img src="WIInc/img/lang/en.png" alt="English" title="English"
                                     class="<?php echo WILang::getLanguage() != 'en' ? 'fade' : ''; ?>" />
                            </a>
                            <a href="?lang=rs">
                                <img src="WIInc/img/lang/rs.png" alt="Serbian" title="Serbian (cyrillic)"
                                     class="<?php echo WILang::getLanguage() != 'rs' ? 'fade' : ''; ?>" />
                            </a>
                             <a href="?lang=ru">
                                <img src="WIInc/img/lang/ru.png" alt="Russian" title="Russian"
                                     class="<?php echo WILang::getLanguage() != 'ru' ? 'fade' : ''; ?>" />
                            </a>
                             <a href="?lang=es">
                                <img src="WIInc/img/lang/es.png" alt="Spanish" title="Spanish"
                                     class="<?php echo WILang::getLanguage() != 'es' ? 'fade' : ''; ?>" />
                            </a>
                        </div>
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php echo WILang::get('welcome'); ?>, <?php echo e($userInfo['username']);  ?>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="profile.php">
                                            <i class="icon-user glyphicon glyphicon-user"></i> 
                                            <?php echo WILang::get('my_profile'); ?>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="logout.php" id="logout">
                                            <i class="icon-off glyphicon glyphicon-off"></i> 
                                            <?php echo WILang::get('logout'); ?>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                      </div>
                </div>
              </div>
            </div>
        
        
          <div class="container">