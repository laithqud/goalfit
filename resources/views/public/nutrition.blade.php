@extends('layouts.public.app')

@section('title', 'GoalFit - Nutrition Plans')

@section('content')

    <!-- Hero Section -->
    <section class="nutrition-hero position-relative"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('images/nutrition-hero.jpg') }}');">
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
                        <span class="input-group-text bg-white border-end-0"><i class="fas fa-search"></i></span>
                        <input type="search" class="form-control border-start-0 ps-0" placeholder="Search for foods...">
                        <button class="btn btn-success">Search</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-center justify-content-md-end">
                        <span class="me-2 fw-bold">Filter:</span>
                        <select class="form-select w-auto">
                            <option selected>All Categories</option>
                            <option>Protein</option>
                            <option>Carbs</option>
                            <option>Fats</option>
                            <option>Vegetables</option>
                            <option>Fruits</option>
                            <option>Dairy</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Categories Sidebar -->
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-header bg-success text-white">
                            <h3 class="h5 mb-0">Nutrition Categories</h3>
                        </div>
                        <div class="card-body bg-secondary bg-opacity-25">
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2">
                                    <a class="nav-link d-flex align-items-center active" href="#">
                                        <i class="fas fa-drumstick-bite me-2 text-success"></i> Protein
                                    </a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a class="nav-link d-flex align-items-center" href="#">
                                        <i class="fas fa-bread-slice me-2 text-success"></i> Carbohydrates
                                    </a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a class="nav-link d-flex align-items-center" href="#">
                                        <i class="fas fa-bacon me-2 text-success"></i> Healthy Fats
                                    </a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a class="nav-link d-flex align-items-center" href="#">
                                        <i class="fas fa-carrot me-2 text-success"></i> Vegetables
                                    </a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a class="nav-link d-flex align-items-center" href="#">
                                        <i class="fas fa-apple-alt me-2 text-success"></i> Fruits
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" href="#">
                                        <i class="fas fa-cheese me-2 text-success"></i> Dairy
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Food Items -->
                <div class="col-lg-9">
                    <div class="row g-4">
                        <!-- Featured Nutrition Guide -->
                        <div class="col-12">
                            <div class="card border-0 shadow-sm overflow-hidden">
                                <div class="row g-0">
                                    <div class="col-md-6 d-flex align-items-center p-4 bg-secondary bg-opacity-25">
                                        <div>
                                            <h2 class="fw-bold">Beginner's Nutrition Guide</h2>
                                            <p class="lead">Learn the fundamentals of proper nutrition to fuel your workouts
                                                and recovery.</p>
                                            <a href="#" class="btn btn-outline-success">Read Guide</a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <img src="{{ asset('images/guide.jpg') }}" class="img-fluid h-100"
                                            alt="Nutrition Guide" style="object-fit: cover;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Food Items -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card food-card h-100 border-0 shadow-sm">
                                <img src="{{ asset('images/protien.jpg') }}" class="card-img-top" alt="High Protein Meal">
                                <div class="card-body bg-secondary bg-opacity-25">
                                    <h5 class="card-title fw-bold">Grilled Chicken & Quinoa</h5>
                                    <div class="nutrition-facts mb-3">
                                        <div class="d-flex justify-content-between small">
                                            <span>Calories: 420</span>
                                            <span>Protein: 38g</span>
                                        </div>
                                        <div class="d-flex justify-content-between small">
                                            <span>Carbs: 35g</span>
                                            <span>Fats: 12g</span>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-sm btn-success">View Recipe</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="card food-card h-100 border-0 shadow-sm">
                                <img src="{{ asset('images/protien.jpg') }}" class="card-img-top" alt="Vegetarian Meal">
                                <div class="card-body bg-secondary bg-opacity-25">
                                    <h5 class="card-title fw-bold">Vegetable Stir Fry</h5>
                                    <div class="nutrition-facts mb-3">
                                        <div class="d-flex justify-content-between small">
                                            <span>Calories: 320</span>
                                            <span>Protein: 18g</span>
                                        </div>
                                        <div class="d-flex justify-content-between small">
                                            <span>Carbs: 42g</span>
                                            <span>Fats: 8g</span>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-sm btn-success">View Recipe</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="card food-card h-100 border-0 shadow-sm">
                                <img src="{{ asset('images/protien.jpg') }}" class="card-img-top" alt="Protein Smoothie">
                                <div class="card-body bg-secondary bg-opacity-25">
                                    <h5 class="card-title fw-bold">Protein Power Smoothie</h5>
                                    <div class="nutrition-facts mb-3">
                                        <div class="d-flex justify-content-between small">
                                            <span>Calories: 280</span>
                                            <span>Protein: 32g</span>
                                        </div>
                                        <div class="d-flex justify-content-between small">
                                            <span>Carbs: 24g</span>
                                            <span>Fats: 5g</span>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-sm btn-success">View Recipe</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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


    <section class="py-5 bg-secondery ">
        <div class="container">
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold text-success mb-3">Recipe of the Week</h1>
                <h2 class="h3 text-white">Quinoa Power Bowl with Roasted Vegetables</h2>
                <div class="d-flex justify-content-center gap-3 mt-3">
                    <span class="badge bg-success">Vegetarian</span>
                    <span class="badge bg-secondary">30 mins</span>
                    <span class="badge bg-success">High Protein</span>
                </div>
            </div>

            <div class="row g-4 align-items-center">
                <!-- Ingredients Column -->
                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm h-100 ">
                        <div class="card-header bg-success text-white py-3">
                            <h3 class="h4 mb-0"><i class="fas fa-utensils me-2"></i>Ingredients</h3>
                        </div>
                        <div class="card-body bg-secondary bg-opacity-25">
                            <ul class="list-group list-group-flush ">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center bg-secondary bg-opacity-25">
                                    1 cup of quinoa
                                    <span class="badge bg-light text-dark">180g</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center bg-secondary bg-opacity-25">
                                    2 cups of water
                                    <span class="badge bg-light text-dark">480ml</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center bg-secondary bg-opacity-25">
                                    1 tsp salt
                                    <span class="badge bg-light text-dark">5g</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center bg-secondary bg-opacity-25">
                                    1 tbsp olive oil
                                    <span class="badge bg-light text-dark">15ml</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center bg-secondary bg-opacity-25">
                                    1 cup mixed vegetables
                                    <span class="badge bg-light text-dark">carrots, peas, bell peppers</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center bg-secondary bg-opacity-25">
                                    1 tsp garlic powder
                                    <span class="badge bg-light text-dark">3g</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center bg-secondary bg-opacity-25">
                                    1 tsp onion powder
                                    <span class="badge bg-light text-dark">3g</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center bg-secondary bg-opacity-25">
                                    1 tsp black pepper
                                    <span class="badge bg-light text-dark">2g</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center bg-secondary bg-opacity-25">
                                    1 tsp paprika
                                    <span class="badge bg-light text-dark">2g</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Image Column -->
                <div class="col-lg-7">
                    <div class="position-relative rounded overflow-hidden shadow-lg"
                        style="height: 100%; min-height: 400px;">
                        <img src="{{asset('./images/quinoa.jpg')}}" class="img-fluid w-100" alt="Quinoa Power Bowl"
                            style="object-fit: cover; height: 425px;">
                        <div class="position-absolute bottom-0 start-0 end-0 p-4"
                            style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
                            <div class="text-white">
                                <h3 class="h4">Nutrition Facts (per serving)</h3>
                                <div class="d-flex justify-content-between">
                                    <span>Calories: 320</span>
                                    <span>Protein: 12g</span>
                                    <span>Carbs: 45g</span>
                                    <span>Fats: 8g</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Instructions Section -->
            <div class="row mt-5">
                <div class="col-lg-8 mx-auto">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-success text-white py-3">
                            <h3 class="h4 mb-0"><i class="fas fa-list-ol me-2"></i>Instructions</h3>
                        </div>
                        <div class="card-body bg-secondary bg-opacity-50">
                            <ol class="list-group list-group-numbered list-group-flush">
                                <li class="list-group-item d-flex align-items-start bg-secondary bg-opacity-25">
                                    <div class="ms-2 me-auto ">
                                        <div class="fw-bold">Prepare the quinoa</div>
                                        Rinse quinoa thoroughly under cold water. In a medium saucepan, combine quinoa,
                                        water, and salt. Bring to boil, then reduce heat to low, cover, and simmer for 15
                                        minutes.
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-start bg-secondary bg-opacity-25">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Roast the vegetables</div>
                                        Preheat oven to 400°F (200°C). Toss vegetables with olive oil and spices. Spread on
                                        baking sheet and roast for 20 minutes, stirring halfway.
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-start bg-secondary bg-opacity-25">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Combine and serve</div>
                                        Fluff quinoa with fork and mix with roasted vegetables. Adjust seasoning to taste
                                        and serve warm.
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-start bg-secondary bg-opacity-25">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Optional additions</div>
                                        Top with avocado slices, feta cheese, or a squeeze of lemon juice for extra flavor.
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chef's Tips -->
            <div class="row mt-4">
                <div class="col-lg-8 mx-auto">
                    <div class="card border-success">
                        <div class="card-body bg-secondary bg-opacity-25">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <img src="{{asset('./images/coach1.jpg')}}" class="rounded-circle" width="80"
                                        height="80" alt="Chef Alex">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-success">Chef's Tip</h5>
                                    <p class="mb-0">"For extra protein, add grilled chicken or chickpeas to this bowl. The
                                        spices can be adjusted to your taste - try adding cumin or chili powder for a
                                        different flavor profile!"</p>
                                    <p class="text-muted mt-2 mb-0">- Chef Alex, Nutrition Specialist</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('styles')
    <style>
        .nutrition-hero {
            background-size: cover;
            background-position: center;
            min-height: 60vh;
            display: flex;
            align-items: center;
        }

        .food-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .food-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15) !important;
        }

        .nav-link {
            transition: all 0.2s ease;
            border-radius: 4px;
            padding: 8px 12px;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: rgba(61, 220, 53, 0.1);
            color: #000000 !important;
        }

        .nutrition-facts {
            background-color: #f8f9fa;
            border-radius: 6px;
            padding: 10px;
        }
    </style>
@endpush

@push('scripts')
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
                bmr = 10 * weight + 6.25 * height - 5 * age + 5;
            } else {
                bmr = 10 * weight + 6.25 * height - 5 * age - 161;
            }

            // Calculate TDEE (Total Daily Energy Expenditure)
            const tdee = bmr * activity;

            // Adjust for goal
            const dailyCalories = Math.round(tdee + goalAdjustment);

            // Calculate macros (30% protein, 40% carbs, 30% fat)
            const proteinGrams = Math.round((dailyCalories * 0.3) / 4);
            const carbsGrams = Math.round((dailyCalories * 0.4) / 4);
            const fatGrams = Math.round((dailyCalories * 0.3) / 9);

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
    </script>
@endpush

@push('scripts')
    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endpush