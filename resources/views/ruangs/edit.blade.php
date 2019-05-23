@extends('cms::layouts.dashboard')

@section('pageTitle') Edit Ruangan @stop

@section('content')


<div class="container">

    {!! Form::model($ruang, ['route' => ['ruangs.update', $ruang->id], 'method' => 'patch']) !!}

    @input_maker_label('Nama Ruangan: ')
    @input_maker_create('name', ['type' => 'string'], $ruang)

    {!! Form::submit('Update') !!}

    {!! Form::close() !!}
</div>

@stop
