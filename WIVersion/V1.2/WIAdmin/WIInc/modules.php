  <script>
  $( function() {
    $( "#tabs1" ).tabs();
  } );
  </script>
 <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                <h1>Modules</h1>
                        
                        <small>Control panel</small>
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
    .w3eden{
        font-family: 'Open Sans', serif;
        font-size: 10pt;
        color: #555555;
    }
    .w3eden .panel-heading .mod_status{
        width:70px;font-size:9pt;font-weight:300;border-radius:2px;padding:5px;
        margin-top: -1px;
    }
    .w3eden .panel-heading{
        font-size: 11pt;
        font-weight: 900;
        color: #333333;
        line-height: normal;
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
    #modpreview .btn,
    #cache .btn{
        opacity: 1 !important;
        width: 80px !important;
    }
    .popover .arrow{
        margin-left: 0 !important;
    }
    .panel-footer .btn{
        width: 90px;
        font-size: 11px;
    }

    .mid
    {

    }
</style>

<div id="tabs1">
  <ul>
    <li><a href="#tabs-1">Install Module</a></li>
    <li><a href="#tabs-2">Available Modules</a></li>
    <li><a href="#tabs-3">Settings</a></li>
    <li><a href="#tabs-4">Edit Modules</a></li>
    <li><a href="#tabs-5">Module Store</a></li>
  </ul>
  <div id="tabs-1">
<?php  include_once 'WIInc/site/modules/install.php';?>
  </div>
  <div id="tabs-2">
<?php  include_once 'WIInc/site/modules/available_modules.php';?>
  </div>
  <div id="tabs-3">
<?php  include_once 'WIInc/site/modules/modules_settings.php';?>
  </div>

    <div id="tabs-4">
<?php include_once 'WIInc/site/modules/edit_modules.php';?>
  </div>

    <div id="tabs-5">
 <?php include_once 'WIInc/site/modules/modules_store.php';?>

  </div>
</div>


<script type="text/template" id="updatenotice">
    Update Available.<br/>
    Current Version: [version]<br/><br/>
    <a href="#" class="btn update-now btn-success" rel="[modulename]">Update Now</a> <a href="#" class="btn close-update-notice">Update Later</a>
</script>  

<script type="text/template" id="noupdate">
    No update available. You are using the latest version.<br/><br/>
    <a href="#" class="btn btn-default btn-sm close-update-notice">Close</a>
</script>

<script type="text/template" id="update-completed">
    MiniMax [modulename] Module has been successfully updated.<br/><br/>
    <a href="#" class="btn close-update-completed-notice">Okay</a>
</script>






</div><!-- end content-->
 </section>

             <script type="text/javascript" src="WICore/WIJ/WIMod.js"></script>