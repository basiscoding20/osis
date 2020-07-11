<div class="container mt-5">
    </br>
    </br>
    <div class="container text-center">
        <h3>Daftar Siswa SMA PGRI 1 Kota Serang</h3>
    </div>
    </br>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
        <!-- <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data siswa <strong> berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div> -->
    <?php endif; ?>
    <div class="row mt-3">
        <div class="col-md-6 mt-3">
            <a href="<?= base_url('vote/tambahDataSiswaOp'); ?>" class="btn btn-primary btn-icon-split">
                <span class="icon">
                    <i class="fa fa-plus"></i>
                </span>
                <span class="text">
                    Tambah Data Siswa
                </span>
            </a>
        </div>
    </div>
    <table class="table table-striped w-100 dt-responsive nowrap text-center" id="tb_siswa">
        <thead class="">
            <tr class="table-primary">
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
                        <a href="<?= base_url(); ?>vote/hapus/<?= $user['nis']; ?>" class="btn btn-danger tombol-hapus"><i class="fa fa-trash"></i> </a>
                        <a href="<?= base_url(); ?>vote/edit_op/<?= $user['nis']; ?>" class="btn btn-dark"> <i class="fa fa-edit"></i> </a>
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