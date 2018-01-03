<?php

if(isset($_POST['submit'])) {
	$host = trim($_POST['host']);
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$port = trim($_POST['port']);
	$dbname = trim($_POST['dbname']);;

	if(!empty($host) && !empty($username) && !empty($dbname)) {

		if(empty($port) || !is_numeric($port)) {
			$port = 3306;
		}

		$pdo = new PDO('mysql:host=' . $host . ';port=' . $port . ';', $username, $password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$dbname = "`" . str_replace("`", "``", $dbname) . "`";
		$pdo->query("CREATE DATABASE IF NOT EXISTS $dbname");
		$pdo->query("use $dbname");

		$q = "CREATE TABLE IF NOT EXISTS `WI_comments` 
(
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
 
 `posted_by` int(11) NOT NULL,
 
 `posted_by_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,

  `comment` text COLLATE utf8_unicode_ci NOT NULL,

  `post_time` datetime NOT NULL,

  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




CREATE TABLE IF NOT EXISTS `WI_login_attempts` 
(
  `id_login_attempts` int(11) NOT NULL AUTO_INCREMENT,

  `ip_addr` varchar(20) COLLATE utf8_unicode_ci NOT NULL,

 `attempt_number` int(11) NOT NULL DEFAULT '1',
 
 `date` date NOT NULL,
 
 PRIMARY KEY (`id_login_attempts`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




CREATE TABLE IF NOT EXISTS `WI_social_logins` 
(
  `id` int(11) NOT NULL AUTO_INCREMENT,
 
 `user_id` int(11) NOT NULL,

  `provider` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'email',

  `provider_id` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
 
 `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',

  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




CREATE TABLE IF NOT EXISTS `WI_users` 
(
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
 
 `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
 
 `username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,

  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
 
 `confirmation_key` varchar(40) COLLATE utf8_unicode_ci NOT NULL,

  `confirmed` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',

  `password_reset_key` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',

  `password_reset_confirmed` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',

  `password_reset_timestamp` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
 
 `register_date` date NOT NULL,

  `user_role` int(4) NOT NULL DEFAULT '1',

  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
 
 `banned` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',

  PRIMARY KEY (`user_id`),
 
 UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `WI_user_details` 
(
  `id_user_details` int(11) NOT NULL AUTO_INCREMENT,

  `user_id` int(11) NOT NULL,
 
 `first_name` varchar(35) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',

  `last_name` varchar(35) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
 
 `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',

  `address` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
 
 PRIMARY KEY (`id_user_details`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




CREATE TABLE IF NOT EXISTS `WI_user_roles` 
(
  `role_id` int(11) NOT NULL AUTO_INCREMENT,

  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL,

  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";



		$pdo->exec($q);
		$pdo = null;

		$searchF  = array('{HOST}','{USERNAME}','{PASSWORD}','{DBNAME}', '{PORT}');
		$dbname = substr($dbname, 1 , -1);
		$replaceW = array($host, $username, $password, $dbname, $port);

		$path_to_file = 'WIConfig.php';
		$file_contents = file_get_contents($path_to_file);
		$file_contents = str_replace($searchF, $replaceW, $file_contents);
		file_put_contents($path_to_file,$file_contents);
	}
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Installation | WI CMS</title>
<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="WIInc/css/bootstrap.min.css" rel="stylesheet">
	<link href="WIInc/css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="inc/img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="inc/img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="inc/img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="WIInc/img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="WIInc/img/favicon.png">
  
	<script type="text/javascript" src="WIInc/js/jquery.min.js"></script>
	<script type="text/javascript" src="WIInc/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="WIInc/js/scripts.js"></script>
</head>
	<body>
		
		<section class="container">
			<div class="row clearfix">
		<div class="col-md-12 column">


	</div>
</div>
</section>
</body>
</html>