	<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
	<title><?php echo $WI['site_name']; ?></title>
	<?php  echo $web->Meta();  ?>
<?php    
include_once 'WIInc/css_links.php';
include_once 'WIInc/js_links.php';
?>

         <?php if(BOOTSTRAP_VERSION == 2): ?>
        <link rel='stylesheet' href='<?php echo $WI['theme_dir'] ?><?php echo $WI['css_site'] ?>bootstrap.min2.css' type='text/css' media='all' />
        <script type="text/javascript" src="<?php echo $WI['theme_dir'] ?><?php echo $WI['js_site'] ?>bootstrap.min2.js"></script>
        <script type="text/javascript" src="<?php echo $WI['theme_dir'] ?><?php echo $WI['js_site'] ?>dataTables.bootstrap2.js"></script>
        <link rel='stylesheet' href='<?php echo $WI['theme_dir'] ?><?php echo $WI['css_site'] ?>style2.css' type='text/css' media='all' />
        <?php else: ?>
        <link rel='stylesheet' href='<?php echo $WI['theme_dir'] ?><?php echo $WI['css_site'] ?>bootstrap.min3.css' type='text/css' media='all' />
        <script type="text/javascript" src="<?php echo $WI['theme_dir'] ?><?php echo $WI['js_site'] ?>bootstrap.min3.js"></script>


        <?php endif; ?>
        



