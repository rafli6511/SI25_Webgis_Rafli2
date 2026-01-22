<div class="col-md-12">
    <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
          <div class="card-body">

          <?php
          session();
          $validation = \Config\Services::validation();
          ?>

          <?php if (session()->getFlashdata('errors')) { ?>
              <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
                  <ul>
                      <?php foreach (session()->getFlashdata('errors') as $error) { ?>
                          <li><?= esc($error) ?></li>
                      <?php } ?>
                  </ul>
              </div>
          <?php } ?>

          <?php echo form_open_multipart('Rumah/UpdateData/' . $rumah['id_rumah']) ?>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label>Nama</label>
          <input name="nama" value="<?= old('nama', $rumah['nama']) ?>" class="form-control">
          <p class="text-danger"><?= $validation->getError('nama') ?></p>
        </div>
        <div class="col-md-6 mb-3">
          <label>NIK</label>
          <input name="nik" value="<?= old('nik', $rumah['nik']) ?>" class="form-control">
          <p class="text-danger"><?= $validation->getError('nik') ?></p>
        </div>
      </div>

      <div class="mb-3">
        <label>Mata Pencaharian</label>
        <select name="mata_pencaharian" class="form-control">
          <option value="">--Pilih Jenis Mata Pencaharian--</option>
          <?php
          $mata_pencaharian_options = ['Petani', 'Pedagang', 'PNS/ASN', 'Guru Swasta', 'Wiraswasta', 'Karyawan Swasta', 'Buruh', 'Nelayan'];
          foreach ($mata_pencaharian_options as $option) {
            $selected = old('mata_pencaharian', $rumah['mata_pencaharian']) == $option ? 'selected' : '';
            echo "<option value=\"$option\" $selected>$option</option>";
          }
          ?>
        </select>
        <p class="text-danger"><?= $validation->getError('mata_pencaharian') ?></p>
      </div>


      <div class="row">
        <div class="col-md-4 mb-3">
          <label>Jenis Atap</label>
          <select name="jenis_atap" class="form-control">
            <option value="">--Pilih Jenis Atap--</option>
            <?php
            $jenis_atap_options = ['Genteng', 'Seng', 'Asbes', 'Polycarbonate', 'Metal Roof'];
            foreach ($jenis_atap_options as $option) {
              $selected = old('jenis_atap', $rumah['jenis_atap']) == $option ? 'selected' : '';
              echo "<option value=\"$option\" $selected>$option</option>";
            }
            ?>
          </select>
          <p class="text-danger"><?= $validation->getError('jenis_atap') ?></p>
        </div>
        <div class="col-md-4 mb-3">
          <label>Jenis Dinding</label>
          <select name="jenis_dinding" class="form-control">
            <option value="">--Pilih Jenis Dinding--</option>
            <?php
            $jenis_dinding_options = ['Tembok', 'Kayu', 'GRC', 'Triplek', 'Bata Ringan'];
            foreach ($jenis_dinding_options as $option) {
              $selected = old('jenis_dinding', $rumah['jenis_dinding']) == $option ? 'selected' : '';
              echo "<option value=\"$option\" $selected>$option</option>";
            }
            ?>
          </select>
          <p class="text-danger"><?= $validation->getError('jenis_dinding') ?></p>
        </div>
        <div class="col-md-4 mb-3">
          <label>Jenis Lantai</label>
          <select name="jenis_lantai" class="form-control">
            <option value="">--Pilih Jenis Lantai--</option>
            <?php
            $jenis_lantai_options = ['Keramik', 'Tanah', 'Semen', 'Granit', 'Marmer', 'Parquet', 'Vinyl'];
            foreach ($jenis_lantai_options as $option) {
              $selected = old('jenis_lantai', $rumah['jenis_lantai']) == $option ? 'selected' : '';
              echo "<option value=\"$option\" $selected>$option</option>";
            }
            ?>
          </select>
          <p class="text-danger"><?= $validation->getError('jenis_lantai') ?></p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4 mb-3">
          <label>Ventilasi</label>
          <select name="ventilasi" class="form-control">
            <option value="">--Pilih Kondisi Ventilasi--</option>
            <option value="Baik" <?= old('ventilasi', $rumah['ventilasi']) == 'Baik' ? 'selected' : '' ?>>Baik</option>
            <option value="Buruk" <?= old('ventilasi', $rumah['ventilasi']) == 'Buruk' ? 'selected' : '' ?>>Buruk</option>
          </select>
          <p class="text-danger"><?= $validation->getError('ventilasi') ?></p>
        </div>
        <div class="col-md-4 mb-3">
          <label>Pencahayaan</label>
          <select name="pencahayaan" class="form-control">
            <option value="">--Pilih Kondisi Pencahayaan--</option>
            <option value="Baik" <?= old('pencahayaan', $rumah['pencahayaan']) == 'Baik' ? 'selected' : '' ?>>Baik</option>
            <option value="Buruk" <?= old('pencahayaan', $rumah['pencahayaan']) == 'Buruk' ? 'selected' : '' ?>>Buruk</option>
          </select>
          <p class="text-danger"><?= $validation->getError('pencahayaan') ?></p>
        </div>
        <div class="col-md-4 mb-3">
          <label>Sumber Air Bersih</label>
          <select name="air_bersih" class="form-control">
            <option value="">--Pilih Jenis Sumber Air Bersih--</option>
            <?php
            $air_bersih_options = ['Pipanisasi PDAM', 'Sumur', 'Sungai', 'Mata Air', 'Air Hujan'];
            foreach ($air_bersih_options as $option) {
              $selected = old('air_bersih', $rumah['air_bersih']) == $option ? 'selected' : '';
              echo "<option value=\"$option\" $selected>$option</option>";
            }
            ?>
          </select>
          <p class="text-danger"><?= $validation->getError('air_bersih') ?></p>
        </div>
      </div>

      <div class="col-mb-3">
                  <label>Sanitasi</label>
                  <select name="sanitasi" class="form-control">
                    <option value="">--Pilih Sanitasi--</option>
                    <option value="Baik" <?= old('sanitasi', $rumah['sanitasi']) == 'Baik' ? 'selected' : '' ?>>Baik</option>
                    <option value="Buruk" <?= old('sanitasi', $rumah['sanitasi']) == 'Buruk' ? 'selected' : '' ?>>Buruk</option>
                  </select>
                  <p class="text-danger"><?= $validation->hasError('sanitasi') ? $validation->getError('sanitasi') : '' ?></p>
              </div>

      <div class="row">
        <div class="form-group col-md-6 mb-3">
          <label>Keterangan</label>
          <select name="id_keterangan" class="form-control">
            <option value="">--Pilih Keterangan--</option>
            <?php foreach ($keterangan as $k) { ?>
              <option value="<?= $k['id_keterangan'] ?>" <?= old('id_keterangan', $rumah['id_keterangan']) == $k['id_keterangan'] ? 'selected' : '' ?>>
                <?= $k['keterangan'] ?>
              </option>
            <?php } ?>
          </select>
          <p class="text-danger"><?= $validation->getError('id_keterangan') ?></p>
        </div>
        <div class="col-md-6 mb-3">
          <label>Jenis Bantuan</label>
          <input name="jenis_bantuan" value="<?= old('jenis_bantuan', $rumah['jenis_bantuan']) ?>" class="form-control">
          <p class="text-danger"><?= $validation->getError('jenis_bantuan') ?></p>
        </div>
      </div>

            <div class="form-group">
                <label>Coordinat Rumah</label>
                <div id="map" style="width: 100%; height: 500px;"></div>
                <input name="coordinat" id="Coordinat" value="<?= $rumah['coordinat'] ?>" placeholder="Coordinat Rumah" class="form-control" readonly>
                <p class="text-danger"><?= $validation->hasError('coordinat') ? $validation->getError('coordinat') : '' ?></p>
              </div>

            <div class="row">
              <div class="col-sm-4">
                  <div class="form-group">
                    <label>Provinsi</label>
                    <select name="id_provinsi" id="id_provinsi" class="form-control select2" style="width: 100%;">
                      <option value=""> --Pilih Provinsi-- </option>
                      <?php foreach ($provinsi as $key => $value) { ?>
                        <option value="<?= $value['id_provinsi'] ?>" <?= $value['id_provinsi'] == $rumah['id_provinsi'] ? 'selected' : '' ?>><?= $value['nama_provinsi'] ?></option>
                      <?php } ?>
                    </select>
                  <p class="text-danger"><?= $validation->hasError('id_provinsi') ? $validation->getError('id_provinsi') : '' ?></p>
                </div>
              </div>

              <div class="col-sm-4">
                  <div class="form-group">
                    <label>Kabupaten</label>
                    <select name="id_kabupaten" id="id_kabupaten" class="form-control select2">
                      <option value="<?= $rumah['id_kabupaten'] ?>"><?= $rumah['nama_kabupaten'] ?></option>
                    </select>
                  <p class="text-danger"><?= $validation->hasError('id_kabupaten') ? $validation->getError('id_kabupaten') : '' ?></p>
                </div>
              </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Kecamatan</label>
                    <select name="id_kecamatan" id="id_kecamatan" class="form-control select2">
                      <option value="<?= $rumah['id_kecamatan'] ?>"><?= $rumah['nama_kecamatan'] ?></option>
                    </select>
                  <p class="text-danger"><?= $validation->hasError('id_kecamatan') ? $validation->getError('id_kecamatan') : '' ?></p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-8">
                <div class="form-group">
                  <label>Alamat</label>
                  <input name="alamat" value="<?= $rumah['alamat'] ?>" placeholder="Alamat Rumah" class="form-control">
                  <p class="text-danger"><?= $validation->hasError('alamat') ? $validation->getError('alamat') : '' ?></p>
                </div>
              </div>

              <div class="col-sm-4">
                  <div class="form-group">
                    <label>Wilayah Administrasi</label>
                    <select name="id_wilayah" class="form-control">
                    <option value=""> --Pilih Wilayah Administrasi-- </option>
                      <?php foreach ($wilayah as $key => $value) { ?>
                        <option value="<?= $value['id_wilayah'] ?>"<?= $value['id_wilayah'] == $rumah['id_wilayah'] ? 'selected' : '' ?>><?= $value['nama_wilayah'] ?></option>
                      <?php } ?>
                    </select>
                  <p class="text-danger"><?= $validation->hasError('id_wilayah') ? $validation->getError('id_wilayah') : '' ?></p>
                </div>
              </div>
            </div>

              <div class="form-group">
                  <label>Ganti Foto Rumah</label>
                  <input type="file" accept=".jpg" name="foto" value="<?= old('foto') ?>" class="form-control">
                  <p class="text-danger"><?= $validation->hasError('foto') ? $validation->getError('foto') : '' ?></p>
              </div>

              <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
              <a href="<?= base_url('Rumah')?>" class="btn btn-success btn-flat">Kembali</a>

          <?php echo form_close() ?>

          </div>
    </div>
</div>

<script>
  $(document).ready(function() {
    //Initialize Select2 Elements
    $('.select2').select2();

    $('#id_provinsi').change(function () {
      var id_provinsi = $('#id_provinsi').val();
      $.ajax({
        type: "POST",
        url: "<?= base_url('Rumah/Kabupaten') ?>",
        data: {
          id_provinsi: id_provinsi,
        },
        success: function (response) {
          $('#id_kabupaten').html(response);
        }
      });
    });

    $('#id_kabupaten').change(function () {
      var id_kabupaten = $('#id_kabupaten').val();
      $.ajax({
        type: "POST",
        url: "<?= base_url('Rumah/Kecamatan') ?>",
        data: {
          id_kabupaten: id_kabupaten,
        },
        success: function (response) {
          $('#id_kecamatan').html(response);
        }
      });
    });

  });
</script>

<script>
    var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11'
	});

	var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/satellite-v9'
	});


	var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	});

	var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/dark-v10'
	});


	var map = L.map('map', {
		center: [<?= $rumah['coordinat'] ?>],
		zoom: [<?= $web['zoom_view'] ?>],
		layers: [peta3]
	});

	var baseMaps = {
		'OpenStreetMap': peta1,
		'Satelite': peta2,
		'Streets': peta3,
		'Nigth' : peta4,
	};

	var layerControl = L.control.layers(baseMaps).addTo(map);

  var coordinatInput = document.querySelector("input[name='coordinat']");

  var curLocation = [<?= $rumah['coordinat'] ?>];
  map.attributionControl.setPrefix(false);
  var marker = new L.marker(curLocation, {
    draggable : 'true',
  });

  //mengambil coordinat saat marker di geser
  marker.on('dragend', function(e) {
    var position = marker.getLatLng();
    marker.setLatLng(position, {
      curLocation
    }).bindPopup(position).update();
    $("#Coordinat").val(position.lat + "," + position.lng);
  });

  //mengambil coordinat saat map onclick
  map.on("click", function(e) {
    var lat = e.latlng.lat;
    var lng = e.latlng.lng;
    if (!marker) {
      marker = L.marker(e.latlng).addTo(map);
    }else {
      marker.setLatLng(e.latlng);
    }
    coordinatInput.value = lat + ',' + lng;
  });

  map.addLayer(marker);
</script>
