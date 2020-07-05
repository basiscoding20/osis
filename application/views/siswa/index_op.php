<div class="container mt-5">
    </br>
    </br>
    <div class="container text-center">
        <h3>Daftar Siswa SMA PGRI 1 Kota Serang</h3>
    </div>
    </br>

    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data siswa <strong> berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row mt-3">
        <!-- <div class="col-md-6">
            <form action="" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari data siswa" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" value="search">Search</button>

                    </div>
                </div>

            </form>
        </div> -->
        <div class="col-lg-6 mt-3 mb-4">
            <a href="<?= base_url('vote/tambahDataSiswaOp'); ?>" class="btn btn-primary">Tambah Data Siswa</a>
        </div>
    </div>
    <table class="table table-striped w-100 dt-responsive nowrap text-center" id="tb_siswa">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">NIS</th>
                <th scope="col">Nama</th>
                <th scope="col">Tgl Lahir</th>
                <th scope="col">JK</th>
                <th scope="col">Kelas</th>
                <th scope="col">Password</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($tb_users as $user) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $user['nis']; ?></td>
                    <td><?= $user['nama']; ?></td>
                    <td><?= $user['tanggal_lahir']; ?></td>
                    <td><?= $user['jk']; ?></td>
                    <?php $tb_kelas = $this->db->get_where('kelas', ['id_kelas' => $user['id_kelas']])->row_array(); ?>
                    <td><?= $tb_kelas['nama_kelas']; ?></td>
                    <td><?= $user['password']; ?></td>
                    <td>
                        <a href="<?= base_url(); ?>vote/hapus/<?= $user['nis']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?');">Hapus</a>
                        <a href="<?= base_url(); ?>vote/edit_op/<?= $user['nis']; ?>" class="btn btn-dark">Edit</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- <div class="row mt-5">
        <div class="col-md-12">
            <a href="<?= base_url('vote/tambahDataSiswaOp'); ?>" class="btn btn-primary float-right">Tambah Data Siswa</a>
        </div>
    </div> -->
</div>