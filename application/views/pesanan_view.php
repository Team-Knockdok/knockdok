<div class="container">
    <h1 class="emerald">Daftar Pesanan Anda</h1>
    <form action="<?= base_url('pesanan/checkout') ?>" method="post">
    <div class="table-responsive col-md-12 mt-5">
        <table class=" table table-hover" id="dataTable">
            <thead>
                <tr>
                    <th>Cek</th>
                    <th>No</th>
                    <th>Nama Dokter</th>
                    <th>Rumah Sakit</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Biaya</th>
                    <th>Keluhan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  $no = 1;
                  foreach ($daftar_pesanan as $pesanan) {
                    echo '
                      <tr>
                        <td>
                          <input type="checkbox" checked="true" name="check-pesanan[]" value="'.$pesanan["id_pesanan"].'">
                        </td>
                        <td>'.$no.'</td>
                        <td>'.$pesanan["nama_dokter"].'</td>
                        <td>'.$pesanan["nama_rs"].'</td>
                        <td>'.$pesanan["tanggal_pemesanan"].'</td>
                        <td>'.$pesanan["biaya"].'</td>
                        <td>
                          <button class="keluhan btn btn-info px-3"
                            data-id="'.$pesanan["id_pesanan"].'"
                            data-keluhan="'.$pesanan["keluhan"].'"
                            data-toggle="modal"
                            data-target="#exampleModal"
                            onclick="return false"
                          >
                            Ubah
                          </button>
                        </td>
                      </tr>
                    ';
                    $no++;
                  }
                ?>
            </tbody>
        </table>
    </div>

    <div class="row justify-content-center">
      <button id="btn-checkout" type="submit" class="btn btn-info mt-5" style="width:8rem">Checkout</button>
    </div>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Keluhan anda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-keluhan" action="" method="post">
        <div class="modal-body">
          <textarea id="konten" style="width:100%" name="keluhan">...</textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="return false">Tutup</button>
          <button id="modal-submit" type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $('.keluhan').click(function () {
    const obj = $(this);
    const konten = $('#konten');
    konten.val(obj.data('keluhan'));
    konten.focus();
    $('#form-keluhan').attr(
      'action',
      `<?= base_url('pesanan/update') ?>/${obj.data('id')}`
    );
  })
</script>