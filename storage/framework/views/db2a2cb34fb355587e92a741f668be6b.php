<nav class="navbar navbar-expand bg-black bg-opacity-75 navbar-dark sticky-top px-4 py-0">
    <a href="<?php echo e(route('dashboard')); ?>" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-light mb-0"><i class="fa fa-user-edit"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars text-light"></i>
    </a>

    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2" src="<?php echo e(asset('img/user.jpg')); ?>" alt=""
                    style="width: 40px; height: 40px;">
                <span class="d-none d-lg-inline-flex text-light"><?php echo e(Auth::user()->name ?? 'Admin'); ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-primary bg-opacity-50 border-0 rounded-0 rounded-bottom m-0">
                <a href="" class="dropdown-item text-light">My Profile</a>
                <a href="#" class="dropdown-item text-light">Settings</a>
                <form method="POST" action="">
                    <?php echo csrf_field(); ?>
                    <a href="" class="dropdown-item text-light"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        Log Out
                    </a>
                </form>
            </div>
        </div>
    </div>
</nav><?php /**PATH C:\Users\leoqu\Desktop\goalfit\resources\views/layouts/dashboard/__navbar.blade.php ENDPATH**/ ?>