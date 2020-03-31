<?php



/**
 * cafe class.
 */
class WIBar 
{

    public function __construct()
    {
        $this->WIdb = WIdb::getInstance();
    }

   
   public function Edit_bar_menu()
   {

    $result = $this->WIdb->select(
                    "SELECT * FROM `wi_bar_section`"
                  );

    echo '<div id="tabsSection">
  <ul>';

  foreach ($result as $res ) {
    echo '<li><a href="#tabsSection-' . $res['id'] . '">' . $res['name'] . '</a></li>';
  }
  

  echo '</ul>';
 
foreach ($result as $res) {
    echo '<div id="tabsSection-' . $res['id'] . '">';
    echo '<a href="javascript:void(0);" onclick="WIBar.add();">Add New ' . $res['name'] . '</a>';
     self::editSections($res['id'], $res['name']); echo '
  </div>';
    }
    
    echo '</div>';

   }



   public function bar_menu()
   {

    $result = $this->WIdb->select(
                    "SELECT * FROM `wi_bar_section`"
                  );

    echo '<div id="tabsSection">
  <ul>';

  foreach ($result as $res ) {
    echo '<li><a href="#tabsSection-' . $res['id'] . '">' . $res['name'] . '</a></li>';
  }
  

  echo '</ul>';

foreach ($result as $res) {
    echo '<div id="tabsSection-' . $res['id'] . '">
    '; self::sections($res['id']); echo '
  </div>';
}
    
   }


   public function sections($id, $name)
   {

   // echo '<div><a href="javascript:void(0);" onclick="WIKitchen.add();">Add New ' . $name. '</a></div>';
    $result = $this->WIdb->selectID(
                    "SELECT * FROM `wi_bar` WHERE `section_id`=:id", array("id" => $id)
                  );
    echo '<div id="tabsmenu-' . $id . '">
  <ul>';


  foreach ($result as $res ) {
    echo '<li><a href="#tabsmenu-' . $res['id'] . '">' . $res['name'] . '</a></li>';
  }
  

  echo '</ul>';

      foreach ($result as $res) {
          echo '<div id="tabsmenu-' . $res['id'] . '">
          '; self::editChildren($res['id'], $res['id'],$res['name'], $res['img'], $res['id']); echo '
        </div>';
      }
  echo '</div>';
   }


   public function editSections($id, $name)
   {

   // echo '<div><a href="javascript:void(0);" onclick="WIKitchen.add();">Add New ' . $name. '</a></div>';
    $result = $this->WIdb->selectID(
                    "SELECT * FROM `wi_bar` WHERE `section_id`=:id", array("id" => $id)
                  );


    if (strpos($name," ") != false){
                $name = preg_replace('/\s+/', '_', $name);
            }

    echo '  <script>
  $( function() {
    $( "#' . $name . 'tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
    $( "#' . $name . 'tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
  } );

  
  </script>';
    echo '<div id="' . $name . 'tabs">
  <ul>';


  foreach ($result as $res ) {
    echo '<li><a href="#' . $name . 'tabs-'.$res['id'].'">' . $res['name'] . '</a></li>';
  }
  

  echo '</ul>';

      foreach ($result as $res) {

          echo '<div id="' . $name . 'tabs-'.$res['id'].'">
          '; self::editChildren($res['name'], $res['img'], $res['id']); echo '
        </div>';
      }
  echo '</div>';
   }

   public function editChildren($name, $img, $id)
   {

    

    echo ' <div class="col-md-12">
               <div id="contact-card" class="panel panel-default">
                  <div class="panel-heading">
                     <h2 class="panel-title">' .$name .'</h2>
                     
                  </div>
                  <div class="panel-body">

                     <div id="card" class="row" id="' . $id. ' ">
                        <div class="col-md-6 headshot" id="menuPic">';
                        self::img($img);
                          echo '<div id="status"></div>
                        </div>
                        <div class="col-md-6">';
                       self::editingred($id);
                        echo'</div>';
                      self::editmethod($id);
                     echo'</div>
                     <a href="javascript:void(0);">Save</a>
                  </div>
               </div>
             </div>';
   }

   public function Children($ingred_id, $method_id, $name, $img, $id)
   {

    

    echo ' <div class="col-md-12">
               <div id="contact-card" class="panel panel-default">
                  <div class="panel-heading">
                     <h2 class="panel-title">' .$name .'</h2>
                     
                  </div>
                  <div class="panel-body">
                     <div id="card" class="row" id="' . $id. ' ">
                        <div class="col-md-6 headshot" id="menuPic">';
                        self::img($img);
                          echo '<div id="status"></div>
                        </div>
                        <div class="col-md-6">';
                       self::ingred($ingred_id);
                        echo'</div>';
                      self::method($method_id);
                     echo'</div>
                     <a href="javascript:void(0);">Save</a>
                  </div>
               </div>
             </div>';
   }

       

   public function ingred($ingred_id)
   {

      $result = $this->WIdb->selectID(
                    "SELECT * FROM `wi_bar_ingred` WHERE `group_id`=:id", array("id" => $ingred_id)
                  );

       echo '<form id="ingred">
        <ul style="padding: 0px;margin-left: -41px;">
         <div><a href="javascript:void(0);" onclick="WIKitchen.addIngred();">Add New ingrediant</a></div>';
           foreach($result as $res){
           // var_dump($res);
              echo ' <li>
            <div class="col-lg-12"><input type="text" name="qty" placeholder="Qty" style="width:33px;"><input type="text" name="ingrediant" placeholder="ingrediant" value="'.$res['ingred'].'"></div>
            </li>';
          }
        echo '</ul>
         <form>';

   }

      public function editingred($ingred_id)
   {
      $result = $this->WIdb->selectID(
                    "SELECT * FROM `wi_bar_ingred` WHERE `group_id`=:id", array("id" => $ingred_id)
                  );

      //var_dump($result);
       echo '<form id="ingred">
        <ul style="padding: 0px;margin-left: -41px;">
         <div><a href="javascript:void(0);" onclick="WIKitchen.addIngred();">Add New ingrediant</a></div>';
           foreach($result as $res){
            //var_dump($res);
              echo ' <li>
            <div class="col-lg-12">
            <input type="text" name="ingrediant" placeholder="ingrediant" value="'.$res['ingred'].'"></div>
            </li>';
          }
        echo '</ul>
         <form>';

   }


    public function method($method_id)
   {

      $result = $this->WIdb->selectID(
                    "SELECT * FROM `wi_bar_method` WHERE `group_id`=:id", array("id" => $method_id)
                  );

       echo '<form id="method">
        <ul style="padding: 0px;margin-left: -41px;margin-top: 214px;">
         <div><a href="javascript:void(0);" onclick="WIKitchen.addmethod();">Add New method</a></div>
            <li>
            <div class="col-lg-12"><input type="text" name="method" placeholder="method"></div>
            </li>
         </ul>
         <form>';

   }


   public function editmethod($method_id)
   {

      $result = $this->WIdb->selectID(
                    "SELECT * FROM `wi_bar_method` WHERE `group_id`=:id", array("id" => $method_id)
                  );

       echo '<form id="method">
        <ul style="padding: 0px;margin-left: -41px;margin-top: 214px;">
         <div><a href="javascript:void(0);" onclick="WIKitchen.addmethod();">Add New method</a></div>';
            foreach($result as $res){
              echo '<li>
            <div class="col-lg-12"><input type="text" name="method" placeholder="method" value="'.$res['method'].'"></div>
            </li>';
          }
        echo '</ul>
         <form>';

   }

   public function img($img)
   {
      if(!empty($img)){
       echo '<img class="profile" src="WIMedia/Img/menu/' . $img . '" width="218px" /><a href="javascript:void(0);" onclick="WIKitchen.photo()" class="btn pic">' . WILang::get("change_pic") . '</a>';
      
    } else {
      echo '<img class="profile" src="WIMedia/Img/menu/default.jpg" width="218px" /><a href="javascript:void(0);" onclick="WIKitchen.photo()" class="btn pic">' . WILang::get("change_pic") . '</a>';
    }
   }

   public function newDrinkItem($ingredient = array(), $methoddata = array(), $newpic, $menuSectionId, $newItem, $glass, $time)
   {

    //var_dump($_POST);

    $this->WIdb->insert('wi_bar', array(
            "name"  => strip_tags($newItem),
            "section_id"  => $menuSectionId,
            "glass" => $glass,
            "sos_time" => $time,
            "img" => $newpic
        )); 
    $group_id = $this->WIdb->lastInsertId();

    foreach ($ingredient as $ingred ) {
      //var_dump($ingred);
         $this->WIdb->insert('wi_bar_ingred', array(
            "ingred"  => strip_tags($ingred['ingredient']),
            "group_id" => $group_id
        ));
    }

    

   
    foreach ($methoddata as $method ) {
        $this->WIdb->insert('wi_bar_method', array(
          "method"  => strip_tags($method['method']),
          "group_id" => $group_id
      ));
    }


    $result = array(
        "status" => "success"
    );
    
    echo json_encode($result);


   }

}
