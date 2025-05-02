@extends('layouts.dashboard.app')

@section('title', 'Edit Admin')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-dark rounded p-4">
                    <h6 class="mb-4 text-light">Edit Admin User</h6>

                    <form method="POST" action="{{ route('dashboard.admins.update', $admin->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label text-light">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $admin->name) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label text-light">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', $admin->email) }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="password" class="form-label text-light">New Password (leave blank to keep
                                    current)</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label text-light">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="role" class="form-label text-light">Role</label>
                                <select class="form-select" id="role" name="role" required>
                                    <option value="admin" {{ $admin->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="superadmin" {{ $admin->role === 'superadmin' ? 'selected' : '' }}>
                                        Superadmin</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('dashboard.admins.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Back
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Update Admin
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection