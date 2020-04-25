<div class="container">
  <img class="col-sm-12 col-lg-12 mx-auto" src="<?= base_url()."uploads/rs/".$rs["foto_rs"] ?>" alt="Foto Rumah Sakit">
  <div class="row">
    <div class="col-sm-12 col-lg-12 pt-sm-5 pt-md-3">
      <div class="emerald display-3 ml-4">RS. <?= $rs["nama_rs"] ?></div>
      <div class="row justify-content-between mt-5" style="min-height: 200px;">
        <div class="col-sm-8">
          <h1 class="emerald ml-4">Alamat</h1>
          <p><?= $rs["alamat_rs"] ?></p>
        </div>
        <div class="col-sm-4">
          <h1 class="emerald ml-4">Kontak</h1>
          <p><?= $rs["nomor_telepon_rs"] ?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="col">
    <h2 class="emerald pt-5">Daftar Dokter</h2><br />
    <div class="card-deck">
    <?php foreach ($list_dokter as $dokter): ?>
      <div class="card col-md-3">
        <div class="card-body">
          <a class="text-center" href="<?= base_url()."dokter/profil/".$dokter["id_dokter"] ?>">
            <img class="card-img-top" src="<?= base_url()."uploads/dokter/".$dokter["foto_dokter"] ?>" height="180px" alt="Profil Dokter">
            <h5 class="card-title my-4 emerald"><?= $dokter["nama_dokter"] ?></h5>
          </a>
        </div>
        <div class="card-footer text-center">
          <a href="<?= base_url() ?>dokter/schedule/<?= $dokter['id_dokter'] ?>" class="form-control btn btn-info col-sm-8">
            Pesan
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>