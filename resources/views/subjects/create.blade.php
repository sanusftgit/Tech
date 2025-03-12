@extends('subjects.layout')
@section('content')

<div class="container mt-1">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Create New Subject</h2>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('subjects.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name">Subject Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter subject name" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="code">Subject Code</label>
                            <input type="text" class="form-control" name="code" id="code" placeholder="Enter subject code" required>
                        </div>

                        <button type="submit" class="btn btn-success">Add Subject</button>
                        <a href="{{ route('subjects.index') }}" class="btn btn-outline-danger">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
