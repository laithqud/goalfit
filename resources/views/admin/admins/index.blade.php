@extends('layouts.dashboard.app')

@section('title', 'Admin Management')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-dark rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-light">Admin Users</h6>
                        <a href="{{ route('admin.admins.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus me-1"></i> Add Admin
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-light">ID</th>
                                    <th class="text-light">Name</th>
                                    <th class="text-light">Email</th>
                                    <th class="text-light">Role</th>
                                    <th class="text-light">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admins as $admin)
                                    <tr>
                                        <th class="text-light">{{ $admin->id }}</td>
                                        <th class="text-light">{{ $admin->name }}</td>
                                        <th class="text-light">{{ $admin->email }}</td>
                                        <td>
                                            <span class="badge bg-{{ $admin->role === 'superadmin' ? 'danger' : 'primary' }}">
                                                {{ ucfirst($admin->role) }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.admins.edit', $admin->id) }}"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                @if($admin->role !== 'superadmin')
                                                    <form action="{{ route('admin.admins.destroy', $admin->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are you sure?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $admins->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection