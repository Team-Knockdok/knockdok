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
                          <input type="checkbox" name="check-pesanan[]" value="'.$pesanan["id_pesanan"].'">
                        </td>
                        <td>'.$no.'</td>
                        <td>'.$pesanan["nama_dokter"].'</td>
                        <td>'.$pesanan["nama_rs"].'</td>
                        <td>'.$pesanan["tanggal_pemesanan"].'</td>
                        <td>'.$pesanan["keluhan"].'</td>
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

<!-- <script>
  $("#btn-checkout").click(() => {
    const arrIdPesanan = [];
    $('.pesanan').each((i, obj) => {
      arrIdPesanan.push($(obj).attr('data-id'));
    });
    $.post("<?= base_url('pesanan/checkout') ?>",
      arrIdPesanan,
      (data, status) => {
        alert("Data: " + data + "\nStatus: " + status);
      }
    )
  })
</script> -->
