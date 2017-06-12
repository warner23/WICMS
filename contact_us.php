
      <?php

      include_once "WIInc/WI_StartUp.php";

      $ip = getenv("REMOTE_ADDR");
      $country = $maint->ip_info($ip, "country");

      $page = "contact_us";
      $maint->visitors_log($page, $ip, $country);
      $Panel = $web->PageMod($page, "panel");

      if ($Panel === "null") {
        
      }else{

        $mod->getMod($Panel);
      }

      $top_head = $web->PageMod($page, "top_head");
      //echo $Panel;
      if ($top_head === "null") {
        
      }else{

        $mod->getMod($top_head);
      }

      $web->MainMenu(); 

      $leftSideBar = $web->PageMod($page, "left_sidebar");
      if ($leftSideBar === "null") {
        
      }else{

        $mod->getMod($leftSideBar);
      }

      $contents = $web->PageMod($page, "contents");
      //echo $Panel;
      if ($contents === "null") {
        
      }else{

        $mod->getMod($contents);
      }

      $rightSideBar = $web->PageMod($page, "right_sidebar");
      //echo $Panel;
      if ($rightSideBar === "null") {
        
      }else{

        $mod->getMod($rightSideBar);
      }
          
      //include_once "WIInc/welcome_box.php";

      $web->footer();
      ?>



      </body>
      </html>

      