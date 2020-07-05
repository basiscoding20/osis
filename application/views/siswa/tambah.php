<br>
<br>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6 offset-2">
            <div class="card">
                <div class="card-header">
                    Form Tambah Data Siswa
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="">
                            <label for="nis">NIS</label>
                            <input maxlength="10" type="text" name="nis" class="form-control" id="nis" placeholder="Masukkan NIS anda">
                            <small class="form-text text-danger"><?= form_error('nis'); ?></small>
                        </div>
                        <div class="mt-3">
                            <label for="nama">Password</label>
                            <input value="<?= $generate; ?>" type="text" name="pass" class="form-control" id="pass" placeholder="Masukkan password">
                            <small class="form-text text-danger"><?= form_error('pass'); ?></small>
                        </div>
                        <div class="mt-3">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="mt-3">
                            <label for="nama">Tanggal Lahir</label>
                            <input type="date" name="tgl" class="form-control" id="tgl" placeholder="tanggal lahir">
                            <small class="form-text text-danger"><?= form_error('tgl'); ?></small>
                        </div>

                        <div class="mt-3">
                            <label for="jk">Jenis Kelamin</label>
                            <select class="form-control" id="jk" name="jk">
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="id_kelas">Kelas</label>
                            <select class="form-control" id="id_kelas" name="id_kelas">
                                <?php foreach ($kelas as $k) : ?>
                                    <option value="<?= $k['id_kelas']; ?>"><?= $k['nama_kelas']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        </br>
                        <button type="submit" name="tambah" class="btn btn-primary float-right ml-4">Tambah</button>
                        <a href="<?= base_url('vote/siswa'); ?>" class="btn btn-primary float-right">Batal</a>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>