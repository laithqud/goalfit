@extends('layouts.dashboard.app')

@section('title', 'Add New Gym')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-black bg-opacity-75 rounded p-4">
                    <h6 class="mb-4 text-light">Add New Gym</h6>
                    <form action="{{ route('admin.gyms.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label text-light">Gym Name</label>
                                <input type="text" class="form-control bg-dark text-light" id="name" name="name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="location" class="form-label text-light">Location</label>
                                <input type="text" class="form-control bg-dark text-light" id="location" name="location"
                                    required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="phone" class="form-label text-light">Contact Number</label>
                                <input type="text" class="form-control bg-dark text-light" id="phone" name="phone" required>
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="form-label text-light">Gym Image</label>
                                <input type="file" class="form-control bg-dark text-light" id="image" name="image">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label text-light">Description</label>
                            <textarea class="form-control bg-dark text-light" id="description" name="description" rows="3"
                                required></textarea>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1"
                                checked>
                            <label class="form-check-label text-light" for="is_active">Active</label>
                        </div>
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" value="1">

                        <button type="submit" class="btn btn-primary">Add Gym</button>
                        <a href="{{ route('admin.gyms.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection