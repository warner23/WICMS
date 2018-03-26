<?php
/**
* Install Plugin Class
* Created by Warner Infinity
* Author Jules Warner
*/

class WIInstall
{
	function __construct() 
	{
       $this->WIdb = WIdb::getInstance();
       $this->System = new WISystem();
    }

    public function pluginCheck($plug)
    {
      $sql = "SELECT * FROM `wi_plugin` WHERE `plugin`=:label";

      $query = $this->WIdb->prepare($sql);
      $query->bindParam(':label', $plug, PDO::PARAM_STR);
      $query->execute();

      $result = $query->fetch();
      //print_r($result);
      if( count($result) > 1){
        return "1";
      }else{
        return "0";
      }
    }

    public function sidebarCheck($configs, $plug)
    {
      $label = $configs['sidebar_name'];
      $sql = "SELECT * FROM `wi_sidebar` WHERE `label`=:label";

      $query = $this->WIdb->prepare($sql);
      $query->bindParam(':label', $label, PDO::PARAM_STR);
      $query->execute();

      $result = $query->fetch();

      if( count($result) > 1){
        return "1";
      }else{
        return "0";
      }
    }

        public function menuCheck($configs, $plug)
        {    
          $label = $configs['sidebar_name'];
         $sql = "SELECT * FROM `wi_menu` WHERE `label`=:label";

      $query = $this->WIdb->prepare($sql);
      $query->bindParam(':label', $label, PDO::PARAM_STR);
      $query->execute();

      $result = $query->fetch();

      if( count($result) > 1){
        return "1";
      }else{
        return "0";
      }
    }

        public function CssCheck($configs, $plug)
    {
      $label = $configs['sidebar_name'];
      $sql = "SELECT * FROM `wi_css` WHERE `page`=:label";

      $query = $this->WIdb->prepare($sql);
      $query->bindParam(':label', $label, PDO::PARAM_STR);
      $query->execute();

      $result = $query->fetch();
      //print_r($result);
      if( count($result) > 1){
        return "1";
      }else{
        return "0";
      }
    }

    public function JsCheck($configs, $plug)
    {
      $label = $configs['sidebar_name'];
      $sql = "SELECT * FROM `wi_scripts` WHERE `page`=:label";

      $query = $this->WIdb->prepare($sql);
      $query->bindParam(':label', $label, PDO::PARAM_STR);
      $query->execute();

      $result = $query->fetch();
      //print_r($result);
      if( count($result) > 1){
        return "1";
      }else{
        return "0";
      }
    }

    public function MetaCheck($configs, $plug)
    {
      $label = $configs['sidebar_name'];
      $sql = "SELECT * FROM `wi_meta` WHERE `page`=:label";

      $query = $this->WIdb->prepare($sql);
      $query->bindParam(':label', $label, PDO::PARAM_STR);
      $query->execute();

      $result = $query->fetch();
      //print_r($result);
      if( count($result) > 1){
        return "1";
      }else{
        return "0";
      }
    }

        public function pageCheck($configs, $plug)
    {
      $label = $configs['sidebar_name'];
      $sql = "SELECT * FROM `wi_page` WHERE `name`=:label";

      $query = $this->WIdb->prepare($sql);
      $query->bindParam(':label', $label, PDO::PARAM_STR);
      $query->execute();

      $result = $query->fetch();
      //print_r($result);
      if( count($result) > 1){
        return "1";
      }else{
        return "0";
      }
    }

    public function AddPlugin($configs, $plug)
    {

      $pluginCheck = self::pluginCheck($plug);
      //echo "plug". $pluginCheck;
      if ($pluginCheck === "0") {
        
              $activated = "false";
        //echo "plugin" .$plug;
        // add plugin into db plugin
        $this->WIdb->insert('wi_plugin', array(
            "plugin"     => $plug,
            "activated"  => $activated
           
        ));

      }
 

    }

        public function AddtoSideBar($configs, $plug)
    {

      $label = $configs['sidebar_name'];
      $lang  = $configs['lang'];
      $sort  = $configs['sort_no'];
      $img   = $configs['img'];
  $parent_no = $configs['parent_no'];

      //check if sidebar links have been installed or not
      $sidebarCheck = self::sidebarCheck($configs, $plug);
      //echo "side". $sidebarCheck;
      if ($sidebarCheck === "0") {

         //place into sidebar db
        $this->WIdb->insert('wi_sidebar', array(
            "label" => $label,
            "lang"  => $lang,
            "sort"  => $sort,
            "img"   => $img,
            "parent" => $parent_no
           
        )); 
        $sidebarId = $this->WIdb->lastInsertId();
        
      $link  = $configs['link'];

        $this->WIdb->insert('wi_sidebar', array(
            "label"   => $label,
            "parent"  => $sidebarId,
            "link"    => $link,
            "sort"    => $parent_no,
            "lang"    => $lang
           
        )); 


        $link2  = $configs['link2'];
        $lang2  = $configs['lang2'];
        $this->WIdb->insert('wi_sidebar', array(
            "label"   => $label,
            "parent"  => $sidebarId,
            "link"    => $link2,
            "sort"    => "1",
            "lang"    => $lang2
           
        )); 
      }
       
    }

    public function AddToMenu($configs, $plug)
    {
       $menuCheck = self::menuCheck($configs,$plug);
      // echo "menu".$menuCheck;
      if ($menuCheck === "0") {
         //place into menu db
        $lang  = $configs['lang'];
      $label  = $configs['sidebar_name'];

        $this->WIdb->insert('wi_menu', array(
            "label"   => $label,
            "link"    => $plug .'/index.php',
            "lang"    => $lang
           
        )); 
      }
    }

    public function Tables($configs, $plug)
    {
        // install tables
        $sql = "CREATE TABLE IF NOT EXISTS `wi_blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('blog_slider','blog_video','blog_image','blog_audio','NoMedia','blog_youtube') NOT NULL,
  `Category` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `audio` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `href` varchar(255) DEFAULT NULL,
  `user` varchar(255) NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `post` varchar(255) NOT NULL,
  `button_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;




CREATE TABLE IF NOT EXISTS `wi_blogcategories` (
  `cat_id` int(100) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,

  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


--
-- Dumping data for table `wi_blogcategories`
--


INSERT INTO `wi_blogcategories` (`title`) VALUES
('cms systems'),

( 'code development');



        ";

        $query = $this->WIdb->prepare($sql);
        $query->execute();
    }

    public function StartUpDb($configs, $plug)
    {
      // add meta
      // add css
      //add scripts
      //add page
      $cssCheck = self::CssCheck($configs, $plug);
      $JsCheck = self::JsCheck($configs, $plug);
      $MetaCheck = self::MetaCheck($configs, $plug);
      $pageCheck = self::pageCheck($configs, $plug);
      if ($cssCheck === "0") {
        
        $css = "INSERT INTO `wi_css` ( `href`, `rel`, `page`) VALUES
      ( 'site/css/frameworks/bootstrap.css', 'stylesheet', 'blog'),
      ( 'site/css/login_panel/css/slide.css', 'stylesheet', 'blog'),
      ( 'site/css/frameworks/menus.css', 'stylesheet', 'blog'),
      ( 'site/css/style.css', 'stylesheet', 'blog'),
      ( 'site/css/font-awesome.css', 'stylesheet', 'blog'),
      ( 'site/css/vendor/bootstrap.min.css', 'stylesheet', 'blog'),
      ( 'blog/css/style.css', 'stylesheet', 'blog'),
      ( 'blog/css/layout/wide.css', 'stylesheet', 'blog'),
      ( 'blog/css/switcher.css', 'stylesheet', 'blog');";

      $query = $this->WIdb->prepare($css);
        $query->execute();

      }

      if ($JsCheck === "0") {
        $js = "INSERT INTO `wi_scripts` ( `src`, `page`) VALUES
      ( 'site/js/frameworks/JQuery.js', 'blog'),
      ( 'site/js/frameworks/bootstrap.js', 'blog'),
      ( 'site/js/login_panel/js/slide.js', 'blog');
      ";

      $query = $this->WIdb->prepare($js);
        $query->execute();
      }

      if ($MetaCheck === "0") {
        $Meta = "INSERT INTO `wi_meta` ( `page`, `name`, `content`, `author`) VALUES
      ( 'blog', 'viewport', 'width=device-width, initial-scale=1', 'Jules Warner'),
      ( 'blog', 'description', 'Warner-Infinity Content Management System with simplified back end', 'Jules Warner'),
      ( 'blog', 'keywords', 'WI, WICMS, System, UI', 'Jules Warner'),
      ( 'blog', 'author', 'warner-infinity', 'Jules Warner');
      ";
      
      $query = $this->WIdb->prepare($Meta);
        $query->execute();
      }

      if ($pageCheck === "0") {
        $page = "INSERT INTO `wi_page` ( `name`, `panel`, `top_head`, `header`, `left_sidebar`, `right_sidebar`, `contents`, `footer`) VALUES
      ( 'blog', '1', '1', '0', '0', '0', 'blog', '1');
        ";
        $query = $this->WIdb->prepare($page);
        $query->execute();
      }
      
    }

   

    public function TransferFiles($configs, $plug)
    {
            // blog dir
           echo dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) .'/WIPlugin/'. $plug .'/' . $plug.'/' . $plug;
            $source = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) .'/WIPlugin/'. $plug .'/' . $plug.'/' . $plug;
            $dest = dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))))) . '/' . $plug;
            $check = dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))))) . '/'. $plug .'/';

            if(!file_exists($check)){
              $this->System->full_copy($source , $dest);
              // $fil = glob($dest . "/*");
             //  print_r($fil);
            }


            //module dir
            $source1 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) .'/WIPlugin/'. $plug .'/Install/Module/';
            $dest1 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/WIModule/';
            $check1 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/WIModule/'. $plug;

            if(!file_exists($check1)){
              $this->System->full_copy($source1 , $dest1);
              // $fil = glob($dest . "/*");
             //  print_r($fil);
            }
            
           // $fil = glob($dest . "/*");
             //  print_r($fil);

            //blog back end blog page

            $source2 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) .'/WIPlugin/'. $plug .'/blog/' . $plug . '.php';
            $dest2 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/' . $plug . '.php';
            $check2 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/' . $plug . '.php';

            if(!file_exists($check2)){
              $this->System->file_copy($source2 , $dest2);
            }

            //blog back end blog options page

            $source3 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) .'/WIPlugin/'. $plug .'/blog/' . $plug . '_Options.php';
            $dest3 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/' . $plug . '_Options.php';
            $check3 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/' . $plug . '_Options.php';

            if(!file_exists($check3)){
              $this->System->file_copy($source3 , $dest3);
            }


            //blog back end blog incs 
            $source4 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) .'/WIPlugin/'. $plug .'/blog/WIInc/' . $plug;
            $dest4 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/WIInc/site/';
            $check4 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/WIInc/site/';

            if(!file_exists($check4)){
              $this->System->full_copy($source4 , $dest4);
            }

            //blog back end blog inc page 
            $source5 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) .'/WIPlugin/'. $plug .'/blog/WIInc/blog.php';
            $dest5 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/WIInc/';
            $check5 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/WIInc/blog.php';

            if(!file_exists($check5)){
              $this->System->full_copy($source5 , $dest5);
            }

            //blog back end blog inc page 
            $source6 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) .'/WIPlugin/'. $plug .'/blog/WIInc/blog_Options.php';
            $dest6 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/WIInc/';
            $check6 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/WIInc/blog_Options.php';

            if(!file_exists($check6)){
              $this->System->full_copy($source6 , $dest6);
            }
                    

    }

    public function styling($configs, $plug)
    {
            $currentTheme = self::WITheme();

            echo dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))))) . '/WITheme/' . $currentTheme .'/';
            echo dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) .'/WIPlugin/'. $plug . '/Install/Theme/'. $configs['lang'];
            $source = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) .'/WIPlugin/'. $plug . '/Install/Theme/'. $configs['lang'];
            $dest = dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))))) . '/WITheme/' . $currentTheme .'/'. $configs['lang'];

          $check = dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))))) . '/WITheme/' . $currentTheme .'/'. $configs['lang'];

            if(!file_exists($check)){
              $this->System->full_copy($source , $dest);
               $fil = glob($dest . "/*");
               print_r($fil);

            }
               
            
            
          
    }

    public function WITheme()
    {
      $in_use = 1;
      $sql = "SELECT * FROM  `wi_theme` WHERE `in_use`=:in_use";
      $query = $this->WIdb->prepare($sql);
      $query->bindParam(':in_use', $in_use, PDO::PARAM_INT);
      $query->execute();

      $res = $query->fetch();
      $currentTheme = $res['theme'];

      return $currentTheme;
    }


}