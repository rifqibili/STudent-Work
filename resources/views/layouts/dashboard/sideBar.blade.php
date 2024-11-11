<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        @if (Auth::user()->role === 'admin')
            <ul class="metismenu" id="menu">
                <li class="nav-label">Dashboard</li>
                <li>
                    <a class="has-arrow" href="{{ route('dashboard') }}" aria-expanded="false">
                        <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow" href="{{ route('chat.index') }}" aria-expanded="false">
                        <i class="icon-envelope menu-icon"></i> <span class="nav-text">Pesan</span>
                    </a>
                </li>

                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="mdi mdi-bell-outline"></i><span class="nav-text">Permohonan</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('show.toWorker') }}">Permohonan Pengerja</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="{{ route('dashboard.profile') }}" aria-expanded="false">
                        <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Profil</span>
                    </a>
                </li>

                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-note menu-icon"></i><span class="nav-text">Formulir</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('kategori.form') }}">Tambah kategori</a></li>
                        <li><a href="{{ route('task.form') }}">Tambah Tugas</a></li>
                    </ul>
                </li>

                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-menu menu-icon"></i><span class="nav-text">Tabel Data</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('dashboard.table.user') }}" aria-expanded="false">Tabel Akun</a></li>
                        <li><a href="{{ route('dashboard.table.kategori') }}" aria-expanded="false">Tabel Kategori</a>
                        </li>
                        <li><a href="{{ route('dashboard.table.task') }}" aria-expanded="false">Tabel Tugas</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-menu menu-icon"></i><span class="nav-text">Sampah</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('task.deletedTask') }}">Tabel Tugas Dihapus</a></li>
                        <li><a href="{{ route('kategori.deletedkategori') }}">Tabel Kategori Dihapus</a></li>

                    </ul>
                </li>
            </ul>
        @elseif (Auth::user()->role === 'pembuat')
            <ul class="metismenu" id="menu">
                <li class="nav-label">Dashboard</li>
                <li>
                    <a class="has-arrow" href="{{ route('dashboard') }}" aria-expanded="false">
                        <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow" href="{{ route('chat.index') }}" aria-expanded="false">
                        <i class="icon-envelope menu-icon"></i> <span class="nav-text">Pesan</span>
                    </a>
                </li>

                <li>
                    <a class="has-arrow" href="{{ route('dashboard.profile') }}" aria-expanded="false">
                        <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Profil</span>
                    </a>
                </li>

                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-notebook menu-icon"></i><span class="nav-text">Tugas</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('task.collectAssignment') }}">Kumpulkan Tugas</a></li>
                    </ul>
                </li>
            </ul>
        @elseif (Auth::user()->role === 'penyedia')
            <ul class="metismenu" id="menu">
                <li class="nav-label">Dashboard</li>
                <li>
                    <a class="has-arrow" href="{{ route('dashboard') }}" aria-expanded="false">
                        <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow" href="{{ route('chat.index') }}" aria-expanded="false">
                        <i class="icon-envelope menu-icon"></i> <span class="nav-text">Pesan</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow" href="{{ route('dashboard.profile') }}" aria-expanded="false">
                        <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Profil</span>
                    </a>
                </li>

                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-note menu-icon"></i><span class="nav-text">Formulir</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('task.form') }}">Tambah Tugas</a></li>
                    </ul>
                </li>
                <li>

                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-notebook menu-icon"></i><span class="nav-text">Tugas</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('task.yourTask') }}">Tugas Anda</a></li>
                        <li><a href="{{ route('task.deletedTaskProv') }}">Sejarah Tugas Anda</a></li>
                    </ul>
                </li>
            </ul>
        @endif

    </div>
</div>
