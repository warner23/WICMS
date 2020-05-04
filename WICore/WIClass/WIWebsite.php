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
        $result = $this->WIdb->select("SELECT * FROM `wi_header`");
        return $result[$column];
    }

    public function webSite_icons()
    {
      $result = $this->WIdb->select("SELECT * FROM `wi_site`");

        foreach ($result as $res ) {
          echo '<link rel="icon" type="image/png" href="WIAdmin/WIMedia/Img/favicon/' . $res['favicon'] . '"/>';
        }
        
    }

    
    public function Meta($page)
    {
      
        $result = $this->WIdb->select("SELECT * FROM `wi_meta` WHERE `page`=:page",
          array(
            "page" => $page
          )
        );

         foreach($result as $res)
        {
            echo '<meta name="' . $res['name'] . '" content="' . $res['content'] . '" author="' . $res['author'] . '" >';
            
        }

    }

    public function Theme()
    {
      $in_use = 1;

      $result = $this->WIdb->select("SELECT * FROM `wi_theme` WHERE `in_use`=:in_use",
          array(
            "in_use" => $in_use
          )
        );

      $theme = $result[0]['destination'];

      return $theme;

    }
    

    public function Styling($page)
    {
      $result = $this->WIdb->select("SELECT * FROM `wi_css` WHERE `page`=:page",
          array(
            "page" => $page
          )
        );

        foreach($result as $res)
        {
        echo '<link href="' . self::theme() . $res['href'] . '" rel="' . $res['rel'] . '">';
        }
    }

    public function Scripts($page)
    {
            $result = $this->WIdb->select("SELECT * FROM `wi_scripts` WHERE `page`=:page",
          array(
            "page" => $page
          )
        );

        foreach($result as $res)
        {
        echo ' <script src="' . self::theme() . $res['src'] . '" type="text/javascript"></script>';
        }
    }

    public function StartUp()
    {

      //If the HTTPS is not found to be "on"

        echo '<!DOCTYPE html>
                <html class="no-js" lang="en">
                <head>   
                  <title>' . WEBSITE_NAME. ' </title>
                  <meta charset="utf-8">';
    }

    public function Social()
    {

      $result = $this->WIdb->select("SELECT * FROM `wi_Social`");

        foreach($result as $res)
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
        $result = $this->WIdb->select("SELECT * FROM `wi_header`");
        foreach($result as $res)
        {
         echo ' <header class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-2">
                            <div class="navbar_brand">
                                <a href="index.php">
                                <img alt=""  class="logo" src="WIAdmin/WIMedia/Img/header/' . $res['logo'] .'"></a>
                                
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
        $result = $this->WIdb->select("SELECT * FROM `wi_menu`");
        $menu_order = $result[0]['sort'];

        $result0 = $this->WIdb->select("SELECT * FROM `wi_menu` ORDER BY :order",
          array(
            "order" => $menu_order
          )
        );

        echo '<div class="menu"><div class="col-lg-12 col-md-12 col-sm-12 menusT">
              <div id="nav">
               <ul id="mainMenu" class="mainMenu default">';

        foreach($result0 as $res)
        {    
         echo '<li><a href="' . $res['link'] . '">' . WILang::get('' .$res['lang'] .'') . '</a></li>';
         if($res['parent'] > 0)
         {
            echo '<li><a href="' . $res['link'] . '">' . WILang::get('' .$res['lang'] .'') . '</a></li>';
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

        $result = $this->WIdb->select("SELECT * FROM `wi_footer` WHERE footer_id=:id",
          array(
            "id" => $id
          )
        );


        foreach($result as $res)
        {
            echo '<footer class="footer">
            <section class="footer_bottom container-fluid text-center">
            <div class="container">
                <div class="row">


                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p class="copyright"><?php echo WILang::get("copyright");?> &copy; ' . $date . ' ' . $res['website_name'] . '-  All rights reserved Powered by WICMS.</p>
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
    

        $result = $this->WIdb->select("SELECT * FROM `wi_lang`");

        echo '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-10">
                         <div class="flags-wrapper">';
        foreach ($result as $lang ) {

       echo '<a href="' . $lang['href'] . '">
             <img src="WIAdmin/WIMedia/Img/lang/' . $lang['lang_flag'] . '" alt="' . $lang['name'] .'" title="' . $lang['name'] .'"
                      class="'. WIWebsite::langClassSelector($lang['lang']) .'" /></a>';
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
               //print_r($result[$column]);
         if(count($result[$column] < 1)){
            return $result[$column];
         }else{
            return $result[$column];
         }


    }

        public function showFavicon()
    {
      $result = $this->WIdb->select("SELECT * FROM `wi_site`");

/*        $sql = "SELECT * FROM `wi_site`";

        $query = $this->WIdb->prepare($sql);
        $query->execute();

        $res = $query->fetch();*/

        $favicon = $res[0]['favicon'];
        return $favicon;

    }

    public function google_lang()
    {
      echo '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-10">
                         <div class="flags-wrapper">
                         <div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: `en`, layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, `google_translate_element`);
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                         </div>
                    </div><!-- end col-lg-6 col-md-6 col-sm-6-->';

    }
}



?>
