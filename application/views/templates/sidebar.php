<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon">
                    <img height="60" width="100" src="<?= base_url('assets/img/logo/uigm.png'); ?>" alt="">
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <?php if ($this->session->userdata('role_id') == 1) { ?>
            <!-- MENU A D M I N -->
            <li class="nav-item">
                <div class="sidebar-heading">
                    Admin
                </div>
                <a class="nav-link" href="<?= base_url('admin'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-folder-plus"></i>
                    <span>Laporan UAS</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Laporan UAS</h6>
                        <a class="collapse-item" href="<?= base_url('bap/index'); ?>">BAP</a>
                        <a class="collapse-item" href="<?= base_url('soal/index'); ?>">Soal</a>
                        <a class="collapse-item" href="<?= base_url('laporan/index'); ?>">Laporan Nilai</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">


            <div class="sidebar-heading">
                Jadwal Sidang
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="far fa-calendar-check"></i>
                    <span>Jadwal Sidang</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Jadwal Sidang</h6>
                        <!-- <a class="collapse-item" href="<?= base_url('jadwal/index')?>">Input Jadwal Sidang</a> -->
                        <a class="collapse-item" href="<?= base_url('jadwal/jsidang_ta')?>">Jadwal Sidang TA </a>
                        <a class="collapse-item" href="<?= base_url('jadwal/jsidang_skripsi') ?>">Jadwal Sidang
                            Skripsi</a>
                    </div>
                </div>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading">
                Surat Survei
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-envelope-open-text"></i>
                    <span>Surat Survei</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Surat Survei</h6>
                        <a class="collapse-item" href="<?= base_url('surat/index'); ?>">Surat Survei</a>
                        <!-- <a class="collapse-item" href="<?= base_url('surat/index') ?>">Surat Survei</a> -->
                    </div>
                </div>

            </li>
            <?php  }elseif ($this->session->userdata('role_id') == 3) { ?>
            <!-- M A H A S I S W A -->

            <div class="sidebar-heading">
                Jadwal Sidang
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="far fa-calendar-check"></i>
                    <span>Jadwal Sidang</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Jadwal Sidang</h6>
                        <a class="collapse-item" href="<?= base_url('jadwal/jsidang_ta')?>">Jadwal Sidang TA </a>
                        <a class="collapse-item" href="<?= base_url('jadwal/jsidang_skripsi') ?>">Jadwal Sidang
                            Skripsi</a>
                    </div>
                </div>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading">
                Surat Survei
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-envelope-open-text"></i>
                    <span>Surat Survei</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Surat Survei</h6>
                        <a class="collapse-item" href="<?= base_url('surat/index'); ?>">Surat Survei</a>
                        <!-- <a class="collapse-item" href="<?= base_url('surat/index') ?>">Surat Survei</a> -->
                    </div>
                </div>
            </li>
            <?php }elseif($this->session->userdata('role_id') == 2) { ?>
            <li class="nav-item">
                <div class="sidebar-heading">
                    Dosen
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-folder-plus"></i>
                    <span>Laporan UAS</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Laporan UAS</h6>
                        <a class="collapse-item" href="<?= base_url('bap/index'); ?>">BAP</a>
                        <a class="collapse-item" href="<?= base_url('soal/index'); ?>">Soal</a>
                        <a class="collapse-item" href="<?= base_url('laporan/index'); ?>">Laporan Nilai</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">


            <div class="sidebar-heading">
                Jadwal Sidang
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="far fa-calendar-check "></i>
                    <span>Jadwal Sidang</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Jadwal Sidang</h6>
                        <!-- <a class="collapse-item" href="<?= base_url('jadwal/index')?>">Input Jadwal Sidang</a> -->
                        <a class="collapse-item" href="<?= base_url('jadwal/jsidang_ta')?>">Jadwal Sidang TA </a>
                        <a class="collapse-item" href="<?= base_url('jadwal/jsidang_skripsi') ?>">Jadwal Sidang
                            Skripsi</a>
                    </div>
                </div>
            </li>
            <?php } ?>


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->