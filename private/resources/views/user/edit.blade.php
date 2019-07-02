@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit User') }}</div>

                <div class="card-body">

                    {!! Form::open(array('route' => ['user.update',$user->id],'method'=>'PUT', 'enctype' => 'multipart/form-data' )) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Nama Lengkap:', ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-lg-12 {{ !$errors->has('name') ?: 'has-error' }}">
                        {!! Form::text('name', old('name',$user->name ), ['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' ),
                            'placeholder' => 'Masukan Nama', 'autofocus', 'required']) !!}
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('username', 'Username:', ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-lg-12">
                        {!! Form::text('username', old('usernmae', $user->username), ['class' => 'form-control' . ( $errors->has('username') ? ' is-invalid' : '' ),
                            'placeholder' => 'Masuakan Username',  'autofocus', 'required']) !!}
                        @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', 'Email:', ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-lg-12">
                        {!! Form::email('email', old('email', $user->email), ['class' => 'form-control' . ( $errors->has('email') ? ' is-invalid' : '' ),
                            'placeholder' => 'Masuakan Email',  'autofocus', 'required']) !!}
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('password', 'Password:', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-12">
                        {!! Form::password('password', ['class' => 'form-control' . ( $errors->has('password') ? ' is-invalid' : '' ),
                            'placeholder' => 'Edit Password']) !!}
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('Foto Sebelumnya', 'Foto Sebelumnya', ['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-12">
                        <img src="{{asset('public/images/'.$user->foto)}}" width="50%" height="50%" alt="">
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('Foto', 'Foto', ['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-12">
                        {!!Form::file("foto",[ "class" => "form-group", 'required' ])!!}
                        </div>
                    </div>

                    <div class="form-group">
                    {!! Form::select('level',['admin' => 'admin', 'operator' => 'operator'], $user->level,
                        ['class' => 'form-control' ,
                        'placeholder' => 'Masuakan Level', 'required']) !!}
                        @error('level')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">

                        {{ Form::submit('Simpan',['class' => 'btn btn-primary'])}}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
