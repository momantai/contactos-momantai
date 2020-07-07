@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/home">← Cancel and back</a>

            <div class="card">
                <div class="card-header">New Contact</div>

                <div class="card-body">
                    <form method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="fname">Firts Name</label>
                            <input type="text" class="form-control" name="fname" id="fname" placeholder="John Smith">
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" name="lname" id="lname" placeholder="Peréz López">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" id="email"
                                aria-describedby="emailHelp" placeholder="john.perez@example.com">
                            <small>We will send an email that you have added it to your contact list.</small>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="number" class="form-control" name="phone" id="phone"
                                placeholder="51515185151">
                        </div>
                        <button type="submit" class="btn btn-primary center">Save</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection