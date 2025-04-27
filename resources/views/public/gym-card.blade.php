@extends('layouts.public.app')

@section('title', 'Gym Card')

@section('content')
    <section class="container p-3 border rounded" style="margin-top:90px; margin-bottom: 25px;">
        <div class="row g-4 py-3" style="border-radius: 10px;">
            <!-- Gym Images Carousel -->
            <div class="col-lg-6 d-flex flex-column">
                <div class="flex-grow-1">
                    <div id="gymCarousel" class="carousel slide h-100 rounded-3 overflow-hidden shadow-lg"
                        data-bs-ride="carousel">
                        <div class="carousel-inner h-100">
                            <div class="carousel-item active h-100">
                                <img src="{{ asset('images/landingGym1.jpg') }}"
                                    class="d-block w-100 h-100 object-fit-cover" alt="Gym interior">
                            </div>
                            <div class="carousel-item h-100">
                                <img src="{{ asset('images/landingGym2.jpg') }}"
                                    class="d-block w-100 h-100 object-fit-cover" alt="Gym equipment">
                            </div>
                            <div class="carousel-item h-100">
                                <img src="{{ asset('images/landingGym3.jpg') }}"
                                    class="d-block w-100 h-100 object-fit-cover" alt="Gym facilities">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#gymCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark bg-opacity-50 p-3 rounded"
                                aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#gymCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-dark bg-opacity-50 p-3 rounded"
                                aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Gym Details -->
            <div class="col-lg-6 d-flex flex-column">
                <div class="flex-grow-1">
                    <h1 class="display-5 fw-bold text-light mb-3">Planet Gym Fitness</h1>

                    <div class="mb-4">
                        <h2 class="h4 text-light ">Description</h2>
                        <p class="lead text-light">State-of-the-art fitness facility with top-notch equipment, professional
                            trainers,
                            and a variety of classes to help you reach your fitness goals.</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="h4 text-light">
                            <i class="fa-solid fa-location-dot me-1"></i>Location
                        </h3>
                        <p class="mb-0 text-light">Amman - Wadi Abu Saqra</p>
                        <a href="#" class="text-decoration-none text-danger">View on map</a>
                    </div>

                    <div class="mb-4">
                        <h4 class="h4 text-light">
                            <i class="fas fa-clock text-danger me-2"></i>Opening Hours
                        </h4>
                        <ul class="d-flex flex-column list-unstyled row text-light">
                            <li class="col-md-6"><span class="fw-bold">Saturday-Thursday:</span> 6:00 AM - 10:00 PM</li>
                            <li class="col-md-6"><span class="fw-bold">Friday:</span> 8:00 AM - 8:00 PM</li>
                            {{-- <li class="col-md-6"><span class="fw-bold">Sunday:</span> 8:00 AM - 6:00 PM</li> --}}
                        </ul>
                    </div>

                    <div class="mb-4">
                        <h5 class="h4 text-light">
                            <i class="fas fa-tags text-danger me-2"></i>Membership
                        </h5>
                        <div class="d-flex align-items-center">
                            <span class="display-6 text-secondary fw-bold me-3">$49.99</span>
                            <span class="text-light">/month</span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="h4 text-light">
                            <i class="fas fa-star text-warning me-2"></i>Facilities
                        </h5>
                        <div class="d-flex flex-wrap gap-3">
                            <span class="badge bg-light text-dark p-2"><i class="fas fa-shower me-1"></i> Showers</span>
                            <span class="badge bg-light text-dark p-2"><i class="fas fa-square-parking me-1"></i>
                                Parking</span>
                            <span class="badge bg-light text-dark p-2"><i class="fas fa-dumbbell me-1"></i> Equipment</span>
                            <span class="badge bg-light text-dark p-2"><i class="fas fa-person-swimming me-1"></i>
                                Pool</span>
                            <span class="badge bg-light text-dark p-2"><i class="fas fa-hot-tub-person me-1"></i>
                                Sauna</span>
                            <span class="badge bg-light text-dark p-2"><i class="fas fa-mug-hot me-1"></i> Café</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Join Button - Now below both columns -->
            <div class="col-12 mt-4">
                <button class="btn btn-lg w-100 py-3 fw-bold" style="background-color: #4d0909; color: white;">
                    <i class="fas fa-heart me-2"></i>Join Now - Only $49.99/month
                </button>
            </div>
        </div>
    </section>
@endsection