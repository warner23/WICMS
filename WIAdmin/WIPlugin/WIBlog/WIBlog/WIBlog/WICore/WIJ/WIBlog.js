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
				$("#posts").html(data);
			}
		})
		}
	});	

$("body").delegate("#cat", "change", function(event){
 //alert($(this).val()); 
 var CatId = $(this).val();
 $("#cat").attr('cat_id', CatId);
});


  $("body").delegate(".category", "click", function(event){
    event.preventDefault();
    var cid = $(this).attr('cid');
    //alert(cid);
    $.ajax({
      url      : "WICore/WIClass/WIAjax.php",
      method   : "POST",
      data     : {
        action : "selected_cat",
        get_selected_cat : 1,
        cat_id : cid
      },
      success  : function(data){
        $("#posts").html(data);
      }
    })
  })

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


WIBlog.select_cat = function(){
    $.ajax({
      url      : "WICore/WIClass/WIAjax.php",
      method   : "POST",
      data     : {
        action :"selectCat",
        category : 1
      },
      success  : function(data){
        $("#select_cat").html(data);
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
	    var day = $(".day").html();
  var month = $(".month").html();
  var user = $("#slideruser").html();
  var cat_id =  $("#cat").attr('cat_id');
  var post_title = $("#post_title").val();
  var textArea = $('textarea#blog_post');
  var blog_post = textArea.val();
  var type     = $("#blog_slider").val();
  var Image0 = $("#media0").attr('value');
  var Image1 = $("#media1").attr('value');
  var Image2 = $("#media2").attr('value');
  var caption     = $("#caption0").val();
  var caption1     = $("#caption1").val();
  var caption2     = $("#caption2").val();
$.ajax({
      url      : "WICore/WIClass/WIAjax.php",
      method   : "POST",
      data     : {
        action : "postslider",
        day : day,
        month  : month,
        post_title : post_title,
        blog_post : blog_post,
        type    : type,
        cat_id  : cat_id,
        user    : user,
        Image0 : Image0,
        Image1 : Image1,
        Image2 : Image2,
        caption : caption,
        caption1 : caption1,
        caption2 : caption2,

      },
      success  : function(data){
        $("#blogPostSlider").remove();
        WIBlog.havePosts();
        //$("#get_resources").html(data);
      }
    })

}

WIBlog.PostNoMedia = function(){
  var cat_id =  $("#cat").attr('cat_id');
	var day = $(".day").html();
	var month = $(".month").html();
  var user = $("#user").html();
	var post_title = $("#post_title").val();
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
        cat_id : cat_id
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
  var user = $("#imguser").html();
  var cat_id =  $("#cat").attr('cat_id');
  var post_title = $("#post_title").val();
  var textArea = $('textarea#blog_post');
  var blog_post = textArea.val();
  var type     = $("#blog_image").val();
  var Image = $("#media").attr('value');
$.ajax({
      url      : "WICore/WIClass/WIAjax.php",
      method   : "POST",
      data     : {
        action : "postimage",
        day : day,
        month  : month,
        post_title : post_title,
        blog_post : blog_post,
        type    : type,
        cat_id  : cat_id,
        user    : user,
        Image : Image
      },
      success  : function(data){
        $("#blogPostImage").remove();
        WIBlog.havePosts();
        //$("#get_resources").html(data);
      }
    })
}

WIBlog.PostAudio = function(){

    var day = $(".day").html();
  var month = $(".month").html();
  var user = $("#audiouser").html();
  var cat_id =  $("#cat").attr('cat_id');
  var post_title = $("#post_title").val();
  var textArea = $('textarea#blog_post');
  var blog_post = textArea.val();
  var type     = $("#audio").val();
  var audio = $("#media").attr('value');
$.ajax({
      url      : "WICore/WIClass/WIAjax.php",
      method   : "POST",
      data     : {
        action : "postaudio",
        day : day,
        month  : month,
        post_title : post_title,
        blog_post : blog_post,
        type    : type,
        cat_id  : cat_id,
        user    : user,
        audio : audio
      },
      success  : function(data){
        $("#blogPostAudio").remove();
        WIBlog.havePosts();
        //$("#get_resources").html(data);
      }
    })
}

WIBlog.PostVideo = function(){
var cat_id =  $("#cat").attr('cat_id');
    var day = $(".day").html();
  var month = $(".month").html();
  var user = $("#viduser").html();
  var post_title = $("#post_title").val();
  var textArea = $('textarea#blog_post');
  var blog_post = textArea.val();
  var type     = $("#blog_video").val();
  var video = $("#media").attr('value');

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
        cat_id    : cat_id,
        video : video
      },
      success  : function(data){
        $("#blogPostVideo").remove();
        WIBlog.havePosts();
        //$("#get_resources").html(data);
      }
    })
}

WIBlog.PostYouTube = function(){
  var cat_id =  $("#cat").attr('cat_id');
  var day = $(".day").html();
  var month = $(".month").html();
  var user = $("#ytuser").html();
  var ytlink = $("#youtube_link").val();
  var post_title = $("#post_title").val();
  var textArea = $('textarea#blog_post');
  var blog_post = textArea.val();
  var type     = $("#youtube").val();
$.ajax({
      url      : "WICore/WIClass/WIAjax.php",
      method   : "POST",
      data     : {
        action : "youtube",
        search : 1,
        day : day,
        month  : month,
        post_title : post_title,
        ytlink   : ytlink,
        blog_post : blog_post,
        type    : type,
        user    : user,
        cat_id : cat_id
      },
      success  : function(data){
        $("#youtubeVid").remove();
        WIBlog.havePosts();
        //$("#get_resources").html(data);
      }
    })

}

WIBlog.slider = function(){
WIBlog.select_cat();
WIBlog.userRole('slideruser');
	var nowDate		= new Date();
var nowDay		= ((nowDate.getDate().toString().length) == 1) ? '0'+(nowDate.getDate()) : (nowDate.getDate());
var nowMonth	= ((nowDate.getMonth().toString().length) == 1) ? '0'+(nowDate.getMonth()+1) : (nowDate.getMonth()+1);
var nowYear		= nowDate.getFullYear();
var formatDate	= nowDay + "." + nowMonth + "." + nowYear;

	var slider = ('<!-- .latest-posts start -->'+                         
'<article class="post_container" id="blogPostSlider">'+                             
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
   '<div class="slideshow-container">'+

'<div class="mySlides fade">'+
  '<div class="numbertext">1 / 3</div>'+
   '<div id="dragandrophandler0">Drag & Drop Files Here</div>'+
        '<div class="img-preview" id="img-preview0"></div>'+
  '<div class="text"><input type="text" id="caption0" placeholder="Caption Text"></div>'+
'</div>'+

'<div class="mySlides fade">'+
  '<div class="numbertext">2 / 3</div>'+
   '<div id="dragandrophandler1">Drag & Drop Files Here</div>'+
        '<div class="img-preview" id="img-preview1"></div>'+
  '<div class="text"><input type="text" id="caption1" placeholder="Caption Two"></div>'+
'</div>'+

'<div class="mySlides fade">'+
  '<div class="numbertext">3 / 3</div>'+
   '<div id="dragandrophandler2">Drag & Drop Files Here</div>'+
        '<div class="img-preview" id="img-preview2"></div>'+
  '<div class="text"><input type="text" id="caption2" placeholder="Caption Three"></div>'+
'</div>'+

'<a class="prev" onclick="plusSlides(-1)">&#10094;</a>'+
'<a class="next" onclick="plusSlides(1)">&#10095;</a>'+

'</div>'+
'<br>'+

'<div style="text-align:center">'+
  '<span class="dot" onclick="currentSlide(1)"></span>'+ 
  '<span class="dot" onclick="currentSlide(2)"></span>'+ 
  '<span class="dot" onclick="currentSlide(3)"></span> '+
'</div>        '+                       
   '</figure>'+                              
    '<div class="post-content">'+                                    
'<div id="select_cat"></div>'+     
'<h4><input type="text" id="post_title" placeholder="Blog post with Slider" value=""></h4>'+     
  '<input type="hidden" name="blog_slider" id="blog_slider" value="blog_slider">'+                               

    '<div class="blog-meta">'+                                        
    '<ul>'+                                            
    '<li class="fa fa-user">'+                                                
    '<a href="javascript:void(0)" id="slideruser"></a>'+                                            
    '</li> '+                                          
     '<li class="post-tags fa fa-tags">'+                                               
      '<a href="javascript:void(0)">news, </a>'+                                                
      '<a href="javascript:void(0)">dois</a>'+                                            
      '</li> '+                                       
'</ul>'+                                    
'</div>'+                                    
'<p>'+   
'<textarea id="blog_post" placeholder="Add your blog post here"></textarea>'+                                                                      
'</p>'+                                    
'</div> '+                       
'</article><!-- .blog-post end --> '+
'<div class="submit"><a href="javascript:void(0)" onclick="WIBlog.PostSlider()">Post</div>'+
'<script type="text/javascript">'+
'var slideIndex = 1;'+
'showSlides(slideIndex);'+

'function plusSlides(n) {'+
 ' showSlides(slideIndex += n);'+
'}'+

'function currentSlide(n) {'+
  'showSlides(slideIndex = n);'+
'}'+

'function showSlides(n) {'+
  'var i;'+
  'var slides = document.getElementsByClassName("mySlides");'+
  'var dots = document.getElementsByClassName("dot");'+
  'if (n > slides.length) {slideIndex = 1}    '+
  'if (n < 1) {slideIndex = slides.length}'+
  'for (i = 0; i < slides.length; i++) {'+
    '  slides[i].style.display = "none";'+  
  '}'+
  'for (i = 0; i < dots.length; i++) {'+
      'dots[i].className = dots[i].className.replace(" active", "");'+
  '}'+
  'slides[slideIndex-1].style.display = "block";  '+
  'dots[slideIndex-1].className += " active";'+
'}'+
'</script>'+
'<script type="text/javascript">'+
                                   '$(document).ready(function(){'+
  'var obj0 = $("#dragandrophandler0");'+
  'var obj1 = $("#dragandrophandler1");'+
  'var obj2 = $("#dragandrophandler2");'+
'obj0.on("dragenter", function (e) '+
'{'+
    'e.stopPropagation();'+
    'e.preventDefault();'+
    '$(this).css("border", "2px solid #0B85A1");'+
'});'+
'obj0.on("dragover", function (e) '+
'{'+
     'e.stopPropagation();'+
     'e.preventDefault();'+
'});'+

'obj1.on("dragenter", function (e) '+
'{'+
    'e.stopPropagation();'+
    'e.preventDefault();'+
    '$(this).css("border", "2px solid #0B85A1");'+
'});'+
'obj1.on("dragover", function (e) '+
'{'+
     'e.stopPropagation();'+
     'e.preventDefault();'+
'});'+

'obj2.on("dragenter", function (e) '+
'{'+
    'e.stopPropagation();'+
    'e.preventDefault();'+
    '$(this).css("border", "2px solid #0B85A1");'+
'});'+
'obj2.on("dragover", function (e) '+
'{'+
     'e.stopPropagation();'+
     'e.preventDefault();'+
'});'+

'obj0.on("drop", function (e) '+
'{'+
 
     '$(this).css("border", "2px dotted #0B85A1");'+
     'e.preventDefault();'+
     'var files = e.originalEvent.dataTransfer.files;'+
     'var colID0 = "img-preview0";'+
     'var col0 = "dragandrophandler0";'+
     'var mediaId0 = "media0";'+

     //We need to send dropped files to Server
     'handleSliderFileUpload(files,obj0, colID0, col0, mediaId0);'+
'});'+

'obj1.on("drop", function (e) '+
'{'+
 
     '$(this).css("border", "2px dotted #0B85A1");'+
     'e.preventDefault();'+
     'var files = e.originalEvent.dataTransfer.files;'+
     'var colID1 = "img-preview1";'+
     'var col1 = "dragandrophandler1";'+
     'var mediaId1 = "media1";'+

     //We need to send dropped files to Server
     'handleSliderFileUpload(files,obj1, colID1, col1, mediaId1);'+
'});'+

'obj2.on("drop", function (e) '+
'{'+
 
     '$(this).css("border", "2px dotted #0B85A1");'+
     'e.preventDefault();'+
     'var files = e.originalEvent.dataTransfer.files;'+
     'var colID2 = "img-preview2";'+
     'var col2 = "dragandrophandler2";'+
     'var mediaId2 = "media2";'+

     //We need to send dropped files to Server
     'handleSliderFileUpload(files,obj2, colID2, col2, mediaId2);'+
'});'+
'$(document).on("dragenter", function (e) '+
'{'+
    'e.stopPropagation();'+
    'e.preventDefault();'+
'});'+
'$(document).on("dragover", function (e) '+
'{'+
  'e.stopPropagation();'+
  'e.preventDefault();'+
  'obj0.css("border", "2px dotted #0B85A1");'+
'});'+

'$(document).on("dragover", function (e) '+
'{'+
  'e.stopPropagation();'+
  'e.preventDefault();'+
  'obj1.css("border", "2px dotted #0B85A1");'+
'});'+

'$(document).on("dragover", function (e) '+
'{'+
  'e.stopPropagation();'+
  'e.preventDefault();'+
  'obj2.css("border", "2px dotted #0B85A1");'+
'});'+
'$(document).on("drop", function (e) '+
'{'+
    'e.stopPropagation();'+
    'e.preventDefault();'+
'});'+

'});'+
'</script>');
	$("#blog_style").append(slider);
}

WIBlog.video = function(){
WIBlog.select_cat();
WIBlog.userRole('viduser');
	var nowDate		= new Date();
var nowDay		= ((nowDate.getDate().toString().length) == 1) ? '0'+(nowDate.getDate()) : (nowDate.getDate());
var nowMonth	= ((nowDate.getMonth().toString().length) == 1) ? '0'+(nowDate.getMonth()+1) : (nowDate.getMonth()+1);
var nowYear		= nowDate.getFullYear();
var formatDate	= nowDay + "." + nowMonth + "." + nowYear;

	var video = ('<!-- .latest-posts start -->'+                            
                              '<article class="post_container" id="blogPostVideo"> '+                             
                              '<div class="post-info">'+                                    
                              '<div class="post-date">'+                                        
                              '<span class="day">'+nowDay+'</span>'+                                        
                              '<span class="month">'+nowMonth+'</span> '+                                   
                              '</div>'+                                    
                              '<div class="post-category">'+                                     
                              '<i class="fa fa-picture-o"></i> '+                                   
                              '</div>'+                                
                              '</div><!-- .post-info end --> '+                               
                              '<figure class="post-video" id="Post_Vid">'+                 
                              '<div id="dragandrophandler">Drag & Drop Files Here</div>'+
        '<div class="vid-preview"></div>'+
        '<div class="upload-msg"></div></figure>'+                              
                               '<div class="post-content">'+  
                               '<div id="select_cat"></div>'+                                   
                               '<h4><input type="text" id="post_title" placeholder="Blog post without media content"></h4>'+ 
                                '<input type="hidden" name="blog_video" id="blog_video" value="blog_video">'+                               
                               '<div class="blog-meta">'+                                        
                               '<ul> '+                                           
                               '<li class="fa fa-user">'+                                                
                               '<a href="javascript:void(0)" id="viduser"></a>'+                                           
                                '</li>'+                                           
                                 '<li class="post-tags fa fa-tags">'+                                               
                                  '<a href="javascript:void(0)">news, </a>'+                                                
                                  '<a href="javascript:void(0)">dois</a>'+                                           
                                   '</li>'+                                        
                                   '</ul>'+                                    
                                   '</div>'+                                    
                                   '<textarea id="blog_post" placeholder="blog post with video" rows="4"></textarea>'+                                                                    
               '<div class="submit btn btn-primary"><a href="javascript:void(0)" onclick="WIBlog.PostVideo()">Post</div>'+                        
                                   '</article><!-- .blog-post end -->'+
                                   '<script type="text/javascript">'+
                                   '$(document).ready(function(){'+
  'var obj = $("#dragandrophandler");'+
'obj.on("dragenter", function (e) '+
'{'+
    'e.stopPropagation();'+
    'e.preventDefault();'+
    '$(this).css("border", "2px solid #0B85A1");'+
'});'+
'obj.on("dragover", function (e) '+
'{'+
     'e.stopPropagation();'+
     'e.preventDefault();'+
'});'+
'obj.on("drop", function (e) '+
'{'+
 
     '$(this).css("border", "2px dotted #0B85A1");'+
     'e.preventDefault();'+
     'var files = e.originalEvent.dataTransfer.files;'+
     //We need to send dropped files to Server
     'handleFileUpload(files,obj);'+
'});'+
'$(document).on("dragenter", function (e) '+
'{'+
    'e.stopPropagation();'+
    'e.preventDefault();'+
'});'+
'$(document).on("dragover", function (e) '+
'{'+
  'e.stopPropagation();'+
  'e.preventDefault();'+
  'obj.css("border", "2px dotted #0B85A1");'+
'});'+
'$(document).on("drop", function (e) '+
'{'+
    'e.stopPropagation();'+
    'e.preventDefault();'+
'});'+

'});'+
'</script>');
	$("#blog_style").append(video);

}


WIBlog.image = function(){
WIBlog.select_cat();
WIBlog.userRole('imguser');
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
                              '<figure class="post-image" id="Post_Image">'+                 
                              '<div id="dragandrophandler">Drag & Drop Files Here</div>'+
        '<div class="img-preview"></div>'+
        '<div class="upload-msg"></div></figure>'+                              
                               '<div class="post-content">'+  
                               '<div id="select_cat"></div>'+                                   
                               '<h4><input type="text" id="post_title" placeholder="Blog post without media content"></h4>'+ 
                                '<input type="hidden" name="blog_image" id="blog_image" value="blog_image">'+                               
                               '<div class="blog-meta">'+                                        
                               '<ul> '+                                           
                               '<li class="fa fa-user">'+                                                
                               '<a href="javascript:void(0)" id="imguser"></a>'+                                           
                                '</li>'+                                           
                                 '<li class="post-tags fa fa-tags">'+                                               
                                  '<a href="javascript:void(0)">news, </a>'+                                                
                                  '<a href="javascript:void(0)">dois</a>'+                                           
                                   '</li>'+                                        
                                   '</ul>'+                                    
                                   '</div>'+                                    
                                   '<textarea id="blog_post" placeholder="blog post with image" rows="4"></textarea>'+                                                                    
               '<div class="submit btn btn-primary"><a href="javascript:void(0)" onclick="WIBlog.PostImage()">Post</div>'+                        
                                   '</article><!-- .blog-post end -->'+
                                   '<script type="text/javascript">'+
                                   '$(document).ready(function(){'+
  'var obj = $("#dragandrophandler");'+
'obj.on("dragenter", function (e) '+
'{'+
    'e.stopPropagation();'+
    'e.preventDefault();'+
    '$(this).css("border", "2px solid #0B85A1");'+
'});'+
'obj.on("dragover", function (e) '+
'{'+
     'e.stopPropagation();'+
     'e.preventDefault();'+
'});'+
'obj.on("drop", function (e) '+
'{'+
 
     '$(this).css("border", "2px dotted #0B85A1");'+
     'e.preventDefault();'+
     'var files = e.originalEvent.dataTransfer.files;'+
     //We need to send dropped files to Server
     'handleFileUpload(files,obj);'+
'});'+
'$(document).on("dragenter", function (e) '+
'{'+
    'e.stopPropagation();'+
    'e.preventDefault();'+
'});'+
'$(document).on("dragover", function (e) '+
'{'+
  'e.stopPropagation();'+
  'e.preventDefault();'+
  'obj.css("border", "2px dotted #0B85A1");'+
'});'+
'$(document).on("drop", function (e) '+
'{'+
    'e.stopPropagation();'+
    'e.preventDefault();'+
'});'+

'});'+
'</script>');
	$("#blog_style").append(image);
}

WIBlog.audio = function(){
WIBlog.select_cat();
WIBlog.userRole('audionuser');
	var nowDate		= new Date();
var nowDay		= ((nowDate.getDate().toString().length) == 1) ? '0'+(nowDate.getDate()) : (nowDate.getDate());
var nowMonth	= ((nowDate.getMonth().toString().length) == 1) ? '0'+(nowDate.getMonth()+1) : (nowDate.getMonth()+1);
var nowYear		= nowDate.getFullYear();
var formatDate	= nowDay + "." + nowMonth + "." + nowYear;

	var audio = (' <!-- .latest-posts start -->'+                           
    '<article class="post_container" id="blogPostAudio">>'+                              
    '<div class="post-info">'+                                    
    '<div class="post-date">'+                                        
    '<span class="day">'+nowDay+'</span> '+                                       
    '<span class="month">'+nowMonth+'</span>'+                                   
     '</div>'+                                    
     '<div class="post-category">'+                                      
     '<i class="fa fa-picture-o"></i>'+                                   
      '</div>'+                                
      '</div><!-- .post-info end --> '+ 

      '<figure class="post-audio" id="Post_audio">'+                 
                              '<div id="dragandrophandler">Drag & Drop Files Here</div>'+
        '<div class="audio-preview"></div>'+
        '<div class="upload-msg"></div></figure>'+
                            
       '<div class="post-content">'+    
       '<div id="select_cat"></div>'+                                 
       '<h4><input type="text" id="post_title" placeholder="Blog post without media content"></h4>'+ 
            '<input type="hidden" name="audio" id="audio" value="blog_audio">'+                                   
       '<div class="blog-meta">'+                                        
       '<ul>'+                                            
       '<li class="fa fa-user">'+                                                
       '<a href="javascript:void(0)" id="audiouser"></a>'+                                            
       '</li>'+                                            
       '<li class="post-tags fa fa-tags">'+                                               
        '<a href="javascript:void(0)">news, </a>'+                                                
        '<a href="javascript:void(0)">dois</a>'+                                            
        '</li>'+                                        
        '</ul>'+                                    
        '</div>'+                                   
         '<textarea id="blog_post" placeholder="blog post" rows="4"></textarea>'+                            
         '</div>'+                         
         '</article><!-- .blog-post end -->'+
         '<div class="submit"><a href="javascript:void(0)" onclick="WIBlog.PostAudio()">Post</div>'+
         '<script type="text/javascript">'+
                                   '$(document).ready(function(){'+
  'var obj = $("#dragandrophandler");'+
'obj.on("dragenter", function (e) '+
'{'+
    'e.stopPropagation();'+
    'e.preventDefault();'+
    '$(this).css("border", "2px solid #0B85A1");'+
'});'+
'obj.on("dragover", function (e) '+
'{'+
     'e.stopPropagation();'+
     'e.preventDefault();'+
'});'+
'obj.on("drop", function (e) '+
'{'+
 
     '$(this).css("border", "2px dotted #0B85A1");'+
     'e.preventDefault();'+
     'var files = e.originalEvent.dataTransfer.files;'+
 
     //We need to send dropped files to Server
     'handleFileUpload(files,obj);'+
'});'+
'$(document).on("dragenter", function (e) '+
'{'+
    'e.stopPropagation();'+
    'e.preventDefault();'+
'});'+
'$(document).on("dragover", function (e) '+
'{'+
  'e.stopPropagation();'+
  'e.preventDefault();'+
  'obj.css("border", "2px dotted #0B85A1");'+
'});'+
'$(document).on("drop", function (e) '+
'{'+
    'e.stopPropagation();'+
    'e.preventDefault();'+
'});'+

'});'+
'</script>');
	$("#blog_style").append(audio);
}

WIBlog.youtube = function(){
WIBlog.select_cat();
WIBlog.userRole('ytuser');
	var nowDate		= new Date();
var nowDay		= ((nowDate.getDate().toString().length) == 1) ? '0'+(nowDate.getDate()) : (nowDate.getDate());
var nowMonth	= ((nowDate.getMonth().toString().length) == 1) ? '0'+(nowDate.getMonth()+1) : (nowDate.getMonth()+1);
var nowYear		= nowDate.getFullYear();
var formatDate	= nowDay + "." + nowMonth + "." + nowYear;


	var youtube = ('<article class="post_container" id="youtubeVid">'+                             
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
          '<div id="select_cat"></div>'+                                                                      
            '<h4><input type="text" id="post_title" placeholder="Blog post without media content"></h4>'+ 
            '<input type="hidden" name="youtube" id="youtube" value="blog_youtube">'+ 
            '<input type="text" id="youtube_link" placeholder="i frame link">'+                                                                      
            '<div class="blog-meta">'+                                        
            '<ul>'+                                            
            '<li class="fa fa-user">'+                                               
             '<a href="javascript:void(0)" id="ytuser"></a>'+                                            
             '</li>'+                                            
             '<li class="post-tags fa fa-tags">'+                                                
             '<a href="javascript:void(0)">news, </a>'+                                               
              '<a href="javascript:void(0)">dois</a>'+                                            
              '</li>'+                                        
              '</ul>'+                                   
               '</div>'+
               '<textarea id="blog_post" placeholder="youtube media" rows="4"></textarea>'+                                                                    
               '<div class="read-more"></div> '+                            
               '</div>'+  
               '<div class="submit btn btn-primary"><a href="javascript:void(0)" onclick="WIBlog.PostYouTube()">Post</div>'+                   
               '</article>');
	$("#blog_style").append(youtube);
}

WIBlog.noMedia = function(){
WIBlog.select_cat();
WIBlog.userRole('user');
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
          '<div id="select_cat"></div>'+                                                                      
            '<h4><input type="text" id="post_title" placeholder="Blog post without media content"></h4>'+ 
            '<input type="hidden" name="noMedia" id="noMedia" value="NoMedia">'+                                                                       
            '<div class="blog-meta">'+                                        
            '<ul>'+                                            
            '<li class="fa fa-user">'+                                               
             '<a href="javascript:void(0)" id="user"></a>'+                                            
             '</li>'+                                            
             '<li class="post-tags fa fa-tags">'+                                                
             '<a href="javascript:void(0)">news, </a>'+                                               
              '<a href="javascript:void(0)">dois</a>'+                                            
              '</li>'+                                        
              '</ul>'+                                   
               '</div>'+
               '<textarea id="blog_post" placeholder="No Media blog post" rows="4"></textarea>'+                                                                    
               '<div class="read-more"></div> '+                            
               '</div>'+  
               '<div class="submit btn btn-primary"><a href="javascript:void(0)" onclick="WIBlog.PostNoMedia()">Post</div>'+                   
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

WIBlog.userRole = function(colID){

  $.ajax({
      url      : "WICore/WIClass/WIAjax.php",
      method   : "POST",
      data     : {
        action : "userRole"
      },
      success  : function(data){

        $("#"+colID).html(data);
      }
    })
}








