<h3 style="color:#579ca1; margin-top: 30px; margin-left: 30px;">Profil Dokter</h3>

<div class="container">
  <div class="row">
    <img class="col-sm-12 col-md-5 col-lg-3" src="<?= base_url()."uploads/dokter/".$dokter["foto_dokter"] ?>" alt="Profil Dokter">
    <div class="col-sm-12 col-md-7 pt-sm-5 pt-md-3">
      <table class="table table-borderless">
        <tbody>
          <tr>
            <td><span class="emerald pr-4">Nama</span></td>
            <td><?= $dokter["nama_dokter"] ?></td>
          </tr>
          <tr>
            <td><span class="emerald pr-4">Spesialis</span></td>
            <td><?= $dokter["spesialis"] ?></td>
          </tr>
          <tr>
            <td><span class="emerald pr-4">No. Telp.</span></td>
            <td><?= $dokter["nomor_telepon"] ?></td>
          </tr>
          <tr>
            <td><span class="emerald pr-4">Alamat</span></td>
            <td><?= $dokter["alamat_dokter"] ?></td>
          </tr>
          <tr class="text-center">
            <td colspan="2"><button class="btn btn-info">Pesan Jadwal</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col">
    <h2 class="emerald pt-5">Tempat Praktek</h2><br />
    <div class="card-deck">
    <?php foreach ($list_rs as $rs): ?>
      <div class="card col-md-3">
        <div class="card-body">
          <a href="<?= base_url()."rs/profil/".$rs["id_rs"] ?>">
            <center>
              <img class="card-img-top" src="<?= base_url()."uploads/rs/".$rs["foto_rs"] ?>" height="180px" alt="Foto rs">
              <h5 class="card-title my-4 emerald">RS. <?= $rs["nama_rs"] ?></h5>
            </center>
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>