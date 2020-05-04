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

        public function InstallElements()
    {
        
         if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
        $page_number = 1; //if there's no page number, set it to 1
    }

        $item_per_page = 15;


        $onclick = "nextElement";
        //get starting position to fetch the records
        $page_position = (($page_number-1) * $item_per_page);
        $dir = dirname(dirname(dirname(__FILE__))) . '/WIModule/elements/';
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
     
    var module = "' . $this->InstallElementToggle($value) . '";

                       if (module === "power_off"){
                        $("#' . $value . '-Install").removeClass("btn-success active");
                        $("#' . $value . '-Uninstall").addClass("btn-danger active");
                       }else if (module === "power_on"){
                        $("#' . $value . '-Uninstall").removeClass("btn-danger active");
                        $("#' . $value . '-Install").addClass("btn-success active");
                       }

                    $("#' . $value . '-Install").click(function(){
                        $("#' . $value . '-Uninstall").removeClass("btn-danger active")
                        $("#' . $value . '-Install").addClass("btn-success active");
                        WIMod.installElement("' . $value . '","Jules Warner");
                    })

                    $("#' . $value . '-Uninstall").click(function(){
                       $("#' . $value . '-Install").removeClass("btn-success active")
                        $("#' . $value . '-Uninstall").addClass("btn-danger active");
                        WIMod.uninstallElements("' . $value . '","Jules Warner");
                    })
</script>';
        }

        }

          $Pagin = $this->Page->Pagination($item_per_page, $page_number, $modTotal, $total_pages, $onclick);
    //print_r($Pagination);


         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagin;
    echo '</div>';
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


        $onclick = "NextInstalledMod";
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
     
    var module = "' . $this->InstallToggle($value) . '";

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

          $Pagin = $this->Page->Pagination($item_per_page, $page_number, $modTotal, $total_pages, $onclick);
    //print_r($Pagination);


         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagin;
    echo '</div>';
    }


    public function getElements()
    {

         if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
        $page_number = 1; //if there's no page number, set it to 1
    }

        $item_per_page = 15;
        $power = "power_on";
        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_elements` WHERE element_powered =:power",
                     array(
                       "power" => $power
                ));
        $rows = count($result);

        $onclick = "nextElement";
        //break records into pages
        $total_pages = ceil($rows/$item_per_page);
        
        //get starting position to fetch the records
        $page_position = (($page_number-1) * $item_per_page);
        

        $sql = "SELECT * FROM `wi_elements` WHERE element_powered =:power ORDER BY `element_id` ASC LIMIT :page, :item_per_page";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':page', $page_position, PDO::PARAM_INT);
         $query->bindParam(':power' ,$power, PDO::PARAM_STR);
        $query->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);
        $query->execute();
/*
        $result = $this->WIdb->select("SELECT * FROM `wi_elements` WHERE element_powered =:power ORDER BY `element_id` ASC LIMIT :page, :item_per_page", 
            array(
            "element_powered" => $page_position,
            "keyword" => $keyword,
            "trans"  => $trans
            )
        );*/
        echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="elementsContents">';
        
        echo '<ul class="contents">';
        while ($res = $query->fetch(PDO::FETCH_ASSOC)) {

            $element_name = $res['element_name'];
            
              
             echo '<div class="col-md-4">
        <div class="panel panel-info">
        <div class="panel-heading">' . $element_name . '</div>
        <div class="panel-body">
        <input type="hidden" name="' . $element_name . '"  class="btn-group-value" id="' . $element_name . '" value="'. $res['element_status'] . '" />
             <button type="button" name="' . $element_name . '" value="enabled" id="' . $element_name . '-enabled"  class="btn">Enabled</button>
         <button type="button" name="' . $element_name . '" value="disabled" id="' . $element_name . '-disabled" class="btn btn-danger active" >Disabled</button>
        </div>
        <div class="panel-heading">
            
        </div>
        </div>';
                if (strpos($element_name,"_") != false){
                $element_name = str_replace("_", " ", $element_name);
            }
    echo '</div>  <script type="text/javascript">
     
    var element = "' . $res['element_status'] . '";

                       if (element === "disabled"){
                        $("#' . $element_name . '-enabledd").removeClass("btn-success active");
                        $("#' . $element_name. '-disable").addClass("btn-danger active");
                       }else if (element === "enabled"){
                        $("#' . $element_name . '-disabled").removeClass("btn-danger active");
                        $("#' . $element_name . '-enabled").addClass("btn-success active");
                       }



                    $("#' . $element_name . '-enabled").click(function(){
                        
                        $("#' . $element_name . '-enabled").attr("value", "enabled")
                        $("#' . $element_name . '-disabled").removeClass("btn-danger active")
                        $("#' . $element_name. '-enabled").addClass("btn-success active");
                        WIMod.enableElement("' . $element_name . '", "enabled");
                    })

                    $("#' . $element_name . '-disabled").click(function(){
                       
                        $("#' . $element_name . '-disabled").attr("value", "disabled")
                        $("#' . $element_name . '-enabled").removeClass("btn-success active")
                        $("#' . $element_name . '-disabled").addClass("btn-danger active");
                        WIMod.disableElement("' . $element_name . '", "disabled");
                    })
</script>';
        }
        

         $Pagin = $this->Page->Pagination($item_per_page, $page_number, $rows, $total_pages, $onclick);
    //print_r($Pagination);
         echo '</ul>';

         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagin;
    echo '</div></div>';
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
                    "SELECT * FROM `wi_modules`");
        $rows = count($result);

        $onclick = "nextMod";
        //break records into pages
        $total_pages = ceil($rows/$item_per_page);
        
        //get starting position to fetch the records
        $page_position = (($page_number-1) * $item_per_page);
        

        $sql = "SELECT * FROM `wi_modules` ORDER BY `mod_id` ASC LIMIT :page, :item_per_page";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':page', $page_position, PDO::PARAM_INT);
        $query->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);
        $query->execute();
        echo '<ul class="contents">';
        while ($res = $query->fetch(PDO::FETCH_ASSOC)) {
             echo '<div class="col-md-4">
        <div class="panel panel-info">
        <div class="panel-heading">' . $res['name'] . '</div>
        <div class="panel-body">
        <input type="hidden" name="' . $res['name'] . '" class="btn-group-value" id="' . $res['name'] . '" value="'. $res['name'] . '" />
             <button type="button" name="' . $res['name'] . '" value="enabled" id="' . $res['name'] . '-enabled"  class="btn">Enabled</button>
         <button type="button" name="' . $res['name'] . '" value="disabled" id="' . $res['name'] . '-disabled" class="btn btn-danger active" >Disabled</button>
        </div>
        <div class="panel-heading">
            
        </div>
        </div>
    </div>  <script type="text/javascript">
     
    var module = "' . $res['mod_status'] . '";

                       if (module === "disabled"){
                        $("#' . $res['name'] . '-enabledd").removeClass("btn-success active");
                        $("#' . $res['name'] . '-disable").addClass("btn-danger active");
                       }else if (module === "enabled"){
                        $("#' . $res['name'] . '-disabled").removeClass("btn-danger active");
                        $("#' . $res['name'] . '-enabled").addClass("btn-success active");
                       }



                    $("#' . $res['name'] . '-enabled").click(function(){
                        
                       // $("#' . $res['name'] . '-enabled").attr("value", "enabled")
                        $("#' . $res['name'] . '-disabled").removeClass("btn-danger active")
                        $("#' . $res['name'] . '-enabled").addClass("btn-success active");
                        WIMod.enable("' . $res['name'] . '", "enabled");
                    })

                    $("#' . $res['name'] . '-disabled").click(function(){
                       
                       // $("#' . $res['name'] . '-disabled").attr("value", "disabled")
                        $("#' . $res['name'] . '-enabled").removeClass("btn-success active")
                        $("#' . $res['name'] . '-disabled").addClass("btn-danger active");
                        WIMod.disable("' . $res['name'] . '", "disabled");
                    })
</script>';
        }
        echo '</ul>';

         $Pagin = $this->Page->Pagination($item_per_page, $page_number, $rows, $total_pages, $onclick);
    //print_r($Pagination);


         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagin;
    echo '</div>';
    }

        public function getPageModules()
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
                    "SELECT * FROM `wi_modules`");
        $rows = count($result);

        $onclick = "nextMod";
        //break records into pages
        $total_pages = ceil($rows/$item_per_page);
        
        //get starting position to fetch the records
        $page_position = (($page_number-1) * $item_per_page);
        

        $sql = "SELECT * FROM `wi_modules` ORDER BY `id` ASC LIMIT :page, :item_per_page";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':page', $page_position, PDO::PARAM_INT);
        $query->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);
        $query->execute();
          echo '<ul class="nav nav-list accordion-group">';
        while ($res = $query->fetch(PDO::FETCH_ASSOC)) {
            //var_dump($res);
            echo '<div class="wicreate ui-draggable">';
                     echo $res['name'] . '
                  </div>';
        }
         $Pagin = $this->Page->Pagination($item_per_page, $page_number, $rows, $total_pages, $onclick);
    //print_r($Pagination);
         echo '</li></ul>';
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
        $onclick = "nextInstalledModule";
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

         $Pagination = $this->Page->Pagination($item_per_page, $page_number, $rows, $total_pages, $onclick);
    //print_r($Pagination);


         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagination;
    echo '</div>';
    }



    public static function moduleToggle($column, $mod_name) 
    {
        
        $result['$column'] = $this->WIdb->selectColumn('SELECT * FROM `wi_mod` WHERE `module_name` = :mod_name', 
            array(
                'mod_name' => $mod_name
                ), 
            $column);
        return $result[$column];
        //$query = $WIdb->prepare('SELECT * FROM `wi_mod` WHERE `module_name` = :mod_name');
        //$query->bindParam(':mod_name', $mod_name, PDO::PARAM_STR);
       // $query->execute();
       // $res = $query->fetch(PDO::FETCH_ASSOC);
       //return $res[$column];
    }

        public function InstallToggle($mod_name) 
    {
/*        $WIdb = WIdb::getInstance();

        $query = $WIdb->prepare('SELECT * FROM `wi_mod` WHERE `module_name` = :mod_name');
        $query->bindParam(':mod_name', $mod_name, PDO::PARAM_STR);
        $query->execute();

        $res = $query->fetch(PDO::FETCH_ASSOC);*/

        $result = $this->WIdb->select("SELECT * FROM `wi_mod` WHERE `module_name` = :mod_name", 
            array(
            "mod_name" => $mod_name
            )
        );

        foreach($result as $result){

        if($result['module_name'] === $mod_name)
            return "enabled";
        else
            return "disabled";
        }
    }


    public  function InstallElementToggle($mod_name) 
    {
/*        $WIdb = WIdb::getInstance();

        $query = $WIdb->prepare('SELECT * FROM `wi_elements` WHERE `element_type` = :mod_name or `element_name` =:mod_name');
        $query->bindParam(':mod_name', $mod_name, PDO::PARAM_STR);
        $query->execute();

        $res = $query->fetch(PDO::FETCH_ASSOC);*/

        $result = $this->WIdb->select("SELECT * FROM `wi_elements` WHERE `element_type` = :mod_name or `element_name` =:mod_name", 
            array(
            "mod_name" => $mod_name
            )
        );
        foreach($result as $result){

        if($result['element_name'] || $result['element_type']  === $mod_name)
            return "power_on";
        else
            return "power_off";
        }
    }

     public function installElement($mod_name)
    {
        //echo dirname(dirname(dirname(__FILE__))) . '/WIModule/elements/' . $mod_name . '/' . $mod_name . '.php';

        require_once dirname(dirname(dirname(__FILE__))) . '/WIModule/elements/' . $mod_name . '/' . $mod_name . '.php';

        $elementName = $mod_name;
        $WIElement = new $elementName();
        $WIElement->Install($mod_name);
    
        $msg = "Successfully Installed " . $mod_name . " element";

        $result = array(
            "status"  => "success",
            "msg"     => $msg
        );

        echo json_encode($result);
    }

    public function unistall_Element($mod_name)
    {

        $this->WIdb->delete("wi_elements", "element_name = :mod_name", array( "mod_name" => $mod_name ));


       /* $sql = "DELETE FROM `wi_elements` WHERE element_name= :mod_name";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':mod_name', $mod_name, PDO::PARAM_STR);
        $query->execute();*/

    }

    public function install_mod($mod_name, $author)
    {
         $this->WIdb->insert('wi_mod', array(
            "module_name" => $mod_name,
            "mod_author" => $author
        )); 

    }

    public function uninstall_mod($mod_name)
    {
/*        //

        $sql = "DELETE FROM `wi_mod` WHERE module_name= :mod_name";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':mod_name', $mod_name, PDO::PARAM_STR);
        $query->execute();*/
        $this->WIdb->delete("wi_mod", "module_name = :mod_name", array( "mod_name" => $mod_name ));

    }


    public function active_available_mod($mod_name, $enable)
    {
        //INSERT INTO `wi_mod` (module_name, mod_status) VALUES (:mod_name, :mod_status)

/*        $sql = "UPDATE `wi_mod` SET `mod_status` = :mod_status WHERE `module_name` = :mod_name";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':mod_name', $mod_name, PDO::PARAM_STR);
        $query->bindParam(':mod_status', $enable, PDO::PARAM_STR);
        $query->execute();*/

                          $this->WIdb->update(
                    'wi_mod',
                     array(
                         "mod_status" => $enable
                     ),
                     "`module_name` = :mod_name",
                     array("mod_name" => $mod_name)
                );


    }

        public function activateAvailableElements($element_name, $enable)
    {

         
          
        $element_font = "wi_" .$element_name;

        if (strpos($element_name,"_") != false){
                $element_name = str_replace("_", " ", $element_name);
            }
/*        $sql = "UPDATE `wi_elements` SET `element_status` = :element_status, `element_font`=:element_font WHERE `element_name` = :element_name";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':element_name', $element_name, PDO::PARAM_STR);
        $query->bindParam(':element_status', $enable, PDO::PARAM_STR);
        $query->bindParam(':element_font', $element_font, PDO::PARAM_STR);
        $query->execute();*/

        $this->WIdb->update(
                    'wi_elements',
                     array(
                         "element_status" => $enable,
                         "element_font" => $element_font
                     ),
                     "`element_name` = :element_name",
                     array("element_name" => $element_name)
                );


    }

        public function active_available_elements($mod_name, $enable)
    {
        //INSERT INTO `wi_mod` (module_name, mod_status) VALUES (:mod_name, :mod_status)

/*        $sql = "UPDATE `wi_elements` SET `element_status` = :element_status WHERE `element_name` = :element_name";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':element_name', $mod_name, PDO::PARAM_STR);
        $query->bindParam(':element_status', $enable, PDO::PARAM_STR);
        $query->execute();*/

        $this->WIdb->update(
                    'wi_elements',
                     array(
                         "element_status" => $enable
                     ),
                     "`element_name` = :element_name",
                     array("element_name" => $mod_name)
                );


    }

        public function deactive_available_mod($mod_name, $disable)
    {
        //echo $disable;
        //echo $mod_name;
/*        $sql = "UPDATE `wi_mod` SET `mod_status` = :mod_status WHERE `module_name` = :mod_name";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':mod_name', $mod_name, PDO::PARAM_STR);
        $query->bindParam(':mod_status', $disable, PDO::PARAM_STR);
        $query->execute();*/

        $this->WIdb->update(
                    'wi_mod',
                     array(
                         "mod_status" => $disable
                     ),
                     "`module_name` = :mod_name",
                     array("mod_name" => $mod_name)
                );
    }

     public function ActiveMods()
     {

                 if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
        $page_number = 1; //if there's no page number, set it to 1
    }

        $onclick = "nextMod";
        $element_status = "enabled";
        $item_per_page = 15;
        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_mod`",
                     array(
                       "element_status" => $element_status
                ));
        $rows = count($result);

        //break records into pages
        $total_pages = ceil($rows/$item_per_page);
        
        //get starting position to fetch the records
        $page_position = (($page_number-1) * $item_per_page);
        

        $sql = "SELECT * FROM `wi_mod` ORDER BY `mod_id` ASC LIMIT :page, :item_per_page";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':page', $page_position, PDO::PARAM_INT);
         $query->bindParam(':element_status' ,$element_status, PDO::PARAM_STR);
        $query->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);
        $query->execute();
       
        echo '<ul id="draggable" class="ui-widget-header">';
        while ($res = $query->fetch(PDO::FETCH_ASSOC)) {
            echo '<li id="'.$res['module_name'] . '" title="'.$res['module_name'] . '" class="ui-draggable ui-draggable-handle '.$res['mod_font'] . '"></li>';
        }
        echo '</ul>';

     }


          public function ActiveElements()
     {

         if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
        $page_number = 1; //if there's no page number, set it to 1
    }

        $onclick = "nextElement";
        $element_status = "enabled";
        $item_per_page = 15;
        $mod_type = "element";
        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_elements` WHERE `element_status` = :element_status",
                     array(
                       "element_status" => $element_status
                ));
        $rows = count($result);

        //break records into pages
        $total_pages = ceil($rows/$item_per_page);
        
        //get starting position to fetch the records
        $page_position = (($page_number-1) * $item_per_page);
        

        $sql = "SELECT * FROM `wi_elements` WHERE `element_status` = :element_status ORDER BY `element_id` ASC LIMIT :page, :item_per_page";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':page', $page_position, PDO::PARAM_INT);
         $query->bindParam(':element_status' ,$element_status, PDO::PARAM_STR);
        $query->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);
        $query->execute();

        echo '<ul id="draggable" class="ui-widget-header">';
        while ($res = $query->fetch(PDO::FETCH_ASSOC)) {
            echo '<li id="'.$res['element_name'] . '" title="'.$res['element_name'] . '" class="ui-draggable ui-draggable-handle '.$res['element_font'] . '"></li>
                $( "button#modEle" ).mousedown(function() {
              $("li#'.$res['element_name'] . '").attr("draggable", true);
            });';
        }
         $Pagin = $this->Page->Pagination($item_per_page, $page_number, $rows, $total_pages, $onclick);
    //print_r($Pagination);
         echo '</ul>';

         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagin;
    echo '</div>';

     }


     public function modules()
     {

         if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
        $page_number = 1; //if there's no page number, set it to 1
    }

        $onclick = "nextElement";
        $element_status = "enabled";
        $item_per_page = 15;
        $power = "power_on";
        $type = "Grid";
        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_modules`");
        $rows = count($result);

        //break records into pages
        $total_pages = ceil($rows/$item_per_page);
        
        //get starting position to fetch the records
        $page_position = (($page_number-1) * $item_per_page);
        
        $sql = "SELECT * FROM `wi_modules` ORDER BY `id` ASC LIMIT :page, :item_per_page";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':page', $page_position, PDO::PARAM_INT);
        $query->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);
        $query->execute();


        echo '<ul class="nav nav-list accordion-group">';
        while ($res = $query->fetch(PDO::FETCH_ASSOC)) {
            //var_dump($res);
            echo '<div class="wicreate ui-draggable">
            <a href="javascript:void(0);" id="editting-' .$res['id'] . '" class="editting editting-' .$res['id'] . ' label label-important"><i class="far fa-edit"></i>Edit</a>
                    <script>
                  $(".editting-' .$res['id'] . '").click(function() {
                    $(".attrsPanels").css("display","block")
                 });
                  </script>
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a>
                     <span class="drag label"><i class="icon-move"></i>Drag</span>
                     <div class="preview">' .$res['name'] . '</div>
                    <div class="view">';
                    self::attrsPanels(); 
                     echo $res['element'] . '
                    </div>';
                  echo '</div>';
        }
         $Pagin = $this->Page->Pagination($item_per_page, $page_number, $rows, $total_pages, $onclick);
    //print_r($Pagination);
         echo '</li></ul>';
         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagin;
    echo '</div>';

     }

     public function ActiveElementsGrid()
     {

         if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
        $page_number = 1; //if there's no page number, set it to 1
    }

        $onclick = "nextElement";
        $element_status = "enabled";
        $item_per_page = 15;
        $power = "power_on";
        $type = "Grid";
        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_elements` WHERE `element_status` = :element_status AND `element_powered` =:power AND `element_type`=:type",
                     array(
                       "element_status" => $element_status,
                       "power" => $power,
                       "type" => $type,
                ));
        $rows = count($result);

        //break records into pages
        $total_pages = ceil($rows/$item_per_page);
        
        //get starting position to fetch the records
        $page_position = (($page_number-1) * $item_per_page);
        

        $sql = "SELECT * FROM `wi_elements` WHERE `element_status` = :element_status AND `element_powered` =:power AND `element_type` =:type ORDER BY `element_id` ASC LIMIT :page, :item_per_page";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':page', $page_position, PDO::PARAM_INT);
         $query->bindParam(':element_status' ,$element_status, PDO::PARAM_STR);
          $query->bindParam(':power' ,$power, PDO::PARAM_STR);
          $query->bindParam(':type' ,$type, PDO::PARAM_STR);
        $query->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);
        $query->execute();


        echo '<ul class="nav nav-list accordion-group">';
        while ($res = $query->fetch(PDO::FETCH_ASSOC)) {
            //var_dump($res);
            echo '<div class="grid box-element wicreate ui-draggable">
            <a href="javascript:void(0);" id="' .$res['element_id'] . '" onclick="WIScript.gridEdit(`' .$res['element_name'] . '`)" class="edit editting-' .$res['element_id'] . ' label label-important remove"><i class="far fa-edit"></i>Edit</a>
                
                <div class="rowActions groupActions">
                    <div class="actionBtnWrapper">
                <button class="btn item_handle" type="button"></button>
                <button class="btn item_editToggle" type="button"></button>
                <button class="btn item_clone" type="button"></button>
                <button class="btn item_remove" type="button"></button>
                </div>
                </div>
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a>
                     <span class="drag label"><i class="icon-move"></i>Drag</span>';
                     self::attrsPanels(); 
                     echo $res['element'] . '
                  </div>';
        }
         $Pagin = $this->Page->Pagination($item_per_page, $page_number, $rows, $total_pages, $onclick);
    //print_r($Pagination);
         echo '</li></ul>';
         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagin;
    echo '</div>';

     }

          public function ActiveElementsBase()
     {

         if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
        $page_number = 1; //if there's no page number, set it to 1
    }

        $onclick = "nextElement";
        $element_status = "enabled";
        $item_per_page = 15;
        $power = "power_on";
        $type = "Base";
        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_elements` WHERE `element_status` = :element_status AND `element_powered` =:power AND `element_type`=:type",
                     array(
                       "element_status" => $element_status,
                       "power" => $power,
                       "type" => $type,
                ));
        $rows = count($result);

        //break records into pages
        $total_pages = ceil($rows/$item_per_page);
        
        //get starting position to fetch the records
        $page_position = (($page_number-1) * $item_per_page);
        

        $sql = "SELECT * FROM `wi_elements` WHERE `element_status` = :element_status AND `element_powered` =:power AND `element_type` =:type ORDER BY `element_id` ASC LIMIT :page, :item_per_page";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':page', $page_position, PDO::PARAM_INT);
         $query->bindParam(':element_status' ,$element_status, PDO::PARAM_STR);
          $query->bindParam(':power' ,$power, PDO::PARAM_STR);
          $query->bindParam(':type' ,$type, PDO::PARAM_STR);
        $query->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);
        $query->execute();

        echo '<ul class="nav nav-list accordion-group">';
        while ($res = $query->fetch(PDO::FETCH_ASSOC)) {
            //var_dump($res);

            if($res["element_name"] === "Font Awesome")
            {
                 echo '<div class="box box-element ui-draggable">
                 <div id="gridbase"><a href="javascript:void(0);" id="' .$res['element_id'] . '" onclick="WIScript.BaseEdit(`' .$res['element_name'] . '`)" class="fieldEdit editting-' .$res['element_id'] . ' label label-important remove"><i class="far fa-edit"></i>edit div</a></div>
                    <div class="optset">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">Align <span class="caret">Styles</span></a>
                        <ul class="dropdown-menu">';
                          self::font_awesome_options();
                        echo '</ul>
                      </span>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);" onclick="WIScript.font_awesome()">All the Icons <span class="caret">All the Icons</span></a>
                        <ul class="dropdown-menu" id="font_awesome">
                        </ul>
                      </span>
                    </span>
                    </div>
                    ';
                    self::fieldEdit();
                   echo $res['element'] . '
                  </div>';
            }else if($res["element_name"] === "Image")
            {
                echo '<div class="box box-element ui-draggable">
                           <div id="gridbase"><a href="javascript:void(0);" id="' .$res['element_id'] . '" onclick="WIScript.BaseEdit(`' .$res['element_name'] . '`)" class="fieldEdit editting-' .$res['element_id'] . ' label label-important remove"><i class="far fa-edit"></i>edit div</a></div>
                    <div class="optset">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">Align <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="javascript:void(0); "rel="">Default</a></li>
                          <li class=""><a href="javascript:void(0);" rel="text-left">Left</a></li>
                          <li class=""><a href="=javascript:void(0);" rel="text-center">Center</a></li>
                          <li class=""><a href="javascript:void(0);" rel="text-right">Right</a></li>
                        </ul>
                      </span>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Emphasis <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="javascript:void(0);" rel="">Default</a></li>
                          <li class=""><a href="#" rel="emphasized">Emphasized</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized2">Emphasized 2</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized3">Emphasized 3</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized4">Emphasized 4</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized-orange">Emphasized orange</a></li>
                        </ul>
                      </span>
                    </span>
                    </div>';
                    self::fieldEdit();
                   echo $res['element'] . '
                  </div>';
            }else if($res["element_name"] === "Color")
            {
            echo '<div class="box box-element ui-draggable">
            <div id="gridbase"><a href="javascript:void(0);" id="' .$res['element_id'] . '" onclick="WIScript.BaseEdit(`' .$res['element_name'] . '`)" class="fieldEdit editting-' .$res['element_id'] . ' label label-important remove"><i class="far fa-edit"></i>edit div</a></div>
                    <div class="optset">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">Align <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="javascript:void(0); "rel="">Default</a></li>
                          <li class=""><a href="javascript:void(0);" rel="text-left">Left</a></li>
                          <li class=""><a href="=javascript:void(0);" rel="text-center">Center</a></li>
                          <li class=""><a href="javascript:void(0);" rel="text-right">Right</a></li>
                        </ul>
                      </span>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Emphasis <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="javascript:void(0);" rel="">Default</a></li>
                          <li class=""><a href="#" rel="emphasized">Emphasized</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized2">Emphasized 2</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized3">Emphasized 3</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized4">Emphasized 4</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized-orange">Emphasized orange</a></li>
                        </ul>
                      </span>
                    </span>
                    </div>';
                    self::fieldEdit();
                   echo $res['element'] . '
                  </div>';
            }else{
                           echo '<div class="box box-element ui-draggable">
                           <div id="gridbase"><a href="javascript:void(0);" id="' .$res['element_id'] . '" onclick="WIScript.BaseEdit(`' .$res['element_name'] . '`)" class="fieldEdit editting-' .$res['element_id'] . ' label label-important remove"><i class="far fa-edit"></i>edit div</a></div>
                    <div class="optset">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" role="button" id="editorModal" onclick="WIScript.Editor();">Editor</button>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">Align <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="javascript:void(0); "rel="">Default</a></li>
                          <li class=""><a href="javascript:void(0);" rel="text-left">Left</a></li>
                          <li class=""><a href="=javascript:void(0);" rel="text-center">Center</a></li>
                          <li class=""><a href="javascript:void(0);" rel="text-right">Right</a></li>
                        </ul>
                      </span>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Emphasis <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="javascript:void(0);" rel="">Default</a></li>
                          <li class=""><a href="#" rel="emphasized">Emphasized</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized2">Emphasized 2</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized3">Emphasized 3</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized4">Emphasized 4</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized-orange">Emphasized orange</a></li>
                        </ul>
                      </span>
                    </span>
                    </div>';

                    self::fieldEdit();
                   echo $res['element'] . '
                  </div>';
            }
 


        }
         $Pagin = $this->Page->Pagination($item_per_page, $page_number, $rows, $total_pages, $onclick);
    //print_r($Pagination);
         echo '</li></ul>';
         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagin;
    echo '</div>';

     }

      public function ActiveElementsComponents()
     {

         if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
        $page_number = 1; //if there's no page number, set it to 1
    }

        $onclick = "nextElement";
        $element_status = "enabled";
        $item_per_page = 15;
        $power = "power_on";
        $type = "Components";
        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_elements` WHERE `element_status` = :element_status AND `element_powered` =:power AND `element_type`=:type",
                     array(
                       "element_status" => $element_status,
                       "power" => $power,
                       "type" => $type,
                ));
        $rows = count($result);

        //break records into pages
        $total_pages = ceil($rows/$item_per_page);
        
        //get starting position to fetch the records
        $page_position = (($page_number-1) * $item_per_page);
        

        $sql = "SELECT * FROM `wi_elements` WHERE `element_status` = :element_status AND `element_powered` =:power AND `element_type` =:type ORDER BY `element_id` ASC LIMIT :page, :item_per_page";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':page', $page_position, PDO::PARAM_INT);
         $query->bindParam(':element_status' ,$element_status, PDO::PARAM_STR);
          $query->bindParam(':power' ,$power, PDO::PARAM_STR);
          $query->bindParam(':type' ,$type, PDO::PARAM_STR);
        $query->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);
        $query->execute();

        echo '<ul class="nav nav-list accordion-group">';
        while ($res = $query->fetch(PDO::FETCH_ASSOC)) {
            //var_dump($res);
            echo '<div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                    <button type="button" class="btn btn-mini" role="button" id="editorModal" onclick="WIScript.Editor();">Editor</button>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Orientation<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="btn-group-vertical">Vertical</a></li>
                        </ul>
                      </span>
                    </span>
                    ' . $res['element'] .'
                  </div>';


        }
         $Pagin = $this->Page->Pagination($item_per_page, $page_number, $rows, $total_pages, $onclick);
    //print_r($Pagination);
         echo '</li></ul>';
         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagin;
    echo '</div>';

     }

      public function ActiveElementsForms()
     {

         if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
        $page_number = 1; //if there's no page number, set it to 1
    }

        $onclick = "nextElement";
        $element_status = "enabled";
        $item_per_page = 15;
        $power = "power_on";
        $type = "Forms";
        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_elements` WHERE `element_status` = :element_status AND `element_powered` =:power AND `element_type`=:type",
                     array(
                       "element_status" => $element_status,
                       "power" => $power,
                       "type" => $type,
                ));
        $rows = count($result);

        //break records into pages
        $total_pages = ceil($rows/$item_per_page);
        
        //get starting position to fetch the records
        $page_position = (($page_number-1) * $item_per_page);
        

        $sql = "SELECT * FROM `wi_elements` WHERE `element_status` = :element_status AND `element_powered` =:power AND `element_type` =:type ORDER BY `element_id` ASC LIMIT :page, :item_per_page";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':page', $page_position, PDO::PARAM_INT);
         $query->bindParam(':element_status' ,$element_status, PDO::PARAM_STR);
          $query->bindParam(':power' ,$power, PDO::PARAM_STR);
          $query->bindParam(':type' ,$type, PDO::PARAM_STR);
        $query->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);
        $query->execute();

        echo '<ul class="nav nav-list accordion-group">';
        while ($res = $query->fetch(PDO::FETCH_ASSOC)) {
            //var_dump($res);
            echo '<div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button>
                    </span>
                    '.$res['element'] . '
                  </div>';


        }
         $Pagin = $this->Page->Pagination($item_per_page, $page_number, $rows, $total_pages, $onclick);
    //print_r($Pagination);
         echo '</li></ul>';
         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagin;
    echo '</div>';

     }

      public function ActiveElementsJavascript()
     {

         if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
        $page_number = 1; //if there's no page number, set it to 1
    }

        $onclick = "nextElement";
        $element_status = "enabled";
        $item_per_page = 15;
        $power = "power_on";
        $type = "Javascript";
        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_elements` WHERE `element_status` = :element_status AND `element_powered` =:power AND `element_type`=:type",
                     array(
                       "element_status" => $element_status,
                       "power" => $power,
                       "type" => $type,
                ));
        $rows = count($result);

        //break records into pages
        $total_pages = ceil($rows/$item_per_page);
        
        //get starting position to fetch the records
        $page_position = (($page_number-1) * $item_per_page);
        

        $sql = "SELECT * FROM `wi_elements` WHERE `element_status` = :element_status AND `element_powered` =:power AND `element_type` =:type ORDER BY `element_id` ASC LIMIT :page, :item_per_page";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':page', $page_position, PDO::PARAM_INT);
         $query->bindParam(':element_status' ,$element_status, PDO::PARAM_STR);
          $query->bindParam(':power' ,$power, PDO::PARAM_STR);
          $query->bindParam(':type' ,$type, PDO::PARAM_STR);
        $query->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);
        $query->execute();

        echo '<ul class="nav nav-list accordion-group">';
        while ($res = $query->fetch(PDO::FETCH_ASSOC)) {
            //var_dump($res);
            echo '<div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    ' . $res['element'] . '
                  </div>';


        }
         $Pagin = $this->Page->Pagination($item_per_page, $page_number, $rows, $total_pages, $onclick);
    //print_r($Pagination);
         echo '</li></ul>';
         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagin;
    echo '</div>';

     }


    public function ActiveElementsCommonFields()
     {

         if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
        $page_number = 1; //if there's no page number, set it to 1
    }

        $onclick = "nextElement";
        $element_status = "enabled";
        $item_per_page = 15;
        $power = "power_on";
        $type = "Common Fields";
        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_elements` WHERE `element_status` = :element_status AND `element_powered` =:power AND `element_type`=:type",
                     array(
                       "element_status" => $element_status,
                       "power" => $power,
                       "type" => $type,
                ));
        $rows = count($result);

        //break records into pages
        $total_pages = ceil($rows/$item_per_page);
        
        //get starting position to fetch the records
        $page_position = (($page_number-1) * $item_per_page);
        

        $sql = "SELECT * FROM `wi_elements` WHERE `element_status` = :element_status AND `element_powered` =:power AND `element_type` =:type ORDER BY `element_id` ASC LIMIT :page, :item_per_page";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':page', $page_position, PDO::PARAM_INT);
         $query->bindParam(':element_status' ,$element_status, PDO::PARAM_STR);
          $query->bindParam(':power' ,$power, PDO::PARAM_STR);
          $query->bindParam(':type' ,$type, PDO::PARAM_STR);
        $query->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);
        $query->execute();

        echo '<ul id="draggable" class="ui-widget-header control-panel common-fields">';
        while ($res = $query->fetch(PDO::FETCH_ASSOC)) {
            //var_dump($res);
            echo '<li id="'.$res['element_name'] . '" title="'.$res['element_name'] . '" class="ui-draggable ui-draggable-handle '.$res['element_font'] . ' draggable-4">
            '.$res['element_name'] . '
            </li>
            <script type="text/javascript">
                $( "button#modEle" ).mousedown(function() {
              $("li#'.$res['element_name'] . '").attr("draggable", true);
            });
            </script>';
        }
         $Pagin = $this->Page->Pagination($item_per_page, $page_number, $rows, $total_pages, $onclick);
    //print_r($Pagination);
         echo '</ul>';
         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagin;
    echo '</div>';

     }


     public function ActiveElementsHTMLElements()
     {

         if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
        $page_number = 1; //if there's no page number, set it to 1
    }

        $onclick = "nextElement";
        $element_status = "enabled";
        $item_per_page = 15;
        $power = "power_on";
        $type = "HTML Elements";
        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_elements` WHERE `element_status` = :element_status AND `element_powered` =:power AND `element_type`=:type",
                     array(
                       "element_status" => $element_status,
                       "power" => $power,
                       "type" => $type
                ));
        $rows = count($result);

        //break records into pages
        $total_pages = ceil($rows/$item_per_page);
        
        //get starting position to fetch the records
        $page_position = (($page_number-1) * $item_per_page);
        

        $sql = "SELECT * FROM `wi_elements` WHERE `element_status` = :element_status AND `element_powered` =:power AND `element_type`=:type ORDER BY `element_id` ASC LIMIT :page, :item_per_page";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':page', $page_position, PDO::PARAM_INT);
         $query->bindParam(':element_status' ,$element_status, PDO::PARAM_STR);
          $query->bindParam(':power' ,$power, PDO::PARAM_STR);
          $query->bindParam(':type' ,$type, PDO::PARAM_STR);
        $query->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);
        $query->execute();

        echo '<ul id="draggable" class="ui-widget-header control-panel html-elements">';
        while ($res = $query->fetch(PDO::FETCH_ASSOC)) {
            echo '<li id="'.$res['element_name'] . '" title="'.$res['element_name'] . '" class="ui-draggable ui-draggable-handle '.$res['element_font'] . ' draggable-4">
                '.$res['element_name'] . '
            </li>
            <script type="text/javascript">
                $( "button#modEle" ).mousedown(function() {
              $("li#'.$res['element_name'] . '").attr("draggable", true);
            });
            </script>';
        }

         $Pagin = $this->Page->Pagination($item_per_page, $page_number, $rows, $total_pages, $onclick);
    //print_r($Pagination);
         echo '</ul>';

         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagin;
    echo '</div>';

     }

     public function ActiveElementsLayouts()
     {

         if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
        $page_number = 1; //if there's no page number, set it to 1
    }

        $onclick = "nextElement";
        $element_status = "enabled";
        $item_per_page = 15;
        $power = "power_on";
        $type = "Layout";
        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_elements` WHERE `element_status` = :element_status AND `element_powered` =:power AND `element_type`=:type",
                     array(
                       "element_status" => $element_status,
                       "power" => $power,
                       "type" => $type
                ));
        $rows = count($result);

        //break records into pages
        $total_pages = ceil($rows/$item_per_page);
        
        //get starting position to fetch the records
        $page_position = (($page_number-1) * $item_per_page);
        

       $sql = "SELECT * FROM `wi_elements` WHERE `element_status` = :element_status AND `element_powered` =:power AND `element_type`=:type ORDER BY `element_id` ASC LIMIT :page, :item_per_page";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':page', $page_position, PDO::PARAM_INT);
         $query->bindParam(':element_status' ,$element_status, PDO::PARAM_STR);
          $query->bindParam(':power' ,$power, PDO::PARAM_STR);
          $query->bindParam(':type' ,$type, PDO::PARAM_STR);
        $query->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);
        $query->execute();

        echo '<ul id="draggable" class="ui-widget-header control-panel layers">';
        while ($res = $query->fetch(PDO::FETCH_ASSOC)) {
            echo '<li id="'.$res['element_name'] . '" title="'.$res['element_name'] . '" class="draggable-4  '.$res['element_font'] . '">'.$res['element_name'] . '
                
            </li>
                <script type="text/javascript">
                $( "button#modEle" ).mousedown(function() {
              $("li#'.$res['element_name'] . '").attr("draggable", true);
            });
            </script>';
        }
         $Pagin = $this->Page->Pagination($item_per_page, $page_number, $rows, $total_pages, $onclick);
    //print_r($Pagination);
         echo '</ul>';

         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagin;
    echo '</div>';

     }

     public function dropElement($mod_name)
     {

        include_once dirname(dirname(dirname(__FILE__))) . '/WIModule/elements/' .$mod_name.'/'.$mod_name.'.php';
        

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
/*        $sql = "SELECT * FROM `wi_mod` WHERE module_name = :mod_name AND mod_status = :mod_status";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':mod_name', $mod_name, PDO::PARAM_STR);
        $query->bindParam(':mod_status', $mod_status, PDO::PARAM_STR);
        $query->execute();*/

        $result = $this->WIdb->select("SELECT * FROM `wi_mod` WHERE module_name = :mod_name AND mod_status = :mod_status", 
            array(
            "module_name" => $mod_name,
            "mod_status" => $mod_status,
            "trans"  => $trans
            )
        );

        //$res = $query->fetch(PDO::FETCH_ASSOC);

        if ($result[0] > 0)
            return true;
        else
            return false;

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
        $onclick = "nextActiveMod";
        $sql = "SELECT * FROM `wi_mod` ORDER BY `mod_id` ASC LIMIT :page, :item_per_page";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':page', $page_position, PDO::PARAM_INT);
        $query->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);
        $query->execute();
        echo '<ul id="editable" class="ui-widget-header">';
        while ($res = $query->fetch(PDO::FETCH_ASSOC)) {
            echo '<li id="'.$res['module_name'] . '" title="'.$res['module_name'] . '" class="ui-draggable ui-draggable-handle '.$res['mod_font'] . '"></li>';
        }
        echo '</ul>';
         $Pagination = $this->Page->Pagination($item_per_page, $page_number, $rows, $total_pages, $onclick);
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

         public function getMod($mod, $page, $name)
    {
        //echo $mod;
        //echo   'WIAdmin/WIModule/' .$mod.'/'.$mod.'.php';
        $directory = dirname(dirname(dirname(__FILE__)));
        require_once $directory . '/WIModule/' .$mod.'/'.$mod.'.php';
       // echo $mod;
        $mod = new $mod;

        $mod->mod_name($mod, $page);
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
/*        $sql = "SELECT  FROM `wi_site` WHERE `id` =:id";

        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();*/

        $result = $this->WIdb->select("SELECT  FROM `wi_site` WHERE `id` =:id", 
            array(
            "id" => $id
            )
        );
    }


    public function module($page_id, $column)
    {
        $id = "1";
        $name = $page_id;

        $sql = "SELECT `multi_lang` FROM `wi_site` WHERE `id` =:id";

        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch();
        //echo $result['multi_lang'];

        $result = $this->WIdb->select("SELECT `multi_lang` FROM `wi_site` WHERE `id` =:id", 
            array(
            "id" => $id
            )
        );
        $mlang = $result[0]['multi_lang'];
        
   // echo $mlang;

/*        $sql1 = "SELECT * FROM `wi_modules` WHERE `name`=:name";
        $query1 = $this->WIdb->prepare($sql1);
        $query1->bindParam(':name', $name, PDO::PARAM_STR);
        $query1->execute();

        $res = $query1->fetch(PDO::FETCH_ASSOC);
        echo $column;*/

        $res = $this->WIdb->select("SELECT * FROM `wi_modules` WHERE `name`=:name", 
            array(
            "name" => $name
            )
        );
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
        echo $res['$trans'] . "trans";
        echo $trans . "no res";
        $lange = $res[0][$trans];
        
        $text  = $res[0][$column];
        echo $text;

       // echo $lange;
        if ($mlang === "off"){
            echo $text;
        }else{
            echo WILang::get($lange);
        }

    }

    public function ModName($page)
    {
/*        $sql = "SELECT * FROM `wi_page` WHERE `name`=:page";
        echo $page;
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':page', $page, PDO::PARAM_STR);
        $query->execute();

        $res = $query->fetch(PDO::FETCH_ASSOC);*/

        $result = $this->WIdb->select("SELECT * FROM `wi_page` WHERE `name`=:page", 
            array(
            "name" => $name
            )
        );
        $mod_name = $result[0]['contents'];

        return $mod_name;
    }

    public function save_mod( $mod_name, $contents, $content)
    {
        $result = $this->WIdb->select("SELECT * FROM `wi_modules`
                     WHERE `name` = :n",
                     array(
                       "n" => $mod_name
                     ));

        $webpage = "";

        if(count($result) >0){
            $id = $result['id'];
            $element = $webpage;
                $this->WIdb->update(
                    "wi_modules", 
                    $webpage, 
                    "`id` = :id",
                    array( "id" => $id )
               );
        }else{
            $this->WIdb->insert('wi_modules', array(
            "name"     => $mod_name,
            "modulecode"  => $mod_name,
            "element"     => $contents,
            "content"     => $content
           
        )); 
        }

        $file_saved = self::saving_mod($mod_name, $contents, $content);
        if($file_saved == "1")
        {
            $msg = "Successfully created Module and saved as file";

    $result = array(
                "status" => "success",
                "msg"    => $msg
            );
            
            echo json_encode($result);
        }else{


        $msg = "Successfully created Module";

    $result = array(
                "status" => "success",
                "msg"    => $msg
            );
            
            echo json_encode($result);
        }
    }

    public function saving_mod($mod_name, $contents, $content)
    {
         $directory = dirname(dirname(dirname(__FILE__))) . '/WIModule';

          $dir = dirname(dirname(dirname(__FILE__))) .'/WIModule/' .$mod_name ;
             if (!file_exists($dir)) {
                  mkdir($dir, 0777, true);
              }

       if (strpos($contents,'') != false){
                $contents = preg_replace('/\s+/', '', $contents);
            }
        //$contents = str_replace("`", "'", $contents);

      $NewPage = fopen($directory. '/' .$mod_name .'/' .$mod_name . '.php', "w") or die("Unable to open file!");

      $File = '<?php

/**
* 
*/
class ' . $mod_name. '
{
    function __construct()
    {
        $this->WIdb = WIdb::getInstance();
        $this->page = new WIPage();
        $this->mod  = new WIModules();
    }

    public function editMod()
    {
          
     echo `<div id="remove">
      <a href="javavscript:void(0);">
      <button id="delete" onclick="WIMod.delete(event);">Delete</button>
      </a>
       <div id="dialog-confirm" title="Remove Module?" class="hide">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;">
  </span>Are you sure?</p>
  <p> This will remove the module and any unsaved data.</p>
  <span><button class="btn btn-danger" onclick="WIMod.remove(event);">Remove</button> <button class="btn" onclick="WIMod.close(event);">Close</button></span>
</div>' . $contents .'</div>`;
 
    }

    public function editPageContent($page)
    {
        echo `<div class="container-fluid text-center" id="col">`; 

          $lsc = $this->page->GetColums($page, "left_sidebar");
          $rsc = $this->page->GetColums($page, "right_sidebar");
        if ($lsc > 0) {

              echo `<div class="col-sm-1 col-lg-2 col-md-2 col-xl-2 col-xs-2 sidenav" id="sidenavL">`;
         $this->mod->getMod("left_sidebar");  

            echo `</div>
            <div class="col-lg-10 col-md-8 col-sm-8 block" id="block">
            <div class="col-lg-10 col-md-8 col-sm-8" id="Mid">`;
        }

        if ($lsc && $rsc > 0) {
            echo `<div class="col-lg-10 col-md-8 col-sm-8 block" id="block"><div class="col-lg-12 col-md-8 col-sm-8" id="Mid">`;
        }else if($rsc > 0){
            echo `<div class="col-lg-10 col-md-8 col-sm-8 block" id="block"><div class="col-lg-12 col-md-8 col-sm-8" id="Mid">`;

         }else{
        echo `<div class="col-lg-12 col-md-12 col-sm-12 block" id="block"><div class="col-lg-12 col-md-12 col-sm-12" id="Mid">`;
        }
          echo `' .$contents . '`;

         if ($rsc > 0) {

              echo `</div><div class="col-sm-1 col-lg-2 cool-md-2 col-xl-2 col-xs-2 sidenav" id="sidenavR">`;
          $this->mod->getMod("right_sidebar");  

            echo `</div></div>`;
        }

        echo `</div>
            </div>`;
    }

    public function mod_name()
    {
      echo `' . $content.'`;
    }
     
    
}';


     
      fwrite($NewPage, $File);
      fclose($NewPage);
    

      return "1";
    }


        public function moduleImg($page_id, $column)
    {
/*        $sql1 = "SELECT * FROM `wi_modules` WHERE `name`=:name";
        $query1 = $this->WIdb->prepare($sql1);
        $query1->bindParam(':name', $page_id, PDO::PARAM_STR);
        $query1->execute();

        $res = $query1->fetch(PDO::FETCH_ASSOC);*/

        $res = $this->WIdb->select("SELECT * FROM `wi_modules` WHERE `name`=:name", 
            array(
            "name" => $name
            )
        );
            if ($res[0] > 0) {
                echo ' <img class="img-responsive cp" id="Pic" src="WIMedia/Img/'. $page_id . '/'. $res[0][$column] . '.PNG" style="width:120px; height:120px;">
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

     public function attrsPanels()
  {
    echo '<div class="Fpanel WIattrsPanels" style="display:none;" id="WIattrsPanels">
      <div class="fPanelWrap">
      <ul class="fieldEditGroup fieldEditAttrs">
      <li class="attrsClassNameWrap propWrapper controlCount="1" id="PanelWrapers">
      <div class="propControls">
      <button type="button" class="propRemove propControls"></button>
      </div>
      <div class="propInputs">
      <div class="fieldGroup">
      <label for="className">Class</label>
      <select name="className" id="className">
        <option value="fBtnGroup">Grouped</option>
        <option value="FieldGroup">Un-Grouped</option>
        </select>
      </div>
      </div>
      </li>
      </ul>
      <div class="panelActionButtons">
      <button type="button" class="addAttrs">+ Atrribute</button>
      </div>
      </div>
      <div class="Fpanel optionsPanel">
      <div class="FpanelWrap">
        <ul class="fieldEditGroup fieldEditOptions">
          <li class="OptionsXWrapper propWrapper controlCount_2" id="propCont">
          <div class="propControls">
          <button type="button" class="propOrder propControls"></button>
          <button type="button" class="propOrder propControls"></button>
          </div>
          <div class="propInput FinputGroup">
          <input name="button" type="text" value="button" placeholder="label" id="buttons">
          <select name="button" id="buttonz">
          <option value="button" selected="true">appearing_button</option>
          <option value="reset">Reset</option>
          <option value="submit">Submit</option>
          </select>
          <select name="options" id="optional">
          <option selected="true">default</option>
          <option value="primary">Primary</option>
          <option value="error">Error</option>
          <option value="success">Success</option>
          <option value="warning">Warning</option>
          </select>
          </div>
          </li>
        </ul>
        </div>
        <div class="panelActionButtons">
        <button type="button" class="addOptions">+ Options</button>
        </div>
        </div>
        </div>';
  }


  public function font_awesome_options()
  {
    echo '<li class="" rel="fa-6"><a href="#" rel="fa-6">Large</a></li>
                          <li class="" rel="fa-5"><a href="#" rel="fa-5">Big</a></li>
                           <li class="" rel="fa-4"><a href="#" rel="fa-4">Medium</a></li>
                           <li class="" rel="fa-3"><a href="#" rel="fa-3">Normal</a></li>
                          <li class="" rel="fa-2"><a href="#" rel="fa-2">Small</a></li>
                <li class="" rel="fa-1"><a href="#" rel="fa-1">Tiny</a></li>';
  }

  public function font_awesome()
  {
    echo '<li class=""><a href="#" rel="fa fa-address-book fa-3"><i class="fa fa-address-book"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-address-book-o fa-3"><i class="fa fa-address-book-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-address-card fa-3"><i class="fa fa-address-card"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-address-card-o fa-3"><i class="fa fa-address-card-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-address-book fa-3"><i class="fa fa-address-book"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bandcamp fa-3"><i class="fa fa-bandcamp"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bath fa-3"><i class="fa fa-bath"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-id-card fa-3"><i class="fa fa-id-card"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-id-card-o fa-3"><i class="fa fa-id-card-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-eercast fa-3"><i class="fa fa-eercast"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-envelope-open fa-3"><i class="fa fa-envelope-open"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-envelope-open-o fa-3"><i class="fa fa-envelope-open-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-etsy fa-3"><i class="fa fa-etsy"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-free-code-camp fa-3"><i class="fa fa-free-code-camp"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-grav fa-3"><i class="fa fa-grav"></i></a></li>
                          <li class="" ><a href="#" rel="fa fa fa-handshake-o fa-3"><i class="fa fa-handshake-o"></i></a></li>
                          <li class="" ><a href="#" rel="fa fa-id-badge fa-3"><i class="fa fa-id-badge"></i></a></li>
                          <li class="" ><a href="#" rel="fa fa-id-card fa-3"><i class="fa fa-id-card"></i></a></li>
                          <li class="" ><a href="#" rel="fa fa-id-card-o fa-3"><i class="fa fa-id-card-o"></i></a></li>
                          <li class="" ><a href="#" rel="fa fa-imdb fa-3"><i class="fa fa-imdb"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-linode fa-3"><i class="fa fa-linode"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-meetup fa-3"><i class="fa fa-meetup"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-microchip fa-3"><i class="fa fa-microchip"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-podcast fa-3"><i class="fa fa-podcast"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-quora fa-3"><i class="fa fa-quora"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-ravelry fa-3"><i class="fa fa-ravelry"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-shower fa-3"><i class="fa fa-shower"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-snowflake-o fa-3"><i class="fa fa-snowflake-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-superpowers fa-3"><i class="fa fa-superpowers"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-telegram fa-3"><i class="fa fa-telegram"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-thermometer-full fa-3"><i class="fa fa-thermometer-full"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-thermometer-empty fa-3"><i class="fafa-thermometer-empty"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-thermometer-quarter fa-3"><i class="fa fa-thermometer-quarter"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-thermometer-half fa-3"><i class="fa fa-thermometer-half"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-thermometer-three-quarters fa-3"><i class="fa fa-thermometer-three-quarters"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-window-close fa-3"><i class="fa fa-window-close"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-window-close-o fa-3"><i class="fa fa-window-close-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-window-maximize fa-3"><i class="fa fa-window-maximize"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-window-minimize fa-3"><i class="fa fa-window-minimize"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-window-restore fa-3"><i class="fa fa-window-restore"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-user-circle fa-3"><i class="fa fa-user-circle"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-user-circle-o fa-3"><i class="fa fa-user-circle-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-user fa-3"><i class="fa fa-user"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-user-o fa-3"><i class="fa fa-user-o"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-wpexplorer fa-3"><i class="fa fa-wpexplorer"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-adjust fa-3"><i class="fa fa-adjust"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-american-sign-language-interpreting fa-3"><i class="fa fa-american-sign-language-interpreting"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-anchor fa-3"><i class="fa fa-anchor"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-archive fa-3"><i class="fa fa-archive"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-area-chart fa-3"><i class="fa fa-area-chart"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-arrows fa-3"><i class="fa fa-arrows"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-arrows-h fa-3"><i class="fa fa-arrows-h"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-arrows-v fa-3"><i class="fa fa-arrows-v"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-assistive-listening-systems fa-3"><i class="fa fa-assistive-listening-systems"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-asterisk fa-3"><i class="fa fa-asterisk"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-at fa-3"><i class="fa fa-at"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-audio-description"><i class="fa fa-audio-description"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-car fa-3"><i class="fa fa-car"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-balance-scale fa-3"><i class="fa fa-balance-scale"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-ban fa-3"><i class="fa fa-ban"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-university fa-3"><i class="fa fa-university"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bar-chart fa-3"><i class="fa fa-bar-chart"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-barcode fa-3"><i class="fa fa-barcode"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bars fa-3"><i class="fa fa-bars"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-battery-full fa-3"><i class="fa fa-battery-full"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-battery-empty fa-3"><i class="fa fa-battery-empty"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-battery-quarter fa-3"><i class="fa fa-battery-quarter"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-battery-half fa-3"><i class="fa fa-battery-half"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-battery-three-quarters fa-3"><i class="fa fa-battery-three-quarters"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-battery-full fa-3"><i class="fa fa-battery-full"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-bed fa-3"><i class="fa fa-bed"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-beer fa-3"><i class="fa fa-beer"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bell fa-3"><i class="fa fa-bell"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bell-o fa-3"><i class="fa fa-bell-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bell-slash fa-3"><i class="fa fa-bell-slash"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-bell-slash-o fa-3"><i class="fa fa-bell-slash-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bicycle fa-3"><i class="fa fa-bicycle"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-binoculars fa-3"><i class="fa fa-binoculars"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-birthday-cake fa-3"><i class="fa fa-birthday-cake"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-blind fa-3"><i class="fa fa-blind"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-bluetooth fa-3"><i class="fa fa-bluetooth"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bluetooth-b fa-3"><i class="fa fa-bluetooth-b"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bolt fa-3"><i class="fa fa-bolt"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bomb fa-3"><i class="fa fa-bomb"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-book fa-3"><i class="fa fa-book"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-bookmark fa-3"><i class="fa fa-bookmark"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bookmark-o fa-3"><i class="fa fa-bookmark-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-braille fa-3"><i class="fa fa-braille"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-briefcase fa-3"><i class="fa fa-briefcase"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bug fa-3"><i class="fa fa-bug"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-building fa-3"><i class="fa fa-building"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-building-o fa-3"><i class="fa fa-building-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bullhorn fa-3"><i class="fa fa-bullhorn"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bullseye fa-3"><i class="fa fa-bullseye"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bus fa-3"><i class="fa fa-bus"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-taxi fa-3"><i class="fa fa-taxi"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-calculator fa-3"><i class="fa fa-calculator"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-calendar fa-3"><i class="fa fa-calendar"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-calendar-check-o fa-3"><i class="fa fa-calendar-check-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-calendar-minus-o fa-3"><i class="fa fa-calendar-minus-o"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-calendar-o fa-3"><i class="fa fa-calendar-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-calendar-plus-o fa-3"><i class="fa fa-calendar-plus-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-calendar-times-o fa-3"><i class="fa fa-calendar-times-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-camera fa-3"><i class="fa fa-camera"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-camera-retro fa-3"><i class="fa fa-camera-retro"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-caret-square-o-down fa-3"><i class="fa fa-caret-square-o-down"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-caret-square-o-left fa-3"><i class="fa fa-caret-square-o-left"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-caret-square-o-right fa-3"><i class="fa fa-caret-square-o-right"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-caret-square-o-up fa-3"><i class="fa fa-caret-square-o-up"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-cart-arrow-down fa-3"><i class="fa fa-cart-arrow-down"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-cart-plus fa-3"><i class="fa fa-cart-plus"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-cc fa-3"><i class="fa fa-cc"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-certificate fa-3"><i class="fa fa-certificate"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-check fa-3"><i class="fa fa-check"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-check-circle fa-3"><i class="fa fa-check-circle"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-check-circle-o fa-3"><i class="fa fa-check-circle-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-check-square fa-3"><i class="fa fa-check-square"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-check-square-o fa-3"><i class="fa fa-check-square-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-child fa-3"><i class="fa fa-child"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-circle fa-3"><i class="fa fa-circle"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-circle-o fa-3"><i class="fa fa-circle-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-circle-o-notch fa-3"><i class="fa fa-circle-o-notch"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-circle-thin fa-3"><i class="fa fa-circle-thin"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-clock-o fa-3"><i class="fa fa-clock-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-clone fa-3"><i class="fa fa-clone"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-times fa-3"><i class="fa fa-times"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-cloud fa-3"><i class="fa fa-cloud"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-cloud-download fa-3"><i class="fa fa-cloud-download"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-cloud-upload fa-3"><i class="fa fa-cloud-upload"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-code fa-3"><i class="fa fa-code"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-code-fork fa-3"><i class="fa fa-code-fork"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-coffee fa-3"><i class="fa fa-coffee"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-cog fa-3"><i class="fa fa-cog"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-cogs fa-3"><i class="fa fa-cogs"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-comment fa-3"><i class="fa fa-comment"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-comment-o fa-3"><i class="fa fa-comment-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-commenting fa-3"><i class="fa fa-commenting"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-commenting-o fa-3"><i class="fa fa-commenting-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-comments fa-3"><i class="fa fa-comments"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-comments-o fa-3"><i class="fa fa-comments-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-spinner fa-spin fa-3 fa-fw"><i class="fa fa-spinner fa-spin"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-circle-o-notch fa-spin fa-3 fa-fw"><i class="fa fa-circle-o-notch fa-spin"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-refresh fa-spin fa-3 fa-fw"><i class="fa fa-refresh fa-spin"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-compass fa-3"><i class="fa fa-compass"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-copyright fa-3"><i class="fa fa-copyright"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-creative-commons fa-3"><i class="fa fa-creative-commons"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-credit-card fa-3"><i class="fa fa-credit-card"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-credit-card-alt fa-3"><i class="fa fa-credit-card-alt"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-crop fa-3"><i class="fa fa-crop"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-crosshairs fa-3"><i class="fa fa-crosshairs"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-cube fa-3"><i class="fa fa-cube"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-cubes fa-3"><i class="fa fa-cubes"></i></a></li>
                            <li class=""><a href="#" rel="fa fa-cutlery fa-3"><i class="fa fa-cutlery"></i></a></li>
                            <li class=""><a href="#" rel="fa fa-tachometer fa-3"><i class="fa fa-tachometer"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-database fa-3"><i class="fa fa-database"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-deaf fa-3"><i class="fa fa-deaf"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-desktop fa-3"><i class="fa fa-desktop"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-diamond fa-3"><i class="fa fa-diamond"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-download fa-3"><i class="fa fa-download"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-dot-circle-o fa-3"><i class="fa fa-dot-circle-o"></i></a></li>
                            <li class=""><a href="#" rel="fa fa-pencil-square-o fa-3"><i class="fa fa-pencil-square-o"></i></a></li>
                            <li class=""><a href="#" rel="fa fa-ellipsis-h fa-3"><i class="fa fa-ellipsis-h"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-ellipsis-v fa-3"><i class="fa fa-ellipsis-h"></i></a></li>
                            <li class=""><a href="#" rel="fa fa-envelope fa-3"><i class="fa fa-envelope"></i></a></li>
                            <li class=""><a href="#" rel="fa fa-envelope-o fa-3"><i class="fa fa-envelope-o"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-envelope-square fa-3"><i class="fa fa-envelope-square"></i></a></li>
                            <li class=""><a href="#" rel="fa fa-eraser fa-3"><i class="fa fa-eraser"></i></a></li>
                            <li class=""><a href="#" rel="fa fa-exchange fa-3"><i class="fa fa-exchange"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-exclamation fa-3"><i class="fa fa-exclamation"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-exclamation-circle fa-3"><i class="fa fa-exclamation-circle"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-exclamation-triangle fa-3"><i class="fa fa-exclamation-triangle"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-external-link fa-3"><i class="fa fa-external-link"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-external-link-square fa-3"><i class="fa fa-external-link-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-eye fa-3"><i class="fa fa-eye"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-eye-slash fa-3"><i class="fa fa-eye-slash"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-eyedropper fa-3"><i class="fa fa-eyedropper"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-fax fa-3"><i class="fa fa-fax"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-rss fa-3"><i class="fa fa-rss"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-rss-square fa-3"><i class="fa fa-rss-square"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-female fa-3"><i class="fa fa-female"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-fighter-jet fa-3"><i class="fa fa-fighter-jet"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-file fa-3"><i class="fa fa-file"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-file-o fa-3"><i class="fa fa-file-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-file-archive-o fa-3"><i class="fa fa-file-archive-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-file-audio-o fa-3"><i class="fa fa-file-audio-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-file-code-o fa-3"><i class="fa fa-file-code-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-file-excel-o fa-3"><i class="fa fa-file-excel-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-file-image-o fa-3"><i class="fa fa-file-image-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-file-video-o fa-3"><i class="fa fa-file-video-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-file-pdf-o fa-3"><i class="fa fa-file-pdf-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-file-powerpoint-o fa-3"><i class="fa fa-file-powerpoint-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-file-text fa-3"><i class="fa fa-file-text"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-file-text-o fa-3"><i class="fa fa-file-text-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-file-word-o fa-3"><i class="fa fa-file-word-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-film fa-3"><i class="fa fa-film"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-filter fa-3"><i class="fa fa-filter"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-fire fa-3"><i class="fa fa-fire"></i></a></li>
                                 <li class=""><a href="#" rel="fa fa-fire-extinguisher fa-3"><i class="fa fa-fire-extinguisher"></i></a></li>
                                 <li class=""><a href="#" rel="fa fa-flag fa-3"><i class="fa fa-flag"></i></a></li>
                                 <li class=""><a href="#" rel="fa fa-flag-checkered fa-3"><i class="fa fa-flag-checkered"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-flag-o fa-3"><i class="fa fa-flag-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-flask fa-3"><i class="fa fa-flask"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-folder fa-3"><i class="fa fa-folder"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-folder-o fa-3"><i class="fa fa-folder-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-folder-open fa-3"><i class="fa fa-folder-open"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-folder-open-o fa-3"><i class="fa fa-folder-open-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-frown-o fa-3"><i class="fa fa-frown-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-futbol-o fa-3"><i class="fa fa-futbol-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-gamepad fa-3"><i class="fa fa-gamepad"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-gavel fa-3"><i class="fa fa-gavel"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-gift fa-3"><i class="fa fa-gift"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-glass fa-3"><i class="fa fa-glass"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-globe fa-3"><i class="fa fa-globe"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-graduation-cap fa-3"><i class="fa fa-graduation-cap"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-users fa-3"><i class="fa fa-users"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hand-rock-o fa-3"><i class="fa fa-hand-rock-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hand-lizard-o fa-3"><i class="fa fa-hand-lizard-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hand-paper-o fa-3"><i class="fa fa-hand-paper-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hand-peace-o fa-3"><i class="fa fa-hand-peace-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hand-pointer-o fa-3"><i class="fa fa-hand-pointer-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hand-scissors-o fa-3"><i class="fa fa-hand-scissors-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hand-spock-o fa-3"><i class="fa fa-hand-spock-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hashtag fa-3"><i class="fa fa-hashtag"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hdd-o fa-3"><i class="fa fa-hdd-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-headphones fa-3"><i class="fa fa-headphones"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-heart fa-3"><i class="fa fa-heart"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-heart-o fa-3"><i class="fa fa-heart-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-heartbeat fa-3"><i class="fa fa-heartbeat"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-history fa-3"><i class="fa fa-history"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-home fa-3"><i class="fa fa-home"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hourglass fa-3"><i class="fa fa-hourglass"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hourglass-start fa-3"><i class="fa fa-hourglass-start"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hourglass-half fa-3"><i class="fa fa-hourglass-half"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hourglass-end fa-3"><i class="fa fa-hourglass-end"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hourglass-o fa-3"><i class="fa fa-hourglass-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-i-cursor fa-3"><i class="fa fa-i-cursor"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-inbox fa-3"><i class="fa fa-inbox"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-industry fa-3"><i class="fa fa-industry"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-info fa-3"><i class="fa fa-info"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-info-circle fa-3"><i class="fa fa-info-circle"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-key fa-3"><i class="fa fa-key"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-keyboard-o fa-3"><i class="fa fa-keyboard-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-language fa-3"><i class="fa fa-language"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-laptop fa-3"><i class="fa fa-laptop"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-leaf fa-3"><i class="fa fa-leaf"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-lemon-o fa-3"><i class="fa fa-lemon-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-level-down fa-3"><i class="fa fa-level-down"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-level-up fa-3"><i class="fa fa-level-up"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-life-ring fa-3"><i class="fa fa-life-ring"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-lightbulb-o fa-3"><i class="fa fa-lightbulb-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-line-chart fa-3"><i class="fa fa-line-chart"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-location-arrow fa-3"><i class="fa fa-location-arrow"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-lock fa-3"><i class="fa fa-lock"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-low-vision fa-3"><i class="fa fa-low-vision"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-magic fa-3"><i class="fa fa-magic"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-magnet fa-3"><i class="fa fa-magnet"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-share fa-3"><i class="fa fa-share"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-reply fa-3"><i class="fa fa-reply"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-reply-all fa-3"><i class="fa fa-reply-all"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-male fa-3"><i class="fa fa-male"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-map fa-3"><i class="fa fa-map"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-map-marker fa-3"><i class="fa fa-map-marker"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-map-o fa-3"><i class="fa fa-map-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-map-pin fa-3"><i class="fa fa-map-pin"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-map-signs fa-3"><i class="fa fa-map-signs"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-meh-o fa-3"><i class="fa fa-meh-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-microchip fa-3"><i class="fa fa-microchip"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-microphone fa-3"><i class="fa fa-microphone"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-microphone-slash fa-3"><i class="fa fa-microphone-slash"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-minus fa-3"><i class="fa fa-minus"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-minus-circle fa-3"><i class="fa fa-minus-circle"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-minus-square fa-3"><i class="fa fa-minus-square"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-minus-square-o fa-3"><i class="fa fa-minus-square-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-mobile fa-3"><i class="fa fa-mobile"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-money fa-3"><i class="fa fa-money"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-moon-o fa-3"><i class="fa fa-moon-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-motorcycle fa-3"><i class="fa fa-motorcycle"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-mouse-pointer fa-3"><i class="fa fa-mouse-pointer"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-music fa-3"><i class="fa fa-music"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-newspaper-o fa-3"><i class="fa fa-newspaper-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-object-group fa-3"><i class="fa fa-object-group"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-object-ungroup fa-3"><i class="fa fa-object-ungroup"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-paint-brush fa-3"><i class="fa fa-paint-brush"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-paper-plane fa-3"><i class="fa fa-paper-plane"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-paper-plane-o fa-3"><i class="fa fa-paper-plane-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-paw fa-3"><i class="fa fa-paw"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-pencil fa-3"><i class="fa fa-pencil"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-pencil-square fa-3"><i class="fa fa-pencil-square"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-pencil-square-o fa-3"><i class="fa fa-pencil-square-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-percent fa-3"><i class="fa fa-percent"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-phone fa-3"><i class="fa fa-phone"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-phone-square fa-3"><i class="fa fa-phone-square"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-picture-o fa-3"><i class="fa fa-picture-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-pie-chart fa-3"><i class="fa fa-pie-chart"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-plane fa-3"><i class="fa fa-plane"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-plug fa-3"><i class="fa fa-plug"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-plus fa-3"><i class="fa fa-plus"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-plus-circle fa-3"><i class="fa fa-plus-circle"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-plus-square fa-3"><i class="fa fa-plus-square"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-plus-square-o fa-3"><i class="fa fa-plus-square-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-podcast fa-3"><i class="fa fa-podcast"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-power-off fa-3"><i class="fa fa-power-off"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-print fa-3"><i class="fa fa-print"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-puzzle-piece fa-3"><i class="fa fa-puzzle-piece"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-qrcode fa-3"><i class="fa fa-qrcode"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-question fa-3"><i class="fa fa-question"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-question-circle fa-3"><i class="fa fa-question-circle"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-question-circle-o fa-3"><i class="fa fa-question-circle-o"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-quote-left fa-3"><i class="fa fa-quote-left"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-quote-right fa-3"><i class="fa fa-quote-right"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-random fa-3"><i class="fa fa-random"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-recycle fa-3"><i class="fa fa-recycle"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-refresh fa-3"><i class="fa fa-refresh"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-registered fa-3"><i class="fa fa-registered"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-retweet fa-3"><i class="fa fa-retweet"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-road fa-3"><i class="fa fa-road"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-rocket fa-3"><i class="fa fa-rocket"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-search fa-3"><i class="fa fa-search"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-search-minus fa-3"><i class="fa fa-search-minus"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-search-plus fa-3"><i class="fa fa-search-plus"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-server fa-3"><i class="fa fa-server"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-share-alt fa-3"><i class="fa fa-share-alt"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-share-alt-square fa-3"><i class="fa fa-share-alt-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-share-square fa-3"><i class="fa fa-share-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-share-square-o fa-3"><i class="fa fa-share-square-o"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-shield fa-3"><i class="fa fa-shield"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-ship fa-3"><i class="fa fa-ship"></i></a></li>  
                              <li class=""><a href="#" rel="fa fa-shopping-bag fa-3"><i class="fa fa-shopping-bag"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-shopping-basket fa-3"><i class="fa fa-shopping-basket"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-shopping-cart fa-3"><i class="fa fa-shopping-cart"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-shower fa-3"><i class="fa fa-shower"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sign-in fa-3"><i class="fa fa-sign-in"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sign-language fa-3"><i class="fa fa-sign-language"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sign-out fa-3"><i class="fa fa-sign-out"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-signal fa-3"><i class="fa fa-signal"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sitemap fa-3"><i class="fa fa-sitemap"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sliders fa-3"><i class="fa fa-sliders"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-smile-o fa-3"><i class="fa fa-smile-o"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sort fa-3"><i class="fa fa-sort"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sort-alpha-asc fa-3"><i class="fa fa-sort-alpha-asc"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sort-alpha-desc fa-3"><i class="fa fa-sort-alpha-desc"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sort-amount-asc fa-3"><i class="fa fa-sort-amount-asc"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sort-amount-desc fa-3"><i class="fa fa-sort-amount-desc"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sort-asc fa-3"><i class="fa fa-sort-asc"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sort-desc fa-3"><i class="fa fa-sort-desc"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sort-numeric-asc fa-3"><i class="fa fa-sort-numeric-asc"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sort-numeric-desc fa-3"><i class="fa fa-sort-numeric-desc"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-space-shuttle fa-3"><i class="fa fa-space-shuttle"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-spinner fa-3"><i class="fa fa-spinner"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-spoon fa-3"><i class="fa fa-spoon"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-square fa-3"><i class="fa fa-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-square-o fa-3"><i class="fa fa-square-o"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-star fa-3"><i class="fa fa-star"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-star-half fa-3"><i class="fa fa-star-half"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-star-half-o fa-3"><i class="fa fa-star-half-o"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-star-o fa-3"><i class="fa fa-star-o"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sticky-note fa-3"><i class="fa fa-sticky-note"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sticky-note-o fa-3"><i class="fa fa-sticky-note-o"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-street-view fa-3"><i class="fa fa-street-view"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-suitcase fa-3"><i class="fa fa-suitcase"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sun-o fa-3"><i class="fa fa-sun-o"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-tablet fa-3"><i class="fa fa-tablet"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-tag fa-3"><i class="fa fa-tag"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-tags  fa-3"><i class="fa fa-tags"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-tasks fa-3"><i class="fa fa-tasks"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-television fa-3"><i class="fa fa-television"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-terminal fa-3"><i class="fa fa-terminal"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-thumb-tack fa-3"><i class="fa fa-thumb-tack"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-thumbs-down fa-3"><i class="fa fa-thumbs-down"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-thumbs-o-down fa-3"><i class="fa fa-thumbs-o-down"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-thumbs-o-up fa-3"><i class="fa fa-thumbs-o-up"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-thumbs-up fa-3"><i class="fa fa-thumbs-up"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-ticket fa-3"><i class="fa fa-ticket"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-times-circle fa-3"><i class="fa fa-times-circle"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-times-circle-o fa-3"><i class="fa fa-times-circle-o"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-tint fa-3"><i class="fa fa-tint"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-toggle-off fa-3"><i class="fa fa-toggle-off"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-toggle-on fa-3"><i class="fa fa-toggle-on"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-trademark fa-3"><i class="fa fa-trademark"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-trash fa-3"><i class="fa fa-trash"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-trash-o fa-3"><i class="fa fa-trash-o"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-tree fa-3"><i class="fa fa-tree"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-trophy fa-3"><i class="fa fa-trophy"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-truck fa-3"><i class="fa fa-truck"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-tty fa-3"><i class="fa fa-tty"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-umbrella fa-3"><i class="fa fa-umbrella"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-universal-access fa-3"><i class="fa fa-universal-access"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-unlock fa-3"><i class="fa fa-unlock"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-unlock-alt fa-3"><i class="fa fa-unlock-alt"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-upload fa-3"><i class="fa fa-upload"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-user-plus fa-3"><i class="fa fa-user-plus"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-user-secret fa-3"><i class="fa fa-user-secret"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-user-times fa-3"><i class="fa fa-user-times"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-video-camera fa-3"><i class="fa fa-video-camera"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-volume-control-phone fa-3"><i class="fa fa-volume-control-phone"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-volume-down fa-3"><i class="fa fa-volume-down"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-volume-off fa-3"><i class="fa fa-volume-off"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-volume-up fa-3"><i class="fa fa-volume-up"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-wheelchair fa-3"><i class="fa fa-wheelchair"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-wheelchair-alt fa-3"><i class="fa fa-wheelchair-alt"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-wifi fa-3"><i class="fa fa-wifi"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-wrench fa-3"><i class="fa fa-wrench"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-audio-description fa-3"><i class="fa fa-audio-description"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-ambulance fa-3"><i class="fa fa-ambulance"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-subway fa-3"><i class="fa fa-subway"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-train fa-3"><i class="fa fa-train"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-genderless fa-3"><i class="fa fa-genderless"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-transgender fa-3"><i class="fa fa-transgender"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-mars fa-3"><i class="fa fa-mars"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-mars-double fa-3"><i class="fa fa-mars-double"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-mars-stroke fa-3"><i class="fa fa-mars-stroke"></i></a></li>
                              <li class=""><a href="#" rel="fa ffa-mars-stroke-h fa-3"><i class="fa fa-mars-stroke-h"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-mars-stroke-v fa-3"><i class="fa fa-mars-stroke-v"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-mercury fa-3"><i class="fa fa-mercury"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-neuter fa-3"><i class="fa fa-neuter"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-transgender-alt fa-3"><i class="fa fa-transgender-alt"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-venus fa-3"><i class="fa fa-venus"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-venus-double fa-3"><i class="fa fa-venus-double"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-venus-mars fa-3"><i class="fa fa-venus-mars"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-cc-amex fa-3"><i class="fa fa-cc-amex"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-cc-diners-club fa-3"><i class="fa fa-cc-diners-club"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-cc-discover fa-3"><i class="fa fa-cc-discover"></i></a></li>
                            <li class=""><a href="#" rel="fa fa-cc-jcb fa-3"><i class="fa fa-cc-jcb"></i></a></li>
                            <li class=""><a href="#" rel="fa fa-cc-mastercard fa-3"><i class="fa fa-cc-mastercard"></i></a></li>
                            <li class=""><a href="#" rel="fa fa-cc-paypal fa-3"><i class="fa fa-cc-paypal"></i></a></li>
                            <li class=""><a href="#" rel="fa fa-cc-stripe fa-3"><i class="fa fa-cc-stripe"></i></a></li>
                            <li class=""><a href="#" rel="fa fa-cc-visa fa-3"><i class="fa fa-cc-visa"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-google-wallet fa-3"><i class="fa fa-google-wallet"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-paypal  fa-3"><i class="fa fa-paypal"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-btc fa-3"><i class="fa fa-btc"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-usd fa-3"><i class="fa fa-usd"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-eur fa-3"><i class="fa fa-eur"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-gbp fa-3"><i class="fa fa-gbp"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-gg fa-3"><i class="fa fa-gg"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-gg-circle fa-3"><i class="fa fa-gg-circle"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-ils fa-3"><i class="fa fa-ils"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-inr fa-3"><i class="fa fa-inr"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-jpy fa-3"><i class="fa fa-jpy"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-krw fa-3"><i class="fa fa-krw"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-rub fa-3"><i class="fa fa-rub"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-try fa-3"><i class="fa fa-try"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-align-center fa-3"><i class="fa fa-align-center"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-align-justify fa-3"><i class="fa fa-align-justify"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-align-left fa-3"><i class="fa fa-align-left"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-align-right fa-3"><i class="fa fa-align-right"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-bold fa-3"><i class="fa fa-bold"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-link fa-3"><i class="fa fa-link"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-chain-broken fa-3"><i class="fa fa-chain-broken"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-clipboard fa-3"><i class="fa fa-clipboard"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-columns fa-3"><i class="fa fa-columns"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-files-o fa-3"><i class="fa fa-files-o"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-scissors fa-3"><i class="fa fa-scissors"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-outdent fa-3"><i class="fa fa-outdent"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-floppy-o fa-3"><i class="fa fa-floppy-o"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-font fa-3"><i class="fa fa-font"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-header fa-3"><i class="fa fa-header"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-indent fa-3"><i class="fa fa-indent"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-italic fa-3"><i class="fa fa-italic"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-list fa-3"><i class="fa fa-list"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-list-alt fa-3"><i class="fa fa-list-alt"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-list-ol fa-3"><i class="fa fa-list-ol"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-list-ul fa-3"><i class="fa fa-list-ul"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-paperclip fa-3"><i class="fa fa-paperclip"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-paragraph fa-3"><i class="fa fa-paragraph"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-repeat fa-3"><i class="fa fa-repeat"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-undo fa-3"><i class="fa fa-undo"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-strikethrough fa-3"><i class="fa fa-strikethrough"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-subscript fa-3"><i class="fa fa-subscript"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-superscript fa-3"><i class="fa fa-superscript"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-table fa-3"><i class="fa fa-table"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-text-height fa-3"><i class="fa fa-text-height"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-text-width fa-3"><i class="fa fa-text-width"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-th fa-3"><i class="fa fa-th"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-th-large fa-3"><i class="fa fa-th-large"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-th-list fa-3"><i class="fa fa-th-list"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-underline fa-3"><i class="fa fa-underline"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-angle-double-down fa-3"><i class="fa fa-angle-double-down"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-angle-double-left fa-3"><i class="fa fa-angle-double-left"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-angle-double-right fa-3"><i class="fa fa-angle-double-right"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-angle-double-up fa-3"><i class="fa fa-angle-double-up"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-angle-up fa-3"><i class="fa fa-angle-up"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-angle-down fa-3"><i class="fa fa-angle-down"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-angle-left fa-3"><i class="fa fa-angle-left"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-angle-right fa-3"><i class="fa fa-angle-right"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-arrow-circle-down fa-3"><i class="fa fa-arrow-circle-down"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-arrow-circle-left fa-3"><i class="fa fa-arrow-circle-left"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-arrow-circle-o-down fa-3"><i class="fa fa-arrow-circle-o-down"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-arrow-circle-o-left fa-3"><i class="fa fa-arrow-circle-o-left"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-arrow-circle-o-right fa-3"><i class="fa fa-arrow-circle-o-right"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-arrow-circle-o-up fa-3"><i class="fa fa-arrow-circle-o-up"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-arrow-circle-right fa-3"><i class="fa fa-arrow-circle-right"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-arrow-circle-up fa-3"><i class="fa fa-arrow-circle-up"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-arrow-down fa-3"><i class="fa fa-arrow-down"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-arrow-left fa-3"><i class="fa fa-arrow-left"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-arrow-right fa-3"><i class="fa fa-arrow-right"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-arrow-up fa-3"><i class="fa fa-arrow-up"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-arrows-alt fa-3"><i class="fa fa-arrows-alt"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-caret-down fa-3"><i class="fa fa-caret-down"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-caret-left fa-3"><i class="fa fa-caret-left"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-caret-right fa-3"><i class="fa fa-caret-right"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-caret-up fa-3"><i class="fa fa-caret-up"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-chevron-circle-down fa-3"><i class="fa fa-chevron-circle-down"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-chevron-circle-left fa-3"><i class="fa fa-chevron-circle-left"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-chevron-circle-right fa-3"><i class="fa fa-chevron-circle-right"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-chevron-circle-up fa-3"><i class="fa fa-chevron-circle-up"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-chevron-down fa-3"><i class="fa fa-chevron-down"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-chevron-left fa-3"><i class="fa fa-chevron-left"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-chevron-right fa-3"><i class="fa fa-chevron-right"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-chevron-up fa-3"><i class="fa fa-chevron-up"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-hand-o-down fa-3"><i class="fa fa-hand-o-down"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-hand-o-left fa-3"><i class="fa fa-hand-o-left"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-hand-o-right fa-3"><i class="fa fa-hand-o-right"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-hand-o-up fa-3"><i class="fa fa-hand-o-up"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-long-arrow-down  fa-3"><i class="fa fa-long-arrow-down"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-long-arrow-left fa-3"><i class="fa fa-long-arrow-left"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-long-arrow-right fa-3"><i class="fa fa-long-arrow-right"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-long-arrow-up fa-3"><i class="fa fa-long-arrow-up"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-backward fa-3"><i class="fa fa-backward"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-compress fa-3"><i class="fa fa-compress"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-eject fa-3"><i class="fa fa-eject"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-expand fa-3"><i class="fa fa-expand"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-fast-backward fa-3"><i class="fa fa-fast-backward"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-fast-forward fa-3"><i class="fa fa-fast-forward"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-forward fa-3"><i class="fa fa-forward"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-pause fa-3"><i class="fa fa-pause"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-pause-circle fa-3"><i class="fa fa-pause-circle"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-pause-circle-o fa-3"><i class="fa fa-pause-circle-o"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-play fa-3"><i class="fa fa-play"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-play-circle fa-3"><i class="fa fa-play-circle"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-play-circle-o fa-3"><i class="fa fa-play-circle-o"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-step-backward fa-3"><i class="fa fa-step-backward"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-step-forward fa-3"><i class="fa fa-step-forward"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-stop fa-3"><i class="fa fa-stop"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-stop-circle fa-3"><i class="fa fa-stop-circle"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-stop-circle-o fa-3"><i class="fa fa-stop-circle-o"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-youtube-play fa-3"><i class="fa fa-youtube-play"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-500px fa-3"><i class="fa fa-500px"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-adn fa-3"><i class="fa fa-adn"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-amazon fa-3"><i class="fa fa-amazon"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-android fa-3"><i class="fa fa-android"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-angellist fa-3"><i class="fa fa-angellist"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-apple fa-3"><i class="fa fa-apple"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-bandcamp fa-3"><i class="fa fa-bandcamp"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-behance fa-3"><i class="fa fa-behance"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-behance-square fa-3"><i class="fa fa-behance-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-bitbucket fa-3"><i class="fa fa-bitbucket"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-bitbucket-square fa-3"><i class="fa fa-bitbucket-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-black-tie fa-3"><i class="fa fa-black-tie"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-bluetooth fa-3"><i class="fa fa-bluetooth"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-bluetooth-b fa-3"><i class="fa fa-bluetooth-b"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-buysellads fa-3"><i class="fa fa-buysellads"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-chrome fa-3"><i class="fa fa-chrome"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-codepen fa-3"><i class="fa fa-codepen"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-codiepie fa-3"><i class="fa fa-codiepie"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-connectdevelop fa-3"><i class="fa fa-connectdevelop"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-contao fa-3"><i class="fa fa-contao"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-css3 fa-3"><i class="fa fa-css3"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-dashcube fa-3"><i class="fa fa-dashcube"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-delicious fa-3"><i class="fa fa-delicious"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-deviantart fa-3"><i class="fa fa-deviantart"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-digg fa-3"><i class="fa fa-digg"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-dribbble fa-3"><i class="fa fa-dribbble"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-dropbox fa-3"><i class="fa fa-dropbox"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-drupal fa-3"><i class="fa fa-drupal"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-edge fa-3"><i class="fa fa-edge"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-empire fa-3"><i class="fa fa-empire"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-envira fa-3"><i class="fa fa-envira"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-expeditedssl fa-3"><i class="fa fa-expeditedssl"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-font-awesome fa-3"><i class="fa fa-font-awesome"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-facebook fa-3"><i class="fa fa-facebook"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-facebook-official fa-3"><i class="fa fa-facebook-official"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-facebook-square fa-3"><i class="fa fa-facebook-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-firefox fa-3"><i class="fa fa-firefox"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-first-order fa-3"><i class="fa fa-first-order"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-flickr fa-3"><i class="fa fa-flickr"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-fonticons fa-3"><i class="fa fa-fonticons"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-fort-awesome fa-3"><i class="fa fa-fort-awesome"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-forumbee fa-3"><i class="fa fa-forumbee"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-foursquare fa-3"><i class="fa fa-foursquare"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-free-code-camp fa-3"><i class="fa fa-free-code-camp"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-get-pocket fa-3"><i class="fa fa-get-pocket"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-git fa-3"><i class="fa fa-git"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-git-square fa-3"><i class="fa fa-git-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-github fa-3"><i class="fa fa-github"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-github-alt fa-3"><i class="fa fa-github-alt"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-github-square fa-3"><i class="fa fa-github-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-gitlab fa-3"><i class="fa fa-gitlab"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-gratipay fa-3"><i class="fa fa-gratipay"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-glide fa-3"><i class="fa fa-glide"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-glide-g fa-3"><i class="fa fa-glide-g"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-google fa-3"><i class="fa fa-google"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-google-plus fa-3"><i class="fa fa-google-plus"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-google-plus-official fa-3"><i class="fa fa-google-plus-official"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-google-plus-square fa-3"><i class="fa fa-google-plus-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-hacker-news fa-3"><i class="fa fa-hacker-news"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-houzz fa-3"><i class="fa fa-houzz"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-html5 fa-3"><i class="fa fa-html5"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-imdb fa-3"><i class="fa fa-imdb"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-instagram fa-3"><i class="fa fa-instagram"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-internet-explorer fa-3"><i class="fa fa-internet-explorer"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-ioxhost fa-3"><i class="fa fa-ioxhost"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-joomla fa-3"><i class="fa fa-joomla"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-jsfiddle fa-3"><i class="fa fa-jsfiddle"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-lastfm fa-3"><i class="fa fa-lastfm"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-lastfm-square fa-3"><i class="fa fa-lastfm-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-leanpub fa-3"><i class="fa fa-leanpub"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-linkedin fa-3"><i class="fa fa-linkedin"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-linkedin-square fa-3"><i class="fa fa-linkedin-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-linux fa-3"><i class="fa fa-linux"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-maxcdn fa-3"><i class="fa fa-maxcdn"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-meanpath fa-3"><i class="fa fa-meanpath"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-medium fa-3"><i class="fa fa-medium"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-meetup fa-3"><i class="fa fa-meetup"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-mixcloud fa-3"><i class="fa fa-mixcloud"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-modx fa-3"><i class="fa fa-modx"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-odnoklassniki fa-3"><i class="fa fa-odnoklassniki"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-odnoklassniki-square fa-3"><i class="fa fa-odnoklassniki-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-opencart fa-3"><i class="fa fa-opencart"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-openid fa-3"><i class="fa fa-openid"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-opera fa-3"><i class="fa fa-opera"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-optin-monster fa-3"><i class="fa fa-optin-monster"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-pagelines fa-3"><i class="fa fa-pagelines"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-pied-piper fa-3"><i class="fa fa-pied-piper"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-pied-piper-alt fa-3"><i class="fa fa-pied-piper-alt"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-pied-piper-pp fa-3"><i class="fa fa-pied-piper-pp"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-pinterest fa-3"><i class="fa fa-pinterest"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-pinterest-p fa-3"><i class="fa fa-pinterest-p"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-pinterest-square fa-3"><i class="fa fa-pinterest-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-product-hunt fa-3"><i class="fa fa-product-hunt"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-qq fa-3"><i class="fa fa-qq"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-rebel fa-3"><i class="fa fa-rebel"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-reddit fa-3"><i class="fa fa-reddit"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-reddit-alien fa-3"><i class="fa fa-reddit-alien"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-reddit-square fa-3"><i class="fa fa-reddit-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-renren fa-3"><i class="fa fa-renren"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-safari fa-3"><i class="fa fa-safari"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-scribd fa-3"><i class="fa fa-scribd"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sellsy fa-3"><i class="fa fa-sellsy"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-shirtsinbulk fa-3"><i class="fa fa-shirtsinbulk"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-simplybuilt fa-3"><i class="fa fa-simplybuilt"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-skyatlas fa-3"><i class="fa fa-skyatlas"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-skype fa-3"><i class="fa fa-skype"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-slack fa-3"><i class="fa fa-slack"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-slideshare fa-3"><i class="fa fa-slideshare"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-snapchat fa-3"><i class="fa fa-snapchat"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-snapchat-ghost fa-3"><i class="fa fa-snapchat-ghost"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-snapchat-square fa-3"><i class="fa fa-snapchat-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-soundcloud fa-3"><i class="fa fa-soundcloud"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-spotify fa-3"><i class="fa fa-spotify"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-stack-exchange fa-3"><i class="fa fa-stack-exchange"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-stack-overflow fa-3"><i class="fa fa-stack-overflow"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-steam fa-3"><i class="fa fa-steam"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-steam-square fa-3"><i class="fa fa-steam-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-stumbleupon fa-3"><i class="fa fa-stumbleupon"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-stumbleupon-circle fa-3"><i class="fa fa-stumbleupon-circle"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-tencent-weibo fa-3"><i class="fa fa-tencent-weibo"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-themeisle fa-3"><i class="fa fa-themeisle"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-trello fa-3"><i class="fa fa-trello"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-tripadvisor fa-3"><i class="fa fa-tripadvisor"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-tumblr fa-3"><i class="fa fa-tumblr"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-tumblr-square fa-3"><i class="fa fa-tumblr-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-twitch fa-3"><i class="fa fa-twitch"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-twitter fa-3"><i class="fa fa-twitter"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-twitter-square fa-3"><i class="fa fa-twitter-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-usb fa-3"><i class="fa fa-usb"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-viacoin fa-3"><i class="fa fa-viacoin"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-viadeo fa-3"><i class="fa fa-viadeo"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-viadeo-square fa-3"><i class="fa fa-viadeo-square"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-vimeo fa-3"><i class="fa fa-vimeo"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-vimeo-square fa-3"><i class="fa fa-vimeo-square"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-vine fa-3"><i class="fa fa-vine"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-vk fa-3"><i class="fa fa-vk"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-weixin fa-3"><i class="fa fa-weixin"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-weibo fa-3"><i class="fa fa-weibo"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-whatsapp fa-3"><i class="fa fa-whatsapp"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-wikipedia-w fa-3"><i class="fa fa-wikipedia-w"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-windows fa-3"><i class="fa fa-windows"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-wordpress fa-3"><i class="fa fa-wordpress"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-wpbeginner fa-3"><i class="fa fa-wpbeginner"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-wpforms fa-3"><i class="fa fa-wpforms"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-xing fa-3"><i class="fa fa-xing"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-xing-square fa-3"><i class="fa fa-xing-square"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-y-combinator fa-3"><i class="fa fa-y-combinator"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-yahoo fa-3"><i class="fa fa-yahoo"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-yelp fa-3"><i class="fa fa-yelp"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-yoast fa-3"><i class="fa fa-yoast"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-youtube fa-3"><i class="fa fa-youtube"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-youtube-square fa-3"><i class="fa fa-youtube-square"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-h-square fa-3"><i class="fa fa-h-square"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-hospital-o fa-3"><i class="fa fa-hospital-o"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-medkit fa-3"><i class="fa fa-medkit"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-stethoscope fa-3"><i class="fa fa-stethoscope"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-user-md fa-3"><i class="fa fa-user-md"></i></a></li>';
  }


    public function fieldEdit()
  {
    echo '<div id="WIFieldId" style="display:none;">
    <nav class="panel-nav">
      <button class="prev-group" title="previous group"  type="button" data-toggle="tooltip"data-placement="top"></button>
      <div class="panel-labels">
      <div class="options">
      <h5 class="active-tab">Attrs</h5>
      <h5>Options</h5>
      </div>
      </div>
      <button class="next-group" title="Next group"  type="button" data-toggle="tooltip"data-placement="top"></button>
      </nav>
      <div class="panels" style="height:116.313px;">
            <div class="Fpanel attrsPanels">
            <div class="fPanelWrap">
            <ul class="fieldEditGroup fieldEditAttrs">
            <li class="attrsClassNameWrap propWrapper controlCount="1" id="PanelWrapers">
            <div class="propControls">
            <button type="button" class="propRemove propControls"></button>
            </div>
            <div class="propInputs">
            <div class="fieldGroup">
            <label for="className">Class</label>
            <select name="className" id="className">
                <option value="fBtnGroup">Grouped</option>
                <option value="FieldGroup">Un-Grouped</option>
                </select>
            </div>
            </div>
            </li>
            </ul>
            <div class="panelActionButtons">
            <button type="button" class="addAttrs">+ Atrribute</button>
            </div>
            </div>
            <div class="Fpanel optionsPanel">
            <div class="FpanelWrap">
                <ul class="fieldEditGroup fieldEditOptions">
                    <li class="OptionsXWrapper propWrapper controlCount_2" id="propCont">
                    <div class="propControls">
                    <button type="button" class="propOrder propControls"></button>
                    <button type="button" class="propOrder propControls"></button>
                    </div>
                    <div class="propInput FinputGroup">
                    <input name="button" type="text" value="button" placeholder="label" id="buttons">
                    <select name="button" id="buttonz">
                    <option value="button" selected="true">appearing_button</option>
                    <option value="reset">Reset</option>
                    <option value="submit">Submit</option>
                    </select>
                    <select name="options" id="optional">
                    <option selected="true">default</option>
                    <option value="primary">Primary</option>
                    <option value="error">Error</option>
                    <option value="success">Success</option>
                    <option value="warning">Warning</option>
                    </select>
                    </div>
                    </li>
                </ul>
                </div>
                <div class="panelActionButtons">
                <button type="button" class="addOptions">+ Options</button>
                </div>
                </div>
                </div>
                </div>
                </div>';
  }


}