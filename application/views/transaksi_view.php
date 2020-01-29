<style>
.input-select, .input-select select{
    width:100%;
}
.bottom-button{
    float: bottom;
    position: absolute;
}
</style>
<section class="section">
    <div class="container">
        <form action="<?= base_url() ?>index.php/home/transaksi/tambah" method="POST">
        <div class="field">
            <label class="label">Nominal</label>
            <div class="control">
            <input class="input" name="nominal" type="number" required placeholder="Rp. 0">
            </div>
        </div>
        <?php if($jenis == 'keluar' || $jenis == 'transfer'){ ?>
        <div class="field">
            <label class="label">Dari Rekening</label>
            <div class="field">
                <p class="control has-icons-left">
                  <span class="select input-select">
                    <select name="rekening_asal">
                        <?php foreach($rekening['data'] as $rekening_masuk){
                            echo '<option value="'.$rekening_masuk['no_rekening'].'">'.$rekening_masuk['nama_rekening'].'</option>';
                        } ?>
                    </select>
                  </span>
                  <span class="icon is-small is-left">
                    <i class="fas fa-globe"></i>
                  </span>
                </p>
              </div>
        </div>
        <?php } ?>
        <?php if($jenis == 'masuk' || $jenis == 'transfer'){ ?>
        <div class="field">
            <label class="label">Ke Rekening</label>
            <div class="field">
                <p class="control has-icons-left">
                  <span class="select input-select">
                    <select name="rekening_tujuan">
                        <?php foreach($rekening['data'] as $rekening_keluar){
                            echo '<option value="'.$rekening_keluar['no_rekening'].'">'.$rekening_keluar['nama_rekening'].'</option>';
                        } ?>
                    </select>
                  </span>
                  <span class="icon is-small is-left">
                    <i class="fas fa-globe"></i>
                  </span>
                </p>
              </div>
        </div>
        <?php } ?>

        <div class="field">
            <label class="label">Tanggal</label>
            <div class="control">
            <input class="input" name="tanggal_transaksi" required type="datetime-local" placeholder="e.g. alexsmith@gmail.com">
            </div>
        </div>
        <div class="field">
            <label class="label">Kategori</label>
            <div class="field">
                <p class="control has-icons-left">
                  <span class="select input-select">
                    <select name="kategori">
                        <?php foreach($kategori['data'] as $kategori){
                            echo '<option value="'.$kategori['id_kategori'].'">'.$kategori['nama_kategori'].'</option>';
                        } ?>
                    </select>
                  </span>
                  <span class="icon is-small is-left">
                    <i class="fas fa-globe"></i>
                  </span>
                </p>
              </div>
        </div>
        <div class="field">
            <label class="label">Keterangan</label>
            <div class="control">
            <textarea class="input" name="keterangan" placeholder="Keterangan"></textarea>
            </div>
        </div>

        <div class="field"><input class="button is-info" type="submit" value="Simpan"></div>
    </form>
    </div>
</section>