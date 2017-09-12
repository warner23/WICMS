<?php
include_once 'WI.php';
require_once 'WIA.php';
//csrf protection
if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') 
    die("Sorry bro!");

$url = parse_url( isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '');
if( !isset( $url['host']) || ($url['host'] != $_SERVER['SERVER_NAME']))
    die("Sorry bro!");

$action = $_POST['action'];

switch ($action) {

        case 'checkLogin':
        $logged = $login->userLogin($_POST['username'], $_POST['password']);
        if($logged === true)
            echo json_encode(array(
                'status' => 'success',
                'page'   => get_redirect_page()
            ));
        break;

         case "registerUser":
        $register->register($_POST['User']);
        break;
        
    case "resetPassword":
        $register->resetPassword($_POST['newPass'], $_POST['key']);
        break;
        
    case "forgotPassword":
        $result = $register->forgotPassword($_POST['email']);
        if ( $result !== TRUE )
            echo $result;
        break;
        
    case "postComment":
        $WIComment = new WIComment();
        echo $WIComment->insertComment(WISession::get("user_id"), $_POST['comment']);
        break;
        
    case "updatePassword":

        $user = new WIUser(WISession::get("user_id"));
        $user->updatePassword($_POST['oldpass'], $_POST['newpass']);
        break;
        
    case "updateDetails":

        $user = new WIUser(WISession::get("user_id"));
        $user->updateDetails($_POST['details']);
        break;
        
    case "changeRole":
        onlyAdmin();

        $user = new WIUser($_POST['userId']);
        echo ucfirst($user->changeRole());
        break;
        
    case "deleteUser":
        onlyAdmin();

        $user = new WIUser($_POST['userId']);
        $user->deleteUser();
        break;
    
    case "getUserDetails":
        onlyAdmin();

        $user = new WIUser($_POST['userId']);
        echo json_encode( $user->getAll() );
        break;

    case "addRole": 
        onlyAdmin();

        $role = new WIRole();
        echo json_encode( $role->add($_POST['role']) );
        break;

    case "deleteRole":
        onlyAdmin();

        $role = new WIRole();
        $role->delete($_POST['roleId']);
        break;


    case "addUser":
        onlyAdmin();

        $user = new WIUser(null);
        echo json_encode( $user->add($_POST) );
        break;

    case "updateUser":
        onlyAdmin();
        $user = new WIUser($_POST['userId']);
        $user->updateUser($_POST);
        break;

    case "banUser":
        onlyAdmin();

        $user = new WIUser($_POST['userId']);
        $user->updateInfo(array( 'banned' => 'Y' ));
        break;

         case "unbanUser":
        onlyAdmin();

        $user = new WIUser($_POST['userId']);
        $user->updateInfo(array( 'banned' => 'N' ));
        break;

    case "getUser":
        onlyAdmin();

        $user = new WIUser($_POST['userId']);
        echo json_encode($user->getAll());
        break;

        case "site_settings":

        $site = new WISite();
        $site->Site_Settings($_POST['settings']);
        break;

    case "database_settings":

        $site = new WISite();
        $site->DataBase_settings($_POST['settings']);
        break;

     case "email_settings":

        $site = new WISite();
        $site->Email_settings($_POST['settings']);
        break;
       
    case "login_settings":

        $site = new WISite();
        $site->Login_settings($_POST['settings']);
        break;

       case "session_settings":

        $site = new WISite();
        $site->Session_Settings($_POST['settings']);
        break;

        case "social_settings":

        $site = new WISite();
        $site->social_settings($_POST['settings']);
        break;

      case "header_settings":
        $web->headerSettings($_POST['settings']);
        break;


      case "footer_settings":
        $web->FooterSettings($_POST['settings']);
        break;

     case "enable_plugin":
     $plug = new WIPlugin();
        $plug->Activate($_POST['plug']));
        break;

     case "install_plugin":
     $plug = new WIPlugin();
        $plug->Install($_POST['plug']));
        break;

        default:

        break;
}

switch($_GET['action']){
        
       // case "getEvents":
       // $calendar = new WICalendar();
       // $calendar->getEvents($_GET['date']) ;
       // break;
        
        default:
        break;
    }

function onlyAdmin() {
    $login = new WILogin();
    if ( ! $login->isLoggedIn() ) exit();

    $loggedUser = new WIUser(WISession::get("user_id"));
    if( ! $loggedUser->isAdmin() ) exit();
}