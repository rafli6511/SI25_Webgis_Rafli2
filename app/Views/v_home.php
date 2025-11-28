<div id="map" style="width: 100%; height: 750px;"></div>

<script>
	const map = L.map('map').setView([-6.998745599142188, 108.9245890950897], 11);

	const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);
    </script>