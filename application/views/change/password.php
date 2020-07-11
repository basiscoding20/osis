<div class="container">
    <br>
    <br>
    <br>
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    Form Ubah Sandi
                </div>

                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                <?php if ($this->session->flashdata('flash')) : ?>
                    <!-- <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('flash'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div> -->
                <?php endif; ?>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="password" class="form-control" id="password" placeholder="Masukkan NIS anda" value="<?= $cek['password']; ?>">

                        <div class="form-group">
                            <label for="nis">Sandi Sekarang</label>
                            <input type="password" name="sandi_sekarang" class="form-control" id="sandi_sekarang" placeholder="Masukan sandi sekarang">
                            <small class=" form-text text-danger"><?= form_error('sandi_sekarang'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama">Sandi Baru</label>
                            <input type="password" name="sandi_baru" class="form-control" id="sandi_baru" placeholder="Masukkan sandi baru">
                            <small class=" form-text text-danger"><?= form_error('sandi_baru'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama">Konfirmasi Sandi</label>
                            <input type="password" name="konfirmasi_sandi" class="form-control" id="konfirmasi_sandi" placeholder="Masukkan konfirmasi sandi">
                            <small class=" form-text text-danger"><?= form_error('konfirmasi_sandi'); ?></small>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-right ml-4">Ubah Sandi</button>
                        <a href="<?= base_url('vote/user') ?>" type="submit" name="batal" class="btn btn-primary float-right">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>