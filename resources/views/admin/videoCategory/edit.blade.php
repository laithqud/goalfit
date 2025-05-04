@extends('layouts.dashboard.app')

@section('title', 'Edit Video Category')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-black bg-opacity-75 rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-light">Edit Category: {{ $category->name }}</h6>
                        <a href="{{ route('admin.workout-categories.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Back
                        </a>
                    </div>

                    <form method="POST" action="{{ route('admin.workout-categories.update', $category) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label text-light">Category Name</label>
                            <div class="col-sm-10">
                                <input type="text"
                                    class="form-control bg-dark text-light @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name', $category->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label text-light">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control bg-dark text-light @error('description') is-invalid @enderror"
                                    id="description" name="description" rows="3"
                                    required>{{ old('description', $category->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label text-light">Category Image</label>
                            <div class="col-sm-10">
                                <input class="form-control bg-dark text-light @error('image') is-invalid @enderror"
                                    type="file" id="image" name="image">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                @if($category->image_url)
                                    <div class="mt-2">
                                        <small class="text-muted">Current Image:</small>
                                        <img src="{{ asset('storage/' . $category->image_url) }}" class="img-thumbnail mt-1"
                                            style="max-height: 100px;">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Update Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection