 <style type="text/css">
   .off{
    display: none;
   }

   .on{
    display: block;
   }
 </style>

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
    
    $( "#tabs4" ).tabs({
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
 <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Multi Language
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Multi Language</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6 col-xl-12">
                            <!-- input box's box -->
                            <div class="modal-body">

            <div class="well">


                     <div id="tabs4">
  <ul>
    <li><a href="#tabs-1">Set Up</a></li>
    <li><a href="#tabs-2">Add</a></li>
  </ul>
  <div id="tabs-1">
<?php include_once 'WIInc/site/lang/set_up.php'; ?>  
  </div>
  <div id="tabs-2">
<?php include_once 'WIInc/site/lang/add.php'; ?> 
  </div>
</div>
   </div>
   </div>
   </div>
   </div>

   </section>
<script type="text/javascript" src="WICore/WIJ/WICore.js"></script>
    <script type="text/javascript" src="WICore/WIJ/WILang.js"></script>

    <script type="text/javascript" src="WICore/WIJ/WIMediaCenter.js"></script>



   