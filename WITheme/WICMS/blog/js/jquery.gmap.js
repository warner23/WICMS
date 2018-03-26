
/* ==========================================================================
	Asynchronous Loading Google Maps
============================================================================= */
function loadScript() {
	var script = document.createElement('script');
	script.type = 'text/javascript';
	script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&' + 'callback=initialize';
	document.body.appendChild(script);
}
window.onload = loadScript;

/* ==========================================================================
	Google Maps SETTING's
============================================================================= */
/*
 * define the coordinates of your company
 */

lat = 53.472817;
lng = -2.162430; 

var map;
var MY_MAPTYPE_ID = 'custom_style';
 
function initialize() {

	  var featureOpts = [
		 {
				"featureType": "landscape",
				"stylers": [
				  { "weight": 0.1 },
				  { "color": "Brown" }
				]
			  },{
				"featureType": "road",
				"elementType": "geometry",
				"stylers": [
				  { "visibility": "simplified" },
				  { "color": "Yellow" }
				]
			  },{
				"featureType": "poi",
				"elementType": "geometry",
				"stylers": [
				  { "color": "Yellow" }
				]
			  },{
				"featureType": "road",
				"elementType": "labels.text.fill",
				"stylers": [
				  { "color": "#2c3e50" }
				]
			  },{
					"featureType": "poi",
					"elementType": "labels.text.fill",
					"stylers": [
					  { "color": "#e74c3c" }
					]
				  },{
				"featureType": "road",
				"elementType": "labels.text.stroke",
				"stylers": [
				  { "color": "#ffffff" }
				]
			  },{
				"featureType": "water",
				"stylers": [
				  { "color": "#dedede" }
				]
			  }
			];
  
  var myLatlng = new google.maps.LatLng(lat,lng);
  var mapOptions = {
    zoom: 16,
    scrollwheel: true,
    mapTypeControl:true,
    streetViewControl:true,
    center: myLatlng,
    mapTypeControlOptions: {
        mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
      },
      mapTypeId: MY_MAPTYPE_ID
  };
  
  var map = new google.maps.Map(document.getElementById('jogjamap'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
  	icon: "WIMedia/Img/marker.png",
      map: map
  });
  
  var styledMapOptions = {
		    name: 'Custom Style'
		  };
  
	var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions); 
	map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
	google.maps.event.addDomListener(window, 'load', initialize);
}



/*-----------------------------------------------------------------*/
