<div class="container">
    <h1 class="emerald">Riwayat Pemesanan</h1>

    <div class="table-responsive col-md-12 mt-5">
        <table class="table table-hover" id="dataTableRiwayatPemesanan">
            <thead>
                <tr>
                    <th class="">Nama Dokter</th>
                    <th class="">Rumah Sakit</th>
                    <th class="">Waktu Transaksi</th>
                    <th class="">Biaya</th>
                    <th class="">Keluhan</th>
                </tr>
            </thead>
            <tbody>
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
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        $("#dataTableRiwayatPemesanan").DataTable({
    		"searching": false,
    		"ajax": {
    			"url": '<?= base_url() ?>' + 'user/get_data_pemesanan',
    			"type": "GET",
    			"dataSrc": ""
    		},
    		"columns": [{
    				"data": "nama_dokter"
    			},
    			{
    				"data": "nama_rs"
    			},
    			{
    				"data": "tanggal_pemesanan"
    			},
                {
    				"data": "biaya"
    			},
    			{
    				"data": "id_pesanan",
    				render: function (dataField) {
    					var html = '';
                        html += '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#keluhan-modal" onclick="keluhan(' + dataField + ')">Lihat</button>';        
    					return html;
    				}
    			}
    		]
    	});
    });

    function keluhan(id_pesanan) {
        $.getJSON("<?= base_url() ?>user/get_keluhan/"+id_pesanan, (data) => {
            $("#modal-keluhan").text(data.keluhan);
        })
    }
</script>
