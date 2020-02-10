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
        <form action="<?= base_url() ?>index.php/home/tagihan/proses_tambah_tagihan" method="POST">

        <div class="field">
            <label class="label">Nama Tagihan</label>
            <div class="control">
            <input class="input" name="nama_tagihan" type="text" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Nominal Tagihan</label>
            <div class="control">
            <input class="input" name="nominal_tagihan" type="number" required placeholder="Rp. 0">
            </div>
        </div>
    
        <div class="field">
            <label class="label">Kategori</label>
            <div class="field">
                <p class="control has-icons-left">
                  <span class="select input-select">
                    <select name="kategori">
                        <option value="6">Bayar Sewa</option>
                        <option value="7">Tagihan</option>
                        <option value="8">Tagihan Listrik</option>
                        <option value="9">Tagihan Air</option>
                        <option value="10">Tagihan Internet</option>
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