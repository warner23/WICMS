<?php
include_once 'WI.php';
require_once 'WIA.php';
//csrf protection
if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') 
    die("Sorry bro!");

$url = parse_url( isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '');
if( !isset( $url['host']) || ($url['host'] != $_SERVER['SERVER_NAME']))
    die("Sorry bro!");

$action = isset($_POST['action']) ? $_POST['action'] : null;
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

        $user = new WIAdmin(WISession::get("user_id"));
        $user->updatePassword($_POST['oldpass'], $_POST['newpass']);
        break;
        
    case "updateDetails":

        $user = new WIAdmin(WISession::get("user_id"));
        $user->updateDetails($_POST['details']);
        break;
        
    case "changeRole":
        onlyAdmin();

        $user = new WIAdmin($_POST['userId']);
        echo ucfirst($user->changeRole());
        break;
        
    case "deleteUser":
        onlyAdmin();

        $user = new WIAdmin($_POST['userId']);
        $user->deleteUser();
        break;
    
    case "getUserDetails":
        onlyAdmin();

        $user = new WIAdmin($_POST['userId']);
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

        $user = new WIAdmin(null);
        echo json_encode( $user->add($_POST) );
        break;

    case "updateUser":
        onlyAdmin();
        $user = new WIAdmin($_POST['userId']);
        $user->updateUser($_POST);
        break;

    case "banUser":
        onlyAdmin();

        $user = new WIAdmin($_POST['userId']);
        $user->updateInfo(array( 'banned' => 'Y' ));
        break;

    case "unbanUser":
        onlyAdmin();

        $user = new WIAdmin($_POST['userId']);
        $user->updateInfo(array( 'banned' => 'N' ));
        break;

    case "getUser":
        onlyAdmin();

        $user = new WIAdmin($_POST['userId']);
        echo json_encode($user->getAll());
        break;

    case 'site_settings':
        onlyAdmin();
        $site = new WISite();
        $site->Site_Settings($_POST['settings']);
        break;    

    case 'database_settings':
         onlyAdmin();
        $site = new WISite();
        $site->DataBase_settings($_POST['settings']);
        break;

        case "email_settings":
        onlyAdmin();
        $site = new WISite();
        $site->Email_settings($_POST['settings']);
        break;

     case "mailer_settings":
     onlyAdmin();
        $site = new WISite();
        $site->Email_Method($_POST['settings']);
        break;
     
     case "session_settings":
     onlyAdmin();
        $site = new WISite();
        $site->Session_Settings($_POST['settings']);
        break;

    case "login_settings":
    onlyAdmin();
        $site = new WISite();
        $site->Login_settings($_POST['settings']);
        break;

    case "social_settings":
    onlyAdmin();
        $site = new WISite();
        $site->social_settings($_POST['settings']);
        break;

    case "lang_settings":
    onlyAdmin();
        $site = new WISite();
        $site->lang_Settings($_POST['settings']);
        break;

    case "multilanguage":
    onlyAdmin();
        $site = new WISite();
        $site->AddMultiLang($_POST['lang'], $_POST['keyword'],$_POST['trans']);
        break;

    case "AddLang":
    onlyAdmin();
        $site = new WISite();
        $site->AddLang($_POST['lang']);
        break;

    case "AddCSS":
    onlyAdmin();
        $site = new WISite();
        $site->AddCSS($_POST['CSS']);
        break;

    case "mod_install":
    onlyAdmin();
        $mod = new WIModules();
        $mod->install_mod($_POST['mod_name'], $_POST['author'] );
        break;

    case "mod_uninstall":
    onlyAdmin();
        $mod = new WIModules();
        $mod->uninstall_mod($_POST['mod_name']);
        break;

    case "mod_enable":
    onlyAdmin();
        $mod = new WIModules();
        $mod->active_available_mod($_POST['mod_name'], $_POST['enable'] );
        break;

    case "mod_disable":
    onlyAdmin();
        $mod = new WIModules();
        $mod->deactive_available_mod($_POST['mod_name'], $_POST['disable']);
        break;

    case "drop_call":
    onlyAdmin();
        $mod = new WIModules();
        $mod->dropElement($_POST['mod_name']);
        break;

          case "edit_drop_mod":
    onlyAdmin();
        $mod = new WIModules();
        $mod->editDropElement($_POST['mod_name']);
        break;

    case "Translations":
    onlyAdmin();
        $web = new WIWebsite();
        $web->viewTrans();
        break;

     case "lang_page":
    onlyAdmin();
        $web = new WIWebsite();
        $web->viewTrans($_POST['page']);
        break;


          case "getInfo":
    onlyAdmin();
        $page = new WIPage();
        $page->PageInfo($_POST['page']);
        break;

    case "Next":
    onlyAdmin();
        $mod = new WIModules();
        $mod->getModules();
        break;
     case "NextPage":
    onlyAdmin();
        $mod = new WIModules();
        $mod->getModules($_POST['page']);
        break;

    case "NextMod":
    onlyAdmin();
        $mod = new WIModules();
        $mod->getActiveMods($_POST['page']);
        break;

     case "NextModPage":
    onlyAdmin();
        $mod = new WIModules();
        $mod->getActiveMods();
        break;

    case "getLangInfo":
    onlyAdmin();
        $web = new WIWebsite();
        $web->getLangInfo($_POST['lang']);
        break;

     case "sendmessage":
        $chat = new WIAdminChat();
        $chat->SendMessage($_POST['Message'], $_POST['user_id']);
        break;

    case "todoListcomplete":
        $dash = new WIDashboard();
        $dash->completetodo($_POST['id']);
        break;

            case "todoListAdd":
        $dash = new WIDashboard();
        $dash->addToDoListItem($_POST['todoItem']);
        break;

     case "loadPage":
        $page = new WIPage();
        $page->LoadPage($_POST['page']);
        break;

         case "changePage":
        $page = new WIPage();
        $page->LoadPage($_POST['page']);
        break;

        case "new_page":
        $page = new WIPage();
        $page->newPage($_POST['page']);
        break;


        default:

        break;
}

$action = isset($_GET['action']) ? $_GET['action'] : null;
switch($action){
        
       case "todoList":
       $dashboard = new WIDashboard();
       $dashboard->toDoList() ;
       break;

       case "NextPagetodolist":
       $dashboard = new WIDashboard();
       $dashboard->toDoList($_POST['page']) ;
       break;

        case 'CheckChat':
        $chat->getChatMessages( $_GET['last_chat_time'], $_GET['userId']);
        break;
        
        
        case 'getChats':
            $response = Chat::getChats($_GET['lastID']);
        break;

        case "Notifications":
       $dashboard = new WIDashboard();
       $dashboard->Notifications() ;
       break;

        case "registeredUsercount":
       $site = new WISite();
       $site->RegisteredUsers() ;
       break;

        case "NotificationsCount":
        $site = new WISite();
        $site->notifications_badge();
        break;

         case "activeChatCount":
        $site = new WISite();
        $site->ActiveChatCount();
        break;

                case "getMessages":
        $contact = new WIContact();
        $contact->Messages();
        break;
        
        default:
        break;
   }

function onlyAdmin() {
    $login = new WILogin();
    if ( ! $login->isLoggedIn() ) exit();

    $loggedUser = new WIAdmin(WISession::get("user_id"));
    if( ! $loggedUser->isAdmin() ) exit();
}