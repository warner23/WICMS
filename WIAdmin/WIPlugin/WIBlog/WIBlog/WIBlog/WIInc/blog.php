
<!-- Start Content Blog -->		
<section class="content blog">			
<div class="container">				
<div class="row">
<div class="type">
<div class="blogSelect" id="blog_post" title="Choose Post" onclick="WIBlog.type()">
<i class="fa fa-th"></i>
</div>	

<div class="admin_post hidden">
<ul>
	<li class="blog_type" title="Blog post no media"><a href="#"  onclick="WIBlog.noMedia()"><i class="fa fa-file-text" aria-hidden="true"></i></a></li>
	<li class="blog_type" title="Blog post slider"><a href="#" onclick="WIBlog.slider()"><i class="fa fa-sliders" aria-hidden="true"></i></a></li>
	<li class="blog_type" title="Blog post video"><a href="#" onclick="WIBlog.video()"><i class="fa fa-list-alt" aria-hidden="true"></i></a></li>
	<li class="blog_type" title="Blog post audio"><a href="#"  onclick="WIBlog.audio()"><i class="fa fa-file-audio-o" aria-hidden="true"></i></a></li>
	<li class="blog_type" title="Blog post image"><a href="#" onclick="WIBlog.image()"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>
	<li class="blog_type" title="Blog post youtube"><a href="#" onclick="WIBlog.youtube()"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
</ul>
</div>
	</div>	


<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">	
	
	<div class="blog_style" id="blog_style">
		
	</div>	

  <div class="blog_style" id="posts">							
						
	</div>			
	
        <div class="paginate">							
        <ul class="pagination">								
          <li class="disabled">
          <a href="#">«</a></li>					        	
       		<li class="active"><a href="#">1 
            <span class="sr-only">(current)</span></a></li>								
            <li><a href="#">2</a></li>								
            <li><a href="#">3</a></li>								
            <li><a href="#">4</a></li>								
            <li><a href="#">5</a></li>								
            <li><a href="#">»</a></li>							
            </ul>						
            </div>					
            </div>					
            <!--End Side Blog Content-->					
           <?php   include_once 'WIInc/sidebar.php'; ?>
           </div>			
           </div>		
           </section>	
                            		
         <!-- End Content Blog -->
         <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
       <script type="text/javascript" src="WICore/WIJ/WIBlog.js"></script>
       <script type="text/javascript" src="WICore/WIJ/WIBlogUpload.js"></script>
       <script type="text/javascript" src="WICore/WIJ/WIBlogVidUpload.js"></script>


