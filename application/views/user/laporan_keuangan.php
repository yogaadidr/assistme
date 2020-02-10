

<section class="hero is-primary hero-dashboard">
  <div class="hero-body">
    <div class="container">
    <div class="columns is-mobile">
          <div class="column is-two-thirds">
          <h1 class="subtitle">
            Saldo <?= $tanggal['month_name'] ?>
          </h1>
          <h2 class="title">
            <?= 'Rp. '.number_format($total_saldo) ?>
          </h2>
          </div>
         
    </div>
    
    </div>
  </div>
</section>
<section class="container container-float-button">
  <div class="card card-round">
    <div class="card-content card-dashboard">
      <div class="container">
        <div class="columns is-mobile">
          <div class="column text-center is-half">
            Total Pengeluaran<br/>
            <strong>Rp. <?= number_format($rekap['pengeluaran']) ?></strong>
          </div>
          <div class="column text-center is-half">
            Total Pemasukan<br/>
            <strong>Rp. <?= number_format($rekap['pemasukan']) ?></strong>

          </div>
        </div>
      </div>
     
    </div>
    
  </div>
</section>
<!-- 
<section class="section section-normal">
    <div class="container">
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
    </div>
</section> -->

<section class="section section-normal">
    <div class="container">
        <div class="columns is-mobile">
            <div class="column is-full">
                <?php if($this->session->flashdata('alert')!=null){
                  echo "<center>".$this->session->flashdata('alert')."</center>";
                } ?>
                <span>Transaksi Hari ini</span><br/><br/>
                <?php 
                if($transaksi['statusCode'] != 200){
                  echo '<center>'.$transaksi['error'].'</center>';
                }else{
                  foreach($transaksi['data'] as $trans){ ?>
                    <div class="box">
                      <article class="media">
                        <div class="media-left">
                          <?php  
                          if($trans['rekening_asal'] != '99' && $trans['rekening_tujuan'] != '99'){
                            echo "<div class='rounded-trf'>TRF</div>";
                          }else if($trans['rekening_asal'] == '99'){
                            echo "<div class='rounded-in'>IN</div>";
                          }else if($trans['rekening_tujuan'] == '99'){
                            echo "<div class='rounded-out'>OUT</div>";
                          }
                          ?>
                        </div>
                        <div class="media-content">
                          <div class="content">
                            <p>
                              <strong>Rp. <?= number_format($trans['nominal']) ?></strong>
                              <br>
                              <span class="content is-small"><?= date('d-M-Y h:i',strtotime($trans['tanggal_transaksi'])) ?></span><br/>
                              <span class="content"><?php
                                echo '<strong>';
                                if($trans['rekening_asal'] != '99' && $trans['rekening_tujuan'] != '99'){
                                  echo $trans['nama_rekening_asal'].' > '.$trans['nama_rekening_tujuan'];
                                }else if($trans['rekening_asal'] == '99'){
                                  echo 'Rek. '.$trans['nama_rekening_tujuan'];
                                }else if($trans['rekening_tujuan'] == '99'){
                                  echo 'Rek. '.$trans['nama_rekening_asal'];
                                }
                                echo '</strong>';

                                echo ' | '.$trans['nama_kategori'];
                                ?></span><br/><hr/>
                                <div class="content is-small">
                                  <span><strong>Keterangan : </strong><?= $trans['keterangan'] ?></span>
                                </div>
                            </p>
                          </div>
                          
                        </div>
                      </article>
                    </div>
                <?php  }
                }
                 ?>
            </div>
        </div>
    </div>
</section>