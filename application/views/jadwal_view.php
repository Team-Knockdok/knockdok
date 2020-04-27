<div class="container">
    <h1 class="emerald">Jadwal Pemeriksaan Dokter <?= $data_dokter['nama_dokter'] ?></h1>

    <div class="table-responsive col-md-12 mt-5">
        <table class=" table table-hover" id="dataTableJadwal">
            <thead>
                <tr>
                    <th class="">Rumah Sakit</th>
                    <th class="">Waktu Mulai</th>
                    <th class="">Estimasi Durasi</th>
                    <th class="">Opsi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <div class="modal fade" id="pesanmodal" tabindex="-1" role="dialog" aria-hidden="true">
        	<div class="modal-dialog modal-lg" role="document">
        		<div class="modal-content">
        			<div class="modal-header">
        				<h5 class="modal-title">Pesan Jadwal Pemeriksaan</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        					<span aria-hidden="true">&times;</span>
        				</button>
        			</div>
        			<div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Nama Dokter : <br><span id="nama_dokter"></span></p>
                                    <p>Asal Rumah Sakit : <br><span id="nama_rs"></span> </p>
                                </div>
                                <div class="col-md-6">
                                    <p>Waktu Jadwal : <br><span id="jadwal"></span></p>
                                    <p>Estimasi Durasi Pemeriksaan : <br><span id="durasi"></span></p>
                                    <p>Biaya Pemeriksaan : <br><span id="biaya"></span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" method="post" id="form_pesan_jadwal">
                                        <div class="form-group">
                                            <label class="text-info" for="keluhan">Keluhan</label><br>
                                            <textarea class="form-control" name="keluhan" style="resize:vertical" rows="4"></textarea>
                                        </div>
        				                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
                                    </form>
                                </div>
                            </div>
                        </div>
        			</div>
        		</div>
        	</div>
        </div>
    </div>
</div>
<script>
    $(document).ready(() => {
        <?php
            echo '
            $("#dataTableJadwal").DataTable({
                "searching" : false,
                "ajax" : {
                    "url" : "'.base_url().'dokter/get_schedule/'.$data_dokter["id_dokter"].'",
                    "type" : "GET",
                    "dataSrc" : ""
                },
                "columns" : [
                    { "data" : "nama_rs" },
                    { "data" : "waktu_mulai" },
                    { "data" : "estimasi_durasi" },
                    {
                        "data" : "id_jadwal",
                        render: function (dataField) {
                            return '.'\'<button type="button" class="btn btn-info" data-toggle="modal" data-target="#pesanmodal" onclick="pesan_jadwal(\'+dataField+\')">Pesan</button>\';
                        }
                    }
                ]
            });
            ';
        ?>

    });
    function pesan_jadwal(id) {
        $.getJSON('<?= base_url() ?>dokter/get_schedule_by_id/'+id, function (data) {
            console.log(data);
            $('#nama_dokter').text(data.nama_dokter)
            $('#nama_rs').text(data.nama_rs)
            $('#jadwal').text(data.waktu_mulai)
            $('#durasi').text(data.estimasi_durasi)
            $('#biaya').text(`Rp ${data.biaya}`)
            $('#form_pesan_jadwal').attr('action', '<?= base_url() ?>dokter/pesan_schedule/'+id);
        })
    }
</script>