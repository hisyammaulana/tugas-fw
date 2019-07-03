@extends('layouts.app')

@section('content')
<div class="container">

    <!-- <a href="{{route('add')}}" class="btn btn-primary ml-auto">Tambah Data</a> -->
    <div class="text-right mb-4">
        <button class="btn btn-primary" type="button" onclick="window.location='{{route("add")}}'" name="button">Tambah User</button>
    </div>

    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Pilihan</th>
            </tr>
            <tbody>

                @php($no = 1)
                @foreach ($datas as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>
                        <a class="btn btn-success" href="{{route('user.detail', $data->id)}}" role="button"> Detail</a>
                        <a class="btn btn-primary" href="{{route('user.edit', $data->id)}}" role="button"> Edit</a>
                        <a class="btn btn-danger" href="{{route('user.destroy', $data->id)}}" role="button"> Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
