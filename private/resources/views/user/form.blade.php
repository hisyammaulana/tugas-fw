@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah User') }}</div>

                <div class="card-body">

                    {!! Form::open(array('route' => 'user.add','method'=>'POST', 'enctype' => 'multipart/form-data' )) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Nama Lengkap:', ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-lg-12 {{ !$errors->has('name') ?: 'has-error' }}">
                            {!! Form::text('name', '', ['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' ),
                            'placeholder' => 'Masukan Nama', old('name'), 'autofocus', ]) !!}
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
                            {!! Form::text('username', '', ['class' => 'form-control' . ( $errors->has('username') ? ' is-invalid' : '' ),
                            'placeholder' => 'Masukan Username', old('usernmae'), 'autofocus', ]) !!}
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
                            {!! Form::email('email', '', ['class' => 'form-control' . ( $errors->has('email') ? ' is-invalid' : '' ),
                            'placeholder' => 'Masukan Email', old('email'), 'autofocus', ]) !!}
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
                            'placeholder' => 'Masukan Password', ]) !!}
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('foto', 'Foto:', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-12">
                            {!!Form::file("foto",[ "class" => "form-group",  ])!!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::select('level',['admin' => 'admin', 'operator' => 'operator'], '',
                        ['class' => 'form-control' ,
                        'placeholder' => 'Masuakan Level', ]) !!}
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
