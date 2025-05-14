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
                        <label for="video" class="col-sm-2 col-form-label text-light">Video Upload</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control bg-dark text-light @error('video') is-invalid @enderror" id="video" name="video">
                            @if($video->video)
                                <div class="mt-2">
                                    <small class="text-light">Current Video:</small>
                                    <div class="d-flex align-items-center mt-1">
                                        <span class="text-light me-2">{{ $video->video }}</span>
                                        <a href="{{ asset('storage/'.$video->video) }}" target="_blank" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                    </div>
                                </div>
                            @endif
                            @error('video')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="difficulty" class="col-sm-2 col-form-label text-light">Difficulty</label>
                        <div class="col-sm-10">
                            <select class="form-select bg-dark text-light @error('difficulty') is-invalid @enderror" id="difficulty" name="difficulty" required>
                                <option value="">Select Difficulty</option>
                                @foreach(['beginner', 'intermediate', 'advanced'] as $level)
                                    <option value="{{ $level }}" {{ old('difficulty', $video->difficulty) === $level ? 'selected' : '' }}>
                                        {{ ucfirst($level) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('difficulty')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    @php
                        $oldPrimary = old('primary_muscles', $video->target_muscles['primary'] ?? []);
                        $oldSecondary = old('secondary_muscles', $video->target_muscles['secondary'] ?? []);
                        $oldEquipmentRaw = old('equipment_needed', $video->equipment_needed ?? []);
                        $oldEquipment = is_array($oldEquipmentRaw) ? $oldEquipmentRaw : json_decode($oldEquipmentRaw, true);
                        $oldDurations = old('durations', $video->durations_in_minutes ?? ['warmup' => 0, 'exercise' => 0, 'cooldown' => 0]);
                    @endphp

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-light">Target Muscles</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="text-light">Primary Muscles</h6>
                                    @foreach(['chest', 'back', 'shoulders', 'arms', 'legs', 'abs', 'glutes'] as $muscle)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="primary_{{ $muscle }}" name="primary_muscles[]" 
                                                   value="{{ $muscle }}" {{ in_array($muscle, $oldPrimary) ? 'checked' : '' }}>
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
                                            <input class="form-check-input" type="checkbox" id="secondary_{{ $muscle }}" name="secondary_muscles[]" 
                                                   value="{{ $muscle }}" {{ in_array($muscle, $oldSecondary) ? 'checked' : '' }}>
                                            <label class="form-check-label text-light" for="secondary_{{ $muscle }}">
                                                {{ ucfirst($muscle) }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-light">Equipment Needed</label>
                        <div class="col-sm-10">
                            @foreach(['dumbbells', 'yoga_mat', 'resistance_bands', 'kettlebell', 'pull_up_bar'] as $equipment)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="equipment_{{ $equipment }}" name="equipment_needed[]" 
                                           value="{{ $equipment }}" {{ in_array($equipment, $oldEquipment ?? []) ? 'checked' : '' }}>
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
                                @foreach(['warmup', 'exercise', 'cooldown'] as $part)
                                    <div class="col-md-4">
                                        <label for="{{ $part }}" class="form-label text-light">{{ ucfirst($part) }}</label>
                                        <input type="number" class="form-control bg-dark text-light" id="{{ $part }}" name="durations[{{ $part }}]" 
                                               value="{{ $oldDurations[$part] ?? 0 }}" min="0">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="category_id" class="col-sm-2 col-form-label text-light">Category</label>
                        <div class="col-sm-10">
                            <select class="form-select bg-dark text-light @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
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
                                <input class="form-check-input" type="checkbox" id="is_premium" name="is_premium" value="1" {{ old('is_premium', $video->is_premium) ? 'checked' : '' }}>
                                <label class="form-check-label text-light" for="is_premium">
                                    Premium Content (Only for paid members)
                                </label>
                            </div>
                        </div>
                    </div>

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