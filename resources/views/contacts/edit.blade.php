@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a onclick="window.history.go(-1); return false;" href="#">← Cancel edit and back</a>

            <div class="card">
                <div class="card-header">Edit Contact</div>

                <div class="card-body">
                    <form action="/contacts/{{ $contact->id }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="fname">Firts Name</label>
                            <input type="text" class="form-control" value="{{ $contact->fname }}" name="fname" id="fname" placeholder="John Smith">
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" value="{{ $contact->lname }}" name="lname" id="lname" placeholder="Peréz López">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" value="{{ $contact->email }}" name="email" id="email"
                                aria-describedby="emailHelp" placeholder="john.perez@example.com">
                            <small>We will send an email that you have added it to your contact list.</small>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="number" class="form-control" value="{{ $contact->number }}" name="phone" id="phone"
                                placeholder="51515185151">
                        </div>
                        <button type="submit" class="btn btn-primary center">Save Changes</button>
                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection