<h1 class="header">Riwayat User</h1>

<div class="table-responsive col-md-12">
    <table class=" table table-hover" id="dataTable">
        <thead>
            <tr>
                <th class="">No</th>
                <th class="">Nama Dokter</th>
                <th class="">Rumah Sakit</th>
                <th class="">Waktu Transaksi</th>
                <th class="">Total Biaya</th>
                <th class="">Lihat Keluhan</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1;
                foreach ($data_riwayat as $data) {
                    echo '
                        <tr>
                            <td>'.$no++.'</td>
                            <td>'.$data->nama_dokter.'</td>
                            <td>'.$data->nama_RS.'</td>
                            <td>'.$data->waktu_transaksi.'</td>
                            <td>'.$data->rincian_biaya.'</td>
                            <td>lalala</td>
                        </tr>        
                    ';
                }
            ?>
            
        </tbody>
    </table>
</div>