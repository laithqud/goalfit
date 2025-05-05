@extends('layouts.dashboard.app')

@section('title', 'Food Category Management')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-black bg-opacity-75 rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-light">Food Categories</h6>
                        <a href="
                                        {{ route('admin.nutrition-categories.create') }}
                                         " class="btn btn-sm btn-primary">
                            <i class="fas fa-plus me-1"></i> Add New Category
                        </a>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Items Count</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Last Updated</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>
                                            @if($category->image_url)
                                                <img src="{{ asset('storage/' . $category->image_url) }}" alt="Category Image"
                                                    width="50" height="50">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->food_items_count ?? 0 }}</td>
                                        <td>{{ $category->created_at->format('M d, Y') }}</td>
                                        <td>{{ $category->updated_at->format('M d, Y') }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('admin.nutrition-categories.edit', $category->id) }}"
                                                    class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="
                                                                        {{ route('admin.nutrition-categories.destroy', $category->id) }}
                                                                         " method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Delete"
                                                        onclick="return confirm('Are you sure you want to delete this category? All related food items will be affected.')">
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
                    {{--
                    @if($categories->hasPages())
                    <div class="mt-3">
                        {{ $categories->links() }}
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