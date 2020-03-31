
<!-- for the styling and tabs-->
<link rel="stylesheet" href="<?php echo $WI['theme_dir'] ?><?php echo $WI['css_admin'] ?>jquery-ui.css">
 

<script src="<?php echo $WI['theme_dir'] ?><?php echo $WI['js_admin'] ?>jquery-ui.js"></script>-->

<style>


</style>
<!-- Shim to make HTML5 elements usable in older Internet Explorer versions -->
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!-- end of uploads and img workings and styling-->
   <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Media Center</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>
                <h1 style="margin-left: 36%;">Media Center</h1></br>



<div id="tabs">
  <ul>
    <li><a href="#fragment-1"><span>Images</span></a></li>
    <li><a href="#fragment-2"><span>Videos</span></a></li>
    <li><a href="#fragment-3"><span>Uploads</span></a></li>
  </ul>
  <div id="fragment-1">
  <?php include_once'site/media/images.php'; ?>
  </div>
  <div id="fragment-2">
   <?php include_once'site/media/videos.php'; ?>
  </div>

    <div id="fragment-3">
  <?php include_once'site/media/uploads.php'; ?>
  </div>

</div>
 
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

<script type="text/javascript" src="WICore/WIJ/WICore.js"></script>

<script type="text/javascript" src="WICore/WIJ/WIMedia.js"></script>

<script type="text/javascript" src="WICore/WIJ/WIMediaCenter.js"></script>