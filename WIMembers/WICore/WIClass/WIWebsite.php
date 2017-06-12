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

    public function index()
    {

    }

    public function displayPage($page)
    {
        $page;

        $query = $this->WIdb->prepare('SELECT * FROM `wi_page` WHERE `page`=:page');
        $query->bindParam(':page', $page, PDO::PARAM_STR);
        $query->execute();

        while ($res = $query->fetch(PDO::FETCH_ASSOC))
        {

        }
    }


        public function webSite_essentials($column)
    {
        $sql = "SELECT * FROM `wi_header`";
        $query = $this->WIdb->prepare($sql);
        $query->execute();

        $res = $query->fetch(PDO::PARAM_STR);
        return $res[$column];
    }

    

    public function Meta()
    {
         
          $query = $this->WIdb->prepare('SELECT * FROM `wi_meta`');
          $query->execute();
         while($result = $query->fetch(PDO::FETCH_ASSOC))
        {
            echo '<meta name="' . $result['name'] . '" content="' . $result['content'] . '" author="' . $result['author'] . '" >';
        }

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
            echo '  <footer class="footer">
            <section class="footer_bottom container-fluid text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <p class="copyright"><?php echo WILang::get("copyright");?> &copy; ' . $date . ' ' . $res['website_name'] . '-  All rights reserved.</p>
                    </div>
                </div>
            </div>
        </section>
        </footer>
        <!--End Footer-->
        
        ';
        }
    }



    public function top_head()
    {
        echo '<div class="top_head">
            <div class="container">
                <div class="row">
                <!-- contact area-->
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <ul class="top_contact">
                            <li class="t_phone">
                                <p>0161 371 5522</p>
                            </li>
                            <li class="t_mail">
                                <p>therivermanchester@gmail.com</p>
                            </li>
                        </ul>
                    </div>
                    <!-- end of contact area-->
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-jw col-lg-sm2">
                         <div class="flags-wrapper">
             <a href="?lang=en">
                 <img src="WIMedia/Img/lang/en.png" alt="English" title="English"
                      class="' . WILang::getLanguage() != 'en' ? 'fade' : ''.'" />
             </a>
             <a href="?lang=rs">
                 <img src="WIMedia/Img/lang/rs.png" alt="Serbian" title="Serbian"
                      class="' . WILang::getLanguage() != 'rs' ? 'fade' : '' . '" />
             </a>
              <a href="?lang=ru">
                  <img src="WIMedia/Img/lang/ru.png" alt="Russian" title="Russian"
                       class="' . WILang::getLanguage() != 'ru' ? 'fade' : ''.  '" />
              </a>
               <a href="?lang=es">
                  <img src="WIMedia/Img/lang/es.png" alt="Spanish" title="Spanish"
                       class="' . WILang::getLanguage() != 'es' ? 'fade' : ''. '" />
              </a>
         </div>
                    </div><!-- end col-lg-6 col-md-6 col-sm-6-->
                    <!--  search area-->
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div id="sb-search" class="sb-search">
                            <form>
                                <input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
                                <input class="sb-search-submit" type="submit" value="">
                                <span class="sb-icon-search"></span>
                            </form>
                        </div>

                        <ul class="social_media"> 
                            <li><a href="#" data-placement="bottom" data-toggle="tooltip" class="fa fa-facebook" title="Facebook">Facebook</a></li>
                            <li><a href="#" data-placement="bottom" data-toggle="tooltip" class="fa fa-google-plus" title="Google+">Google+</a></li>
                            <li><a href="#" data-placement="bottom" data-toggle="tooltip" class="fa fa-twitter" title="Twitter">Twitter</a></li>
                            <li><a href="#" data-placement="bottom" data-toggle="tooltip" class="fa fa-pinterest" title="Pinterest">Pinterest</a></li>
                            <li><a href="#" data-placement="bottom" data-toggle="tooltip" class="fa fa-linkedin" title="Linkedin">Linkedin</a></li>
                            <li><a href="#" data-placement="bottom" data-toggle="tooltip" class="fa fa-rss" title="Feedburner">RSS</a></li>
                        </ul><!-- End Social --> 
                    </div>
                </div>
            </div>
        </div>';
    }

}



?>
