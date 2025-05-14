

<?php $__env->startSection('title', 'GoalFit - Workout Programs'); ?>

<?php $__env->startSection('content'); ?>

    <!-- Hero Section -->
    <section class="workout-hero position-relative"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo e(asset('images/home.jpg')); ?>');">
        <div class="container h-100 d-flex align-items-center">
            <div class="text-white text-center py-5 w-100">
                <h1 class="display-3 fw-bold mb-4 animate__animated animate__fadeInDown">Transform Your Fitness Journey</h1>
                <p class="lead fs-3 mb-5 animate__animated animate__fadeInUp">Personalized workout programs designed for
                    your goals and lifestyle</p>
                <a href="#categories" class="btn btn-danger btn-lg px-4 py-2 animate__animated animate__fadeIn">Explore
                    Programs</a>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="py-5 bg-dark text-light">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-md-4">
                    <div class="p-4 rounded bg-dark">
                        <i class="fas fa-dumbbell fa-3x text-danger mb-3"></i>
                        <h3>Custom Workouts</h3>
                        <p>Programs tailored to your fitness level and equipment availability</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 rounded bg-dark">
                        <i class="fas fa-calendar-alt fa-3x text-danger mb-3"></i>
                        <h3>Flexible Scheduling</h3>
                        <p>Work out on your time, at your pace, from anywhere</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 rounded bg-dark">
                        <i class="fas fa-chart-line fa-3x text-danger mb-3"></i>
                        <h3>Track Progress</h3>
                        <p>Monitor your improvements and stay motivated</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Workout Categories -->
    <section id="categories" class="py-5 bg-black">
        <div class="container">
            <h2 class="text-center text-light mb-5 display-4 fw-bold">Workout Programs</h2>
            <div class="container">
                <div class="row g-4">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4 d-flex">
                            <div class="card workout-card h-100 border-0 overflow-hidden shadow-lg">
                                <img src="<?php echo e($category->image ? asset('storage/' . $category->image) : asset('images/fullbody.jpg')); ?>"
                                    class="card-img-top" alt="<?php echo e($category->name); ?>">
                                <div class="card-body" style="background-color: #373740">
                                    <h3 class="card-title fw-bold text-light fs-4"><?php echo e($category->name); ?></h3>
                                    <p class="card-text text-light fs-5"><?php echo e($category->description); ?></p>
                                    <a href="<?php echo e(route('schedule.index', ['category' => $category->id])); ?>"
                                        class="btn btn-outline-danger mt-2">Start Programs</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            
        </div>
    </section>

    <!-- Expert Guidance Section -->
    <section class="py-5 bg-dark text-light mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="display-4 fw-bold mb-4">Expert Guidance</h2>
                    <p class="lead mb-4 fs-3">Our certified trainers create science-backed programs tailored to your unique
                        needs
                        and goals.</p>
                    <ul class="list-unstyled">
                        <li class="mb-3 fs-5"><i class="fas fa-check-circle text-danger me-2"></i> Personalized workout
                            plans
                        </li>
                        <li class="mb-3 fs-5"><i class="fas fa-check-circle text-danger me-2"></i> Proper form
                            demonstrations
                        </li>
                        <li class="mb-3 fs-5"><i class="fas fa-check-circle text-danger me-2"></i> Progressive overload
                            techniques</li>
                        <li class="mb-3 fs-5"><i class="fas fa-check-circle text-danger me-2"></i> Nutrition recommendations
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <img src="<?php echo e(asset('./images/coach.png')); ?>" alt="Fitness Coach" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <h2 class="text-center text-light display-4 fw-bold  mb-2">Meet Our Coaches</h2>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card coach-card h-100 border-0 overflow-hidden bg-dark text-light shadow-lg">
                        <img src="<?php echo e(asset('./images/coach1.jpg')); ?>" class="card-img-top" alt="Coach Alex">
                        <div class="card-body text-center">
                            <h3 class="card-title fw-bold">Alex Johnson</h3>
                            <h6 class="text-danger mb-3">Strength Training Specialist</h6>
                            <p class="card-text">10+ years experience helping clients build functional strength.</p>
                            <div class="social-icons mt-3">
                                <a href="#" class="text-light mx-2"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="text-light mx-2"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card coach-card h-100 border-0 overflow-hidden bg-dark text-light shadow-lg">
                        <img src="<?php echo e(asset('./images/coach1.jpg')); ?>" class="card-img-top" alt="Coach Maria">
                        <div class="card-body text-center">
                            <h3 class="card-title fw-bold">Maria Garcia</h3>
                            <h6 class="text-danger mb-3">Yoga & Mobility Expert</h6>
                            <p class="card-text">Specializing in flexibility and injury prevention.</p>
                            <div class="social-icons mt-3">
                                <a href="#" class="text-light mx-2"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="text-light mx-2"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card coach-card h-100 border-0 overflow-hidden bg-dark text-light shadow-lg">
                        <img src="<?php echo e(asset('./images/coach1.jpg')); ?>" class="card-img-top" alt="Coach David">
                        <div class="card-body text-center">
                            <h3 class="card-title fw-bold">David Chen</h3>
                            <h6 class="text-danger mb-3">HIIT & Conditioning Coach</h6>
                            <p class="card-text">Helping clients maximize results in minimal time.</p>
                            <div class="social-icons mt-3">
                                <a href="#" class="text-light mx-2"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="text-light mx-2"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        .workout-hero {
            background-size: cover;
            background-position: center;
            min-height: 80vh;
            display: flex;
            align-items: center;
        }

        .workout-card,
        .coach-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .workout-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(220, 53, 69, 0.3) !important;
        }

        .coach-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(220, 53, 69, 0.2) !important;
        }

        .coach-card img {
            height: 300px;
            object-fit: cover;
        }

        .social-icons a {
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: #dc3545 !important;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: white !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <!-- Add any necessary scripts here -->
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.public.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\leoqu\Desktop\goalfit\resources\views/public/workout.blade.php ENDPATH**/ ?>