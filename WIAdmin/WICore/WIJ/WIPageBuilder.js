
$(document).ready(function(event)
{

               
});

var WIPageBuilder = {};

WIPageBuilder.Rotate = function(){

	if($(".elementsG").hasClass('on') ) {
		console.log('clicked');
	$(".elementsG").removeClass('on').addClass('off');
	$(".elementsB").removeClass('off').addClass('on');
	$( "#grid" ).removeClass('on').addClass('off');
	$( "#base" ).removeClass('off').addClass('on');
	}else if($(".elementsB").hasClass('on') ) {
		console.log('cli');
	$(".elementsB").removeClass('on').addClass('off');
	$(".elementsC").removeClass('off').addClass('on');
	$( "#base" ).removeClass('on').addClass('off');
	$( "#components" ).removeClass('off').addClass('on');
    }else if($(".elementsC").hasClass('on') ) {
    	console.log('clic');
	$(".elementsC").removeClass('on').addClass('off');
	$(".elementsF").removeClass('off').addClass('on');
	$( "#components" ).removeClass('on').addClass('off');
	$( "#forms" ).removeClass('off').addClass('on');
    }else if($(".elementsF").hasClass('on') ) {
    	console.log('click');
	$(".elementsF").removeClass('on').addClass('off');
	$(".elementsJ").removeClass('off').addClass('on');
	$( "#forms" ).removeClass('on').addClass('off');
	$( "#javascript" ).removeClass('off').addClass('on');
    }	
}

WIPageBuilder.RotateX = function(){
	
	    if ($(".elementsJ").hasClass('on') ) {
	$(".elementsJ").removeClass('on').addClass('off');
	$(".elementsF").removeClass('off').addClass('on');
	$( "#javascript" ).removeClass('on').addClass('off');
	$( "#forms" ).removeClass('off').addClass('on');
    }else if ($(".elementsF").hasClass('on') ) {
	$(".elementsF").removeClass('on').addClass('off');
	$(".elementsC").removeClass('off').addClass('on');
	$( "#forms" ).removeClass('on').addClass('off');
	$( "#components" ).removeClass('off').addClass('on');
    }else if ($(".elementsC").hasClass('on') ) {
	$(".elementsC").removeClass('on').addClass('off');
	$(".elementsB").removeClass('off').addClass('on');
	$( "#components" ).removeClass('on').addClass('off');
	$( "#base" ).removeClass('off').addClass('on');
    }else if ($(".elementsB").hasClass('on') ) {
	$(".elementsB").removeClass('on').addClass('off');
	$(".elementsG").removeClass('off').addClass('on');
	$( "#base" ).removeClass('on').addClass('off');
	$( "#grid" ).removeClass('off').addClass('on');
    }
}


WIPageBuilder.edit = function(){

	if( $(".groupConfig").hasClass('edit') ){
    $(".groupConfig").css("display", "none");
	$(".groupConfig").removeClass('edit');
	$(".stageColumn").css("display", "block");
	}else{
	$(".groupConfig").css("display", "block");
	$(".groupConfig").addClass('edit');
	$(".stageColumn").css("display", "none");	
	}
}

WIPageBuilder.clone = function(){
	$( "#dropStage" ).clone().appendTo( "ul#stage" );
}

WIPageBuilder.delete= function(){
$( "#dropStage" ).remove()
}
