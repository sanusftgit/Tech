@extends('subjects.layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Subject Details</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="fw-bold">Subject Name:</label>
                        <p>{{ $subject->name }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold">Subject Code:</label>
                        <p>{{ $subject->code }}</p>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ url('/teacher-to-subject') }}" class="btn btn-light">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
