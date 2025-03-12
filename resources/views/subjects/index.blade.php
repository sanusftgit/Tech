@extends('subjects.layout')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg rounded">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Subject Details</h2>
                    <a href="{{ url('/subjects/create') }}" class="btn btn-light">Create New Subject</a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center">
                            <thead class="bg-lightblue text-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Subject Name</th>
                                    <th>Code</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-striped">
                                @foreach ($subjects as $subject)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $subject->name }}</td>
                                    <td>{{ $subject->code }}</td>

                                    <td>
                                        <a href="{{ url('/subjects/' . $subject->id) }}" class="btn btn-info btn-sm">&#128065;</a>
                                        <a href="{{ url('/subjects/' . $subject->id . '/edit') }}" class="btn btn-warning btn-sm">&#9998;</a>
                                        <form method="POST" action="{{ url('/subjects/' . $subject->id) }}" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')">&#128465;</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                                @if($subjects->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center">No subjects found.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
