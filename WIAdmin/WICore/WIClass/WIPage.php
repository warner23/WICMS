<?php

/**
* Pages Class
* Created by Warner Infinity
* Author Jules Warner
*/

class WIPage
{
	function __construct() {
       $this->WIdb = WIdb::getInstance();
    }

    public function Pages()
	{
		$dir = "../";
		//echo $dir;
    	$filelist = glob($dir."*.php");
    	//var_dump($filelist);
    	echo '<ul>';
    	foreach ($filelist as $file => $value) {
    		echo '<a class="hover_link" href="WIEditpage.php"><li id="' . $file . '">' .  basename($value) . '</a></li>';
    	}
    	echo '</ul>';
    }
    


        public function PageListings2()
    {
        $sql = "SELECT * FROM `wi_page`";
        $query = $this->WIdb->prepare($sql);
        $query->execute();
         echo '<ul>';
        while ($res = $query->fetch()) {
            echo '<li id="' . $res['id'] . '"><a class="page" id="' . $res['id'] . '""  href="WIEditpage.php">' .  $res['name'] . '</a></li>';
        }
        echo '</ul>';

    }

        public function PageListings()
    {

        $sql = "SELECT * FROM `wi_page`";
        $query = $this->WIdb->prepare($sql);
        $query->execute();
         echo '<ul>';
        while ($res = $query->fetch()) {

            echo '<li class="col-lg-12 col-dm-12 col-xs-12 col-sm-12"><div class="col-lg-2 col-dm-3 col-xs-3 col-sm-3 page">
                              ' .  $res['name'] . '
                            </div>
<div class="col-lg-2 col-dm-3 col-xs-3 col-sm-3 page">
                              <a class="col-lg-4 col-dm-3 col-xs-3 col-sm-3 page"  href="WIEditpage.php" id="' . $res['name'] . '">' .  $res['name'] . '</a>
                            </div>
                            <div class="col-lg-2 col-dm-3 col-xs-3 col-sm-3 page">
                              <a class="col-lg-2 col-dm-3 col-xs-3 col-sm-3 page"><button type="button" class="close" onclick="WIPages.Open(' . $res['id'] . ', `' . $res['name'] . '`)" data-dismiss="modal" aria-hidden="false">&times;</button></a>
                            </div>
                            
                            </li>
              
            ';
        }
        echo '</ul>';

    }



    public function PageInfo($page_id)
    {
     $sql = "SELECT * FROM `wi_page` WHERE `id` =:page";
     $query = $this->WIdb->prepare($sql);
     $query->bindParam(':page', $page_id, PDO::PARAM_INT);
     $query->execute();

     while ($res = $query->fetch(PDO::FETCH_ASSOC)) {
        $name = $res['name'];
              echo  $name;
          }     

    }

    public function LoadPage($page_id)
    {
      //echo "page " . $page_id;
           $sql = "SELECT * FROM `wi_page` WHERE `name` =:page";
     $query = $this->WIdb->prepare($sql);
     $query->bindParam(':page', $page_id, PDO::PARAM_STR);
     $query->execute();

     $res = $query->fetch(PDO::FETCH_ASSOC);
        $name = $res['contents'];
              //echo  $name;

       $directory = dirname(dirname(dirname(__FILE__)));
//include_once  $directory . '/WIInc/edit/' . $page_id . '.php' ;
     // echo  '/WIModule/' .$name.'/'.$name.'.php';
      require_once  $directory . '/WIModule/' .$name.'/'.$name.'.php';
        $name = new $name;

        $name->editPageContent($page_id);   
    }

    public function LoadMetaPage($page_id)
    {
      //echo "page " . $page_id;
           $sql = "SELECT * FROM `wi_meta` WHERE `page` =:page";
     $query = $this->WIdb->prepare($sql);
     $query->bindParam(':page', $page_id, PDO::PARAM_STR);
     $query->execute();

      echo '<ul class="meta">';
    
        while($result = $query->fetch(PDO::FETCH_ASSOC)){
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

                                <div class="col-sm-1 col-md-1 col-lg-1 col-xs-1"><a href="#" onclick="WIMeta.DeleteMetaModal(' . $result['meta_id'].')">Delete</a></div>
                            
                            </li>';
        }
        echo '<ul>';
      
    }

        public function LoadCssPage($page_id)
    {
      //echo "page " . $page_id;
           $sql = "SELECT * FROM `wi_css` WHERE `page` =:page";
     $query = $this->WIdb->prepare($sql);
     $query->bindParam(':page', $page_id, PDO::PARAM_STR);
     $query->execute();

      echo '<ul class="css">';
    
        while($result = $query->fetch(PDO::FETCH_ASSOC)){
            echo ' <li class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
             
                            <div class="controls col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-6">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">' . $result['href'].'</div>
                            </div>
                    

                            
                            <div class="controls col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xs-2">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">' . $result['rel'].' </div>
                                
                            </div>

                                <div class="col-sm-1 col-md-1 col-lg-1 col-xs-2"><a href="#" onclick="WICSS.showCssModal(' . $result['id'].')">Edit</a></div>

                                <div class="col-sm-1 col-md-1 col-lg-1 col-xs-1"><a href="#" onclick="WICSS.DeleteCssModal(' . $result['id'].')">Delete</a></div>
                            
                            </li>';
        }
        echo '<ul>';
      
    }

        public function LoadJsPage($page_id)
    {
      //echo "page " . $page_id;
           $sql = "SELECT * FROM `wi_scripts` WHERE `page` =:page";
     $query = $this->WIdb->prepare($sql);
     $query->bindParam(':page', $page_id, PDO::PARAM_STR);
     $query->execute();

      echo '<ul class="js">';
    
        while($result = $query->fetch(PDO::FETCH_ASSOC)){
            echo ' <li class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
             
                            <div class="controls col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-8">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">' . $result['src'].'</div>
                            </div>
                    
                                <div class="col-sm-1 col-md-1 col-lg-1 col-xs-2"><a href="#" onclick="WIMeta.showMetaModal(' . $result['id'].')">Edit</a></div>

                                <div class="col-sm-1 col-md-1 col-lg-1 col-xs-1"><a href="#" onclick="WIMeta.DeleteMetaModal(' . $result['id'].')">Delete</a></div>
                            
                            </li>';
        }
        echo '<ul>';
      
    }



    public function newPage($pageName)
    {
      $directory = dirname(dirname(dirname(dirname(__FILE__))));
     // echo $directory.$pageName;
      $NewPage = fopen($directory. '/'  .$pageName .'.php', "w") or die("Unable to open file!");
      $txt = '
      <?php

      include_once "WIInc/WI_StartUp.php";

      $ip = getenv("REMOTE_ADDR");
      $country = $maint->ip_info($ip, "country");

      $page = "' . $pageName .'";
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

      ';
      fwrite($NewPage, $txt);
      fclose($NewPage);

       $this->WIdb->insert('wi_page', array(
          "name" => $pageName
        )); 

       $page_id = $this->WIdb->lastInsertId();

  $results = array(
    "completed" => "saved",
    "msg"    => "successfully createsd new page",
    "page_id" => $page_id
    );
    
    echo json_encode($results);
    }


        public function selectPage()
    {
      $sql = "SELECT * FROM `wi_page`";
      $query = $this->WIdb->prepare($sql);
      $query->execute();

      $res = $query->fetchAll(PDO::FETCH_ASSOC);

      foreach ($res as $key => $value) {
      echo '<option value="' . $value['name'] . '">' . $value['name'] . '</option>';
      }
    }


     public function GetColums($page_id, $column)
    {
      //echo $page_id;
      $sql = "SELECT * FROM `wi_page` WHERE `name` =:name";
      $query = $this->WIdb->prepare($sql);
      $query->bindParam(':name', $page_id, PDO::PARAM_STR);
      $query->execute();
      $res = $query->fetch(PDO::FETCH_ASSOC);
      return $res[$column];
    }

        public function loadPageOptions($page_id)
    {
      $lsc = WIPage::GetColums($page_id, "left_sidebar");
      $rsc = WIPage::GetColums($page_id, "right_sidebar");

      $results = array(
        "status" => "completed",
        "lsc" => $lsc,
        "rsc" => $rsc
        );
      echo json_encode($results);
    }

    public function toggleSideColumns($page_id, $col)
    {
            $lsc = WIPage::GetColums($page_id, "left_sidebar");
      $rsc = WIPage::GetColums($page_id, "right_sidebar");

      if ($col === "left") {
        
        if ($lsc > 0) {
          $status = 0;
          $sql = "UPDATE `wi_page` SET  `left_sidebar` =:status WHERE  `wi_page`.`name` =:page";
          $query = $this->WIdb->prepare($sql);
          $query->bindParam(':status', $status, PDO::PARAM_INT);
          $query->bindParam(':page', $page_id, PDO::PARAM_STR);
          $query->execute();

          $result = array(
            "status" => "complete",
            "lsc"   => 0
            );
          echo json_encode($result);
          }else{
                      $status = 1;
          $sql = "UPDATE `wi_page` SET  `left_sidebar` =:status WHERE  `wi_page`.`name` =:page";
          $query = $this->WIdb->prepare($sql);
          $query->bindParam(':status', $status, PDO::PARAM_INT);
          $query->bindParam(':page', $page_id, PDO::PARAM_STR);
          $query->execute();

          $result = array(
            "status" => "complete",
            "lsc"   => 1

            );
          echo json_encode($result);
          }
      }

      if ($col === "right") {
         if ($lsc > 0) {
          $status = 0;
          $sql = "UPDATE `wi_page` SET  `right_sidebar` =:status WHERE  `wi_page`.`name` =:page";
          $query = $this->WIdb->prepare($sql);
          $query->bindParam(':status', $status, PDO::PARAM_INT);
          $query->bindParam(':page', $page_id, PDO::PARAM_STR);
          $query->execute();

          $result = array(
            "status" => "complete",
            "rsc"   => 0
            );
          echo json_encode($result);
          }else{
                      $status = 1;
          $sql = "UPDATE `wi_page` SET  `right_sidebar` =:status WHERE  `wi_page`.`name` =:page";
          $query = $this->WIdb->prepare($sql);
          $query->bindParam(':status', $status, PDO::PARAM_INT);
          $query->bindParam(':page', $page_id, PDO::PARAM_STR);
          $query->execute();

          $result = array(
            "status" => "complete",
            "rsc"   => 1
            );
          echo json_encode($result);
          }
      }
    }


    public function deletePage($id)
    {
      $sql = "DELETE FROM `wi_page` WHERE id =:id";

      $query = $this->WIdb->prepare($sql);
      $query->bindParam(':id', $id, PDO::PARAM_INT);
      $query->execute();

       $result = array(
            "status" => "complete",
            );
          echo json_encode($result);

    }

    public function changeLSC($page, $col)
    {
      $lsc = WIPage::GetColums($page, "left_sidebar");
     // echo $lsc;
      if($lsc === "0"){
        $left = "1";
        $sql = "UPDATE `wi_page` SET `left_sidebar`=:left WHERE `name` =:page";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':left', $left, PDO::PARAM_STR);
        $query->bindParam(':page', $page, PDO::PARAM_STR);
        $query->execute();

                  $result = array(
            "status" => "complete",
            "lsc"   => 1
            );
          echo json_encode($result);

      }else if($lsc === "1"){
         $left = "0";
        $sql = "UPDATE `wi_page` SET `left_sidebar`=:left WHERE `name` =:page";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':left', $left, PDO::PARAM_STR);
        $query->bindParam(':page', $page, PDO::PARAM_STR);
        $query->execute();

                  $result = array(
            "status" => "complete",
            "lsc"   => 0
            );
          echo json_encode($result);
      }



    }


public function changeRSC($page, $col)
    {
      $rsc = WIPage::GetColums($page, "right_sidebar");
     // echo $lsc;
      if($rsc === "0"){
        $right = "1";
        $sql = "UPDATE `wi_page` SET `right_sidebar`=:right WHERE `name` =:page";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':right', $right, PDO::PARAM_STR);
        $query->bindParam(':page', $page, PDO::PARAM_STR);
        $query->execute();

                  $result = array(
            "status" => "complete",
            "rsc"   => 1
            );
          echo json_encode($result);

      }else if($rsc === "1"){
         $right = "0";
        $sql = "UPDATE `wi_page` SET `right_sidebar`=:right WHERE `name` =:page";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':right', $right, PDO::PARAM_STR);
        $query->bindParam(':page', $page, PDO::PARAM_STR);
        $query->execute();

                  $result = array(
            "status" => "complete",
            "rsc"   => 0
            );
          echo json_encode($result);
      }



    }


    public function toogleLsc($page, $col)
    {
      $sql = "SELECT * FROM `wi_page` WHERE name=:page";

      $query = $this->WIdb->prepare($sql);
      $query->bindParam(':page', $page, PDO::PARAM_STR);
      $query->execute();

      $res = $query->fetch(PDO::FETCH_ASSOC);
      $lsc = $res[$col];

       $result = array(
            "status" => "complete",
            "lsc"   => $lsc
            );
          echo json_encode($result);
      }


   
}