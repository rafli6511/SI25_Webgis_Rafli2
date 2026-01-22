<!-- Small boxes (Stat box) -->
<div class="col-lg-6 col-6">
  <div class="small-box bg-purple">
    <div class="inner">
      <h3><?= $jmlrumah ?></h3>
      <p>Rumah</p>
    </div>
    <div class="icon">
      <i class="fas fa-school"></i>
    </div>
    <a href="<?= base_url('Rumah') ?>" class="small-box-footer">
      More info <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>
</div>

<div class="col-lg-6 col-6">
  <div class="small-box bg-indigo">
    <div class="inner">
      <h3><?= $jmlwilayah ?></h3>
      <p>Wilayah</p>
    </div>
    <div class="icon">
      <i class="fas fa-layer-group"></i>
    </div>
    <a href="<?= base_url('Wilayah') ?>" class="small-box-footer">
      More info <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>
</div>

<?php
$db = \Config\Database::connect();
foreach ($keterangan as $key => $value) {
  $jml = $db->table('tbl_rumah')->where('id_keterangan', $value['id_keterangan'])->countAllResults();
  ?>
<!-- ./col -->
<div class="col-lg-6 col-6">
  <!-- small box -->
  <div class="small-box <?php if ($value['id_keterangan'] == 1) {
                                echo 'bg-primary';
                          } elseif ($value['id_keterangan'] == 2) {
                                echo 'bg-danger';
                          // } elseif ($value['id_keterangan'] == 3) {
                          //       echo 'bg-warning';
                          // } elseif ($value['id_keterangan'] == 4) {
                          //       echo 'bg-danger';
                        } ?>">
    <div class="inner">
      <h3><?= $jml ?></h3>
      <p><?= $value['keterangan'] ?></p>
    </div>
    <div class="icon">
      <i class="fas fa-school"></i>
    </div>
    <a href="#" class="small-box-footer">
      More info <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>
</div>

<?php } ?>