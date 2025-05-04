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

                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Thumbnail</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Added</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>

                            @foreach ($videos as $video)
                            <h1>{{ $video->name }}</h1>
                            <h1>{{ $video->instructions }}</h1>
                            <h1>{{ $video->video_url }}</h1>
                            <h1>{{ $video->difficulty }}</h1>
                            <h1>{{ $video->recommended_reps }}</h1>
                            <h1>{{ $video->recommended_sets }}</h1>
                        
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
                        
                            <h1>Primary Muscles: {{ is_array($primaryMuscles) ? implode(', ', $primaryMuscles) : $primaryMuscles }}</h1>
                            <h1>Secondary Muscles: {{ is_array($secondaryMuscles) ? implode(', ', $secondaryMuscles) : $secondaryMuscles }}</h1>
                        
                            <h1>{{ $video->category_id }}</h1>
                            <h1>{{ $video->created_by }}</h1> {{-- Fixed from category_by to created_by based on your dd() output --}}
                            <h1>{{ $video->is_premium ? 'Yes' : 'No' }}</h1>
                            <h1>{{ $video->created_at }}</h1>
                            <h1>{{ $video->updated_at }}</h1>
                            <hr>
                        @endforeach

                            {{dd($videos)}}
                            <tbody>
                                @foreach($videos as $video)
                                    <tr>
                                        <td>{{ $video->id }}</td>
                                        <td>
                                            <div class="position-relative" style="width: 120px; height: 80px;">
                                                <img src="{{ asset('storage/') }}" alt="Image">
                                                <div class="position-absolute top-50 start-50 translate-middle">
                                                    <i class="fas fa-play text-white" style="font-size: 1.5rem;"></i>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $video->title }}</td>
                                        <td>{{ optional($video->videoCategory)->name ?? 'Uncategorized' }}</td>
                                        <td class="text-truncate" style="max-width: 200px;">
                                            {{ $video->description ?? 'No description' }}
                                        </td>
                                        <td>{{ $video->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="
                                                                                                                                                                                                                                                                                        {{-- {{ route('admin.videos.edit', $video->id) }} --}}
                                                                                                                                                                                                                                                                                         "
                                                    class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="
                                                                                                                                                                                                                                                                                        {{ $video->video_url }}
                                                                                                                                                                                                                                                                                         "
                                                    class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="View" target="_blank">
                                                    <i class="fas fa-eye"></i>
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

                    {{-- @if($videos->hasPages())
                    <div class="mt-3">
                        {{ $videos->links() }}
                    </div>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script>
@endpush