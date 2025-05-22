<header>
    <nav class="d-flex justify-content-between align-items-center">
        <img src="<?php echo e(asset('images/logo.png')); ?>" alt="GoalFit Logo" class="img-fluid" style="height: 100px;">

        <div class="d-flex gap-4 d-none d-md-flex">
            <a href="<?php echo e(route('home')); ?>" class="text-decoration-none">Home</a>
            <a href="<?php echo e(route('gym.index')); ?>" class="text-decoration-none">Gyms</a>
            <a href="<?php echo e(route('workout.index')); ?>" class="text-decoration-none">Workout</a>
            <a href="<?php echo e(route('nutrition.index')); ?>" class="text-decoration-none">Nutrition</a>
            <a href="#" class="text-decoration-none">About Us</a>
        </div>

        <div class="d-flex gap-2 align-items-center d-none d-md-flex">
            <form class="d-flex align-items-center siteSearch" action="<?php echo e(route('search')); ?>" method="GET">
                <input class="form-control me-2 search-bar" type="search" placeholder="Search" aria-label="Search"
                    name="search" />
                <button title="Search" class="btn btn-outline-light" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>

            <div class="dropdown">
                <a href="#" class="dropdown-toggle" id="authDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user profileIcon" style="color: #ffffff;"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <?php if(auth()->guard()->check()): ?>
                        <li><span class="dropdown-item-text fs-4">Welcome, <?php echo e(Auth::user()->name); ?></span></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item fs-5" href="<?php echo e(route('profile')); ?>">Profile</a></li>
                        <li>
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="dropdown-item fs-5">Logout</button>
                            </form>
                        </li>
                    <?php else: ?>
                        <li><a class="dropdown-item" href="<?php echo e(route('login')); ?>">Login</a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('register')); ?>">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu"
            aria-expanded="false">
            <i class="fas fa-bars text-white"></i>
        </button>

        <div class="collapse navbar-collapse bg-dark position-absolute top-100 start-0 w-100 p-3" id="mobileMenu"
            style="z-index: 1000;">
            <div class="d-flex flex-column gap-3">
                <a href="#" class="text-decoration-none text-white">Home</a>
                <a href="#" class="text-decoration-none text-white">Gyms</a>
                <a href="#" class="text-decoration-none text-white">Workout</a>
                <a href="#" class="text-decoration-none text-white">Nutrition</a>
                <a href="#" class="text-decoration-none text-white">About Us</a>
                <form class="d-flex mt-2" action="">
                    <input class="form-control me-2" type="search" placeholder="Search" name="search" />
                    <button class="btn btn-outline-light" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <?php if(auth()->guard()->check()): ?>
                    <div class="mt-2">
                        <span class="text-white me-2">Logged in as <?php echo e(Auth::user()->name); ?></span>
                        <form method="POST" action="<?php echo e(route('logout')); ?>" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-sm btn-outline-light">Logout</button>
                        </form>
                    </div>
                <?php else: ?>
                    <div class="d-flex gap-2 mt-2">
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-outline-light flex-grow-1">Login</a>
                        <a href="<?php echo e(route('register')); ?>" class="btn btn-primary flex-grow-1">Register</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header><?php /**PATH C:\Users\leoqu\Desktop\goalfit\resources\views/layouts/public/__nav.blade.php ENDPATH**/ ?>