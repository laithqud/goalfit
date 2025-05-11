<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-opacity-75 navbar-dark">
        <a href="<?php echo e(route('dashboard')); ?>" class="navbar-brand mx-4 mb-3">
            <h3 class="text-light"><i class="fa fa-user-edit me-2 text-light"></i>GoalFit</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="<?php echo e(asset('img/user.jpg')); ?>" alt="" style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-light"><?php echo e(Auth::user()->name ?? 'Admin'); ?></h6>
                <span class="text-light">Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="<?php echo e(route('dashboard')); ?>"
                class="nav-item nav-link <?php echo e(request()->routeIs('dashboard') ? 'active border border-dark' : ''); ?> text-light">
                <i class="fa fa-tachometer-alt me-2 bg-black bg-opacity-75 text-light"></i>Dashboard
            </a>
            <a href="<?php echo e(route('admin.admins.index')); ?>"
                class="nav-item nav-link <?php echo e(request()->routeIs('admins.*') ? 'active border border-dark' : ''); ?> text-light">
                <i class="fa fa-th me-2 bg-black bg-opacity-75 text-light"></i>Admins
            </a>
            <a href="<?php echo e(route('admin.users.index')); ?>"
                class="nav-item nav-link <?php echo e(request()->routeIs('users.*') ? 'active border border-dark' : ''); ?> text-light">
                <i class="fa fa-keyboard me-2 bg-black bg-opacity-75 text-light"></i>Users
            </a>
            <a href="<?php echo e(route('admin.gyms.index')); ?>"
                class="nav-item nav-link <?php echo e(request()->routeIs('gyms.*') ? 'active border border-dark' : ''); ?> text-light">
                <i class="fa fa-table me-2 bg-black bg-opacity-75 text-light"></i>Gyms
            </a>
            <a href="<?php echo e(route('admin.workout-categories.index')); ?>"
                class="nav-item nav-link <?php echo e(request()->routeIs('categories.*') ? 'active border border-dark' : ''); ?> text-light">
                <i class="fa fa-chart-bar me-2 bg-black bg-opacity-75 text-light"></i>Videos Categories
            </a>
            <a href="<?php echo e(route('admin.videos.index')); ?>"
                class="nav-item nav-link <?php echo e(request()->routeIs('videos.*') ? 'active border border-dark' : ''); ?> text-light">
                <i class="fa fa-chart-bar me-2 bg-black bg-opacity-75 text-light"></i>Videos
            </a>
            <a href="<?php echo e(route('admin.nutrition-categories.index')); ?>"
                class="nav-item nav-link <?php echo e(request()->routeIs('categories.*') ? 'active border border-dark' : ''); ?> text-light">
                <i class="fa fa-chart-bar me-2 bg-black bg-opacity-75 text-light"></i>Food Categories
            </a>
            <a href="<?php echo e(route('admin.food-items.index')); ?>"
                class="nav-item nav-link <?php echo e(request()->routeIs('food_items.*') ? 'active border border-dark' : ''); ?> text-light">
                <i class="fa fa-chart-bar me-2 bg-black bg-opacity-75 text-light"></i>Food Items
            </a>
        </div>
    </nav>
</div><?php /**PATH C:\Users\leoqu\Desktop\goalfit\resources\views/layouts/dashboard/__sidebar.blade.php ENDPATH**/ ?>