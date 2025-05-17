

<?php $__env->startSection('title', 'GoalFit - Nutrition Plans'); ?>

<?php $__env->startSection('content'); ?>

    <!-- Hero Section -->
    <section class="nutrition-hero position-relative"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo e(asset('images/nutrition-hero.jpg')); ?>'); height: 550px;">
        <div class="container h-100 d-flex align-items-center">
            <div class="text-white text-center py-5 w-100">
                <h1 class="display-3 fw-bold mb-4 animate__animated animate__fadeInDown">Fuel Your Fitness Journey</h1>
                <p class="lead fs-3 mb-5 animate__animated animate__fadeIn">Personalized nutrition plans to complement your
                    workouts</p>
                <a href="#calculator" class="btn btn-success btn-lg px-4 py-2 animate__animated animate__fadeIn">Calculate
                    Your Needs</a>
            </div>
        </div>
    </section>

    <!-- Search and Filter Section -->
    <section class="py-4 bg-black text-white">
        <div class="container">
            <div class="row g-3 align-items-center">
                <div class="col-md-6">
                    <div class="input-group">

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-center justify-content-md-end">

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-suucess text-light py-5">
        <div class="container py-4">
            <!-- Header Section -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold text-success mb-3">Understanding Nutrition</h2>
                    <p class="lead mb-0">
                        What you eat powers your fitness journey. Explore these essential food categories:
                    </p>
                </div>
            </div>

            <!-- Categories Grid -->
            <div class="row g-4">
                <!-- Protein -->

                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-lg-3">
                        <div class="card h-100 border-black bg-dark text-center">
                            <img src="<?php echo e(Storage::url($category->image_url)); ?>" class="card-img-top" alt="Protein"
                                style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h3 class="h4 text-success"><?php echo e($category->name); ?></h3>
                                <p class="card-text small">
                                    <?php echo e($category->description); ?>

                                </p>
                            </div>
                            <div class="card-footer bg-success border-0 py-3">
                                <a href="<?php echo e(route('food-item.index', ['category' => $category->id])); ?>"
                                    class="text-white text-decoration-none">
                                    Learn More <i class="fas fa-arrow-right ms-1"></i>
                                </a>


                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <!-- Calorie Calculator -->
    <section id="calculator" class="py-5 bg-dark text-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-4">Calculate Your Calorie Needs</h2>
                    <p class="lead mb-5">Get personalized nutrition recommendations based on your goals and activity level.
                    </p>

                    <div class="card bg-black text-start border-0 shadow-lg">
                        <div class="card-body p-4">
                            <form id="calorieCalculator">
                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label">Gender</label>
                                        <select class="form-select" id="gender" required>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Age</label>
                                        <input type="number" class="form-control" id="age" placeholder="e.g. 30" required>
                                    </div>
                                </div>

                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label">Height (cm)</label>
                                        <input type="number" class="form-control" id="height" placeholder="e.g. 175"
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Weight (kg)</label>
                                        <input type="number" class="form-control" id="weight" placeholder="e.g. 70"
                                            required>
                                    </div>
                                </div>

                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label">Activity Level</label>
                                        <select class="form-select" id="activity" required>
                                            <option value="1.2">Sedentary (little or no exercise)</option>
                                            <option value="1.375">Lightly Active (light exercise 1-3 days/week)</option>
                                            <option value="1.55">Moderately Active (moderate exercise 3-5 days/week)
                                            </option>
                                            <option value="1.725">Very Active (hard exercise 6-7 days/week)</option>
                                            <option value="1.9">Extremely Active (very hard exercise & physical job)
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Goal</label>
                                        <select class="form-select" id="goal" required>
                                            <option value="-500">Weight Loss</option>
                                            <option value="0">Maintenance</option>
                                            <option value="500">Muscle Gain</option>
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success btn-lg w-100 mb-4">Calculate My Needs</button>
                            </form>

                            <!-- Results Section (initially hidden) -->
                            <div id="results" class="mt-4 d-none">
                                <h4 class="text-center mb-4">Your Daily Nutrition Plan</h4>

                                <div class="card bg-dark border-success mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title text-success">Calorie Needs</h5>
                                        <div class="display-4 fw-bold" id="calories-result">0</div>
                                        <p class="text-muted">calories per day</p>
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="card bg-dark border-success h-100">
                                            <div class="card-body">
                                                <h5 class="card-title text-success">Protein</h5>
                                                <div class="h3 fw-bold" id="protein-result">0g</div>
                                                <p class="text-muted">30% of calories</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card bg-dark border-success h-100">
                                            <div class="card-body">
                                                <h5 class="card-title text-success">Carbs</h5>
                                                <div class="h3 fw-bold" id="carbs-result">0g</div>
                                                <p class="text-muted">40% of calories</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card bg-dark border-success h-100">
                                            <div class="card-body">
                                                <h5 class="card-title text-success">Fats</h5>
                                                <div class="h3 fw-bold" id="fats-result">0g</div>
                                                <p class="text-muted">30% of calories</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 text-center">
                                    <button id="reset-btn" class="btn btn-outline-light">Start Over</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="nutrition-plan-section py-5 bg-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="text-center mb-5">
                        <h2 class="display-5 fw-bold text-success mb-3">Personalized Weekly Nutrition Plan</h2>
                        <p class="lead text-light">Get a customized 7-day meal plan based on your fitness goals</p>
                    </div>

                    <!-- Form Section -->
                    <div id="nutrition-form" class="card border-success mb-5 bg-dark-2">
                        <div class="card-header bg-success text-white py-3">
                            <h3 class="h4 mb-0"><i class="fas fa-user-edit me-2"></i>Your Profile</h3>
                        </div>
                        <div class="card-body p-4">
                            <form id="plan-form">
                                <div class="row g-3">
                                    <!-- Basic Info -->
                                    <div class="col-md-6">
                                        <label class="form-label text-light">Gender</label>
                                        <select class="form-select bg-dark border-secondary text-light" id="gender"
                                            required>
                                            <option value="">Select</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-light">Age</label>
                                        <input type="number" class="form-control bg-dark border-secondary text-light"
                                            id="age" placeholder="e.g. 28" required>
                                    </div>

                                    <!-- Body Metrics -->
                                    <div class="col-md-6">
                                        <label class="form-label text-light">Height (cm)</label>
                                        <input type="number" class="form-control bg-dark border-secondary text-light"
                                            id="height" placeholder="e.g. 175" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-light">Weight (kg)</label>
                                        <input type="number" class="form-control bg-dark border-secondary text-light"
                                            id="weight" placeholder="e.g. 75" required>
                                    </div>

                                    <!-- Activity Level -->
                                    <div class="col-md-6">
                                        <label class="form-label text-light">Activity Level</label>
                                        <select class="form-select bg-dark border-secondary text-light" id="activity"
                                            required>
                                            <option value="">Select</option>
                                            <option value="1.2">Sedentary (little exercise)</option>
                                            <option value="1.375">Lightly Active</option>
                                            <option value="1.55">Moderately Active</option>
                                            <option value="1.725">Very Active</option>
                                            <option value="1.9">Extremely Active</option>
                                        </select>
                                    </div>

                                    <!-- Goal Selection -->
                                    <div class="col-md-6">
                                        <label class="form-label text-light">Your Goal</label>
                                        <div class="btn-group w-100" role="group">
                                            <input type="radio" class="btn-check" name="goal" id="goal-cut" value="cut"
                                                autocomplete="off" required>
                                            <label class="btn btn-outline-success" for="goal-cut">Cut</label>

                                            <input type="radio" class="btn-check" name="goal" id="goal-normal"
                                                value="maintain" autocomplete="off">
                                            <label class="btn btn-outline-success" for="goal-normal">Maintain</label>

                                            <input type="radio" class="btn-check" name="goal" id="goal-bulk" value="bulk"
                                                autocomplete="off">
                                            <label class="btn btn-outline-success" for="goal-bulk">Bulk</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 text-center">
                                    <button type="submit" class="btn btn-success btn-lg px-5">
                                        <i class="fas fa-calculator me-2"></i> Generate My Plan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Results Section -->
                    <div id="plan-results" class="d-none">
                        <div class="card border-success bg-dark-2">
                            <div class="card-header bg-success text-white py-3">
                                <h3 class="h4 mb-0"><i class="fas fa-clipboard-list me-2"></i>Your Weekly Nutrition Plan
                                </h3>
                            </div>
                            <div class="card-body">
                                <!-- Plan Overview -->
                                <div class="row mb-4">
                                    <div class="col-md-4 mb-3 mb-md-0">
                                        <div class="card h-100 border-success bg-dark">
                                            <div class="card-body text-center">
                                                <h5 class="text-success">Daily Calories</h5>
                                                <div class="display-4 fw-bold text-light" id="result-calories">0</div>
                                                <p class="text-muted mb-0">kcal per day</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mb-md-0">
                                        <div class="card h-100 border-success bg-dark">
                                            <div class="card-body text-center">
                                                <h5 class="text-success">Macronutrients</h5>
                                                <div class="d-flex justify-content-around text-light">
                                                    <div>
                                                        <div class="h4 fw-bold" id="result-protein">0g</div>
                                                        <small class="text-muted">Protein</small>
                                                    </div>
                                                    <div>
                                                        <div class="h4 fw-bold" id="result-carbs">0g</div>
                                                        <small class="text-muted">Carbs</small>
                                                    </div>
                                                    <div>
                                                        <div class="h4 fw-bold" id="result-fats">0g</div>
                                                        <small class="text-muted">Fats</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card h-100 border-success bg-dark">
                                            <div class="card-body text-center">
                                                <h5 class="text-success">Recommended</h5>
                                                <div class="h4 fw-bold text-light" id="result-goal">Maintain</div>
                                                <p class="text-muted mb-0" id="result-description">Weight maintenance plan
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Weekly Plan Tabs -->
                                <ul class="nav nav-tabs mb-4" id="weekDaysTab" role="tablist">
                                    <!-- Days will be added here by JavaScript -->
                                </ul>

                                <!-- Weekly Plan Content -->
                                <div class="tab-content" id="weekDaysContent">
                                    <!-- Day content will be added here by JavaScript -->
                                </div>

                                <div class="mt-4 text-center">
                                    <button id="reset-form" class="btn btn-outline-success">
                                        <i class="fas fa-redo me-2"></i> Start Over
                                    </button>
                                    
                                    <button class="btn btn-success ms-2" onclick="downloadNutritionPlanPDF()">
                                        <i class="fas fa-download me-2"></i> Download as PDF
                                    </button>
                                    <button class="btn btn-outline-success ms-2" onclick="downloadNutritionPlan()">
                                        <i class="fas fa-file-alt me-2"></i> Download as Text
                                    </button>
                                </div>
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
        .nutrition-plan-section {
            background-color: #1a1a1a;
        }

        .bg-dark-2 {
            background-color: #2a2a2a;
        }

        .form-control,
        .form-select {
            background-color: #333;
            border-color: #444;
            color: #fff;
        }

        .form-control:focus,
        .form-select:focus {
            background-color: #333;
            color: #fff;
            border-color: #198754;
            box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25);
        }

        .nav-tabs {
            border-bottom: 1px solid #444;
        }

        .nav-tabs .nav-link {
            color: #aaa;
            background-color: #333;
            border-color: #444;
        }

        .nav-tabs .nav-link.active {
            color: #fff;
            background-color: #198754;
            border-color: #198754;
        }

        .tab-content {
            background-color: #2a2a2a;
            padding: 20px;
            border: 1px solid #444;
            border-top: none;
            border-radius: 0 0 5px 5px;
        }

        .btn-check:checked+.btn-outline-success {
            background-color: #198754;
            color: white;
        }

        .card {
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3) !important;
        }

        .text-light {
            color: #f8f9fa !important;
        }

        .text-muted {
            color: #6c757d !important;
        }

        .nav-link {
            transition: all 0.2s ease;
            border-radius: 4px;
            padding: 8px 12px;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: rgba(61, 220, 53, 0.1);
            color: #35dc54 !important;
        }

        .nutrition-facts {
            background-color: #f8f9fa;
            border-radius: 6px;
            padding: 10px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>

    <script src="https://kit.fontawesome.com/d24639e9bf.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        document.getElementById('calorieCalculator').addEventListener('submit', function (e) {
            e.preventDefault();

            // Get form values
            const gender = document.getElementById('gender').value;
            const age = parseFloat(document.getElementById('age').value);
            const height = parseFloat(document.getElementById('height').value);
            const weight = parseFloat(document.getElementById('weight').value);
            const activity = parseFloat(document.getElementById('activity').value);
            const goalAdjustment = parseFloat(document.getElementById('goal').value);

            // Calculate BMR (Mifflin-St Jeor Equation)
            let bmr;
            if (gender === 'male') {
                bmr = (10 * weight) + (6.25 * height) - (5 * age) + 5;
            } else {
                bmr = (10 * weight) + (6.25 * height) - (5 * age) - 161;
            }

            // Calculate TDEE (Total Daily Energy Expenditure)
            const tdee = Math.max(1200, Math.round(bmr * activity)); // Minimum 1200 calories

            // Adjust for goal
            let dailyCalories, goalText, description;
            switch (goal) {
                case 'cut':
                    dailyCalories = Math.max(1200, tdee - 500); // Ensure minimum 1200 calories
                    goalText = 'Cutting';
                    description = 'Calorie deficit for fat loss';
                    break;
                case 'bulk':
                    dailyCalories = tdee + 500;
                    goalText = 'Bulking';
                    description = 'Calorie surplus for muscle gain';
                    break;
                default:
                    dailyCalories = tdee;
                    goalText = 'Maintenance';
                    description = 'Weight maintenance plan';
            }


            // Calculate macros (30% protein, 40% carbs, 30% fat)
            const proteinGrams = Math.max(0, Math.round((dailyCalories * 0.3) / 4));
            const carbsGrams = Math.max(0, Math.round((dailyCalories * 0.4) / 4));
            const fatGrams = Math.max(0, Math.round((dailyCalories * 0.3) / 9));

            // Display results
            document.getElementById('calories-result').textContent = dailyCalories;
            document.getElementById('protein-result').textContent = proteinGrams + 'g';
            document.getElementById('carbs-result').textContent = carbsGrams + 'g';
            document.getElementById('fats-result').textContent = fatGrams + 'g';

            // Show results section
            document.getElementById('results').classList.remove('d-none');

            // Scroll to results
            document.getElementById('results').scrollIntoView({ behavior: 'smooth' });
        });

        document.getElementById('reset-btn').addEventListener('click', function () {
            document.getElementById('calorieCalculator').reset();
            document.getElementById('results').classList.add('d-none');
        });

        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('plan-form');
            const resultsSection = document.getElementById('plan-results');

            form.addEventListener('submit', function (e) {
                e.preventDefault();

                // Get form values with proper number conversion
                const gender = document.getElementById('gender').value;
                const age = Number(document.getElementById('age').value);
                const height = Number(document.getElementById('height').value);
                const weight = Number(document.getElementById('weight').value);
                const activity = Number(document.getElementById('activity').value);
                const goal = document.querySelector('input[name="goal"]:checked').value;

                // Validate inputs
                if (isNaN(age) || isNaN(height) || isNaN(weight) || isNaN(activity)) {
                    alert('Please enter valid numbers for all fields');
                    return;
                }

                // Calculate BMR (Mifflin-St Jeor Equation)
                let bmr;
                if (gender === 'male') {
                    bmr = (10 * weight) + (6.25 * height) - (5 * age) + 5;
                } else {
                    bmr = (10 * weight) + (6.25 * height) - (5 * age) - 161;
                }

                // Calculate TDEE
                const tdee = Math.round(bmr * activity);

                // Adjust calories based on goal
                let dailyCalories, goalText, description;
                switch (goal) {
                    case 'cut':
                        dailyCalories = tdee - 500;
                        goalText = 'Cutting';
                        description = 'Calorie deficit for fat loss';
                        break;
                    case 'bulk':
                        dailyCalories = tdee + 500;
                        goalText = 'Bulking';
                        description = 'Calorie surplus for muscle gain';
                        break;
                    default:
                        dailyCalories = tdee;
                        goalText = 'Maintenance';
                        description = 'Weight maintenance plan';
                }

                // Calculate macros (30% protein, 40% carbs, 30% fat)
                const proteinGrams = Math.round((dailyCalories * 0.3) / 4);
                const carbsGrams = Math.round((dailyCalories * 0.4) / 4);
                const fatGrams = Math.round((dailyCalories * 0.3) / 9);

                // Display results
                document.getElementById('result-calories').textContent = dailyCalories.toLocaleString();
                document.getElementById('result-protein').textContent = proteinGrams + 'g';
                document.getElementById('result-carbs').textContent = carbsGrams + 'g';
                document.getElementById('result-fats').textContent = fatGrams + 'g';
                document.getElementById('result-goal').textContent = goalText;
                document.getElementById('result-description').textContent = description;

                // Generate weekly meal plan
                generateWeeklyPlan(goal, dailyCalories);

                // Show results and hide form
                resultsSection.classList.remove('d-none');
                window.scrollTo({
                    top: resultsSection.offsetTop - 20,
                    behavior: 'smooth'
                });
            });

            // Reset form button
            document.getElementById('reset-form').addEventListener('click', function () {
                resultsSection.classList.add('d-none');
                form.reset();
                document.getElementById('nutrition-form').scrollIntoView({
                    behavior: 'smooth'
                });
            });

            // Generate weekly meal plan
            function generateWeeklyPlan(goal, calories) {
                const days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                const tabsContainer = document.getElementById('weekDaysTab');
                const contentContainer = document.getElementById('weekDaysContent');

                // Clear previous content
                tabsContainer.innerHTML = '';
                contentContainer.innerHTML = '';

                // Create tabs and content for each day
                days.forEach((day, index) => {
                    // Create tab
                    const tab = document.createElement('li');
                    tab.className = 'nav-item';
                    tab.innerHTML = `
                                                                                                                                                                                                                                                                                                                                                                                                                                <button class="nav-link ${index === 0 ? 'active' : ''}" id="${day.toLowerCase()}-tab" data-bs-toggle="tab" 
                                                                                                                                                                                                                                                                                                                                                                                                                                    data-bs-target="#${day.toLowerCase()}" type="button" role="tab">
                                                                                                                                                                                                                                                                                                                                                                                                                                    ${day}
                                                                                                                                                                                                                                                                                                                                                                                                                                </button>
                                                                                                                                                                                                                                                                                                                                                                                                                            `;
                    tabsContainer.appendChild(tab);

                    // Create content
                    const content = document.createElement('div');
                    content.className = `tab-pane fade ${index === 0 ? 'show active' : ''}`;
                    content.id = day.toLowerCase();
                    content.setAttribute('role', 'tabpanel');

                    // Generate meals for this day
                    const meals = generateDailyMeals(goal, calories, days[index]);

                    content.innerHTML = `
                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="row g-4">
                                                                                                                                                                                                                                                                                                                                                                                                                                    ${meals.map(meal => `
                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="col-md-6 col-lg-3">
                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="card h-100 border-success bg-dark">
                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="card-img-top position-relative" style="height: 150px; overflow: hidden;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                    <img src="<?php echo e(asset('images/nutrition/${meal.img}')); ?>" class="w-100 h-100" style="object-fit: cover;" alt="${meal.name}">
                                                                                                                                                                                                                                                                                                                                                                                                                                                    <span class="badge bg-success position-absolute top-0 start-0 m-2">${meal.time}</span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="card-body">
                                                                                                                                                                                                                                                                                                                                                                                                                                                    <h5 class="card-title text-success">${meal.name}</h5>
                                                                                                                                                                                                                                                                                                                                                                                                                                                    <p class="card-text text-light small">${meal.desc}</p>
                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="nutrition-facts">
                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="d-flex justify-content-between small text-muted">
                                                                                                                                                                                                                                                                                                                                                                                                                                                            <span>${meal.calories} cal</span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                            <span>P: ${meal.protein}g</span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                            <span>C: ${meal.carbs}g</span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                            <span>F: ${meal.fats}g</span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                    `).join('')}
                                                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                                            `;

                    contentContainer.appendChild(content);
                });
            }

            // Generate daily meals based on goal and calories
            function generateDailyMeals(goal, totalCalories, dayName) {
                // Different meal plans for different goals
                const mealTemplates = {
                    cut: [
                        {
                            name: "Protein Breakfast",
                            time: "Breakfast",
                            desc: "Egg whites, spinach, and whole grain toast",
                            calories: Math.round(totalCalories * 0.25),
                            protein: Math.round(totalCalories * 0.25 * 0.3 / 4),
                            carbs: Math.round(totalCalories * 0.25 * 0.4 / 4),
                            fats: Math.round(totalCalories * 0.25 * 0.3 / 9),
                            img: "breakfast-cut.jpg"
                        },
                        {
                            name: "Lean Lunch",
                            time: "Lunch",
                            desc: "Grilled chicken with quinoa and veggies",
                            calories: Math.round(totalCalories * 0.35),
                            protein: Math.round(totalCalories * 0.35 * 0.3 / 4),
                            carbs: Math.round(totalCalories * 0.35 * 0.4 / 4),
                            fats: Math.round(totalCalories * 0.35 * 0.3 / 9),
                            img: "lunch-cut.jpg"
                        },
                        {
                            name: "Light Dinner",
                            time: "Dinner",
                            desc: "Baked salmon with asparagus",
                            calories: Math.round(totalCalories * 0.3),
                            protein: Math.round(totalCalories * 0.3 * 0.3 / 4),
                            carbs: Math.round(totalCalories * 0.3 * 0.4 / 4),
                            fats: Math.round(totalCalories * 0.3 * 0.3 / 9),
                            img: "dinner-cut.jpg"
                        },
                        {
                            name: "Healthy Snack",
                            time: "Snack",
                            desc: "Greek yogurt with almonds",
                            calories: Math.round(totalCalories * 0.1),
                            protein: Math.round(totalCalories * 0.1 * 0.3 / 4),
                            carbs: Math.round(totalCalories * 0.1 * 0.4 / 4),
                            fats: Math.round(totalCalories * 0.1 * 0.3 / 9),
                            img: "snack-cut.jpg"
                        }
                    ],
                    maintain: [
                        {
                            name: "Balanced Breakfast",
                            time: "Breakfast",
                            desc: "Oatmeal with berries and nuts",
                            calories: Math.round(totalCalories * 0.25),
                            protein: Math.round(totalCalories * 0.25 * 0.3 / 4),
                            carbs: Math.round(totalCalories * 0.25 * 0.4 / 4),
                            fats: Math.round(totalCalories * 0.25 * 0.3 / 9),
                            img: "breakfast-maintain.jpg"
                        },
                        {
                            name: "Wholesome Lunch",
                            time: "Lunch",
                            desc: "Turkey wrap with avocado",
                            calories: Math.round(totalCalories * 0.35),
                            protein: Math.round(totalCalories * 0.35 * 0.3 / 4),
                            carbs: Math.round(totalCalories * 0.35 * 0.4 / 4),
                            fats: Math.round(totalCalories * 0.35 * 0.3 / 9),
                            img: "lunch-maintain.jpg"
                        },
                        {
                            name: "Nutritious Dinner",
                            time: "Dinner",
                            desc: "Lean beef with brown rice",
                            calories: Math.round(totalCalories * 0.3),
                            protein: Math.round(totalCalories * 0.3 * 0.3 / 4),
                            carbs: Math.round(totalCalories * 0.3 * 0.4 / 4),
                            fats: Math.round(totalCalories * 0.3 * 0.3 / 9),
                            img: "dinner-maintain.jpg"
                        },
                        {
                            name: "Energy Snack",
                            time: "Snack",
                            desc: "Fruit and cheese",
                            calories: Math.round(totalCalories * 0.1),
                            protein: Math.round(totalCalories * 0.1 * 0.3 / 4),
                            carbs: Math.round(totalCalories * 0.1 * 0.4 / 4),
                            fats: Math.round(totalCalories * 0.1 * 0.3 / 9),
                            img: "snack-maintain.jpg"
                        }
                    ],
                    bulk: [
                        {
                            name: "Power Breakfast",
                            time: "Breakfast",
                            desc: "Eggs, bacon, and pancakes",
                            calories: Math.round(totalCalories * 0.3),
                            protein: Math.round(totalCalories * 0.3 * 0.3 / 4),
                            carbs: Math.round(totalCalories * 0.3 * 0.4 / 4),
                            fats: Math.round(totalCalories * 0.3 * 0.3 / 9),
                            img: "breakfast-bulk.jpg"
                        },
                        {
                            name: "Hearty Lunch",
                            time: "Lunch",
                            desc: "Beef with rice and veggies",
                            calories: Math.round(totalCalories * 0.35),
                            protein: Math.round(totalCalories * 0.35 * 0.3 / 4),
                            carbs: Math.round(totalCalories * 0.35 * 0.4 / 4),
                            fats: Math.round(totalCalories * 0.35 * 0.3 / 9),
                            img: "lunch-bulk.jpg"
                        },
                        {
                            name: "Substantial Dinner",
                            time: "Dinner",
                            desc: "Chicken pasta with garlic bread",
                            calories: Math.round(totalCalories * 0.25),
                            protein: Math.round(totalCalories * 0.25 * 0.3 / 4),
                            carbs: Math.round(totalCalories * 0.25 * 0.4 / 4),
                            fats: Math.round(totalCalories * 0.25 * 0.3 / 9),
                            img: "dinner-bulk.jpg"
                        },
                        {
                            name: "Mass Shake",
                            time: "Post-Workout",
                            desc: "Protein powder with peanut butter",
                            calories: Math.round(totalCalories * 0.1),
                            protein: Math.round(totalCalories * 0.1 * 0.3 / 4),
                            carbs: Math.round(totalCalories * 0.1 * 0.4 / 4),
                            fats: Math.round(totalCalories * 0.1 * 0.3 / 9),
                            img: "shake-bulk.jpg"
                        }
                    ]
                };

                // For variety, we'll modify the template slightly for each day
                const dayIndex = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'].indexOf(dayName);
                const dayVariation = dayIndex % 3;

                return mealTemplates[goal].map(meal => {
                    // Define variations inside the map function where we have access to 'meal'
                    const variations = [
                        {},
                        {
                            name: `${meal.name} Variation`,
                            desc: `${meal.desc} (special for ${dayName})`
                        },
                        {
                            name: `${dayName}'s ${meal.name}`,
                            desc: `${meal.desc} with seasonal ingredients`
                        }
                    ];

                    return {
                        ...meal,
                        ...variations[dayVariation],
                        img: meal.img.replace('.jpg', `-${dayVariation + 1}.jpg`)
                    };
                });
            }
        });


        // Add this inside your DOMContentLoaded event listener
        document.querySelector('.btn-success .fa-download').closest('button').addEventListener('click', function () {
            downloadNutritionPlan();
        });

        function downloadNutritionPlan() {
            // Get all the plan data
            const planData = {
                calories: document.getElementById('result-calories').textContent,
                protein: document.getElementById('result-protein').textContent,
                carbs: document.getElementById('result-carbs').textContent,
                fats: document.getElementById('result-fats').textContent,
                goal: document.getElementById('result-goal').textContent,
                description: document.getElementById('result-description').textContent,
                days: []
            };

            // Get meal data for each day
            const dayTabs = document.querySelectorAll('#weekDaysContent .tab-pane');
            dayTabs.forEach(tab => {
                const dayName = tab.id.charAt(0).toUpperCase() + tab.id.slice(1);
                const meals = [];

                tab.querySelectorAll('.card').forEach(card => {
                    meals.push({
                        time: card.querySelector('.badge').textContent,
                        name: card.querySelector('.card-title').textContent,
                        description: card.querySelector('.card-text').textContent,
                        nutrition: card.querySelector('.nutrition-facts').textContent.trim()
                    });
                });

                planData.days.push({
                    day: dayName,
                    meals: meals
                });
            });

            // Format the data for download
            let content = `=== Nutrition Plan ===\n`;
            content += `Daily Calories: ${planData.calories}\n`;
            content += `Protein: ${planData.protein} | Carbs: ${planData.carbs} | Fats: ${planData.fats}\n`;
            content += `Goal: ${planData.goal} (${planData.description})\n\n`;

            planData.days.forEach(day => {
                content += `=== ${day.day} ===\n`;
                day.meals.forEach(meal => {
                    content += `[${meal.time}] ${meal.name}\n`;
                    content += `${meal.description}\n`;
                    content += `${meal.nutrition}\n\n`;
                });
                content += '\n';
            });

            // Create download link
            const blob = new Blob([content], { type: 'text/plain' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `nutrition-plan-${new Date().toISOString().slice(0, 10)}.txt`;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        }
        function downloadNutritionPlanPDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            // Add title
            doc.setFontSize(20);
            doc.text('Nutrition Plan', 105, 20, { align: 'center' });

            // Add summary
            doc.setFontSize(12);
            doc.text(`Daily Calories: ${document.getElementById('result-calories').textContent}`, 20, 40);
            doc.text(`Protein: ${document.getElementById('result-protein').textContent}`, 20, 50);
            doc.text(`Carbs: ${document.getElementById('result-carbs').textContent}`, 20, 60);
            doc.text(`Fats: ${document.getElementById('result-fats').textContent}`, 20, 70);

            // Add meals for each day
            let yPosition = 90;
            document.querySelectorAll('#weekDaysContent .tab-pane').forEach((tab, index) => {
                const dayName = tab.id.charAt(0).toUpperCase() + tab.id.slice(1);

                if (yPosition > 260) {
                    doc.addPage();
                    yPosition = 20;
                }

                doc.setFontSize(14);
                doc.text(dayName, 20, yPosition);
                yPosition += 10;

                tab.querySelectorAll('.card').forEach(card => {
                    if (yPosition > 260) {
                        doc.addPage();
                        yPosition = 20;
                    }

                    doc.setFontSize(12);
                    doc.text(`• ${card.querySelector('.badge').textContent}: ${card.querySelector('.card-title').textContent}`, 25, yPosition);
                    yPosition += 7;
                    doc.text(card.querySelector('.card-text').textContent, 30, yPosition);
                    yPosition += 7;
                    doc.text(card.querySelector('.nutrition-facts').textContent.trim(), 30, yPosition);
                    yPosition += 10;
                });

                yPosition += 10;
            });

            doc.save(`nutrition-plan-${new Date().toISOString().slice(0, 10)}.pdf`);
        }

    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.public.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\leoqu\Desktop\goalfit\resources\views/public/nutrition.blade.php ENDPATH**/ ?>