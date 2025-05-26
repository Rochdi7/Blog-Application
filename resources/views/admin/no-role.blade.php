@extends('layout.base') {{-- Update to match your base layout file --}}

@section('content')
<div class="container text-center py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow border-danger">
                <div class="card-body">
                    <h1 class="text-danger mb-3">⛔ Access Denied</h1>
                    <p class="lead">You do not have permission to access the admin panel.</p>

                    <a href="{{ route('home') }}" class="btn btn-primary mt-3">
                        <i class="fas fa-home"></i> Return to Homepage
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
