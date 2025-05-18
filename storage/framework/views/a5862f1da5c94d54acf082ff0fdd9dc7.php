

<?php $__env->startSection('title', 'GoalFit - Find Your Perfect Gym'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Hero Section -->
    <div class="gym-hero position-relative" style="background-image: url('<?php echo e(asset('images/gym.png')); ?>'); height: 100vh;">
        <div class="hero-overlay"></div>
        <div class="hero-content container text-center text-white">
            <h1 class="display-3 fw-bold mb-4">Find Your Perfect Gym</h1>
            <p class="lead fs-3 mb-5">Discover fitness centers tailored to your goals, preferences, and location</p>
            <div class="search-box mx-auto bg-white rounded-pill p-2">
                <form action="<?php echo e(route('gym.search')); ?>" class="d-flex align-items-center">
                    <i class="fas fa-map-marker-alt text-dark ms-3 me-2"></i>
                    <input type="text" name="location" class="form-control border-0 shadow-none"
                        placeholder="Enter your location">
                    <button class="btn btn-danger rounded-pill px-4" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
    <?php if(isset($message)): ?>
        <div class="alert alert-success alert-dismissible fade show" id="success-alert">
            <?php echo e($message); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            setTimeout(function () {
                $('#success-alert').alert('close');
            }, 2000);
        </script>
    <?php endif; ?>

    <!-- Featured Gyms Section -->
    <section class="py-5" style="background-color: #390707">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold display-6 text-light">Featured Gyms Near You</h2>
            </div>

            <div class="row g-4">
                <?php $__currentLoopData = $gyms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gym): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card gym-card h-100 border-0 overflow-hidden shadow-sm" style="background-color: lightgray">
                            <div class="gym-card-img"
                                style="background-image: url('<?php echo e(isset($gym->media[1]) ? asset('storage/gym_images/' . $gym->media[1]) : asset('images/gym.png')); ?>');">
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h3 class="h5 fw-bold mb-0"><?php echo e($gym->name); ?></h3>
                                    <span class="badge bg-success">4.8 <i class="fas fa-star"></i></span>
                                </div>
                                <p class="text-muted mb-3"><i class="fas fa-map-marker-alt text-danger me-2"></i>
                                    <?php echo e($gym->address); ?>

                                </p>

                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    <?php $__currentLoopData = $gym->facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($facility['available'] == "1"): ?>
                                            <span class="badge bg-light text-dark border">
                                                <i class="fas fa-check me-1"></i>
                                                <?php echo e($facility['name']); ?>

                                            </span>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <div class="d-flex justify-content-between align-items-center pt-3">
                                    <h4 class="fw-bold text-danger position-absolute bottom-0 start-0 mb-3 ms-3">
                                        <?php echo e($gym->pricing['monthly']); ?>

                                        <small class="text-muted fs-6">/month</small>
                                    </h4>
                                    <a href="<?php echo e(route('gym.detailes', ['id' => $gym->id])); ?>"
                                        class="btn btn-sm btn-danger position-absolute bottom-0 end-0 mb-3 me-3">View
                                        Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>


    <!-- Membership Plans -->
    <section class="py-5 bg-dark text-white mb-2">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold display-5">Flexible Membership Options</h2>
                <p class="lead opacity-75">Choose the plan that works best for your fitness journey</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 bg-secondary bg-opacity-10">
                        <div class="card-body p-4 text-center">
                            <h3 class="h4 fw-bold mb-3">Basic</h3>
                            <h4 class="display-4 fw-bold mb-3">$19<small class="fs-6 opacity-75">/month</small></h4>
                            <ul class="list-unstyled mb-4">
                                <li class="py-2 border-bottom border-secondary border-opacity-25"><i
                                        class="fas fa-check text-success me-2"></i> Single gym access</li>
                                <li class="py-2 border-bottom border-secondary border-opacity-25"><i
                                        class="fas fa-check text-success me-2"></i> Standard equipment</li>
                                <li class="py-2 border-bottom border-secondary border-opacity-25"><i
                                        class="fas fa-times text-danger me-2"></i> Group classes</li>
                                <li class="py-2"><i class="fas fa-times text-danger me-2"></i> Personal trainer</li>
                            </ul>
                            <a href="#" class="btn btn-outline-light w-100">Get Started</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 bg-danger">
                        <div class="card-body p-4 text-center position-relative">
                            <span
                                class="badge bg-warning text-dark position-absolute top-0 start-50 translate-middle px-3 py-2 rounded-pill">Most
                                Popular</span>
                            <h3 class="h4 fw-bold mb-3">Premium</h3>
                            <h4 class="display-4 fw-bold mb-3">$39<small class="fs-6 opacity-75">/month</small></h4>
                            <ul class="list-unstyled mb-4">
                                <li class="py-2 border-bottom border-light border-opacity-25"><i
                                        class="fas fa-check text-success me-2"></i> Multi-gym access</li>
                                <li class="py-2 border-bottom border-light border-opacity-25"><i
                                        class="fas fa-check text-success me-2"></i> Premium equipment</li>
                                <li class="py-2 border-bottom border-light border-opacity-25"><i
                                        class="fas fa-check text-success me-2"></i> Unlimited classes</li>
                                <li class="py-2"><i class="fas fa-times text-danger me-2"></i> Personal trainer</li>
                            </ul>
                            <a href="#" class="btn btn-light text-danger fw-bold w-100">Get Started</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 bg-secondary bg-opacity-10">
                        <div class="card-body p-4 text-center">
                            <h3 class="h4 fw-bold mb-3">VIP</h3>
                            <h4 class="display-4 fw-bold mb-3">$79<small class="fs-6 opacity-75">/month</small></h4>
                            <ul class="list-unstyled mb-4">
                                <li class="py-2 border-bottom border-secondary border-opacity-25"><i
                                        class="fas fa-check text-success me-2"></i> All gyms access</li>
                                <li class="py-2 border-bottom border-secondary border-opacity-25"><i
                                        class="fas fa-check text-success me-2"></i> VIP areas</li>
                                <li class="py-2 border-bottom border-secondary border-opacity-25"><i
                                        class="fas fa-check text-success me-2"></i> Unlimited classes</li>
                                <li class="py-2"><i class="fas fa-check text-success me-2"></i> Personal trainer</li>
                            </ul>
                            <a href="#" class="btn btn-outline-light w-100">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    

    <!-- CTA Section -->
    
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        .gym-hero {
            height: 70vh;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .search-box {
            max-width: 600px;
        }

        .gym-card-img {
            height: 200px;
            background-size: cover;
            background-position: center;
        }

        .icon-box {
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .gym-card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.public.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\leoqu\Desktop\goalfit\resources\views/public/gym.blade.php ENDPATH**/ ?>