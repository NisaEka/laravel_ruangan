@extends('cms::layouts.dashboard')

@section('pageTitle') Edit peminjaman @stop

@section('content')
<div class="">
    {{ Session::get('message') }}
</div>

<div class="container">

    {!! Form::model($pinjam, ['route' => ['pinjams.update', $pinjam->id], 'method' => 'patch']) !!}

    @form_maker_object($pinjam, FormMaker::getTableColumns('pinjams'))

    {!! Form::submit('Update') !!}

    {!! Form::close() !!}
</div>
@stop