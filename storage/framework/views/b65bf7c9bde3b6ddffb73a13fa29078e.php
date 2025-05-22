

<?php $__env->startSection('title', 'GoalFit - No Results Found'); ?>

<?php $__env->startSection('content'); ?>

    <div class="d-flex flex-column justify-content-center align-items-center"
        style="height: 70vh; background-color: #1a1a1a;">
        <div class="text-center rounded mt-5" style="max-width: 800px;">
            <h1 class="display-4 fw-bold text-light mb-4">No Results Found for "<?php echo e($search); ?>"</h1>
            <p class="lead text-light mb-5 fs-4">
                We couldn't find any matches for your search. Try different keywords or explore our featured content below.
            </p>

            <div class="d-flex flex-wrap justify-content-center gap-4 mb-5">
                <a href="<?php echo e(route('gym.index')); ?>" class="btn btn-lg px-4"
                    style="background-color: #4d0909; color: #ffffff;">
                    Explore Gyms
                </a>
                <a href="<?php echo e(route('workout.index')); ?>" class="btn btn-lg px-4"
                    style="background-color: #4d0909; color: #ffffff;">
                    Workout Plans
                </a>
                <a href="<?php echo e(route('nutrition.index')); ?>" class="btn btn-lg px-4"
                    style="background-color: #4d0909; color: #ffffff;">
                    Nutrition Guides
                </a>
            </div>

            <a href="<?php echo e(route('home')); ?>" class="btn btn-outline-light btn-lg px-5">
                <i class="fas fa-arrow-left me-2"></i> Return to Homepage
            </a>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.public.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\leoqu\Desktop\goalfit\resources\views/public/no_results.blade.php ENDPATH**/ ?>