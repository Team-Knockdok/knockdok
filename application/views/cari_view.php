<div class="container">
  <h3 style="color:#579ca1; margin-top: 30px; margin-left: 30px;">Pelelusuran</h3>
  <br><br>
  <!-- Search form -->
  <form class="form-inline d-flex justify-content-center md-form form-sm mt-0">
      <button type="submit" class="form-control btn btn-info">Telusuri</button>
      <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Cari nama dokter atau rumah sakit. Contoh: RS Indah" aria-label="Search">
  </form>
  <br><br>

  <!-- Dokter -->
  <div class="col">
    <h2 class="headers">Dokter</h2><br />
    <div class="card-deck" style="margin: 0 40px;">
    <?php foreach ($query["list_dokter"] as $dokter): ?>
      <div class="card col-md-3">
        <div class="card-body">
          <a href="<?= base_url()."dokter/profil/".$dokter["id_dokter"] ?>">
            <center>
              <img class="card-img-top" src="<?= base_url()."uploads/dokter/".$dokter["foto_dokter"] ?>" height="180px" alt="Foto Profil">
              <h5 class="card-title my-4" style="color:#579ca1;"><?= $dokter["nama_dokter"] ?></h5>
            </center>
          </a>
        </div>
        <div class="card-footer">
          <center>
            <button type="submit" class="form-control btn btn-info col-sm-8">
              Pesan
            </button>
          </center>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- Rumah Sakit -->
  <div class="col">
    <h2 class="headers">Rumah Sakit</h2><br />
    <div class="card-deck" style="margin: 0 40px;">
    <?php foreach ($query["list_rs"] as $rs): ?>
      <div class="card col-md-3">
        <div class="card-body">
          <a href="<?= base_url()."rs/profil/".$rs["id_rs"] ?>">
            <center>
              <img class="card-img-top" src="<?= base_url()."uploads/rs/".$rs["foto_rs"] ?>" height="180px" alt="Foto rs">
              <h5 class="card-title my-4" style="color:#579ca1;">RS. <?= $rs["nama_rs"] ?></h5>
            </center>
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
