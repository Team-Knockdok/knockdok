<h3 style="color:#579ca1; margin-top: 30px; margin-left: 30px;">Profil Dokter</h3>
<br><br>
<!-- Search form -->
<form class="form-inline d-flex justify-content-center md-form form-sm mt-0">
    <button type="submit" class="form-control btn btn-info">Cari Lokasi</button>
    <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Nama Rumah Sakit" aria-label="Search">
</form>
<br><br>

<div class="card-deck" style="margin-left: 40px; margin-right: 40px;">
<!-- Card -->
<?php foreach ($list_dokter as $dokter): ?>
  <div class="card col-md-4">
        <div class="card-body">
            <center>
                <h5 class="card-title" style="color:#579ca1;"><?= $dokter["nama_dokter"] ?></h5>
                <img class="card-img-top" src="https://image.freepik.com/free-vector/doctor-character-background_1270-84.jpg" height="250px" alt="Card image cap">
                <br>
                <p class="card-title" style="color:#579ca1;margin-top: 20px;">
                    <?= $dokter['spesialis'] ?>
                </p>
                <p class="card-title" style="color:#579ca1;">
                    <?= $dokter['nomor_telepon'] ?>
                </p>
                <p class="card-title" style="color:#579ca1;">
                    <?= $dokter['alamat_dokter'] ?>
                </p>
                <p class="card-title" style="color:#579ca1;">
                    <?= $dokter['email'] ?>
                </p>
            </center>
        </div>
        <div class="card-footer">
            <center>
                <button type="submit" class="form-control btn btn-info col-sm-3">
                    Pesan
                </button>
            </center>
        </div>
    </div>
<?php endforeach; ?>
</div>