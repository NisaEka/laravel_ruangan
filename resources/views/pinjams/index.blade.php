@extends('cms::layouts.dashboard')

@section('pageTitle') Peminjaman @stop

@section('content')
<div class="container row">


    <div class="col-md-12">
        <div class="pull-right">
            {!! Form::open(['route' => 'pinjams.search']) !!}
            <input class="form-control form-inline pull-right" name="search" placeholder="Search">
            {!! Form::close() !!}
        </div>
        <h1 class="pull-left">Pinjams</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('pinjams.create') !!}">Add New</a>
    </div>

    <div class="col-md-12">
        @if($pinjams->isEmpty())
            <div class="well text-center">No pinjams found.</div>
        @else
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th width="50px">Action</th>
                </thead>
                <tbody>
                @foreach($pinjams as $pinjam)
                    <tr>
                        <td>
                            <a href="{!! route('pinjams.edit', [$pinjam->id]) !!}">{{ $pinjam->name }}</a>
                        </td>
                        <td>
                            <a href="{!! route('pinjams.edit', [$pinjam->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
                            <form method="post" action="{!! route('pinjams.destroy', [$pinjam->id]) !!}">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this pinjam?')"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="row">
                {!! $pinjams; !!}
            </div>
        @endif
    </div>
</div>
@stop