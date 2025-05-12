@extends('layouts.dashboard.app')

@section('title', 'Edit Workout')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-black bg-opacity-75 rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0 text-light">Edit Workout</h6>
                    <a href="{{ route('admin.videos.index') }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Back
                    </a>
                </div>

                <form method="POST" action="{{ route('admin.videos.update', $video->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @php
                        // Decode JSON fields with proper fallbacks
                        $targetMuscles = json_decode($video->target_muscles, true) ?? ['primary' => [], 'secondary' => []];
                        $equipment = json_decode($video->equipment_needed, true) ?? [];
                        $durations = json_decode($video->durations_in_minutes, true) ?? [
                            'warmup' => 0,
                            'exercise' => 0,
                            'cooldown' => 0
                        ];
                    @endphp

                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label text-light">Workout Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control bg-dark text-light @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', $video->name) }}" required maxlength="191">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="instructions" class="col-sm-2 col-form-label text-light">Instructions</label>
                        <div class="col-sm-10">
                            <textarea class="form-control bg-dark text-light @error('instructions') is-invalid @enderror" 
                                      id="instructions" name="instructions" rows="5">{{ old('instructions', $video->instructions) }}</textarea>
                            @error('instructions')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="video_url" class="col-sm-2 col-form-label text-light">Video Embed Code</label>
                        <div class="col-sm-10">
                            <textarea class="form-control bg-dark text-light @error('video_url') is-invalid @enderror" 
                                      id="video_url" name="video_url" rows="3" required>{{ old('video_url', $video->video_url) }}</textarea>
                            @error('video_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Paste full iframe embed code (e.g., YouTube iframe)</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="difficulty" class="col-sm-2 col-form-label text-light">Difficulty</label>
                        <div class="col-sm-10">
                            <select class="form-select bg-dark text-light @error('difficulty') is-invalid @enderror" 
                                    id="difficulty" name="difficulty" required>
                                <option value="">Select Difficulty</option>
                                <option value="beginner" {{ old('difficulty', $video->difficulty) == 'beginner' ? 'selected' : '' }}>Beginner</option>
                                <option value="intermediate" {{ old('difficulty', $video->difficulty) == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                                <option value="advanced" {{ old('difficulty', $video->difficulty) == 'advanced' ? 'selected' : '' }}>Advanced</option>
                            </select>
                            @error('difficulty')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="recommended_reps" class="col-sm-2 col-form-label text-light">Recommended Reps</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control bg-dark text-light @error('recommended_reps') is-invalid @enderror" 
                                   id="recommended_reps" name="recommended_reps" value="{{ old('recommended_reps', $video->recommended_reps) }}" min="0" max="255">
                            @error('recommended_reps')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="recommended_sets" class="col-sm-2 col-form-label text-light">Recommended Sets</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control bg-dark text-light @error('recommended_sets') is-invalid @enderror" 
                                   id="recommended_sets" name="recommended_sets" value="{{ old('recommended_sets', $video->recommended_sets) }}" min="0" max="255">
                            @error('recommended_sets')
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
                                    @foreach(['chest', 'back', 'shoulders', 'arms', 'legs', 'abs', 'glutes'] as $muscle)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" 
                                                   id="primary_{{ $muscle }}" name="primary_muscles[]" 
                                                   value="{{ $muscle }}" {{ in_array($muscle, old('primary_muscles', $targetMuscles['primary'] ?? [])) ? 'checked' : '' }}>
                                            <label class="form-check-label text-light" for="primary_{{ $muscle }}">
                                                {{ ucfirst($muscle) }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-light">Secondary Muscles</h6>
                                    @foreach(['chest', 'back', 'shoulders', 'arms', 'legs', 'abs', 'glutes'] as $muscle)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" 
                                                   id="secondary_{{ $muscle }}" name="secondary_muscles[]" 
                                                   value="{{ $muscle }}" {{ in_array($muscle, old('secondary_muscles', $targetMuscles['secondary'] ?? [])) ? 'checked' : '' }}>
                                            <label class="form-check-label text-light" for="secondary_{{ $muscle }}">
                                                {{ ucfirst($muscle) }}
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
                            @foreach(['dumbbells', 'yoga_mat', 'resistance_bands', 'kettlebell', 'pull_up_bar'] as $equipmentItem)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" 
                                           id="equipment_{{ $equipmentItem }}" name="equipment_needed[]" 
                                           value="{{ $equipmentItem }}" {{ in_array($equipmentItem, old('equipment_needed', $equipment ?? [])) ? 'checked' : '' }}>
                                    <label class="form-check-label text-light" for="equipment_{{ $equipmentItem }}">
                                        {{ ucfirst(str_replace('_', ' ', $equipmentItem)) }}
                                    </label>
                                </div>
                            @endforeach
                            @error('equipment_needed')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-light">Durations (minutes)</label>
                        <div class="col-sm-10">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="warmup" class="form-label text-light">Warmup</label>
                                    <input type="number" class="form-control bg-dark text-light @error('durations.warmup') is-invalid @enderror" 
                                           id="warmup" name="durations[warmup]" value="{{ old('durations.warmup', $durations['warmup'] ?? 0) }}" min="0">
                                    @error('durations.warmup')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="exercise" class="form-label text-light">Exercise</label>
                                    <input type="number" class="form-control bg-dark text-light @error('durations.exercise') is-invalid @enderror" 
                                           id="exercise" name="durations[exercise]" value="{{ old('durations.exercise', $durations['exercise'] ?? 0) }}" min="0">
                                    @error('durations.exercise')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="cooldown" class="form-label text-light">Cooldown</label>
                                    <input type="number" class="form-control bg-dark text-light @error('durations.cooldown') is-invalid @enderror" 
                                           id="cooldown" name="durations[cooldown]" value="{{ old('durations.cooldown', $durations['cooldown'] ?? 0) }}" min="0">
                                    @error('durations.cooldown')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="category_id" class="col-sm-2 col-form-label text-light">Category</label>
                        <div class="col-sm-10">
                            <select class="form-select bg-dark text-light @error('category_id') is-invalid @enderror" 
                                    id="category_id" name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $video->category_id) == $category->id ? 'selected' : '' }}>
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
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_premium" 
                                       name="is_premium" value="1" {{ old('is_premium', $video->is_premium) ? 'checked' : '' }}>
                                <label class="form-check-label text-light" for="is_premium">
                                    Premium Content (Only for paid members)
                                </label>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="created_by" value="{{ auth()->id() }}">

                    <div class="row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Update Workout</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize any needed JavaScript here
    });
</script>
@endpush