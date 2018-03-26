<?php
/**
* resource Class
* Created by Warner Infinity
* Author Jules Warner
*/
class WIBlog
{
	function __construct() 
	{
       $this->WIdb = WIdb::getInstance();
    }


    public function Cat()
	{

	$query = $this->WIdb->prepare('SELECT * FROM wi_blogcategories');
	$query->execute();
	echo '<div class="title_widget">									
			<h3>Categories</h3>								
			</div>								
			<ul class="arrows_list">';
	while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
		echo '<li><a href="#" class="category" cid="' . $result['cat_id']. '"><i class="fa fa-angle-right"></i> ' . $result['title'] . '<span>10</span></a></li>';
		}
	echo '</ul>';
	}

	public function SelectCategory()
	{
		$query = $this->WIdb->prepare('SELECT * FROM wi_blogcategories');
		$query->execute();
		echo '<label for="Category">Category</label><select name="Category" id="cat"><option value="" selected="selected">Select Category</option> ';
		while ($res = $query->fetch(PDO::FETCH_ASSOC)) {
			echo '<option value="' . $res['cat_id'] . '">' . $res['title'] . '</option>';
		}
		echo ' </select>';

	}


		public function selectedCat($cid)
	{

		 if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
        $page_number = 1; //if there's no page number, set it to 1
    }

        $item_per_page = 8;

        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_blog`");
        $rows = count($result);

        //break records into pages
        $total_pages = ceil($rows/$item_per_page);

                //get starting position to fetch the records
        $page_position = (($page_number-1) * $item_per_page);



		$query = $this->WIdb->prepare('SELECT * FROM wi_blog WHERE Category = :cid');
		$query->bindParam(':cid', $cid, PDO::PARAM_INT);
		$query->execute();

		$res = $query->fetchAll();
		//var_dump($res);
		$type = $res['type'];
		$date = $res['day'];
		//echo $type;
	     $type = "NoMedia";
		if($type === "NoMedia"){
			//echo "posts";
			$sql = "SELECT * FROM `wi_blog` WHERE type =:type AND Category = :cid ORDER BY day DESC";
		$query = $this->WIdb->prepare($sql);
		$query->bindParam(':type', $type, PDO::PARAM_STR);
		$query->bindParam(':cid', $cid, PDO::PARAM_INT);
		$query->execute();

		while($posts = $query->fetchAll(PDO::FETCH_ASSOC) ){
			foreach ($posts as $post) {
				echo '<div class="blog_style_2"><article class="post_container">                             
         <div class="post-info">                                    
         <div class="post-date">                                        
         <span class="day">' . $post['day'] . '</span>                                        
         <span class="month">' . $post['month'] . '</span>                                    
         </div>                                    
         <div class="post-category">                                      
         <i class="fa fa-file-text-o"></i>                                    
         </div>                               
          </div><!-- .post-info end -->                                
          <div class="post-content">                                   
           <a href="blog_post.html">                                       
            <h4>' . $post['title'] . '</h4>                                    
            </a>                                    
            <div class="blog-meta">                                        
            <ul>                                            
            <li class="fa fa-user">                                               
             <a href="#">' . $post['user'] . '</a>                                            
             </li>                                            
             <li class="post-tags fa fa-tags">                                                
             <a href="#">news, </a>                                               
              <a href="#">dois</a>                                            
              </li>                                        
              </ul>                                   
               </div>                                    
               <p>                                      
               ' . $post['post'] . '                                  
               </p>                                    
               <a href="' . $post['href'] . '">' . $post['button_name'] . '</a>                             
               </div>                        
                              
                    </article></div>
                              
                         <!-- .blog-post end -->';
			}
			
			}
		

		}

	    if($type === "mediaSlider"){
			
		}

		if($type === "mediaVideo"){
			
		}
		$type = "blog_image";
		if($type === "blog_image"){
			
			$sql = "SELECT * FROM `wi_blog` WHERE type =:typ AND Category = :cid ORDER BY day DESC";
		$query = $this->WIdb->prepare($sql);
		$query->bindParam(':type', $type, PDO::PARAM_STR);
		$query->bindParam(':cid', $cid, PDO::PARAM_INT);
		$query->execute();

		while($posts = $query->fetchAll(PDO::FETCH_ASSOC) ){
			foreach ($posts as $post) {
				echo '<!-- .latest-posts start --><div class="blog_style_2">                            
                              <article class="post_container">                              
                              <div class="post-info">                                    
                              <div class="post-date">                                        
                              <span class="day">' . $post['day'] . '</span>                                        
                              <span class="month">' . $post['month'] . '</span>                                    
                              </div>                                    
                              <div class="post-category">                                     
                              <i class="fa fa-picture-o"></i>                                    
                              </div>                                
                              </div><!-- .post-info end -->                                
                              <figure class="post-image">                 
                              <a href="#"><img src="WIMedia/Img/blog/' . $post['image'] . '" alt=""></a>                
                              </figure>                               
                               <div class="post-content">                                    
                               <a href="blog_post.html">                                        
                               <h4>' . $post['title'] . '</h4>                                    
                               </a>                                    
                               <div class="blog-meta">                                        
                               <ul>                                            
                               <li class="fa fa-user">                                                
                               <a href="#">' . $post['user'] . '</a>                                           
                                </li>                                           
                                 <li class="post-tags fa fa-tags">                                               
                                  <a href="#">news, </a>                                                
                                  <a href="#">dois</a>                                           
                                   </li>                                        
                                   </ul>                                    
                                   </div>                                    
                                   <p>                                      
                                   ' . $post['post'] . '                               
                                   </p>                                    
                                   <a href="' . $post['href'] . '" class="read-more">' . $post['button_name'] . '</a>                             
                                   </div>                         
                                   </article><!-- .blog-post end --> </div>';
				}
			}
		}

		if($type === "mediaaudio"){
			
		}

		if($type === "mediaYoutube"){
			$sql = "SELECT * FROM `wi_blog` WHERE type =:typ AND Category = :cid ORDER BY day DESC";
		$query = $this->WIdb->prepare($sql);
		$query->bindParam(':type', $type, PDO::PARAM_STR);
		$query->bindParam(':cid', $cid, PDO::PARAM_INT);
		$query->execute();

		while($posts = $query->fetchAll(PDO::FETCH_ASSOC) ){
			foreach ($posts as $post) {
				echo '<!-- .latest-posts start -->                            
    <article class="post_container">                              
    <div class="post-info">                                    
    <div class="post-date">                                        
    <span class="day">' . $post['day']. '</span>                                        
    <span class="month">' . $post['month'] .'</span>                                    
    </div>                                    
    <div class="post-category">                                     
    <i class="fa fa-picture-o"></i>                                    
    </div>                                
    </div><!-- .post-info end -->                                
    <figure class="post-video">                                    
   <iframe src="' . $post['youtube'] .'" allowfullscreen></iframe>         
     </figure>                                
     <div class="post-content">                                    
     <a href="blog_post.html">                                        
     <h4>Blog post with Youtube</h4>                                    
     </a>                                    
     <div class="blog-meta">                                        
     <ul>                                           
      <li class="fa fa-user">                                                
      <a href="#">' . $post['user'] . '</a>                                            
      </li>                                            
      <li class="post-tags fa fa-tags">                                                
      <a href="#">news, </a>                                                
     <a href="#">dois</a>                                            
      </li>                                        
    </ul>                                    
    </div>                                    
    <p>                                     
    ' . $post['post'] . '                                 
    </p>                                    
    <a href="blog_post.html" class="read-more">Read more</a>                              
    </div>                        
    </article>
      <!-- .blog-post end -->';
				}
			}
		}
	}

		



		public function Resource()
	{
		$query = $this->WIdb->prepare('SELECT * FROM wi_resources ORDER BY RAND() LIMIT 0,9');
		$query->execute();
		while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
			echo '	<div class="col-md-4 col-lg-4 col-sm-4">
		<div class="panel panel-info">
		<div class="panel-heading">' . $result['title'] . '</div>
		<div class="panel-body">
			<img src="WIMedia/Img/resources/' . $result['image'] . '" style="width:160px;height:250px;"/>
		</div>
		<div class="panel-footer">' . $result['publish_date'] . '
			<button rid="' . $result['resource_id'] . '" onclick="WIResources.Source(' . $result['resource_id'] . ')" style="float:right;" class="btn btn-danger btn-xs" id="OSDP_resource">View Resource</button>
		</div>
		</div>
	</div>';
		}
	}

	public function noMedia($day, $month, $post_title, $blog_post, $type, $user, $cat_id)
	{

		 $this->WIdb->insert('wi_blog', array(
            "type"     => $type,
            "day"  => $day,
            "month"  => $month,
            "title" => $post_title,
            "user" => $user,
            "post" => $blog_post,
            "Category"  => $cat_id
            ));

		 $msg = "Successfully added to db";

		 $result = array(
		 	"status" => "complete",
		 	"msg"    => $msg
		 );

		 echo json_encode($result);

	}


		public function blogPostImage($day, $month, $post_title, $blog_post, $type, $cat_id, $user, $image)
	{
		//echo $type;
		 $this->WIdb->insert('wi_blog', array(
            "type"     => $type,
            "day"  => $day,
            "month"  => $month,
            "Category"  => $cat_id,
            "title" => $post_title,
            "user" => $user,
            "post" => $blog_post,
            "image"    => $image
            ));

	}

	public function blogPostSlider($day, $month, $post_title, $blog_post, $type, $cat_id, $user, $image, $image1, $image2, $caption, $caption1,$caption2 )
	{
		//echo $type;
		 $this->WIdb->insert('wi_blog', array(
            "type"     => $type,
            "day"  => $day,
            "month"  => $month,
            "Category"  => $cat_id,
            "title" => $post_title,
            "user" => $user,
            "post" => $blog_post,
            "image"    => $image,
            "image2"    => $image1,
            "image3"    => $image2,
            "caption"    => $caption,
            "caption1"    => $caption1,
            "caption2"    => $caption2
            ));

	}

	public function blogPostAudio($day, $month, $post_title, $blog_post, $type, $cat_id, $user, $audio)
	{
		//echo $type;
		 $this->WIdb->insert('wi_blog', array(
            "type"     => $type,
            "day"  => $day,
            "month"  => $month,
            "Category"  => $cat_id,
            "title" => $post_title,
            "user" => $user,
            "post" => $blog_post,
            "audio"    => $audio
            ));

	}

	public function blogPostVideo($day, $month, $post_title, $blog_post, $type, $user, $cat_id, $video)
	{
		//echo $type;
		 $this->WIdb->insert('wi_blog', array(
            "type"     => $type,
            "day"  => $day,
			"Category"  => $cat_id,
            "month"  => $month,
            "title" => $post_title,
            "user" => $user,
            "post" => $blog_post,
            "video"    => $video
            ));

	}

	public function YoutubeMedia($day, $month, $post_title, $ytlink, $blog_post, $type, $user, $cat_id)
	{

		 $this->WIdb->insert('wi_blog', array(
            "type"     => $type,
            "day"  => $day,
            "month"  => $month,
            "title" => $post_title,
            "youtube" => $ytlink,
            "user" => $user,
            "post" => $blog_post,
            "Category"  => $cat_id
            ));

		 $msg = "Successfully added to db";

		 $result = array(
		 	"status" => "complete",
		 	"msg"    => $msg
		 );

		 echo json_encode($result);

	}





	public function Search($keywords)
	{
		$sql = "SELECT * FROM wi_resources WHERE keywords LIKE :keyword";
		$query = $this->WIdb->prepare($sql);
		$query->bindParam(':keyword', $keywords, PDO::PARAM_STR);
		$query->execute();
		while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
			echo '	<div class="col-md-4 col-lg-8 col-sm-4">
		<div class="panel panel-info">
		<div class="panel-heading">' . $result['title'] . '</div>
		<div class="panel-body">
			<img src="WIMedia/Img/resources/' . $result['image'] . '" style="width:160px;height:250px;"/>
			
		</div>
		<div class="panel-heading">' . $result['publish_date'] . '
			<button pid="' . $result['resource_id'] . '" style="float:right;" class="btn btn-danger btn-xs" id="product">Add to cart</button>
		</div>
		</div>
	</div>';
		}
	}

	public function getResource($rid)
	{
		$sql = "SELECT * FROM wi_resources WHERE resource_id =:rid";
		$query = $this->WIdb->prepare($sql);
		$query->bindParam(':rid', $rid, PDO::PARAM_INT);
		$query->execute();

		while($result = $query->fetch())
		{
			echo '<div class="row">
          <div class="span5">
            <div id="items-carousel" class="carousel slide mbottom0">
              <div class="carousel-inner">
                <div class="active item">
                  <img class="media-object" id="media-object" src="WIMedia/Img/resources/' . $result['image'] . '" style="width:160px;height:250px;" alt="" />
                </div>

                <div class="item">
                  <img class="media-object" src="" alt="" />
                </div>

                <div class="item">
                  <img class="media-object" src="" alt="" />
                </div>
              </div>
              <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
              <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
            </div>
          </div>

          <div class="span4">
            <h4 id="brand">' . WIResources::catType($result['cat'])  . '</h4>
            <h5 id="name" class="item_name">' . $result['title'] . '</h5>
            <p id="descript"></p>
            
              <a href="WIMedia/Resources/' . $result['dl_link'] . '" class="btn btn-primary" id="osdp" onclick="WIResources.Download(event)">View & download</a>
            
            
            
          </div>
        </div>';
		}
		

	
	}

	public function Share()
	{
		echo '<ul class="shares">									
		<li class="shareslabel"><h3>Share</h3></li>									
		<li><a title="" data-toggle="tooltip" data-placement="top" href="#" class="twitter" data-original-title="Twitter"></a></li>	
		<li><a title="" data-toggle="tooltip" data-placement="top" href="#" class="facebook" data-original-title="Facebook"></a></li>									
		<li><a title="" data-toggle="tooltip" data-placement="top" href="#" class="gplus" data-original-title="Google Plus"></a></li>									
		<li><a title="" data-toggle="tooltip" data-placement="top" href="#" class="pinterest" data-original-title="Pinterest"></a></li>									
		<li><a title="" data-toggle="tooltip" data-placement="top" href="#" class="yahoo" data-original-title="Yahoo"></a></li>									
		<li><a title="" data-toggle="tooltip" data-placement="top" href="#" class="linkedin" data-original-title="LinkedIn"></a></li>								</ul>';
	}

	public function catType($cat_id)
	{
		 $result = $this->WIdb->select(
                    "SELECT `title` FROM `wi_categories`
                     WHERE `cat_id` = :cat_id",
                     array(
                       "cat_id" => $cat_id
                     )
                  );
		//var_dump($result) ;
		  if ( count ( $result ) > 0 )
            return $result[0]['title'];
        else
            return null;
	}


	public function OSDPResource($rid, $column)
	{
		$sql = "SELECT * FROM wi_resources WHERE resource_id =:rid";
		$query = $this->WIdb->prepare($sql);
		$query->bindParam(':rid', $rid, PDO::PARAM_INT);
		$query->execute();
		$res = $query->fetch();
		echo $res[$column];
	}

	public function hasPosts()
	{
		
		$sql = "SELECT * FROM `wi_blog` ORDER BY day DESC";
		$query = $this->WIdb->prepare($sql);
		$query->execute();

		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		//print_r($res);
		if(count($res) < 1){
			echo "No Posts Yet.";
		}else{

		foreach ($res as $media) {
			//print_r($media);
			$MediaType = $media['type'];
			foreach ($MediaType as $type) {
				//print_r($type);
			}
		if($media['type'] === "NoMedia"){
				
				echo '<div class="blog_style_2"><article class="post_container">                             
         <div class="post-info">                                    
         <div class="post-date">                                        
         <span class="day">' . $media['day'] . '</span>                                        
         <span class="month">' . $media['month'] . '</span>                                    
         </div>                                    
         <div class="post-category">                                      
         <i class="fa fa-file-text-o"></i>                                    
         </div>                               
          </div><!-- .post-info end -->                                
          <div class="post-content">                                   
           <a href="blog_post.html">                                       
            <h4>' . $media['title'] . '</h4>                                    
            </a>                                    
            <div class="blog-meta">                                        
            <ul>                                            
            <li class="fa fa-user">                                               
             <a href="#">' . $media['user'] . '</a>                                            
             </li>                                            
             <li class="post-tags fa fa-tags">                                                
             <a href="#">news, </a>                                               
              <a href="#">dois</a>                                            
              </li>                                        
              </ul>                                   
               </div>                                    
               <p>                                      
               ' . $media['post'] . '                                  
               </p>                                    
                                           
               </div>                        
                              
                    </article></div>
                              
                         <!-- .blog-post end -->';
		}
	    if($media['type'] === "blog_slider"){
			echo '<!-- .latest-posts start -->                            
<article class="post_container">                              
<div class="post-info">                                   
 <div class="post-date">                                        
 <span class="day">' . $media['day'] . '</span>                                        
 <span class="month">' . $media['month'] . '</span>                                   
  </div>                                    
  <div class="post-category">                                     
  <i class="fa fa-picture-o"></i>                                    
  </div>                                
  </div><!-- .post-info end -->                               
   <figure class="post-image">                                  
   <div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext"></div>
   <img src="../../../WIAdmin/WIMedia/Img/blog/revslider/' . $media['image'] . '" style="width:100%">
  <div class="text">' . $media['caption'] . '</div>
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
<img src="../../../WIAdmin/WIMedia/Img/blog/revslider/' . $media['image2'] . '" style="width:100%">        
  <div class="text">' . $media['caption1'] . '</div>
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
<img src="../../../WIAdmin/WIMedia/Img/blog/revslider/' . $media['image3'] . '" style="width:100%">
  <div class="text">' . $media['caption2'] . '</div>
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span>
</div>                                             
   </figure>                               
    <div class="post-content">                                    
    <a href="blog_post.html">                                        
    <h4>' . $media['title'] . '</h4>                                    
    </a>                                    
    <div class="blog-meta">                                        
    <ul>                                            
    <li class="fa fa-user">                                                
    <a href="#">' . $media['user'] . '</a>                                            
    </li>                                           
     <li class="post-tags fa fa-tags">                                               
      <a href="#">news, </a>                                                
      <a href="#">dois</a>                                            
      </li>                                        
</ul>                                    
</div>                                    
<p>                                        
' . $media['post'] . '                                  
</p>                                    
</div>                        
</article><!-- .blog-post end -->
<script type="text/javascript">
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>';
		}

		if($media['type'] === "blog_video"){
			echo '<article class="post_container">                              
<div class="post-info">                                   
 <div class="post-date">                                        
 <span class="day">' . $media['day'] . '</span>                                        
 <span class="month">' . $media['month'] . '</span>                                    
 </div>                                   
  <div class="post-category">                                     
  <i class="fa fa-picture-o"></i>                                    
  </div>                                
  </div><!-- .post-info end -->                                
  <figure class="post-video">                                    
  <video width="400" height="160" controls>
  <source src="../../../WIAdmin/WIMedia/Vid/blog/' . $media['video'] . '" type="video/mp4">
</video>                                
  </figure>                               
   <div class="post-content">                                    
   <h4>' . $media['title'] . '</h4>                                    
   <div class="blog-meta">                                        
   <ul>                                            
   <li class="fa fa-user">                                                
   <a href="#">' . $media['user'] . '</a>                                            
   </li>                                            
   <li class="post-tags fa fa-tags">                                                
   <a href="#">news, </a>                                                
   <a href="#">dois</a>                                            
   </li>                                        
   </ul>                                    
   </div>                                   
    <p>                                     
    ' . $media['post'] . '                                 
    </p>                                    
    </div>                        
    </article><!-- .blog-post end --> ';
			
		}
		//$type = "blog_image";
		if($media['type'] === "blog_image"){
			
				echo '<!-- .latest-posts start --><div class="blog_style_2">                            
                              <article class="post_container">                              
                              <div class="post-info">                                    
                              <div class="post-date">                                        
                              <span class="day">' . $media['day'] . '</span>                                        
                              <span class="month">' . $media['month'] . '</span>                                    
                              </div>                                    
                              <div class="post-category">                                     
                              <i class="fa fa-picture-o"></i>                                    
                              </div>                                
                              </div><!-- .post-info end -->                                
                              <figure class="post-image">                 
                              <a href="#"><img src="../../../WIAdmin/WIMedia/Img/blog/' . $media['image'] . '" alt=""></a>                
                              </figure>                               
                               <div class="post-content">                                    
                               <a href="blog_post.html">                                        
                               <h4>' . $media['title'] . '</h4>                                    
                               </a>                                    
                               <div class="blog-meta">                                        
                               <ul>                                            
                               <li class="fa fa-user">                                                
                               <a href="#">' . $media['user'] . '</a>                                           
                                </li>                                           
                                 <li class="post-tags fa fa-tags">                                               
                                  <a href="#">news, </a>                                                
                                  <a href="#">dois</a>                                           
                                   </li>                                        
                                   </ul>                                    
                                   </div>                                    
                                   <p>                                      
                                   ' . $media['post'] . '                               
                                   </p>                                    
                                                               
                                   </div>                         
                                   </article><!-- .blog-post end --> </div>';
		}

		if($media['type'] === "blog_audio"){
			
			echo ' <!-- .latest-posts start -->                            
    <article class="post_container">                              
    <div class="post-info">                                    
    <div class="post-date">                                        
    <span class="day">' . $media['day'] . '</span>                                        
    <span class="month">' . $media['month'] . '</span>                                   
     </div>                                    
     <div class="post-category">                                      
     <i class="fa fa-picture-o"></i>                                   
      </div>                                
      </div><!-- .post-info end -->                                
      <figure class="post-audio">                 
      <audio controls>
      <source src="../../../WIAdmin/WIMedia/Audio/blog/' . $media['audio'] . '" type="audio/mp3"></audio>             
      </figure>                               
       <div class="post-content">                                    
       <a href="blog_post.html">                                        
       <h4>' . $media['title'] . '</h4>                                    
       </a>                                    
       <div class="blog-meta">                                        
       <ul>                                            
       <li class="fa fa-user">                                                
       <a href="#">' . $media['user'] . '</a>                                            
       </li>                                            
       <li class="post-tags fa fa-tags">                                               
        <a href="#">news, </a>                                                
        <a href="#">dois</a>                                            
        </li>                                        
        </ul>                                    
        </div>                                   
         <p>                                      
         ' . $media['post'] . '</p>                                    
         <a href="blog_post.html" class="read-more">Read more</a>                             
         </div>                         
         </article><!-- .blog-post end -->  ';
		}

		if($media['type'] === "blog_youtube"){
			
			echo '<!-- .latest-posts start --><div class="blog_style_2">                           
    <article class="post_container">                              
    <div class="post-info">                                    
    <div class="post-date">                                        
    <span class="day">' . $media['day']. '</span>                                        
    <span class="month">' . $media['month'] .'</span>                                    
    </div>                                    
    <div class="post-category">                                     
    <i class="fa fa-picture-o"></i>                                    
    </div>                                
    </div><!-- .post-info end -->                                
    <figure class="post-video">                                    
   "' . $media['youtube'] .'"       
     </figure>                                
     <div class="post-content">                                    
     <a href="blog_post.html">                                        
     <h4>Blog post with Youtube</h4>                                    
     </a>                                    
     <div class="blog-meta">                                        
     <ul>                                           
      <li class="fa fa-user">                                                
      <a href="#">' . $media['user'] . '</a>                                            
      </li>                                            
      <li class="post-tags fa fa-tags">                                                
      <a href="#">news, </a>                                                
     <a href="#">dois</a>                                            
      </li>                                        
    </ul>                                    
    </div>                                    
    <p>                                     
    ' . $media['post'] . '                                 
    </p>                                    
    </div>                        
    </article></div>
      <!-- .blog-post end -->';
			  }

			}
		}
	}





	/*public function hasPosts1()
	{
		
		$sql = "SELECT * FROM `wi_blog`";
		$query = $this->WIdb->prepare($sql);
		$query->execute();

		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		//print_r($res);
		if(count($res) < 1){
			echo "No Posts Yet.";
		}else{
		//print_r($res);
		//$type = $res['type'];
		//$date = $res['day'];
		//echo $type;
	     //$type = "NoMedia";
		foreach ($res as $media) {
			//print_r($media);
		if($media['type'] === "NoMedia"){
				$sql = "SELECT * FROM `wi_blog` WHERE type =:type ORDER BY day DESC";
		$query = $this->WIdb->prepare($sql);
		$query->bindParam(':type', $media['type'], PDO::PARAM_STR);
		$query->execute();

		while($posts = $query->fetchAll(PDO::FETCH_ASSOC) ){
			foreach ($posts as $post) {
				echo '<div class="blog_style_2"><article class="post_container">                             
         <div class="post-info">                                    
         <div class="post-date">                                        
         <span class="day">' . $post['day'] . '</span>                                        
         <span class="month">' . $post['month'] . '</span>                                    
         </div>                                    
         <div class="post-category">                                      
         <i class="fa fa-file-text-o"></i>                                    
         </div>                               
          </div><!-- .post-info end -->                                
          <div class="post-content">                                   
           <a href="blog_post.html">                                       
            <h4>' . $post['title'] . '</h4>                                    
            </a>                                    
            <div class="blog-meta">                                        
            <ul>                                            
            <li class="fa fa-user">                                               
             <a href="#">' . $post['user'] . '</a>                                            
             </li>                                            
             <li class="post-tags fa fa-tags">                                                
             <a href="#">news, </a>                                               
              <a href="#">dois</a>                                            
              </li>                                        
              </ul>                                   
               </div>                                    
               <p>                                      
               ' . $post['post'] . '                                  
               </p>                                    
               <a href="' . $post['href'] . '">' . $post['button_name'] . '</a>                             
               </div>                        
                              
                    </article></div>
                              
                         <!-- .blog-post end -->';
			}
			
			}


		}



	    if($media['type'] === "mediaSlider"){
			
		}

		if($media['type'] === "mediaVideo"){
			
		}
		//$type = "blog_image";
		if($media['type'] === "blog_image"){
			
			$sql = "SELECT * FROM `wi_blog` WHERE type =:type ORDER BY day DESC";
		$query = $this->WIdb->prepare($sql);
		$query->bindParam(':type', $media['type'], PDO::PARAM_STR);
		$query->execute();

		while($posts = $query->fetchAll(PDO::FETCH_ASSOC) ){
			foreach ($posts as $post) {
				echo '<!-- .latest-posts start --><div class="blog_style_2">                            
                              <article class="post_container">                              
                              <div class="post-info">                                    
                              <div class="post-date">                                        
                              <span class="day">' . $post['day'] . '</span>                                        
                              <span class="month">' . $post['month'] . '</span>                                    
                              </div>                                    
                              <div class="post-category">                                     
                              <i class="fa fa-picture-o"></i>                                    
                              </div>                                
                              </div><!-- .post-info end -->                                
                              <figure class="post-image">                 
                              <a href="#"><img src="WIMedia/Img/blog/' . $post['image'] . '" alt=""></a>                
                              </figure>                               
                               <div class="post-content">                                    
                               <a href="blog_post.html">                                        
                               <h4>' . $post['title'] . '</h4>                                    
                               </a>                                    
                               <div class="blog-meta">                                        
                               <ul>                                            
                               <li class="fa fa-user">                                                
                               <a href="#">' . $post['user'] . '</a>                                           
                                </li>                                           
                                 <li class="post-tags fa fa-tags">                                               
                                  <a href="#">news, </a>                                                
                                  <a href="#">dois</a>                                           
                                   </li>                                        
                                   </ul>                                    
                                   </div>                                    
                                   <p>                                      
                                   ' . $post['post'] . '                               
                                   </p>                                    
                                   <a href="' . $post['href'] . '" class="read-more">' . $post['button_name'] . '</a>                             
                                   </div>                         
                                   </article><!-- .blog-post end --> </div>';
				}
			}
		}

		if($media['type'] === "mediaaudio"){
			
		}

		if($media['type'] === "blog_youtube"){
			$sql = "SELECT * FROM `wi_blog` WHERE type =:type ORDER BY day DESC";
		$query = $this->WIdb->prepare($sql);
		$query->bindParam(':type', $media['type'], PDO::PARAM_STR);
		$query->execute();
		while($posts = $query->fetchAll(PDO::FETCH_ASSOC) ){
			foreach ($posts as $post) {
			echo '<!-- .latest-posts start -->                            
    <article class="post_container">                              
    <div class="post-info">                                    
    <div class="post-date">                                        
    <span class="day">' . $post['day']. '</span>                                        
    <span class="month">' . $post['month'] .'</span>                                    
    </div>                                    
    <div class="post-category">                                     
    <i class="fa fa-picture-o"></i>                                    
    </div>                                
    </div><!-- .post-info end -->                                
    <figure class="post-video">                                    
   <iframe src="' . $post['youtube'] .'" allowfullscreen></iframe>         
     </figure>                                
     <div class="post-content">                                    
     <a href="blog_post.html">                                        
     <h4>Blog post with Youtube</h4>                                    
     </a>                                    
     <div class="blog-meta">                                        
     <ul>                                           
      <li class="fa fa-user">                                                
      <a href="#">' . $post['user'] . '</a>                                            
      </li>                                            
      <li class="post-tags fa fa-tags">                                                
      <a href="#">news, </a>                                                
     <a href="#">dois</a>                                            
      </li>                                        
    </ul>                                    
    </div>                                    
    <p>                                     
    ' . $post['post'] . '                                 
    </p>                                    
    <a href="blog_post.html" class="read-more">Read more</a>                              
    </div>                        
    </article>
      <!-- .blog-post end -->';
			  }
			}
		}

			}
		}
	}*/
		

}


?>