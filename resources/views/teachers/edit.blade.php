@extends('teachers.layout')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg rounded-lg border-0">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h2 class="mb-0">Edit Teacher Details</h2>
                </div>
                <div class="card-body">
                    <form action="{{ url('/teachers/' . $teachers->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label class="fw-bold">Name:</label>
                            <input type="text" name="name" class="form-control shadow-sm" value="{{ $teachers->name }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-bold">dob:</label>
                            <input type="date" name="dob" class="form-control shadow-sm" value="{{ $teachers->dob }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-bold">Gender:</label>
                            <select name="gender" class="form-control shadow-sm" required>
                                <option value="1" {{ $teachers->gender == 1 ? 'selected' : '' }}>Male</option>
                                <option value="0" {{ $teachers->gender == 0 ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-bold">Address:</label>
                            <input type="text" name="address" class="form-control shadow-sm" value="{{ $teachers->address }}">
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-bold">Email:</label>
                            <input type="email" name="email" class="form-control shadow-sm" value="{{ $teachers->email }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-bold">Phone Number:</label>
                            <input type="text" name="phonenumber" class="form-control shadow-sm" value="{{ $teachers->phonenumber }}">
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-primary shadow">Update</button>
                            <a href="{{ url('/teach') }}" class="btn btn-secondary shadow">Back</a>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
