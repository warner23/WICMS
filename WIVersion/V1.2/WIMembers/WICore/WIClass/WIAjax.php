<?php
include_once 'WI.php';

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

            case "showPic":
        $profile = new WIProfile();
        $profile->User_pic($_POST['userId']);
        break;

        case "updateBio":
        $profile = new WIProfile();
        $profile->UpdateBio($_POST['userId'], $_POST['bio']);
        break;

         case "updateProfileDetails":
        $profile = new WIProfile();
        $profile->updateProfileDetails($_POST['userId'], $_POST['fname'], $_POST['lname']);
        break;

        case "updateLocation":
        $profile = new WIProfile();
        $profile->updateLocation($_POST['userId'], $_POST['country'], $_POST['region'], $_POST['city']);
        break;

        case "displayBio":
        $profile = new WIProfile();
        $profile->userDetails($_POST['userId'], "bio_body");
        break;

        case "uploadUserPhoto":
        $profile = new WIProfile();
        $profile->UploadProfilePic($_POST['photo'], $_POST['user']);
        break;

        case "displayLocation":
        $profile = new WIProfile();
        $profile->LocationInfo($_POST['userId']);
        break;

         case "displaySocial":
        $profile = new WIProfile();
        $profile->Social_Profile($_POST['userId']);
        break;

       case "friendProfile":
        $profile = new WIProfile();
        $profile->friendProfile($_POST['friend']);
        break;

     case "friendProfile0":
        $profile = new WIProfile();
        $profile->friendProfile0();
        break;

       case "privateMessage":
        $profile = new WIProfile();
        $profile->privateMessage($_POST['pmSub'], $_POST['pmText'], $_POST['senderid'],$_POST['sendername'],$_POST['rec_id'],$_POST['recName']);
        break;

        case "AddFriend":
        $profile = new WIProfile();
        $profile->addFriend($_POST['userId'], $_POST['friendId']);
        break;

        case "acceptrequest":
        $profile = new WIProfile();
        $profile->acceptRequest($_POST['req_id']);
        break;

        case "denyrequest":
        $profile = new WIProfile();
        $profile->denyRequest($_POST['req_id']);
        break;

         case "markAsRead":
        $profile = new WIProfile();
        $profile->MarkAsRead($_POST['msgID'], $_POST['user']);
        break;

        case "processReply":
        $profile = new WIProfile();
        $profile->reply($_POST['pmSubject'], $_POST['pmTextArea'], $_POST['sendername'], $_POST['senderid'],$_POST['recName'], $_POST['recID']);
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
        
        default:
    }

function onlyAdmin() {
    $login = new WILogin();
    if ( ! $login->isLoggedIn() ) exit();

    $loggedUser = new WIUser(WISession::get("user_id"));
    if( ! $loggedUser->isAdmin() ) exit();
}