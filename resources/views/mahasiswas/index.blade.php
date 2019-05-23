@extends('cms::layouts.dashboard')

@section('pageTitle') Admin Dashboard @stop

@section('content')
<div class="container row">

    <div class="">
        {{ Session::get('message') }}
    </div>

    <div class="col-md-12">
        <div class="pull-right">
            {!! Form::open(['route' => 'mahasiswas.search']) !!}
            <input class="form-control form-inline pull-right" name="search" placeholder="Search">
            {!! Form::close() !!}
        </div>
        <h1 class="pull-left">Mahasiswas</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('mahasiswas.create') !!}">Add New</a>
    </div>

    <div class="col-md-12">
        @if($mahasiswas->isEmpty())
            <div class="well text-center">No mahasiswas found.</div>
        @else
            <table class="table">
                <thead>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th width="50px">Action</th>
                </thead>
                <tbody>
                @foreach($mahasiswas as $mahasiswa)
                    <tr>
                        <td>{{ $mahasiswa->nim }}</td>
                        <td>
                            <a href="{!! route('mahasiswas.edit', [$mahasiswa->id]) !!}">{{ $mahasiswa->nama }}</a>
                        </td>
                        <td>
                            <a href="{!! route('mahasiswas.edit', [$mahasiswa->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
                            <form method="post" action="{!! route('mahasiswas.destroy', [$mahasiswa->id]) !!}">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this mahasiswa?')"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="row">
                {!! $mahasiswas; !!}
            </div>
        @endif
    </div>
</div>
@stop