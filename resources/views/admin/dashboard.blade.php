@extends('cms::layouts.dashboard')

@section('pageTitle') Admin Dashboard @stop

@section('content')

    <div class="col-md-12 mt-4">
        <div class="row">
            @if (Session::get('original_user'))
                <a class="btn btn-dark pull-right" href="{{ url('/users/switch-back') }}">Return to your Login</a>
            @endif
        </div>
        <div class="row">
            <div class="col-lg-2">
                <div class="card card-dark text-center">
                    <div class="card-header">
                        Users
                    </div>
                    <div class="card-body">
                        <span class="lead">{{ app(App\Models\User::class)->count() }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="card card-dark text-center">
                    <div class="card-header">
                        Ruangan
                    </div>
                    <div class="card-body">
                        <span class="lead">{{ app(App\Models\Ruang::class)->count() }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="card card-dark text-center">
                    <div class="card-header">
                        Peminjaman
                    </div>
                    <div class="card-body">
                        <span class="lead">{{ app(App\Models\Pinjam::class)->count() }}</span>
                    </div>
                </div>
            </div>
            
        </div>

        
    </div>

@stop
