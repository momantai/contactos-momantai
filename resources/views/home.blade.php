@extends('layouts.app')

@section('content')

<style>
    .item a {
        display: flex;
    }

    .item .el {
        flex: 1;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="/home" method="GET">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="searchText" class="form-control" placeholder="Search..."
                            value="{{ $searchText }}">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </span>
                    </div>
                </div>
            </form>
            <div class="card">
                <div class="card-header" style="display:flex;justify-content:space-between;"><span>Contact List</span>
                    <a href="/contacts">New Contact</a></div>
                <style>
                    .item {
                        padding: 5px 10px;
                    }

                    .item:nth-child(odd) {
                        background: #dae0e5;
                    }

                    .item:hover {
                        cursor: pointer;
                        background: #adb5bd;
                    }
                </style>
                <div class="card-body">
                    <div class="table">
                        @foreach($contacts as $contact)
                        <div class="item">
                            <a class="text-dark text-decoration-none" href="/contacts/{{ $contact->id }}">
                                <div class="el">{{ $contact->fname }} {{ $contact->lname }}</div>
                                <div class="el">{{ $contact->email }}</div>
                            </a>
                        </div>
                        @endforeach

                    </div>
                    <div style="display: flex; justify-content: center;">
                        {{ $contacts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection