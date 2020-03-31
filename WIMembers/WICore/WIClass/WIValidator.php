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
                         <div clas