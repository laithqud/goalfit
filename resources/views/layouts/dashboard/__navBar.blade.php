<nav class="navbar navbar-expand bg-black bg-opacity-75 navbar-dark sticky-top px-4 py-0">
    <a href="{{ route('dashboard') }}" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-light mb-0"><i class="fa fa-user-edit"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars text-light"></i>
    </a>

    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2" src="{{ asset('img/user.jpg') }}" alt=""
                    style="width: 40px; height: 40px;">
                @php
                    // This will help us debug what's happening
                    $adminUser = Auth::user();
                    $adminName = $adminUser ? $adminUser->name : 'No user found';

                    // Alternative method using DB query
                    if (Auth::check()) {
                        $adminEmail = Auth::user()->email;
                        $adminFromDB = DB::table('admins')->where('email', $adminEmail)->first();
                        if ($adminFromDB) {
                            $adminName = $adminFromDB->name;
                        }
                    }
                @endphp
                <span class="d-none d-lg-inline-flex text-light">{{ $adminName }}</span>
            </a>
            <div
                class="dropdown-menu dropdown-menu-end bg-secondary bg-opacity-50 border-0 rounded-0 rounded-bottom m-0">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="dropdown-item text-light"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        Log Out
                    </a>
                </form>
            </div>
        </div>
    </div>
</nav>