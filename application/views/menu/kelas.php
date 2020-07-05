<div class="container">
    </br>
    </br>
    <h3 text-align : center>Daftar Kelas SMA PGRI 1 Kota Serang</h3>
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data kelas <strong> berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row mt-3">
        <div class="col-md-6 mt-5 mb-4">
            <a href="<?= base_url('vote/tambahKelas'); ?>" class="btn btn-primary">Tambah Data Kelas</a>
        </div>
    </div>
    <table class="table table-striped w-100 dt-responsive nowrap text-center" id="tb_siswa">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kelas</th>
                <th scope="col">Jumlah Siswa</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($tb_kelas as $kelas) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $kelas['nama_kelas']; ?></td>
                    <?php if ($kelas['id_kelas'] == "1") : ?>
                        <td>
                            <p><?= $jmlSiswaKelas1; ?></p>
                        </td>
                    <?php elseif ($kelas['id_kelas'] == "2") : ?>
                        <td>
                            <p><?= $jmlSiswaKelas2; ?></p>
                        </td>
                    <?php elseif ($kelas['id_kelas'] == "3") : ?>
                        <td>
                            <p><?= $jmlSiswaKelas3; ?></p>
                        </td>
                    <?php else : ?>
                        <td>0</td>
                    <?php endif; ?>
                    <td>
                        <a href="<?= base_url(); ?>vote/hapusKelas/<?= $kelas['id_kelas']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?');">Hapus</a>
                        <a href="<?= base_url(); ?>vote/editKelas/<?= $kelas['id_kelas']; ?>" class="btn btn-dark">Edit</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>