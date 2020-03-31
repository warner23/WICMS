$(document).ready(function() {
	
	// Expand Panel
	$("#open").click(function(){
		$("#panel").slideDown("slow");
	
	});	
	
	// Collapse Panel
	$("#close").click(function(){
		$("#panel").slideUp("slow");	
	});	

	// $("#openPanel").click(function(){
	// 	alert('click');
	// 	$("#panel").slideDown("slow");
	
	// });	
	
	// // Collapse Panel
	// $("#closePanel").click(function(){
	// 	$("#panel").slideUp("slow");	
	// });	

	
	// Switch buttons from "Log In | Register" to "Close Panel" on click
	$("#toggle a").click(function () {
		$("#toggle a").toggle();
	});		
		
});
