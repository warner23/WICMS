<?php
include_once 'WI.php';

//csrf protection
if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') 
    die("Sorry bro!");

$url = parse_url( isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '');
if( !isset( $url['host']) || ($url['host'] != $_SERVER['SERVER_NAME']))
    die("Sorry bro!");

$action = $_POST['action'];


switch ($action) {   

 case 'requirements':
        $require = new WIRequirements();
        $require ->Required();
        break;

 case 'db_settings':
     $DB = new WIDBSeetings();
     $DB->TestDB($_POST['host'],$_POST['db'],$_POST['user'],$_POST['pass']);
        break;

case 'install_settings':
     $install = new install();
     $install->Installer($_POST['name'],$_POST['dom']);
        break;
        
        default:
        
        break;
}

//switch($_GET['action']){
        
        //case "getEvents":
        //$calendar = new WICalendar();
        //$calendar->getEvents($_GET['date']) ;
        //break;
        
       // default:
      //  break;
   // }

