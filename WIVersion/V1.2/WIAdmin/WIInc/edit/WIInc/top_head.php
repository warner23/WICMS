
		<div class="top_head">
			<div class="container">
				<div class="row">
				<div class="logo">
				<img alt="WICMS"  class="img-responsive" src="WIAdmin/WIMedia/Img/header/<?php echo $web->webSite_essentials('logo');?>"></a>
				</div>
			<div class="col-lg-4 col-md-6 col-sm-6 lang">
						 <div class="flags-wrapper">
             <a href="?lang=en">
                 <img src="WIAdmin/WIMedia/Img/lang/en.png" alt="English" title="English"
                      class="<?php echo WILang::getLanguage() != 'en' ? 'fade' : ''; ?>" />
             </a>
             <a href="?lang=rs">
                 <img src="WIAdmin/WIMedia/Img/lang/rs.png" alt="Serbian" title="Serbian"
                      class="<?php echo WILang::getLanguage() != 'rs' ? 'fade' : ''; ?>" />
             </a>
              <a href="?lang=ru">
                  <img src="WIAdmin/WIMedia/Img/lang/ru.png" alt="Russian" title="Russian"
                       class="<?php echo WILang::getLanguage() != 'ru' ? 'fade' : ''; ?>" />
              </a>
               <a href="?lang=es">
                  <img src="WIAdmin/WIMedia/Img/lang/es.png" alt="Spanish" title="Spanish"
                       class="<?php echo WILang::getLanguage() != 'es' ? 'fade' : ''; ?>" />
              </a>
               <a href="?lang=fr">
                  <img src="WIAdmin/WIMedia/Img/lang/fr.png" alt="French" title="french"
                       class="<?php echo WILang::getLanguage() != 'fr' ? 'fade' : ''; ?>" />
              </a>
              <a href="?lang=cn">
                  <img src="WIAdmin/WIMedia/Img/lang/cn.png" alt="Chinese" title="chinese"
                       class="<?php echo WILang::getLanguage() != 'cn' ? 'fade' : ''; ?>" />
              </a>
              <a href="?lang=be">
                  <img src="WIAdmin/WIMedia/Img/lang/be.png" alt="Belgium" title="belgium"
                       class="<?php echo WILang::getLanguage() != 'be' ? 'fade' : ''; ?>" />
              </a>
         </div>
					</div><!-- end col-lg-6 col-md-6 col-sm-6-->
					<!--  search area-->
					<div class="col-lg-5 col-md-6 col-sm-6 social">
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

		<script type="text/javascript">
			$(document).ready(function () {
				$("#sb-search").css("width","0px");

				$("#sb-search").click(function(event){
					event.preventDefault();
					
					if ($("#sb-search").hasClass("open")){
						$("#sb-search").css("width","0px");
					}else{
					$("#sb-search").css("width","250px");
					$("#sb-search").addClass("open")

				}

				});


			});



		</script>
    
