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

                            @foreach ($gym->media as $index => $media)
                                <div class="carousel-item h-100 {{ $loop->first ? 'active' : '' }}">
                                    <img src="{{ Storage::url('gym_images/' . $media) }}"
                                        class="d-block w-100 h-100 object-fit-cover" alt="Gym media {{ $index }}">
                                </div>
                            @endforeach
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
            <div class="col-lg-6 d-flex flex-column p-4">
                <div class="flex-grow-1">

                    <h1 class="display-5 fw-bold text-light mb-3 shadow-lg p-2 rounded">{{$gym->name}}</h1>

                    <div class="mb-4 border p-3 rounded">
                        <h2 class="fs-2 text-light mb-2">
                            <i class="fa-solid fa-list-ul me-1 text-danger"></i>Description
                        </h2>
                        <p class="lead text-light">{{$gym->description}}</p>
                    </div>

                    <div class="mb-4 border p-3 rounded">
                        <h3 class="fs-2 text-light mb-2">
                            <i class="fa-solid fa-location-dot me-1 text-danger"></i>Location
                        </h3>
                        <p class="mb-0 fs-5 text-light">{{$gym->address}}</p>
                        <a href="{{$gym->location}}" target="_blank" class="text-decoration-none text-danger">View on
                            map</a>
                    </div>

                    <div class="mb-4 border p-3 rounded">
                        <h4 class="h4 text-light mb-2">
                            <i class="fas fa-clock text-danger me-2"></i>Opening Hours
                        </h4>
                        <div class="d-flex flex-wrap justify-content-start text-light">
                            @foreach ($gym->opening_hours as $day => $hours)
                                <div class="me-3 mb-2">
                                    <span class="fw-bold">{{ ucfirst(substr($day, 0, 3)) }}:</span>
                                    @if (!isset($hours['is_open']) || $hours['is_open'] === false)
                                        <span class="text-danger">Closed</span>
                                    @elseif (isset($hours['is_24h']) && $hours['is_24h'])
                                        <span class="text-success">24 Hours</span>
                                    @else
                                        {{ $hours['open'] }} - {{ $hours['close'] }}
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="">
                        <h5 class="h4 text-light">
                            <i class="fas fa-star text-warning me-2"></i>Facilities
                        </h5>
                        <div class="d-flex flex-wrap gap-3">
                            @foreach ($gym->facilities as $facility)
                                @if ($facility['available'])
                                    <span class="badge bg-light text-dark p-2">
                                        <i class="fas fa-check-circle me-1"></i> {{ ucfirst($facility['name']) }}
                                        @if ($facility['description'])
                                            <small class="text-muted">({{ $facility['description'] }})</small>
                                        @endif
                                    </span>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="pt-4">
                        <h5 class="h4 text-light">
                            <i class="fas fa-tags text-danger me-2"></i>Membership
                        </h5>
                        <div class="d-flex align-items-center">
                            <span class="display-6 text-secondary fw-bold me-3">{{$gym->pricing['monthly']}}</span>
                            <span class="text-light">/month</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Join Button - Now below both columns -->
            <div class="col-12 mt-4">
                <a href="/paymint" class="btn btn-lg w-100 py-3 fw-bold" style="background-color: #4a1b1b; color: white;">
                    <i class="fas fa-heart me-2"></i>Join Now - Only {{$gym->pricing['monthly']}}/month
                </a>
            </div>
        </div>
    </section>
@endsection