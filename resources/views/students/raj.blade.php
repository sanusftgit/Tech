@extends('students.layout')

@section('content')

<table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Regnumber</th>
                                <td>{{ $student->regnumber }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $student->name }}</td>
                            </tr>
                            <div class="text-center mb-3">
                        @if($student->photo)
                            <img src="{{ asset('storage/' . $student->photo) }}" class="img-thumbnail rounded-circle shadow" width="180px" height="180px" alt="Student Photo">
                        @else
                            <img src="{{ asset('images/default-avatar.png') }}" class="img-thumbnail rounded shadow" width="200px" height="200px" alt="Default Photo">
                        @endif
                    </div>
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
                    @endsection
