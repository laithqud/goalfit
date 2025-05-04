@extends('layouts.dashboard.app')

@section('title', 'Edit Video')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-black bg-opacity-75 rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0 text-light">Edit Workout Video</h6>
                    <a href="{{ route('admin.videos.index') }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Back to List
                    </a>
                </div>

                <form method="POST" action="{{ route('admin.videos.update', $video->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @php
                        // Decode JSON fields
                        $targetMuscles = json_decode(str_replace('\"', '"', $video->target_muscles), true);
                        $equipment = json_decode(str_replace('\"', '"', $video->equipment_needed), true);
                        $durations = json_decode(str_replace('\"', '"', $video->durations_in_minutes), true);
                    @endphp

                    <div class="row">
                        <!-- Basic Information -->
                        <div class="col-md-6">
                            <div class="card bg-dark mb-4">
                                <div class="card-header bg-primary text-white">
                                    Basic Information
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="name" class="form-label text-white">Video Name</label>
                                        <input type="text" class="form-control bg-secondary border-dark text-white" 
                                               id="name" name="name" value="{{ old('name', $video->name) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="video_url" class="form-label text-white">YouTube URL</label>
                                        <input type="url" class="form-control bg-secondary border-dark text-white" 
                                               id="video_url" name="video_url" value="{{ old('video_url', $video->video_url) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="instructions" class="form-label text-white">Instructions</label>
                                        <textarea class="form-control bg-secondary border-dark text-white" 
                                                  id="instructions" name="instructions" rows="3">{{ old('instructions', $video->instructions) }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="difficulty" class="form-label text-white">Difficulty Level</label>
                                        <select class="form-select bg-secondary border-dark text-white" 
                                                id="difficulty" name="difficulty" required>
                                            <option value="beginner" {{ old('difficulty', $video->difficulty) == 'beginner' ? 'selected' : '' }}>Beginner</option>
                                            <option value="intermediate" {{ old('difficulty', $video->difficulty) == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                                            <option value="advanced" {{ old('difficulty', $video->difficulty) == 'advanced' ? 'selected' : '' }}>Advanced</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Workout Details -->
                        <div class="col-md-6">
                            <div class="card bg-dark mb-4">
                                <div class="card-header bg-primary text-white">
                                    Workout Details
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="recommended_reps" class="form-label text-white">Recommended Reps</label>
                                            <input type="number" class="form-control bg-secondary border-dark text-white" 
                                                   id="recommended_reps" name="recommended_reps" 
                                                   value="{{ old('recommended_reps', $video->recommended_reps) }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="recommended_sets" class="form-label text-white">Recommended Sets</label>
                                            <input type="number" class="form-control bg-secondary border-dark text-white" 
                                                   id="recommended_sets" name="recommended_sets" 
                                                   value="{{ old('recommended_sets', $video->recommended_sets) }}">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="primary_muscles" class="form-label text-white">Primary Muscles (comma separated)</label>
                                        <input type="text" class="form-control bg-secondary border-dark text-white" 
                                               id="primary_muscles" name="primary_muscles" 
                                               value="{{ old('primary_muscles', implode(', ', $targetMuscles['primary'] ?? [])) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="secondary_muscles" class="form-label text-white">Secondary Muscles (comma separated)</label>
                                        <input type="text" class="form-control bg-secondary border-dark text-white" 
                                               id="secondary_muscles" name="secondary_muscles" 
                                               value="{{ old('secondary_muscles', implode(', ', $targetMuscles['secondary'] ?? [])) }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Equipment & Duration -->
                        <div class="col-md-6">
                            <div class="card bg-dark mb-4">
                                <div class="card-header bg-primary text-white">
                                    Equipment Needed
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label text-white">Select Equipment</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="equip_dumbbells" 
                                                   name="equipment[]" value="dumbbells" 
                                                   {{ in_array('dumbbells', $equipment ?? []) ? 'checked' : '' }}>
                                            <label class="form-check-label text-white" for="equip_dumbbells">Dumbbells</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="equip_pullup_bar" 
                                                   name="equipment[]" value="pull_up_bar" 
                                                   {{ in_array('pull_up_bar', $equipment ?? []) ? 'checked' : '' }}>
                                            <label class="form-check-label text-white" for="equip_pullup_bar">Pull-up Bar</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="equip_yoga_mat" 
                                                   name="equipment[]" value="yoga_mat" 
                                                   {{ in_array('yoga_mat', $equipment ?? []) ? 'checked' : '' }}>
                                            <label class="form-check-label text-white" for="equip_yoga_mat">Yoga Mat</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="equip_resistance_band" 
                                                   name="equipment[]" value="resistance_band" 
                                                   {{ in_array('resistance_band', $equipment ?? []) ? 'checked' : '' }}>
                                            <label class="form-check-label text-white" for="equip_resistance_band">Resistance Band</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card bg-dark mb-4">
                                <div class="card-header bg-primary text-white">
                                    Duration (Minutes)
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="warmup_duration" class="form-label text-white">Warmup</label>
                                        <input type="number" class="form-control bg-secondary border-dark text-white" 
                                               id="warmup_duration" name="warmup_duration" 
                                               value="{{ old('warmup_duration', $durations['warmup'] ?? '') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exercise_duration" class="form-label text-white">Exercise</label>
                                        <input type="number" class="form-control bg-secondary border-dark text-white" 
                                               id="exercise_duration" name="exercise_duration" 
                                               value="{{ old('exercise_duration', $durations['exercise'] ?? '') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="cooldown_duration" class="form-label text-white">Cooldown</label>
                                        <input type="number" class="form-control bg-secondary border-dark text-white" 
                                               id="cooldown_duration" name="cooldown_duration" 
                                               value="{{ old('cooldown_duration', $durations['cooldown'] ?? '') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Settings -->
                        <div class="col-12">
                            <div class="card bg-dark mb-4">
                                <div class="card-header bg-primary text-white">
                                    Additional Settings
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="category_id" class="form-label text-white">Category</label>
                                            <select class="form-select bg-secondary border-dark text-white" 
                                                    id="category_id" name="category_id">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" 
                                                        {{ old('category_id', $video->category_id) == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="is_premium" 
                                                       name="is_premium" value="1" 
                                                       {{ old('is_premium', $video->is_premium) ? 'checked' : '' }}>
                                                <label class="form-check-label text-white" for="is_premium">Premium Content</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="fas fa-save me-1"></i> Update Video
                            </button>
                            <a href="{{ route('admin.videos.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i> Cancel
                            </a>
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