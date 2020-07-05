<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detail Data Kandidat
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <?php $user = $this->db->get_where('users', ['nis' => $kandidat['nis']])->row_array(); ?>
                            <h5 class="card-title"><?= $kandidat['nis']; ?></h5>
                            <h5 class="card-title"><?= $user['nama']; ?></h5>
                            <p class="card-text"><?= $user['jk']; ?></p>
                            <p class="card-text"><?= $user['tanggal_lahir']; ?></p>
                            <?php $kelas = $this->db->get_where('kelas', ['id_kelas' => $user['id_kelas']])->row_array(); ?>
                            <p class="card-text"><?= $kelas['nama_kelas']; ?></p>
                            <p class="card-text"><?= $kandidat['visi']; ?></p>
                            <p class="card-text"><?= $kandidat['misi']; ?></p>
                            <p class="card-text"><?= $kandidat['periode']; ?></p>
                            <a href="<?= base_url('vote/kandidat'); ?>" class="btn btn-primary">Kembali</a>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <img class="card-img-top" src="<?= base_url('assets/img/vote/') . $kandidat['foto']; ?>" alt="Card image cap">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>