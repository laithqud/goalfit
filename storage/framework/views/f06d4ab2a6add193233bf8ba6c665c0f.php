

<?php $__env->startSection('title', 'Gym Management'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-black bg-opacity-75 rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-light">Gym Facilities</h6>
                        <a href="<?php echo e(route('admin.gyms.create')); ?>" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus me-1"></i> Add New Gym
                        </a>
                    </div>
                    <?php if(session('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" id="success-alert">
                            <?php echo e(session('success')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <script>
                            setTimeout(function () {
                                $('#success-alert').alert('close');
                            }, 2000);
                        </script>
                    <?php endif; ?>

                    <div class="table-responsive">
                        <table id="gymsTable" class="table table-dark table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Location</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Today Hours</th>
                                    <th>Facilities</th>
                                    <th>Pricing</th>
                                    <th>Added</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $gyms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gym): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $openingHours = $gym->opening_hours ?? [];
                                        $facilities = $gym->facilities ?? [];
                                        $pricing = $gym->pricing ?? [];
                                        $media = $gym->media ?? ['images' => []];

                                        $today = strtolower(now()->englishDayOfWeek);
                                        $todayHours = $openingHours[$today] ?? null;
                                        $hoursDisplay = $todayHours ?
                                            (isset($todayHours['is_24h']) && $todayHours['is_24h'] ? '24 Hours' :
                                                ($todayHours['open'] ?? '') . ' - ' . ($todayHours['close'] ?? '')) : 'N/A';

                                        $facilitiesCount = count($facilities);

                                        $basicPrice = $pricing['plans']['basic']['monthly'] ?? null;
                                        $premiumPrice = $pricing['plans']['premium']['monthly'] ?? null;
                                        $pricingDisplay = $gym->pricing['monthly'] ?? 'N/A';

                                        $featuredImage = collect($media['images'] ?? [])->firstWhere('is_featured', true) ?? $media['images'][0] ?? null;
                                        $imageUrl = $featuredImage['url'] ?? null;
                                        $imagePath = $imageUrl ? ltrim($imageUrl, '/') : null;
                                        $fileExists = $imagePath && Storage::disk('public')->exists($imagePath);
                                    ?>

                                    <tr>
                                        <td><?php echo e($gym->id); ?></td>
                                        <td>
                                            <img src="<?php echo e(asset('storage/gym_images/' . $gym->media[1])); ?>" alt="Gym Image"
                                                class="img-fluid rounded" style="width: 50px; height: 50px;">
                                        </td>
                                        <td><?php echo e($gym->name); ?></td>
                                        <td><?php echo e(Str::limit($gym->description, 50)); ?></td>
                                        <td>
                                            <div><a href="<?php echo e($gym->location); ?>" target="_blank"
                                                    class="text-decoration-none text-light">Location
                                                    on
                                                    Map</a></div>
                                            <small class="text-muted"><?php echo e($gym->address); ?></small>
                                        </td>
                                        <td><?php echo e($gym->phone ?? 'N/A'); ?></td>
                                        <td>
                                            <?php if($gym->is_active): ?>
                                                <span class="badge bg-success">Active</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span data-bs-toggle="tooltip" title="<?php echo e(ucfirst($today)); ?>: <?php echo e($hoursDisplay); ?>">
                                                <?php echo e($hoursDisplay); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <span data-bs-toggle="tooltip" title="<?php echo e($facilitiesCount); ?> facilities">
                                                <?php echo e($facilitiesCount); ?> <i class="fas fa-dumbbell ms-1"></i>
                                            </span>
                                        </td>
                                        <td>
                                            <span data-bs-toggle="tooltip" title="<?php echo e($pricingDisplay); ?>">
                                                <?php echo e($pricingDisplay); ?>

                                            </span>
                                        </td>
                                        <td><?php echo e($gym->created_at->format('M d, Y')); ?></td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="<?php echo e(route('admin.gyms.edit', $gym->id)); ?>"
                                                    class="btn btn-sm btn-warning" data-bs-toggle="tooltip" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="<?php echo e(route('admin.gyms.destroy', $gym->id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                                        title="Delete"
                                                        onclick="return confirm('Are you sure you want to delete this gym?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <style>
        /* Custom styles for DataTables */
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {
            color: #e4e4e4;
            margin-bottom: 10px;
            margin-top: 5px;
        }

        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            background-color: #2b2b2b;
            color: #fff;
            border: 1px solid #444;
            border-radius: 4px;
            padding: 5px 8px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Initialize DataTables
            $('#gymsTable').DataTable({
                responsive: true,
                "ordering": true,
                "pageLength": 10,
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "language": {
                    "search": "Search gyms:",
                    "lengthMenu": "Show _MENU_ gyms per page",
                    "info": "Showing _START_ to _END_ of _TOTAL_ gyms",
                    "infoEmpty": "No gyms found",
                    "infoFiltered": "(filtered from _MAX_ total gyms)"
                },
                "columnDefs": [
                    { "orderable": false, "targets": [1, 11] }, // Disable sorting on image and actions columns
                    { "searchable": false, "targets": [1, 11] } // Disable searching on image and actions columns
                ],
                "drawCallback": function (settings) {
                    // Reinitialize tooltips after DataTable redraws
                    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                    tooltipTriggerList.map(function (tooltipTriggerEl) {
                        return new bootstrap.Tooltip(tooltipTriggerEl);
                    });
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.dashboard.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\leoqu\Desktop\goalfit\resources\views/admin/gyms/index.blade.php ENDPATH**/ ?>