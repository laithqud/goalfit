@extends('layouts.dashboard.app')

@section('title', 'Admin Management')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-black bg-opacity-75 rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-light">Admin Users</h6>
                        <a href="
                            {{-- {{ route('admin.admins.create') }} --}}
                             " class="btn btn-sm btn-primary">Add New Admin</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-dark table-hover text-center align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach($admins as $admin) --}}
                                <tr>
                                    {{-- <td>{{ $admin->id }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->created_at->format('M d, Y') }}</td> --}}
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href={{-- "{{ route('admin.admins.edit', $admin->id) }}" --}}
                                                class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="
                                                    {{-- {{ route('admin.admins.destroy', $admin->id) }} --}}
                                                     " method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this admin?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>

                    {{-- @if($admins->hasPages())
                    <div class="mt-3">
                        {{ $admins->links() }}
                    </div>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
@endsection