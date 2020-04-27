<!DOCTYPE html>
<html>

<head>
    <title>KnockDok</title>
    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/materialDesign/css/mdb.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/materialDesign/css/style.css') ?>"> -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/DataTables/datatables.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/DataTables/DataTables/css/jquery.dataTables.min.css">
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" id="navbar">
        <a class="navbar-brand" href="<?= base_url() ?>home">KnockDoc</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url() ?>home">Beranda<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url()."cari" ?>">Cari Dokter?</a>
                </li>
                <?php
                    if ($this->session->userdata('logged_in')) {
                        echo '
                        <li class="nav-item">
                            <a class="nav-link" href="'.base_url().'pesanan">Pesanan</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#akun" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Akun</a>
                            <div class="dropdown-menu" id="akun" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="'.base_url().'user/">Profil</a>
                                <a class="dropdown-item" href="'.base_url().'user/riwayat_transaksi">Riwayat</a>
                                <a class="dropdown-item" href="'.base_url().'home/bantuan">Bantuan</a>
                                <a class="dropdown-item" href="'.base_url().'auth/logout">Logout</a>
                            </div>
                        </li>
                        ';
                    } else {
                        echo '
                        <li class="nav-item">
                            <a class="nav-link" href="'.base_url().'auth/">Login</a>
                        </li>
                        ';
                    }

                ?>

            </ul>
            <?php if($this->session->userdata('logged_in')): ?>
            <div class="mr-5">Hello, <a href="<?= base_url('user') ?>" style="color: purple">
                <i><?= $this->session->userdata('username') ?></i>
            </a></div>
            <?php endif; ?>
        </div>
    </nav>

    <div class="container-fluid">
        <!-- NOTIFICATION -->
        <br>
        <?php
            $success = $this->session->flashdata('success');
            $failed = $this->session->flashdata('failed');

            if (!empty($failed)) {
                echo '
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <i class="fa fa-times-circle"></i> '.$failed.'
                    </div>
                ';
            }

            if (!empty($success)) {
                echo '
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <i class="fa fa-check-circle"></i> '.$success.'
                    </div>
                ';
            }
        ?>
        <?php $this->load->view($main_view); ?>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="<?= base_url() ?>assets/vendor/DataTables/datatables.js"></script>
    <script type="text/javascript" charset="utf8" src="<?= base_url() ?>assets/vendor/DataTables/DataTables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/vendor/materialDesign/js/mdb.min.js') ?>"></script>
    <script>
    </script>
</body>
</html>
