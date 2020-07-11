<div class="container">
    </br>
    </br>
    <h3 text-align : center>Daftar Kandidat SMA PGRI 1 Kota Serang</h3>
    <div class="flash-data-kandidat" data-kandidat="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
    <?php endif; ?>
    <div class="row mt-5">
        <div class="col-md-6">
            <a href="<?= base_url('vote/tambahDataKandidat'); ?>" class="btn btn-primary btn-icon-split">
                <span class="icon">
                    <i class="fa fa-plus"></i>
                </span>
                <span class="text">
                    Tambah Data Kandidat
                </span>
            </a>
        </div>
    </div>
    </br>
    <table class="table table-striped w-100 dt-responsive nowrap text-center mt-4">
        <thead class="">
            <tr class="table-primary">
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
                        <a href="<?= base_url(); ?>vote/detail_kandidat/<?= $kandidat['no_kandidat']; ?>" class="btn btn-success"> <i class="fa fa-info-circle"></i> </a>
                        <a href="<?= base_url(); ?>vote/editKandidat/<?= $kandidat['no_kandidat']; ?>" class="btn btn-dark"> <i class="fa fa-edit"></i> </a>
                        <a href="<?= base_url(); ?>vote/hapus_kandidat/<?= $kandidat['no_kandidat']; ?>" class="btn btn-danger tombol-hapus-kandidat"> <i class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>