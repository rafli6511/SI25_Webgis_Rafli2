<div id="map" style="width: 100%; height: 900px;"></div>

<script>

	var peta1 = L.tileLayer(
  'https://{s}.basemaps.cartocdn.com/light_nolabels/{z}/{x}/{y}{r}.png',
  {
    attribution: '&copy; OpenStreetMap &copy; CartoDB'
  }
);



var peta2 = L.tileLayer(
  'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}',
  {
    attribution: 'Tiles © Esri &mdash; Source: Esri, Maxar, Earthstar Geographics'
  }
);



var peta3 = L.tileLayer(
  'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
  {
    attribution: '&copy; OpenStreetMap contributors'
  }
);


var peta4 = L.tileLayer(
  'https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png',
  {
    attribution: '&copy; OpenStreetMap &copy; CartoDB'
  }
);


	//var map = L.map('map').setView([-7.032820994622043, 108.88066031163324], 12);

	//var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		//attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	//}).addTo(map);

	const map = L.map('map', {
	center: [-7.038272796982558, 108.88066031163326],
	zoom: 12,
	layers: [peta1]
});

const baseMaps = {
	'Base Maps': peta1,
	'Satelite Maps': peta2,
	'Streets Maps': peta3,
	'Night Maps' : peta4,
};

var layerControl = L.control.layers(baseMaps).addTo(map);


    </script>

	