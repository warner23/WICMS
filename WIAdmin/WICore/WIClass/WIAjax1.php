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

    case "verification_settings":
     onlyAdmin();
        $site = new WISite();
        $site->verification_Settings($_POST['settings']);
        break;

        case "encryption":
    onlyAdmin();
        $site = new WISite();
        $site->Security_Settings($_POST['encryption'],$_POST['cost']);
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

    case "header_settings":
    onlyAdmin();
        $web = new WIWebsite();
        $web->headerSettings($_POST['settings']);
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

        case "multiLang":
    onlyAdmin();
        $web = new WIWebsite(); 
        $web->CheckMultiLang();
        break;

        case "EditModLang":
    onlyAdmin();
        $web = new WIWebsite(); 
        $web->EditModLang($_POST['code'], $_POST['keyword'],$_POST['trans'], $_POST['mod_name']);
        break;

         case "EditModLangpara":
    onlyAdmin();
        $web = new WIWebsite(); 
        $web->EditModLangPara($_POST['code'], $_POST['keyword'],$_POST['trans'], $_POST['mod_name']);
        break;

    case "editMenu":
        onlyAdmin();
        $web = new WIWebsite(); 
        $web->editMenu( $_POST['id']);
        break;

    case "menuEdit":
        onlyAdmin();
        $web = new WIWebsite(); 
        $web->menuEdit( $_POST['id'], $_POST['name'], $_POST['link']);
        break;

    case "AddLang":
    onlyAdmin();
        $site = new WISite();
        $site->AddLang($_POST['lang']);
        break;

   case "editlang":
    onlyAdmin();
        $site = new WISite();
        $site->editlang($_POST['lang']);
        break;

    case "SaveEditLang":
    onlyAdmin();
        $site = new WISite();
        $site->SaveEditLang($_POST['lang']);
        break;

    case "AddTrans":
    onlyAdmin();
        $site = new WISite();
        $site->AddTrans($_POST['trans']);
        break;

    case "edittrans":
    onlyAdmin();
        $site = new WISite();
        $site->edittrans($_POST['id']);
        break;

    case "saveedittrans":
    onlyAdmin();
        $site = new WISite();
        $site->saveedittrans($_POST['trans']);
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

        case "element_install":
    onlyAdmin();
        $mod = new WIModules();
        $mod->installElement($_POST['element_name'] );
        break;

    case "mod_uninstall":
    onlyAdmin();
        $mod = new WIModules();
        $mod->uninstall_mod($_POST['mod_name']);
        break;

    case "ele_uninstall":
    onlyAdmin();
        $mod = new WIModules();
        $mod->unistall_Element($_POST['mod_name']);
        break;

    case "mod_enable":
    onlyAdmin();
        $mod = new WIModules();
        $mod->active_available_mod($_POST['mod_name'], $_POST['enable'] );
        break;
    
    case "Element_enable":
    onlyAdmin();
        $mod = new WIModules();
        $mod->activateAvailableElements($_POST['element_name'], $_POST['enable'] );
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

            case "col_call":
    onlyAdmin();
        $mod = new WIModules();
        $mod->dropColElement($_POST['mod_name']);
        break;

          case "edit_drop_mod":
    onlyAdmin();
        $mod = new WIModules();
        $mod->editDropElement($_POST['mod_name'], $_POST['page_id']);
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
        $mod->getActiveMods();
        break;
     case "NextPage":
    onlyAdmin();
        $mod = new WIModules();
        $mod->getActiveMods($_POST['page']);
        break;

     case "NextModPage":
    onlyAdmin();
        $mod = new WIModules();
        $mod->getPageModules();
        break;

    case "NextElementsPage":
    onlyAdmin();
        $mod = new WIModules();
        $mod->getElements($_POST['page']);
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
     onlyAdmin();
        $chat = new WIAdminChat();
        $chat->SendMessage($_POST['Message'], $_POST['user_id']);
        break;

    case "todoListcomplete":
    onlyAdmin();
        $dash = new WIDashboard();
        $dash->completetodo($_POST['id']);
        break;

    case "todoListAdd":
    onlyAdmin();
        $dash = new WIDashboard();
        $dash->addToDoListItem($_POST['todoItem']);
        break;

     case "loadPage":
     onlyAdmin();
        $page = new WIPage();
        $page->LoadPage($_POST['page']);
        break;

    case "loadOptions":
    onlyAdmin();
        $page = new WIPage();
        $page->loadPageOptions($_POST['page']);
        break;

         case "loadPageOptions":
    onlyAdmin();
        $page = new WIPage();
        $page->loadPageOptions($_POST['page']);
        break;

            case "changePage":
    onlyAdmin();
        $page = new WIPage();
        $page->LoadPage($_POST['page']);
        break;

    case "lsc_change":
    onlyAdmin();
        $page = new WIPage();
        $page->LoadPage($_POST['page'], $_POST['col']);
        break;

    case "togglelsc_change":
    onlyAdmin();
        $page = new WIPage();
        $page->toogleLsc($_POST['page'], $_POST['col']);
        break;

    case "rsc_change":
    onlyAdmin();
        $page = new WIPage();
        $page->LoadPage($_POST['page'], $_POST['col']);
        break;
        
        
    case "lsc_changed":
    onlyAdmin();
        $page = new WIPage();
        $page->changeLSC($_POST['page'], $_POST['col']);
        break;

    case "changePageElement":
    onlyAdmin();
        $page = new WIPage();
        $page->changePageElement($_POST['page'], $_POST['element']);
        break;

    case "changePanel":
    onlyAdmin();
        $page = new WIPage();
        $page->changePanel($_POST['page']);
        break;

        case "changeTopHead":
    onlyAdmin();
        $page = new WIPage();
        $page->changeTopHead($_POST['page']);
        break;

    case "rsc_changed":
    onlyAdmin();
        $page = new WIPage();
        $page->changeRSC($_POST['page'], $_POST['col']);
        break;

    case "new_page":
    onlyAdmin();
        $page = new WIPage();
        $page->newPage($_POST['page']);
        break;

    case "page_delete":
    onlyAdmin();
        $page = new WIPage();
        $page->deletePage($_POST['page_id'],$_POST['name']);
        break;

    case "changePic":
    onlyAdmin();
        $site = new WISite();
        $site->headerPic($_POST['img']);
        break;

    case "changefaviconPic":
    onlyAdmin();
        $site = new WISite();
        $site->faviconPic($_POST['img']);
        break;

    case "saveLang":
    onlyAdmin();
        $web = new WIWebsite();
        $web->saveLang($_POST['name'], $_POST['code'], $_POST['flag']);
        break;

    case "AddeditLang":
    onlyAdmin();
        $web = new WIWebsite();
        $web->saveeditLang($_POST['name'], $_POST['code'], $_POST['flag'], $_POST['id']);
        break;

    case "resfresh":
    onlyAdmin();
        $web = new WIWebsite();
        $web->viewLang();
        break;

        case "deleteLangCountry":
    onlyAdmin();
        $web = new WIWebsite();
        $web->DeleteCountryLang($_POST['id']);
        break;

     case "transitemdelete":
    onlyAdmin();
        $web = new WIWebsite();
        $web->transitemdelete($_POST['id']);
        break;

    case "folder":
    onlyAdmin();
        $img = new WIImage();
        $img->Folder($_POST['folder']);
        break;

    case "back":
    onlyAdmin();
        $img = new WIImage();
        $img->AllPics();
        break;

    case "createMod":
    onlyAdmin();
        $mod = new WIModules();
        $mod->createMod($_POST['contents'], $_POST['mod_name'], $_POST['layout'],$_POST['elements'],$_POST['columnPreset']);
            
        break;

    case "EditMod":
    onlyAdmin();
        $mod = new WIModules();
        $mod->editContents($_POST['title'], $_POST['para'], $_POST['mod_name']);
        break;

    case "changeMetaPage":
    onlyAdmin();
        $page = new WIPage();
        $page->LoadMetaPage($_POST['page']);
        break;

    case "changeJsPage":
    onlyAdmin();
        $page = new WIPage();
        $page->LoadJsPage($_POST['page']);
        break;

    case "changeCssPage":
    onlyAdmin();
        $page = new WIPage();
        $page->LoadCssPage($_POST['page']);
        break;

    case "viewThemes":
    onlyAdmin();
        $web = new WIWebsite();
        $web->viewThemes();
        break;

    case "themeActivate":
    onlyAdmin();
        $web = new WIWebsite();
        $web->activateThemes($_POST['id']);
        break;

        case "theme":
    onlyAdmin();
        $web = new WIWebsite();
        $web->NewTheme($_POST['name']);
        break;

         case "setTheme":
        onlyAdmin();
        $web = new WIWebsite();
        $web->setTheme($_POST['id'], $_POST['val']);
        break;

         case "themeDeactivate":
        $web = new WIWebsite();
        $web->deactivateThemes($_POST['id']);
        break;
        
        case "viewMeta":
    onlyAdmin();
        $web = new WIWebsite();
        $web->ViewMeta($_POST['page']);
        break;

    case "editMeta":
    onlyAdmin();
        $web = new WIWebsite();
        $web->ViewEditMeta($_POST['id']);
        break;

    case "editMetaDetails":
    onlyAdmin();
        $web = new WIWebsite();
        $web->EditMeta($_POST['id'], $_POST['name'], $_POST['content'], $_POST['auth']);
        break;

    case "DeleteMeta":
    onlyAdmin();
        $web = new WIWebsite();
        $web->DeleteMeta($_POST['id']);
        break;

    case "viewCss":
    onlyAdmin();
        $web = new WIWebsite();
        $web->ViewCSS($_POST['page']);
        break;

        case "href":
    onlyAdmin();
        $web = new WIWebsite();
        $web->Href($_POST['href']);
        break;

    case "editCss":
    onlyAdmin();
        $web = new WIWebsite();
        $web->ViewEditCss($_POST['id']);
        break;

    case "editCssDetails":
    onlyAdmin();
        $web = new WIWebsite();
        $web->EditCss($_POST['CSS']);
        break;

    case "DeleteCss":
    onlyAdmin();
        $web = new WIWebsite();
        $web->DeleteCss($_POST['id']);
        break;

    case "viewjs":
    onlyAdmin();
        $web = new WIWebsite();
        $web->ViewJS($_POST['page']);
        break;


    case "ViewEditJs":
    onlyAdmin();
        $web = new WIWebsite();
        $web->ViewEditJs($_POST['id']);
        break;

    case "editJsDetails":
    onlyAdmin();
        $web = new WIWebsite();
        $web->EditJs($_POST['id'], $_POST['js']);
        break;

    case "deleteJs":
    onlyAdmin();
        $web = new WIWebsite();
        $web->DeleteJs($_POST['id']);
        break;

    case "addNew":
    onlyAdmin();
        $topic = new WITopic();
        $topic->addNew();
        break;

    case "newTopic":
    onlyAdmin();
        $topic = new WITopic();
        $topic->newTopic($_POST['topic']);
        break;

    case "Topics":
    onlyAdmin();
        $topic = new WITopic();
        $topic->topic_Info();
        break;

    case "editTopics":
    onlyAdmin();
        $topic = new WITopic();
        $topic->editTopics($_POST['topic'], $_POST['id']);
        break;

    case "version_control":
    onlyAdmin();
        $site = new WISite();
        $site->VersionControl($_POST['version']);
        break;

        case "ChangePageViewLang":
    onlyAdmin();
        $web = new WIWebsite();
        $web->viewTrans($_POST['page']);
        break;

        case "install_plugin":
    onlyAdmin();
        $plug = new WIPlugin();
        $plug->Install($_POST['plug'], $_POST['plugin']);
        break;

        case "enable_plugin":
    onlyAdmin();
        $plug = new WIPlugin();
        $plug->Activate($_POST['plug']);
        break;
        
        case "getInfo":
        $page = new WIPage();
        $page->getInfo($_POST['page_id']);
        break;

        case "site_perm":
        $perm = new WIPermissions();
        $perm->site_perm($_POST['ed'],$_POST['id'],$_POST['edit']);
        break;

        case "new_css":
        onlyAdmin();
        $web = new WIWebsite();
        $web->newCss($_POST['styling'], $_POST['href']);
        break;


        case "new_js":
        onlyAdmin();
        $web = new WIWebsite();
        $web->newJs($_POST['script'], $_POST['href']);
        break;

        case "save_mod":
        onlyAdmin();
        $mod = new WIModules();
        $mod->save_mod( $_POST['mod_name'], $_POST['contents'], $_POST['content']);
        break;

        case "assign":
        onlyAdmin();
        $page = new WIPage();
        $page->assign( $_POST['mod'], $_POST['page']);
        break;
        


        default:

        break;
}

$action = isset($_GET['action']) ? $_GET['action'] : null;
switch($action){
        
       case "todoList":
       onlyAdmin();
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
        onlyAdmin();
       $dashboard = new WIDashboard();
       $dashboard->Notifications() ;
       break;

        case "registeredUsercount":
        onlyAdmin();
       $site = new WISite();
       $site->RegisteredUsers() ;
       break;

       case "UniqueVisit":
        onlyAdmin();
       $dashboard = new WIDashboard();
       $dashboard->UniqueVisit() ;
       break;

       case "boucerate":
        onlyAdmin();
       $dashboard = new WIDashboard();
       $dashboard->BounceRate() ;
       break;

        case "NotificationsCount":
        onlyAdmin();
        $site = new WISite();
        $site->notifications_badge();
        break;

        case "MessagesCount":
        onlyAdmin();
        $site = new WISite();
        $site->MessageBagde();
        break;

         case "activeChatCount":
         onlyAdmin();
        $site = new WISite();
        $site->ActiveChatCount();
        break;


        case "TasksCount":
        onlyAdmin();
        $site = new WISite();
        $site->TaskBagde();
        break;

        case "info_box":
        $dash = new WIDashboard();
        $dash->Info_Boxes();
        break;

        case "calendar":
        $cal = new WICalendar();
        $cal->getCalendar();
        break;

        case "getMessages":
        $contact = new WIContact();
        $contact->Messages();
        break;

        case "tasks":
        onlyAdmin();
        $site = new WISite();
        $site->tasks();
        break;

        case "load_mod":
        onlyAdmin();
        $mod = new WIModules();
        $mod->tasks();
        break;

        case "mapData":
        $dash = new WIDashboard();
        $dash->Map_visitors();
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