/***********
** WISITE NAMESPACE
**************/



var WIPlugin = {};

WIPlugin.enable = function(plugin){
/*
	$.ajax({
    	url: "WICore/WIClass/WIAjax.php",
    	type: "POST",
    	data: {
    		action : "enable_plugin",
    		settings   : 1,
    		plug : plugin
    	},
    	success: function(result){
    	}
    });
    */
}

WIPlugin.Install = function(plugin){

alert('click');
	$.ajax({
    	url: "WICore/WIClass/WIAjax.php",
    	type: "POST",
    	data: {
    		action : "install_plugin",
    		settings   : 1,
    		plug : plugin
    	},
    	success: function(result){
    	}
    });

}