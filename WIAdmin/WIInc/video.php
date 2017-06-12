
<!-- for the styling and tabs-->
<link rel="stylesheet" href="<?php echo $WI['theme_dir'] ?><?php echo $WI['css_admin'] ?>jquery-ui.css">
 

<script src="<?php echo $WI['theme_dir'] ?><?php echo $WI['js_admin'] ?>jquery-ui.js"></script>-->

<style>
  .drop{

  }
  .dropZone{
    background-image: url(WIMedia/Img/media/dropzone.png);
  }
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
  </ul>
  <div id="fragment-1">
  <div class="drop">
  <div class="dropZone">
    <img src="WIMedia/Img/media/dropzone.png">
  </div></div><!-- drop-->

                  <span class="btn btn-success fileinput-button">
                    <i class="icon-plus icon-white"></i>
                    <span>Add files...</span>
                    <input type="file" name="files[]" multiple>
                </span>
  </div>
  <div id="fragment-2">
    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
  </div>
</div>
 
<script>
$( "#tabs" ).tabs();
</script>