<?php
include_once 'WI.php';

//csrf protection
if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') 
    die("Sorry bro!");

$url = parse_url( isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '');
if( !isset( $url['host']) || ($url['host'] != $_SERVER['SERVER_NAME']))
    die("Sorry bro!");

$action = isset($_POST['action']) ? $_POST['action'] : null;
switch ($action) {

        case "getProduct":
        $shop = new WIShop();
        $shop->Product();
        break;

        case "getBrands":
        $shop = new WIShop();
        $shop->Brand();
        break;

        case "getCats":
        $shop = new WIShop();
        $shop->Cat();
        break;


        default:

        break;
}

$action = isset($_GET['action']) ? $_GET['action'] : null;
switch($action){
        
       
        
        default:
        break;
   }

function onlyAdmin() {
    $login = new WILogin();
    if ( ! $login->isLoggedIn() ) exit();

    $loggedUser = new WIAdmin(WISession::get("user_id"));
    if( ! $loggedUser->isAdmin() ) exit();
}