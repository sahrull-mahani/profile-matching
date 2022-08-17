<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url(); ?>" class="brand-link">
        <img src="<?= base_url('assets/dist/img/logo-bolmut.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
        <span class="brand-text font-weight-light">Posisi Pemain</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= session('foto') ?>" class="img-circle elevation-2" alt="User Image" data-toggle="modal" data-target=".bd-example-modal-sm" />
            </div>
            <div class="info">
                <a href="<?= site_url('profile'); ?>" class="d-block"><?= session('nama_user') ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= site_url('/home'); ?>" class="nav-link <?= isset($m_home) ? $m_home : ''; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <?php if (is_admin()) : ?>
                    <li class="nav-header">Data Individu</li>
                    <li class="nav-item">
                        <a href="<?= site_url('/tim'); ?>" class="nav-link <?= isset($m_tim) ? $m_tim : ''; ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Tim
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url('/posisi'); ?>" class="nav-link <?= isset($m_posisi) ? $m_posisi : ''; ?>">
                            <i class="nav-icon fas fa-plus"></i>
                            <p>
                                Posisi
                            </p>
                        </a>
                    </li>
                <?php endif ?>
                <?php if (in_groups('manager')) : ?>
                    <li class="nav-item">
                        <a href="<?= site_url('/pemain'); ?>" class="nav-link <?= isset($m_pemain) ? $m_pemain : ''; ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Pemain
                            </p>
                        </a>
                    </li>
                <?php endif ?>
                <?php if (in_groups('pelatih')) : ?>
                    <li class="nav-header">Data Master</li>
                    <li class="nav-item">
                        <a href="<?= site_url('/aspek'); ?>" class="nav-link <?= isset($m_aspek) ? $m_aspek : ''; ?>">
                            <i class="nav-icon fas fa-asterisk"></i>
                            <p>
                                Aspek
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url('/kriteria'); ?>" class="nav-link <?= isset($m_kriteria) ? $m_kriteria : ''; ?>">
                            <i class="nav-icon fas fa-hashtag"></i>
                            <p>
                                Kriteria
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url('/nilai_bobot'); ?>" class="nav-link <?= isset($m_nilai_bobot) ? $m_nilai_bobot : ''; ?>">
                            <i class="nav-icon fa fa-adjust"></i>
                            <p>
                                Nilai Bobot
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">Hasil Akhir</li>
                    <li class="nav-item">
                        <a href="<?= site_url('/nilai_gap'); ?>" class="nav-link <?= isset($m_nilai_gap) ? $m_nilai_gap : ''; ?>">
                            <i class="nav-icon fa fa-adjust"></i>
                            <p>
                                Profile Matching
                            </p>
                        </a>
                    </li>
                <?php endif ?>
                <?php if (is_admin()) : ?>
                    <li class="nav-header">User</li>
                    <li class="nav-item">
                        <a href="<?= site_url('/users'); ?>" class="nav-link <?= isset($m_users) ? $m_users : ''; ?>">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Users
                            </p>
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <div class="sidebar-custom">
        <a href="<?= site_url('auth/logout'); ?>" class="btn btn-danger hide-on-collapse pos-right">log Out <i class="fas fa-sign-out-alt"></i></a>
    </div>
</aside>