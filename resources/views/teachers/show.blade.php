@extends('teachers.layout')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg rounded-lg border-0">
                <div class="card-header bg-success text-white text-center py-3">
                    <h2 class="mb-0">Teacher Details</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Name:</strong> {{ $teachers->name }}</li>
                        <li class="list-group-item"><strong>Date of Birth:</strong> {{ $teachers->dob }}</li>
                        <li class="list-group-item"><strong>Gender:</strong> {{ $teachers->gender == 1 ? 'Male' : 'Female' }}</li>
                        <li class="list-group-item"><strong>Address:</strong> {{ $teachers->address }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $teachers->email }}</li>
                        <li class="list-group-item"><strong>Phone Number:</strong> {{ $teachers->phonenumber }}</li>
                    </ul>
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ url('/teachers/' . $teachers->id . '/edit') }}" class="btn btn-warning">Edit</a>
                        <a href="{{ url('/') }}" class="btn btn-danger">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
