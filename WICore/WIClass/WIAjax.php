<?php
include_once 'WI.php';
include_once 'WIA.php';

//csrf protection
if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') 
    die("Sorry bro!");

$url = parse_url( isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '');
if( !isset( $url['host']) || ($url['host'] != $_SERVER['SERVER_NAME']))
    die("Sorry bro!");

//$action = $_POST['action'];
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

         case "selected_vote":
        $topic = new WITopic();
        $topic->selected_Vote($_POST['vote'], $_POST['voting_id']);
        break;

    case "selected_voting":
        $topic = new WITopic();
        $topic->selected_Voting($_POST['vote'], $_POST['option'], $_POST['voting_id']);
        break;

        case "checkrequest":
        $debate = new WIDebate();
        $debate->checkRequest($_POST['userId']);
        break;

        case "debate":
        $debate = new WIDebate();
        $debate->StartChat($_POST['userId'], $_POST['userVoteId'], $_POST['topic_id'],$_POST['dateTime']);
        break;

        case "changeStatus":
        $debate = new WIDebate();
        $debate->Accept();
        break;

        case "sendmessage":
        $debate = new WIDebate();
        $debate->SendMessage($_POST['Message'], $_POST['chat_id'], $_POST['user_id']);
        break;

        case "closeDialog":
        $debate = new WIDebate();
        $debate->closeDialog($_POST['user_id'], $_POST['chat_id']);
        break;

         case "topic":
        $debate = new WIDebate();
        $debate->TopicName($_POST['user_id'], $_POST['chat_id']);
        break;

        case "show_view_profile":
        $debate = new WIDebate();
        $debate->ShowViewProfile($_POST['user_id'], $_POST['chat_id']);
        break;

         case "profile":
        $debate = new WIDebate();
        $debate->Profile($_POST['Fid']);
        break;

     case "List":
        $lists = new WIListings();
        $lists->listings(WISession::get('user_id'), WISession::get('id_vote') , $_POST['col'] );
        break;

        case "Lists":
        $lists = new WIListings();
        $lists->listings(WISession::get('user_id'), WISession::get('id_vote'), $_POST['page'],  $_POST['col']);
        break;

    case "spectate":
        $debate = new WIDebate();
        $debate->spectate($_POST['vote']);
        break;

            case "endChat":
        $debate = new WIDebate();
        $debate->spectate($_POST['vote']);
        break;

        case "winnVote":
        $debate = new WIDebate();
        $debate->WinnersVote($_POST['chat_id'], $_POST['win']);
        break;

        case "contact":
        $contact = new WIContact();
        $contact->sendMessage($_POST['name'], $_POST['email'],  $_POST['subject'], $_POST['message']);
        break;
        

            default:
        
        break;
};


//$action = $_GET['action'];
$action = isset($_GET['action']) ? $_GET['action'] : null;
switch($action){
    
        
        case 'CheckChat':
        $debate->getChatMessages($_GET['chat_id'], $_GET['last_chat_time'], $_GET['userId']);
        break;
        
        
        case 'getChats':
            $response = Chat::getChats($_GET['lastID']);
        break;
        

        case 'Pending':
        $debate = new WIDebate();
        $debate->checkPending();
        break;

         case "status":
        $debate = new WIDebate();
        $debate->status($_GET['chat_id']);
        break;

        case "endTime":
        $debate = new WIDebate();
        $debate->getTime($_GET['chat_id']);
        break;

        case "winner":
        $debate = new WIDebate();
        $debate-> winStatus($_GET['chat_id']);
        break;
        
        default:
    }

function onlyAdmin() {
    $login = new WILogin();
    if ( ! $login->isLoggedIn() ) exit();

    $loggedUser = new WIUser(WISession::get("user_id"));
    if( ! $loggedUser->isAdmin() ) exit();
}