<h3 style="color:#579ca1; padding-top:30px; padding-left: 30px; padding-bottom: 30px; display: block; background-color #579ca1; margin:0;">
    Profil Pengguna
</h3>
<div style="background-color: #579ca1; padding: 100px 0px; height : 80vh" class="row">
    <br>
    <div class="col-md-4">
        <img src="https://rlv.zcache.com/lightning_cat_kitty_pet_feline_pet_cat_kittens_classic_round_sticker-r57a985b93dda4cda895978c5da4396a1_0ugmp_8byvr_540.jpg"
            class="rounded-circle mx-auto d-block" style="width: 300px ; max-height: auto; background-color: powderblue ">
        <h2 class="profile-username">username</h2>
    </div>
    <div class="col-md-7">
        <div class=" form-row ">
            <div class="form-group col-md-6">
                <label for="nama_depan" style="color:white">Nama Depan</label>
                <input type="text" class=" form-control " id=" nama_depan " placeholder="Depan" readonly>
            </div>
            <div class=" form-group col-md-6 ">
                <label for="nama_belakang" style="color:white">Nama Belakang</label>
                <input type="text" class=" form-control " id=" nama_belakang " placeholder="Belakang" readonly>
            </div>
        </div>
        <div class=" form-group ">
            <label for="alamat" style="color:white">Alamat</label>
            <textarea class="form-control" id="alamat" cols="4" style="resize:vertical" readonly></textarea>
        </div>
        <div class=" form-group ">
            <label for="email" style="color:white">Email</label>
            <input type="email" class=" form-control " id=" email " placeholder="Email" readonly>
        </div>
        <div class=" form-row">
            <div class="form-group col-md-6">
                <label for="telp" style="color:white">Nomor Telpon</label>
                <input type="number" class=" form-control " id=" telp " placeholder="No. Telp" readonly>
            </div>
        </div>
        <div class=" form-row ">
            <div class=" form-group col-md-6 ">
                <label for="password" style="color:white">Password</label>
                <input type="password" class=" form-control " id=" password " placeholder="Password" readonly>
            </div>
            <div class="col-md-6">
                <button type="button" class="btn btn-primary" style="margin-left : 20px;align-self: center;" data-toggle="modal" data-target="#editProfil">
                    Edit Profil
                </button>
                <button type="button" class=" btn btn-primary " style="margin-left : 20px;align-self: center;"  data-toggle="modal" data-target="#editFotoProfil">
                    Edit Foto Profil
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editProfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Ubah Data Profil</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="nama_depan">Nama Depan</label>
							<input type="text" class="form-control" id="nama_depan" class="nama_depan" placeholder="Nama Depan">
						</div>
						<div class=" form-group col-md-6 ">
							<label for="nama_belakang">Nama Belakang</label>
							<input type="text" class="form-control" id="nama_belakang" class="nama_belakang" placeholder="Nama Belakang">
						</div>
					</div>
					<div class=" form-group ">
						<label for="alamat">Alamat</label>
						<textarea class="form-control" id="alamat" class="alamat" cols="4" style="resize:vertical"
							placeholder="alamat"></textarea>
					</div>
					<div class=" form-group ">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" class="email" placeholder="Email">
					</div>
					<div class=" form-row">
						<div class="form-group col-md-6">
							<label for="telp">Nomor Telpon</label>
							<input type="number" class=" form-control " id="telp" name="nomor_telepon" placeholder="No. Telp">
						</div>
						<div class=" form-group col-md-6 ">
							<label for="password">Password</label>
							<input type="password" class=" form-control " id="password" name="password" placeholder="Password">
						</div>
					</div>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="editFotoProfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-xs modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Ubah Foto Profil</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="" enctype="multipart/formdata">
					<div class="form-group">
						<input type="file" name="foto_profil">
					</div>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="Submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>