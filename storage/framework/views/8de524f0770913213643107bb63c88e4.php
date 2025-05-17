

<?php $__env->startSection('title', 'Edit Nutrition Category'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-black bg-opacity-75 rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-light">Edit Nutrition Category</h6>
                        <a href="<?php echo e(route('admin.nutrition-categories.index')); ?>" class="btn btn-sm btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Back to List
                        </a>
                    </div>

                    <form method="POST" action="<?php echo e(route('admin.nutrition-categories.update', $category->id)); ?>"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label text-white">Category Name</label>
                                    <input type="text" class="form-control bg-secondary border-dark text-white" id="name"
                                        name="name" value="<?php echo e(old('name', $category->name)); ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label text-white">Description</label>
                                    <textarea class="form-control bg-secondary border-dark text-white" id="description"
                                        name="description" rows="3"
                                        required><?php echo e(old('description', $category->description)); ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label text-white">Category Image</label>
                                    <input type="file" class="form-control bg-secondary border-dark text-white" id="image"
                                        name="image">
                                    <?php if($category->image_url): ?>
                                        <small class="text-muted">Current:
                                            <a href="<?php echo e(asset('storage/' . $category->image_url)); ?>" target="_blank">View
                                                Image</a>
                                        </small>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="calories" class="form-label text-white">Calories (per serving)</label>
                                    <input type="number" class="form-control bg-secondary border-dark text-white"
                                        id="calories" name="calories" value="<?php echo e(old('calories', $category->calories)); ?>"
                                        required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="protien" class="form-label text-white">Protein (g)</label>
                                        <input type="number" step="0.1"
                                            class="form-control bg-secondary border-dark text-white" id="protien"
                                            name="protien" value="<?php echo e(old('protien', $category->protien)); ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="carbs" class="form-label text-white">Carbs (g)</label>
                                        <input type="number" step="0.1"
                                            class="form-control bg-secondary border-dark text-white" id="carbs" name="carbs"
                                            value="<?php echo e(old('carbs', $category->carbs)); ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="fat" class="form-label text-white">Fat (g)</label>
                                        <input type="number" step="0.1"
                                            class="form-control bg-secondary border-dark text-white" id="fat" name="fat"
                                            value="<?php echo e(old('fat', $category->fat)); ?>" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="nutrients" class="form-label text-white">Additional Nutrients (JSON)</label>
                                    <textarea class="form-control bg-secondary border-dark text-white" id="nutrients"
                                        name="nutrients"
                                        rows="3"><?php echo e(old('nutrients', json_encode($category->nutrients))); ?></textarea>
                                    <small class="text-muted">Example: {"vitamins": {"A": "10%"}}</small>
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Update Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // JSON validation for nutrients field
            document.getElementById('nutrients').addEventListener('input', function () {
                try {
                    if (this.value) JSON.parse(this.value);
                    this.classList.remove('is-invalid');
                } catch (e) {
                    this.classList.add('is-invalid');
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.dashboard.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\leoqu\Desktop\goalfit\resources\views/admin/nutrition-categories/edit.blade.php ENDPATH**/ ?>