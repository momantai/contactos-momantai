@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a onclick="window.history.go(-1); return false;" href="#">← Cancel edit and back</a>

            <div class="card">
                <div class="card-header">Hi {{ $user->name }}, you are about to edit your data.</div>

                <div class="card-body">
                    <form action="{{ route('sprofile') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" name="name" id="name" placeholder="John Smith">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" name="email" id="email"
                                aria-describedby="emailHelp" placeholder="john.perez@example.com">
                            <small>We recommend that you change your email address only if you no longer have it.</small>
                        </div>
                        <button type="submit" class="btn btn-primary center">Update information</button>
                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection