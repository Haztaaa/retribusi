<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider" style="color: white;">
                        Menu
                    </li>


                    <?php if ($this->session->userdata('level') == 'Admin') : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('beranda_A') ?>" style="color: white;"><i class=" fas fa-users" style="color: white;"></i>Halaman Beranda</a>
                        </li>
                    <?php endif; ?>

                    <?php if ($this->session->userdata('level') != 'Pegawai') : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('pedagang') ?>" style="color: white;"><i class="fa fa-fw fa-user-circle" style="color: white;"></i>Data Pedagang</a>

                        </li>
                    <?php endif; ?>
                    <?php if ($this->session->userdata('level') == 'Admin') : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('sektor') ?>" style="color: white;"><i class="fa fa-fw fa-user-circle" style="color: white;"></i>Data Sektor</a>

                        </li>
                    <?php endif; ?>
                    <?php if ($this->session->userdata('level') == 'Admin') : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('pegawai') ?>" style="color: white;"><i class=" fas fa-users" style="color: white;"></i>Data Pegawai</a>
                        </li>

                    <?php endif; ?>
                    <?php if ($this->session->userdata('level') != 'Monitor') : ?>
                        <li class="nav-divider" style="color: white;">
                            Data Retribusi
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('retribusi') ?>" style="color: white;"><i class=" fas fa-user" style="color: white;"></i>Data Retribusi</a>
                        </li>
                    <?php endif; ?>
                    <?php if ($this->session->userdata('level') != 'Pegawai') : ?>
                        <li class="nav-divider" style="color: white;">
                            Laporan
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2" style="color: white;"><i class="fas fa-fw fa-file" style="color: white;"></i>Laporan</a>
                            <div id="submenu-2" class="collapse submenu">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url('laporan/lunas') ?>" style="color: white;">Lunas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url('laporan/tunggak') ?>" style="color: white;">Penunggakan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url('laporan/semua') ?>" style="color: white;">Laporan Retribusi</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('auth/logout') ?>" style="color: white;"><i class=" fas fa-power-off" style="color: white;"></i>Keluar</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>