<div class="container text-center">
    </br>
    </br>
    <h3>Daftar Voter SMA PGRI 1 Kota Serang</h3>
    <div class="mt-5">
        <table>
            <tr>
                <td>X MIPA</td>
                <td>[ <?= $x_belum; ?> : belum ]</td>
                <td>[ <?= $x_udah; ?> : sudah ]</td>
            </tr>
            <tr>
                <td>XI MIPA</td>
                <td>[ <?= $xi_belum; ?> : belum ]</td>
                <td>[ <?= $xi_udah; ?> : sudah ]</td>
            </tr>
            <tr>
                <td>XII IPS</td>
                <td>[ <?= $xii_belum; ?> : belum ]</td>
                <td>[ <?= $xii_udah; ?> : sudah ]</td>
            </tr>
        </table>
    </div>

    <?php if ($this->session->flashdata('flash')) : ?>
        <div class=" row mt-3">
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


    <table class="table table-striped w-100 dt-responsive nowrap text-center" id="tb_siswa">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">NIS</th>
                <th scope="col">Nama</th>
                <th scope="col">JK</th>
                <th scope="col">Kelas</th>
                <th scope="col">Pemilihan</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($tb_users as $user) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $user['nis']; ?></td>
                    <td><?= $user['nama']; ?></td>
                    <td><?= $user['jk']; ?></td>
                    <?php $tb_kelas = $this->db->get_where('kelas', ['id_kelas' => $user['id_kelas']])->row_array(); ?>
                    <td><?= $tb_kelas['nama_kelas']; ?></td>
                    <?php if ($user['pemilih'] == "n") : ?>
                        <td><i class="fas fa-window-close"></i></td>
                    <?php else : ?>
                        <td><i class="fas fa-check"></i></td>
                    <?php endif; ?>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?= base_url('vote/reset') ?>" onclick="return confirm('Apa kamu yakin ingin mereset voting?');" class="float-right mt-5">Reset Voting</a>
</div>