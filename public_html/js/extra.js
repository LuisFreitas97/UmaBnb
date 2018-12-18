var map, marker;
function drawMap(divId)
{
	const INITIAL_ZOOM = 10;
	const INITIAL_COORDS = [ 32.751477587458865, -16.976623535156254 ];
	const MAX_ZOOM = 20;
	const TILES_URL = "https://a.tile.openstreetmap.org/{z}/{x}/{y}.png ";

	map = L.map(divId).setView(INITIAL_COORDS, INITIAL_ZOOM);

	L.tileLayer(TILES_URL).addTo(map);
}
function setMarker(coordinates)
{
	if(marker) map.removeLayer(marker);

	marker = L.marker(coordinates)
	    .addTo(map)
	    .bindPopup("Localização");
}