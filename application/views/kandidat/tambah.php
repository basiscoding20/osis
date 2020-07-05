<br>
<br>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6 offset-2">
            <div class="card">

                <div class="card-header">
                    Form Tambah Data Kandidat
                </div>

                <div class="card-body">
                    <?= form_open_multipart('vote/tambahDataKandidat') ?>
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <!-- <input type="text" name="nis" class="form-control" id="nis" placeholder="Masukkan NIS anda"> -->
                        <select class="form-control" id="nis" name="nis">
                            <?php $data_siswa = $this->db->get('users')->result_array(); ?>
                            <?php foreach ($data_siswa as $data) : ?>
                                <option selected value="<?= $data['nis']; ?>"><?= $data['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <small class="form-text text-danger"><?= form_error('nis'); ?></small>
                    </div>

                    <div class="form-group">

                        <label for="nama">Foto</label>
                        <input type="file" name="foto" size="20" class="form-control" id="foto" placeholder="Upload Foto kandidat">
                        <small class="form-text text-danger"><?= form_error('foto'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="nama">Visi</label>
                        <textarea class="form-control" name="visi" id="visi" cols="30" placeholder="Masukkan visi kandidat" rows="5"></textarea>
                        <small class="form-text text-danger"><?= form_error('visi'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="nama">Misi</label>
                        <textarea class="form-control" name="misi" id="misi" cols="30" placeholder="Masukkan misi kandidat" rows="5"></textarea>
                        <small class="form-text text-danger"><?= form_error('misi'); ?></small>
                    </div>

                    <button type="submit" name="tambah" class="btn btn-primary float-right ml-4">Tambah</button>
                    <a href="<?= base_url('vote/kandidat'); ?>" class="btn btn-primary float-right">Batal</a>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>