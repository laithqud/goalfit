

<?php $__env->startSection('title', 'Gym Card'); ?>

<?php $__env->startSection('content'); ?>
    <section class="container p-3 border rounded" style="margin-top:90px; margin-bottom: 25px;">
        <div class="row g-4 py-3" style="border-radius: 10px;">
            <!-- Gym Images Carousel -->
            <div class="col-lg-6 d-flex flex-column">
                <div class="flex-grow-1">
                    <div id="gymCarousel" class="carousel slide h-100 rounded-3 overflow-hidden shadow-lg"
                        data-bs-ride="carousel">
                        <div class="carousel-inner h-100">

                            <?php $__currentLoopData = $gym->media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="carousel-item h-100 <?php echo e($loop->first ? 'active' : ''); ?>">
                                    <img src="<?php echo e(Storage::url('gym_images/' . $media)); ?>"
                                        class="d-block w-100 h-100 object-fit-cover" alt="Gym media <?php echo e($index); ?>">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#gymCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark bg-opacity-50 p-3 rounded"
                                aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#gymCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-dark bg-opacity-50 p-3 rounded"
                                aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Gym Details -->
            <div class="col-lg-6 d-flex flex-column p-4">
                <div class="flex-grow-1">

                    <h1 class="display-5 fw-bold text-light mb-3 shadow-lg p-2 rounded"><?php echo e($gym->name); ?></h1>

                    <div class="mb-4 border p-3 rounded">
                        <h2 class="fs-2 text-light mb-2">
                            <i class="fa-solid fa-list-ul me-1 text-danger"></i>Description
                        </h2>
                        <p class="lead text-light"><?php echo e($gym->description); ?></p>
                    </div>

                    <div class="mb-4 border p-3 rounded">
                        <h3 class="fs-2 text-light mb-2">
                            <i class="fa-solid fa-location-dot me-1 text-danger"></i>Location
                        </h3>
                        <p class="mb-0 fs-5 text-light"><?php echo e($gym->address); ?></p>
                        <a href="<?php echo e($gym->location); ?>" target="_blank" class="text-decoration-none text-danger">View on
                            map</a>
                    </div>

                    <div class="mb-4 border p-3 rounded">
                        <h4 class="h4 text-light mb-2">
                            <i class="fas fa-clock text-danger me-2"></i>Opening Hours
                        </h4>
                        <div class="d-flex flex-wrap justify-content-start text-light">
                            <?php $__currentLoopData = $gym->opening_hours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day => $hours): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="me-3 mb-2">
                                    <span class="fw-bold"><?php echo e(ucfirst(substr($day, 0, 3))); ?>:</span>
                                    <?php if(!isset($hours['is_open']) || $hours['is_open'] === false): ?>
                                        <span class="text-danger">Closed</span>
                                    <?php elseif(isset($hours['is_24h']) && $hours['is_24h']): ?>
                                        <span class="text-success">24 Hours</span>
                                    <?php else: ?>
                                        <?php echo e($hours['open']); ?> - <?php echo e($hours['close']); ?>

                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <div class="">
                        <h5 class="h4 text-light">
                            <i class="fas fa-star text-warning me-2"></i>Facilities
                        </h5>
                        <div class="d-flex flex-wrap gap-3">
                            <?php $__currentLoopData = $gym->facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($facility['available']): ?>
                                    <span class="badge bg-light text-dark p-2">
                                        <i class="fas fa-check-circle me-1"></i> <?php echo e(ucfirst($facility['name'])); ?>

                                        <?php if($facility['description']): ?>
                                            <small class="text-muted">(<?php echo e($facility['description']); ?>)</small>
                                        <?php endif; ?>
                                    </span>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <div class="pt-4">
                        <h5 class="h4 text-light">
                            <i class="fas fa-tags text-danger me-2"></i>Membership
                        </h5>
                        <div class="d-flex align-items-center">
                            <span class="display-6 text-secondary fw-bold me-3"><?php echo e($gym->pricing['monthly']); ?></span>
                            <span class="text-light">/month</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Join Button - Now below both columns -->
            <div class="col-12 mt-4">
                <a href="/paymint" class="btn btn-lg w-100 py-3 fw-bold" style="background-color: #4a1b1b; color: white;">
                    <i class="fas fa-heart me-2"></i>Join Now - Only <?php echo e($gym->pricing['monthly']); ?>/month
                </a>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.public.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\leoqu\Desktop\goalfit\resources\views/public/gym-card.blade.php ENDPATH**/ ?>