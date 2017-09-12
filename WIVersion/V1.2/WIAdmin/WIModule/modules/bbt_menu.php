<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="menu">
  <ul id="MenuBar1" class="MenuBarHorizontal">
  <li><a href="index.php">Home</a></li>
    <li><a class="MenuBarItemSubmenu" href="services.php">Services</a>
      <ul>
        <li><a href="#">Item 1.1</a></li>
        <li><a href="#">Item 1.2</a></li>
        <li><a href="#">Item 1.3</a></li>
      </ul>
    </li>
    <li><a href="forum/index.php">Forum</a></li>
    <li><a href="about.php">About Us</a></li>
    <li><a href="contact.php">Contact Us</a></li>
    <li><a href="faq.php">FAQ</a></li>
    <li><a class="MenuBarItemSubmenu" href="#">Features</a>
      <ul>
        <li><a class="MenuBarItemSubmenu" href="#">Games</a>
          <ul>
            <li><a href="#">Pandora'a Affair</a></li>
            <li><a href="#">Item 3.1.2</a></li>
          </ul>
        </li>
        <li><a href="#">Coming Soon</a></li>
        <li><a href="#">Premium</a></li>
      </ul>
    </li>
    
  </ul>
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>