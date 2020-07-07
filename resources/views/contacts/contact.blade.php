@extends('layouts.app')

@section('content')
<style>
    .item-contact {
        display: flex;
    }

    .icon  {
        padding-right: 10px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/home">← Cancel and back</a>
            <div class="card">
                <div class="card-header" style="display:flex;justify-content:space-between;"><span>{{ $contact->fname }} {{ $contact->lname }}</span> <a href="/contacts/{{ $contact->id }}/edit">Edit Contact</a></div>
                <div class="card-body">
                    <div class="item-contact">
                        <div class="icon">
                            <img width="15px" src="https://image.flaticon.com/icons/svg/892/892781.svg" alt="">
                        </div>
                        <div class="info-contact">
                            {{ $contact->fname }} {{ $contact->lname }}
                        </div>
                    </div>
                    <div class="item-contact">
                        <div class="icon">
                            <img width="15px" src="https://image.flaticon.com/icons/svg/892/892781.svg" alt="">
                        </div>
                        <div class="info-contact">
                            {{ $contact->email }}
                        </div>
                    </div>
                    <div class="item-contact">
                        <div class="icon">
                            <img width="15px" src="https://image.flaticon.com/icons/svg/892/892781.svg" alt="">
                        </div>
                        <div class="info-contact">
                            {{ $contact->number }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
