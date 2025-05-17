

<?php $__env->startSection('title', 'GoalFit - Protein Nutrition'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container" style="margin-top: 6rem;">

        <!-- Product Main Section -->
        <div class="row g-4">
            
            <!-- Product Image -->
            <div class="col-lg-6">
                <div class="bg-light p-4 rounded-3 shadow-sm">
                    <img src="<?php echo e(asset(Storage::url($category->image_url))); ?>" alt="Protein Sources"
                        class="img-fluid rounded-3">
                </div>
            </div>

            <!-- Product Details -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h1 class="display-6 fw-bold"><?php echo e($category->name); ?></h1>
                        

                        <!-- Nutrition Highlights -->
                        <div class="row g-3 mb-4">
                            <div class="col-6 col-md-3 text-center">
                                <div class="p-3 bg-light rounded">
                                    <i class="fas fa-fire text-danger mb-2"></i>
                                    <p class="mb-0 fw-bold"><?php echo e($category->calories); ?> cal</p>
                                    <small class="text-muted">per serving</small>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 text-center">
                                <div class="p-3 bg-light rounded">
                                    <i class="fas fa-dumbbell text-primary mb-2"></i>
                                    <p class="mb-0 fw-bold"><?php echo e($category->protien); ?></p>
                                    <small class="text-muted">protein</small>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 text-center">
                                <div class="p-3 bg-light rounded">
                                    <i class="fas fa-seedling text-success mb-2"></i>
                                    <p class="mb-0 fw-bold"><?php echo e($category->carbs); ?></p>
                                    <small class="text-muted">carbs</small>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 text-center">
                                <div class="p-3 bg-light rounded">
                                    <i class="fas fa-oil-can text-warning mb-2"></i>
                                    <p class="mb-0 fw-bold"><?php echo e($category->fat); ?></p>
                                    <small class="text-muted">fat</small>
                                </div>
                            </div>
                        </div>

                        <p class="lead"><?php echo e($category->description); ?></p>

                        <!-- NEW: Additional Protein Information -->
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- Nutritional Details Section -->
        <div class="row mt-5">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-success text-white">
                        <h2 class="h5 mb-0">Protein Nutrition Guide</h2>
                    </div>
                    <div class="card-body">
                        <!-- Combined Section 1 -->
                        

                        <!-- Additional Food Sources -->
                        <div class="p-3 bg-light rounded">
                            <h3 class="h5 text-success mb-3"><i class="fas fa-utensils me-2"></i> Example Food Sources</h3>
                            </h3>
                            <div class="row g-3 gap-2">
                                <?php $__currentLoopData = $category->foodItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-6 col-md-3 border p-3 text-center">
                                        <img src="<?php echo e(asset(Storage::url($food->image_url))); ?>" class="rounded mb-2" width="60"
                                            height="60" alt="Beef">
                                        <h4 class="h6 mb-1"><?php echo e($food->name); ?></h4>
                                        <p class="small mb-1"><?php echo e($food->description); ?></p>
                                        
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Usage Tips Sidebar -->
            <div class="col-lg-4">
                

                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h2 class="h5 mb-0">Nutrition Facts</h2>
                    </div>
                    <div class="card-body">
                        
                        <ol>
                            <?php $__currentLoopData = $category->nutrients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="mb-2 fs-5"><?php echo e($key); ?>: <?php echo e($value); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.public.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\leoqu\Desktop\goalfit\resources\views/public/food-desc.blade.php ENDPATH**/ ?>