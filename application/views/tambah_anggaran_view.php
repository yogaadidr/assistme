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
        <form action="<?= base_url() ?>index.php/home/proses_tambah_anggaran" method="POST">

        <div class="field">
            <label class="label">Nama Anggaran</label>
            <div class="control">
            <input class="input" name="nama_anggaran" type="text" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Nominal</label>
            <div class="control">
            <input class="input" name="nominal_anggaran" type="number" required placeholder="Rp. 0">
            </div>
        </div>

        <div class="field">
            <label class="label">Tipe</label>
            <div class="field">
                <p class="control has-icons-left">
                  <span class="select input-select">
                    <select name="tipe">
                        <option value="HARIAN">Harian</option>
                        <option value="BULANAN">Bulanan</option>
                    </select>
                  </span>
                  <span class="icon is-small is-left">
                    <i class="fas fa-globe"></i>
                  </span>
                </p>
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
        <div class="field"><input class="button is-info" type="submit" value="Simpan"></div>
    </form>
    </div>
</section>