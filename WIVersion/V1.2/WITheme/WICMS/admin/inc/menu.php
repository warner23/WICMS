 <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
           <a class="navbar-brand" href="<?php echo $WI['site_url']?><?php echo $WI['game']?>index.php">Game</a>
        </div>
        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active">
              <a href="<?php echo $WI['site_url'] ?><?php echo $WI['forum']?>index.php">Forum</a>
            </li>
            <li>
              <a href="#">Something here</a>
            </li>
            <li class="dropdown">
               <a href="<?php echo $WI['shop'] ?>index.php" class="dropdown-toggle" data-toggle="dropdown">Shop<strong class="caret"></strong></a>
              <ul class="dropdown-menu">
                <li>
                  <a href="<?php echo $WI['shop'] ?>gold.php">Gold</a>
                </li>
                <li>
                  <a href="<?php echo $WI['shop'] ?>gift.php">Gift</a>
                </li>
                
                <li class="divider">
                </li>
                <li>
                  <a href="<?php echo $WI['shop'] ?>accessories.php">Accessories</a>
                </li>
                <li class="divider">
                </li>
                <li>
                  <a href="<?php echo $WI['shop'] ?>skins.php">Skins</a>
                </li>
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control">
            </div> <button type="submit" class="btn btn-default">Submit</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="<?php echo $WI['user'] ?>index.php">Profile</a>
            </li>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">other<strong class="caret"></strong></a>
              <ul class="dropdown-menu">
                <li>
                  <a href="#">something else</a>
                </li>
                <li>
                  <a href="contact_us.php">contact us</a>
                </li>
                <li>
                  <a href="FAQ.php">FAQ</a>
                </li>
                <li class="divider">
                </li>
                <li>
                  <a href="suggestafriend.php">Suggest to a friend</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        
      </nav>