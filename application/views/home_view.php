

<section class="hero is-primary hero-dashboard">
  <div class="hero-body">
    <div class="container">
    <div class="columns is-mobile">
          <div class="column is-two-thirds">
          <h1 class="subtitle">
            Halo
          </h1>
          <h2 class="title">
            Yoga Adi
          </h2>
          </div>
          <div class="column is-one-third">
          <a class="button" href="home/logout" style="float:right;margin-top:24px;">Logout</a>
          </div>
    </div>
    
    </div>
  </div>
</section>

<section class="section section-normal">
    <div class="container">
    Menu<br/><br/>
        <div class="columns is-mobile">
            <div class="column is-half">
              <a href="<?= base_url("index.php/home/transaksi/masuk") ?>">
                <div class="card card-round">
                  <div class="card-content">
                  <img class='dasboard-menu-item-image' src="<?= base_url() ?>assets/image/cash_in.png" />

                    <p>
                      <center>Pemasukan</center>
                    </p>
                  </div>
                </div>
              </a>
            </div>
            <div class="column is-half">
              <a href="<?= base_url("index.php/home/transaksi/keluar") ?>">
                <div class="card card-round">
                  <div class="card-content">
                  <img class='dasboard-menu-item-image' src="<?= base_url() ?>assets/image/cash_out.png" />
                    <p>
                      <center>Pengeluaran</center>
                    </p>
                  </div>
                </div>
              </a>
            </div>
        </div>
        <div class="columns is-mobile">
            <div class="column is-half">
              <a href="<?= base_url("index.php/home/transaksi/transfer") ?>">
                <div class="card card-round">
                  <div class="card-content">
                  <img class='dasboard-menu-item-image' src="<?= base_url() ?>assets/image/transfer.png" />

                    <p>
                      <center>Transfer</center>
                    </p>
                  </div>
                </div>
              </a>
            </div>
            <div class="column is-half">
              <a href="<?= base_url("index.php/home/user/dashboard") ?>">
                <div class="card card-round">
                  <div class="card-content">
                  <img class='dasboard-menu-item-image' src="<?= base_url() ?>assets/image/report.png" />
                    <p>
                      <center>Laporan Keuangan</center>
                    </p>
                  </div>
                </div>
              </a>
            </div>
        </div>
        
        <div class="columns is-mobile">
            <div class="column is-half">
              <a href="<?= base_url("index.php/home/rekening") ?>">
                <div class="card card-round">
                  <div class="card-content">
                  <img class='dasboard-menu-item-image' src="<?= base_url() ?>assets/image/card.png" />

                    <p>
                      <center>Daftar Rekening</center>
                    </p>
                  </div>
                </div>
              </a>
            </div>
            <div class="column is-half">
              <a href="<?= base_url("index.php/home/anggaran") ?>">
                <div class="card card-round">
                  <div class="card-content">
                  <img class='dasboard-menu-item-image' src="<?= base_url() ?>assets/image/budget.png" />
                    <p>
                      <center>Daftar Anggaran</center>
                    </p>
                  </div>
                </div>
              </a>
            </div>
            
        </div>

        <div class="columns is-mobile">
          <div class="column is-half">
            <a href="<?= base_url("index.php/home/tagihan") ?>">
              <div class="card card-round">
                <div class="card-content">
                <img class='dasboard-menu-item-image' src="<?= base_url() ?>assets/image/card.png" />

                  <p>
                    <center>Daftar Tagihan</center>
                  </p>
                </div>
              </div>
            </a>
          </div>
         
      </div>
        
</section>
