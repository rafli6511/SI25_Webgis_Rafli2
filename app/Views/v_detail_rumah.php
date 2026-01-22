<div class="col-sm-6">
    <div id="map" style="width: 100%; height: 500px;"></div>
</div>

<div class="col-sm-6">
    <img src="<?= base_url('foto/' . $rumah['foto']) ?>" width="100%" height="500px">
</div>

<div class="col-sm-12">
    <table class="table table-bordered table-sm">
        <tr>
            <th width="180px">Nama</th>
            <th width="50px" class="text-center">:</th>
            <td><?= $rumah['nama'] ?></td>
        </tr>
                <tr>
                    <th>NIK</th>
                    <th>:</th>
                    <td><?= $rumah['nik'] ?></td>
                </tr>
				<tr>
                    <th>Mata Pencaharian</th>
                    <th>:</th>
                    <td><?= $rumah['mata_pencaharian'] ?></td>
                </tr>
                <tr>
                    <th>Jenis Atap</th>
                    <th>:</th>
                    <td><?= $rumah['jenis_atap'] ?></td>
                </tr>
                <tr>
                    <th>Jenis Dinding</th>
                    <th>:</th>
                    <td><?= $rumah['jenis_dinding'] ?></td>
                </tr>
                <tr>
                    <th>Jenis Lantai</th>
                    <th>:</th>
                    <td><?= $rumah['jenis_lantai'] ?></td>
                </tr>
                <tr>
                    <th>Ventilasi</th>
                    <th>:</th>
                    <td><?= $rumah['ventilasi'] ?></td>
                </tr>
                <tr>
                    <th>Pencahayaan</th>
                    <th>:</th>
                    <td><?= $rumah['pencahayaan'] ?></td>
                </tr>
                <tr>
                    <th>Sumber Air Bersih</th>
                    <th>:</th>
                    <td><?= $rumah['air_bersih'] ?></td>
                </tr>
                <tr>
                    <th>Sanitasi</th>
                    <th>:</th>
                    <td><?= $rumah['sanitasi'] ?></td>
                </tr>
                <tr>
                    <th>Jenis Bantuan</th>
                    <th>:</th>
                    <td><?= $rumah['jenis_bantuan'] ?></td>
                </tr>                        <tr>
                    <th>Keterangan</th>
                    <th>:</th>
                    <td><?= $rumah['keterangan'] ?></td>
                </tr>
        <tr>
            <th>Alamat Rumah</th>
            <th class="text-center">:</th>
            <td><?= $rumah['alamat'] ?>, Prov. <?= $rumah['nama_provinsi'] ?>, Kab. <?= $rumah['nama_kabupaten'] ?>, Kec. <?= $rumah['nama_kecamatan'] ?></td>
        </tr>
    </table>
</div>

<script>
  var peta1 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  });

  var peta2 = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles style by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
  });

  var peta3 = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
      attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
  });

  var peta4 = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
      attribution: '&copy; <a href="https://carto.com/">CartoDB</a>',
      subdomains: 'abcd',
      maxZoom: 19
  });

  var peta5 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
      attribution: 'Tiles &copy; Esri &mdash; Source: Esri, Earthstar Geographics',
      maxZoom: 19
  });

  var peta6 = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
      attribution: '&copy; <a href="https://carto.com/">CartoDB</a>',
      subdomains: 'abcd',
      maxZoom: 19
  });



	var map = L.map('map', {
		center: [<?= $rumah['coordinat'] ?>],
		zoom: [<?= $web['zoom_view'] ?>],
		layers: [peta1]
	});

	var baseMaps = {
      'Streets': peta1,
      'OpenStreetMap.HOT': peta2,
      'OpenTopoMap': peta3,
      'Carto Light': peta4,
      'Esri Satellite': peta5,
      'Carto Dark': peta6
  };

	var layerControl = L.control.layers(baseMaps).addTo(map);

    L.marker([<?= $rumah['coordinat'] ?>]).addTo(map)

</script>
