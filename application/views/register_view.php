<div id="login-row" class="row justify-content-center align-items-center">
    <div id="login-column" class="col-md-6">
        <div id="login-box" class="col-md-12">
            <form id="login-form" class="form" action="<?= site_url() ?>auth/send_register" method="post" enctype="multipart/form-data">
                <h3 class="text-center text-info" id="register">Register</h3>
                <table>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label class="text-info">Nama Depan</label>
                                <br>
                                <input type="text" id="nama" name="nama_depan" class="form-control">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="text-info">Nama Belakang</label>
                                <br>
                                <input type="text" id="nama" name="nama_belakang" class="form-control">
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="form-group">
                    <label class="text-info">Username</label>
                    <br>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label class="text-info">Password</label>
                    <br>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label class="text-info">Confirm Password</label>
                    <br>
                    <input type="password" name="re_password" class="form-control">
                </div>
                <div class="form-group">
                    <label class="text-info">Alamat</label>
                    <br>
                    <input type="text" name="alamat" class="form-control">
                </div>
                <div class="form-group">
                    <label class="text-info">Email</label>
                    <br>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label class="text-info">No. Telepon</label>
                    <br>
                    <input type="text" name="nomor_telepon" class="form-control">
                </div>
                <div class="form-group">
                    <label class="text-info">Foto Profil</label>
                    <br>
                    <input type="file" name="user_image" class="form-control">
                </div>
                <div class="form-group" id="btnsubmit">
                    <br>
                    <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                </div>
            </form>
        </div>
    </div>
</div>