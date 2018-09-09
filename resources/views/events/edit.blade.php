@extends('partials.master')

@section('content')

    <h2>Update Data</h2>
    <hr/>
    <a class="btn btn-primary" href="/events" style="margin-bottom: 15px;">Read Data</a>

    {!! Form::open(['id' => 'dataForm', 'method' => 'PATCH', 'url' => 'events/update/' . $events->id ]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name'); !!}
        {!! Form::text('name', $events->event_name , ['required' => 'required','placeholder' => 'Enter name', 'class' => 'form-control']); !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::text('description', $events->event_description, ['required' => 'required','placeholder' => 'Enter description', 'class' => 'form-control']); !!}
    </div>


    {!! Form::submit('Update', ['class' => 'btn btn-primary pull-right']); !!}

    {!! Form::close() !!}
@endsection()