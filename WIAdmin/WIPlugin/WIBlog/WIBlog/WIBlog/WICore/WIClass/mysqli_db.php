<?php
//db details
$dbHost = 'mysql1003.mochahost.com';
$dbUsername = 'warner_Master';
$dbPassword = 'taylor22';
$dbName = 'warner_WICMS';

//Connect and select the database
$WIdb = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($WIdb->connect_error) {
    die("Connection failed: " . $WIdb->connect_error);
}
?>