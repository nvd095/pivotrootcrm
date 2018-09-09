@extends('partials.master')
@section('content')
 
 <h2>Users</h2>
    <hr/>
    <a class="btn btn-primary" href="/admin/users/create" style="margin-bottom: 15px;">Create New</a>

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
            <th>Email</th>
            <th width="10px;">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $key=>$user)
            <tr>
                <td style="padding-left: 15px;">{!! $key+1 !!}</td>
                <td>{!! $user->name !!}</td>
                <td>{!! $user->email !!}</td>
                <td>
                    <a class="btn btn-success btn-sm" href="users/{!! $user->id !!}/edit">Edit</a>

                    {!! Form::open(['id' => 'deleteForm', 'method' => 'DELETE', 'url' => 'admin/users/delete/' . $user->id]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
