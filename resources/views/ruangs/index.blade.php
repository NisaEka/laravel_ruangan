@extends('cms::layouts.dashboard')

@section('pageTitle') Ruangan @stop

@section('content')
<div class="container row">

    <div class="">
        {{ Session::get('message') }}
    </div>

    <div class="col-md-12">
        <div class="pull-right">
            {!! Form::open(['route' => 'ruangs.search']) !!}
            <input class="form-control form-inline pull-right" style="margin-top: 25px; margin-left: 10px;" name="search" placeholder="Search">
            {!! Form::close() !!}
        </div>
        <h1 class="pull-left">Ruangs</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px;margin-right: 10px" href="{!! route('ruangs.create') !!}">Add New</a>
    </div>

    <div class="col-md-12">
        @if($ruangs->isEmpty())
            <div class="well text-center">No ruangs found.</div>
        @else
            <table class="table">
                <thead>
                    <th>Ruangan</th>
                    <th>Status</th>
                    <th width="50px">Action</th>
                </thead>
                <tbody>
                @foreach($ruangs as $ruang)
                    <tr>
                        <td>
                            <a href="{!! route('ruangs.edit', [$ruang->id]) !!}">{{ $ruang->name }}</a>
                        </td>
                        <td>
                            @if($ruang->status=='0')
                            <button class="btn btn-default">Free</button>
                            @else
                            <button class="btn btn-danger">Dipinjam</button>
                            @endif
                        </td>
                        <td>
                            <a href="{!! route('pinjams.create', ['id'=>$ruang->id]) !!}" class="btn btn-warning"><i class="fa fa-book"> Pinjam Ruangan</i></a>
                            <a href="{!! route('ruangs.edit', [$ruang->id]) !!}" class="btn btn-info"><i class="fa fa-pencil"> Edit</i></a>
                            <form method="post" action="{!! route('ruangs.destroy', [$ruang->id]) !!}">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this ruang?')" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="row">
                {!! $ruangs; !!}
            </div>
        @endif
    </div>
</div>
@stop