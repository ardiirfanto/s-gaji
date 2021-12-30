<div class="page-sidebar">
    <div class="logo-box">
        <a href="#" class="logo-text">SiGaji</a>
        <a href="#" id="sidebar-close">
            <i class="material-icons">close</i>
        </a>
        <a href="#" id="sidebar-state">
            <i class="material-icons">adjust</i>
            <i class="material-icons compact-sidebar-icon">panorama_fish_eye</i>
        </a>
    </div>
    <div class="page-sidebar-inner slimscroll">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                MENU APLIKASI
            </li>
            <li class="<?= $this->uri->segment('1') == '' ? 'active-page' : '' ?>">
                <a href="<?= base_url('') ?>">
                    <i class="material-icons-outlined">dashboard</i>
                    Halaman Utama
                </a>
            </li>
            <li class="<?= $this->uri->segment('1') == 'kehadiran' ? 'active-page' : '' ?>">
                <a href="<?= base_url('kehadiran') ?>">
                    <i class="material-icons-outlined">event</i>
                    Data Kehadiran
                </a>
            </li>
            <li class="<?= $this->uri->segment('1') == 'lemburan' ? 'active-page' : '' ?>">
                <a href="<?= base_url('lemburan') ?>">
                    <i class="material-icons-outlined">schedule</i>
                    Data Lemburan
                </a>
            </li>
            <li class="<?= $this->uri->segment('1') == 'penggajian' ? 'active-page' : '' ?>">
                <a href="<?= base_url('penggajian') ?>">
                    <i class="material-icons-outlined">payments</i>
                    Data Penggajian
                </a>
            </li>
            <li class="<?= $this->uri->segment('1') == 'laporan' ? 'open' : '' ?>">
                <a href="#">
                    <i class="material-icons">receipt</i>
                    Pelaporan
                    <i class="material-icons has-sub-menu">add</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="<?= base_url('laporan/slip') ?>" class="<?= $this->uri->segment('2') == 'slip' ? 'active' : '' ?>">Slip Gaji</a>
                    </li>
                    <li>
                        <a href="<?= base_url('laporan/kehadiran') ?>" class="<?= $this->uri->segment('2') == 'kehadiran' ? 'active' : '' ?>">Kehadiran</a>
                    </li>
                    <li>
                        <a href="<?= base_url('laporan/lemburan') ?>" class="<?= $this->uri->segment('2') == 'lemburan' ? 'active' : '' ?>">Lemburan</a>
                    </li>
                    <li>
                        <a href="<?= base_url('laporan/penggajian') ?>" class="<?= $this->uri->segment('2') == 'penggajian' ? 'active' : '' ?>">Penggajian</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-title">
                Data Master
            </li>
            <li class="<?= $this->uri->segment('1') == 'unit' ? 'active-page' : '' ?>">
                <a href="<?= base_url('unit') ?>">
                    <i class="material-icons-outlined">business</i>
                    Master Unit
                </a>
            </li>
            <li class="<?= $this->uri->segment('1') == 'karyawan' ? 'active-page' : '' ?>">
                <a href="<?= base_url('karyawan') ?>">
                    <i class="material-icons-outlined">people</i>
                    Master Karyawan
                </a>
            </li>
            <li class="<?= $this->uri->segment('1') == 'pengguna' ? 'active-page' : '' ?>">
                <a href="<?= base_url('pengguna') ?>">
                    <i class="material-icons-outlined">lock</i>
                    Master Pengguna
                </a>
            </li>
            <li class="<?= $this->uri->segment('1') == 'potongan' ? 'active-page' : '' ?>">
                <a href="<?= base_url('potongan') ?>">
                    <i class="material-icons-outlined">money_off</i>
                    Master Potongan Gaji
                </a>
            </li>
            <br>
            <br>
            <br>
        </ul>
    </div>
</div>