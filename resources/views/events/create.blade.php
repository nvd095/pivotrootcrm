@extends('partials.master')

@section('content')

    <h2>Create Events</h2>
    <hr/>
    <a class="btn btn-primary" href="/events" style="margin-bottom: 15px;">Read Data</a>

    {!! Form::open(['id' => 'dataForm', 'url' => '/events/add']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name'); !!}
        {!! Form::text('name', null, ['required' => 'required','placeholder' => 'Enter name', 'class' => 'form-control']); !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::text('description', null, ['required' => 'required' ,'placeholder' => 'Enter description', 'class' => 'form-control']); !!}
    </div>

    {!! Form::submit('Create', ['class' => 'btn btn-primary pull-right']); !!}

    {!! Form::close() !!}
@endsection()