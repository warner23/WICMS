 <style type="text/css">
   .off{
    display: none;
   }

   .on{
    display: block;
   }
 </style>


  <script>

      $(function() {
    //  jQueryUI 1.10 and HTML5 ready
    //      http://jqueryui.com/upgrade-guide/1.10/#removed-cookie-option 
    //  Documentation
    //      http://api.jqueryui.com/tabs/#option-active
    //      http://api.jqueryui.com/tabs/#event-activate
    //      http://balaarjunan.wordpress.com/2010/11/10/html5-session-storage-key-things-to-consider/
    //
    //  Define friendly index name
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



    $('#tabs3').tabs({
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
                        Styling
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Styling</li>
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


                     <div id="tabs3">
  <ul>
    <li><a href="#tabs-1">Theme</a></li>
    <li><a href="#tabs-2">CSS</a></li>
    <li><a href="#tabs-3">JS</a></li>

  </ul>
  <div id="tabs-1">
 <?php include_once 'WIInc/site/Styling/theme.php'; ?> 
  </div>
  <div id="tabs-2">
<?php include_once 'WIInc/site/Styling/css.php'; ?> 
  </div>
  <div id="tabs-3">
<?php include_once 'WIInc/site/Styling/js.php'; ?> 
  </div>

</div>

                     </div>
                     </div>
                     </div>
                     </div>

                     </section>
<script type="text/javascript" src="WICore/WIJ/WICore.js"></script>
    <script type="text/javascript" src="WICore/WIJ/WICSS.js"></script>
    <script type="text/javascript" src="WICore/WIJ/WIJS.js"></script>
    <script type="text/javascript" src="WICore/WIJ/WITheme.js"></script>


   <?php  

 $modal->moduleModal('theme', 'Add new theme', 'WITheme', 'theme','create theme'); 

   ?>