@extends('cms::layouts.dashboard')

@section('pageTitle') Tambah Ruangan @stop

@section('content')


<div class="container">

    {!! Form::open(['route' => 'ruangs.store']) !!}

    @input_maker_label('Nama Ruangan: ')
    @input_maker_create('name', ['type' => 'string'])

    {!! Form::submit('Save') !!}

    {!! Form::close() !!}

</div>
@stop