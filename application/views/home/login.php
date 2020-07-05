<div class="container">
    <a href="<?= base_url('vote/voting_kandidat') ?>" class="btn btn-warning btn-lg float-right mt-5">Hasil Sementara</a>
    <h2 class="index-header p-5"><b>Selamat Datang di Aplikasi E - Voting <br />SMA PGRI 1 Kota Serang</b></h2>
    <div class="row text-white mt-lg-5 p-4">
        <div class="col-lg-4 col-md-offset-1">
            <div id="content-slider">
                <img src="<?= base_url('assets/') ?>img/osis.png" class="img" alt="Slideshow 2">
                <img src="<?= base_url('assets/') ?>img/Logo.png" class="img" alt="Slideshow 4">

            </div>
        </div>
        <div class="col-lg-6 form">
            <form action="" method="post">
                <div class=" text-center card form-row bg-light p-4  center-block">
                    <span class="info-login text-dark">Silahkan Login</span>
                    <div class="form-group col-md-12 mt-4">
                        <!-- <label>Masukkan Username :</label> -->
                        <input maxlength="10" autofocus autocomplete="off" type="text" class="form-control" placeholder="Masukkan Username" required="username" name="username" />
                    </div>
                    <div class="form-group col-md-12">
                        <!-- <label>Masukkan Password :</label> -->
                        <input type="password" class="form-control" placeholder="Masukkan Password" required="password" name="password" />
                    </div>
                    <br />
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button class="btn btn-primary btn-lg " type="submit" name="submit">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>