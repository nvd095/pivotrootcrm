@extends('partials.master')

@section('content')

    <h2>Create User</h2>
    <hr/>
    <a class="btn btn-primary" href="/admin/users" style="margin-bottom: 15px;">Read Data</a>

    {!! Form::open(['id' => 'dataForm', 'url' => '/admin/users/add']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name'); !!}
        {!! Form::text('name', null, ['required' => 'required','placeholder' => 'Enter name', 'class' => 'form-control']); !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', null, ['required' => 'required' ,'placeholder' => 'Enter Email id', 'class' => 'form-control']); !!}
    </div>
    
    <div class="form-group">
        {!! Form::label('password', 'Password') !!}
        {!! Form::password('password', null, ['required' => 'required' ,'placeholder' => 'Enter passowrd', 'class' => 'form-control']); !!}
    </div>

    {!! Form::submit('Create', ['class' => 'btn btn-primary pull-right']); !!}

    {!! Form::close() !!}
@endsection()