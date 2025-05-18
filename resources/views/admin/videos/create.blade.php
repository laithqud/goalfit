@extends('layouts.dashboard.app')

@section('title', 'Add New Workout Video')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-black bg-opacity-75 rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0 text-light">Add New Workout Video</h6>
                    <a href="{{ route('admin.videos.index') }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Back
                    </a>
                </div>

                <form method="POST" action="{{ route('admin.videos.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label text-light">Video Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control bg-dark text-light @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="video" class="col-sm-2 col-form-label text-light">Upload Video</label>
                        <div class="col-sm-10">
                            <input type="file"
                                class="form-control bg-dark text-light @error('video') is-invalid @enderror"
                                id="video" name="video" accept="video/mp4,video/x-m4v,video/*" required>
                            <small class="text-muted">Max file size: 100MB. Supported formats: MP4, MOV, AVI</small>
                            @error('video')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="category_id" class="col-sm-2 col-form-label text-light">Category</label>
                        <div class="col-sm-10">
                            <select class="form-select bg-dark text-light @error('category_id') is-invalid @enderror" 
                                    id="category_id" name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                        <label for="difficulty" class="col-sm-2 col-form-label text-light">Difficulty</label>
                        <div class="col-sm-10">
                            <select class="form-select bg-dark text-light @error('difficulty') is-invalid @enderror" 
                                    id="difficulty" name="difficulty" required>
                                @foreach($difficultyLevels as $level)
                                    <option value="{{ $level }}" {{ old('difficulty') == $level ? 'selected' : '' }}>
                                        {{ ucfirst($level) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('difficulty')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-light">Target Muscles</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="text-light">Primary Muscles</h6>
                                    @foreach($muscleGroups as $muscle)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" 
                                                   id="primary_{{ $muscle }}" name="primary_muscles[]" 
                                                   value="{{ $muscle }}" {{ in_array($muscle, old('primary_muscles', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label text-light" for="primary_{{ $muscle }}">
                                                {{ ucfirst(str_replace('_', ' ', $muscle)) }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-light">Secondary Muscles</h6>
                                    @foreach($muscleGroups as $muscle)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" 
                                                   id="secondary_{{ $muscle }}" name="secondary_muscles[]" 
                                                   value="{{ $muscle }}" {{ in_array($muscle, old('secondary_muscles', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label text-light" for="secondary_{{ $muscle }}">
                                                {{ ucfirst(str_replace('_', ' ', $muscle)) }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @error('target_muscles')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-light">Equipment Needed</label>
                        <div class="col-sm-10">
                            @foreach($equipmentOptions as $equipment)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" 
                                           id="equipment_{{ $equipment }}" name="equipment_needed[]" 
                                           value="{{ $equipment }}" {{ in_array($equipment, old('equipment_needed', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label text-light" for="equipment_{{ $equipment }}">
                                        {{ ucfirst(str_replace('_', ' ', $equipment)) }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-light">Durations (minutes)</label>
                        <div class="col-sm-10">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="warmup" class="form-label text-light">Warmup</label>
                                    <input type="number" class="form-control bg-dark text-light" 
                                           id="warmup" name="durations[warmup]" value="{{ old('durations.warmup') }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="exercise" class="form-label text-light">Exercise</label>
                                    <input type="number" class="form-control bg-dark text-light" 
                                           id="exercise" name="durations[exercise]" value="{{ old('durations.exercise') }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="cooldown" class="form-label text-light">Cooldown</label>
                                    <input type="number" class="form-control bg-dark text-light" 
                                           id="cooldown" name="durations[cooldown]" value="{{ old('durations.cooldown') }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="recommended_reps" class="col-sm-2 col-form-label text-light">Recommended Reps</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control bg-dark text-light" 
                                   id="recommended_reps" name="recommended_reps" value="{{ old('recommended_reps') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="recommended_sets" class="col-sm-2 col-form-label text-light">Recommended Sets</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control bg-dark text-light" 
                                   id="recommended_sets" name="recommended_sets" value="{{ old('recommended_sets') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="instructions" class="col-sm-2 col-form-label text-light">Instructions</label>
                        <div class="col-sm-10">
                            <textarea class="form-control bg-dark text-light" placeholder="1. Lie on a flat bench, 2. Lower the... " id="instructions" 
                                      name="instructions" rows="3">{{ old('instructions') }}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_premium" 
                                       name="is_premium" value="1" {{ old('is_premium') ? 'checked' : '' }}>
                                <label class="form-check-label text-light" for="is_premium">
                                    Premium Content (Only for paid members)
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Save Video</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection