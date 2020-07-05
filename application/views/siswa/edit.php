<div class="container">
    <br>
    <br>
    <br>
    <div class="row mt-3">
        <div class="col-md-6 offset-2">
            <div class="card">
                <div class="card-header">
                    Form Edit Data Siswa
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $siswa['nis']; ?>">
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="hidden" name="nis" class="form-control" id="nis" placeholder="Masukkan NIS anda" value="<?= $siswa['nis']; ?>">
                            <input disabled type="text" name="nis_disabled" class="form-control" id="nis_disabled" placeholder="Masukkan NIS anda" value="<?= $siswa['nis']; ?>">
                            <small class=" form-text text-danger"><?= form_error('nis'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama" value="<?= $siswa['nama']; ?>">
                            <small class=" form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama">Tanggal Lahir</label>
                            <input type="date" name="tgl" class="form-control" id="tgl" placeholder="tanggal lahir" value="<?= $siswa['tanggal_lahir']; ?>">
                            <small class="form-text text-danger"><?= form_error('tgl'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select class="form-control" id="jk" name="jk">
                                <? if ($siswa['jk'] == 'Laki-laki') : ?>
                                <option selected>Laki-laki</option>
                                <option>Perempuan</option>
                                <? elseif($siswa['jk'] == 'Perempuan') : ?>
                                <option>Laki-laki</option>
                                <option selected>Perempuan</option>
                                <? endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_kelas">Kelas</label>
                            <select class="form-control" id="id_kelas" name="id_kelas">
                                <?php foreach ($kelas as $k) : ?>
                                    <?php if ($siswa['id_kelas'] == $k['id_kelas']) : ?>
                                        <option selected value="<?= $k['id_kelas']; ?>"><?= $k['nama_kelas']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $k['id_kelas']; ?>"><?= $k['nama_kelas']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" name="edit" class="btn btn-primary float-right ml-4">Simpan</button>
                        <a href="<?= base_url('vote/siswa'); ?>" class="btn btn-primary float-right">Batal</a>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>