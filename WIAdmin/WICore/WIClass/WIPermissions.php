<?php

/**
* WIPermissions Class
* Created by Warner Infinity
* Author Jules Warner
*/

class WIPermissions
{
  function __construct() {
       $this->WIdb = WIdb::getInstance();
    }

    public function permissionTabs()
    {

/*        $sql = "SELECT * FROM `wi_user_roles`";
        $query = $this->WIdb->prepare($sql);
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);*/

        $result = $this->WIdb->select("SELECT * FROM `wi_user_roles`");

        echo ' <script>
                $( function() {

                  var index = "key";
              //  Define friendly data store name
              var dataStore = window.sessionStorage;
              //  Start magic!
              try {
                  // getter: Fetch previous value
                  var oldIndex = dataStore.getItem(index);
              } catch(e) {
                  // getter: Always default to first tab in error state
                  var oldIndex = 0;
              }

                  $( "#tabs" ).tabs({
        // The zero-based index of the panel that is active (open)
        active : oldIndex,
        // Triggered after a tab has been activated
        activate : function( event, ui ){
            //  Get future value
            var newIndex = ui.newTab.parent().children().index(ui.newTab);
            //  Set future value
            dataStore.setItem( index, newIndex ) 
        }
    }); 

    
    });
                </script>

                <div id="tabs">
              <ul>';
         foreach ($result as $tab) {
          echo  '<li><a href="#tabs-' . $tab['role_id'] . '">' . $tab['role'] . '</a></li>';
        }
        echo '</ul>';

        foreach ($result as $tab) {
          echo  '<div id="tabs-' . $tab['role_id'] . '">';
                  self::PermissionContents($tab['role_id'], $tab['role']);
                  echo '</div>'; 
        }
        echo '</div>';


    }

    public function PermissionContents($id, $role)
    {

        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_user_permissions` WHERE `group` AND `role_id`=:id",
                     array("id" => $id));

        echo '<div id="legend">
                          <legend class="user_role_id" id="' . $result[0]['id'] .'">' . $role . ' Permissions</legend>
                        </div>';

        echo '<div class="sectionwrapper">
                        <div class="sect">edit</div>
                        <div class="sect">Create</div>
                        <div class="sect">Delete</div>
                        <div class="sect">View</div>
                        </div>';


        foreach ($result as $res ) {
          echo ' <form  class="form-horizontal UPermission-form" id="UPermission-"'.$role.'>
                      <fieldset>
                        <div class="form-group">
                           <label>' . $res['perm_name'] . '</label>

                    <div class="btn-group perm" id="editing" data-toggle="buttons-radio">

                    <input type="hidden" class="site" id="' . $res['id'] . '">
                     <label class="switch">
                      <input type="hidden" name="view" id="view-' . $res['id'] . '" class="btn-group-value" value="' . $res['view'] . '"/>
                        <input type="checkbox" id-"view_site_' . $res['id'] . '" checked class="view_site">
                        <span class="slider round vi" id="vi-' . $res['id'] . '"></span>
                      </label>

                      <label class="switch">
                      <input type="hidden" name="del" id="del-' . $res['id'] . '" class="btn-group-value" value="' . $res['delete'] . '"/>
                        <input type="checkbox" id="delete_site_' . $res['id'] . '" checked>
                        <span class="slider round de" id="de-' . $res['id'] . '"></span>
                      </label>

                       <label class="switch">
                      <input type="hidden" name="create" id="create-' . $res['id'] . '" class="btn-group-value" value="' . $res['create'] . '"/>
                        <input type="checkbox" id="create_site_' . $res['id'] . '" checked>
                        <span class="slider round cr" id="cr-' . $res['id'] . '"></span>
                      </label>

                      <label class="switch">
                       <input type="hidden" name="edit" id="edit-' . $res['id'] . '" class="btn-group-value" value="' . $res['edit'] . '"/>
                        <input type="checkbox" id="edit_site_' . $res['id'] . '" checked>
                        <span class="slider round ed" id="ed-' . $res['id'] . '"></span>
                      </label>

                    </div>
                </div>

                              
                      <div class="results" id="results"></div>
                    </fieldset>
                        <br /><br />
                  </form>


                   <script type="text/javascript">
                       var edit = $("#edit-' . $res['id'] . '").attr(`value`);
                       if (edit === "0"){
                        $("#edit_site_' . $res['id'] . '").prop("checked", false);
                        $("#ed-' . $res['id'] . '").text(`OFF`);
                        $("#ed-' . $res['id'] . '").css(`padding-left`, `50%`);
                       }else if (edit === "1"){
                        $("#edit_site_' . $res['id'] . '").prop("checked", true);
                        $("#ed-' . $res['id'] . '").text(`ON`);
                       }

                       var create = $("#create-' . $res['id'] . '").attr(`value`);
                       console.log(create);
                       if (create === "0"){
                        $("#create_site_' . $res['id'] . '").prop("checked", false);
                        $("#cr-' . $res['id'] . '").text(`OFF`);
                        $("#cr-' . $res['id'] . '").css(`padding-left`, `50%`);
                       }else if (create === "1"){
                        $("#create_site_' . $res['id'] . '").prop("checked", true);
                        $("#cr-' . $res['id'] . '").text(`ON`);
                       }

                       var del = $("#del-' . $res['id'] . '").attr(`value`);
                       if (del === "0"){
                        $("#delete_site_' . $res['id'] . '").prop("checked", false);
                        $("#de-' . $res['id'] . '").text(`OFF`);
                        $("#de-' . $res['id'] . '").css(`padding-left`, `50%`);
                       }else if (del === "1"){
                        $("#delete_site_' . $res['id'] . '").prop("checked", true);
                        $("#de-' . $res['id'] . '").text(`ON`);
                       }

                       var view = $("#view-' . $res['id'] . '").attr(`value`);
                       if (view === "0"){
                        $("#view_site_' . $res['id'] . '").prop("checked", false);
                        $("#vi-' . $res['id'] . '").text(`OFF`);
                        $("#vi-' . $res['id'] . '").css(`padding-left`, `50%`);
                       }else if (view === "1"){
                        $("#view_site_' . $res['id'] . '").prop("checked", true);
                        $("#vi-' . $res['id'] . '").text(`ON`);
                       }



                   </script>
                  ';
        }
      
    }

    public function site_perm($ed, $id, $edit)
    {
      //echo $edit;
      $perm = array($ed => $edit);

      $this->WIdb->update("wi_user_permissions", $perm,"`id` = :id",
                    array( "id" => $id) 
                  );
      $result = array(
        "status"  => "completed"
                );
      echo json_encode($result);
               
    }

   
}