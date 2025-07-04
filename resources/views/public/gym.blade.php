@extends('layouts.public.app')

@section('title', 'GoalFit - Find Your Perfect Gym')

@section('content')
    <!-- Hero Section -->
    <div class="gym-hero position-relative" style="background-image: url('{{ asset('images/gym.png') }}'); height: 100vh;">
        <div class="hero-overlay"></div>
        <div class="hero-content container text-center text-white">
            <h1 class="display-3 fw-bold mb-4">Find Your Perfect Gym</h1>
            <p class="lead fs-3 mb-5">Discover fitness centers tailored to your goals, preferences, and location</p>
            <div class="search-box mx-auto bg-white rounded-pill p-2">
                <form action="{{ route('gym.search') }}" class="d-flex align-items-center">
                    <i class="fas fa-map-marker-alt text-dark ms-3 me-2"></i>
                    <input type="text" name="location" class="form-control border-0 shadow-none"
                        placeholder="Enter your location">
                    <button class="btn btn-danger rounded-pill px-4" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
    @if(isset($message))
        <div class="alert alert-success alert-dismissible fade show" id="success-alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            setTimeout(function () {
                $('#success-alert').alert('close');
            }, 2000);
        </script>
    @endif

    <!-- Featured Gyms Section -->
    <section class="py-5" style="background-color: #390707">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold display-6 text-light">Featured Gyms Near You</h2>
            </div>

            <div class="row g-4">
                @foreach ($gyms as $gym)
                    <div class="col-lg-4 col-md-6">
                        <div class="card gym-card h-100 border-0 overflow-hidden shadow-sm" style="background-color: lightgray">
                            <div class="gym-card-img"
                                style="background-image: url('{{ isset($gym->media[1]) ? asset('storage/gym_images/' . $gym->media[1]) : asset('images/gym.png') }}');">
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h3 class="h5 fw-bold mb-0">{{$gym->name}}</h3>
                                    <span class="badge bg-success">4.8 <i class="fas fa-star"></i></span>
                                </div>
                                <p class="text-muted mb-3"><i class="fas fa-map-marker-alt text-danger me-2"></i>
                                    {{$gym->address}}
                                </p>

                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    @foreach ($gym->facilities as $facility)
                                        @if ($facility['available'] == "1")
                                            <span class="badge bg-light text-dark border">
                                                <i class="fas fa-check me-1"></i>
                                                {{ $facility['name'] }}
                                            </span>
                                        @endif
                                    @endforeach
                                </div>

                                <div class="d-flex justify-content-between align-items-center pt-3">
                                    <h4 class="fw-bold text-danger position-absolute bottom-0 start-0 mb-3 ms-3">
                                        {{ $gym->pricing['monthly'] }}
                                        <small class="text-muted fs-6">/month</small>
                                    </h4>
                                    @auth
                                        <a href="{{ route('gym.detailes', ['id' => $gym->id]) }}"
                                        class="btn btn-sm btn-danger position-absolute bottom-0 end-0 mb-3 me-3">View Details</a>
                                    @else
                                       <a href="{{ route(   'login') }}" 
                                        class="btn btn-sm btn-danger position-absolute bottom-0 end-0 mb-3 me-3"
                                        onclick="event.preventDefault(); Swal.fire('Login Required', 'Please log in to view gym details.', 'warning').then(() => { window.location.href = '{{ route('login') }}'; });">
                                        View Details
                                        </a>
                                    @endauth

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Membership Plans -->
    <section class="py-5 bg-dark text-white mb-2">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold display-5">Flexible Membership Options</h2>
                <p class="lead opacity-75">Choose the plan that works best for your fitness journey</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 bg-secondary bg-opacity-10">
                        <div class="card-body p-4 text-center">
                            <h3 class="h4 fw-bold mb-3">Basic</h3>
                            <h4 class="display-4 fw-bold mb-3">$19<small class="fs-6 opacity-75">/month</small></h4>
                            <ul class="list-unstyled mb-4">
                                <li class="py-2 border-bottom border-secondary border-opacity-25"><i
                                        class="fas fa-check text-success me-2"></i> Single gym access</li>
                                <li class="py-2 border-bottom border-secondary border-opacity-25"><i
                                        class="fas fa-check text-success me-2"></i> Standard equipment</li>
                                <li class="py-2 border-bottom border-secondary border-opacity-25"><i
                                        class="fas fa-times text-danger me-2"></i> Group classes</li>
                                <li class="py-2"><i class="fas fa-times text-danger me-2"></i> Personal trainer</li>
                            </ul>
                            <a href="#" class="btn btn-outline-light w-100">Get Started</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 bg-danger">
                        <div class="card-body p-4 text-center position-relative">
                            <span
                                class="badge bg-warning text-dark position-absolute top-0 start-50 translate-middle px-3 py-2 rounded-pill">Most
                                Popular</span>
                            <h3 class="h4 fw-bold mb-3">Premium</h3>
                            <h4 class="display-4 fw-bold mb-3">$39<small class="fs-6 opacity-75">/month</small></h4>
                            <ul class="list-unstyled mb-4">
                                <li class="py-2 border-bottom border-light border-opacity-25"><i
                                        class="fas fa-check text-success me-2"></i> Multi-gym access</li>
                                <li class="py-2 border-bottom border-light border-opacity-25"><i
                                        class="fas fa-check text-success me-2"></i> Premium equipment</li>
                                <li class="py-2 border-bottom border-light border-opacity-25"><i
                                        class="fas fa-check text-success me-2"></i> Unlimited classes</li>
                                <li class="py-2"><i class="fas fa-times text-danger me-2"></i> Personal trainer</li>
                            </ul>
                            <a href="#" class="btn btn-light text-danger fw-bold w-100">Get Started</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 bg-secondary bg-opacity-10">
                        <div class="card-body p-4 text-center">
                            <h3 class="h4 fw-bold mb-3">VIP</h3>
                            <h4 class="display-4 fw-bold mb-3">$79<small class="fs-6 opacity-75">/month</small></h4>
                            <ul class="list-unstyled mb-4">
                                <li class="py-2 border-bottom border-secondary border-opacity-25"><i
                                        class="fas fa-check text-success me-2"></i> All gyms access</li>
                                <li class="py-2 border-bottom border-secondary border-opacity-25"><i
                                        class="fas fa-check text-success me-2"></i> VIP areas</li>
                                <li class="py-2 border-bottom border-secondary border-opacity-25"><i
                                        class="fas fa-check text-success me-2"></i> Unlimited classes</li>
                                <li class="py-2"><i class="fas fa-check text-success me-2"></i> Personal trainer</li>
                            </ul>
                            <a href="#" class="btn btn-outline-light w-100">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    {{-- <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold display-5">What Our Members Say</h2>
                <p class="lead text-muted">Real stories from our fitness community</p>
            </div>

            <div class="row g-4">
                @for($i = 0; $i < 3; $i++) <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <img src="{{ asset('images/user-' . ($i+1) . '.jpg') }}" class="rounded-circle me-3"
                                    width="60" height="60" alt="User">
                                <div>
                                    <h5 class="fw-bold mb-0">Alex Johnson</h5>
                                    <small class="text-muted">Member for 2 years</small>
                                </div>
                            </div>
                            <div class="mb-3 text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="mb-0">"GoalFit helped me find the perfect gym near my office. The trainers are amazing
                                and the facilities are always clean and well-maintained. I've never felt better!"</p>
                        </div>
                    </div>
            </div>
            @endfor
        </div>
        </div>
    </section> --}}

    <!-- CTA Section -->
    {{-- <section class="py-5 bg-danger text-white">
        <div class="container text-center py-4">
            <h2 class="display-5 fw-bold mb-4">Ready to Start Your Fitness Journey?</h2>
            <p class="lead mb-5 opacity-75">Join thousands of members achieving their goals with GoalFit</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="#" class="btn btn-light btn-lg px-4 fw-bold">Find Your Gym</a>
                <a href="#" class="btn btn-outline-light btn-lg px-4">Learn More</a>
            </div>
        </div>
    </section> --}}
@endsection

@push('styles')
    <style>
        .gym-hero {
            height: 70vh;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .search-box {
            max-width: 600px;
        }

        .gym-card-img {
            height: 200px;
            background-size: cover;
            background-position: center;
        }

        .icon-box {
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .gym-card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
    </style>
@endpush