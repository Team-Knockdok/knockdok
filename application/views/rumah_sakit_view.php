<h3 style="color:#579ca1; margin-top: 30px; margin-left: 30px;">Profil Rumah Sakit</h3>
<br><br>
<!-- Search form -->
<form class="form-inline d-flex justify-content-center md-form form-sm mt-0">
	<button type="submit" class="form-control btn btn-info">Cari Lokasi</button>
	<input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Nama Rumah Sakit"
		aria-label="Search">
</form>
<br><br>
<div class="card-deck" style="margin-left: 40px; margin-right: 40px;">
    <?php 
        foreach ($data_rumah_sakit as $data) {
            echo '
                <div class="card col-md-4">
                    <div class="card-body">
                        <center>
                            <h5 class="card-title" style="color:#579ca1;">'.$data->nama_RS.'</h5>
                            <img class="card-img-top"
                                src="https://img.inews.id/media/822/files/inews_new/2019/08/06/06___Hospital.jpg" height="250px"
                                alt="Card image cap">
                            <p class="card-title" style="color:#579ca1; margin-top: 20px;">'.$data->nomor_telepon_RS.'</p>
                            <br>
                            <p class="card-title" style="color:#579ca1;">'.$data->alamat_RS.'</p>
                        </center>
                    </div>
                    <div class="card-footer">
                        <center><button type="submit" class="form-control btn btn-info col-sm-3"> Pesan </button></center>
                    </div>
                </div>
            ';
        }
    ?>
                
</div>
