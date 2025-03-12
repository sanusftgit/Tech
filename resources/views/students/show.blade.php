@extends('students.layout')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg rounded-lg border-0">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h2 class="mb-0">Student Details</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ $student->name }}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{ ucfirst($student->gender) }}</td>
                            </tr>
                            <tr>
                                <th>Date of Birth</th>
                                <td>{{ $student->dob }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $student->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>{{ $student->phonenumber }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $student->address }}</td>
                            </tr>
                            <tr>
                                <th>Teacher</th>
                                <td>
                                    @if($student->teacher)
                                        {{ $student->teacher->name }}
                                    @else
                                     
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Subjects</th>
                                <td>
                                    @if($student->subjects->isNotEmpty())
                                        @foreach($student->subjects as $subject)
                                            {{ $subject->name }} @if(!$loop->last), @endif
                                        @endforeach
                                    @else
                                        No subjects assigned
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ url('/edit' . $student->id . '/edit') }}" class="btn btn-warning">Edit</a>
                        <a href="{{ url('/teacher-to-student') }}" class="btn btn-outline-danger">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
