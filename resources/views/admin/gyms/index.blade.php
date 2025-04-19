@extends('layouts.dashboard.app')

@section('title', 'Gym Management')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-black bg-opacity-75 rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-light">Gym Facilities</h6>
                        <a href="
                                    {{-- {{ route('admin.gyms.create') }} --}}
                                     " class="btn btn-sm btn-primary">
                            <i class="fas fa-plus me-1"></i> Add New Gym
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Added</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($gyms as $gym)
                                    <tr>
                                        <td>{{ $gym->id }}</td>
                                        <td>
                                            @if($gym->image)
                                                <img src="
                                                                {{ asset('storage/' . $gym->image) }}
                                                                 " class="img-thumbnail" width="80" height="80" alt="Gym Image">
                                            @else
                                                <div class="bg-secondary d-flex align-items-center justify-content-center"
                                                    style="width: 80px; height: 80px;">
                                                    <i class="fas fa-dumbbell text-light fa-2x"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>{{ $gym->name }}</td>
                                        <td>{{ $gym->location }}</td>
                                        <td>{{ $gym->phone ?? 'N/A' }}</td>
                                        <td class="text-truncate" style="max-width: 200px;">
                                            {{ $gym->description ?? 'No description' }}
                                        </td>
                                        <td>{{ $gym->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="
                                                            {{-- {{ route('admin.gyms.edit', $gym->id) }} --}}
                                                             " class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="
                                                            {{-- {{ route('admin.gyms.destroy', $gym->id) }} --}}
                                                             " method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Delete"
                                                        onclick="return confirm('Are you sure you want to delete this gym?')">
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

                    {{-- @if($gyms->hasPages())
                    <div class="mt-3">
                        {{ $gyms->links() }}
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