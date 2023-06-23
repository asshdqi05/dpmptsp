<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the . class with font-awesome or any other icon font library -->
    <?php $session = session();
    $request = \Config\Services::request();

    ?>
    <?php if ($session->get('level') == 1) { ?>
        <li class="nav-item">
            <a href="<?= site_url('C_admin/index') ?>" class="nav-link <?php if ($request->uri->getSegment(2) == 'index') echo 'active'; ?>">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Home
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('C_admin/bidang') ?>" class="nav-link <?php if ($request->uri->getSegment(2) == 'bidang') echo 'active'; ?>">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                    Data Bidang
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('C_admin/jabatan') ?>" class="nav-link <?php if ($request->uri->getSegment(2) == 'jabatan') echo 'active'; ?>">
                <i class="nav-icon fas fa-folder-plus"></i>
                <p>
                    Data Jabatan
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('C_admin/pegawai') ?>" class="nav-link <?php if ($request->uri->getSegment(2) == 'pegawai') echo 'active'; ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Data Pegawai
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('C_admin/kegiatan') ?>" class="nav-link <?php if ($request->uri->getSegment(2) == 'kegiatan') echo 'active'; ?>">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                    Data Kegiatan
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('C_admin/user') ?>" class="nav-link <?php if ($request->uri->getSegment(2) == 'user') echo 'active'; ?>">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Data User
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('C_npd/npd') ?>" class="nav-link <?php if ($request->uri->getSegment(2) == 'npd' || $request->uri->getSegment(2) == 'add_npd' || $request->uri->getSegment(2) == 'edit_npd' || $request->uri->getSegment(2) == 'nota_npd') echo 'active'; ?>">
                <i class="nav-icon fas fa-clipboard"></i>
                <p>
                    NPD
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('C_spj/spj') ?>" class="nav-link <?php if ($request->uri->getSegment(2) == 'spj' || $request->uri->getSegment(2) == 'add_spj' || $request->uri->getSegment(2) == 'edit_spj' || $request->uri->getSegment(2) == 'nota_spj') echo 'active'; ?>">
                <i class="nav-icon fas fa-envelope-open-text"></i>
                <p>
                    SPJ
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('C_dpa/dpa') ?>" class="nav-link <?php if ($request->uri->getSegment(2) == 'dpa' || $request->uri->getSegment(2) == 'add_dpa' || $request->uri->getSegment(2) == 'edit_dpa') echo 'active'; ?>">
                <i class="nav-icon fas fa-book-open"></i>
                <p>
                    DPA
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('C_laporan/laporan') ?>" class="nav-link <?php if ($request->uri->getSegment(2) == 'laporan' || $request->uri->getSegment(2) == 'laporan_dpa' || $request->uri->getSegment(2) == 'laporan_spj' || $request->uri->getSegment(2) == 'laporan_npd') echo 'active'; ?>">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>
                    Laporan
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('C_login/logout') ?>" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    Logout
                </p>
            </a>
        </li>

    <?php } else if ($session->get('level') == 2) { ?>
        <li class="nav-item">
            <a href="<?= site_url('C_admin/index') ?>" class="nav-link <?php if ($request->uri->getSegment(2) == 'index') echo 'active'; ?>">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Home
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('C_kasubag/npd') ?>" class="nav-link <?php if ($request->uri->getSegment(2) == 'npd' || $request->uri->getSegment(2) == 'detail_npd') echo 'active'; ?>">
                <i class="nav-icon fas fa-clipboard"></i>
                <p>
                    NPD
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('C_admin/pegawai') ?>" class="nav-link <?php if ($request->uri->getSegment(2) == 'pegawai') echo 'active'; ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Data Pegawai
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('C_admin/kegiatan') ?>" class="nav-link <?php if ($request->uri->getSegment(2) == 'kegiatan') echo 'active'; ?>">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                    Data Kegiatan
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('C_laporan/laporan') ?>" class="nav-link <?php if ($request->uri->getSegment(2) == 'laporan' || $request->uri->getSegment(2) == 'laporan_dpa' || $request->uri->getSegment(2) == 'laporan_spj' || $request->uri->getSegment(2) == 'laporan_npd') echo 'active'; ?>">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>
                    Laporan
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('C_login/logout') ?>" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    Logout
                </p>
            </a>
        </li>
    <?php } else if ($session->get('level') == 3) { ?>
        <li class="nav-item">
            <a href="<?= site_url('C_admin/index') ?>" class="nav-link <?php if ($request->uri->getSegment(2) == 'index') echo 'active'; ?>">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Home
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('C_admin/pegawai') ?>" class="nav-link <?php if ($request->uri->getSegment(2) == 'pegawai') echo 'active'; ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Data Pegawai
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('C_admin/kegiatan') ?>" class="nav-link <?php if ($request->uri->getSegment(2) == 'kegiatan') echo 'active'; ?>">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                    Data Kegiatan
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('C_npd/npd') ?>" class="nav-link <?php if ($request->uri->getSegment(2) == 'npd' || $request->uri->getSegment(2) == 'add_npd' || $request->uri->getSegment(2) == 'edit_npd' || $request->uri->getSegment(2) == 'nota_npd') echo 'active'; ?>">
                <i class="nav-icon fas fa-clipboard"></i>
                <p>
                    NPD
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('C_spj/spj') ?>" class="nav-link <?php if ($request->uri->getSegment(2) == 'spj' || $request->uri->getSegment(2) == 'add_spj' || $request->uri->getSegment(2) == 'edit_spj' || $request->uri->getSegment(2) == 'nota_spj') echo 'active'; ?>">
                <i class="nav-icon fas fa-envelope-open-text"></i>
                <p>
                    SPJ
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('C_login/logout') ?>" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    Logout
                </p>
            </a>
        </li>

    <?php } else if ($session->get('level') == 4) { ?>
        <li class="nav-item">
            <a href="<?= site_url('C_admin/index') ?>" class="nav-link <?php if ($request->uri->getSegment(2) == 'index') echo 'active'; ?>">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Home
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('C_bendahara/npd') ?>" class="nav-link <?php if ($request->uri->getSegment(2) == 'npd' || $request->uri->getSegment(2) == 'detail_npd') echo 'active'; ?>">
                <i class="nav-icon fas fa-clipboard"></i>
                <p>
                    NPD
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('C_bendahara/spj') ?>" class="nav-link <?php if ($request->uri->getSegment(2) == 'spj' || $request->uri->getSegment(2) == 'add_spj' || $request->uri->getSegment(2) == 'edit_spj' || $request->uri->getSegment(2) == 'nota_spj') echo 'active'; ?>">
                <i class="nav-icon fas fa-envelope-open-text"></i>
                <p>
                    SPJ
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('C_dpa/dpa') ?>" class="nav-link <?php if ($request->uri->getSegment(2) == 'dpa' || $request->uri->getSegment(2) == 'add_dpa' || $request->uri->getSegment(2) == 'edit_dpa') echo 'active'; ?>">
                <i class="nav-icon fas fa-book-open"></i>
                <p>
                    DPA
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('C_login/logout') ?>" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    Logout
                </p>
            </a>
        </li>
    <?php } ?>



</ul>