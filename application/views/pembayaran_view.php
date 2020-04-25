<div class="container">
  <h1 class="emerald">Pembayaran</h1>
  <div class="col justify-content-center text-center my-5 py-5">
    <h3 class="emerald">Kode Billing</h3>
    <h3 class="emerald">4094-0131-3424</h3>
  </div>

  <div class="col-sm-12 col-md-8 col-lg-6 mt-5 mx-auto">
    <h4 class="row emerald ml-2">Bukti Pembayaran</h4>
    <form action="pembayaran/upload_bukti" enctype="multipart/form-data" method="post">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
        </div>
        <div class="custom-file">
          <input type="file" name="bukti-pembayaran" class="custom-file-input" id="inputGroupFile01"
            aria-describedby="inputGroupFileAddon01">
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
      </div>
      <div class="row justify-content-center mt-5">
        <button type="submit" class="btn btn-info px-5 py-2">Kirim</button>
      </div>
    </form>
  </div>
</div>