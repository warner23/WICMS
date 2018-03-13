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


    public function CatCheck($cat)
    {
      $sql = "SELECT * FROM `wi_categories` WHERE `title`=:title";

      $query = $this->WIdb->prepare($sql);
      $query->bindParam(':title', $cat, PDO::PARAM_STR);
      $query->execute();

      $result = $query->fetch();
      //print_r($result);
      if( count($result) > 1){
        return "1";
      }else{
        return "0";
      }

    }

        public function BrandCheck($brand)
    {
      $sql = "SELECT * FROM `wi_brands` WHERE `title`=:title";

      $query = $this->WIdb->prepare($sql);
      $query->bindParam(':title', $brand, PDO::PARAM_STR);
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
        $sql = "CREATE TABLE IF NOT EXISTS `wi_brands` (
  `brand_id` int(100) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  PRIMARY KEY (`brand_id`)
) DEFAULT CHARSET=utf8 ;


CREATE TABLE IF NOT EXISTS `wi_cart` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `p_id` int(10) NOT NULL,
  `ip_addr` varchar(250) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_title` varchar(300) NOT NULL,
  `product_image` text NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `total_amount` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `wi_categories` (
  `cat_id` int(100) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `wi_products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(300) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `wi_recommended` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` decimal(3,0) NOT NULL,
  `img` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

";

        $query = $this->WIdb->prepare($sql);
        $query->execute();
    }


    public function InstallCats($configs, $plug, $cats)
    {
      foreach ($cats as $cat) {
      $Category = self::CatCheck($cat);

      if ($Category === "0") {
        // add plugin into db plugin
        $this->WIdb->insert('wi_categories', array(
            "title"  => $cat
           
        ));

      }
      }
            
    }

        public function InstallBrands($configs, $plug, $brands)
    {
      foreach ($brands as $brand) {
      $branding = self::CatCheck($brand);

      if ($branding === "0") {
        // add plugin into db plugin
        $this->WIdb->insert('wi_brands', array(
            "title"  => $brand
           
        ));

      }
      }
            
    }

    public function InstallProducts($configs, $plug, $products)
    {
      foreach ($brands as $brand) {
      $branding = self::CatCheck($brand);

      if ($branding === "0") {
        // add plugin into db plugin
        $this->WIdb->insert('wi_products', array(
            "title"  => $brand
           
        ));

      }
      }
            
    }

    /*public function InsertShopData($configs, $plug)
    {

      INSERT INTO `wi_products` (`product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
( 2, 9, 'Acer Laptop', 500, 'acer laptop 2GB', 'acer laptop.jpg', 'acer, laptop'),
( 2, 4, 'Apple Mobile', 300, 'Apple Mobile phone', 'apple mobile.jpg', 'apple, mobile'),
( 3, 0, 'draws', 50, 'draws 3', 'draws.jpg', 'draws, 3, cheap'),
( 2, 3, 'HP Laptop', 800, 'HP Laptop, 8GB', 'hp laptop.jpg', 'hp, laptop');

INSERT INTO `wi_categories` ( `title`) VALUES
( 'Furniture'),
( 'Electrical'),
( 'Bedding'),
( 'Ladies Wear'),
( 'Men Wear'),
( 'Kids Wear');

INSERT INTO `wi_brands` ( `title`) VALUES
( 'Samsung'),
( 'Dell'),
( 'Hp'),
( 'Apple'),
( 'LG'),
( 'Canon'),
( 'Nikon'),
( 'Sony'),
( 'Acer');
    }
*/
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
      ( 'site/css/frameworks/bootstrap.css', 'stylesheet', 'shop'),
      ( 'site/css/login_panel/css/slide.css', 'stylesheet', 'shop'),
      ( 'site/css/frameworks/menus.css', 'stylesheet', 'shop'),
      ( 'site/css/style.css', 'stylesheet', 'shop'),
      ( 'site/css/font-awesome.css', 'stylesheet', 'shop'),
      ( 'site/css/vendor/bootstrap.min.css', 'stylesheet', 'shop'),
      ( 'shop/css/style.css', 'stylesheet', 'shop'),
      ( 'shop/css/layout/wide.css', 'stylesheet', 'shop'),
      ( 'shop/css/switcher.css', 'stylesheet', 'shop');";

      $query = $this->WIdb->prepare($css);
        $query->execute();

      }

      if ($JsCheck === "0") {
        $js = "INSERT INTO `wi_scripts` ( `src`, `page`) VALUES
      ( 'site/js/frameworks/JQuery.js', 'shop'),
      ( 'site/js/frameworks/bootstrap.js', 'shop'),
      ( 'site/js/login_panel/js/slide.js', 'shop');
      ";

      $query = $this->WIdb->prepare($js);
        $query->execute();
      }

      if ($MetaCheck === "0") {
        $Meta = "INSERT INTO `wi_meta` ( `page`, `name`, `content`, `author`) VALUES
      ( 'shop', 'viewport', 'width=device-width, initial-scale=1', 'Jules Warner'),
      ( 'shop', 'description', 'Warner-Infinity Content Management System with simplified back end', 'Jules Warner'),
      ( 'shop', 'keywords', 'WI, WICMS, System, UI', 'Jules Warner'),
      ( 'shop', 'author', 'warner-infinity', 'Jules Warner');
      ";
      
      $query = $this->WIdb->prepare($Meta);
        $query->execute();
      }

      if ($pageCheck === "0") {
        $page = "INSERT INTO `wi_page` ( `name`, `panel`, `top_head`, `header`, `left_sidebar`, `right_sidebar`, `contents`, `footer`) VALUES
      ( 'shop', '1', '1', '0', '0', '0', 'shop', '1');
        ";
        $query = $this->WIdb->prepare($page);
        $query->execute();
      }
      
    }

   

    public function TransferFiles($configs, $plug)
    {
            // shop dir

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

            //shop back end shop page WIShop

            $source2 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) .'/WIPlugin/'. $plug .'/shop/' . $plug . '.php';
            $dest2 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/' . $plug . '.php';
            $check2 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/' . $plug . '.php';

            if(!file_exists($check2)){
              $this->System->file_copy($source2 , $dest2);
            }

            //shop back end shop options page

            $source3 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) .'/WIPlugin/'. $plug .'/shop/' . $plug . '_Options.php';
            $dest3 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/' . $plug . '_Options.php';
            $check3 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/' . $plug . '_Options.php';

            if(!file_exists($check3)){
              $this->System->file_copy($source3 , $dest3);
            }


            //shop back end shop include files 
            
            $source4 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) .'/WIPlugin/'. $plug .'/shop/WIInc/' . $plug;
            $dest4 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/WIInc/site/' . $plug;
            $check4 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/WIInc/site/' . $plug;

            if(!file_exists($check4)){
              $this->System->full_copy($source4 , $dest4);
                //$fil = glob($dest4 . "/*");
               //print_r($fil);
            }

            //shop back end shop inc page  shop
            $source5 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) .'/WIPlugin/'. $plug .'/shop/WIInc/' .$configs['lang'] . '.php';
            $dest5 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/WIInc/';
            $check5 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/WIInc/' .$configs['lang'] . '.php';

            if(!file_exists($check5)){
              $this->System->full_copy($source5 , $dest5);
            }

            //shop back end shop inc page shop_Options
            
            $source6 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) .'/WIPlugin/'. $plug .'/shop/WIInc/' .$configs['page'].'.php';
            $dest6 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/WIInc/' .$configs['page'].'.php';
            $check6 = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/WIInc/' .$configs['page'].'.php';

            if(!file_exists($check6)){
              $this->System->full_copy($source6 , $dest6);
               //$fil = glob($dest6 . "/*");
               //print_r($fil);
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