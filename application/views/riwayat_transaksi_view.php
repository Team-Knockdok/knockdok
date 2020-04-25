<div class="container">
    <h1 class="emerald">Riwayat Transaksi</h1>

    <div class="table-responsive col-md-12 mt-5">
        <table class=" table table-hover" id="dataTableRiwayatTransaksi">
            <thead>
                <tr>
                    <th class="">Tanggal Transaksi</th>
                    <th class="">Status Transaksi</th>
                    <th class="">Total Biaya</th>
                    <th class="">Aksi</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <div class="modal fade" id="modalBuktiPembayaran" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bukti Pembayaran Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <img id="bukti_pembayaran" src="" class="rounded mx-auto d-block img-thumbnail" alt="Bukti Pembayaran Belum Ada">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
    	$("#dataTableRiwayatTransaksi").DataTable({
    		"searching": false,
    		"ajax": {
    			"url": '<?= base_url() ?>' + 'user/get_riwayat_transaksi',
    			"type": "GET",
    			"dataSrc": ""
    		},
    		"columns": [{
    				"data": "waktu_transaksi"
    			},
    			{
    				"data": "status_bayar"
    			},
    			{
    				"data": "total_biaya"
    			},
    			{
    				"data": "id_transaksi",
    				render: function (dataField) {
    					var html = '';
                        html += '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalBuktiPembayaran" onclick="buktiPembayaran(' + dataField + ')">Bukti Pembayaran</button>';    
                        html += '<a href="<?= base_url() ?>pembayaran" class="btn btn-info ml-2">Upload Bukti Pembayaran</a>';
    					html += '<a href="<?= base_url() ?>user/riwayat_detail_pemesanan/'+dataField+'" class="btn btn-info ml-2">Detail Transaksi</a>';
    					return html;
    				}
    			}
    		]
    	});

    });
    function buktiPembayaran(id) {
        console.log('<?= base_url() ?>user/get_bukti_pembayaran_by_id'+id)
        $.getJSON('<?= base_url() ?>user/get_bukti_pembayaran_by_id/'+id, (data) => {
            $('#bukti_pembayaran').attr('src', '<?= base_url() ?>uploads/bukti_pembayaran/'+data.bukti_pembayaran);
        })
    }
</script>
