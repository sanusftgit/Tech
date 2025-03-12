
@extends('students.layout')

@section('content')

<div class="container mt-1">
    <div class="row justify-content-center">
        <div class="col-md-12"> 
            <div class="card shadow-lg rounded">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Student Details</h2>
                    <a href="{{ url('/students/create') }}" class="btn btn-success">Create new student</a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="table-responsive mt-4"> 
                        <table class="table table-striped table-bordered text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Regnumber</th>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>Gender</th>
                                    <th>DoB</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>Subjects</th>
                                    <th>Teacher ID</th>
                                    <th>Teacher</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->regnumber }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @if($item->photo)
                                            <img src="{{ asset('storage/' . $item->photo) }}" style="width: 50px; height: 50px; border-radius: 50%;">
                                        @else
                                            No Image
                                        @endif
                                        </td>
                                    <td>{{ $item->gender }}</td>
                                    <td>{{ $item->dob }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phonenumber }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>
                                        @if($item->subjects->isNotEmpty())
                                            {{ $item->subjects->pluck('name')->implode(', ') }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $item->teacher_id }}</td>
                                    <td>{{ $item->teacher ? $item->teacher->name : 'N/A' }}</td>
                                    <td class="d-flex gap-2 justify-content-center">
                                        <a href="{{ url('/students/' . $item->id) }}" class="btn btn-info btn-sm">&#128065;</a>
                                        <a href="{{ url('/students/' . $item->id . '/edit') }}" class="btn btn-warning btn-sm">&#9998;</a>
                                        <form method="POST" action="{{ url('/students/' . $item->id) }}" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')">&#128465;</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                                @if($students->isEmpty())
                                    <tr>
                                        <td colspan="11" class="text-center">No students found.</td>
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
