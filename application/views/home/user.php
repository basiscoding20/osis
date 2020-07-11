<div class=" mt-3 text-center">
    </br>
    </br>
    </br>
    <h3>Let's Choose Your Leader !</h3>
    <h3>Your Choice In Your Hand</h3>
    <?php if ($cek['pemilih'] == 'y') : ?>
        <div class="alert alert-primary" role="alert">
            Anda telah melakukan voting
        </div>
    <?php endif; ?>
    <hr>
    <div class="flash-data-password" data-password="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
    <?php endif; ?>
    <div align="center">
        <div class="row">
            <?php $count_kandidat = $this->db->get('kandidat')->num_rows(); ?>
            <?php foreach ($kandidat as $k) : ?>
                <div class=" <?php if ($count_kandidat % 2 == 0) {
                                    echo 'col-lg-6';
                                } else {
                                    echo 'col-lg-4';
                                } ?>  mt-3 mb-3">
                    <div class="card">

                        <div class="card-body ">
                            <div class="row">
                                <div class="col-lg-8 offset-2">
                                    <img height="320px" class="card-img-top" src="<?= base_url('assets/img/vote/') . $k['foto']; ?>" alt="Card image cap" height="200px">
                                </div>
                                <div class="col-lg-12">
                                    <?php $title = $this->db->get_where('users', ['nis' => $k['nis']])->row_array(); ?>
                                    <h3 class="card-title mt-3"><strong><?= $title['nama']; ?></strong></h3>
                                    <p class="card-text"></p>
                                    <div class="form-group">
                                        <p>Visi :</p>
                                        <p><?= $k['visi']; ?></p>
                                    </div>
                                    <div class="form-group">
                                        <p>Misi :</p>
                                        <p><?= $k['misi']; ?></p>
                                    </div>
                                </div>
                            </div>

                            <!-- <a href="<?= base_url('vote/profile'); ?>?nis=<?= $k['nis']; ?>" class="btn btn-primary">Profile</a>
                            <a href="<?= base_url('vote/visimisi'); ?>?nis=<?= $k['nis']; ?>" class="btn btn-primary"> Visi MIsi</a> </br> </br> -->

                            <?php if ($cek['pemilih'] == 'n') : ?>
                                <a href="<?= base_url('vote/voting/') . $k['nis'] . '/' . $k['no_kandidat']; ?>" class="btn btn-primary float-right tombol-kandidat">Vote</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>