<section class="section section-normal">
    <div class="container">
        <div class="columns is-mobile">
            <div class="column is-full">
                <a href="<?= base_url() ?>index.php/home/anggaran/tambah" class="button is-info">Tambah Anggaran</a><br/><br/>
                <?php if($this->session->flashdata('alert')!=null){
                  echo "<center>".$this->session->flashdata('alert')."</center>";
                } ?>
                <?php 
                if($anggaran['statusCode'] != 200){
                  echo '<center>'.$anggaran['error'].'</center>';
                }else{
                  foreach($anggaran['data'] as $angg){ ?>
                    <div class="box">
                      <article class="media">
                        <div class="media-content">
                          <div class="content">
                          
                          <button style="float:right" onclick='hapusAnggaran(<?php echo $angg["id_anggaran"] ?>)' class="button is-danger" data-target="modal" aria-haspopup="true"><i class="fa fa-trash"></i></button>
                            <p>
                              <strong><?= $angg['nama_anggaran'] ?></strong>
                              <br>
                              <span class="content is-small"><?= $angg['nama_kategori'].' '.ucfirst(strtolower($angg['tipe'])); ?></span><br/>
                              <span class="content"><strong>Rp. <?= number_format($angg['nominal_anggaran']) ?></strong></span><hr/>
                              <?php 
                                $value = round($angg['prosentase']);
                                // $value = 34;
                                if($value >= 0 && $value < 33){
                                    echo '<progress class="progress is-success" value="'.$value.'" max="100">'.$value.'%</progress>';
                                }else if($value >= 33 && $value < 66){
                                    echo '<progress class="progress is-warning" value="'.$value.'" max="100">'.$value.'%</progress>';
                                }else if($value >= 66){
                                    echo '<progress class="progress is-danger" value="'.$value.'" max="100">'.$value.'%</progress>';
                                }
                              ?>
                                <div class="content is-small">
                                  <span><strong>Pengeluaran : </strong>Rp. <?= number_format($angg['total_pengeluaran']) ?></span><br/>
                                  <span><strong>Sisa Anggaran : </strong>Rp. <?= number_format($angg['sisa_anggaran']) ?></span>
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

<div id="modal_hapus" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card" style="width:auto">
      <header class="modal-card-head">
        <button class="delete" onclick="batal()" aria-label="close"></button>
      </header>
      <section class="modal-card-body">
        Yakin nih anggarannya mau dihapus?
      </section>
      <footer class="modal-card-foot">
        <form method="post" action="<?= base_url() ?>index.php/home/anggaran/hapus">
            <input type="hidden" id="id" name="id_anggaran">
            <button class="button" type="button" onclick="batal()">Gak deh</button>
            <button class="button is-success" type="submit">Yakin</button>

        </form>
      </footer>
    </div>
  </div>

<script>
    function hapusAnggaran(id){
        $(".modal").addClass("is-active");
        $("#id").val(id);
    };
    function batal(){
        $(".modal").removeClass("is-active");
    };
$(document).ready(function(){
  
});
</script>