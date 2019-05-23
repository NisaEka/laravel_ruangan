<div class="">
    {{ Session::get('message') }}
</div>

<div class="container">

    {!! Form::open(['route' => 'pinjams.store']) !!}

    @form_maker_table("pinjams")

    {!! Form::submit('Save') !!}

    {!! Form::close() !!}

</div>