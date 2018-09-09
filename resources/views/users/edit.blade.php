@extends('partials.master')

@section('content')

    <h2>Update Data</h2>
    <hr/>
    <a class="btn btn-primary" href="/admin/users" style="margin-bottom: 15px;">Read Data</a>

    {!! Form::open(['id' => 'dataForm', 'method' => 'PATCH', 'url' => '/admin/users/update/' . $users->id ]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name'); !!}
        {!! Form::text('name', $users->name , ['required' => 'required','placeholder' => 'Enter name', 'class' => 'form-control']); !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', $users->email, ['required' => 'required','placeholder' => 'Enter email', 'class' => 'form-control']); !!}
    </div>


    {!! Form::submit('Update', ['class' => 'btn btn-primary pull-right']); !!}

    {!! Form::close() !!}
@endsection()