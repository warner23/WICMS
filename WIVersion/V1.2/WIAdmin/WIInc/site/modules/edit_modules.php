            <div class="row">
                <div class="col-md-12">
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Edit Modules</a></li>
    <li><a href="#tabs-2">Create Modules</a></li>
  </ul>

  <div id="tabs-1">
<?php include_once 'edit.php'; ?>
  </div>

  <div id="tabs-2">
<?php include_once 'create_modules.php';?>
  </div>

</div>



</div>
</div>
