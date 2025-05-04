@extends('layouts.dashboard.app')

@section('title', 'Video Management')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-black bg-opacity-75 rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-light">Video Library</h6>
                        <a href="{{ route('admin.videos.create') }}
                                                                                                                                                                                                                             "
                            class="btn btn-sm btn-primary">
                            <i class="fas fa-plus me-1"></i> Add New Video
                        </a>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Instructions</th>
                                    <th scope="col">Video-URL</th>
                                    <th scope="col">Difficulty</th>
                                    <th scope="col">recommended_reps</th>
                                    <th scope="col">recommended_sets</th>
                                    <th scope="col">Equipment Needed</th>
                                    <th scope="col">Target Muscles</th>
                                    <th scope="col">Durations/minutes</th>
                                    <th scope="col">Category Id</th>
                                    <th scope="col">Created by</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Updated at</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($videos as $video)
                                                            <tr>
                                                                <td>{{ $video->id }}</td>
                                                                <td class="text-truncate" style="max-width: 150px;">
                                                                    {{ $video->name ?? 'No name' }}
                                                                </td>
                                                                <td class="text-truncate" style="max-width: 200px;">
                                                                    {{ $video->instructions ?? 'No instructions' }}
                                                                </td>
                                                                <td class="text-truncate" style="max-width: 200px;">
                                                                    <a href="{{ $video->video_url }}" class="text-light"
                                                                        target="_blank">{{ $video->video_url }}</a>
                                                                </td>
                                                                <td>{{ $video->difficulty ?? 'No difficulty' }}</td>
                                                                <td>{{$video->recommended_reps}}</td>
                                                                <td>{{$video->recommended_sets}}</td>
                                                                <td>
                                                                    @php
                                                                        // Handle equipment_needed
                                                                        try {
                                                                            $equipment = is_string($video->equipment_needed)
                                                                                ? json_decode(str_replace('\"', '"', $video->equipment_needed), true)
                                                                                : $video->equipment_needed;

                                                                            if (!is_array($equipment)) {
                                                                                $equipment = [];
                                                                            }
                                                                        } catch (Exception $e) {
                                                                            $equipment = [];
                                                                        }
                                                                    @endphp

                                                                    @if(!empty($equipment))
                                                                        {{ is_array($equipment) ? implode(', ', $equipment) : $equipment }}
                                                                    @else
                                                                        <span class="text-muted">No equipment needed</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @php
                                                                        // Handle target_muscles
                                                                        try {
                                                                            $targetMuscles = is_string($video->target_muscles)
                                                                                ? json_decode(str_replace('\"', '"', $video->target_muscles), true)
                                                                                : $video->target_muscles;

                                                                            if (is_array($targetMuscles)) {
                                                                                $primaryMuscles = $targetMuscles['primary'] ?? [];
                                                                                $secondaryMuscles = $targetMuscles['secondary'] ?? [];
                                                                            } else {
                                                                                $primaryMuscles = [];
                                                                                $secondaryMuscles = [];
                                                                            }
                                                                        } catch (Exception $e) {
                                                                            $primaryMuscles = [];
                                                                            $secondaryMuscles = [];
                                                                        }
                                                                    @endphp

                                                                    @if(!empty($primaryMuscles) || !empty($secondaryMuscles))
                                                                        @if(!empty($primaryMuscles))
                                                                            <strong>Primary:</strong>
                                                                            {{ is_array($primaryMuscles) ? implode(', ', $primaryMuscles) : $primaryMuscles }}<br>
                                                                        @endif
                                                                        @if(!empty($secondaryMuscles))
                                                                            <strong>Secondary:</strong>
                                                                            {{ is_array($secondaryMuscles) ? implode(', ', $secondaryMuscles) : $secondaryMuscles }}
                                                                        @endif
                                                                    @else
                                                                        <span class="text-muted">No target muscles specified</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @php
                                                                        // Handle durations_in_minutes
                                                                        try {
                                                                            $durations = is_string($video->durations_in_minutes)
                                                                                ? json_decode(str_replace('\"', '"', $video->durations_in_minutes), true)
                                                                                : $video->durations_in_minutes;

                                                                            if (!is_array($durations)) {
                                                                                $durations = [
                                                                                    'warmup' => null,
                                                                                    'exercise' => null,
                                                                                    'cooldown' => null
                                                                                ];
                                                                            }
                                                                        } catch (Exception $e) {
                                                                            $durations = [
                                                                                'warmup' => null,
                                                                                'exercise' => null,
                                                                                'cooldown' => null
                                                                            ];
                                                                        }
                                                                    @endphp

                                                                    <div class="durations-container">
                                                                        @if($durations['warmup'])
                                                                            <div><small>Warmup:</small> {{ $durations['warmup'] }} min</div>
                                                                        @endif
                                                                        @if($durations['exercise'])
                                                                            <div><small>Exercise:</small> {{ $durations['exercise'] }} min</div>
                                                                        @endif
                                                                        @if($durations['cooldown'])
                                                                            <div><small>Cooldown:</small> {{ $durations['cooldown'] }} min</div>
                                                                        @endif
                                                                        @if(empty(array_filter($durations)))
                                                                            <span class="text-muted">No durations set</span>
                                                                        @endif
                                                                    </div>
                                                                </td>

                                                                <td>{{ $video->category->name ?? 'No category' }}</td>
                                                                <td>{{ $video->created_by ?? 'No creator' }}</td>
                                                                <td>{{ $video->created_at ?? 'No creation date' }}</td>
                                                                <td>{{ $video->updated_at ?? 'No update date' }}</td>
                                                                <td>
                                                                    <div class="d-flex justify-content-center gap-2">
                                                                        <a href="{{ route('admin.videos.edit', $video->id) }}" "
                                                                                                            class=" btn btn-sm btn-warning"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                                            <i class="fas fa-edit"></i>
                                                                        </a>
                                                                        <form
                                                                            action="
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            {{ route('admin.videos.destroy', $video->id) }}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                "
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                                                                data-bs-placement="top" title="Delete"
                                                                                onclick="return confirm('Are you sure you want to delete this video?')">
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
    {{--
    <script>
        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script> --}}
@endpush