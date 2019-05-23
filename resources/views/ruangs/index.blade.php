<div class="container">

    <div class="">
        {{ Session::get('message') }}
    </div>

    <div class="row">
        <div class="pull-right">
            {!! Form::open(['route' => 'ruangs.search']) !!}
            <input class="form-control form-inline pull-right" name="search" placeholder="Search">
            {!! Form::close() !!}
        </div>
        <h1 class="pull-left">Ruangs</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('ruangs.create') !!}">Add New</a>
    </div>

    <div class="row">
        @if($ruangs->isEmpty())
            <div class="well text-center">No ruangs found.</div>
        @else
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th width="50px">Action</th>
                </thead>
                <tbody>
                @foreach($ruangs as $ruang)
                    <tr>
                        <td>
                            <a href="{!! route('ruangs.edit', [$ruang->id]) !!}">{{ $ruang->name }}</a>
                        </td>
                        <td>
                            <a href="{!! route('ruangs.edit', [$ruang->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
                            <form method="post" action="{!! route('ruangs.destroy', [$ruang->id]) !!}">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this ruang?')"><i class="fa fa-trash"></i> Delete</button>
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