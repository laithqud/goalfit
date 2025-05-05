@extends('layouts.dashboard.app')

@section('title', 'Create Nutrition Category')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-black bg-opacity-75 rounded p-4">
                    <div class="d-flex justify-content-between mb-4">
                        <h6 class="text-light">Create Nutrition Category</h6>
                        <a href="{{ route('admin.nutrition-categories.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left me-1"></i> Back
                        </a>
                    </div>

                    <form method="POST" action="{{ route('admin.nutrition-categories.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{-- Left Column --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-white">Name</label>
                                    <input type="text" name="name" class="form-control bg-secondary border-dark text-white"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label text-white">Description</label>
                                    <textarea name="description" rows="3"
                                        class="form-control bg-secondary border-dark text-white" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label text-white">Image</label>
                                    <input type="file" name="image" class="form-control bg-secondary border-dark text-white"
                                        required>
                                    <small class="text-muted">Accepted: jpeg, png, jpg, gif (Max 2MB)</small>
                                </div>
                            </div>

                            {{-- Right Column --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-white">Calories</label>
                                    <input type="number" name="calories"
                                        class="form-control bg-secondary border-dark text-white" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label text-white">Protein (g)</label>
                                        <input type="number" step="0.1" name="protien"
                                            class="form-control bg-secondary border-dark text-white" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label text-white">Carbs (g)</label>
                                        <input type="number" step="0.1" name="carbs"
                                            class="form-control bg-secondary border-dark text-white" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label text-white">Fat (g)</label>
                                        <input type="number" step="0.1" name="fat"
                                            class="form-control bg-secondary border-dark text-white" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label text-white">Nutrients (JSON)</label>
                                    <textarea name="nutrients" rows="3"
                                        class="form-control bg-secondary border-dark text-white"
                                        placeholder='{"vitamins": {"A": "10%"}}'></textarea>
                                    <small class="text-muted">Optional. Provide valid JSON structure.</small>
                                </div>
                            </div>
                        </div>

                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection