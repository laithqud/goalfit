@extends('layouts.dashboard.app')

@section('title', 'Edit Gym')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-black bg-opacity-75 rounded p-4">
                    <h6 class="mb-4 text-light">Edit Gym</h6>
                    <form action="{{ route('admin.gyms.update', $gym->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label text-light">Gym Name</label>
                                <input type="text" class="form-control bg-dark text-light" id="name" name="name"
                                    value="{{ old('name', $gym->name) }}" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="location" class="form-label text-light">Location</label>
                                <input type="text" class="form-control bg-dark text-light" id="location" name="location"
                                    value="{{ old('location', $gym->location) }}" required>
                                @error('location')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="phone" class="form-label text-light">Contact Number</label>
                                <input type="text" class="form-control bg-dark text-light" id="phone" name="phone"
                                    value="{{ old('phone', $gym->phone) }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="address" class="form-label text-light">Address</label>
                                <input type="text" class="form-control bg-dark text-light" id="address" name="address"
                                    value="{{ old('address', $gym->address) }}">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label text-light">Description</label>
                            <textarea class="form-control bg-dark text-light" id="description" name="description"
                                rows="3">{{ old('description', $gym->description) }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label text-light">Featured Image</label>
                            <input type="file" class="form-control bg-dark text-light" id="image" name="image">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            @if($gym->featuredImage)
                                <div class="mt-3">
                                    <p class="text-light">Current Featured Image:</p>
                                    <img src="{{ asset('storage/' . $gym->featuredImage['url']) }}" 
                                         class="img-thumbnail" 
                                         width="200" 
                                         alt="{{ $gym->featuredImage['caption'] ?? 'Gym image' }}">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" id="remove_image" name="remove_image">
                                        <label class="form-check-label text-light" for="remove_image">
                                            Remove current featured image
                                        </label>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active"
                                {{ old('is_active', $gym->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label text-light" for="is_active">Active</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Gym</button>
                        <a href="{{ route('admin.gyms.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection