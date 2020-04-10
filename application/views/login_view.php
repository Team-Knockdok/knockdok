<div id="login-row" class="row justify-content-center align-items-center">
    <div id="login-column" class="col-md-6">
        <div id="login-box" class="col-md-12">
            <form id="login-form" class="form" action="<?php echo base_url() ?>auth/login" method="post">
                <h3 class="text-center text-info">Login</h3>
                <div class="form-group">
                    <label for="username" class="text-info">Username</label>
                    <br>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password" class="text-info">Password</label>
                    <br>
                    <input type="text" name="password" id="password" class="form-control">
                </div>
                <div class="form-group" id="btnsubmit">
                    <br>
                    <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                </div>
                <div id="register-link" class="text-right">
                    <a href="<?= site_url() ?>auth/register" class="text-info">Buat akun disini</a>
                </div>
            </form>
        </div>
    </div>
</div>