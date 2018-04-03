<?php
/**
* WIModules Class
* Created by Warner Infinity
* Author Jules Warner
*/
class WIModules
{

    public function __construct() {
        $this->WIdb = WIdb::getInstance();
        $this->Page = new WIPagination();
    }

    public function InstallMods()
    {
        
         if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
        $page_number = 1; //if there's no page number, set it to 1
    }

        $item_per_page = 15;


        
        //get starting position to fetch the records
        $page_position = (($page_number-1) * $item_per_page);
        $dir = dirname(dirname(dirname(__FILE__))) . '/WIModule/';
        $modules = scandir($dir);
        $modTotal = count($modules);
        //echo $modTotal;

        //break records into pages
        $total_pages = ceil($modTotal/$item_per_page);

        foreach ($modules as $module => $value) {
            
        if ($value === '.' or $value === '..') continue;
        if (is_dir($dir.$value)) {
        //code to use if directory
                echo '<div class="col-md-4">
        <div class="panel panel-info">
        <div class="panel-heading">' . $value . '</div>
        <div class="panel-body">

             <button type="button" name="' . $value . '" value="enabled" id="' . $value . '-Install"  class="btn">Install</button>
         <button type="button" name="' . $value . '" value="disabled" id="' . $value . '-Uninstall" class="btn btn-danger active" >Unistall</button>
        </div>
        <div class="panel-footer">
            Author: Jules Warner
        </div>
        </div>
    </div>  <script type="text/javascript">
     
    var module = "' . WIModules::InstallToggle($value) . '";

                       if (module === "disabled"){
                        $("#' . $value . '-Install").removeClass("btn-success active");
                        $("#' . $value . '-Uninstall").addClass("btn-danger active");
                       }else if (module === "enabled"){
                        $("#' . $value . '-Uninstall").removeClass("btn-danger active");
                        $("#' . $value . '-Install").addClass("btn-success active");
                       }



                    $("#' . $value . '-Install").click(function(){
                        $("#' . $value . '-Uninstall").removeClass("btn-danger active")
                        $("#' . $value . '-Install").addClass("btn-success active");
                        WIMod.install("' . $value . '", "Jules Warner");
                    })

                    $("#' . $value . '-Uninstall").click(function(){
                       $("#' . $value . '-Install").removeClass("btn-success active")
                        $("#' . $value . '-Uninstall").addClass("btn-danger active");
                        WIMod.uninstall("' . $value . '");
                    })
</script>';
        }

        }

          $Pagin = $this->Page->Pagination($item_per_page, $page_number, $modTotal, $total_pages);
    //print_r($Pagination);


         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagin;
    echo '</div>';
    }



    public function getModules()
    {

         if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
        $page_number = 1; //if there's no page number, set it to 1
    }

        $item_per_page = 15;
        $mod_type = "custom";
        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_mod` WHERE mod_type =:mod_type",
                     array(
                       "mod_type" => $mod_type
                ));
        $rows = count($result);


        //break records into pages
        $total_pages = ceil($rows/$item_per_page);
        
        //get starting position to fetch the records
        $page_position = (($page_number-1) * $item_per_page);
        

        $sql = "SELECT * FROM `wi_mod` WHERE mod_type =:mod_type ORDER BY `mod_id` ASC LIMIT :page, :item_per_page";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':page', $page_position, PDO::PARAM_INT);
         $query->bindParam(':mod_type' ,$mod_type, PDO::PARAM_STR);
        $query->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);
        $query->execute();
        echo '<ul class="contents">';
        while ($res = $query->fetch(PDO::FETCH_ASSOC)) {
             echo '<div class="col-md-4">
        <div class="panel panel-info">
        <div class="panel-heading">' . $res['module_name'] . '</div>
        <div class="panel-body">
        <input type="hidden" name="' . $res['module_name'] . '" class="btn-group-value" id="' . $res['module_name'] . '" value="'. $res['mod_status'] . '" />
             <button type="button" name="' . $res['module_name'] . '" value="enabled" id="' . $res['module_name'] . '-enabled"  class="btn">Enabled</button>
         <button type="button" name="' . $res['module_name'] . '" value="disabled" id="' . $res['module_name'] . '-disabled" class="btn btn-danger active" >Disabled</button>
        </div>
        <div class="panel-heading">
            
        </div>
        </div>
    </div>  <script type="text/javascript">
     
    var module = "' . $res['mod_status'] . '";

                       if (module === "disabled"){
                        $("#' . $res['module_name'] . '-enabledd").removeClass("btn-success active");
                        $("#' . $res['module_name'] . '-disable").addClass("btn-danger active");
                       }else if (module === "enabled"){
                        $("#' . $res['module_name'] . '-disabled").removeClass("btn-danger active");
                        $("#' . $res['module_name'] . '-enabled").addClass("btn-success active");
                       }



                    $("#' . $res['module_name'] . '-enabled").click(function(){
                        
                       // $("#' . $res['module_name'] . '-enabled").attr("value", "enabled")
                        $("#' . $res['module_name'] . '-disabled").removeClass("btn-danger active")
                        $("#' . $res['module_name'] . '-enabled").addClass("btn-success active");
                        WIMod.enable("' . $res['module_name'] . '", "enabled");
                    })

                    $("#' . $res['module_name'] . '-disabled").click(function(){
                       
                       // $("#' . $res['module_name'] . '-disabled").attr("value", "disabled")
                        $("#' . $res['module_name'] . '-enabled").removeClass("btn-success active")
                        $("#' . $res['module_name'] . '-disabled").addClass("btn-danger active");
                        WIMod.disable("' . $res['module_name'] . '", "disabled");
                    })
</script>';
        }
        echo '</ul>';

         $Pagin = $this->Page->Pagination($item_per_page, $page_number, $rows, $total_pages);
    //print_r($Pagination);


         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagin;
    echo '</div>';
    }

     public function getInstalledModules()
    {

         if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
        $page_number = 1; //if there's no page number, set it to 1
    }

        $item_per_page = 15;

        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_mod`");
        $rows = count($result);

        //break records into pages
        $total_pages = ceil($rows/$item_per_page);
        
        //get starting position to fetch the records
        $page_position = (($page_number-1) * $item_per_page);
        $mod_type = "element";

        $sql = "SELECT * FROM `wi_mod` WHERE mod_type =:mod_type ORDER BY `mod_id` ASC LIMIT :page, :item_per_page";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':page', $page_position, PDO::PARAM_INT);
         $query->bindParam(':mod_type' ,$mod_type, PDO::PARAM_STR);
        $query->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);
        $query->execute();
        echo '<ul class="contents">';
        while ($res = $query->fetch(PDO::FETCH_ASSOC)) {
             echo '<div class="col-md-4">
        <div class="panel panel-info">
        <div class="panel-heading">' . $res['module_name'] . '</div>
        <div class="panel-body">
        <input type="hidden" name="' . $res['module_name'] . '" class="btn-group-value" id="' . $res['module_name'] . '" value="'. $res['mod_status'] . '" />
             <button type="button" name="' . $res['module_name'] . '" value="enabled" id="' . $res['module_name'] . '-enabled"  class="btn">Enabled</button>
         <button type="button" name="' . $res['module_name'] . '" value="disabled" id="' . $res['module_name'] . '-disabled" class="btn btn-danger active" >Disabled</button>
        </div>
        <div class="panel-heading">
            
        </div>
        </div>
    </div>  <script type="text/javascript">
     
    var module = "' . $res['mod_status'] . '";

                       if (module === "disabled"){
                        $("#' . $res['module_name'] . '-enabledd").removeClass("btn-success active");
                        $("#' . $res['module_name'] . '-disable").addClass("btn-danger active");
                       }else if (module === "enabled"){
                        $("#' . $res['module_name'] . '-disabled").removeClass("btn-danger active");
                        $("#' . $res['module_name'] . '-enabled").addClass("btn-success active");
                       }



                    $("#' . $res['module_name'] . '-enabled").click(function(){
                        
                       // $("#' . $res['module_name'] . '-enabled").attr("value", "enabled")
                        $("#' . $res['module_name'] . '-disabled").removeClass("btn-danger active")
                        $("#' . $res['module_name'] . '-enabled").addClass("btn-success active");
                        WIMod.enable("' . $res['module_name'] . '", "enabled");
                    })

                    $("#' . $res['module_name'] . '-disabled").click(function(){
                       
                       // $("#' . $res['module_name'] . '-disabled").attr("value", "disabled")
                        $("#' . $res['module_name'] . '-enabled").removeClass("btn-success active")
                        $("#' . $res['module_name'] . '-disabled").addClass("btn-danger active");
                        WIMod.disable("' . $res['module_name'] . '", "disabled");
                    })
</script>';
        }
        echo '</ul>';

         $Pagination = WIModules::Pagination($item_per_page, $page_number, $rows, $total_pages);
    //print_r($Pagination);


         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagination;
    echo '</div>';
    }



    public static function moduleToggle($column, $mod_name) 
    {
        $WIdb = WIdb::getInstance();

        $query = $WIdb->prepare('SELECT * FROM `wi_mod` WHERE `module_name` = :mod_name');
        $query->bindParam(':mod_name', $mod_name, PDO::PARAM_STR);
        $query->execute();

        $res = $query->fetch(PDO::FETCH_ASSOC);
       return $res[$column];
    }

        public static function InstallToggle($mod_name) 
    {
        $WIdb = WIdb::getInstance();

        $query = $WIdb->prepare('SELECT * FROM `wi_mod` WHERE `module_name` = :mod_name');
        $query->bindParam(':mod_name', $mod_name, PDO::PARAM_STR);
        $query->execute();

        $res = $query->fetch(PDO::FETCH_ASSOC);
        if($res['module_name'] === $mod_name)
            return "enabled";
        else
            return "disabled";
    }

     public function install_mod($mod_name, $author)
    {
        //

        $sql = "INSERT INTO `wi_mod` (module_name, mod_author) VALUES (:mod_name, :mod_author)";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':mod_name', $mod_name, PDO::PARAM_STR);
        $query->bindParam(':mod_author', $author, PDO::PARAM_STR);
        $query->execute();


    }

    public function uninstall_mod($mod_name)
    {
        //

        $sql = "DELETE FROM `wi_mod` WHERE module_name= :mod_name";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':mod_name', $mod_name, PDO::PARAM_STR);
        $query->execute();


    }


    public function active_available_mod($mod_name, $enable)
    {
        //INSERT INTO `wi_mod` (module_name, mod_status) VALUES (:mod_name, :mod_status)

        $sql = "UPDATE `wi_mod` SET `mod_status` = :mod_status WHERE `module_name` = :mod_name";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':mod_name', $mod_name, PDO::PARAM_STR);
        $query->bindParam(':mod_status', $enable, PDO::PARAM_STR);
        $query->execute();


    }

        public function deactive_available_mod($mod_name, $disable)
    {
        //echo $disable;
        //echo $mod_name;
        $sql = "UPDATE `wi_mod` SET `mod_status` = :mod_status WHERE `module_name` = :mod_name";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':mod_name', $mod_name, PDO::PARAM_STR);
        $query->bindParam(':mod_status', $disable, PDO::PARAM_STR);
        $query->execute();

    }

     public function ActiveMods()
     {
        $mod_status = "enabled";
        $sql = "SELECT * FROM `wi_elements` WHERE ele_status = :mod_status";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':mod_status' ,$mod_status, PDO::PARAM_STR);
        $query->execute();
        echo '<ul id="draggable" class="ui-widget-header">';
        while ($res = $query->fetch(PDO::FETCH_ASSOC)) {
            echo '<li id="'.$res['ele_name'] . '" title="'.$res['ele_name'] . '" class="ui-draggable ui-draggable-handle '.$res['ele_font'] . '"></li>';
        }
        echo '</ul>';

     }

     public function dropElement($mod_name)
     {
        include_once dirname(dirname(dirname(__FILE__))) . '/WIModule/' .$mod_name.'/'.$mod_name.'.php';
        /*
        spl_autoload_register(function($mod_name)
        {
            require_once $dir .'/' .$mod_name . '.php';
        });
        */

        $mod_name = new $mod_name;

        $mod_name->mod_name();

     }

     public function dropColElement($mod_name)
     {
        include_once dirname(dirname(dirname(__FILE__))) . '/WIModule/columns/columns.php';
        /*
        spl_autoload_register(function($mod_name)
        {
            require_once $dir .'/' .$mod_name . '.php';
        });
        */

        $columns = new columns;

        $columns->$mod_name();

     }

          public function editDropElement($mod_name, $page_id)
     {
        include_once dirname(dirname(dirname(__FILE__))) . '/WIModule/' .$mod_name.'/'.$mod_name.'.php';

        $mod_name = new $mod_name;

        $mod_name->editPageContent($page_id);

     }

     
     public function columns()
     {
        $mod_name = "columns";
        $mod_status = "enabled";
        $sql = "SELECT * FROM `wi_mod` WHERE module_name = :mod_name AND mod_status = :mod_status";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':mod_name', $mod_name, PDO::PARAM_STR);
        $query->bindParam(':mod_status', $mod_status, PDO::PARAM_STR);
        $query->execute();

        $res = $query->fetch(PDO::FETCH_ASSOC);

        if ($res > 0)
            return true;
        else
            return false;

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


     public function getActiveMods()
     {

        if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
        $page_number = 1; //if there's no page number, set it to 1
    }

        $item_per_page = 25;

        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_mod`");
        $rows = count($result);
        //echo "row". $rows;
        //break records into pages
        $total_pages = ceil($rows/$item_per_page);
        
        //get starting position to fetch the records
        $page_position = (($page_number-1) * $item_per_page);
        $mod_status = "enabled";
        $mod_type = "custom";
        $sql = "SELECT * FROM `wi_mod` WHERE mod_status = :mod_status AND mod_type=:mod_type ORDER BY `mod_id` ASC LIMIT :page, :item_per_page";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':mod_status', $mod_status, PDO::PARAM_STR);
        $query->bindParam(':mod_type', $mod_type, PDO::PARAM_STR);
        $query->bindParam(':page', $page_position, PDO::PARAM_INT);
        $query->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);
        $query->execute();
        echo '<ul id="draggable" class="ui-widget-header">';
        while ($res = $query->fetch(PDO::FETCH_ASSOC)) {
            echo '<li id="'.$res['module_name'] . '" title="'.$res['module_name'] . '" class="ui-draggable ui-draggable-handle '.$res['mod_font'] . '"></li>';
        }
        echo '</ul>';
         $Pagination = WIModules::Pagination($item_per_page, $page_number, $rows, $total_pages);
    //print_r($Pagination);


         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagination;
    echo '</div>';

     }


     public function CheckModPower($modName)
     {
        
     }

         public function getMod($mod)
    {
        //echo $mod;
        //echo   'WIAdmin/WIModule/' .$mod.'/'.$mod.'.php';
        $directory = dirname(dirname(dirname(__FILE__)));
        require_once $directory . '/WIModule/' .$mod.'/'.$mod.'.php';
        
       // echo $mod;
        $mod = new $mod;

        $mod->mod_name();
    }

    public function EditMod($mod)
    {
        //echo $mod;
        //echo   'WIAdmin/WIModule/' .$mod.'/'.$mod.'.php';
        require_once  'WIAdmin/WIModule/' .$mod.'/'.$mod.'.php';
        
       // echo $mod;
        $mod = new $mod;

        $mod->mod_name();
    }

    public function editContents($mod_name, $title, $para)
    {
        $sql = "SELECT  FROM `wi_site` WHERE `id` =:id";

        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }


    public function module($page_id, $column)
    {
        $id = "1";
        $name = $page_id;
        //echo $name;
        $sql = "SELECT `multi_lang` FROM `wi_site` WHERE `id` =:id";

        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        $result = $query->fetch();
        //echo $result['multi_lang'];
        $mlang = $result['multi_lang'];
        
   // echo $mlang;

        $sql1 = "SELECT * FROM `wi_modules` WHERE `name`=:name";
        $query1 = $this->WIdb->prepare($sql1);
        $query1->bindParam(':name', $name, PDO::PARAM_STR);
        $query1->execute();

        $res = $query1->fetch(PDO::FETCH_ASSOC);
       // print_r($res);

        if ($column === "text") {
            $trans = "trans";
        }elseif ($column === "text1") {
            $trans = "trans1";
        }elseif ($column === "text2") {
            $trans = "trans2";
        }elseif ($column === "text3") {
            $trans = "trans3";
        }elseif ($column === "text4") {
            $trans = "trans4";
        }elseif ($column === "text5") {
            $trans = "trans5";
        }elseif ($column === "text6") {
            $trans = "trans6";
        }
        //echo $trans;
        $lange = $res[$trans];
        $text  = $res[$column];

       // echo $lange;
        if ($mlang === "off"){
            echo $text;
        }else{
            echo WILang::get($lange);
        }

    }

    public function ModName($page_id)
    {
        $sql = "SELECT * FROM `wi_page` WHERE `name`=:page";

        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':page', $page_id, PDO::PARAM_STR);
        $query->execute();

        $res = $query->fetch(PDO::FETCH_ASSOC);

        $mod_name = $res['contents'];

        return $mod_name;
    }


    public function createMod($contents, $mod_name)
    {
          $directory = dirname(dirname(dirname(__FILE__))) . '/WIModule';
     // echo $directory.$pageName;
      $NewPage = fopen($directory. '/'  .$mod_name .'/ '  .$mod_name . '.php', "w") or die("Unable to open file!");

      $File = '<?php

/**
* 
*/
class ' . $mod_name. ' 
{
    
    function __construct()
    {
        
    }

    public function editMod()
    {
              echo "<div id="remove">
      <a href="#">
      <button id="delete" onclick="WIMod.delete(event);">Delete</button>
      </a>
       <div id="dialog-confirm" title="Remove Module?" class="hide">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;">
  </span>Are you sure?</p>
  <p> This will remove the module and any unsaved data.</p>
  <span><button class="btn btn-danger" onclick="WIMod.remove(event);">Remove</button> <button class="btn" onclick="WIMod.close(event);">Close</button></span>
</div>' . $contents . '
     
     </div>
";
    }

    public function mod_name()
    {
        echo ' . $contents . ';
    }
}




';
     
      fwrite($NewPage, $File);
      fclose($NewPage);
    

    $msg = "Successfully created Module";

    $result = array(
                "status" => "success",
                "msg"    => $msg
            );
            
            echo json_encode($result);

        }


        public function moduleImg($page_id, $column)
    {
        $sql1 = "SELECT * FROM `wi_modules` WHERE `name`=:name";
        $query1 = $this->WIdb->prepare($sql1);
        $query1->bindParam(':name', $page_id, PDO::PARAM_STR);
        $query1->execute();

        $res = $query1->fetch(PDO::FETCH_ASSOC);
            if ($res > 0) {
                echo ' <img class="img-responsive cp" id="Pic" src="WIMedia/Img/'. $page_id . '/'. $res[$column] . '.PNG" style="width:120px; height:120px;">
                    <button class="btn mediaPic" onclick="WIMedia.changePic()">Change Picture</button>
                                
                            </div>';
            }else{

            echo '
            <div class="col-lg-8 col-md-3 col-sm-2">
                 <img class="img-responsive cp" id="Pic" src="WIMedia/Img/placeholder.png" style="width:120px; height:120px;">
                    <button class="btn mediaPic" onclick="WIMedia.changePic()">Change Picture</button>
                                
                            </div>';
                        }


    }


}