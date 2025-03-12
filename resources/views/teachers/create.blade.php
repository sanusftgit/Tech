@extends('teachers.layout')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Add New Teacher</h2>
                </div>
                <div class="card-body">
                    <form action="{{ url('/') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>dob:</label>
                            <input type="date" name="dob" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Gender:</label>
                            <select name="gender" class="form-control" required>
                                <option value="">Select Gender</option>
                                <option value="1">Male</option>
                                <option value="0">Female</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Address:</label>
                            <input type="text" name="address" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Email:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Phone Number:</label>
                            <input type="text" name="phonenumber" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Add Teacher</button>
                        <a href="{{ url('/') }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
