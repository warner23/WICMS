<?php


class WIWebsite 
{


	    function __construct() 
    {
         $this->WIdb = WIdb::getInstance();

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

    		echo '<li><a href="' . $res['link'] . '"><i class="fa fa-angle-double-right"></i>' . $res['lang'] . '</a></li>';
    	}

    }

        public function EditAddChildren($id)
    {
        $sql = "SELECT * FROM `wi_sidebar` WHERE `parent` = :id";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        while ($res = $query->fetch()) {
            echo '<li><a href="' . $res['link'] . '"><i class="fa fa-angle-double-right"></i>' . $res['lang'] . '</a></li>';
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
                echo '<h3>' . $res['label'] . '</h3><div>';
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

        while($res = $query1->fetch(PDO::FETCH_ASSOC))
        {    
         echo '<li> <input type="text" id="menu_name"  maxlength="88" name="menu_name" placeholder="menu name" class="input-xlarge form-control" value="' . WILang::get('' .$res['lang'] .'') . '"></li>';
         if($res['parent'] > 0)
         {
            echo '<li><a href="' . $res['link'] . '">' . WILang::get('' .$res['lang'] .'') . '</a></li>';
         }
        }
        echo '</ul>
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
         echo ' <header class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-2">
                            <div class="navbar_brand">
                 <img class="img-responsive cp" id="headerPic" src="WIMedia/Img/header/'. $res['logo'] . '" style="width:120px; height:120px;">
                    <button class="btn mediaPic" onclick="WIMedia.changePic()">Change Picture</button>
                                
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
                <div class="col-md-4 col-md-ol col-sm-4 col-lg-3">
                <a href="alogin.php"><button class="btn">' .WILang::get('admin') . '</button></a>
                <a href="contact_us.php"><button class="btn">' . WILang::get('contact_us'). '</button></a>
                <a href="about_us.php"> <button class="btn">' . WILang::get('about_us'). '</button></a>

                </div>

                    <div class="col-lg-3 col-md-4 col-sm-4">
                        <p class="copyright"><?php echo WILang::get("copyright");?> &copy; ' . $date . ' ' . $res['website_name'] . '-  All rights reserved.</p>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4">
                            <a href="info.php"><button class="btn">' . WILang::get('info'). '</button></a>
                            <a href="privacy_policy.php"><button class="btn">' . WILang::get('privacy'). '</button></a>
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
                <div class="col-md-4 col-md-ol col-sm-4 col-lg-3">
                <input class="btn" value="' .WILang::get('admin') . '">
                <input class="btn" value="' . WILang::get('contact_us'). '">
                 <input class="btn" value="' . WILang::get('about_us'). '">

                </div>

                    <div class="col-lg-3 col-md-4 col-sm-4">
                        <p class="copyright"><?php echo WILang::get("copyright");?> &copy; ' . $date . ' ' . $res['website_name'] . '-  All rights reserved.</p>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4">
                            <input class="btn" value="' . WILang::get('info'). '">
                            <input class="btn" value="' . WILang::get('privacy'). '">
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


        $sql = "UPDATE `wi_header` SET logo =:logo  WHERE  `header_id` =:header_id";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':logo', $header['upload_pic'], PDO::PARAM_STR);
        $query->bindParam(':header_id', $header_id, PDO::PARAM_INT);
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

    public function ViewMeta()
    {
        $sql = "SELECT * FROM `wi_meta`";
        $query = $this->WIdb->prepare($sql);
        $query->execute();
        while($result = $query->fetch(PDO::FETCH_ASSOC)){
            echo ' <div class="col-sm-12 col-md-12 col-lg-12">
             <label class="col-sm-1 col-md-1 col-lg-1" for="Name">Name:<span class="required">*</span></label>
                            <div class="controls col-sm-1 col-md-1 col-lg-1">
                                <div class="col-sm-1 col-md-1 col-lg-1">' . $result['name'].'</div>
                            </div>
                    

                            <label class="col-sm-2 col-md-2 col-lg-2" for="Content">Content:<span class="required">*</span></label>
                            <div class="controls col-sm-2 col-md-2 col-lg-2">
                                <div class="col-sm-3 col-md-3 col-lg-3">' . $result['content'].' </div>
                                
                            </div>

                            <label class="col-sm-1 col-md-1 col-lg-1" for="Author">Author: <span class="required">*</span></label>
                            <div class="controls col-sm-2 col-md-2 col-lg-2">
                                <div class="col-sm-2 col-md-2 col-lg-2">' . $result['author'].'</div>
                            </div>
                                <div class="col-sm-1 col-md-1 col-lg-1"><a href="#" onclick="WIMeta.showMetaModal(' . $result['meta_id'].')">Edit</a></div>
                            </div>';
        }
    }


        public function ViewCSS()
    {
        $sql = "SELECT * FROM `wi_css`";
        $query = $this->WIdb->prepare($sql);
        $query->execute();
        while($result = $query->fetch(PDO::FETCH_ASSOC)){
            echo ' <div class="col-sm-12 col-md-12 col-lg-12">
             <label class="col-sm-1 col-md-1 col-lg-1" for="Href">Href:<span class="required">*</span></label>
                            <div class="controls col-sm-4 col-md-4 col-lg-4">
                                <div class="col-sm-4 col-md-4 col-lg-4">' . $result['href'].'</div>
                            </div>
                    

                            <label class="col-sm-2 col-md-2 col-lg-2" for="Rel">Rel:<span class="required">*</span></label>
                            <div class="controls col-sm-2 col-md-2 col-lg-2">
                                <div class="col-sm-2 col-md-2 col-lg-2">' . $result['rel'].' </div>
                                
                            </div>

                                <div class="col-sm-1 col-md-1 col-lg-1"><a href="#" onclick="WICSS.showCssModal(' . $result['id'].')">Edit</a></div>
                            </div>';
        }
    }

        public function ViewJS()
    {
        $sql = "SELECT * FROM `wi_scripts`";
        $query = $this->WIdb->prepare($sql);
        $query->execute();
        while($result = $query->fetch(PDO::FETCH_ASSOC)){
            echo ' <div class="col-sm-12 col-md-12 col-lg-12">
             <label class="col-sm-1 col-md-1 col-lg-1" for="Src">Src:<span class="required">*</span></label>
                            <div class="controls col-sm-4 col-md-4 col-lg-4">
                                <div class="col-sm-4 col-md-4 col-lg-4">' . $result['src'].'</div>
                            </div>
                    
                                <div class="col-sm-1 col-md-1 col-lg-1"><a href="#" onclick="WIJS.showJsModal(' . $result['id'].')">Edit</a></div>
                            </div>';
        }
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

        //break records into pages
        $total_pages = ceil($rows/$item_per_page);
        
        //get starting position to fetch the records
        $page_position = (($page_number-1) * $item_per_page);

        $sql1 = "SELECT * FROM `wi_trans` ORDER BY `id` ASC LIMIT :page, :item_per_page";
        $query1 = $this->WIdb->prepare($sql1);
        $query1->bindParam(':page', $page_position, PDO::PARAM_INT);
        $query1->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);
        $query1->execute();
         echo '<ul class="contents">';
        while($res = $query1->fetch(PDO::FETCH_ASSOC)) //bind variables to prepared statement
       {
        echo '<li>';
       //echo  '<strong>' .$res['lang'].'</strong><strong>' .$res['keyword'].'</strong> &mdash; '.$res['translation'] ;
                     echo ' <div class="col-sm-12 col-md-12 col-lg-12">
             <label class="col-sm-1 col-md-1 col-lg-1" for="language">Language:<span class="required">*</span></label>
                            <div class="controls col-sm-2 col-md-2 col-lg-2">
                                <div class="col-sm-1 col-md-1 col-lg-1">' . $res['lang'].'</div>
                            </div>

                                         <label class="col-sm-1 col-md-1 col-lg-1" for="Keyword">Keyword:<span class="required">*</span></label>
                            <div class="controls col-sm-2 col-md-2 col-lg-2">
                                <div class="col-sm-2 col-md-2 col-lg-2">' . $res['keyword'].'</div>
                            </div>

                                         <label class="col-sm-1 col-md-1 col-lg-1" for="Translation">Translation:<span class="required">*</span></label>
                            <div class="controls col-sm-2 col-md-2 col-lg-2">
                                <div class="col-sm-4 col-md-4 col-lg-4">' . $res['translation'].'</div>
                            </div>
                    
                                <div class="col-sm-1 col-md-1 col-lg-1"><a href="#" onclick="WILang.editLang(' . $res['id'].')">Edit</a></div>
                            </div>';
        echo '</li>';
    }
    echo '</ul>';
    // echo "per page" . $item_per_page;
    // echo " page no" . $page_number;
    // echo " rows" . $rows;
    // echo " total page" . $total_pages;
    $Pagination = WIWebsite::Pagination($item_per_page, $page_number, $rows, $total_pages);
    //print_r($Pagination);


         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagination;
    echo '</div>';
       
    }


    public function Pagination($item_per_page, $current_page, $total_records, $total_pages)
    {
         $pagination = '';
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
        $pagination .= '<ul class="pagination">';
        
        $right_links    = $current_page + 3; 
        $previous       = $current_page - 3; //previous link 
        $next           = $current_page + 1; //next link
        $first_link     = true; //boolean var to decide our first link
        
        if($current_page > 1){
            $previous_link = ($previous==0)? 1: $previous;
            $pagination .= '<li class="first"><a href="#" data-page="1" title="First">&laquo;</a></li>'; //first link
            $pagination .= '<li><a href="#" data-page="'.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                    if($i > 0){
                        $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>';
                    }
                }   
            $first_link = false; //set first link to false
        }
        
        if($first_link){ //if current active page is first link
            $pagination .= '<li class="first active">'.$current_page.'</li>';
        }elseif($current_page == $total_pages){ //if it's the last active link
            $pagination .= '<li class="last active">'.$current_page.'</li>';
        }else{ //regular current link
            $pagination .= '<li class="active">'.$current_page.'</li>';
        }
                
        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
            if($i<=$total_pages){
                $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page '.$i.'">'.$i.'</a></li>';
            }
        }
        if($current_page < $total_pages){ 
                $next_link = ($i > $total_pages) ? $total_pages : $i;
                $pagination .= '<li><a href="#" data-page="'.$next_link.'" title="Next">&gt;</a></li>'; //next link
                $pagination .= '<li class="last"><a href="#" data-page="'.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
        }
        
        $pagination .= '</ul>'; 
    }
    return $pagination; //return pagination links
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