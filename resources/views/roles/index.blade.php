@extends('partials.master')
@section('content')
 
 <h2>Roles</h2>
    <hr/>
    <a class="btn btn-primary" href="roles/create" style="margin-bottom: 15px;">Create New</a>

    @if(Session::has('message'))
    <div class="alert-custom {{ Session::get('alert-class', 'alert-info') }}">
        <p><strong>Success:</strong>{!! Session('message') !!}</p>
    </div>
    @endif()

    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="padding-left: 15px;">#</th>
            <th>Name</th>
            <th>Description</th>
            <th width="10px;">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($roles as $key=>$role)
        @if($role->name != "Admin")
            <tr>
                <td style="padding-left: 15px;">{!! $key+1 !!}</td>
                <td>{!! $role->name !!}</td>
                <td>{!! $role->description !!}</td>
                <td>
                    <a class="btn btn-success btn-sm" href="roles/{!! $role->id !!}/edit">Edit</a>

                    {!! Form::open(['id' => 'deleteForm', 'method' => 'DELETE', 'url' => 'admin/roles/delete/' . $role->id]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endif
        @endforeach

        </tbody>
    </table>
@endsection
