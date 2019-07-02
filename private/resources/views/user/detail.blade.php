@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detail User') }}</div>

                <div class="card-body">
                    <p>Nama Lengkap : {{$user->name}}</p>
                    <p>Username : {{$user->username}}</p>
                    <p>Email : {{$user->email}}</p>
                    <p>Password : </p>
                    <p>Status : {{$user->level}}</p>
                    <a class="btn btn-primary" href="{{route('home')}}" role="button"> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
