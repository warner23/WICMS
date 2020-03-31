<?php



/**
 * cafe class.
 */
class WIKitchen 
{

    public function __construct()
    {
        $this->WIdb = WIdb::getInstance();
    }

   
   public function Edit_kitchen_menu()
   {

    $result = $this->WIdb->select(
                    "SELECT * FROM `wi_kitchen_section`"
                  );

    echo '<div id="tabsSection">
  <ul>';

  foreach ($result as $res ) {
    echo '<li><a href="#tabsSection-' . $res['id'] . '">' . $res['name'] . '</a></li>';
  }
  

  echo '</ul>';
 
foreach ($result as $res) {
    echo '<div id="tabsSection-' . $res['id'] . '">';
    echo '<a href="javascript:void(0);" onclick="WIKitchen.add();">Add New ' . $res['name'] . '</a>';
     self::editSections($res['id'], $res['name']); echo '
  </div>';
    }
    
    echo '</div>';

   }



   public function kitchen_menu()
   {

    $result = $this->WIdb->select(
                    "SELECT * FROM `wi_kitchen_section`"
                  );

    echo '<div id="tabs">
  <ul>';

  foreach ($result as $res ) {
    echo '<li><a href="#tabs-' . $res['id'] . '">' . $res['name'] . '</a></li>';
  }
  

  echo '</ul>';

foreach ($result as $res) {
    echo '<div id="tabs-' . $res['id'] . '">
    '; self::sections($res['id']); echo '
  </div>';
}
    
   }



   public function sections($id, $name)
   {

   // echo '<div><a href="javascript:void(0);" onclick="WIKitchen.add();">Add New ' . $name. '</a></div>';
    $result = $this->WIdb->selectID(
                    "SELECT * FROM `wi_kitchen` WHERE `section_id`=:id", array("id" => $id)
                  );
    echo '<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#tabsmenu" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
    $( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
  } );
  </script>
  <style>
  .ui-tabs-vertical { width: 55em; }
  .ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: left; width: 12em; }
  .ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
  .ui-tabs-vertical .ui-tabs-nav li a { display:block; }
  .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; }
  .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: right; width: 40em;}
  </style>';
    echo '<div id="tabsmenu">
  <ul>';


  foreach ($result as $res ) {
    echo '<li><a href="#tabsmenu-' . $res['id'] . '">' . $res['name'] . '</a></li>';
  }
  

  echo '</ul>';

      foreach ($result as $res) {
          echo '<div id="tabsmenu-' . $res['id'] . '">
          '; self::editChildren($res['ingred_id'], $res['method_id'],$res['name'], $res['img'], $res['id']); echo '
        </div>';
      }
  echo '</div>';
   }


   public function editSections($id, $name)
   {

   // echo '<div><a href="javascript:void(0);" onclick="WIKitchen.add();">Add New ' . $name. '</a></div>';
    $result = $this->WIdb->selectID(
                    "SELECT * FROM `wi_kitchen` WHERE `section_id`=:id", array("id" => $id)
                  );
    echo '<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#tabsmenu" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
    $( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
  } );
  </script>
  <style>
  .ui-tabs-vertical { width: 55em; }
  .ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: left; width: 12em; }
  .ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
  .ui-tabs-vertical .ui-tabs-nav li a { display:block; }
  .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; }
  .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: right; width: 40em;}
  </style>';
    echo '<div id="tabsmenu">
  <ul>';


  foreach ($result as $res ) {
    echo '<li><a href="#tabsmenu-' . $res['id'] . '">' . $res['name'] . '</a></li>';
  }
  

  echo '</ul>';

      foreach ($result as $res) {
          echo '<div id="tabsmenu-' . $res['id'] . '">
          '; self::editChildren($res['ingred_id'], $res['method_id'],$res['name'], $res['img'], $res['id']); echo '
        </div>';
      }
  echo '</div>';
   }

   public function editChildren($ingred_id, $method_id, $name, $img, $id)
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
                       self::editingred($ingred_id);
                        echo'</div>';
                      self::editmethod($method_id);
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
                    "SELECT * FROM `wi_kitchen_ingred` WHERE `id`=:id", array("id" => $ingred_id)
                  );

       echo '<form id="ingred">
        <ul style="padding: 0px;margin-left: -41px;">
         <div><a href="javascript:void(0);" onclick="WIKitchen.addIngred();">Add New ingrediant</a></div>
            <li>
            <div class="col-lg-12"><input type="text" name="qty" placeholder="Qty" style="width:33px;"><input type="text" name="ingrediant" placeholder="ingrediant"></div>
            </li>
         </ul>
         <form>';

   }

      public function editingred($ingred_id)
   {

      $result = $this->WIdb->selectID(
                    "SELECT * FROM `wi_kitchen_ingred` WHERE `id`=:id", array("id" => $ingred_id)
                  );

       echo '<form id="ingred">
        <ul style="padding: 0px;margin-left: -41px;">
         <div><a href="javascript:void(0);" onclick="WIKitchen.addIngred();">Add New ingrediant</a></div>
            <li>
            <div class="col-lg-12"><input type="text" name="qty" placeholder="Qty" style="width:33px;"><input type="text" name="ingrediant" placeholder="ingrediant"></div>
            </li>
         </ul>
         <form>';

   }


    public function method($method_id)
   {

      $result = $this->WIdb->selectID(
                    "SELECT * FROM `wi_kitchen_method` WHERE `id`=:id", array("id" => $method_id)
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
                    "SELECT * FROM `wi_kitchen_method` WHERE `id`=:id", array("id" => $method_id)
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

   public function img($img)
   {
      if(!empty($result[0]["avatar"])){
       echo '<img class="profile" src="WIMedia/Img/menu/' . $img . '" width="218px" /><a href="javascript:void(0);" onclick="WIKitchen.photo()" class="btn pic">' . WILang::get("change_pic") . '</a>';
      
    } else {
      echo '<img class="profile" src="WIMedia/Img/menu/default.jpg" width="218px" /><a href="javascript:void(0);" onclick="WIKitchen.photo()" class="btn pic">' . WILang::get("change_pic") . '</a>';
    }
   }

   public function newMenuItem($ingredient = array(), $methoddata = array(), $newpic, $menuSectionId, $newItem)
   {

    //var_dump($_POST);

    $this->WIdb->insert('wi_kitchen', array(
            "name"  => strip_tags($newItem),
            "section_id"  => $menuSectionId,
          //  "ingred_id" => $confirmed,
           // "method_id" => $key,
            "img" => $newpic
        )); 
    $group_id = $this->WIdb->lastInsertId();

    foreach ($ingredient as $ingred ) {
      var_dump($ingred);
         $this->WIdb->insert('wi_kitchen_ingred', array(
            "ingred"  => strip_tags($ingred['ingredient']),
            "group_id" => $group_id
        ));
    }

    

   
    foreach ($methoddata as $method ) {
        $this->WIdb->insert('wi_kitchen_method', array(
          "method"  => strip_tags($method['method']),
          "group_id" => $group_id
      ));
    }


    $result = array(
        "status" => "success",
        "msg"    => $msg
    );
    
    echo json_encode($result);


   }

}
