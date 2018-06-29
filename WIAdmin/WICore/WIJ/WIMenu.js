$(document).ready(function(event)
{
   
   // button register click below
	$("#update_Menu").click(function()
	{



          var menu_name            = $("#menu_name").attr("value"),
       menu_link               = $("#menu_link").attr("value");

         var Menu = {
        UserData:{
            menu_name           : menu_name,
                    menu_link         : menu_link

        },
        FieldId:{
          menu_name           : "menu_name",
          menu_link         : "menu_link"

        }
       };
       // send data to server
       WIMenu.sendData(Menu);

		
	});
});

var WIMenu = {}

WIMenu.newTab = function(){

  //    var cast_id = parseInt($("input.casting:last").attr('id'));
  // cast_id++;

  $('<li class="menu_tabs">'+ 
  	'<input type="text" id="menu_name"  maxlength="88" name="menu_name" placeholder="menu name" class="input-xlarge form-control">'+
  	'<span class="btn" onclick="WIMenu.findPage();" id="findPage">Find Page</span>'+
  	'<input type="hidden" id="menu_link"  maxlength="88" name="menu_link" placeholder="menu link" class="input-xlarge form-control">'+
  	'</li>').insertAfter('ul#mainMenu>li:last');

}

WIMenu.findPage = function(){

	$.ajax({
      url      : "WICore/WIClass/WIAjax.php",
      method   : "POST",
      data     : {
        action : "findPage"
      },
      success  : function(data){

          $("#findPage").html(data);
        }
      });
}

WIMenu.placelink = function(page_name){
  var str = document.getElementById("menu_name").value;
alert(str);
	$("#menu_link").attr('value', page_name);
  $("#menu_name").attr('value', str);

	$("#findPage").remove();
}

WIMenu.sendData = function(Menu){

    event.preventDefault();
	var btn = $("#update_Menu");
    

	// put button into the loading state
	WICore.loadingButton(btn, $_lang.creating_Account);

	 $.ajax({
    	url: "WICore/WIClass/WIAjax.php",
    	type: "POST",
    	data: {
    		action : "update_Menu",
    		settings   : Menu
    	},
    	success: function(result)
    	{
    		// return the button to normasl state
    		WICore.removeLoadingButton(btn);
    		console.log(result);
            //window.alert(result);
    		//parse the data to json
            //var res = JSON.stringify(result);
    		var res = JSON.parse(result);
            //var res = $.parseJSON(result);
            console.log(res);
    		if(res.status === "error")
    		{
    			/// display all errors
    			 for(var i=0; i<res.errors.length; i++) 
    			 {
                    var error = res.errors[i];
                    WICore.displayErrorMessage($("#"+error.id), error.msg);
                }
    		}
    		else if(res.status === "completed")
    		{
    			// dispaly success message
    			 WICore.displaySuccessfulMessage($("#hresults"), res.msg);
                
    		}
    	}
    });
}
