<style>
  .jumbo-item {
    display: flex;
    flex: 1 0 auto;
    flex-direction: column;
    height: 500px;
    background-color: white;
  }
</style>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="jumbotron jumbotron-fluid jumbo-item">
        <div class="container">
          <h1 class="display-3">Selamat Datang</h1>
          <h1 class="ml-5" style="display:inline">di</h1>
          <h1 class="display-4 ml-4 emerald" style="font-weight:bolder;display:inline">KnockDok</h1>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="jumbotron jumbotron-fluid jumbo-item">
        <div class="container">
          <h1 class="display-3">Ingin pesan Jadwal?</h1>
          <p class="lead">tetapi malas ngantri di rumah sakit?</p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="jumbotron jumbotron-fluid jumbo-item">
        <div class="container">
          <h1 class="display-4">Pesan lewat KnockDok aja!</h1>
          <p class="lead">
            Tentukan jadwal yang diinginkan. Pilih rumah sakit yang anda senangi.
            Lalu <a href="<?= base_url('cari') ?>" class="emerald"><u><b>KLIK</b></u></a>
            Pesan!
          </p>
        </div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>