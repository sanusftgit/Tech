@extends('students.layout')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg rounded-lg border-0">
                <div class="card-header bg-success text-white text-center py-3">
                    <h2 class="mb-0">Edit Student Details</h2>
                </div>
                <div class="card-body bg-light">
                    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @foreach(['regnumber','name', 'dob', 'email', 'phonenumber', 'address'] as $field)
                            <div class="form-group mb-3">
                                <label class="fw-bold text-success">{{ ucfirst($field) }}:</label>
                                <input type="text" name="{{ $field }}" class="form-control shadow-sm border-success" value="{{ old($field, $student->$field) }}" required>
                            </div>
                        @endforeach

                        <div class="form-group mb-3">
                            <label class="fw-bold text-success">Gender:</label>
                            <select name="gender" class="form-control shadow-sm border-success" required>
                                <option value="Male" {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <div class="form-group mb-3 text-center">
                            <label class="fw-bold d-block">Photo:</label>
                            @if($student->photo)
                                <img src="{{ asset('storage/' . $student->photo) }}" class="img-thumbnail rounded-circle shadow" width="100px" height="100px">
                            @endif
                            <input type="file" name="photo" class="form-control mt-3 shadow-sm">
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-bold text-success">Teacher:</label>
                            <select name="teacher_id" class="form-control shadow-sm border-success" required>
                                <option value="">Select Teacher</option>
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" {{ old('teacher_id', $student->teacher_id) == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-bold text-success">Select Subjects:</label><br>
                            @foreach($subjects as $subject)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="subjects[]" value="{{ $subject->id }}"
                                           {{ in_array($subject->id, old('subjects', $student->subjects->pluck('id')->toArray())) ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $subject->name }}</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-success px-4 shadow">Update</button>
                            <a href="{{ url('/teacher-to-student') }}" class="btn btn-outline-danger px-4 shadow">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
