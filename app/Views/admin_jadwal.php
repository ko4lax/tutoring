<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Jadwal Les</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://startbootstrap.github.io/startbootstrap-sb-admin-2/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

<div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('admin') ?>">
            <div class="sidebar-brand-icon">
                <i class="fas fa-school"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Admin Bimbel</div>
        </a>

        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('admin') ?>">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('admin/pendaftar') ?>">
                <i class="fas fa-users"></i>
                <span>Data Pendaftar</span>
            </a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="<?= site_url('admin/jadwal') ?>">
                <i class="fas fa-calendar-alt"></i>
                <span>Jadwal Les</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('admin/pengajar') ?>">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>Data Pengajar</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('admin/program') ?>">
                <i class="fas fa-book"></i>
                <span>Data Program</span>
            </a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">
    </ul>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 shadow">
                <span class="ml-3 font-weight-bold text-primary">Jadwal Les</span>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                Admin, <?= esc(session('username') ?? 'User') ?>
                            </span>
                            <i class="fas fa-user-circle"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?= site_url('logout') ?>">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3 text-gray-800 mb-0">Jadwal Les</h1>
                    <div>
                        <a href="<?= site_url('admin/pendaftar') ?>" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-users mr-1"></i>Kembali ke Data Pendaftar
                        </a>
                    </div>
                </div>

                <?php $jadwal = $jadwal ?? []; ?>
                <?php $pengajar = $pengajar ?? []; ?>
                <?php $programs = $programs ?? []; ?>

                <?php
                    $programMap = [];
                    foreach ($programs as $p) {
                        $programMap[$p['id_program']] = $p;
                    }
                ?>

                <?php if (empty($jadwal)) : ?>
                    <div class="card shadow mb-4">
                        <div class="card-body text-center py-5">
                            <i class="fas fa-calendar-times fa-3x text-gray-300 mb-3"></i>
                            <p class="text-gray-500 mb-0">Belum ada data jadwal. Silakan isi <strong>Hari</strong> dan <strong>Jam</strong> di halaman Data Pendaftar.</p>
                            <a href="<?= site_url('admin/pendaftar') ?>" class="btn btn-primary mt-3">
                                <i class="fas fa-plus mr-1"></i>Atur Jadwal Pendaftar
                            </a>
                        </div>
                    </div>
                <?php else : ?>
                    <?php 
                        $totalPendaftar = 0;
                        foreach ($jadwal as $hari => $slots) {
                            foreach ($slots as $jam => $entries) {
                                $totalPendaftar += count($entries);
                            }
                        }
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="card border-left-primary shadow py-2">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Hari Aktif</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($jadwal) ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-left-success shadow py-2">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Pendaftar Terjadwal</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalPendaftar ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-left-info shadow py-2">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Pengajar</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($pengajar) ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-left-warning shadow py-2">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Program</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($programs) ?></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php foreach ($jadwal as $hari => $slots) : ?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 bg-gradient-primary text-white">
                                <h6 class="m-0 font-weight-bold">
                                    <i class="fas fa-calendar-day mr-2"></i><?= esc($hari) ?>
                                    <span class="badge badge-light ml-2 text-primary">
                                        <?php 
                                            $totalSlot = 0;
                                            foreach ($slots as $entries) { $totalSlot += count($entries); }
                                            echo $totalSlot . ' pendaftar';
                                        ?>
                                    </span>
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <?php foreach ($slots as $jam => $entries) : ?>
                                        <div class="col-md-6 col-lg-4 mb-3">
                                            <div class="card border-left-info shadow h-100">
                                                <div class="card-header py-2 bg-light">
                                                    <strong>
                                                        <i class="fas fa-clock mr-1 text-info"></i>
                                                        <?= esc($jam) ?>
                                                    </strong>
                                                    <span class="badge badge-info float-right"><?= count($entries) ?> siswa</span>
                                                </div>
                                                <div class="card-body py-2">
                                                    <?php foreach ($entries as $entry) : ?>
                                                        <div class="mb-2 pb-2 border-bottom">
                                                            <div class="font-weight-bold text-dark">
                                                                <?= esc($entry['pendaftar']['nama_lengkap']) ?>
                                                            </div>
                                                            <small class="text-muted">
                                                                <?= esc($entry['program']['nama_program'] ?? 'Belum ada program') ?>
                                                                <?php if (!empty($entry['pendaftar']['kelas'])) : ?>
                                                                    | Kelas <?= esc($entry['pendaftar']['kelas']) ?>
                                                                <?php endif; ?>
                                                            </small>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>&copy; 2025 Bimbel Jadi Cerdas</span>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/js/sb-admin-2.min.js"></script>

</body>
</html>
