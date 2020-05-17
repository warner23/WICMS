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
              $Installed = "true";
        //echo "plugin" .$plug;
        // add plugin into db plugin
        $this->WIdb->insert('wi_plugin', array(
            "plugin"     => $plug,
            "activated"  => $activated,
            "Installed"  => $Installed
           
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
        $sql = "
CREATE TABLE IF NOT EXISTS `wi_forum_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(88) NOT NULL,
  `image` varchar(255) NOT NULL,
  `ordered` int(10) NOT NULL,
  `perm` enum('admin','editor','user') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `wi_forum_sections`
--

INSERT INTO `wi_forum_sections` (`id`, `title`, `image`, `ordered`, `perm`) VALUES
(1, 'General Chat', '', 1, 'admin'),
(2, 'Modules', '', 2, 'admin');




CREATE TABLE IF NOT EXISTS `wi_forum_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_author` varchar(24) NOT NULL,
  `post_author_id` int(11) NOT NULL,
  `otid` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` enum('a','b') NOT NULL,
  `view_count` int(11) NOT NULL,
  `replies` int(11) NOT NULL,
  `section_title` varchar(88) NOT NULL,
  `section_id` int(11) NOT NULL,
  `thread_title` varchar(64) NOT NULL,
  `post_body` text NOT NULL,
  `closed` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `wi_user_page_group` ( `mod_type`) VALUES
('Forum');

INSERT INTO `wi_user_group` ( `group`) VALUES
('Forum');

INSERT INTO `wi_user_permissions` ( `role_id`, `group`, `perm_name`, `edit`, `create`, `delete`
( 1, 2, 'Post Topic', '0', '0', '0'),
( 1, 2, 'Post Comment', '0', '1', '1'),

( 2, 2, 'Post Topic', '0', '0', '1'),
( 2, 2, 'Post Comment', '0', '1', '1'),

( 3, 2, 'Post Topic', '0', '0', '1'),
( 3, 2, 'Post Comment','0', '0', '1'),

( 4, 2, 'Post Topic', '1', '1', '1'),
( 4, 2, 'Post Comment','1', '1', '1'),

( 5, 2, 'Post Topic', '1', '1', '1'),
( 5, 2, 'Post Comment','1', '1', '1'),

( 6, 2, 'Post Topic', '1', '1', '1'),
( 6, 2, 'Post Comment','1', '1', '1'),

( 7, 2, 'Post Topic',  '1', '1', '1'),
( 8, 2, 'Post Comment', '1', '1', '1');
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
      ( 'site/css/frameworks/bootstrap.css', 'stylesheet', 'forum'),
      ( 'site/css/login_panel/css/slide.css', 'stylesheet', 'forum'),
      ( 'forum/css/frameworks/menus.css', 'stylesheet', 'forum'),
      ( 'forum/css/style.css', 'stylesheet', 'forum'),
      ( 'site/css/font-awesome.css', 'stylesheet', 'forum'),
      ( 'site/css/vendor/bootstrap.min.css', 'stylesheet', 'forum'),
      ( 'forum/css/style.css', 'stylesheet', 'forum'),
      ( 'forum/css/layout/wide.css', 'stylesheet', 'forum'),
      ( 'forum/css/switcher.css', 'stylesheet', 'forum'),

      ( 'site/css/frameworks/bootstrap.css', 'stylesheet', 'section'),
      ( 'site/css/login_panel/css/slide.css', 'stylesheet', 'section'),
      ( 'forum/css/frameworks/menus.css', 'stylesheet', 'section'),
      ( 'forum/css/style.css', 'stylesheet', 'section'),
      ( 'site/css/font-awesome.css', 'stylesheet', 'section'),
      ( 'site/css/vendor/bootstrap.min.css', 'stylesheet', 'section'),
      ( 'forum/css/style.css', 'stylesheet', 'section'),
      ( 'forum/css/layout/wide.css', 'stylesheet', 'section'),
      ( 'forum/css/switcher.css', 'stylesheet', 'section')";


      $query = $this->WIdb->prepare($css);
        $query->execute();

      }

      if ($JsCheck === "0") {
        $js = "INSERT INTO `wi_scripts` ( `src`, `page`) VALUES
        ( 'site/js/frameworks/JQuery.js', 'forum'),
      ( 'site/js/frameworks/bootstrap.js', 'forum'),
      ( 'site/js/login_panel/js/slide.js', 'forum'),
      ( 'site/js/frameworks/JQuery.js', 'section'),
      ( 'site/js/frameworks/bootstrap.js', 'section'),
      ( 'site/js/login_panel/js/slide.js', 'section')

      ";

      $query = $this->WIdb->prepare($js);
        $query->execute();
      }

      if ($MetaCheck === "0") {
        $Meta = "INSERT INTO `wi_meta` ( `page`, `name`, `content`, `author`) VALUES
      ( 'forum', 'viewport', 'width=device-width, initial-scale=1', 'Jules Warner'),
      ( 'forum', 'description', 'Warner-Infinity Content Management System with simplified back end', 'Jules Warner'),
      ( 'forum', 'keywords', 'WI, WICMS, System, UI', 'Jules Warner'),
      ( 'forum', 'author', 'warner-infinity', 'Jules Warner'),

      ( 'section', 'viewport', 'width=device-width, initial-scale=1', 'Jules Warner'),
      ( 'section', 'description', 'Warner-Infinity Content Management System with simplified back end', 'Jules Warner'),
       ( 'section', 'keywords', 'WI, WICMS, System, UI', 'Jules Warner'),
      ( 'section', 'author', 'warner-infinity', 'Jules Warner')
      
      ";
      
      $query = $this->WIdb->prepare($Meta);
        $query->execute();
      }

      if ($pageCheck === "0") {
        $page = "INSERT INTO `wi_page` ( `name`, `panel`, `top_head`, `header`, `left_sidebar`, `right_sidebar`, `contents`, `footer`) VALUES
      ( 'forum', '1', '1', '0', '0', '0', 'forum', '1'),
      ( 'section', '1', '1', '0', '0', '0', 'section', '1');

      
        ";
        $query = $this->WIdb->prepare($page);
        $query->execute();
      }
      
    }

   

    public function TransferFiles($configs, $plug)
    {
            // forum dir

            $source = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) .'/WIPlugin/'. $plug .'/' . $plug.'/' . $plug;
            $dest = dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))))) . '/' . $plug;
            $check = dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))))) . '/'. $plug .'/';

            if(!file_exists($check)){
                $this->System->full_copy($source , $dest);
                $fil = glob($dest . "/*");
               print_r($fil);
            }

            //modules dir
            $source1 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) .'/WIPlugin/'. $plug .'/Install/Module/';
            $dest1 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/WIModule/';
            $check1 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/WIModule/'. $configs['lang'];

            if(!file_exists($check1)){
              $this->System->full_copy($source1 , $dest1);
             // $fil = glob($dest1 . "/*");
             //print_r($fil);
            }
            
           // $fil = glob($dest . "/*");
             //  print_r($fil);

            //forum back end forum page WIforum

            $source2 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) .'/WIPlugin/'. $plug .'/forum/' . $plug . '.php';
            $dest2 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/' . $plug . '.php';
            $check2 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/' . $plug . '.php';

            if(!file_exists($check2)){
              $this->System->file_copy($source2 , $dest2);
            }

            //forum back end forum options page

            $source3 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) .'/WIPlugin/'. $plug .'/forum/' . $plug . '_Options.php';
            $dest3 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/' . $plug . '_Options.php';
            $check3 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/' . $plug . '_Options.php';

            if(!file_exists($check3)){
              $this->System->file_copy($source3 , $dest3);
            }


            //forum back end forum include files 
            
            $source4 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) .'/WIPlugin/'. $plug .'/forum/WIInc/' . $plug;
            $dest4 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/WIInc/site/' . $plug;
            $check4 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/WIInc/site/' . $plug;

            if(!file_exists($check4)){
              $this->System->full_copy($source4 , $dest4);
                //$fil = glob($dest4 . "/*");
               //print_r($fil);
            }

            //forum back end forum inc page  forum

            $source5 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) .'/WIPlugin/'. $plug .'/forum/WIInc/' .$configs['lang'] . '.php';
            $dest5 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/WIInc/';
            $check5 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/WIInc/' .$configs['lang'] . '.php';

            if(!file_exists($check5)){
              $this->System->full_copy($source5 , $dest5);
            }

            //forum back end forum inc page forum_Options
            $source6 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) .'/WIPlugin/'. $plug .'/forum/WIInc/' .$configs['page'].'.php';
            $dest6 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/WIInc/';
            $check6 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/WIInc/' .$configs['page'].'.php';

            if(!file_exists($check6)){
              $this->System->full_copy($source6 , $dest6);

            }
                    

    }

    public function styling($configs, $plug)
    {
            $currentTheme = self::WITheme();

            $source = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) .'/WIPlugin/'. $plug . '/Install/Theme/'. $configs['lang'];
            $dest = dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))))) . '/WITheme/' . $currentTheme .'/'. $configs['lang'];

          $check = dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))))) . '/WITheme/' . $currentTheme .'/'. $configs['lang'];

            if(!file_exists($check)){
              $this->System->full_copy($source , $dest);
               //$fil = glob($dest . "/*");
               //print_r($fil);
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