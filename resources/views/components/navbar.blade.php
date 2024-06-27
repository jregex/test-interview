<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">SA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link {{ request()->routeIs('home.*') ? 'active' : '' }}" aria-current="page"
                    href="{{ route('home.index') }}">Home</a>
                <a class="nav-link {{ request()->routeIs('siswa.*') ? 'active' : '' }}"
                    href="{{ route('siswa.index') }}">Siswa</a>
                <a class="nav-link {{ request()->routeIs('mapel.*') ? 'active' : '' }}"
                    href="{{ route('mapel.index') }}">Mata pelajaran</a>
                <a class="nav-link {{ request()->routeIs('ujian.*') ? 'active' : '' }}"
                    href="{{ route('ujian.index') }}">Ujian</a>
                <a class="nav-link {{ request()->routeIs('peserta.*') ? 'active' : '' }}"
                    href="{{ route('peserta.index') }}">Peserta</a>
            </div>
        </div>
    </div>
</nav>
