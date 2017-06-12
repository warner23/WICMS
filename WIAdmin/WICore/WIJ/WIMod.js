$(document).ready(function(event)
{

    WIMod.Next();
 //executes code below when user click on pagination links
    $("#modList").on( "click", ".pagination a", function (e){
        e.preventDefault();
        $(".loading-div").removeClass('closed'); //remove closed element
        $(".loading-div").addClass('open'); //show loading element
        var page = $(this).attr("data-page"); //get page number from link

             $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "NextPage",
            lang   : 1,
            page : page
        },
        success: function(result)
        {
            $("#modList").html(result);
              $(".loading-div").removeClass('open'); //remove closed element
        $(".loading-div").addClass('closed'); //show loading element
        }
       
        
    });

         });

});


var WIMod = {}

WIMod.install = function(mod_name, author){

//alert(mod_name);

 $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "mod_install",
            mod_name : mod_name,
            author   : author
        },
        success: function(result)
        {
            
        }
    })

}


WIMod.uninstall = function(mod_name){


 $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "mod_uninstall",
            mod_name : mod_name
        },
        success: function(result)
        {

        }
    })

}

WIMod.enable = function(mod_name, enable){

//alert(mod_name);
//alert(enable);

 $.ajax({
    	url: "WICore/WIClass/WIAjax.php",
    	type: "POST",
    	data: {
    		action : "mod_enable",
    		mod_name : mod_name,
    		enable : enable
    	},
    	success: function(result)
    	{
    		
    	}
    })

}

WIMod.disable = function(mod_name, disable){


 $.ajax({
    	url: "WICore/WIClass/WIAjax.php",
    	type: "POST",
    	data: {
    		action : "mod_disable",
    		mod_name : mod_name,
    		disable : disable
    	},
    	success: function(result)
    	{

    	}
    })

}

WIMod.drop = function(mod_name){
	//alert("droppped");
    //alert(mod_name);

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "drop_call",
            mod_name : mod_name
        },
        success: function(result)
        {
            $("#droppable").html(result);
        }
    })
}


WIMod.editdrop = function(mod_name){
    //alert("droppped");
    //alert(mod_name);

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "edit_drop_mod",
            mod_name : mod_name
        },
        success: function(result)
        {
            $("#droppable").html(result);
        }
    })
}

WIMod.col1 = function(){
    alert("col1");
}


 WIMod.Next = function(){
     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "Next",
            lang   : 1
        },
        success: function(result)
        {
            $("#modList").html(result);
              $(".loading-div").removeClass('open'); //remove closed element
        $(".loading-div").addClass('closed'); //show loading element
        }
       
        
    });
 }

 WIMod.delete = function(e){
         e.preventDefault();
    $( "#dialog-confirm" ).removeClass( "hide" );
    $( "#dialog-confirm" ).addClass( "show" );
 }

  WIMod.remove = function(e){
         e.preventDefault();
         $( "#remove" ).remove();
 }

  WIMod.close = function(e){
         e.preventDefault();
    $( "#dialog-confirm" ).removeClass( "show" );
    $( "#dialog-confirm" ).addClass( "hide" );
 }

   WIMod.createMod = function(e){
         e.preventDefault();

 }