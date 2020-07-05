<div class="container">
    <br>
    <br>
    <br>
    <div class="row mt-3">
        <div class="col-md-6 offset-2">
            <div class="card">
                <div class="card-header">
                    Form Edit Data Kelas
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id_kelas" value="<?= $kelas['id_kelas']; ?>">
                        <div class="form-group">
                            <label for="id_kelas">Id_Kelas</label>
                            <input type="hidden" name="id_kelas" class="form-control" id="id_kelas" value="<?= $kelas['id_kelas']; ?>">
                            <input disabled type="text" name="id_kelas_disabled" class="form-control" id="nis_disabled" placeholder="Masukkan NIS anda" value="<?= $kelas['id_kelas']; ?>">
                            <small class=" form-text text-danger"><?= form_error('nis'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama_kelas">Nama Kelas</label>
                            <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" placeholder="Masukkan nama kelas" value="<?= $kelas['nama_kelas']; ?>">
                            <small class=" form-text text-danger"><?= form_error('nama_kelas'); ?></small>
                        </div>
                        <button type="submit" name="edit" class="btn btn-primary float-right ml-4">Simpan</button>
                        <a href="<?= base_url('vote/kelas'); ?>" class="btn btn-primary float-right">Batal</a>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>