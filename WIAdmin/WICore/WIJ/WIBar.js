$(document).ready(function(){

/*  $("img").click(function() {      
    $(this).toggleClass("hover");
    var id = $(".hover").attr("id");
   // alert(id);
    WIMedia.change(id);
  });*/


  var obj = $("#dragandrophandler");
  var dir = $("#supload").attr("value");
obj.on('dragenter', function (e) 
{
    e.stopPropagation();
    e.preventDefault();
    $(this).css('border', '2px solid #0B85A1');
});
obj.on('dragover', function (e) 
{
     e.stopPropagation();
     e.preventDefault();
});
obj.on('drop', function (e) 
{
 
     $(this).css('border', '2px dotted #0B85A1');
     e.preventDefault();
     var files = e.originalEvent.dataTransfer.files;
 
     //We need to send dropped files to Server
     handleFileUpload(files,obj,dir);
});

  var menuobj = $("#menudragandrophandler");
  var menudir = $("#menuupload").attr("value");
menuobj.on('dragenter', function (e) 
{
    e.stopPropagation();
    e.preventDefault();
    $(this).css('border', '2px solid #0B85A1');
});
menuobj.on('dragover', function (e) 
{
     e.stopPropagation();
     e.preventDefault();
});
menuobj.on('drop', function (e) 
{
 
     $(this).css('border', '2px dotted #0B85A1');
     e.preventDefault();
     var files = e.originalEvent.dataTransfer.files;
 
     //We need to send dropped files to Server
     handleFileUpload(files,menuobj,menudir);
});
$(document).on('dragenter', function (e) 
{
    e.stopPropagation();
    e.preventDefault();
});
$(document).on('dragover', function (e) 
{
  e.stopPropagation();
  e.preventDefault();
  obj.css('border', '2px dotted #0B85A1');
});
$(document).on('drop', function (e) 
{
    e.stopPropagation();
    e.preventDefault();
});



$('#menuSection').on('change', function() {
            // alert( this.value );
    $("#menuSection").val(this.value).prop("selected", "selected");                      
    })
});

var WIBar = {}

WIBar.sendData = function(site){

    event.preventDefault();
    //alert('clicked');
	var btn = $("#site_settings");
    

	// put button into the loading state
	WICore.loadingButton(btn, $_lang.creating_Account);

	 $.ajax({
    	url: "WICore/WIClass/WIAjax.php",
    	type: "POST",
    	data: {
    		action : "site_settings",
    		settings   : site
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
                    WICore.displayadminerrorsMessage($("#"+error.id), error.msg);
                }
    		}
    		else if(res.status === "successful")
    		{
    			// dispaly success message
    			 WICore.displaySuccessfulMessage($("#wresults"), res.msg);
                
    		}
    	}
    });
}


WIBar.add = function(){
     $("#modal-add-details").removeClass("hide");
     $("#modal-add-details").addClass("show");
}


WIBar.Closed = function(ele_id){
     $("#modal-"+ele_id+"-details").removeClass("hide");
     $("#modal-"+ele_id+"-details").addClass("show");
}

WIBar.addphoto = function()
{
  $("#modal-photo-details").removeClass("hide");
  $("#modal-photo-details").addClass("show");
}

WIBar.photo = function()
{
  $("#modal-change-details").removeClass("hide");
  $("#modal-change-details").addClass("show");
}


WIBar.addIngred = function(){
    $div = ('<li class="ingred">'+
            '<div class="col-lg-12">'+
            '<input class="ingredient" type="text" name="ingredient" placeholder="1 serving example">'+
           '</div>'+
           '</li>');
    $("#ingr").append($div);
}

WIBar.addMethod = function(){
    $div = ('<li>'+
            '<div class="col-lg-12">'+
            '<input class="method" type="text" name="method" placeholder="Place eample into example">'+
            '</div>'+
            '</li>');
    $("#method").append($div);
}


WIBar.newMenuItem = function(){
    
       var newpic = $("#uploadedmenuPic").attr('value');
       //var qtydata = [];
       var ingreddata =  [];

       var methoddata = [];

       menuSectionId = $("#menuSection option:selected").attr("value");
       newItem = $("#newItem").val();

      $(".ingredient:input").each(function() {
       ingreddata.push({
        'ingredient'  : $(this).val()
      });
        });

    $(".method:input").each(function() {
       methoddata.push({
        'method'  : $(this).val()
      });
        });

    glass = $("#glass").val();
    time = $("#time").val();


       $.ajax({
      url: "WICore/WIClass/WIAjax.php",
      type: "POST",
      data: {
        action       : "newDrinkItem",
        ingredient   : ingreddata,
        methoddata   : methoddata,
        newpic       : newpic,
        menuSectionId: menuSectionId,
        newItem      : newItem,
        glass        :glass,
        time         : time


      },
      success: function(result)
      {
        var res = JSON.parse(result);

        if(res.status == "success")
        {
           $("#modal-add-details").removeClass("show");
     $("#modal-add-details").addClass("hide");
     //WICore.Refresh();
     
        }
      }

    });
}