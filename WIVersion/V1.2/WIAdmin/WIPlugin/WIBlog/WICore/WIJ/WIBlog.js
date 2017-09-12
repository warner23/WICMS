$(document).ready(function(){
	WIBlog.cat();
  WIBlog.havePosts();
	//WIBlog.resources();

$("#sb-icon-search").click(function(){
		var keyword = $("#search").val();

		if(keyword != " " ){
			$.ajax({
			url      : "WICore/WIClass/WIAjax.php",
			method   : "POST",
			data     : {
				action : "keyword",
				search : 1,
				keyword : keyword
			},
			success  : function(data){
				$("#get_resources").html(data);
			}
		})
		}
	});		
});

var WIBlog = {};


WIBlog.cat = function(){
		$.ajax({
			url      : "WICore/WIClass/WIAjax.php",
			method   : "POST",
			data     : {
				action :"getCat",
				category : 1
			},
			success  : function(data){
				$("#sidebar").html(data);
			}
		})
	}


WIBlog.resources = function(){
		$.ajax({
			url      : "WICore/WIClass/WIAjax.php",
			method   : "POST",
			data     : {
				action : "getResource",
				get_product : 1
			},
			success  : function(data){

				$("#get_resources").html(data);
			}
		})
}

WIBlog.type = function(){

	if ($(".admin_post").hasClass('block')) {
		$(".admin_post").removeClass('block')
						.addClass('hidden');
	}else{
		$(".admin_post").removeClass('hidden')
						.addClass('block');
	}



}

WIBlog.PostSlider = function(){
	var day = $(".day").text();
	var month = $(".month").text();
	var post_title = $("#post_title").val();
	var blog_post = $("#blog_post").val();

	alert(day, month, post_title, blog_post);

}

WIBlog.PostNoMedia = function(){
	var day = $(".day").html();
	var month = $(".month").html();
  var user = $("#user").html();
	var post_title = $("#post_title").val();
  var href = $("#href").val();
  var button_name = $("#button_name").val();
  var textArea = $('textarea#blog_post');
	var blog_post = textArea.val();
	var type     = $("#noMedia").val();

$.ajax({
      url      : "WICore/WIClass/WIAjax.php",
      method   : "POST",
      data     : {
        action : "nomodepost",
        search : 1,
        day : day,
        month  : month,
        post_title : post_title,
        blog_post : blog_post,
        type    : type,
        user    : user,
        href   : href,
        button_name  : button_name
      },
      success  : function(data){
        $("#noMediaPost").remove();
        WIBlog.havePosts();
        //$("#get_resources").html(data);
      }
    })

}

WIBlog.PostImage = function(){

    var day = $(".day").html();
  var month = $(".month").html();
  var user = $("#user").html();
  var post_title = $("#post_title").val();
  var href = $("#href").val();
  var button_name = $("#button_name").val();
  var textArea = $('textarea#blog_post');
  var blog_post = textArea.val();
  var type     = $("#blog_image").val();
  var Image = $("#post_imageg").val();
  var UploadImg  = $(".upload-msg").html();

$.ajax({
      url      : "WICore/WIClass/WIAjax.php",
      method   : "POST",
      data     : {
        action : "postimage",
        search : 1,
        day : day,
        month  : month,
        post_title : post_title,
        blog_post : blog_post,
        type    : type,
        user    : user,
        href   : href,
        button_name  : button_name,
        image : UploadImg
      },
      success  : function(data){
        $("#blogPostImage").remove();
        WIBlog.havePosts();
        //$("#get_resources").html(data);
      }
    })
}

WIBlog.PostVideo = function(){

    var day = $(".day").html();
  var month = $(".month").html();
  var user = $("#user").html();
  var post_title = $("#post_title").val();
  var href = $("#href").val();
  var button_name = $("#button_name").val();
  var textArea = $('textarea#blog_post');
  var blog_post = textArea.val();
  var type     = $("#blog_Video").val();
  var video = $("#post_video").val();
  var UploadVid  = $(".upload-msg").html();

$.ajax({
      url      : "WICore/WIClass/WIAjax.php",
      method   : "POST",
      data     : {
        action : "PostVideo",
        search : 1,
        day : day,
        month  : month,
        post_title : post_title,
        blog_post : blog_post,
        type    : type,
        user    : user,
        href   : href,
        button_name  : button_name,
        vid : UploadVid
      },
      success  : function(data){
        $("#blogPostVideo").remove();
        WIBlog.havePosts();
        //$("#get_resources").html(data);
      }
    })
}

WIBlog.slider = function(){

	var nowDate		= new Date();
var nowDay		= ((nowDate.getDate().toString().length) == 1) ? '0'+(nowDate.getDate()) : (nowDate.getDate());
var nowMonth	= ((nowDate.getMonth().toString().length) == 1) ? '0'+(nowDate.getMonth()+1) : (nowDate.getMonth()+1);
var nowYear		= nowDate.getFullYear();
var formatDate	= nowDay + "." + nowMonth + "." + nowYear;

	var slider = ('<!-- .latest-posts start -->'+                         
'<article class="post_container">'+                             
'<div class="post-info">'+                                   
 '<div class="post-date">'+                                        
 '<span class="day">'+nowDay +'</span>'+                                        
 '<span class="month">'+nowMonth +'</span>'+                                  
  '</div> '+                                   
  '<div class="post-category">'+                                     
  '<i class="fa fa-picture-o"></i>'+                                    
  '</div>'+                                
  '</div><!-- .post-info end -->'+                               
   '<figure class="post-image"> '+                                 
   '<ul class="img_blog">'+                                    
   '<li><img alt="blog post image" src="WIMedia/Img/blog/blog_4.jpg"></li>'+                                   
   '<li><img alt="blog post image" src="WIMedia/Img/blog/blog_5.jpg"></li>'+                                   
   '<li><img alt="blog post image" src="WIMedia/Img/blog/blog_6.jpg"></li>'+                                 
   '</ul>'+                                
   '</figure>'+                              
    '<div class="post-content">'+                                    
    '<a href="blog_post.html">'+                                        
    '<h4><input type="text" id="post_title" placeholder="Blog post with Slider" value=""></h4>'+                                    
    '</a>'+                                    
    '<div class="blog-meta">'+                                        
    '<ul>'+                                            
    '<li class="fa fa-user">'+                                                
    '<a href="#">Admin</a>'+                                            
    '</li> '+                                          
     '<li class="post-tags fa fa-tags">'+                                               
      '<a href="#">news, </a>'+                                                
      '<a href="#">dois</a>'+                                            
      '</li> '+                                       
'</ul>'+                                    
'</div>'+                                    
'<p>'+   
'<textarea id="blog_post" placeholder="Add your blog post here"></textarea>'+                                                                      
'</p>'+                                    
'<a href="blog_post.html" class="read-more"><input type="text" id="href_link" placeholder="Read more" value=""></a> '+                             
'</div> '+                       
'</article><!-- .blog-post end --> '+
'<div class="submit"><a href="#" onclick="WIBlog.PostSlider()">Post</div>');
	$("#blog_style").append(slider);
}

WIBlog.video = function(){

	var nowDate		= new Date();
var nowDay		= ((nowDate.getDate().toString().length) == 1) ? '0'+(nowDate.getDate()) : (nowDate.getDate());
var nowMonth	= ((nowDate.getMonth().toString().length) == 1) ? '0'+(nowDate.getMonth()+1) : (nowDate.getMonth()+1);
var nowYear		= nowDate.getFullYear();
var formatDate	= nowDay + "." + nowMonth + "." + nowYear;

	var video = ('<article class="post_container" id="blogPostVideo">'+                             
'<div class="post-info">'+                                   
' <div class="post-date">'+                                        
 '<span class="day">'+nowDay+'</span>'+                                        
 '<span class="month">'+nowMonth+'</span> '+                                   
 '</div> '+                                  
  '<div class="post-category">'+                                     
  '<i class="fa fa-picture-o"></i>'+                                    
  '</div>'+                                
  '</div><!-- .post-info end -->'+                                
  '<figure class="post-video">'+                                    
  '<form class="wividupload" id="wividupload" action="" method="post" enctype="multipart/form-data">'+
            '<label>Upload Video:</label>'+
           ' <input type="file" name="post_video" id="post_video" class="post_video" required/>'+     
        '</form>'+
        '<div class="video-preview"></div>'+
        '<div class="upload-msg"></div>'+  
  '</figure>'+                               
   '<div class="post-content">'+                                    
   '<h4><input type="text" id="post_title" placeholder="Blog post with video"></h4>'+ 
    '<input type="hidden" name="blog_video" id="blog_video" value="blog_video">'+                                   
   '<div class="blog-meta">'+                                        
   '<ul>'+                                            
   '<li class="fa fa-user">'+                                                
   '<a href="#" id="user">Admin</a> '+                                           
   '</li> '+                                           
   '<li class="post-tags fa fa-tags">'+                                                
   '<a href="#">news, </a>'+                                                
   '<a href="#">dois</a> '+                                           
   '</li> '+                                       
   '</ul>'+                                    
   '</div>'+                                   
   '<textarea id="blog_post" placeholder="blog post with video" rows="4"></textarea>'+                                                                    
               '<div class="read-more"><input type="text" id="href" name="href" value="href" placeholder="Read more"></div> '+                            
               '<input type="text" name="button_name" value="button_name" id="button_name" placeholder="Read more"></div>'+ 
               '<div class="submit"><a href="#" onclick="WIBlog.PostVideo()">Post</div>'+                       
    '</article><!-- .blog-post end -->');
	$("#blog_style").append(video);

}


WIBlog.image = function(){

	var nowDate		= new Date();
var nowDay		= ((nowDate.getDate().toString().length) == 1) ? '0'+(nowDate.getDate()) : (nowDate.getDate());
var nowMonth	= ((nowDate.getMonth().toString().length) == 1) ? '0'+(nowDate.getMonth()+1) : (nowDate.getMonth()+1);
var nowYear		= nowDate.getFullYear();
var formatDate	= nowDay + "." + nowMonth + "." + nowYear;


	var image = ('<!-- .latest-posts start -->'+                            
                              '<article class="post_container" id="blogPostImage"> '+                             
                              '<div class="post-info">'+                                    
                              '<div class="post-date">'+                                        
                              '<span class="day">'+nowDay+'</span>'+                                        
                              '<span class="month">'+nowMonth+'</span> '+                                   
                              '</div>'+                                    
                              '<div class="post-category">'+                                     
                              '<i class="fa fa-picture-o"></i> '+                                   
                              '</div>'+                                
                              '</div><!-- .post-info end --> '+                               
                              '<figure class="post-image">'+                 
                              '<form class="wiupload" id="wiupload" action="" method="post" enctype="multipart/form-data">'+
            '<label>Upload Image:</label>'+
           ' <input type="file" name="post_image" id="post_image" class="post_image" required />'+     
        '</form>'+
        '<div class="img-preview"></div>'+
        '<div class="upload-msg"></div></figure>'+                              
                               '<div class="post-content">'+                                    
                               '<h4><input type="text" id="post_title" placeholder="Blog post without media content"></h4>'+ 
                                '<input type="hidden" name="blog_image" id="blog_image" value="blog_image">'+                               
                               '<div class="blog-meta">'+                                        
                               '<ul> '+                                           
                               '<li class="fa fa-user">'+                                                
                               '<a href="#" id="user">Admin</a>'+                                           
                                '</li>'+                                           
                                 '<li class="post-tags fa fa-tags">'+                                               
                                  '<a href="#">news, </a>'+                                                
                                  '<a href="#">dois</a>'+                                           
                                   '</li>'+                                        
                                   '</ul>'+                                    
                                   '</div>'+                                    
                                   '<textarea id="blog_post" placeholder="blog post with image" rows="4"></textarea>'+                                                                    
               '<div class="read-more"><input type="text" id="href" name="href" value="href" placeholder="Read more"></div> '+                            
               '<input type="text" name="button_name" value="button_name" id="button_name" placeholder="Read more"></div>'+  
               '<div class="submit btn btn-primary"><a href="#" onclick="WIBlog.PostImage()">Post</div>'+                        
                                   '</article><!-- .blog-post end -->');
	$("#blog_style").append(image);
}

WIBlog.audio = function(){

	var nowDate		= new Date();
var nowDay		= ((nowDate.getDate().toString().length) == 1) ? '0'+(nowDate.getDate()) : (nowDate.getDate());
var nowMonth	= ((nowDate.getMonth().toString().length) == 1) ? '0'+(nowDate.getMonth()+1) : (nowDate.getMonth()+1);
var nowYear		= nowDate.getFullYear();
var formatDate	= nowDay + "." + nowMonth + "." + nowYear;

	var audio = (' <!-- .latest-posts start -->'+                           
    '<article class="post_container">'+                              
    '<div class="post-info">'+                                    
    '<div class="post-date">'+                                        
    '<span class="day">'+nowDay+'</span> '+                                       
    '<span class="month">'+nowMonth+'</span>'+                                   
     '</div>'+                                    
     '<div class="post-category">'+                                      
     '<i class="fa fa-picture-o"></i>'+                                   
      '</div>'+                                
      '</div><!-- .post-info end --> '+                               
      '<figure class="post-audio">'+                 
      '<iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/129129144&amp;show_artwork=false"></iframe>'+               
      '</figure>'+                               
       '<div class="post-content">'+                                    
       '<a href="blog_post.html"> '+                                       
       '<h4>Blog post with Audio</h4>'+                                    
       '</a>'+                                    
       '<div class="blog-meta">'+                                        
       '<ul>'+                                            
       '<li class="fa fa-user">'+                                                
       '<a href="#">Admin</a>'+                                            
       '</li>'+                                            
       '<li class="post-tags fa fa-tags">'+                                               
        '<a href="#">news, </a>'+                                                
        '<a href="#">dois</a>'+                                            
        '</li>'+                                        
        '</ul>'+                                    
        '</div>'+                                   
         '<p>'+                                      
         'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Maecenas dolor est, interdum a euismod eu accumsan posuere nisl. Nam sed iaculis massa. Sed nisl lectus, tempor sed euismod quis, sollicitudin nec est. </p> '+                                   
         '<a href="blog_post.html" class="read-more">Read more</a>'+                             
         '</div>'+                         
         '</article><!-- .blog-post end -->'+
         '<div class="submit"><a href="#" onclick="WIBlog.PostAudio()">Post</div>');
	$("#blog_style").append(audio);
}

WIBlog.youtube = function(){

	var nowDate		= new Date();
var nowDay		= ((nowDate.getDate().toString().length) == 1) ? '0'+(nowDate.getDate()) : (nowDate.getDate());
var nowMonth	= ((nowDate.getMonth().toString().length) == 1) ? '0'+(nowDate.getMonth()+1) : (nowDate.getMonth()+1);
var nowYear		= nowDate.getFullYear();
var formatDate	= nowDay + "." + nowMonth + "." + nowYear;

	var youtube = ('<!-- .latest-posts start -->'+                            
    '<article class="post_container">'+                              
    '<div class="post-info">'+                                    
    '<div class="post-date">'+                                        
    '<span class="day">'+nowDay+'</span> '+                                       
    '<span class="month">'+nowMonth+'</span>'+                                    
    '</div>'+                                    
    '<div class="post-category"> '+                                    
    '<i class="fa fa-picture-o"></i>'+                                    
    '</div> '+                               
    '</div><!-- .post-info end -->'+                                
    '<figure class="post-video">'+                                    
    '<iframe src="http://www.youtube.com/embed/UX7GycmeQVo" allowfullscreen></iframe>'+         
     '</figure>'+                                
     '<div class="post-content">'+                                    
     '<a href="blog_post.html">'+                                        
     '<h4>Blog post with Youtube</h4>'+                                    
     '</a>'+                                    
     '<div class="blog-meta">'+                                        
     '<ul> '+                                          
      '<li class="fa fa-user">'+                                                
      '<a href="#">Admin</a> '+                                           
      '</li>'+                                            
      '<li class="post-tags fa fa-tags">'+                                                
      '<a href="#">news, </a>'+                                                
      '<a href="#">dois</a> '+                                           
      '</li>'+                                        
    '</ul>'+                                    
    '</div>'+                                    
    '<p> '+                                    
    'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Maecenas dolor est, interdum a euismod eu accumsan posuere nisl. Nam sed iaculis massa. Sed nisl lectus, tempor sed euismod quis, sollicitudin nec est. '+                                 
    '</p>'+                                    
    '<a href="blog_post.html" class="read-more">Read more</a>'+                              
    '</div> '+                       
    '</article>'+
       ' <!-- .blog-post end -->'+
       '<div class="submit"><a href="#" onclick="WIBlog.PostYoutube()">Post</div>');
	$("#blog_style").append(youtube);
}

WIBlog.noMedia = function(){

	var nowDate		= new Date();
var nowDay		= ((nowDate.getDate().toString().length) == 1) ? '0'+(nowDate.getDate()) : (nowDate.getDate());
var nowMonth	= ((nowDate.getMonth().toString().length) == 1) ? '0'+(nowDate.getMonth()+1) : (nowDate.getMonth()+1);
var nowYear		= nowDate.getFullYear();
var formatDate	= nowDay + "." + nowMonth + "." + nowYear;

	var noMedia = ('<article class="post_container" id="noMediaPost">'+                             
         '<div class="post-info">'+                                    
         '<div class="post-date">'+                                        
         '<span class="day">'+nowDay+'</span>'+                                        
         '<span class="month">'+nowMonth+'</span>'+                                    
         '</div>'+                                    
         '<div class="post-category">'+                                      
         '<i class="fa fa-file-text-o"></i>'+                                    
         '</div>'+                               
          '</div><!-- .post-info end -->'+                                
          '<div class="post-content">'+                                                                         
            '<h4><input type="text" id="post_title" placeholder="Blog post without media content"></h4>'+ 
            '<input type="hidden" name="noMedia" id="noMedia" value="NoMedia">'+                                                                       
            '<div class="blog-meta">'+                                        
            '<ul>'+                                            
            '<li class="fa fa-user">'+                                               
             '<a href="#" id="user">Admin</a>'+                                            
             '</li>'+                                            
             '<li class="post-tags fa fa-tags">'+                                                
             '<a href="#">news, </a>'+                                               
              '<a href="#">dois</a>'+                                            
              '</li>'+                                        
              '</ul>'+                                   
               '</div>'+
               '<textarea id="blog_post" placeholder="No Media blog post" rows="4"></textarea>'+                                                                    
               '<div class="read-more"><input type="text" id="href" name="href" value="href" placeholder="Read more"></div> '+                            
               '<input type="text" name="button_name" value="button_name" id="button_name" placeholder="Read more"></div>'+  
               '<div class="submit btn btn-primary"><a href="#" onclick="WIBlog.PostNoMedia()">Post</div>'+                   
               '</article>');
         $("#blog_style").append(noMedia);
}

WIBlog.havePosts = function(){

  $.ajax({
      url      : "WICore/WIClass/WIAjax.php",
      method   : "POST",
      data     : {
        action : "haveposts",
        posts : 1
      },
      success  : function(data){

        $("#posts").html(data);
      }
    })
}








