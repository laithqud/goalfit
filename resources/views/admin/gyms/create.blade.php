@extends('layouts.dashboard.app')

@section('title', 'Add New Gym')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-black bg-opacity-75 rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-light">Add New Gym</h6>
                        <a href="{{ route('admin.gyms.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Back to List
                        </a>
                    </div>

                    <form action="{{ route('admin.gyms.store') }}" method="POST" enctype="multipart/form-data" id="gymForm">
                        @csrf

                        <!-- Basic Information Section -->
                        <div class="card bg-dark mb-4">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Basic Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label text-light">Gym Name *</label>
                                        <input type="text"
                                            class="form-control bg-dark text-light @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name') }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label text-light">Contact Number *</label>
                                        <input type="text"
                                            class="form-control bg-dark text-light @error('phone') is-invalid @enderror"
                                            id="phone" name="phone" value="{{ old('phone') }}" required>
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="address" class="form-label text-light">Address *</label>
                                        <input type="text"
                                            class="form-control bg-dark text-light @error('address') is-invalid @enderror"
                                            id="address" name="address" value="{{ old('address') }}" required>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="location" class="form-label text-light">Location (City/Area) *</label>
                                        <input type="text"
                                            class="form-control bg-dark text-light @error('location') is-invalid @enderror"
                                            id="location" name="location" value="{{ old('location') }}" required>
                                        @error('location')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label text-light">Description *</label>
                                    <textarea
                                        class="form-control bg-dark text-light @error('description') is-invalid @enderror"
                                        id="description" name="description" rows="3"
                                        required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="images" class="form-label text-light">Gym Images</label>
                                    <input type="file"
                                        class="form-control bg-dark text-light @error('images') is-invalid @enderror"
                                        id="images" name="images[]" multiple accept="image/*">
                                    @error('images')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">You can upload multiple images</small>
                                </div>
                            </div>
                        </div>

                        <!-- Opening Hours Section -->
                        <div class="card bg-dark mb-4">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Opening Hours</h5>
                            </div>
                            <div class="card-body">
                                @php
                                    $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
                                @endphp

                                @foreach($days as $day)
                                    <div class="row mb-3 opening-hour-row" data-day="{{ $day }}">
                                        <div class="col-md-2">
                                            <label class="form-label text-light text-capitalize">{{ ucfirst($day) }}</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label text-light">Opening Time</label>
                                            <input type="time" class="form-control bg-dark text-light opening-time"
                                                name="opening_hours[{{ $day }}][open]"
                                                value="{{ old("opening_hours.$day.open", '08:00') }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label text-light">Closing Time</label>
                                            <input type="time" class="form-control bg-dark text-light closing-time"
                                                name="opening_hours[{{ $day }}][close]"
                                                value="{{ old("opening_hours.$day.close", '22:00') }}">
                                        </div>
                                        <div class="col-md-2 d-flex align-items-end">
                                            <div class="form-check">
                                                <input class="form-check-input is-24h" type="checkbox"
                                                    name="opening_hours[{{ $day }}][is_24h]" value="1"
                                                    id="is24h{{ ucfirst($day) }}">
                                                <label class="form-check-label text-light" for="is24h{{ ucfirst($day) }}">
                                                    24 Hours
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Facilities Section -->
                        <div class="card bg-dark mb-4">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Facilities</h5>
                            </div>
                            <div class="card-body">
                                <div id="facilities-container">
                                    <div class="row mb-3 facility-row">
                                        <div class="col-md-4">
                                            <label class="form-label text-light">Facility Name</label>
                                            <input type="text" class="form-control bg-dark text-light"
                                                name="facilities[0][name]">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label text-light">Available</label>
                                            <select class="form-select bg-dark text-light" name="facilities[0][available]">
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label text-light">Description</label>
                                            <input type="text" class="form-control bg-dark text-light"
                                                name="facilities[0][description]">
                                        </div>
                                        <div class="col-md-1 d-flex align-items-end">
                                            <button type="button" class="btn btn-danger remove-facility">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="add-facility" class="btn btn-sm btn-secondary">
                                    <i class="fas fa-plus me-1"></i> Add Facility
                                </button>
                            </div>
                        </div>

                        <!-- Pricing Section -->
                        <div class="card bg-dark mb-4">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Pricing</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label text-light">Day Pass Price</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" step="0.01" class="form-control bg-dark text-light"
                                                name="pricing[day_pass]" value="{{ old('pricing.day_pass', '15.00') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-light">Currency</label>
                                        <select class="form-select bg-dark text-light" name="pricing[currency]">
                                            <option value="USD" selected>USD</option>
                                            <option value="EUR">EUR</option>
                                            <option value="GBP">GBP</option>
                                        </select>
                                    </div>
                                </div>

                                <h6 class="text-light mb-3">Membership Plans</h6>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-light">Basic Plan (Monthly)</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" step="0.01" class="form-control bg-dark text-light"
                                                name="pricing[plans][basic][monthly]"
                                                value="{{ old('pricing.plans.basic.monthly', '39.99') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-light">Basic Plan (Annual)</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" step="0.01" class="form-control bg-dark text-light"
                                                name="pricing[plans][basic][annual]"
                                                value="{{ old('pricing.plans.basic.annual', '399.99') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-light">Premium Plan (Monthly)</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" step="0.01" class="form-control bg-dark text-light"
                                                name="pricing[plans][premium][monthly]"
                                                value="{{ old('pricing.plans.premium.monthly', '59.99') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-light">Premium Plan (Annual)</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" step="0.01" class="form-control bg-dark text-light"
                                                name="pricing[plans][premium][annual]"
                                                value="{{ old('pricing.plans.premium.annual', '599.99') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Status Section -->
                        <div class="card bg-dark mb-4">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Status</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="is_active"
                                        name="is_active" value="1" checked>
                                    <label class="form-check-label text-light" for="is_active">Active</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Save Gym
                            </button>
                            <a href="{{ route('admin.gyms.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Handle 24h checkbox for opening hours
            document.querySelectorAll('.is-24h').forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    const row = this.closest('.opening-hour-row');
                    const timeInputs = row.querySelectorAll('.opening-time, .closing-time');

                    timeInputs.forEach(input => {
                        input.disabled = this.checked;
                        if (this.checked) {
                            input.value = '';
                        } else {
                            // Set default values if needed
                            const day = row.dataset.day;
                            if (input.classList.contains('opening-time')) {
                                input.value = '08:00';
                            } else {
                                input.value = '22:00';
                            }
                        }
                    });
                });
            });

            // Add new facility row
            let facilityCounter = 1;
            document.getElementById('add-facility').addEventListener('click', function () {
                const container = document.getElementById('facilities-container');
                const newRow = document.createElement('div');
                newRow.className = 'row mb-3 facility-row';
                newRow.innerHTML = `
                    <div class="col-md-4">
                        <input type="text" class="form-control bg-dark text-light" 
                            name="facilities[${facilityCounter}][name]">
                    </div>
                    <div class="col-md-3">
                        <select class="form-select bg-dark text-light" 
                            name="facilities[${facilityCounter}][available]">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control bg-dark text-light" 
                            name="facilities[${facilityCounter}][description]">
                    </div>
                    <div class="col-md-1 d-flex align-items-end">
                        <button type="button" class="btn btn-danger remove-facility">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `;
                container.appendChild(newRow);
                facilityCounter++;
            });

            // Remove facility row
            document.addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-facility') ||
                    e.target.closest('.remove-facility')) {
                    const btn = e.target.classList.contains('remove-facility') ?
                        e.target : e.target.closest('.remove-facility');
                    btn.closest('.facility-row').remove();
                }
            });

            // Form submission handling
            document.getElementById('gymForm').addEventListener('submit', function (e) {
                // You can add additional validation here if needed
                // The form will automatically serialize the arrays/objects properly
            });
        });
    </script>
@endpush