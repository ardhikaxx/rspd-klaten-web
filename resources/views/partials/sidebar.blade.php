<aside class="sidebar d-flex flex-column">
    <div class="logo-section">
        <h5>RSPD Klaten</h5>
        <small>Admin Panel</small>
    </div>

    <nav class="menu-section flex-wrap">
        <ul class="nav flex-column gap-1 px-3">
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="fas fa-th-large"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('berita.index') }}" class="nav-link {{ request()->routeIs('berita.*') ? 'active' : '' }}">
                    <i class="far fa-newspaper"></i>
                    <span>Berita</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-broadcast-tower"></i>
                    <span>Program Siaran</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link setting">
                    <i class="fas fa-cog"></i>
                    <span>Pengaturan</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="d-flex flex-column">
        <div class="user-card mt-5">
            @auth('admin')
                <div class="avatar">{{ strtoupper(substr(auth('admin')->user()->nama_lengkap, 0, 1)) }}</div>
                <div class="info">
                    <div class="name">{{ auth('admin')->user()->nama_lengkap }}</div>
                    <div class="email">{{ auth('admin')->user()->email }}</div>
                </div>
            @else
                <div class="avatar">A</div>
                <div class="info">
                    <div class="name">Admin User</div>
                    <div class="email">admin@rspd.klaten.go.id</div>
                </div>
            @endauth
        </div>

        <div class="logout mb-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-link gap-3 text-decoration-none p-0 d-flex justify-content-start align-items-center">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>LOGOUT</span>
                </button>
            </form>
        </div>
    </div>
</aside>