            <div class="row">
                <div class="col-md-12">
  <script>
  $( function() {

    var index = 'key';
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

    $( "#tabs6" ).tabs({
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
<div class="well">
   

    <div id="tabs6">
  <ul>
    <li><a href="#tabs-1">Edit Modules</a></li>
    <li><a href="#tabs-2">Create Modules</a></li>
  </ul>
  <div id="tabs-1">
<?php include_once 'edit.php';?>
  </div>
  <div id="tabs-2">
<?php include_once 'create_modules.php';?>
  </div>

</div>

</div>

</div>
</div>

