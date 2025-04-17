<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Slab:wght@100..900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Slab:wght@100..900&family=Teko:wght@300..700&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/d24639e9bf.js" crossorigin="anonymous"></script>
    <title>GoalFit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
    <header>
        <nav class="d-flex justify-content-between align-items-center p-3">

            <img src="{{asset('images/logo.png')}}" alt="GoalFit Logo" class="img-fluid" style="height: 100px;">

            <div class="d-flex gap-4 d-none d-md-flex">
                <a href="#" class="text-decoration-none">Home</a>
                <a href="#" class="text-decoration-none">Gyms</a>
                <a href="#" class="text-decoration-none">Workout</a>
                <a href="#" class="text-decoration-none">Nutrition</a>
                <a href="#" class="text-decoration-none">About Us</a>
            </div>

            <div class="d-flex gap-2 align-items-center d-none d-md-flex">
                <form class="d-flex align-items-center siteSearch" action="">
                    <input class="form-control me-2 search-bar" type="search" placeholder="Search" aria-label="Search"
                        name="search" />
                    <button title="Search" class="btn btn-outline-light" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <a href="#"><i class="fa-solid fa-user profileIcon" style="color: #ffffff;"></i></a>
            </div>

            <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#mobileMenu" aria-expanded="false">
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
                    <a href="#" class="text-decoration-none text-white mt-2">
                        <i class="fas fa-user me-2"></i> Profile
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <div class="hero-section position-relative"
        style="background-image: url('{{ asset('images/hero.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; width: 100%; height: 100vh;">

        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.4);"></div>

        <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3">
            <h1 class="display-4 fw-bold">Transform Your Body. Empower Your Life.</h1>
            <p class="lead mt-3 mb-4 fs-3">
                Your all-in-one fitness and wellness platform — personalized workouts, smart nutrition tracking, daily
                planning, and AI-powered support.
            </p>
            <div class="d-flex justify-content-center gap-3">
                <a href="#" class="btn btn-lg px-4" style="background-color: #4d0909; color: #ffffff;">Get Started
                    Now</a>
                <a href="#features" class="btn btn-outline-light btn-lg px-4">Explore Features</a>
            </div>
        </div>
    </div>



    <section id="brief" class="">
        <div class="d-flex flex-column justify-content-center align-items-center pb-5">
            <div class="container text-center my-5 pt-5 pb-5">
                <h2 class="fw-bold display-6 text-light">Start Your Fitness Journey Today</h2>
                <p class="lead text-light fs-3">Discover top-rated gyms around you and take the first step towards a
                    healthier lifestyle.</p>
            </div>
            <h2 class="text-light pb-2 fs-3">OUR KEY FEATURES</h2>
            <div id="FeaturesDiv" class="p-5 d-flex gap-5 border rounded border-light">

                <div class="d-flex flex-column align-items-center">
                    <div class="rounded-circle bg-danger divSizeFeature"
                        style="background-image: url({{asset('images/feature1.png')}}); background-size: cover; background-position: center;">
                    </div>
                    <div class="border border-light border-start bg-dark text-light" style="height: 40px;"></div>
                    <h4 class="mt-3 text-light fs-4">Explore Gyms</h4>
                </div>

                <div class="d-flex flex-column align-items-center">
                    <div class="rounded-circle bg-danger divSizeFeature"
                        style="background-image: url({{asset('images/feature2.jpg')}}); background-size: cover; background-position: center;">
                    </div>
                    <div class="border border-light border-start bg-dark" style="height: 40px;"></div>
                    <h4 class="mt-3 text-light fs-4">Home Workout</h4>
                </div>

                <div class="d-flex flex-column align-items-center">
                    <div class="rounded-circle bg-danger divSizeFeature"
                        style="background-image: url({{asset('images/feature3.jpg')}}); background-size: cover; background-position: center;">
                    </div>
                    <div class="border border-light border-start bg-dark" style="height: 40px;"></div>
                    <h4 class="mt-3 text-light fs-4">Track your Nutrition</h4>
                </div>

            </div>
        </div>
    </section>


    <section id="gym">
        <div id="conainGymSection" class="d-flex mt-5 align-items-center"
            style="background-color: #4d0909; height: 100vh;"> <!-- Adjust height as needed -->
            <div id="gymPicDiv" class="w-50 h-100">
                <div id="carouselExampleControls" class="carousel slide h-100" data-bs-ride="carousel">
                    <div class="carousel-inner h-100">
                        <div class="carousel-item active h-100">
                            <img src="{{ asset('images/landingGym1.jpg') }}" class="d-block w-100 h-100"
                                style="object-fit: cover;" alt="...">
                        </div>
                        <div class="carousel-item h-100">
                            <img src="{{ asset('images/landingGym2.jpg') }}" class="d-block w-100 h-100"
                                style="object-fit: cover;" alt="...">
                        </div>
                        <div class="carousel-item h-100">
                            <img src="{{ asset('images/landingGym3.jpg') }}" class="d-block w-100 h-100"
                                style="object-fit: cover;" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-secondary p-3 rounded" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-secondary p-3 rounded" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div id="gymTextDiv" class="w-50 h-100 position-relative">
                <div class="position-absolute w-100 h-100" style="
                        background: url('{{ asset('images/dumbble2.jpg') }}') center/cover;
                        filter: blur(6px);
                        opacity: 1;
                        z-index: 1;
                     ">
                </div>

                <div id="gymDiv"
                    class="position-relative d-flex flex-column justify-content-center align-items-start gap-3 px-5 text-light h-100"
                    style="z-index: 2;">
                    <h1 class="fs-2 fw-bold">Find the Perfect Gym for You</h1>
                    <h4 class="fw-light text fs-3">
                        Whether you're looking for state-of-the-art equipment, specialized classes, or a gym close to
                        home — we've got you covered. GoalFit helps you explore gyms around you, compare options, and
                        subscribe with ease.
                        <br><br>
                        Discover top-rated gyms with flexible plans that match your goals, lifestyle, and budget. Your
                        fitness journey starts with the right environment.
                    </h4>
                    <a href="#" class="btn btn-secondary text-light px-4 py-2 fs-4">Explore Gyms</a>
                </div>
            </div>
        </div>
    </section>

    <section id="home" class="p-3 p-md-5" style="background-color: #4d0909">
        <center>
            <h1 class="fs-1 text-light pb-4">Home Workout</h1>
        </center>
        <div class="d-flex flex-column-reverse flex-md-row align-items-center border border-black p-3 rounded-3"
            style="min-height: 500px;">
            <!-- Text Content -->
            <div class="ps-md-3 w-100 w-md-50 d-flex justify-content-center align-items-start flex-column gap-3">
                <h2 class="text-light fw-bold display-5 mb-3">Train Anytime, Anywhere</h2> <!-- Larger heading -->
                <p class="text-light fs-4 p-1 pe-md-5 mb-4"> <!-- Better contrast -->
                    No gym? No problem. Explore personalized home workout plans that fit your lifestyle. Whether you
                    have 10 minutes or an hour, you can stay active and crush your fitness goals — right from your
                    living room.
                </p>
                <a href="#workout-plans" class="btn text-light bg-black btn-lg px-4 py-2 align-self-start">
                    <!-- More prominent button -->
                    View Home Workout Plans
                </a>
            </div>

            <!-- Image -->
            <div class="w-100 w-md-50 h-100 mb-4 mb-md-0">
                <img src="{{asset('images/home-workout.jpg')}}" alt="Person exercising at home"
                    class="w-100 h-100 object-fit-cover rounded-3 shadow"> <!-- Better image handling -->
            </div>
        </div>
    </section>

    <section id="nutrition" class="position-relative"> <!-- Added position relative for potential overlays -->
        <div class="w-100 h-100 min-vh-100 bg-dark"> <!-- Added bg-dark as fallback -->
            <img src="{{asset('images/healthyFood.jpeg')}}" alt="Healthy food selection"
                class="w-100 h-100 object-fit-cover" style="opacity: 0.8;">
            <!-- Optional opacity for text readability -->
        </div>

        <!-- Optional content overlay (example) -->
        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center p-3">
            <div class="max-w-800px bg-secondary bg-opacity-75 rounded-4 p-4 p-md-5">
                <!-- Light grey with 75% opacity -->
                <h1 class="display-3 fw-bold mb-4 text-light">Healthy Eating</h1> <!-- Dark text for contrast -->
                <p class="lead fs-2 mb-5 text-light">Discover nutritious recipes for a better lifestyle</p>
                <center><a href="#recipes" class="btn btn-success btn-lg px-5 py-3">Explore Recipes</a></center>
            </div>
        </div>
    </section>

    <footer class="footer bg-dark text-white py-5">
        <div class="container">
            <div class="row g-4 mb-4">
                <!-- Quick Links -->
                <div class="col-md-3 col-6">
                    <h5 class="text-uppercase fw-bold mb-4">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/shop" class="text-white-50 hover-white text-decoration-none">Our
                                Products</a></li>
                        <li class="mb-2"><a href="/contact"
                                class="text-white-50 hover-white text-decoration-none">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div class="col-md-3 col-6">
                    <h5 class="text-uppercase fw-bold mb-4">Support</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/contact"
                                class="text-white-50 hover-white text-decoration-none">FAQs</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 hover-white text-decoration-none">Terms &
                                Conditions</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 hover-white text-decoration-none">Privacy
                                Policy</a></li>
                    </ul>
                </div>

                <!-- Company -->
                <div class="col-md-3 col-6">
                    <h5 class="text-uppercase fw-bold mb-4">Company</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/about" class="text-white-50 hover-white text-decoration-none">About
                                Us</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 hover-white text-decoration-none">Careers</a>
                        </li>
                    </ul>
                </div>

                <!-- Logo -->
                <div class="col-md-3 col-6 d-flex align-items-center justify-content-center">
                    <img src="{{asset('images/logo.png')}}" alt="GoalFit Logo" class="img-fluid"
                        style="max-height: 120px;">
                </div>
            </div>

            <hr class="my-4 bg-secondary">

            <!-- Copyright -->
            <div class="text-center mb-4">
                <p class="mb-2">© 2025 GoalFit. All rights reserved.</p>
                <p class="small text-white-50 mb-2">Your fitness journey starts here</p>
                <a href="https://www.goalfit.com/" class="text-decoration-none text-success fw-bold">www.goalfit.com</a>
            </div>

            <!-- Social Icons -->
            <div class="social-icons text-center">
                <a href="#" class="text-white mx-2 fs-5" title="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white mx-2 fs-5" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white mx-2 fs-5" title="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white mx-2 fs-5" title="YouTube"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>