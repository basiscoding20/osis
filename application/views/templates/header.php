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
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-success">
        <a class="navbar-brand" href="#">e-Voting Ketua OSIS</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?= base_url('vote/gantipass') ?>">Ganti Password</a>
                    <a class="dropdown-item" onclick="return confirm('Apa kamu yakin ingin keluar?');" href="<?= base_url('vote/logout') ?>">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <?php if ($level == "admin") : ?>
                            <a class="nav-link" href="<?= base_url('vote/admin'); ?>">
                                <div class="sb-nav-link-icon"><i class="fa fa-home"></i></div>
                                Dashboard
                            </a>
                            <? elseif ($level == "operator") : ?>
                            <a class="nav-link" href="<?= base_url('vote/operator'); ?>">
                                <div class="sb-nav-link-icon"><i class="fa fa-home"></i></div>
                                Dashboard
                            </a>
                        <?php else : ?>

                        <?php endif; ?>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <?php if ($level == "admin") : ?>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">

                                <a class="nav-link" href="<?= base_url('vote/siswa'); ?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                                    Siswa
                                </a>
                                <a class="nav-link" href="<?= base_url('vote/kandidat'); ?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                                    Kandidat
                                </a>
                                <a class="nav-link" href="<?= base_url('vote/voter'); ?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Voter
                                </a>
                                <a class="nav-link" href="<?= base_url('vote/kelas'); ?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Kelas
                                </a>
                                <a class="nav-link" href="<?= base_url('vote/hasil'); ?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                    Hasil Voting
                                </a>
                                <? elseif ($level == "operator") : ?>
                                <a class="nav-link" href="<?= base_url('vote/siswa'); ?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                                    Data Siswa
                                </a>
                            <?php else : ?>

                            <?php endif; ?>
                    </div>
                </div>

            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>