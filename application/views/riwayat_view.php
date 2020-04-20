<h1 class="emerald">Riwayat Pemesanan</h1>

<div class="table-responsive col-md-12 mt-5">
    <table class=" table table-hover" id="dataTable">
        <thead>
            <tr>
                <th class="">No</th>
                <th class="">Nama Dokter</th>
                <th class="">Rumah Sakit</th>
                <th class="">Waktu Transaksi</th>
                <th class="">Total Biaya</th>
                <th class="">Keluhan</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 1;
                foreach ($data_riwayat as $data) {
                    echo '
                        <tr>
                            <td>'.$no.'</td>
                            <td>'.$data["nama_dokter"].'</td>
                            <td>'.$data["nama_rs"].'</td>
                            <td>'.$data["waktu_transaksi"].'</td>
                            <td>'.$data["rincian_biaya"].'</td>
                            <td>
                                <button class="btn btn-info" data-toggle="modal" data-target="#keluhan-modal">
                                    Lihat
                                </button>
                            </td>
                        </tr>
                    ';
                    $no++;
                }
            ?>

        </tbody>
    </table>
    <div class="modal fade" id="keluhan-modal" tabindex="-1" role="dialog" aria-labelledby="keluhan-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="keluhan-modal-example">Keluhan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal-keluhan" class="modal-body">
                content
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
</div>