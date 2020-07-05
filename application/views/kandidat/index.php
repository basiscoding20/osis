<div class="container">
    </br>
    </br>
    <h3 text-align : center>Daftar Kandidat SMA PGRI 1 Kota Serang</h3>
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Kandidat <strong> berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row mt-5">
        <div class="col-md-6">
            <a href="<?= base_url('vote/tambahDataKandidat'); ?>" class="btn btn-primary">Tambah Data Kandidat</a>
        </div>
    </div>
    </br>
    <table class="table table-striped w-100 dt-responsive nowrap text-center" id="tb_siswa">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">NIS</th>
                <th scope="col">Nama</th>
                <th scope="col">Foto</th>
                <th scope="col">Periode</th>
                <th scope="col">Suara</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($tb_kandidat as $kandidat) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $kandidat['nis']; ?></td>
                    <?php $nama = $this->db->get_where('users', ['nis' => $kandidat['nis']])->row_array(); ?>
                    <td><?= $nama['nama']; ?></td>
                    <td><?= $kandidat['foto']; ?></td>
                    <td><?= $kandidat['periode']; ?></td>
                    <td><?= $kandidat['suara']; ?></td>
                    <td>
                        <a href="<?= base_url(); ?>vote/detail_kandidat/<?= $kandidat['no_kandidat']; ?>" class="btn btn-success">Detail</a>
                        <a href="<?= base_url(); ?>vote/editKandidat/<?= $kandidat['no_kandidat']; ?>" class="btn btn-dark">Edit</a>
                        <a href="<?= base_url(); ?>vote/hapus_kandidat/<?= $kandidat['no_kandidat']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?');">Hapus</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>