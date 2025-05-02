<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-opacity-75 navbar-dark">
        <a href="{{ route('dashboard') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-light"><i class="fa fa-user-edit me-2 text-light"></i>GoalFit</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-light">{{ Auth::user()->name ?? 'Admin' }}</h6>
                <span class="text-light">Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('dashboard') }}"
                class="nav-item nav-link {{ request()->routeIs('dashboard') ? 'active border border-dark' : '' }} text-light">
                <i class="fa fa-tachometer-alt me-2 bg-black bg-opacity-75 text-light"></i>Dashboard
            </a>
            <a href="{{ route('dashboard.admins.index') }}"
                class="nav-item nav-link {{ request()->routeIs('admins.*') ? 'active border border-dark' : '' }} text-light">
                <i class="fa fa-th me-2 bg-black bg-opacity-75 text-light"></i>Admins
            </a>
            <a href="{{ route('dashboard.user.index') }}"
                class="nav-item nav-link {{ request()->routeIs('users.*') ? 'active border border-dark' : '' }} text-light">
                <i class="fa fa-keyboard me-2 bg-black bg-opacity-75 text-light"></i>Users
            </a>
            <a href="{{route('gym.index')}}"
                class="nav-item nav-link {{ request()->routeIs('gyms.*') ? 'active border border-dark' : '' }} text-light">
                <i class="fa fa-table me-2 bg-black bg-opacity-75 text-light"></i>Gyms
            </a>
            <a href="{{route('dashboard.videoCategory.index')}}"
                class="nav-item nav-link {{ request()->routeIs('categories.*') ? 'active border border-dark' : '' }} text-light">
                <i class="fa fa-chart-bar me-2 bg-black bg-opacity-75 text-light"></i>Videos Categories
            </a>
            <a href="{{route('dashboard.video.index')}}"
                class="nav-item nav-link {{ request()->routeIs('videos.*') ? 'active border border-dark' : '' }} text-light">
                <i class="fa fa-chart-bar me-2 bg-black bg-opacity-75 text-light"></i>Videos
            </a>
            <a href="{{route('dashboard.category.index')}}"
                class="nav-item nav-link {{ request()->routeIs('categories.*') ? 'active border border-dark' : '' }} text-light">
                <i class="fa fa-chart-bar me-2 bg-black bg-opacity-75 text-light"></i>Food Categories
            </a>
            <a href="{{route('dashboard.foodItem.index')}}"
                class="nav-item nav-link {{ request()->routeIs('food_items.*') ? 'active border border-dark' : '' }} text-light">
                <i class="fa fa-chart-bar me-2 bg-black bg-opacity-75 text-light"></i>Food Items
            </a>
        </div>
    </nav>
</div>