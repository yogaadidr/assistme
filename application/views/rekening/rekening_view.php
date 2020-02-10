
<section class="section">
    <div class="container">
        <div class="columns is-mobile">
            <div class="column is-full">
                <?php  foreach($rekening['data'] as $rek){ ?>
                    <div class="card" style="margin-bottom: 1.0em;">
                        <div class="card-content">
  
                            <div class="content">
                                <p class="title is-4"><?= $rek['nama_rekening'] ?></p>
                                <p class="subtitle is-6">No Rek : <?= $rek['no_rekening'] ?></p>
                                Saldo <b> Rp.<?= number_format($rek['saldo']) ?></b>
                            </div>
                        </div>
                        <footer class="card-footer">
                            <a href="<?= base_url() ?>index.php/home/rekening/<?= $rek['no_rekening'] ?>" class="card-footer-item">Lihat Transaksi</a>
                          </footer>
                    </div>
                
                <?php } ?>
                

            </div>
        </div>
    </div>
</section>