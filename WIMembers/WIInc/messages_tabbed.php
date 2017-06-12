<
  <script>
  $( function() {
    $( "#tabs1" ).tabs();
  } );
  </script>

<div id="tabs1">
  <ul>
    <li><a href="#tabs-1">Inbox</a></li>
    <li><a href="#tabs-2">Sentbox</a></li>
    
  </ul>
  <div id="tabs-1">
      Inbox
      <?php include_once 'WIInc/inbox.php';?>

  </div>
  <div id="tabs-2">
    <?php include_once 'WIInc/tabbed_sentbox.php';?>
  </div>

</div>
