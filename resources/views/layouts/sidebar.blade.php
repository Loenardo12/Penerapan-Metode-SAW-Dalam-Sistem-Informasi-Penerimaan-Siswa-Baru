<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/home">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Data siswa</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/tb_calon_siswa">Data Diri</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/berkas">Upload Berkas</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/pinjamans">Nilai</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                aria-controls="form-elements">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Data Kriteria</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="/criteriaweights">Kriteria</a></li>
                    <li class="nav-item"><a class="nav-link" href="/criteriaratings">Sub Kriteria</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Penilaian</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/alternatives">Alternatif</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/decision">Decision Matrix</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/normalization">Normalisasi</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/rank">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Ranking</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/riwayats">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Riwayat Pengajuan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <i class="ti-power-off text-primary"></i>
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        </li>
    </ul>
</nav>
