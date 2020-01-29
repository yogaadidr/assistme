<style>
  .hero-dashboard{
    padding-bottom:16px;  
  }
  @media screen and (min-width: 1024px){
    .container-float-button{
      margin-top:-36px;
      margin:auto;
    }
  }
  @media screen and (max-width: 1024px){
    .container-float-button{
      margin-left:1.5rem;
      margin-right:1.5rem;
    }
  }
  .container-float-button{
    margin-top:-36px;
  }
 
  .dasboard-menu-item{
    font-size: 12px;
    text-align: center;
  }
  .card-round{
    border-radius: 4px;
  }
  .dasboard-menu-item-image{
    display: block;
    width:40px;
    margin:auto;
    padding-bottom:2px;
  }
  .text-center{
    text-align: center;
  }
  .card-dashboard{
    padding: 1.2rem;  
  }
  .section-normal{
    padding:1.0rem 1.5rem 1.5rem 1.5rem;
  }
  .rounded-in,.rounded-out,.rounded-trf{
    width:36px;
    height:36px;
    font-size:14px;
    color:white;
    border-radius:100%;
    line-height:36px;
    text-align:center;
  }
  .rounded-in{
    background:#2ecc71;
  }
  .rounded-out{
    background:#e74c3c;
  }
  .rounded-trf{
    background:#3498db;
  }
</style>

<section class="hero is-primary hero-dashboard">
  <div class="hero-body">
    <div class="container">
    <div class="columns is-mobile">
          <div class="column is-two-thirds">
          <h1 class="subtitle">
            Saldo
          </h1>
          <h2 class="title">
            <?= 'Rp. '.number_format($total_saldo) ?>
          </h2>
          </div>
          <div class="column is-one-third">
          <a class="button" href="home/logout" style="float:right;margin-top:24px;">Logout</a>
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
          <div class="column text-center is-one-third">
            <a href="<?= base_url() ?>index.php/home/transaksi/masuk" class="dasboard-menu-item">
              <img class='dasboard-menu-item-image' src="<?= base_url() ?>assets/image/cash_in.png" />
              Pemasukan</a>
          </div>
          <div class="column text-center is-one-third">
            <a href="<?= base_url() ?>index.php/home/transaksi/keluar" class="dasboard-menu-item">
              <img class='dasboard-menu-item-image' src="<?= base_url() ?>assets/image/cash_out.png" />
              Pengeluaran</a>
          </div>
          <div class="column text-center is-one-third">
            <a href="<?= base_url() ?>index.php/home/transaksi/transfer" class="dasboard-menu-item">
              <img class='dasboard-menu-item-image' src="<?= base_url() ?>assets/image/transfer.png" />
              Transfer</a>
          </div>
        </div>
      </div>
     
    </div>
    
  </div>
</section>
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