
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
$( "#tabs" ).tabs();
</script>

<script type="text/javascript" src="WICore/WIJ/WICore.js"></script>

<script type="text/javascript" src="WICore/WIJ/WIMedia.js"></script>

<script type="text/javascript" src="WICore/WIJ/WIMediaCenter.js"></script>