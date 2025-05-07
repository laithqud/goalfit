@extends('layouts.dashboard.app')

@section('title', 'Gym Management')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-black bg-opacity-75 rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-light">Gym Facilities</h6>
                        <a href="{{ route('admin.gyms.create') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus me-1"></i> Add New Gym
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle">
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
                                @foreach($gyms as $gym)
                                                            @php
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
                                                                $pricingDisplay = $basicPrice ? ('$' . $basicPrice . (isset($premiumPrice) ? ' - $' . $premiumPrice : '')) : 'N/A';

                                                                $featuredImage = collect($media['images'] ?? [])->firstWhere('is_featured', true) ?? $media['images'][0] ?? null;
                                                                $imageUrl = $featuredImage['url'] ?? null;
                                                                $imagePath = $imageUrl ? ltrim($imageUrl, '/') : null;
                                                                $fileExists = $imagePath && Storage::disk('public')->exists($imagePath);
                                                            @endphp

                                                            <tr>
                                                                <td>{{ $gym->id }}</td>
                                                                <td>
                                                                    @if($fileExists)
                                                                        <img src="{{ asset('storage/' . $imageUrl) }}" alt="Gym Image"
                                                                            class="img-fluid rounded" style="width: 50px; height: 50px;">
                                                                    @else
                                                                        <span class="text-muted">No Image</span>
                                                                    @endif
                                                                </td>
                                                                <td>{{ $gym->name }}</td>
                                                                <td>{{ Str::limit($gym->description, 50) }}</td>
                                                                <td>
                                                                    <div>{{ $gym->location }}</div>
                                                                    <small class="text-muted">{{ $gym->address }}</small>
                                                                </td>
                                                                <td>{{ $gym->phone ?? 'N/A' }}</td>
                                                                <td>
                                                                    @if($gym->is_active)
                                                                        <span class="badge bg-success">Active</span>
                                                                    @else
                                                                        <span class="badge bg-danger">Inactive</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <span data-bs-toggle="tooltip" title="{{ ucfirst($today) }}: {{ $hoursDisplay }}">
                                                                        {{ $hoursDisplay }}
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span data-bs-toggle="tooltip" title="{{ $facilitiesCount }} facilities">
                                                                        {{ $facilitiesCount }} <i class="fas fa-dumbbell ms-1"></i>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span data-bs-toggle="tooltip" title="{{ $pricingDisplay }}">
                                                                        {{ $pricingDisplay }}
                                                                    </span>
                                                                </td>
                                                                <td>{{ $gym->created_at->format('M d, Y') }}</td>
                                                                <td>
                                                                    <div class="d-flex justify-content-center gap-2">
                                                                        <a href="{{ route('admin.gyms.edit', $gym->id) }}"
                                                                            class="btn btn-sm btn-warning" data-bs-toggle="tooltip" title="Edit">
                                                                            <i class="fas fa-edit"></i>
                                                                        </a>
                                                                        <form action="{{ route('admin.gyms.destroy', $gym->id) }}" method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                                                                title="Delete"
                                                                                onclick="return confirm('Are you sure you want to delete this gym?')">
                                                                                <i class="fas fa-trash"></i>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
@endpush