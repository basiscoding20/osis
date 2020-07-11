<div class="container">
    </br>
    </br>
    <h3 text-align : center>Daftar Kelas SMA PGRI 1 Kota Serang</h3>
    <div class="flash-data-kelas" data-kelas="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
    <?php endif; ?>
    <div class="row mt-3">
        <div class="col-md-6 mt-5 mb-4">
            <a href="<?= base_url('vote/tambahKelas'); ?>" class="btn btn-primary btn-icon-split">
                <span class="icon">
                    <i class="fa fa-plus"></i>
                </span>
                <span class="text">
                    Tambah Data Kelas
                </span>
            </a>
        </div>
    </div>
    <table class="table table-striped w-100 dt-responsive nowrap text-center mt-4">
        <thead class="">
            <tr class="table-primary">
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
                    <?php $jmlkelas = $this->db->get_where('users', ['id_kelas' => $kelas['id_kelas']])->num_rows(); ?>
                    <td><?= $jmlkelas; ?></td>
                    <td>
                        <a href="<?= base_url(); ?>vote/hapusKelas/<?= $kelas['id_kelas']; ?>" class="btn btn-danger tombol-hapus-kelas"> <i class="fa fa-trash"></i></a>
                        <a href="<?= base_url(); ?>vote/editKelas/<?= $kelas['id_kelas']; ?>" class="btn btn-dark"> <i class="fa fa-edit"></i></a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>