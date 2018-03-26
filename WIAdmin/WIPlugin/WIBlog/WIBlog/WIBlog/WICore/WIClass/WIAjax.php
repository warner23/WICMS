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
        $WIComment->insertComment(WISession::get("user_id"), $_POST['comment'], $_POST['rid']);
        break;

        case "getComments":
        $WIComment = new WIComment();
        $WIComment->getComments($_POST['rid']);
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

    case "getCat":
        $blog = new WIBlog();
        $blog->Cat($_POST['category']);
        break;

    case "getResource":

        $resource = new WIResources();
        $resource->Resource($_POST['get_resource']);
        break;

     case "selected_cat":
        $blog = new WIBlog();
        $blog->selectedCat($_POST['cat_id']);
        break;

    case "selectCat":
        $blog = new WIBlog();
        $blog->SelectCategory();
        break;

        case "keyword":
        $resource = new WIResources();
        $resource->Search($_POST['keyword']);
        break;

        case "nomodepost":
        $blog = new WIBlog();
        $blog->noMedia($_POST['day'], $_POST['month'], $_POST['post_title'], $_POST['blog_post'], $_POST['type'], $_POST['user'],$_POST['cat_id']);
        break;

        case "haveposts":
        $blog = new WIBlog();
        $blog->hasPosts();
        break;

        case "postimage":
        $blog = new WIBlog();
        $blog->blogPostImage($_POST['day'], $_POST['month'], $_POST['post_title'], $_POST['blog_post'], $_POST['type'], $_POST['cat_id'], $_POST['user'], $_POST['Image']);
        break;

        case "postslider":
        $blog = new WIBlog();
        $blog->blogPostSlider($_POST['day'], $_POST['month'], $_POST['post_title'], $_POST['blog_post'], $_POST['type'], $_POST['cat_id'], $_POST['user'], $_POST['Image0'], $_POST['Image1'], $_POST['Image2'], $_POST['caption'], $_POST['caption1'], $_POST['caption2']);
        break;

        case "postaudio":
        $blog = new WIBlog();
        $blog->blogPostAudio($_POST['day'], $_POST['month'], $_POST['post_title'], $_POST['blog_post'], $_POST['type'], $_POST['cat_id'], $_POST['user'], $_POST['audio']);
        break;

        case "PostVideo":
        $blog = new WIBlog();
        $blog->blogPostVideo($_POST['day'], $_POST['month'], $_POST['post_title'], $_POST['blog_post'], $_POST['type'], $_POST['user'],$_POST['cat_id'], $_POST['video']);
        break;

        case "youtube":
        $blog = new WIBlog();
        $blog->YoutubeMedia($_POST['day'], $_POST['month'], $_POST['post_title'], $_POST['ytlink'], $_POST['blog_post'], $_POST['type'], $_POST['user'],$_POST['cat_id']);
        break;

        case "userRole":
        onlyAdmin();

        $user = new WIUser(WISession::get('user_id'));
        echo json_encode($user->getRole());
        break;

	
	default:
		
		break;
}

function onlyAdmin() {
    $login = new WILogin();
    if ( ! $login->isLoggedIn() ) exit();

    $loggedUser = new WIUser(WISession::get("user_id"));
    if( ! $loggedUser->isAdmin() ) exit();
}