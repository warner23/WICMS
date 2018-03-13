<style type="text/css">

.col-lg-6 {
    width: 27%!important;
}
</style>
		<div class="top_head">
			<div class="container">
				<div class="row">
				<!-- contact area-->
					<div class="col-lg-6 col-md-6 col-sm-6">
						<ul class="top_contact">
							<li><a href="#" onclick="WICart.Cart(<?php echo WISession::get('user_id') ;?>)" id="cart" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart
							<span class="badge"><?php if($login->isLoggedIn() ) {echo $cart->CartCount(WISession::get('user_id') ); } else{echo 0;}  ?></span></a>
							<div class="dropdown-menu">
								<div class="panel panel-success" style="width:300px;">
									<div class="panel-heading">
										<div class="row">
											<div class="col-md-3">No</div>
											<div class="col-md-3">Image</div>
											<div class="col-md-3">Name</div>
											<div class="col-md-3">Price £</div>
										</div>
									</div>
									<div class="panel-body">
										<div id="cart_product">
									</div>
									<div class="panel-footer"></div>
								</div>
							</div>

							</li>
						</ul>
					</div>


										<div class="col-lg-6 col-md-6 col-sm-6">
						 <div class="flags-wrapper">
             <a href="?lang=en">
                 <img src="WIMedia/Img/lang/en.png" alt="English" title="English"
                      class="<?php echo WILang::getLanguage() != 'en' ? 'fade' : ''; ?>" />
             </a>
             <a href="?lang=rs">
                 <img src="WIMedia/Img/lang/rs.png" alt="Serbian" title="Serbian"
                      class="<?php echo WILang::getLanguage() != 'rs' ? 'fade' : ''; ?>" />
             </a>
              <a href="?lang=ru">
                  <img src="WIMedia/Img/lang/ru.png" alt="Russian" title="Russian"
                       class="<?php echo WILang::getLanguage() != 'ru' ? 'fade' : ''; ?>" />
              </a>
               <a href="?lang=es">
                  <img src="WIMedia/Img/lang/es.png" alt="Spanish" title="Spanish"
                       class="<?php echo WILang::getLanguage() != 'es' ? 'fade' : ''; ?>" />
              </a>
               <a href="?lang=fr">
                  <img src="WIMedia/Img/lang/fr.png" alt="French" title="french"
                       class="<?php echo WILang::getLanguage() != 'fr' ? 'fade' : ''; ?>" />
              </a>
              <a href="?lang=cn">
                  <img src="WIMedia/Img/lang/cn.png" alt="Chinese" title="chinese"
                       class="<?php echo WILang::getLanguage() != 'cn' ? 'fade' : ''; ?>" />
              </a>
              <a href="?lang=be">
                  <img src="WIMedia/Img/lang/be.png" alt="Belgium" title="belgium"
                       class="<?php echo WILang::getLanguage() != 'be' ? 'fade' : ''; ?>" />
              </a>
         </div>
					</div><!-- end col-lg-6 col-md-6 col-sm-6-->
					<!--  search area-->
					<div class="col-lg-6 col-md-6 col-sm-6">
						<div id="sb-search" class="sb-search">
							<form>
								<input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search"></span>
							</form>
						</div>

						<ul class="social_media"> 
	                        <li><a href="#" data-placement="bottom" data-toggle="tooltip" class="fa fa-facebook" title="Facebook">Facebook</a></li>
	                        <li><a href="#" data-placement="bottom" data-toggle="tooltip" class="fa fa-google-plus" title="Google+">Google+</a></li>
	                        <li><a href="#" data-placement="bottom" data-toggle="tooltip" class="fa fa-twitter" title="Twitter">Twitter</a></li>
	                        <li><a href="#" data-placement="bottom" data-toggle="tooltip" class="fa fa-pinterest" title="Pinterest">Pinterest</a></li>
	                        <li><a href="#" data-placement="bottom" data-toggle="tooltip" class="fa fa-linkedin" title="Linkedin">Linkedin</a></li>
	                        <li><a href="#" data-placement="bottom" data-toggle="tooltip" class="fa fa-rss" title="Feedburner">RSS</a></li>
	                    </ul><!-- End Social --> 
					</div>
				</div>
			</div>
		</div>