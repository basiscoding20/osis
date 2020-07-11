<div class="container text-center">
    </br>
    </br>
    <h3>Daftar Voter SMA PGRI 1 Kota Serang</h3>
    <div class="mt-5">
        <table>

            <?php foreach ($kelas as $k) : ?>
                <tr>
                    <td><?= $k['nama_kelas']; ?></td>
                    <?php $jumlahya = $this->db->get_where('users', ['id_kelas' => $k['id_kelas'], 'pemilih' => 'y'])->num_rows(); ?>
                    <td>[ <?= $jumlahya; ?> : sudah ]</td>

                    <?php $jumlahtidak = $this->db->get_where('users', ['id_kelas' => $k['id_kelas'], 'pemilih' => 'n'])->num_rows(); ?>
                    <td>[ <?= $jumlahtidak; ?> : belum ]</td>
                </tr>
            <?php endforeach; ?>
        </table>
        </>

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
            <thead class="t">
                <tr class="table-primary">
                    <th scope="col">No</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama</th>
                    <th scope="col">JK</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Pemilihan</th>
                    <th scope="col">Waktu</th>
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
                        <td><?= $user['time']; ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?= base_url('vote/reset') ?>" class="float-right mt-5 tombol-reset">Reset Voting</a>
    </div>