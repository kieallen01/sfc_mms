//16.617115, 120.317231 - San Fernando City Hall Coordinates
function initMap() {
	var opt = {minZoom: 17, maxZoom: 17, mapTypeId: google.maps.MapTypeId.SATELLITE, draggable: false};
	var map = new google.maps.Map(document.getElementById('map'), {zoom: 17, center: {lat: 16.617115, lng: 120.317231}});

	map.setOptions(opt);
}
