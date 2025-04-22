@extends('layouts.public.app')

@section('title', 'GoalFit - Home')

@section('content')

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
                <a href="#brief" class="btn btn-lg px-4" style="background-color: #4d0909; color: #ffffff;">Get Started
                    Now</a>
                {{-- <a href="#features" class="btn btn-outline-light btn-lg px-4">Explore Features</a> --}}
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

                <a href="#gym" class="text-decoration-none">
                    <div class="d-flex flex-column align-items-center">
                        <div class="rounded-circle bg-danger divSizeFeature"
                            style="background-image: url({{asset('images/feature1.png')}}); background-size: cover; background-position: center;">
                        </div>
                        <div class="border border-light border-start bg-dark text-light" style="height: 40px;"></div>
                        <h4 class="mt-3 text-light fs-4">Explore Gyms</h4>
                    </div>
                </a>

                <a href="#home" class="text-decoration-none">
                    <div class="d-flex flex-column align-items-center">
                        <div class="rounded-circle bg-danger divSizeFeature"
                            style="background-image: url({{asset('images/feature2.jpg')}}); background-size: cover; background-position: center;">
                        </div>
                        <div class="border border-light border-start bg-dark" style="height: 40px;"></div>
                        <h4 class="mt-3 text-light fs-4">Home Workout</h4>
                    </div>
                </a>

                <a href="#nutrition" class="text-decoration-none">
                    <div class="d-flex flex-column align-items-center">
                        <div class="rounded-circle bg-danger divSizeFeature"
                            style="background-image: url({{asset('images/feature3.jpg')}}); background-size: cover; background-position: center;">
                        </div>
                        <div class="border border-light border-start bg-dark" style="height: 40px;"></div>
                        <h4 class="mt-3 text-light fs-4">Track your Nutrition</h4>
                    </div>
                </a>

            </div>
        </div>
    </section>


    <section id="gym">
        <div id="conainGymSection" class="d-flex mt-5 align-items-center" style="background-color: #4d0909; height: 100vh;">
            <!-- Adjust height as needed -->
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
                    <a href="/gym" class="btn btn-secondary text-light px-4 py-2 fs-4">Explore Gyms</a>
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
                <a href="/workout" class="btn text-light bg-black btn-lg px-4 py-2 align-self-start">
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
                <center><a href="/nutrition" class="btn btn-success btn-lg px-5 py-3">Explore Recipes</a></center>
            </div>
        </div>
    </section>


@endsection