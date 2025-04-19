@extends('layouts.dashboard.app')

@section('title', 'Food Item Management')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-black bg-opacity-75 rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-light">Food Items</h6>
                        <div class="d-flex gap-2">
                            <a href="
                                {{-- {{ route('admin.food-items.create') }} --}}
                                 " class="btn btn-sm btn-primary">
                                <i class="fas fa-plus me-1"></i> Add New Food
                            </a>
                            <a href="
                                {{-- {{ route('admin.food-items.export') }} --}}
                                 " class="btn btn-sm btn-success">
                                <i class="fas fa-file-export me-1"></i> Export
                            </a>
                        </div>
                    </div>

                    <div class="mb-3">
                        <form action="
                            {{-- {{ route('admin.food-items.index') }} --}}
                             " method="GET" class="row g-2">
                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control bg-dark text-light"
                                    placeholder="Search by name..." value="{{ request('search') }}">
                            </div>
                            <div class="col-md-3">
                                <select name="category" class="form-select bg-dark text-light">
                                    <option value="">All Categories</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category')==$category->id ? 'selected' :
                                        '' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="sort" class="form-select bg-dark text-light">
                                    <option value="name_asc" {{ request('sort')=='name_asc' ? 'selected' : '' }}>Name
                                        (A-Z)</option>
                                    <option value="name_desc" {{ request('sort')=='name_desc' ? 'selected' : '' }}>Name
                                        (Z-A)</option>
                                    <option value="calories_asc" {{ request('sort')=='calories_asc' ? 'selected' : '' }}>
                                        Calories (Low-High)</option>
                                    <option value="calories_desc" {{ request('sort')=='calories_desc' ? 'selected' : '' }}>
                                        Calories (High-Low)</option>
                                    <option value="newest" {{ request('sort')=='newest' ? 'selected' : '' }}>Newest First
                                    </option>
                                    <option value="oldest" {{ request('sort')=='oldest' ? 'selected' : '' }}>Oldest First
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary w-100">Filter</button>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Food Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Calories</th>
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
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-2">
                                                @switch($item->foodCategory->name)
                                                @case('Fruits')
                                                <i class="fas fa-apple-alt text-success"></i>
                                                @break
                                                @case('Vegetables')
                                                <i class="fas fa-carrot text-primary"></i>
                                                @break
                                                @case('Meat')
                                                <i class="fas fa-drumstick-bite text-danger"></i>
                                                @break
                                                @case('Dairy')
                                                <i class="fas fa-cheese text-warning"></i>
                                                @break
                                                @default
                                                <i class="fas fa-utensils text-info"></i>
                                                @endswitch
                                            </div>
                                            <div class="flex-grow-1">
                                                {{ $item->name }}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">
                                            {{ $item->foodCategory->name }}
                                        </span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge bg-{{ $item->calories > 300 ? 'danger' : ($item->calories > 150 ? 'warning' : 'success') }}">
                                           
                                            {{ $item->calories }} kcal
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
                                                {{-- {{ route('admin.food-items.edit', $item->id) }} --}}
                                                 " class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="
                                                {{-- {{ route('admin.food-items.destroy', $item->id) }} --}}
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

                    {{-- @if($foodItems->hasPages())
                    <div class="mt-3">
                        {{ $foodItems->links() }}
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