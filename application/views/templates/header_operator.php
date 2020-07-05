<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $judul; ?></title>
    <link href="<?= base_url('assets/') ?>css/styles.css" rel="stylesheet" />
    <link href="<?= base_url('assets/') ?>css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="<?= base_url('assets/') ?>css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href=" <?= base_url('assets/DataTables') ?>datatables.min.css" />
    <script src="<?= base_url('assets/') ?>js/all.min.js">
    </script>
    <script type="text/javascript" src="<?= base_url('assets/DataTables') ?>datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tb_siswa').DataTable();
        });
    </script>
</head>


<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('vote/operator'); ?>">e-Voting Ketua OSIS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url('vote/operator'); ?>">
                            Dashboard<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('vote/siswaOp'); ?>">
                            Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('vote/gantipass') ?>">Ganti Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="return confirm('Apa kamu yakin ingin keluar?');" href="<?= base_url('vote/logout') ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>