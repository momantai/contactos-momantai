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
            <div class="text-center">
                <button id="delete-contact" class="btn btn-danger mt-4">Delete contact</button>

                <form action="/contacts/{{ $contact->id }}" method="POST" id="delete-form">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        let delete_contact = document.getElementById("delete-contact");
        delete_contact.addEventListener('click', (evt) => {
            const confirm_delete = confirm("Do you really want to delete this contact?");

            console.log(confirm_delete);
            
            if(confirm_delete) {
                document.getElementById('delete-form').submit();
            }
        });
    </script>
@endpush

@endsection
