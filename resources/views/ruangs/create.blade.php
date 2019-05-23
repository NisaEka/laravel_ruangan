<div class="">
    {{ Session::get('message') }}
</div>

<div class="container">

    {!! Form::open(['route' => 'ruangs.store']) !!}

    @form_maker_table("ruangs")

    {!! Form::submit('Save') !!}

    {!! Form::close() !!}

</div>