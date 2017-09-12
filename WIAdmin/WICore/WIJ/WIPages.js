$(document).ready(function(event)
{
    
    $("#newpage").click(function(){
        var NPN = $("#page_title").val();

         $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "new_page",
            page   : NPN
        },
        success: function(result)
        {
  
            var res = JSON.parse(result);
            if (res.completed === "saved") {
                var page_id = res.page_id;
                alert(page_id);
                    var date = new Date();
                     var minutes = 30;
               date.setTime(date.getTime() + (minutes * 60 * 1000));
            $.cookie("page_id", page_id, {expires: date});
            
                window.location = "WIEditpage.php";
            }

            
        }
    });
    })    
});


var WIPages = {}

WIPages.Page = function(){
	var page = $("#page").html();
	//alert(page);

	 $.ajax({
    	url: "WICore/WIClass/WIAjax.php",
    	type: "POST",
    	data: {
    		action : "page_saver",
    		page   : page
    	},
    	success: function(result)
    	{
  
    		var res = JSON.parse(result);
    		if (res.completed === "saved") {
    			window.location = "WIEditpage.php";
    		}
            
    	}
    });

}

WIPages.Delete = function(id){

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "page_delete",
            page_id   : id
        },
        success: function(result)
        {
            var res = JSON.parse(result);
            if (res.status === "complete"){
                $("#div").remove();
            }
            
        }
    });
}

WIPages.Open = function(id, name){

    $("#modal-delete").removeClass("off");
    $("#modal-delete").addClass("on");

    var Element = $("#details-body");

    var Div = '<div id="div"><span>Are you sure you want to delete '+name+' page </span> <button class="btn btn-danger" onclick="WIPages.Delete('+id+');">Delete</button> <button class="btn" onclick="WIPages.Close();">Cancel</button></div>';

    Element.append(Div);



}

WIPages.Close = function(){

    $("#modal-delete").removeClass("on");
    $("#modal-delete").addClass("off");
    $("#div").remove();

}

