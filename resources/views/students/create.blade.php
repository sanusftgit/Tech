
@extends('students.layout')
@section('content')

<div class="container mt-1">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded">
                <div class="card-header bg-primary text-white"> 
                    <h2 class="mb-0">Add New Student</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Regnumber:</label>
                            <input type="text" name="regnumber" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Gender:</label>
                            <select name="gender" class="form-control" required>
                                <option value="">Select Gender</option>
                                <option value="male">male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>DoB:</label>
                            <input type="date" name="dob" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Email:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Phone Number:</label>
                            <input type="text" name="phonenumber" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Address:</label>
                            <input type="text" name="address" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Teacher:</label>
                            <select name="teacher_id" class="form-control" required>
                                <option value="">Select Teacher</option>
                                @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label><strong>Select Subjects:</strong></label>
                            @foreach($subjects as $subject)
                            <div class="form-check">
                                <input type="checkbox" id="subject{{ $subject->id }}" name="subjects[]" value="{{ $subject->id }}" class="form-check-input">
                                <label for="subject{{ $subject->id }}" class="form-check-label">{{ $subject->name }}</label>
                            </div>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-primary">Add Student</button> 
                        <a href="{{ route('students.index') }}" class="btn btn-danger">Back</a> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
