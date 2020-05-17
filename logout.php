<?php

define("INCLUDE_CHECK", true);
include 'WICore/init.php';

$login->logout();

header('Location: index.php');
die();

?>