<div class="">
    {{ Session::get('message') }}
</div>

<div class="container">

    {!! Form::model($ruang, ['route' => ['ruangs.update', $ruang->id], 'method' => 'patch']) !!}

    @form_maker_object($ruang, FormMaker::getTableColumns('ruangs'))

    {!! Form::submit('Update') !!}

    {!! Form::close() !!}
</div>
