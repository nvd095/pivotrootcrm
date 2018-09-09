@extends('partials.master')
@section('content')
 
 <h2>Manage Roles</h2>
    <hr/>
    <a class="btn btn-primary" href="/admin/roles/create" style="margin-bottom: 15px;">Create New</a>

    @if(Session::has('message'))
    <div class="alert-custom {{ Session::get('alert-class', 'alert-info') }}">
        <p>{!! Session('message') !!}</p>
    </div>
    @endif()

    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="padding-left: 15px;">#</th>
            <th>User Name</th>
            <th>Roles</th>
            <th width="10px;">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $key=>$user)
        
            <tr>
                <form action="/admin/assign-roles" method="post">
                <td style="padding-left: 15px;">{!! $key+1 !!}</td>
                <td>{!! $user->name !!}</td>
                {{ Form::hidden('id', $user->id) }}
                <td>
                @foreach($roles as $key_roles=>$role)
                
                <input type="checkbox" {{ $user->hasRole($role->name) ? 'checked' : '' }} name="role_{!! $role->name !!}" {{ ($user->hasRole($role->name) && $role->name == "Admin" || $role->name == "Admin")? 'disabled' : '' }} >{!! $role->name !!}</br>
                @endforeach
                </td>
                <td>
                      {{ csrf_field() }}
                    <button type="submit" class = 'btn btn-primary pull-right'>Assign Roles</button></td>
                
                </form>
            </tr>
         
        @endforeach

        </tbody>
    </table>
@endsection
