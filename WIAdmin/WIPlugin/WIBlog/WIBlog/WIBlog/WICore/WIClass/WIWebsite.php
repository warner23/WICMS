<?php

/**
* 
*/
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
        //echo $res[$column];
        return $res[$column];
    }

    public function webSite_icons()
    {
        $sql = "SELECT * FROM `wi_site`";
        $query = $this->WIdb->prepare($sql);
        $query->execute();

        $res = $query->fetch(PDO::PARAM_STR);
        //echo $res;
        echo '<link rel="icon" type="image/png" href="../WIAdmin/WIMedia/Img/favicon/' . $res['favicon'] . '"/>';
    }

    

    public function Meta($page)
    {
         $sql = "SELECT * FROM `wi_meta` WHERE `page`=:page";
          $query = $this->WIdb->prepare($sql);
          $query->bindParam(':page', $page, PDO::PARAM_STR);
          $query->execute();

         while($result = $query->fetch(PDO::FETCH_ASSOC))
        {
          //print_r($result);

            echo '<meta name="' . $result['name'] . '" content="' . $result['content'] . '" author="' . $result['author'] . '" >';
            
        }

    }

    public function Theme()
    {
      $in_use = 1;
      $sql ="SELECT * FROM `wi_theme` WHERE `in_use`=:in_use";
      $query = $this->WIdb->prepare($sql);
      $query->bindParam(':in_use', $in_use, PDO::PARAM_INT);
      $query->execute();

      $result = $query->fetch();
      $theme = $result['destination'];

      return $theme;

    }
    

    public function Styling($page)
    {
          $sql = "SELECT * FROM `wi_css` WHERE `page`=:page";
         $query = $this->WIdb->prepare($sql);
         $query->bindParam(':page', $page, PDO::PARAM_STR);
        $query->execute();

        while($res = $query->fetch(PDO::FETCH_ASSOC))
        {
        echo '<link href="../' . self::theme() . $res['href'] . '" rel="' . $res['rel'] . '">';
        }
    }

    public function Scripts($page)
    {
      $sql = "SELECT * FROM `wi_scripts` WHERE `page`=:page";
                 $query = $this->WIdb->prepare($sql);
                 $query->bindParam(':page', $page, PDO::PARAM_STR);
        $query->execute();

        while($res = $query->fetch(PDO::FETCH_ASSOC))
        {
        echo ' <script src="../' . self::theme() . $res['src'] . '" type="text/javascript"></script>';
        }
    }

    public function StartUp()
    {
        echo '<!DOCTYPE html>
                <html class="no-js" lang="en">
                <head>   
                  <title>' . WEBSITE_NAME. ' </title>
                  <meta charset="utf-8">';
    }

    public function Social()
    {

        $query = $this->WIdb->prepare('SELECT * FROM `wi_Social`');
        $query->execute();

        while($res = $query->fetch(PDO::FETCH_ASSOC))
        {
            echo ' <ul class="social_media"> 
                            <li><a href="' . $res['facebook'] .'" data-placement="bottom" data-toggle="tooltip" class="fa fa-facebook" title="Facebook">Facebook</a></li>
                            <li><a href="' . $res['google'] .'" data-placement="bottom" data-toggle="tooltip" class="fa fa-google-plus" title="Google+">Google+</a></li>
                            <li><a href="' . $res['twitter'] .'" data-placement="bottom" data-toggle="tooltip" class="fa fa-twitter" title="Twitter">Twitter</a></li>
                            <li><a href="' . $res['pinterest'] .'" data-placement="bottom" data-toggle="tooltip" class="fa fa-pinterest" title="Pinterest">Pinterest</a></li>
                            <li><a href="' . $res['linkedIn'] .'" data-placement="bottom" data-toggle="tooltip" class="fa fa-linkedin" title="Linkedin">Linkedin</a></li>
                            <li><a href="' . $res['rss'] .'" data-placement="bottom" data-toggle="tooltip" class="fa fa-rss" title="Feedburner">RSS</a></li>
                        </ul><!-- End Social --> ';
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
                                <a href="index.php">
                                <img alt=""  class="logo" src="../WIAdmin/WIMedia/Img/header/' . $res['logo'] .'"></a>
                                
                            </div>
                        </div>

                        <!-- start of header-->
                        <div class="col-lg-9 col-md-9 col-sm-10">
                        <div class="col-ms"> 
                        <div class="zapfino">' . $res['header_content'] . '
                        <span class="slogan">' . $res['header_slogan'] . '</span>
                        </div><!-- end col-ms-->
                        </div>
                         <!--end opf header-->

                         <!-- start of menu -->
                    </div>
                </div> 
        </header>';
    }

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
        echo '<div class="menu"><div class="col-lg-12 col-md-12 col-sm-12 menusT">
              <div id="nav">
               <ul id="mainMenu" class="mainMenu default">';

        while($res = $query1->fetch(PDO::FETCH_ASSOC))
        {    
         echo '<li><a href="../' . $res['link'] . '">' . WILang::get('' .$res['lang'] .'') . '</a></li>';
         if($res['parent'] > 0)
         {
            echo '<li><a href="../' . $res['link'] . '">' . WILang::get('' .$res['lang'] .'') . '</a></li>';
         }
        }
        echo '</ul>
            </div><!-- nav -->   
            <!-- end of menu -->
            </div></div>';
    }

      public function DebateMenu()
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
        echo '<div class="menu"><div class="col-lg-12 col-md-12 col-sm-12 menusT">
              <div id="nav">
               <ul id="mainMenu" class="mainMenu default">';

        while($res = $query1->fetch(PDO::FETCH_ASSOC))
        {    
         echo '<li><a href="#" onclick="WIChat.close">' . WILang::get('' .$res['lang'] .'') . '</a></li>';
         if($res['parent'] > 0)
         {
            echo '<li><a href="../' . $res['link'] . '">' . WILang::get('' .$res['lang'] .'') . '</a></li>';
         }
        }
        echo '</ul>
            </div><!-- nav -->   
            <!-- end of menu -->
            </div></div>';
    }


    public function footer()
    {
        $id = 1;

        $date = date("Y");
        $http = str_replace("www.", "", $_SERVER['HTTP_HOST']);
        $query = $this->WIdb->prepare('SELECT * FROM `wi_footer` WHERE footer_id=:id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        while($res = $query->fetch(PDO::PARAM_STR))
        {
            echo '<footer class="footer">
            <section class="footer_bottom container-fluid text-center">
            <div class="container">
                <div class="row">
                <div class="col-md-4 col-md-ol col-sm-4 col-lg-4 col-xs-4">
               
                </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <p class="copyright"><?php echo WILang::get("copyright");?> &copy; ' . $date . ' ' . $res['website_name'] . '-  All rights reserved.</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    </div>
                </div>
            </div>
        </section>
        </footer>
        <!--End Footer-->';
        }
    }

    public function langClassSelector($lang)
    {
      //echo $lang;

      if( WILang::getLanguage() === $lang){
        return WILang::getLanguage();
      }else{
        return "fade";
      }

    }

      public function viewLang()
    {
    

         
        $sql = "SELECT * FROM `wi_lang`";
        $query = $this->WIdb->prepare($sql);
        $query->execute();
         echo '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-10">
                         <div class="flags-wrapper">';
        while($res = $query->fetchAll(PDO::FETCH_ASSOC) ){

          
        foreach ($res as $lang ) {


        
            echo '<a href="' . $lang['href'] . '">
                 <img src="../WIAdmin/WIMedia/Img/lang/' . $lang['lang_flag'] . '" alt="' . $lang['name'] .'" title="' . $lang['name'] .'"
                      class="'. WIWebsite::langClassSelector($lang['lang']) .'" /></a>';
            }
        }

         echo '</div>
                    </div><!-- end col-lg-6 col-md-6 col-sm-6-->';
    }



   

    public function PageMod($page, $column)
    {
        //echo "col" . $column;

                $result = $this->WIdb->selectColumn(
                    "SELECT * FROM `wi_page` WHERE `name`=:page",
                     array(
                       "page" => $page
                     ), $column
                  );
               // print_r($result[$column]);
         if(count($result < 1)){
            return $column;
         }else{
            return $column;
         }


    }

       public function pageModPower($page, $column)
        {
        //echo "col" . $column;

                $result[$column] = $this->WIdb->selectColumn(
                    "SELECT * FROM `wi_page` WHERE `name`=:page",
                     array(
                       "page" => $page
                     ), $column
                  );
               // print_r($result[$column]);
         if(count($result < 1)){
            return $result[$column];
         }else{
            return $result[$column];
         }


    }

        public function showFavicon()
    {
        $sql = "SELECT * FROM `wi_site`";

        $query = $this->WIdb->prepare($sql);
        $query->execute();

        $res = $query->fetch();

        $favicon = $res['favicon'];
        return $favicon;

    }
}



?>
