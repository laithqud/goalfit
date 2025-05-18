@extends('layouts.dashboard.app')

@section('title', 'Food Item Management')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-black bg-opacity-75 rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-light">Food Items</h6>
                        {{-- {{dd($foodItems)}} --}}
                        {{-- {{dd($categories)}} --}}
                        <div class="d-flex gap-2">
                            <a href="
                                                            {{ route('admin.food-items.create') }}
                                                             " class="btn btn-sm btn-primary">
                                <i class="fas fa-plus me-1"></i> Add New Food
                            </a>
                        </div>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" id="success-alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <script>
                            setTimeout(function () {
                                $('#success-alert').alert('close');
                            }, 2000);
                        </script>
                    @endif


                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Food Name</th>
                                    <th scope="col">Category</th>

                                    <th scope="col">Description</th>
                                    <th scope="col">Added</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($foodItems as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            {{ $item->name }}

                                        </td>
                                        <td>
                                            <span class="badge bg-secondary">
                                                {{ $item->nutritionCategory->name ?? 'No category' }}
                                            </span>
                                        </td>

                                        <td class="text-truncate" style="max-width: 200px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="
                                                                                                    {{ $item->description ?? 'No description' }}
                                                                                                     ">
                                            {{ $item->description ? Str::limit($item->description, 30) : '-' }}
                                        </td>
                                        <td>{{ $item->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="
                                                                                                        {{ route('admin.food-items.edit', $item->id) }}
                                                                                                         "
                                                    class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="
                                                                                                        {{ route('admin.food-items.destroy', $item->id) }}
                                                                                                         " method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Delete"
                                                        onclick="return confirm('Are you sure you want to delete this food item?')">
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