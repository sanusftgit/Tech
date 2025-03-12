@extends('teachers.layout')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg rounded">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Teacher Details</h2>
                    <a href="{{ route('teachers.create') }}" class="btn btn-outline-light">Create New Teacher</a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center">
                            <thead class="table-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>dob</th>
                                    <th>Gender</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($teachers as $teacher)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $teacher->name }}</td>
                                    <td>{{ $teacher->dob }}</td>
                                    <td>{{ $teacher->gender ? 'Male' : 'Female'}}</td>
                                    <td>{{ $teacher->address }}</td>
                                    <td>{{ $teacher->email }}</td>
                                    <td>{{ $teacher->phonenumber }}</td>
                                    <td>
                                        <a href="{{ route('teachers.show', $teacher->id) }}"
                                           class="btn btn-info btn-sm">&#128065;</a>
                                        <a href="{{ route('teachers.edit', $teacher->id) }}"
                                           class="btn btn-warning btn-sm">&#9998;</a>
                                        <form method="POST"
                                              action="{{ route('teachers.destroy', $teacher->id) }}"
                                              style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this teacher?')">
                                                    &#128465;
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center">No teachers found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
