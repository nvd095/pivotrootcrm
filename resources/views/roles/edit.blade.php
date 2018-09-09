@extends('partials.master')

@section('content')

    <h2>Update Data</h2>
    <hr/>
    <a class="btn btn-primary" href="/admin/roles" style="margin-bottom: 15px;">Read Data</a>

    {!! Form::open(['id' => 'dataForm', 'method' => 'PATCH', 'url' => 'admin/roles/update/' . $roles->id ]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name'); !!}
        {!! Form::text('name', $roles->name , ['required' => 'required','placeholder' => 'Enter name', 'class' => 'form-control']); !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::text('description', $roles->description, ['required' => 'required','placeholder' => 'Enter description', 'class' => 'form-control']); !!}
    </div>


    {!! Form::submit('Update', ['class' => 'btn btn-primary pull-right']); !!}

    {!! Form::close() !!}
@endsection()