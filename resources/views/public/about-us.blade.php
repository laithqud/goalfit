@extends('layouts.public.app')

@section('title', 'GoalFit - About Us')

@section('content')

    <div class="hero-section position-relative"
        style="background-image: url('{{ asset('images/about-hero.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; width: 100%; height: 70vh;">

        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.4);"></div>

        <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3">
            <h1 class="display-4 fw-bold">Our Fitness Journey</h1>
            <p class="lead mt-3 mb-4 fs-3">
                Empowering lives through innovative fitness solutions since 2018
            </p>
        </div>
    </div>

    <section id="our-story" class="py-5 bg-dark">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-light">Our Story</h2>
            </div>

            <div class="row g-5 mb-5">
                <div class="col-lg-6 d-flex align-items-center">
                    <p class="text-light fs-4">
                        GoalFit was born from a simple idea in 2018 - fitness should be accessible, personalized, and
                        data-driven.
                        Our founder, a fitness enthusiast and tech expert, struggled to find a platform that combined smart
                        workout tracking
                        with nutritional guidance and community support.
                    </p>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/about-story1.jpg') }}" class="img-fluid rounded shadow-lg"
                        alt="Founder working out">
                </div>
            </div>

            <div class="row g-5 mb-5 flex-lg-row-reverse">
                <div class="col-lg-6 d-flex align-items-center">
                    <p class="text-light fs-4">
                        We started as a small team of 5 in a shared workspace, developing our first prototype that combined
                        workout planning with nutrition tracking. Our breakthrough came when we integrated AI to provide
                        personalized recommendations based on user progress.
                    </p>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/about-story2.jpg') }}" class="img-fluid rounded shadow-lg"
                        alt="Team working">
                </div>
            </div>

            <div class="row g-5">
                <div class="col-lg-6 d-flex align-items-center">
                    <p class="text-light fs-4">
                        Today, GoalFit serves over 1 million users worldwide with a comprehensive ecosystem that includes
                        gym partnerships, home workout programs, and smart nutrition planning. We continue to innovate,
                        recently launching our AI fitness assistant and virtual training programs.
                    </p>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/about-story3.jpg') }}" class="img-fluid rounded shadow-lg" alt="Happy users">
                </div>
            </div>
        </div>
    </section>

    <section id="our-mission" class="py-5" style="background-color: #4d0909;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-light">Our Mission</h2>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-4 text-center text-light h-100">
                        <i class="fas fa-dumbbell fa-3x mb-3"></i>
                        <h3 class="h4 mb-3">Fitness Innovation</h3>
                        <p class="fs-5">
                            Developing cutting-edge tools that make fitness accessible and effective for everyone,
                            regardless of experience level or location.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-4 text-center text-light h-100">
                        <i class="fas fa-heartbeat fa-3x mb-3"></i>
                        <h3 class="h4 mb-3">Holistic Health</h3>
                        <p class="fs-5">
                            Combining exercise, nutrition, and mental wellness into a seamless platform that
                            supports complete lifestyle transformation.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-4 text-center text-light h-100">
                        <i class="fas fa-users fa-3x mb-3"></i>
                        <h3 class="h4 mb-3">Community Building</h3>
                        <p class="fs-5">
                            Creating a supportive global community where members motivate each other and
                            share their fitness journeys.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" style="background-color: #373740;">
        <div class="container text-center py-5">
            <h2 class="display-5 fw-bold text-light mb-4">Ready to Transform Your Fitness Journey?</h2>
            <p class="lead text-light mb-5">Join thousands of members achieving their goals with GoalFit</p>
            <a href="/register" class="btn btn-lg px-5 py-3 text-light" style="background-color: #4d0909;">
                Get Started Today
            </a>
        </div>
    </section>

@endsection