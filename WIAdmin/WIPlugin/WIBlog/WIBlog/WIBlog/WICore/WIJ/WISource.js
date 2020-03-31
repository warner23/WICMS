$(document).ready(function(){

var rid = $.cookie('rid');
WISource.source(rid);

WISource.Comments(rid);
	
});

var WISource = {};

WISource.source = function(rid){

	 $.ajax({
      url      : "WICore/WIClass/WIAjax.php",
      method   : "POST",
      data     : {
        action :"getRes",
        category : 1,
        rid  : rid
      },
      success  : function(data){
      	//console.log(data);
      	$("#get_source").html(data);
      }
  });

}

WISource.Download = function(event){
		//event.preventDefault();
		//alert('click');
		url = $("#osdp").attr('href');
		location.href = url;
		//alert(url);
}

WISource.Comments = function(rid){
	    $.ajax({
      url      : "WICore/WIClass/WIAjax.php",
      method   : "POST",
      data     : {
        action :"getComments",
        category : 1,
        rid  : rid
      },
      success  : function(data){
        $(".comments-comments").html(data);
      }
    


});
}
