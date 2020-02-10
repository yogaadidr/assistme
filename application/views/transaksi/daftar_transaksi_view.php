<div class="container">
    <div class="box">
        <div class="field has-addons">
            <p class="control is-expanded">
              <input class="input" id="tanggal" name="tanggal" type="date" value="<?= date('Y-m-d') ?>" placeholder="Amount of money">
            </p>
            <p class="control">
              <a class="button" onclick="getTanggal()">
                Filter
              </a>
            </p>
          </div>
          
    </div>
</div>
<div id="content">

</div>

<script>
$(document).ready(function(){
    getTanggal();
});


function getTanggal(){
    var url = "<?php echo base_url() ?>index.php/home/transaksi/getTransaksiRekening"; 
    var tanggal = $("#tanggal").val();
    var rekening = "<?php echo $rekening['no_rekening'] ?>";
    $.ajax({
        method: "POST",
        url: url,
        data: { tanggal: tanggal, rekening: rekening }
    }).done(function( msg ) {
        $("#content").html(msg);
    });
}


</script>
<!-- <section class="section section-normal">
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
</section> -->