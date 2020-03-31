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

    $( "#tabs5" ).tabs({
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
  </script> <link href="WIInc/css/toolbox.css" rel="stylesheet">
    <link href="WIInc/css/editor.css" rel="stylesheet">
    <link href="WIInc/css/docs.min.css" rel="stylesheet">
 <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                <h1>Modules <small> Control panel</small></h1>
                        
                        
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Modules</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

<div class="wrap">
    <h2>Module Center</h2>
</div>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">

<style>

#droppable-1 {
position: absolute;
    left: 0px;
    top: 0;
    width: 100%;
    height: 274px;
    background: #999;
    color: #fff;
    padding: 10px;
  }

  .external-event
  {
    z-index: 2000;
  }

.content
{
    width: 100%;
}
.cust-1
{
    width: 100%;
    padding: 5px;
    background-color: #2460C7;
}

.cust-title
{
    width: 31%;
    margin-left: 279px;
    color: white;
    font-size: 25px;
}

.button
{
        width: 8%;
    float: right;
    margin-top: -28px;
}

.right-side-panel
{
    background-color: #f9f9f9;
    /* margin-left: 267px; */
    float: left;
    /* min-height: 100%; */
    display: block;
    width: 75%;
    border: 2px solid black;
}

.Frame
{
    width: 90%;
    height: 600px;
    margin-left: 39px;
    padding: 10px;
}
 
    .icon-ok{
        color: #008800;
    }
    .icon-remove{
        color: #ff0000;
    }
    a{
        outline: none !important;
    }
   
    .popover .arrow{
        margin-left: 0 !important;
    }
    .panel-footer .btn{
        width: 90px;
        font-size: 11px;
    }

</style>

<div class="well">

   <div id="tabs5">
  <ul>
    <li><a href="#tabs-1">Install Elements</a></li>
    <li><a href="#tabs-2">Available Elements</a></li>
    <li><a href="#tabs-3">Install Modules</a></li>
    <li><a href="#tabs-4">Available Modules</a></li>
    <li><a href="#tabs-5">Settings</a></li>
    <li><a href="#tabs-6">Edit Modules</a></li>
    <li><a href="#tabs-7">Modules Shop</a></li>
  </ul>
    <div id="tabs-1">
<?php include_once 'WIInc/site/modules/install_elements.php';?>
  </div>
  <div id="tabs-2">
<?php include_once 'WIInc/site/modules/available_elements.php';?>
  </div>
  <div id="tabs-3">
<?php include_once 'WIInc/site/modules/install.php';?>
  </div>
  <div id="tabs-4">
<?php include_once 'WIInc/site/modules/available_modules.php';?>
  </div>
  <div id="tabs-5">
 <?php include_once 'WIInc/site/modules/modules_settings.php';?>
  </div>

    <div id="tabs-6">
<?php include_once 'WIInc/site/modules/edit_modules.php';?>
  </div>

    <div id="tabs-7">
 <?php include_once 'WIInc/site/modules/modules_store.php';?>
  </div>
</div> 

</div>








</div><!-- end content-->
 </section>
 <script type="text/javascript" src="WICore/WIJ/WICore.js"></script>
 <script type="text/javascript" src="WICore/WIJ/WIMedia.js"></script>
<script type="text/javascript" src="WICore/WIJ/WIMediaCenter.js"></script>
 <script type="text/javascript" src="WICore/WIJ/WIMod.js"></script>
 <script type="text/javascript" src="WICore/WIJ/WIImage.js"></script>
 <script type="text/javascript" src="WICore/WIJ/WIPageBuilder.js"></script>
    <script type="text/javascript" src="WIInc/js/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="WIInc/js/jquery.htmlClean.js"></script>
<!--     <script type="text/javascript" src="WIInc/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="WIInc/ckeditor/config.js"></script>  -->
    <script type="text/javascript" src="WICore/WIJ/WIScripts.js"></script>
    <script type="text/javascript" src="WIInc/js/FileSaver.js"></script>
    <script type="text/javascript" src="WIInc/js/blob.js"></script>

               <?php  

 $modal->moduleModal('element_enable', 'Element Enabler', 'WIMod', 'enabler','Enable all elements'); 

   ?>
    <!--<script src="WIInc/js/docs.min.js"></script>


