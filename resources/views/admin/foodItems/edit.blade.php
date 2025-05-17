@extends('layouts.dashboard.app')

@section('title', 'Edit Food Item')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-black bg-opacity-75 rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-light">Edit Food Item: {{ $foodItem->name }}</h6>
                        <a href="{{ route('admin.food-items.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Back to List
                        </a>
                    </div>

                    <form action="{{ route('admin.food-items.update', $foodItem->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label text-light">Food Name</label>
                                <input type="text" class="form-control bg-dark text-light @error('name') is-invalid @enderror" 
                                    id="name" name="name" value="{{ old('name', $foodItem->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="category_id" class="form-label text-light">Category</label>
                                <select class="form-select bg-dark text-light @error('category_id') is-invalid @enderror" 
                                    id="category_id" name="category_id" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" 
                                            {{ old('category_id', $foodItem->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            {{-- <div class="col-md-6">
                                <label for="calories" class="form-label text-light">Calories (kcal)</label>
                                <input type="number" class="form-control bg-dark text-light @error('calories') is-invalid @enderror" 
                                    id="calories" name="calories" value="{{ old('calories', $foodItem->calories) }}" required min="0" step="1">
                                @error('calories')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> --}}

                            <div class="col-md-6">
                                <label for="image" class="form-label text-light">Food Image</label>
                                <input type="file" class="form-control bg-dark text-light @error('image') is-invalid @enderror" 
                                    id="image" name="image" accept="image/*">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @if($foodItem->image_url)
                                    <div class="mt-2">
                                        <small class="text-muted">Current Image:</small>
                                        <img src="{{ asset($foodItem->image_url) }}" alt="{{ $foodItem->name }}" 
                                            class="img-thumbnail mt-1" style="max-height: 100px;">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label text-light">Description</label>
                            <textarea class="form-control bg-dark text-light @error('description') is-invalid @enderror" 
                                id="description" name="description" rows="3">{{ old('description', $foodItem->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured" 
                                value="1" {{ old('is_featured', $foodItem->is_featured) ? 'checked' : '' }}>
                            <label class="form-check-label text-light" for="is_featured">Featured Item</label>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary me-md-2">
                                <i class="fas fa-save me-1"></i> Update Food Item
                            </button>
                            <a href="{{ route('admin.food-items.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection