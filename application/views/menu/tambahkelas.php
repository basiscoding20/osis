<br>
<br>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6 offset-2">
            <div class="card">
                <div class="card-header">
                    Form Tambah Data Kelas
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mt-3">
                            <label for="nama_kelas">Nama Kelas</label>
                            <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" placeholder="Masukkan nama kelas">
                            <small class="form-text text-danger"><?= form_error('nama_kelas'); ?></small>
                        </div>
                        </br>
                        <button type="submit" name="tambahKelas" class="btn btn-primary float-right ml-4">Tambah</button>
                        <a href="<?= base_url('vote/kelas'); ?>" class="btn btn-primary float-right">Batal</a>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>