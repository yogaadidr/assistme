<section class="section section-normal">
    <div class="container">
        <div class="columns is-mobile">
            <div class="column is-full">
                <a href="<?= base_url() ?>index.php/home/tagihan/tambah" class="button is-info">Tambah Tagihan</a><br/><br/>
                <?php if($this->session->flashdata('alert')!=null){
                  echo "<center>".$this->session->flashdata('alert')."</center>";
                } ?>
                <?php 
                if($tagihan['statusCode'] != 200){
                  echo '<center>'.$tagihan['error'].'</center>';
                }else{
                  foreach($tagihan['data'] as $angg){ ?>
                    <div class="box">
                      <article class="media">
                        <div class="media-content">
                          <div class="content">
                            <p>
                              <strong><?= $angg['nama_tagihan'] ?></strong>
                              <!-- <button style="float:right" onclick='hapusTagihan(<?php echo $angg["id_tagihan"] ?>)' class="button is-danger" data-target="modal" aria-haspopup="true"><i class="fa fa-trash"></i></button> -->
                              <br>
                              <span class="content is-small"><?= $angg['nama_kategori']; ?></span><br/>
                              <span class="content"><strong>Rp. <?= number_format($angg['nominal_tagihan']) ?></strong></span><hr/>
                                <?php if($angg['nominal_tagihan']<=$angg['jumlah']){ ?>
                                    Tagihan sudah dibayar <i class="fa fa-check-circle"></i>
                                <!-- <button onclick='batalTagihan(<?php echo $angg["id_tagihan"] ?>)' class="button is-danger" data-target="modal" aria-haspopup="true">Batal Bayar</button> -->
                            <?php }else{ ?>
                                <a href="<?= base_url() ?>index.php/home/tagihan/bayar?id=<?= $angg['id_tagihan'] ?>"  class="button is-success" data-target="modal" aria-haspopup="true">Bayar Tagihan</a>
                                <!-- <button  onclick='bayarTagihan(<?php echo $angg["id_tagihan"] ?>)' class="button is-success" data-target="modal" aria-haspopup="true">Bayar Tagihan</button> -->
                            <?php } ?>
                            <br/>
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

<div id="modal_batal" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card" style="width:auto">
      <header class="modal-card-head">
        <button class="delete" onclick="batal()" aria-label="close"></button>
      </header>
      <section class="modal-card-body">
        Yakin nih tagihannya mau dibatalin?
      </section>
      <footer class="modal-card-foot">
        <form method="post" action="<?= base_url() ?>index.php/home/tagihan/batal">
            <input type="hidden" id="id_tagihan_batal" name="id_tagihan">
            <button class="button" type="button" onclick="batal()">Gak deh</button>
            <button class="button is-success" type="submit">Yakin</button>

        </form>
      </footer>
    </div>
  </div>

  <div id="modal_bayar" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card" style="width:auto">
      <header class="modal-card-head">
        <button class="delete" onclick="batal()" aria-label="close"></button>
      </header>
      <section class="modal-card-body">
        Yakin nih tagihannya mau dibayar?
      </section>
      <footer class="modal-card-foot">
        <form method="post" action="<?= base_url() ?>index.php/home/tagihan/bayar">
            <input type="hidden" id="id_tagihan" name="id_tagihan">
            <button class="button" type="button" onclick="batal()">Gak deh</button>
            <button class="button is-success" type="submit">Yakin</button>

        </form>
      </footer>
    </div>
  </div>

  <div id="modal_hapus" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card" style="width:auto">
      <header class="modal-card-head">
        <button class="delete" onclick="batal()" aria-label="close"></button>
      </header>
      <section class="modal-card-body">
        Yakin nih tagihannya mau dihapus?
      </section>
      <footer class="modal-card-foot">
        <form method="post" action="<?= base_url() ?>index.php/home/tagihan/hapus">
            <input type="hidden" id="id_tagihan" name="id_tagihan">
            <button class="button" type="button" onclick="batal()">Gak deh</button>
            <button class="button is-success" type="submit">Yakin</button>

        </form>
      </footer>
    </div>
  </div>
<script>
    function hapusTagihan(id){
        $("#modal_hapus").addClass("is-active");
        $("#id").val(id);
    };
    function batal(){
        $("#modal_hapus").removeClass("is-active");
        $("#modal_bayar").removeClass("is-active");
        $("#modal_batal").removeClass("is-active");
    };
    function bayarTagihan(id){
        $("#modal_bayar").addClass("is-active");
        $("#id_tagihan").val(id);
    };
    function batalTagihan(id){
        $("#modal_batal").addClass("is-active");
        $("#id_tagihan_batal").val(id);
    };
$(document).ready(function(){
  
});
</script>