@extends('layouts.dashboard.app')

@section('title', 'User Management')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-black bg-opacity-75 rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-light">System Users</h6>
                        <a href="
                                {{-- {{ route('admin.users.create') }} --}}
                                 " class="btn btn-sm btn-primary">
                            <i class="fas fa-plus me-1"></i> Add New User
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">BMI</th>
                                    <th scope="col">Joined</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                                        <tr>
                                                            <td>{{ $user->id }}</td>
                                                            <td>
                                                                @if($user->profile_image)
                                                                    <img src="
                                                                                {{ asset('storage/' . $user->profile_image) }}
                                                                                 " class="rounded-circle" width="40" height="40" alt="Profile">
                                                                @else
                                                                    <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center"
                                                                        style="width: 40px; height: 40px;">
                                                                        <i class="fas fa-user text-light"></i>
                                                                    </div>
                                                                @endif
                                                            </td>
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->email }}</td>
                                                            <td>{{ $user->gender ? ucfirst($user->gender) : 'N/A' }}</td>
                                                            <td>
                                                                @if($user->birth_date)
                                                                    {{ \Carbon\Carbon::parse($user->birth_date)->age }}
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($user->weight && $user->height)
                                                                                                @php
                                                                                                    $bmi = $user->weight / (($user->height / 100) ** 2);
                                                                                                @endphp
                                                                                                {{ number_format($bmi, 1) }}
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </td>
                                                            <td>
                                                                {{ $user->created_at->format('M d, Y') }}
                                                            </td>
                                                            <td>
                                                                <div class="d-flex justify-content-center gap-2">
                                                                    <a href="
                                                                            {{-- {{ route('admin.users.edit', $user->id) }} --}}
                                                                             " class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top" title="Edit">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                    <form action="
                                                                            {{-- {{ route('admin.users.destroy', $user->id) }} --}}
                                                                             " method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Delete"
                                                                            onclick="return confirm('Are you sure you want to delete this user?')">
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

                    {{-- @if($users->hasPages())
                    <div class="mt-3">
                        {{ $users->links() }}
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