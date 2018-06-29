<?php


class WIWebsite 
{


	    function __construct() 
    {
         $this->WIdb = WIdb::getInstance();
         $this->Page = new WIPagination();

    }


            public function webSite_essentials($column)
    {
        $sql = "SELECT * FROM `wi_header`";
        $query = $this->WIdb->prepare($sql);
        $query->execute();

        $res = $query->fetch(PDO::PARAM_STR);
        return $res[$column];
    }


    public function AddChildren($id)
    {
        
    	$sql = "SELECT * FROM `wi_sidebar` WHERE `parent` = :id";
    	$query = $this->WIdb->prepare($sql);
    	$query->bindParam(':id', $id, PDO::PARAM_INT);
    	$query->execute();
    	while ($res = $query->fetch()) {

    		echo '<li><a href="' . $res['link'] . '"><i class="fa fa-angle-double-right"></i>
            <img class="img-responsive mobileShow" src="WIMedia/Img/icons/admin_sidebar/' . $res['img'] . '.png">
            <span class="mobileHide">' . $res['lang'] . '</span></a></li>';
    	}

    }

        public function EditAddChildren($id)
    {
        $sql = "SELECT * FROM `wi_sidebar` WHERE `parent` = :id";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        while ($res = $query->fetch()) {
            echo '<li><input type="text" id="sidebar_href"  maxlength="88" name="sidebar_href" placeholder="Sidebar href" class="input-xlarge form-control" value="' . $res['link'] . '"> <br />
            <i class="fa fa-angle-double-right"></i>
            <input type="text" id="sidebar_menu"  maxlength="88" name="sidebar_menu" placeholder="Sidebar menu" class="input-xlarge form-control" value="' . $res['lang'] . '"> <br />
            </li>';
        }

    }



    public function EditAdminSideBar()
    {
        $sql = "SELECT * FROM `wi_sidebar`";
        $query = $this->WIdb->prepare($sql);
        $query->execute();
        $result = $query->fetch();
        $menu_order = $result['sort'];

        $sql1 = "SELECT * FROM  `wi_sidebar` a LEFT OUTER JOIN (SELECT parent, COUNT( * ) AS Count
        FROM  `wi_sidebar` GROUP BY parent)Deriv1 ON a.id = Deriv1.parent";
        
        $query1 = $this->WIdb->prepare($sql1);
        $query1->bindParam(':order', $menu_order, PDO::PARAM_INT);
        $query1->execute();
        echo '<ul class="sidebar-menu">
                       
                        </ul>
                <div id="editaccordion">';

        while($res = $query1->fetch(PDO::FETCH_ASSOC))
        { 
        if($res['parent'] > 0) 
        {
                echo '<h3> <input type="text" id="sidebar_label"  maxlength="88" name="sidebar_label" placeholder="Sidebar Label" class="input-xlarge form-control" value="' . $res['label'] . '"> <br />
                </h3><div>';
                WIWebsite::EditAddChildren($res['id']);
                echo '</div>';
                }
        }
        echo ' </div>';
    }


    public function AdminSideBar()
    {
        $sql = "SELECT * FROM `wi_sidebar`";
        $query = $this->WIdb->prepare($sql);
        $query->execute();
        $result = $query->fetch();
        $menu_order = $result['sort'];

        $sql1 = "SELECT * FROM  `wi_sidebar` a LEFT OUTER JOIN (SELECT parent, COUNT( * ) AS Count
		FROM  `wi_sidebar` GROUP BY parent)Deriv1 ON a.id = Deriv1.parent";
        
        $query1 = $this->WIdb->prepare($sql1);
        $query1->bindParam(':order', $menu_order, PDO::PARAM_INT);
        $query1->execute();
        echo '<ul class="sidebar-menu">
                        <li class="active">
                            <a href="dashboard.php">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        </ul>
				<div id="accordion">';

        while($res = $query1->fetch(PDO::FETCH_ASSOC))
        { 
        if($res['parent'] > 0) 
        {
        	    echo '<h3>' . $res['label'] . '</h3><div>';
         		WIWebsite::AddChildren($res['id']);
         		echo '</div>';
        }


        }
        echo ' </div>';
    }

    public function AdminMenu()
    {
        $sql = "SELECT * FROM `wi_admin_menu`";
         $query = $this->WIdb->prepare($sql);
        $query->execute();
        echo '<ul class="nav navbar-nav">';

        while($res = $query->fetch(PDO::FETCH_ASSOC))
        {    
         echo '<li><a href="' . $res['link'] . '">' . WILang::get('' .$res['lang'] .'') . '</a></li>';
         if($res['parent'] > 0)
         {
            echo '<li><a href="' . $res['link'] . '">' . WILang::get('' .$res['lang'] .'') . '</a></li>';
         }
        }
        echo '</ul>';
    }



        public function MainMenu()
    {
        $sql = "SELECT * FROM `wi_menu`";
        $query = $this->WIdb->prepare($sql);
        $query->execute();
        $result = $query->fetch();
        $menu_order = $result['sort'];

        $sql1 = "SELECT * FROM `wi_menu` ORDER BY :order";
        $query1 = $this->WIdb->prepare($sql1);
        $query1->bindParam(':order', $menu_order, PDO::PARAM_INT);
        $query1->execute();
        echo '<div class="col-lg-9 col-md-9 col-sm-12 menu">
              <div id="nav">
               <ul id="mainMenu" class="mainMenu default">';

        while($res = $query1->fetchAll(PDO::FETCH_ASSOC))
        {    
            foreach ($res as $part) {
                echo '<li> <input type="text" id="menu_name_' . $part['id'] . '"  maxlength="88" name="menu_name" placeholder="menu name" class="input-xlarge form-control" value="' . $part['label'] . '"></li>';
         if($part['parent'] > 0)
         {
            echo '<li><a href="' . $part['link'] . '">' .$part['label'] .'</a></li>';
         }
            }
         
        }
        echo '</ul><a href="javascript:void(0);" onclick="WIMenu.newTab()">
        <div class="new_tab_icon"></div></a>
            </div><!-- nav -->   
            <!-- end of menu -->
            </div>';
    }


         public function Pictgetter($mod_name)
    {
        $sql = "SELECT * FROM `wi_modules` WHERE `name`=:mod";

        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':mod', $mod_name, PDO::PARAM_STR);
        $query->execute();

        while($res = $query->fetch(PDO::PARAM_STR))
        {
         echo '<div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-3 col-sm-2">
                 <img class="img-responsive cp" id="Pic" src="WIMedia/Img/'. $res['img'] . '" style="width:120px; height:120px;">
                    <button class="btn mediaPic" onclick="WIMedia.changePic()">Change Picture</button>
                                
                            </div>
                        </div>

                      
                </div>';
        }

    }


     public function MainHeader()
    {
        $sql = "SELECT * FROM `wi_header`";
        $query = $this->WIdb->prepare($sql);
        $query->execute();

        while($res = $query->fetch(PDO::PARAM_STR))
        {
        //  echo ' <header class="header">
        //         <div class="container">
        //             <div class="row">
        //                 <div class="col-lg-3 col-md-3 col-sm-2">
        //                     <div class="navbar_brand">
        //          <img class="img-responsive cp" id="headerPic" src="WIMedia/Img/header/'. $res['logo'] . '" style="width:120px; height:120px;">
        //             <button class="btn mediaPic" onclick="WIMedia.changePic()">Change Picture</button>
                                
        //                     </div>
        //                 </div>

        //         </div> 
        // </header>';

        echo '<header class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                             <div class="navbar_brand">
                 <img class="img-responsive cp" id="headerPic" src="WIMedia/Img/header/'. $res['logo'] . '" style="width:120px; height:120px;">
                    <button class="btn mediaPic" onclick="WIMedia.changePic()">Change Picture</button>
                                
                            </div>
                        </div>

                        <!-- start of header-->
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div class="col-ms"> 
                        <div class="zapfino"><h2><b><input type="text" id="content" value="' . $res['header_content'] . '"></b></h2>
                        <span class="slogan"><input type="text" id="slogan" placeholder="Slogan" value="' . $res['header_slogan'] . '"></span>
                        </div>
                        </div><!-- end col-ms-->
                         <!--end opf header-->
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div class="controls col-lg-12 col-sm-12 col-md-12 col-xs-12"> 
                          <button class="btn" id="btn-search"><input type="text" id="button" value="' . $res['button'] . '"></button>
                        </div><!-- end col-ms-->
                         <!--end opf header-->
                        </div>

                </div> 
                </div>
        </header>';
    	}

    }

    public function Favicon()
    {
        $sql = "SELECT * FROM `wi_site`";
        $icon = "favicon";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':icon', $icon, PDO::PARAM_STR);
        $query->execute();

        while($res = $query->fetch(PDO::PARAM_STR))
        {
         echo '<div class="container">
                    <div class="row">
                    <img class="img-responsive cp" id="faviconPic" src="WIMedia/Img/favicon/'. $res['favicon'] . '" style="width:120px; height:120px;">
                    <button class="btn mediaPic" onclick="WIMedia.changefaviconPic()">Change Picture</button>
                        </div>

                            <div class="col-lg-9 col-md-9 col-sm-8">
                       <div id="message"></div>
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="favicon_settings" onclick="WIMedia.savefaviconPic()" class="btn btn-success">Save</button> 
                        </div>

                      <div class="results" id="results"></div>
                        </div>

                        </div>
';
        }

    }


        public function footer()
    {

        $date = date("Y");
        $http = str_replace("www.", "", $_SERVER['HTTP_HOST']);
        $query = $this->WIdb->prepare('SELECT * FROM `wi_footer`');
        $query->execute();

        while($res = $query->fetch(PDO::PARAM_STR))
        {
            echo '<footer class="footer">
            <section class="footer_bottom container-fluid text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xl-12">
                        <p class="copyright"><?php echo WILang::get("copyright");?> &copy; ' . $date . ' ' . $res['website_name'] . '-  All rights reserved.</p>
                    </div>
                    
                </div>
            </div>
        </section>
        </footer>
        <!--End Footer-->';
        }
    }

           public function edit_footer()
    {

        $date = date("Y");
        $http = str_replace("www.", "", $_SERVER['HTTP_HOST']);
        $query = $this->WIdb->prepare('SELECT * FROM `wi_footer`');
        $query->execute();

        while($res = $query->fetch(PDO::PARAM_STR))
        {
            echo '<footer class="footer">
            <section class="footer_bottom container-fluid text-center">
            <div class="container">
                <div class="row">
                
                    <div class="col-md-12 col-md-12 col-sm-12 col-lg-12 col-xs-12">
                        <p class="copyright"><?php echo WILang::get("copyright");?> &copy; ' . $date . ' ' . $res['website_name'] . '-  All rights reserved.</p>
                    </div>

                </div>
            </div>
        </section>
        </footer>
        <!--End Footer-->';
        }
    }

    public function headerSettings($settings)
    {
        $header = $settings['UserData']; 
        $header_id = 1;


        $sql = "UPDATE `wi_header` SET logo =:logo, header_content=:content, header_slogan=:slogan, button=:button  WHERE  `header_id` =:header_id";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':logo', $header['upload_pic'], PDO::PARAM_STR);
        $query->bindParam(':header_id', $header_id, PDO::PARAM_INT);
        $query->bindParam(':content', $header['header_content'], PDO::PARAM_INT);
        $query->bindParam(':slogan', $header['header_slogan'], PDO::PARAM_);
        $query->bindParam(':button', $header['button'], PDO::PARAM_INT);
        $query->execute();

        $result = "complete";
        echo json_encode($result);
    }


        public function FooterSettings($settings)
    {
        $footer = $settings['UserData']; 
        $footer_id = 1;
        echo $footer_id;


        $sql = "UPDATE `wi_footer` SET  website_name =:footer_content WHERE  `footer_id` =:footer_id";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':footer_content', $footer['website_name'], PDO::PARAM_STR);
        $query->bindParam(':footer_id', $footer_id, PDO::PARAM_INT);
        $query->execute();


        $result = "complete";
        echo json_encode($result);
    }

    public function top_head()
    {
                $sql = "SELECT * FROM `wi_header`";
        $query = $this->WIdb->prepare($sql);
        $query->execute();

        while($res = $query->fetch(PDO::PARAM_STR))
        {
      echo '  <div class="top_head">
                <div class="col-lg-4 col-md-6 col-sm-4">
                <div class="logo">
                <a href="#"><img alt="WICMS"  class="img-responsive" src="WIMedia/Img/header/' . WIWebsite::webSite_essentials('logo')  . '" style="width:120px; height:120px;"></a>
                </div>
                </div>
                </div>';
            }
    }

    public function header_upload($settings)
    {
        $_FILES = $settings['UserData']; 
        $whitelist = array('jpg', 'jpeg', 'png', 'gif');
        $name      = null;
        $error     = 'No file uploaded.';


                $tmp_name = $_FILES['file']['tmp_name'];
                $name     = "../../WIMedia/Img/header/" . basename($_FILES['file']['name']);
                $error    = $_FILES['file']['error'];
                
                
                if ($error === UPLOAD_ERR_OK) {
                    $extension = pathinfo($name, PATHINFO_EXTENSION);

                    if (!in_array($extension, $whitelist)) {
                        $error = 'Invalid file type uploaded.';
                    } else {
                        move_uploaded_file($tmp_name, $name);
                        //echo $name;
                    }
                }

        echo json_encode(array(
            'name'  => $location/$name,
            'error' => $error,
        ));
        die();
    }


        public function ViewThemes()
    {
        $sql = "SELECT * FROM `wi_theme`";
        $query = $this->WIdb->prepare($sql);
        $query->execute();
            echo '<ul class="meta">';
    
        while($result = $query->fetch(PDO::FETCH_ASSOC)){
           // print_r($result);
            echo ' <li class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
             
                            <div class="controls col-sm-3 col-md-3 col-lg-3 col-xs-3">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">' . $result['theme'].'</div>
                            </div>


                            <div class="btn-group" id="WITheme_settings-' . $result['id'] . '" data-toggle="buttons-radio">
                        <input type="hidden" name="theme" id="WITheme-' . $result['id'] . '" class="btn-group-value" value="' . $result['in_use'].'"/>
                        <button type="button" id="theme_true-' . $result['id'] . '" name="theme" value="true" onclick="WITheme.activate(' . $result['id'] . ')"  class="btn">In Use</button>
                        <button type="button" id="theme_false-' . $result['id'] . '" name="theme" value="false" class="btn btn-danger activewhens" >Not In Use</button>
                    </div>

                    
                                <div class="col-sm-1 col-md-1 col-lg-1 col-xs-2"><a href="#" onclick="WITheme.showMetaModal(' . $result['id'].')">Edit</a></div>

                                <div class="col-sm-1 col-md-1 col-lg-1 col-xs-1"><a href="#" class="glyphicon glyphicon-trash" onclick="WITheme.DeleteMetaModal(' . $result['id'].')"></a></div>
                            
                            </li><script type="text/javascript">
  
                       var secure = $("#WITheme-' . $result['id'] . '").attr("value");
                       if (secure === "0"){

                       $("#theme_true-' . $result['id'] . '").removeClass("btn-success active");
                        $("#theme_false-' . $result['id'] . '").addClass("btn-danger active");

                       }else if (secure === "1"){

                        $("#theme_false-' . $result['id'] . '").removeClass("btn-danger active");
                        $("#theme_true-' . $result['id'] . '").addClass("btn-success active");
                       }
                        </script>';
        }
        echo '</ul>';
        
    }


    public function activateThemes($id)
    {
        $in_use = "1";
        $sql = "SELECT * FROM `wi_theme` WHERE `in_use`=:in_use";

        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':in_use', $in_use, PDO::PARAM_INT);
        $query->execute();

        $result = $query->fetch(PDO::FETCH_ASSOC);
        $currentActiveTheme = $result['id'];

        $sql1 = "UPDATE `wi_theme` SET  `in_use` = '1' WHERE  `id` =:id"; 
        $query1 = $this->WIdb->prepare($sql1);
        $query1->bindParam(':id', $id, PDO::PARAM_INT);
        $query1->execute();

        $sql2 = "UPDATE `wi_theme` SET  `in_use` =  '0' WHERE  `id` =:current_id";
        $query2 = $this->WIdb->prepare($sql2);
        $query2->bindParam(':current_id', $currentActiveTheme, PDO::PARAM_INT);
        $query2->execute();

        $result = "success";
        echo json_encode($result);
    }


    public function ViewMeta($page)
    {
        $sql = "SELECT * FROM `wi_meta` WHERE `page`=:page";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':page', $page, PDO::PARAM_STR);
        $query->execute();
            echo '<ul class="meta">';
    
        while($result = $query->fetch(PDO::FETCH_ASSOC)){
           // print_r($result);
            echo ' <li class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
             
                            <div class="controls col-sm-3 col-md-3 col-lg-3 col-xs-3">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">' . $result['name'].'</div>
                            </div>
                    

                            
                            <div class="controls col-sm-4 col-md-4 col-lg-4 col-xs-4">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">' . $result['content'].' </div>
                                
                            </div>

                            
                            <div class="controls col-sm-3 col-md-3 col-lg-3 col-xs-3">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">' . $result['author'].'</div>
                            </div>
                                <div class="col-sm-1 col-md-1 col-lg-1 col-xs-2"><a href="#" onclick="WIMeta.showMetaModal(' . $result['meta_id'].')">Edit</a></div>

                                <div class="col-sm-1 col-md-1 col-lg-1 col-xs-1"><a href="#" class="glyphicon glyphicon-trash" onclick="WIMeta.DeleteMetaModal(' . $result['meta_id'].')"></a></div>
                            
                            </li>';
        }
        echo '<ul>';
    }

     public function ViewEditMeta($id)
    {
        $sql = "SELECT * FROM `wi_meta` WHERE `meta_id`=:id";

        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        while($result = $query->fetch(PDO::FETCH_ASSOC)){
        echo '<div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WIMeta.Close()" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-meta">
                    ' .WILang::get('edit_meta') . '
                  </h4>
                </div>
                <div class="meta_id" id="'. $result['meta_id'] .'"></div>
                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="edit-meta-form">


                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="meta_name">
                          '. WILang::get('meta_name').'
                        </label>
                        <div class="controls col-lg-9">
                          <input id="meta_name" name="meta_name" type="text" class="input-xlarge form-control" placeholder="'. $result['name'] .'" value="'. $result['name'] .'">
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="meta_content">
                          '.WILang::get('meta_content').'
                        </label>
                        <div class="controls col-lg-9">
                          <input id="meta_content" name="meta_content" type="text" class="input-xlarge form-control" placeholder="'. $result['content'] .'" value="'. $result['content'] .'">
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="author">
                          '. WILang::get('meta_author').'
                        </label>
                        <div class="controls col-lg-9">
                          <input id="auth" name="author" type="text" class="input-xlarge form-control" placeholder="'. $result['author'] .'" value="'. $result['author'] .'">
                        </div>
                      </div>

                     
                  </form>
                </div>
                <div align="center" class="ajax-loading hide"><img src="WIMedia/Img/ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WIMeta.Close()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      '. WILang::get('cancel').'
                    </a>
                    <a href="javascript:void(0);"  id="btn-edit-meta" class="btn btn-primary">
                      '.WILang::get('add').'
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->';
        }

    }

    public function updateMenu($settings)
    {
        $menu = $settings['UserData']; 


        $this->WIdb->insert('wi_menu', array(
            "label"     => $menu['menu_name'],
            "link"  => $menu['menu_link']. '.php',
        )); 

        $result = "complete";
        echo json_encode($result);
    }


    public function EditMeta($id, $name, $content, $auth)
    {
        $sql = "UPDATE `wi_meta` SET `name`=:name, `content`=:content, `author`=:auth WHERE `meta_id` =:id";

        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':name',  $name, PDO::PARAM_STR);
        $query->bindParam(':content',  $content, PDO::PARAM_STR);
        $query->bindParam(':auth',  $auth, PDO::PARAM_STR);
        $query->bindParam(':id',  $id, PDO::PARAM_INT);
        $query->execute();

        echo "Successfully updated meta";

    }

    public function DeleteMeta($id)
    {
        $sql = "DELETE FROM `wi_meta` WHERE `meta_id` =:id";

        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        $result = "complete";
        echo json_encode($result);

    }


        public function ViewCSS($page)
    {
        $sql = "SELECT * FROM `wi_css` WHERE `page`=:page";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':page', $page, PDO::PARAM_STR);
        $query->execute();
        while($result = $query->fetch(PDO::FETCH_ASSOC)){
            echo ' <div class="col-sm-12 col-md-12 col-lg-12">
             
                            <div class="controls col-sm-6 col-md-6 col-lg-6 col-xs-6">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">' . $result['href'].'</div>
                            </div>
                    

                        
                            <div class="controls col-sm-2 col-md-2 col-lg-2">
                                <div class="col-sm-2 col-md-2 col-lg-2">' . $result['rel'].' </div>
                                
                            </div>

                                <div class="col-sm-1 col-md-1 col-lg-1"><a href="#" onclick="WICSS.showCssModal(' . $result['id'].')">Edit</a></div>

                                <div class="col-sm-1 col-md-1 col-lg-1 glyphicon glyphicon-trash"><a href="#" onclick="WICSS.CssDelete(' . $result['id'].')">Delete</a></div>
                            </div>';
        }
    }

     public function ViewEditCSS($id)
    {
        $sql = "SELECT * FROM `wi_css` WHERE id=:id";

        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        while($result = $query->fetch(PDO::FETCH_ASSOC)){
        echo '<div class="modal-dialog">
              <div class="modal-content">
              <div class="meta_id" id="'. $result['id'] .'"></div>
                <div class="modal-header">
                  <button type="button" class="close" onclick="WICSS.Close()" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-meta">
                    ' .WILang::get('edit_css') . '
                  </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="edit-css-form">


                      <div class="form-group">
                        <label class="control-label col-lg-3" for="href">
                          '. WILang::get('href').'
                        </label>
                        <div class="controls col-lg-9">
                          <input id="css_href" name="css_href" type="text" class="input-xlarge form-control" value="'.$result['href'].'">
                        </div>
                      </div>

                  </form>
                </div>
                <div align="center" class="ajax-loading hide"><img src="WIMedia/Img/ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WICSS.Close()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      '. WILang::get('cancel').'
                    </a>
                    <a href="javascript:void(0);"  id="btn-edit-css" onclick="WICSS.edditCssModal('.$result['id'].')" class="btn btn-primary">
                      '.WILang::get('add').'
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->';
        }
    }

        public function EditCss($id, $css)
    {

        $sql = "UPDATE `wi_css` SET `href`=:css WHERE `id` =:id";

        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':css',  $css, PDO::PARAM_STR);
        $query->bindParam(':id',  $id, PDO::PARAM_INT);
        $query->execute();

        echo "Successfully updated css";

    }

    public function DeleteCss($id)
    {
        $sql = "DELETE FROM `wi_css` WHERE `id` =:id";

        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        $result = "complete";
        echo json_encode($result);
    }

        public function ViewJS($page)
    {
        $sql = "SELECT * FROM `wi_scripts` WHERE `page`=:page";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':page', $page, PDO::PARAM_STR);
        $query->execute();
        echo '<ul class="viewjs">';
        while($result = $query->fetch(PDO::FETCH_ASSOC)){
            echo '<div class="col-sm-12 col-md-12 col-lg-12">
             <label class="col-sm-1 col-md-1 col-lg-1" for="Src">Src:<span class="required">*</span></label>
                            <div class="controls col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">' . $result['src'].'</div>
                            </div>
                    
                                <div class="col-sm-1 col-md-1 col-lg-1"><a href="#" onclick="WIJS.showJsModal(' . $result['id'].')">Edit</a></div>

                                <div class="col-sm-1 col-md-1 col-lg-1 glyphicon glyphicon-trash"><a href="#" onclick="WIJS.JsDelete(' . $result['id'].')">Delete</a></div>
                            </div>';
        }
    }

        public function ViewEditJs($id)
    {
        $sql = "SELECT * FROM `wi_scripts` WHERE `id`=:id";

        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        while($result = $query->fetch(PDO::FETCH_ASSOC)){
        echo '<div class="modal-dialog">
              <div class="modal-content">
              <div class="js_id" id="'. $result['id'] .'"></div>
                <div class="modal-header">
                  <button type="button" class="close" onclick="WIJS.Close()" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-js">
                    ' .WILang::get('edit_js') . '
                  </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="edit-js-form">


                      <div class="form-group">
                        <label class="control-label col-lg-3" for="href">
                          '. WILang::get('href').'
                        </label>
                        <div class="controls col-lg-9">
                          <input id="js_href" name="js_href" type="text" class="input-xlarge form-control" value="'.$result['src'].'">
                        </div>
                      </div>

                  </form>
                </div>
                <div align="center" class="ajax-loading hide"><img src="WIMedia/Img/ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WIJS.Close()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      '. WILang::get('cancel').'
                    </a>
                    <a href="javascript:void(0);"  id="btn-edit-css" onclick="WIJS.edditJsModal('.$result['id'].')" class="btn btn-primary">
                      '.WILang::get('add').'
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->';
        }
    }

        public function EditJs($id, $js)
    {

        $sql = "UPDATE `wi_scripts` SET `src`=:js WHERE `id` =:id";

        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':js',  $js, PDO::PARAM_STR);
        $query->bindParam(':id',  $id, PDO::PARAM_INT);
        $query->execute();

        echo "Successfully updated css";

    }

    public function DeleteJs($id)
    {
        $sql = "DELETE FROM `wi_scripts` WHERE `id` =:id";

        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        $result = "complete";
        echo json_encode($result);
    }


    public function NewPage($name)
    {


        
    }

    public function viewLang()
    {
      
        $sql = "SELECT * FROM `wi_lang`";
        $query = $this->WIdb->prepare($sql);
        $query->execute();

        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($res as $key => $value) {
             echo ' <div class="col-sm-12 col-md-12 col-lg-12">
             <label class="col-sm-1 col-md-1 col-lg-1" for="language">Language:<span class="required">*</span></label>
                            <div class="controls col-sm-2 col-md-2 col-lg-2">
                                <div class="col-sm-4 col-md-4 col-lg-4">' . $value['lang'].'</div>
                            </div>
                    
                                <div class="col-sm-1 col-md-1 col-lg-1"><a href="#" onclick="WILang.editLang(' . $value['id'].')">Edit</a></div>
                            </div>';
        }
    }

    public function viewTrans()
    {
             if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
        $page_number = 1; //if there's no page number, set it to 1
    }

        $item_per_page = 15;

        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_trans`");
        $rows = count($result);
        //echo $rows;
        //break records into pages
        $total_pages = ceil($rows/$item_per_page);
        
        //get starting position to fetch the records
        $page_position = (($page_number-1) * $item_per_page);
        $sql1 = "SELECT * FROM `wi_trans` ORDER BY `id` ASC LIMIT :page, :item_per_page";
        $query1 = $this->WIdb->prepare($sql1);
        $query1->bindParam(':page', $page_position, PDO::PARAM_INT);
        $query1->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);
        $query1->execute();
        echo '<div class="col-sm-12 col-md-12 col-lg-12">
             <label class="col-sm-2 col-md-2 col-lg-2 col-xs-2" for="language">Language:<span class="required">*</span></label>
             <label class="col-sm-4 col-md-4 col-lg-4 col-xs-4" for="Keyword">Keyword:<span class="required">*</span></label>
              <label class="col-sm-4 col-md-4 col-lg-4 col-xs-4" for="Translation">Translation:<span class="required">*</span></label>
             </div>';
         echo '<ul class="contents">';
        while($res = $query1->fetch(PDO::FETCH_ASSOC)) //bind variables to prepare statment
       {
        echo '<li>';

                     echo '<div class="col-sm-12 col-md-12 col-lg-12">
                      <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
                                <div class="col-sm-4 col-md-4 col-lg-4 col-xs-4">' . $res['lang'].'</div>
                            </div>

                                         
                            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-4">
                                <div class="col-sm-4 col-md-4 col-lg-4 col-xs-4">' . $res['keyword'].'</div>
                            </div>

                                        
                            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-4">
                                <div class="col-sm-4 col-md-4 col-lg-4">' . $res['translation'].'</div>
                            </div>
                    
                                <div class="col-sm-1 col-md-1 col-lg-1"><a href="#" class="glyphicon glyphicon-edit" name="edit" onclick="WILang.editLang(' . $res['id'].')"></a></div>

                                 <div class="col-sm-1 col-md-1 col-lg-1"><a href="#" class="glyphicon glyphicon-trash" onclick="WILang.JsDelete(' . $res['id'].')"></a></div>
                            </div>';
        echo '</li>';
    }
    echo '</ul>';
    // echo "per page" . $item_per_page;
    // echo " page no" . $page_number;
    // echo " rows" . $rows;
    // echo " total page" . $total_pages;
    $Pagin = $this->Page->Pagination($item_per_page, $page_number, $rows, $total_pages);
    //print_r($Pagination);


         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagin;
    echo '</div>';
       
    }



            public function Styling()
    {

         $query = $this->WIdb->prepare('SELECT * FROM `wi_css`');
        $query->execute();

        while($res = $query->fetch(PDO::FETCH_ASSOC))
        {
        echo '<link href="../' . $res['href'] . '" rel="' . $res['rel'] . '">';
        }
    }

    public function Scripts()
    {
                 $query = $this->WIdb->prepare('SELECT * FROM `wi_scripts`');
        $query->execute();

        while($res = $query->fetch(PDO::FETCH_ASSOC))
        {
        echo ' <script src="../' . $res['src'] . '" type="text/javascript"></script>';
        }
    }


     public function getLangInfo($id)
    {

        $sql = "SELECT * FROM `wi_lang` WHERE `id`=:id";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        while($res = $query->fetch(PDO::FETCH_ASSOC) ){

            echo ' <div class="col-sm-2 col-md-2 col-lg-2">
            <div class="editmlang" id="' . $res['id']. '"></div>
            <a href="#" onclick="WILang.editPic()">
                 <img src="WIMedia/Img/lang/' . $res['lang_flag'] . '" class="editFlag" alt="' . $res['name'] .'" title="' . $res['name'] .'"
                      class="" />Edit</a>
             </div>

             <label class="control-label col-lg-3" for="lang">
                    ' . WILang::get('country') . '
                        </label>
                        <div class="controls col-lg-9">
                          <input id="country_name" name="country_name" type="text" class="input-xlarge form-control" placeholder="' . $res['name'] .'" >

                          <label class="control-label col-lg-3" for="lang">
                    ' . WILang::get('country_code') . '
                        </label>
                        <div class="controls col-lg-9">
                          <input id="country_code" name="country_code" type="text" class="input-xlarge form-control" placeholder="' . $res['lang'] .'" >';

        }

         echo '</div>
                    </div><!-- end col-lg-6 col-md-6 col-sm-6-->';
    }


        public function langDisplay()
    {
        echo '<form method="post" action="" enctype="multipart/form-data">
     <img alt="" id="uploadImg" class="logo" src="WIMedia/Img/placeholder.jpg">
     <input type="file" name="file" id="wiupload" />
    </form> ';
    }

     public function saveeditLang($name, $code, $flag, $id)
    {

        $sql ="UPDATE  `wi_lang` SET  `lang` = 'code', `name` =:name WHERE  `wi_lang`.`id`=:id";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->bindParam(':name', $name, PDO::PARAM_STR);


         $this->WIdb->insert(' wi_lang', array(
            "name"     => $name,
            "lang" => $code,
            "lang_flag" => $flag,
            "href"  => "?lang=" . $code

        )); 

         $msg = "Succesfully added new Language";
             $result = array(
                "status" => "success",
                "msg"    => $msg
            );
            
            echo json_encode($result);
    }


    public function saveLang($name, $code, $flag)
    {
        echo $name;
        echo $code;
        echo $flag;

         $this->WIdb->insert(' wi_lang', array(
            "name"     => $name,
            "lang" => $code,
            "lang_flag" => $flag,
            "href"  => "?lang=" . $code

        )); 

         $msg = "Succesfully added new Language";
             $result = array(
                "status" => "success",
                "msg"    => $msg
            );
            
            echo json_encode($result);
    }

    public function CheckMultiLang()
    {
        $user_id = "1";
        $sql = "SELECT * FROM `wi_site` WHERE `id`=:user_id";

        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $query->execute();

        $res = $query->fetch();

        $multi = $res['multi_lang'];
        echo $multi;
        return $multi;


    }

    public function EditModLang($code, $keyword, $trans, $mod_name)
    {

        $result = $this->WIdb->select("SELECT * FROM `wi_trans` WHERE `lang` =:lang AND `keyword`=:keyword AND `translation`=:trans", 
            array(
            "lang" => $code,
            "keyword" => $keyword,
            "trans"  => $trans
            )
        );

        if( count($result) > 0){

            $sql1 = "UPDATE  `wi_modules` SET  `trans` =:trans WHERE  `name` =:mod_name";
                $query1 = $this->WIdb->prepare($sql1);

                $query1->bindParam(':trans', $keyword, PDO::PARAM_STR);
                $query1->bindParam(':mod_name', $mod_name, PDO::PARAM_STR);

                $query1->execute();

                $sql2 = "SELECT * FROM `wi_trans` WHERE `keyword`=:keyword";
                $query2 = $this->WIdb->prepare($sql2);
                $query2->bindParam(':keyword', $keyword, PDO::PARAM_STR);
                $query2->execute();

                $res = $query2->fetch(PDO::FETCH_ASSOC);
                $translation = $res['translation'];

                $msg = "Updated System, trans already Existed";
             $result = array(
                "status" => "success",
                "msg"    => $msg,
                "trans" => $translation
            );
            
            echo json_encode($result);
        }else{

                $sql = "INSERT INTO `wi_trans` (`lang`, `keyword`, `translation`) VALUES ( :lang, :keyword, :trans)";

                $query = $this->WIdb->prepare($sql);
                $query->bindParam(':lang', $code, PDO::PARAM_STR);
                $query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
                $query->bindParam(':trans', $trans, PDO::PARAM_STR);

                $query->execute();

                $sql1 = "UPDATE  `wi_modules` SET  `trans` =:trans WHERE  `name` =:mod_name";
                $query1 = $this->WIdb->prepare($sql1);

                $query1->bindParam(':trans', $keyword, PDO::PARAM_STR);
                $query1->bindParam(':mod_name', $mod_name, PDO::PARAM_STR);

                $query1->execute();

                $sql2 = "SELECT * FROM `wi_trans` WHERE `keyword`=:keyword";
                $query2 = $this->WIdb->prepare($sql2);
                $query2->bindParam(':keyword', $keyword, PDO::PARAM_STR);
                $query2->execute();

                $res = $query2->fetch(PDO::FETCH_ASSOC);
                $translation = $res['translation'];

                $msg = "Succesfully added new Language";
             $result = array(
                "status" => "success",
                "msg"    => $msg,
                "trans" => $translation
            );
            
            echo json_encode($result);
    }
}

    public function EditModLangPara($code, $keyword, $trans, $mod_name)
    {

        $result = $this->WIdb->select("SELECT * FROM `wi_trans` WHERE `lang` =:lang AND `keyword`=:keyword AND `translation`=:trans", 
            array(
            "lang" => $code,
            "keyword" => $keyword,
            "trans"  => $trans
            )
        );

        if( count($result) > 0){

            $sql1 = "UPDATE  `wi_modules` SET  `trans1` =:trans WHERE  `name` =:mod_name";
                $query1 = $this->WIdb->prepare($sql1);

                $query1->bindParam(':trans', $trans, PDO::PARAM_STR);
                $query1->bindParam(':mod_name', $mod_name, PDO::PARAM_STR);

                $query1->execute();

                $sql2 = "SELECT * FROM `wi_trans` WHERE `keyword`=:keyword";
                $query2 = $this->WIdb->prepare($sql2);
                $query2->bindParam(':keyword', $keyword, PDO::PARAM_STR);
                $query2->execute();

                $res = $query2->fetch(PDO::FETCH_ASSOC);
                $translation = $res['translation'];

                $msg = "Updated System, trans already Existed";
             $result = array(
                "status" => "success",
                "msg"    => $msg,
                "trans" => $translation
            );
            
            echo json_encode($result);
        }else{

                $sql = "INSERT INTO `wi_trans` (`lang`, `keyword`, `translation`) VALUES ( :lang, :keyword, :trans)";

                $query = $this->WIdb->prepare($sql);
                $query->bindParam(':lang', $code, PDO::PARAM_STR);
                $query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
                $query->bindParam(':trans', $trans, PDO::PARAM_STR);

                $query->execute();

                $sql1 = "UPDATE  `wi_modules` SET  `trans1` =:trans WHERE  `name` =:mod_name";
                $query1 = $this->WIdb->prepare($sql1);

                $query1->bindParam(':trans', $keyword, PDO::PARAM_STR);
                $query1->bindParam(':mod_name', $mod_name, PDO::PARAM_STR);

                $query1->execute();

                $sql2 = "SELECT * FROM `wi_trans` WHERE `keyword`=:keyword";
                $query2 = $this->WIdb->prepare($sql2);
                $query2->bindParam(':keyword', $keyword, PDO::PARAM_STR);
                $query2->execute();

                $res = $query2->fetch(PDO::FETCH_ASSOC);
                $translation = $res['translation'];

                $msg = "Succesfully added new Language";
             $result = array(
                "status" => "success",
                "msg"    => $msg,
                "trans" => $translation
            );
            
            echo json_encode($result);
    }
}
    


}