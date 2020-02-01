
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
                                <hr/>
                                Saldo <b> Rp.<?= number_format($rek['saldo']) ?></b>
                            </div>
                        </div>
                    </div>
                
                <?php } ?>
                

            </div>
        </div>
    </div>
</section>