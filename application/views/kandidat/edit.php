<div class="container">
    <div class="row mt-3">
        <div class="col-md-6 offset-2">
            <div class="card">
                <div class="card-header">
                    Form Edit Data Kandidat
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $kandidat['nis']; ?>">
                        <input type="hidden" name="fotolama" value="<?= $kandidat['foto']; ?>">
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="hidden" name="nis" class="form-control" id="nis" placeholder="Masukkan NIS anda" value="<?= $kandidat['nis']; ?>">
                            <input disabled type="text" name="nis_disabled" class="form-control" id="nis_disabled" placeholder="Masukkan NIS anda" value="<?= $kandidat['nis']; ?>">
                            <small class=" form-text text-danger"><?= form_error('nis'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="visi">Visi</label>
                            <textarea class="form-control" name="visi" id="visi" cols="30" placeholder="Masukkan visi kandidat" rows="5"><?= $kandidat['visi']; ?></textarea>
                            <small class=" form-text text-danger"><?= form_error('visi'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="misi">Misi</label>
                            <textarea class="form-control" name="misi" id="misi" cols="30" placeholder="Masukkan visi kandidat" rows="5"><?= $kandidat['misi']; ?></textarea>
                            <small class=" form-text text-danger"><?= form_error('misi'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="periode">Periode</label>
                            <input type="text" name="periode" class="form-control" id="periode" placeholder="Masukkan periode" value="<?= $kandidat['periode']; ?>">
                            <small class=" form-text text-danger"><?= form_error('periode'); ?></small>
                        </div>

                        <button type="submit" name="edit" class="btn btn-primary float-right ml-4"> Simpan </button>
                        <a href="<?= base_url('vote/kandidat'); ?>" class="btn btn-primary float-right">Batal</a>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>